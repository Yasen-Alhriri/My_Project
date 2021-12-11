@extends('layouts.layout')

@section('PageName', 'Course')

@section('content')




    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        <div class="card">
            <div class="card-body p-3">

                    {{-- Soft Delete --}}
                    <div>
                        <a href="{{ route('course.create') }}" class="btn btn-primary">Add Course</a>

                        <a href="{{ route('course.soft.delete.show') }}" class="btn btn-info"
                            aria-current="page">Soft Delete</a>
                    </div>
                        {{--  --}}

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
                                        <img src="{{ asset('image/course/' . $course->image) }}" class="card-img-top"
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
                                                <button type="submit" class="btn btn-danger">Soft Delete</button>
                                            </form>
                                            <a href="{{ route('course.get.video.by.course', $course->id) }}"
                                                class="btn btn-success">Show Videos</a>
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
