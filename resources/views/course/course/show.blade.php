@extends('layouts.layout')


@section('title', 'Show Course')
@section('PageName', 'Show Course')

@section('content')


    <!--  -->



    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: -webkit-fill-available;">

        {{-- Alert Messages --}}
        @include('common.alert')

        <div class="card" style="min-width: fit-content;">
            <div class="card-body p-3">

                <a href="{{ url()->previous() }}" class="btn btn-secondary" aria-current="page">Back</a>



                <table class="table table-hover container">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Presenter</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <th scope="row">
                                <p>1</p>
                            </th>
                            <td>
                                <img src="{{ asset('image/course/' . $course->image) }}" class="rounded " alt="..."
                                    width="70px" height="70px">

                            </td>
                            <td>
                                <h5 class="card-title">{{ $course->name }}</h5>
                            </td>
                            <td>
                                <p class="card-title">{{ $course->presenter }}</p>
                            </td>
                            <td>
                                <p class="card-text">{{ $course->description }}</p>
                            </td>
                            <td>
                                <p class="card-text">{{ $course->categoryCourse->name }}</p>
                            </td>
                            <td>
                                <div class="btn-group gap-1">

                                    <a href="{{ route('course.edit', $course->id) }}" class="btn btn-success">Edit</a>
                                    {{--  --}}
                                    @if ($course->deleted_at === 1)
                                        <a href="{{ route('course.back.soft.delete', $course->id) }}"
                                            class="btn btn-success">Back</a>
                                        <form action="{{ route('course.delete', $course->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        {{--  --}}
                                    @else
                                        <form action="{{ route('course.soft.delete', $course->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">soft Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>



@endsection
