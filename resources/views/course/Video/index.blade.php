@extends('layouts.layout')

@section('PageName', 'Video')

@section('content')





    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        <div class="card">
            <div class="card-body p-3">

                <a href="{{ route('video.create') }}" class="btn btn-primary">Add video to Course</a>



                    <table class="table table-hover container">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">video Order</th>
                                <th scope="col">Course</th>
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
                                        <h5 class="card-title">{{ $video->course->name }}</h5>
                                    </td>
                                    <td>
                                        {{--  --}}
                                        <div class="btn-group">

                                            <a href="{{ route('video.show', $video->id) }}" class="btn btn-primary"
                                                aria-current="page">Show</a>
                                            <a href="{{ route('video.edit', $video->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <form action="{{ route('video.delete', $video->id) }}" method="post">
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



        {{ $videos->links() }}
    @endsection
