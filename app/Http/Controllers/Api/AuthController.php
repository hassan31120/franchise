<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Passwordreset;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'number' => 'required|numeric',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()->first()
            ], 404);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user['userType'] = "user";

        return response()->json([
            'success' => true,
            'user' => new UserResource($user),
            'token' => $user->createToken('medo')->plainTextToken,
        ], 200);
    }

    public function dashRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return response()->json([
            'success' => true,
            'user' => $user,
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = $request->all();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return response()->json([
                'success' => true,
                'user' => new UserResource(Auth::user()),
                'token' => $user->createToken('medo')->plainTextToken,
            ], 200);
        }

        return response()->json([
            'password' => ['تحقق من الإيميل والرقم السري!']
        ], 404);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function users()
    {
        $users = User::all();
        if (count($users) > 0) {
            return response()->json([
                'success' => true,
                'users' => UserResource::collection($users)
            ], 200);
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'user' => new UserResource($user)
        ], 200);
    }

    public function editData(Request $request)
    {
        $user = User::find(Auth::id());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required|numeric',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 404);
        }

        $data = $request->all();

        $user->update($data);

        return response()->json(new UserResource($user), 200);
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $user = User::find(Auth::id());

        if (password_verify($request->password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json(new UserResource($user), 200);
        } else {
            return response()->json(['error' => 'كلمة المرور القديمة غير صحيحة'], 400);
        }
    }

    public function send_code(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $user = User::whereEmail($request->email)->firstOrFail();
        $user->verification_code = random_int(1000, 9999);
        $user->save();

        $resetData = [
            'user' => $user->name,
            'body' => 'here is your reset code',
            'code' => $user->verification_code,
            'url' => '/',
            'thankyou' => 'thank your for using our services'
        ];

        Notification::send($user, new Passwordreset($resetData));

        return response()->json([
            'message' => 'تم إرسال الكود على بريدك الإلكتروني',
            'id' => $user->id
        ], 200);
    }

    public function confirm_code(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $user = User::find($id);
        if ($user) {
            if ($user->verification_code == $request['code']) {
                return response()->json([
                    'success' => true,
                    'message' => 'الكود صحيح'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'الكود الذي ادخلته غير صحيح'
                ], 400);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'لا يوجد مستخدم'
            ], 400);
        }
    }

    public function password_reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|exists:users,verification_code',
            'password' => 'required|confirmed|min:8|required_with:password_confirmation',
            'password_confirmation' => 'min:8|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }
        $user = User::where('verification_code', $request->code)->first();
        $user->password = Hash::make($request['password']);
        $user->save();
        return response()->json(['success' => true, 'message' => 'تم إعادة تعيين كلمة المرور بنجاح.'], 200);
    }

    public function delUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'user has been deleted successfully!'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no user to delete!'
            ], 404);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => new UserResource($user)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'user' => []
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $data = $request->all();
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'number' => 'required',
            ]);
            $user->update($data);
            return response()->json([
                'success' => true,
                'user' => new UserResource($user)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no user!'
            ], 404);
        }
    }
}
