<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class NotificationProductController extends Controller
{
    //
    public function addProduct()
    {
        $products = Product::whereNull('deleted_at')->latest(
            'name',
            'description',
            'image'
        )->paginate(4);
        $count = 0;
        return view('notification.product', compact('products', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //
    public function productAcceptance($id)
    {
        $product = Product::where('id', '=', $id)->first();
        $product->deleted_at = 1;
        $product->update();
        return redirect()->back();
    }

    //
    public function productRefused($id)
    {
        $product = Product::where('id', '=', $id)->first();
        $product->deleted_at = 0;
        $product->update();
        return redirect()->back();
    }
}
