<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use App\Models\Country;
use App\Models\CountryCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatController extends Controller
{
    public function index()
    {
        $cats = Cat::all();
        if (count($cats) > 0) {
            return response()->json([
                'success' => true,
                'cats' => CatResource::collection($cats)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'cats' => []
            ], 404);
        }
    }

    public function store(Request $request)
    {
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
        $cat = Cat::create($data);
        $countries = Country::all();
        foreach ($countries as $country) {
            CountryCat::create([
                'country_id' => $country->id,
                'cat_id' => $cat->id
            ]);
        }
        return response()->json([
            'success' => true,
            'country' => new CatResource($cat)
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
