<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        if (count($banners) > 0) {
            return response()->json(['success' => true, 'banners' => BannerResource::collection($banners)], 200);
        } else {
            return response()->json(['success' => false, 'msg' => 'there is no banners'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/banners/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        $banner = Banner::create($data);
        return response()->json([
            'success' => true,
            'banner' => new BannerResource($banner)
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'storage/banners/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                $data['image'] = $name;
            }
            $banner->update($data);
            return response()->json([
                'success' => true,
                'banner' => new BannerResource($banner)
            ], 200);
        } else {
            return response()->json(['success' => false, 'msg' => 'there is no banner!'], 404);
        }
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $banner->delete();
            return response()->json(['success' => true, 'msg' => 'banner is removed!'], 200);
        } else {
            return response()->json(['success' => false, 'msg' => 'there is no banner!'], 404);
        }
    }
}
