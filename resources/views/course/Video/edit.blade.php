@extends('layouts.layout')

@section('title', 'Edit Video')
@section('PageName', 'Edit Video')

@section('content')

    <div class="col-lg-7 mb-lg-0 mb-4 container" style="width: auto;">


        {{-- Alert Messages --}}
        @include('common.alert')


        <div class="card">
            <div class="card-body p-3">
                <div class="row">

                    <form action="{{ route('video.update', $video->id) }}" method="post" enctype="multipart/form-data"
                        class="container mt-5">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" value="{{ $video->name }}" required>
                            <label for="floatingInput">Video Name</label>
                            {{-- Error --}}
                            @include('common.error', [$name='name'])
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="url" value="{{ $video->url }}" required>
                            <label for="floatingInput">Video URL</label>
                            {{-- Error --}}
                            @include('common.error', [$name='url'])
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="video_Order" value="{{ $video->video_Order }}"
                                required>
                            <label for="floatingInput">Video Video Order</label>
                            {{-- Error --}}
                            @include('common.error', [$name='video_Order'])
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Disabled select example" name="id_course">
                                <option value="{{ $video->course->id }}">{{ $video->course->name }}</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                            {{-- Error --}}
                            @include('common.error', [$name='id_course'])
                        </div>

                        <button type="submit" class="btn btn-primary">Update Video</button>
                        <a href="{{ route('video.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
