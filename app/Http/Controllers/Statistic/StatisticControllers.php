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
        $userCount = User::count();
        // dd($userCount);
        return view('layouts.layout', compact('userCount'));
    }

    //
    public function product(){

    }

    //
    public function video(){

    }
}
