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
        $courses = Course::where('deleted_at', '=', '0')->latest(
            'name',
            'presenter',
            'description',
            'image',
            'category'
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
        $request->validate([
            'name'=>'required|max:50',
            'presenter'=>'required|max:50',
            'description'=>'nullable|max:1000',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required'
        ]);

        $course = new Course;
        $course->name = $request->input('name');
        $course->presenter = $request->input('presenter');
        $course->description = $request->input('description');
        $course->category = $request->input('category');
        $course->deleted_at = 0;


        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('image/course/', $filename);
            $course->image = $filename;
        }

        $course->save();
        return redirect()->route('Course.index')->with('success', 'This course has been Stored.');
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
        $categories = CategoryCourse::where('id','<>',$course->category)->get();
        return view('course.course.edit', compact('course','categories'));
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
        $request->validate([
            'name'=>'required|max:50',
            'presenter'=>'required|max:50',
            'description'=>'nullable|max:1000',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required'
        ]);
        $course = Course::where('id', '=', $id)->first();
        $course->name = $request->input('name');
        $course->presenter = $request->input('presenter');
        $course->description = $request->input('description');
        $course->category = $request->input('category');

        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('image/course/', $filename);
            $course->image = $filename;
        }

        $course->update();
        return redirect()->route('Course.index')->with('success', 'This course has been Update.');
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
        return redirect()->route('Course.index')->with('success', 'This course has been deleted.');
    }

    // Get All Courses By Category Id
    public function getCoursesByCategoryId($id)
    {
        $courses = Course::where('category', '=', $id)->where('deleted_at', '=', '0')->get();
        $count = 0;
        // dd($courses);
        return view('course.categoryCourse.showCourses', compact('courses', 'count'));
    }

    public function softDelete($id)
    {
        $course = Course::find($id);
        $course->deleted_at = 1;
        $course->update();
        return redirect()->back()->with('success', 'This course has been soft deleted.');
    }

    //
    public function backFromSoftDelete($id)
    {
        //  dd($product);

        $course = Course::where('id', '=', $id)->first();
        $course->deleted_at = 0;
        $course->save();

        return redirect()->back()->with('success', 'This course has been returned.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function softDeleteShow()
    {
        $courses = Course::where('deleted_at', '=', '1')->latest(
            'name',
            'presenter',
            'description',
            'image'
        )->paginate(4);
        $count = 0;
        return view('course.course.softDelete', compact('courses', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


}
