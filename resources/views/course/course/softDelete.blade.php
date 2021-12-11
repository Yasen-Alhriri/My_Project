@extends('layouts.layout')


@section('title', 'Soft Delete Courses')
@section('PageName', 'Soft Delete Courses')

@section('content')






    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        <div class="card">
            <div class="card-body p-3">

                <a href="{{ route('Course.index') }}" class="btn btn-secondary" aria-current="page">Back</a>


                    <table class="table table-hover container">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Presenter</th>
                                <th scope="col">Description</th>
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
                                            alt="..." width="50px" height="70px">
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $course->name }}</h5>
                                    </td>
                                    <td>
                                        <p class="card-title">{{ $course->presenter }}</p>
                                    </td>
                                    <td>
                                        <p class="card-title">{{ $course->description }}</p>
                                    </td>
                                    <td>
                                        {{--  --}}
                                        <div class="btn-group">

                                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-primary"
                                                aria-current="page">Show</a>
                                            <a href="{{ route('course.back.soft.delete', $course->id) }}"
                                                class="btn btn-success">Back</a>
                                            <form action="{{ route('course.delete', $course->id) }}" method="post">
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
