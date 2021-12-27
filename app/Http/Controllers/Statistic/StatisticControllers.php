<?php

namespace App\Http\Controllers\Statistic;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\Product\Product;
// use App\Models\User\User;
use Illuminate\Http\Request;

class StatisticControllers extends Controller
{
    //
    public function userCount(){

        // Statistics
        $userCount = User::where('deleted_at', '=', '0')->count();
        $productCount= Product::where('deleted_at', '=', '0')->count();
        //
        $products = Product::inRandomOrder('id')->limit(5)->get();
        // dd($userCount);
        return view('dashboard', compact('userCount','productCount','products'));
    }


}
