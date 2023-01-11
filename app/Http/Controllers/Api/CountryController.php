<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Http\Resources\CountryResource;
use App\Models\Cat;
use App\Models\Chance;
use App\Models\Country;
use App\Models\CountryCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $chances = Chance::all();
        if (count($countries) > 0) {
            return response()->json([
                'success' => true,
                'Number' => count($chances),
                'countries' => CountryResource::collection($countries)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'countries' => []
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/countries/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        $country = Country::create($data);
        $cats = Cat::all();
        foreach ($cats as $cat) {
            CountryCat::create([
                'country_id' => $country->id,
                'cat_id' => $cat->id
            ]);
        }
        return response()->json([
            'success' => true,
            'country' => new CountryResource($country)
        ], 200);
    }

    public function show($id)
    {
        $country = Country::find($id);
        if ($country) {
            return response()->json([
                'success' => true,
                'country' => new CountryResource($country)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'country' => []
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        if ($country) {
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()], 400);
            }
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/countries/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            $country->update($data);
            return response()->json([
                'success' => true,
                'country' => new CountryResource($country)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no country'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        if ($country) {
            $country->delete();
            return response()->json([
                'success' => true,
                'message' => 'country deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no country'
            ], 404);
        }
    }
}
