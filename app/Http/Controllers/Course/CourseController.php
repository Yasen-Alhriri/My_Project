<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course\Course;
use App\Models\Course\CategoryCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest(
            'name',
            'presenter',
            'description',
            'image'
        )->paginate(4);
        $count = 0;
        return view('course.course.index', compact('courses', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryCourse::all();
        // dd($categories);
        return view('course.course.create', compact('categories'));
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
        //     'name'=>'required',
        //     'presenter'=>'required',
        //     'description'=>'required',
        //     'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'category'=>'required'
        // ]);

        $course = new Course;
        $course->name = $request->input('course_name');
        $course->presenter = $request->input('course_presenter');
        $course->description = $request->input('course_description');
        $course->category = $request->input('category');


        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('image/course/', $filename);
            $course->image = $filename;
        }

        $course->save();
        return redirect()->route('Course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //    echo $course;die;
        $course = Course::where('id', '=', $id)->first();

        // $course = Course::find($course);
        // $course = Course::where('id',$course)->first();
        return view('course.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::where('id', '=', $id)->first();
        return view('course.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::where('id', '=', $id)->first();
        $course->name = $request->input('course_name');
        $course->presenter = $request->input('course_presenter');
        $course->description = $request->input('course_description');

        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('image/course/', $filename);
            $course->image = $filename;
        }

        $course->update();
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::where('id', '=', $id)->first();
        $course->delete();
        return redirect()->back();
    }


    public function softDelete($id)
    {
        $course = Course::find($id)->delete();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function softDeleteShow()
    {
        $courses = Course::onlyTrashed()->latest(
            'name',
            'presenter',
            'description',
            'image'
        )->paginate(4);
        $count = 0;
        return view('course.course.softDelete', compact('courses', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function backFromSoftDelete($id)
    {


        $course = Course::onlyTrashed()->where('id' , $id)->first()->restore() ;
      //  dd($product);

        return redirect()->back();
    }
}
