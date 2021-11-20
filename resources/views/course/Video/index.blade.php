@extends('layouts.layout')

@section('content')


    <!--  -->
    <div class="alert alert-info container w-50" role="alert">
        <a href="{{ route('video.create') }}" class="btn btn-primary btn-lg ">Add video to Course</a>
        <span>Clic to add Video to Course</span>
    </div>






    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="width: auto;">

        <div class="card">
            <div class="card-body p-3">
                <div class="row">

                    {{-- Soft Delete --}}
                    <div>
                        <a href="{{ route('course.soft.delete.show') }}" class="btn btn-info" aria-current="page">Soft
                            Delete</a>
                    </div>
                    {{--  --}}

                    <table class="table table-hover container">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">video Order</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <th scope="row">
                                        <p>{{ ++$count }}</p>
                                    </th>
                                    <td>
                                        <h5 class="card-title">{{ $video->name }}</h5>
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $video->video_Order }}</h5>
                                    </td>
                                    <td>
                                        {{--  --}}
                                        <div class="btn-group">

                                            <a href="{{ route('video.show', $video->id) }}" class="btn btn-primary"
                                                aria-current="page">Show</a>
                                            <a href="{{ route('video.edit', $video->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <form action="{{ route('course.soft.delete', $video->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Soft Delete</button>
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



        {{ $videos->links() }}
    @endsection
