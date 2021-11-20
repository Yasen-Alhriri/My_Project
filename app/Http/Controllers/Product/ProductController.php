<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\CategoryProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest(
            'name',
            'description',
            'image',
            'price',
            'size',
            'unit',
            'count_visits',
        )->paginate(4);
        $count = 0;
        return view('product.product.index', compact('products', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryProduct::all();
        // dd($categories);
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', '=', $id)->first();

        return view('product.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', '=', $id)->first();
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id', '=', $id)->first();
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_description');
        $product->price = $request->input('price_product');
        $product->size = $request->input('size_product');
        $product->unit = $request->input('unit_product');
        $product->category = $request->input('category');


        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('image/course/', $filename);
            $product->image = $filename;
        }

        $product->update();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', '=', $id)->first();
        $product->delete();
        return redirect()->back();
    }

    public function softDelete($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function softDeleteShow()
    {
        $products = Product::onlyTrashed()->latest(
            'name',
            'presenter',
            'description',
            'image'
        )->paginate(4);
        $count = 0;
        return view('product.product.softDelete', compact('products', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function backFromSoftDelete($id)
    {

        $product = Product::onlyTrashed()->where('id', $id)->first()->restore();
        //  dd($product);

        return redirect()->back();
    }
}
