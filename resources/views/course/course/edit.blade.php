@extends('layouts.layout')

@section('title','Edit Course')
@section('PageName', 'Edit Course')

@section('content')


<form action="{{route('course.update',$course->id)}}" method="post" enctype="multipart/form-data" class="container mt-5">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="course_name" placeholder="Course" value="{{$course->name}}" required>
        <label for="floatingInput">Course Name</label>
      </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="course_presenter" placeholder="Course" value="{{$course->presenter}}" required>
        <label for="floatingInput">Course presenter</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" name="course_description" placeholder="Course" value="{{$course->description}}" required>
          <label for="floatingInput">Course description</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" id="floatingInput" name="image" placeholder="Course">
            <label for="floatingInput">Course image</label>
          </div>

      <button type="submit" class="btn btn-primary">Save course</button>
      <a href="{{ route('Course.index') }}" class="btn btn-secondary"
      aria-current="page">Back</a>
</form>


@endsection

