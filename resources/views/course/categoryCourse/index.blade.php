@extends('layouts.layout')

@section('PageName', 'Category Course')

@section('content')


    <!--  -->
    <div class="alert alert-info container w-50" role="alert">
        <a href="{{ route('categoryCourse.create') }}" class="btn btn-primary btn-lg ">Add Category Course</a>
        <span>Clic to add Category Course</span>
    </div>






    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="width: auto;">

        <div class="card">
            <div class="card-body p-3">
                <div class="row">


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
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">
                                        <p>{{ ++$count }}</p>
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

                                            <a href="{{ route('categoryCourse.show', $category->id) }}"
                                                class="btn btn-primary" aria-current="page">Show</a>
                                            <a href="{{ route('categoryCourse.edit', $category->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <form action="{{ route('course.soft.delete', $category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href="{{ route('categoryCourse.get.courses.by.category', $category->id) }}"
                                                class="btn btn-success">Show Courses</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>




                </div>
            </div>
        </div>



        {{ $categories->links() }}
    @endsection
