<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChanceResource;
use App\Models\Chance;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function userFavs()
    {
        $user = Auth::user();
        if ($user) {
            $favs = $user->favourites;
            if (count($favs) > 0) {
                return response()->json([
                    'success' => true,
                    'favs' => ChanceResource::collection($favs)
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'favs' => []
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no user'
            ], 404);
        }
    }

    public function add_to_favs($id)
    {
        $user = Auth::user();
        if ($user) {
            $chance = Chance::find($id);
            if ($chance) {
                Favourite::firstOrCreate([
                    'user_id' => $user->id,
                    'chance_id' => $chance->id
                ]);
                return response()->json([
                    'success' => true,
                    'msg' => 'chance has been added to favs successfully'
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
