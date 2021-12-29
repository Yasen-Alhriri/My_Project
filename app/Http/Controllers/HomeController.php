<?php

namespace App\Http\Controllers;
use App\Models\Product\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('deleted_at', '=', '0')->latest(
            'name',
            'description',
            'image',
            'price',
            'size',
            'unit',
            'count_visits',
        )->paginate(5);
        $count = 0;
        return view('dashboard', compact('products', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
}
