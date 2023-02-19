<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChanceResource;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chance;
use App\Models\Order;

class OrderController extends Controller
{
    public function userOrders()
    {
        $user = auth('sanctum')->user();
        if ($user) {
            $oredrs = $user->Orders;
            if (count($oredrs) > 0) {
                return response()->json([
                    'success' => true,
                    'oredrs' => ChanceResource::collection($oredrs)
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'oredrs' => []
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no user'
            ], 404);
        }
    }

    public function add_to_oredrs($id)
    {
        $user = auth('sanctum')->user();
        if ($user) {
            $chance = Chance::find($id);
            if ($chance) {
                Order::firstOrCreate([
                    'user_id' => $user->id,
                    'chance_id' => $chance->id
                ]);
                return response()->json([
                    'success' => true,
                    'msg' => 'chance has been added to oredrs successfully'
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

    public function del_order($id)
    {
        $user = auth('sanctum')->user();
        if ($user) {
            $chance = Chance::find($id);
            if ($chance) {
                $order = Order::where('user_id', $user->id)->where('chance_id', $chance->id)->first();
                if (isset($order)) {
                    $order->delete();
                    return response()->json([
                        'success' => true,
                        'msg' => 'chance has been deleted from oredrs successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'msg' => 'this chance is not a Order for this user'
                    ], 404);
                }
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

    public function orders()
    {
        $orders = Order::all();
        if (count($orders) > 0) {
            return OrderResource::collection($orders);
        } else {
            return response()->json([
                'success' => false,
                'orders' => []
            ], 200);
        }
    }

    public function delOrder($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return response()->json([
                'success' => true,
                'msg' => 'order has been deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'there is no such order'
            ], 404);
        }
    }
}
