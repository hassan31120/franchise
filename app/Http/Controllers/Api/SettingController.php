<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings()
    {
        $setting = Setting::find(1);
        if ($setting) {
            return response()->json([
                'success' => true,
                'setting' => new SettingResource($setting)
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'msg' => 'there is no settings'
            ], 404);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'about'     => 'required',
            'terms'     => 'required',
            'contact'   => 'required',
            'privacy'   => 'required',
        ]);
        $data = $request->all();
        $setting = Setting::find(1);
        $setting->update($data);
        return response()->json([
            'success' => true,
            'setting' => new SettingResource($setting)
        ], 200);
    }
}
