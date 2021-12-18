@extends('layouts.layout')

@section('title', 'Edit Course')
@section('PageName', 'Edit Course')

@section('content')

    <!--  -->


    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: -webkit-fill-available;">

        {{-- Alert Messages --}}
        @include('common.alert')

        <div class="card">
            <div class="card-body p-3">

                <form action="{{ route('course.update', $course->id) }}" method="post" enctype="multipart/form-data"
                    class="container mt-5">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="course_name" placeholder="Course"
                            value="{{ $course->name }}" required>
                        <label for="floatingInput">Course Name</label>
                        {{-- Error --}}
                        @include('common.error', [$name='name'])
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="course_presenter"
                            placeholder="Course" value="{{ $course->presenter }}" required>
                        <label for="floatingInput">Course presenter</label>
                        {{-- Error --}}
                        @include('common.error', [$name='presenter'])
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="course_description"
                            placeholder="Course" value="{{ $course->description }}" required>
                        <label for="floatingInput">Course description</label>
                        {{-- Error --}}
                        @include('common.error', [$name='description'])
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="floatingInput" name="image" placeholder="Course">
                        <label for="floatingInput">Course image</label>
                        {{-- Error --}}
                        @include('common.error', [$name='image'])
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Disabled select example" name="category">
                            <option value="{{ $course->categoryCourse->id }}">{{ $course->categoryCourse->name }}
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {{-- Error --}}
                        @include('common.error', [$name='category'])
                    </div>

                    <button type="submit" class="btn btn-primary">Save course</button>
                    <a href="{{ route('Course.index') }}" class="btn btn-secondary" aria-current="page">Back</a>
                </form>

            </div>
        </div>
    </div>

@endsection
