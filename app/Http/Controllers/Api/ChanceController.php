<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Http\Resources\ChanceResource;
use App\Models\Cat;
use App\Models\Chance;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $country = Country::find($id);
        $cats = Cat::all();
        $chances = Chance::where('country_id', $country->id)->get();
        if (count($chances) > 0) {
            return response()->json([
                'success' => true,
                'cats'  => CatResource::collection($cats),
                'chances' => ChanceResource::collection($chances)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'chances' => []
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required',
            'desc' => 'required',
            'logo' => 'required',
            'branches' => 'required',
            'outlets' => 'required',
            'provider' => 'required',
            'number' => 'required',
            'resp' => 'required',
            'price' => 'required',
            // 'country_id ' => 'required',
            // 'cat_id ' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = 'storage/chances/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['logo'] = $name;
        }
        $chance = Chance::create($data);
        return response()->json([
            'success' => true,
            'chance' => new ChanceResource($chance)
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $cat = Cat::find($id);
        if ($cat) {
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()], 400);
            }
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/cats/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            $cat->update($data);
            return response()->json([
                'success' => true,
                'country' => new CatResource($cat)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no cat'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $cat = Cat::find($id);
        if ($cat) {
            $cat->delete();
            return response()->json([
                'success' => true,
                'message' => 'cat deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no cat'
            ], 404);
        }
    }
}
