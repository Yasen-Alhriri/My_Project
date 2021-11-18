@extends('layouts.layout')


@section('title', 'Show Course')

@section('content')


    <!--  -->





    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="width: auto;">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">




                    <table class="table table-hover container">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <th scope="row">
                                    <p>{{ $course->id }}</p>
                                </th>
                                <td>
                                    <img src="{{ asset('image/course/' . $course->image) }}" class="card-img-top"
                                    alt="..." width="50px" height="50px">

                                </td>
                                <td>
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                </td>
                                <td>
                                    <p class="card-text">{{ $course->description }}</p>
                                </td>
                                <td>
                                    <div class="btn-group">

                                        <a href="{{ route('course.edit', $course->id) }}"
                                            class="btn btn-success">Edit</a>
                                        <form action="{{route('course.soft.delete' , $course->id)}}" method="post">
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
        <a href="{{ route('Course.index') }}" class="btn btn-secondary" aria-current="page">Back</a>



    @endsection
