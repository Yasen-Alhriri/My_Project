@extends('layouts.layout')

@section('title', 'Create Course')
@section('PageName', 'Create Course')

@section('content')

    <div class="col-lg-7 mb-lg-0 mb-4 container" style="width: auto;">


        {{-- Alert Messages --}}
        @include('common.alert')


        <div class="card">
            <div class="card-body p-3">
                <div class="row">

                    <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data"
                        class="container mt-5">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                            <label for="floatingInput">Course Name</label>
                            {{-- Error --}}
                            @include('common.error', [$name='name'])
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('presenter') is-invalid @enderror" name="presenter" value="{{old('presenter')}}">
                            <label for="floatingInput">Course presenter</label>
                            {{-- Error --}}
                            @include('common.error', [$name='presenter'])
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}">
                            <label for="floatingInput">Course description</label>
                            {{-- Error --}}
                            @include('common.error', [$name='description'])
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                            <label for="floatingInput">Course image</label>
                            {{-- Error --}}
                            @include('common.error', [$name='image'])
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select @error('category') is-invalid @enderror" aria-label="Disabled select example" name="category">
                                <option value="">Choose Category</option>
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
    </div>

@endsection
