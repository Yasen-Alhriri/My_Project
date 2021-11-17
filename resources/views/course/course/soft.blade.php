@extends('layouts.layout')


@section('title','Soft Delete Courses')
@section('content')


    <!--  -->
    <div class="alert alert-info container w-50" role="alert">
        <a href="{{ route('course.create') }}" class="btn btn-primary btn-lg ">Add Course</a>
        <span>Clic to add course</span>
    </div>






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
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>


                        <tbody>
                                @foreach ($courses as $course)
                                <tr>
                                    <th scope="row">
                                        <p>{{ ++$count }}</p>
                                    </th>
                                    <td>
                                        <img src="{{ asset('course_image/' . $course->image) }}" class="card-img-top"
                                            alt="..." width="50px" height="50px">
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $course->name }}</h5>
                                    </td>
                                    <td>
                                        {{--  --}}
                                        <div class="btn-group">

                                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-primary"
                                                aria-current="page">Show</a>
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
                                @endforeach
                            </tbody>
                    </table>




                </div>
            </div>
        </div>



        {{ $courses->links() }}
    @endsection
