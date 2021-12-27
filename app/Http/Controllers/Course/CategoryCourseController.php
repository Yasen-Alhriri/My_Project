<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course\CategoryCourse;
use Illuminate\Http\Request;

class CategoryCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryCourse::latest(
            'name',
            'image'
        )->paginate(4);
        $count = 0;
        return view('course.categoryCourse.index', compact('categories', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.categoryCourse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $category = new CategoryCourse;
        $category->name = $request->input('name');


        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('image/category/', $filename);
            $category->image = $filename;
        }

        $category->save();
        return redirect()->route('categoryCourse.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryCourse  $categoryCourse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = CategoryCourse::where('id', '=', $id)->first();
        return view('course.categoryCourse.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryCourse  $categoryCourse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = CategoryCourse::where('id', '=', $id)->first();
        return view('course.categoryCourse.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryCourse  $categoryCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $category = CategoryCourse::where('id', '=', $id)->first();
        $category->name = $request->input('name');


        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('image/category/', $filename);
            $category->image = $filename;
        }

        $category->update();
        return redirect()->route('categoryCourse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryCourse  $categoryCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryCourse = CategoryCourse::where('id', '=', $id)->first();
        $categoryCourse->delete();
        return redirect()->back();
    }
}
