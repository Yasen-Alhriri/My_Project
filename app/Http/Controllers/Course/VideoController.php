<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course\Video;
use App\Models\Course\Course;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest(
            'id_course',
            'url',
            'name',
            'video_Order'
        )->paginate(4);

        $count =0 ;
        return view('course.Video.index', compact('videos' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('course.Video.create', compact('courses'));
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
        //     'id_course'=>'required',
        //     'url'=>'required',
        //     'name'=>'required',
        //     'video_Order'=>'required',
        // ]);

        $video = new Video;
        $video->id_course = $request->input('id_course');
        $video->url = $request->input('url');
        $video->name = $request->input('name');
        $video->video_Order = $request->input('video_Order');


        $video->save();
        return redirect()->route('video.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::where('id','=',$id)->first();
        return view('course.Video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::where('id','=',$id)->first();
        return view('course.Video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::where('id','=',$id)->first();

        $request->validate([
            'id_course'=>'required',
            'url'=>'required',
            'name'=>'required',
            'video_Order'=>'required',
        ]);

        $video->id_course = $request->input('id_course');
        $video->url = $request->input('url');
        $video->name = $request->input('name');
        $video->video_Order = $request->input('video_Order');


        $video->update();
        return redirect()->route('video.store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::where('id', '=', $id)->first();
        $video->delete();
        return redirect()->back();
    }


    public function getVideosByCourseId ($id){
        $videos = Video::where('id_course', '=', $id)->get();
        $count = 0 ;
        // dd($courses);
        return view('course.course.showVideos', compact('videos', 'count'));
    }
}
