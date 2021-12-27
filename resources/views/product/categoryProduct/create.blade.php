@extends('layouts.layout')


@section('title', 'Create Category Product')
@section('PageName', 'Create Category Product')

@section('content')



    <form action="{{ route('categoryProduct.store') }}" method="post" enctype="multipart/form-data" class="container mt-5">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" >
            <label for="floatingInput">Category Name</label>
            {{-- Error --}}
            @include('common.error', [$name='name'])
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
            <label for="floatingInput">Category image</label>
            {{-- Error --}}
            @include('common.error', [$name='image'])
        </div>

        <button type="submit" class="btn btn-primary">Save Category</button>
        <a href="{{ route('categoryProduct.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

    </form>


@endsection
