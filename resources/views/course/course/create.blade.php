@extends('layouts.layout')

@section('title', 'Create Course')
@section('PageName', 'Create Course')

@section('content')

    <div class="col-lg-7 mb-lg-0 mb-4 container" style="width: auto;">

        <div class="card">
            <div class="card-body p-3">
                <div class="row">

                    <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data"
                        class="container mt-5">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="course_name" required>
                            <label for="floatingInput">Course Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="course_presenter" required>
                            <label for="floatingInput">Course presenter</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="course_description" required>
                            <label for="floatingInput">Course description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="image">
                            <label for="floatingInput">Course image</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Disabled select example" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save course</button>
                        <a href="{{ route('Course.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
