<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChanceResource;
use App\Http\Resources\OrderResource;
use App\Models\Cat;
use App\Models\Chance;
use App\Models\Country;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DataController extends Controller
{
    public function data()
    {
        Carbon::setLocale('ar');
        $users = User::where('userType', 'user')->get();
        $admins = User::where('userType', 'admin')->orWhere('userType', 'superadmin')->get();
        $countries = Country::all();
        $chances = Chance::all();
        $cats = Cat::all();
        $orders = Order::all();
        $latestChances = Chance::limit(3)->latest('id')->get();
        $latestOrders = Order::limit(3)->latest('id')->get();
        return response()->json([
            'success' => true,
            'admins' => count($users),
            'users' => count($admins),
            'countries' => count($countries),
            'chances' => count($chances),
            'cats' => count($cats),
            'orders' => count($orders),
            'latestChances' => ChanceResource::collection($latestChances),
            'latestOrders' => OrderResource::collection($latestOrders),
        ], 200);
    }
}
