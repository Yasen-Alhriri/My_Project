@extends('layouts.layout')


@section('title', 'Show Category Product')
@section('PageName', 'Show Category Product')

@section('content')



    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        <div class="card">
            <div class="card-body p-3">

                {{-- Soft Delete --}}
                <a href="{{ route('categoryProduct.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

                {{--  --}}

                <table class="table table-hover container">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <th scope="row">
                            </th>
                            <td>
                                <img src="{{ asset('image/category/' . $category->image) }}" class="card-img-top"
                                    alt="..." width="50px" height="50px">
                            </td>
                            <td>
                                <h5 class="card-title">{{ $category->name }}</h5>
                            </td>
                            <td>
                                {{--  --}}
                                <div class="btn-group">


                                    <a href="{{ route('course.edit', $category->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('categoryProduct.delete', $category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>




            </div>
        </div>
    </div>


@endsection
