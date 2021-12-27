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
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $video->name }}" >
                            <label for="floatingInput">Video Name</label>
                            {{-- Error --}}
                            @include('common.error', [$name='name'])
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="https://www.youtube.com/watch?v={{ $video->url }}" >
                            <label for="floatingInput">Video URL</label>
                            {{-- Error --}}
                            @include('common.error', [$name='url'])
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('video_Order') is-invalid @enderror" name="video_Order" value="{{ $video->video_Order }}"
                                >
                            <label for="floatingInput">Video Video Order</label>
                            {{-- Error --}}
                            @include('common.error', [$name='video_Order'])
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select @error('id_course') is-invalid @enderror" aria-label="Disabled select example" name="id_course">
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
