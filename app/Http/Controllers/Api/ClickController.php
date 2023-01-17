<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chance;
use App\Models\Click;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClickController extends Controller
{
    public function addClick($id){
        $user = Auth::user();
        if ($user) {
            $chance = Chance::find($id);
            if ($chance) {
                Click::create([
                    'user_id' => $user->id,
                    'chance_id' => $chance->id
                ]);
                return response()->json([
                    'success' => true,
                    'msg' => 'chance has been added to clicks successfully'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'msg' => 'there is no chance'
                ], 404);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no user'
            ], 404);
        }
    }
}
