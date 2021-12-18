@extends('layouts.layout')

@section('PageName', 'Course')

@section('content')




    <!--  -->


    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        {{-- Alert Messages --}}
        @include('common.alert')

        <div class="card">
            <div class="card-body p-3">

                {{-- Soft Delete --}}
                <div>
                    <a href="{{ route('course.create') }}" class="btn btn-primary">Add Course</a>
                    <a href="{{ route('course.soft.delete.show') }}" class="btn btn-info">Soft Delete</a>

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
                                    <img src="{{ asset('image/course/' . $course->image) }}" class="rounded "
                                        alt="..." width="70px" height="70px">
                                </td>
                                <td>
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                </td>
                                <td>
                                    {{--  --}}
                                    <div class="btn-group gap-1">

                                        <a href="{{ route('course.show', $course->id) }}" class="btn btn-primary"
                                            aria-current="page">Show</a>
                                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('course.get.video.by.course', $course->id) }}"
                                            class="btn btn-info">Show Videos</a>
                                        <form action="{{ route('course.soft.delete', $course->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">soft Delete</button>
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
