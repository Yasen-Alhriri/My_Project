<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryProduct::latest(
            'name',
            'image')->paginate(4);
            $count=0;
        return view('product.categoryProduct.index', compact('categories','count'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.categoryProduct.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name	'=>'required',
        //     'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);

            $category = new CategoryProduct;
            $category->name = $request->input('name');


            if ($request->hasFile('image')) {


                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention ;
                $file->move('image/category/' , $filename);
                $category->image = $filename;

            }

            $category->save();
            return redirect()->route('categoryProduct.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = CategoryProduct::where('id','=',$id)->first();
        return view('product.categoryProduct.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryProduct::where('id','=',$id)->first();
        return view('product.categoryProduct.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = CategoryProduct::where('id','=',$id)->first();
        $category->name = $request->input('name');


        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention ;
            $file->move('image/category/' , $filename);
            $category->image = $filename;

        }

        $category->update();
        return redirect()->route('categoryProduct.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryProduct = CategoryProduct::where('id', '=', $id)->first();
        $categoryProduct->delete();
        return redirect()->back();
    }

}
