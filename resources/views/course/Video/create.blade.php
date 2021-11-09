@extends('layouts.layout')

@section('title', 'Create Video')
@section('PageName', 'Create Video')

@section('content')

<div class="col-lg-7 mb-lg-0 mb-4 container" style="width: auto;">

    <div class="card">
        <div class="card-body p-3">
            <div class="row">

    <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data" class="container mt-5">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" required>
            <label for="floatingInput">Video Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="url" required>
            <label for="floatingInput">Video URL</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="video_Order" required>
            <label for="floatingInput">Video Order</label>
        </div>
        {{-- <div class="form-floating mb-3">
            <select class="form-select" aria-label="Disabled select example" name="category" >
                @foreach ( $categories as $category )
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div> --}}

        <button type="submit" class="btn btn-primary">Save Video</button>
        <a href="{{ route('video.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

    </form>
            </div></div></div></div>

@endsection
