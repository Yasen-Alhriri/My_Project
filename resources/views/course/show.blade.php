@extends('layouts.layout')


@section('title','Show Course')

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
                                <th scope="row"><p>{{$course->id}}</p>
                                </th>
                                <td>
                                    <img src="{{ asset('course_image/' . $course->image) }}" class="card-img-top" alt="...">
                                </td>
                                <td>
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                </td>
                                <td>
                                    <p class="card-text">{{ $course->description }}</p>
                                </td>

                            </tr>
                            </tbody>
                          </table>


                        </div>
                    </div>
                </div>
                <a href="{{ route('Course.index') }}" class="btn btn-secondary"
aria-current="page">Back</a>



        @endsection
