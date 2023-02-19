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
use App\Models\ChanceImage;
use Symfony\Component\Console\Input\Input;

class ChanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if ($id == 0) {
            $cats = Cat::all();
            $chances = Chance::all();
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
        } else {
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
    }

    public function myCahnces()
    {
        $chances = Chance::all();
        if (count($chances) > 0) {
            return response()->json([
                'success' => true,
                'chances' => ChanceResource::collection($chances)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'chances' => []
            ], 404);
        }
    }

    public function delImage($id)
    {
        $image = ChanceImage::find($id);
        if ($image) {
            $image->delete();
            return response()->json([
                'success' => true,
                'message' => 'image has been deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no image to delete!',
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->except('images');
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
            'cat_id' => 'required',
            'country_id' => 'required',
            'governorate' => 'required',
            'city' => 'required'
            // 'images' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = 'storage/chances/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['logo'] = $name;
        }
        $chance = Chance::create($data);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $file = $image;
                $path = 'storage/chances/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                ChanceImage::create([
                    'chance_id' => $chance->id,
                    'image' => $name
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'chance' => new ChanceResource($chance)
        ], 200);
    }

    public function show($id)
    {
        $chance = Chance::find($id);
        if ($chance) {
            return response()->json([
                'success' => true,
                'chance' => new ChanceResource($chance)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no chnace'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $chance = Chance::find($id);
        if ($chance) {
            $data = $request->except('images');
            $validator = Validator::make($data, [
                'title' => 'required',
                'desc' => 'required',
                // 'logo' => 'required',
                'branches' => 'required',
                'outlets' => 'required',
                'provider' => 'required',
                'number' => 'required',
                'resp' => 'required',
                'price' => 'required',
                'cat_id' => 'required',
                'country_id' => 'required',
                'governorate' => 'required',
                'city' => 'required'
                // 'images' => 'required',
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
            $chance->update($data);
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $file = $image;
                    $path = 'storage/chances/' . date('Y') . '/' . date('m') . '/';
                    $name = $path . time() . '-' . $file->getClientOriginalName();
                    $file->move($path, $name);
                    ChanceImage::create([
                        'chance_id' => $chance->id,
                        'image' => $name
                    ]);
                }
            }
            return response()->json([
                'success' => true,
                'chance' => new ChanceResource($chance)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no chance'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $chance = Chance::find($id);
        if ($chance) {
            $chance->delete();
            return response()->json([
                'success' => true,
                'message' => 'chance deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no chance'
            ], 404);
        }
    }
}
