@extends('layouts.layout')

@section('PageName', 'Video')

@section('content')





    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: -webkit-fill-available;">


        {{-- Alert Messages --}}
        @include('common.alert')


        <div class="card" style="min-width: fill-available;">
            <div class="card-body p-3">

                <a href="{{ route('video.create') }}" class="btn btn-primary">Add video to Course</a>



                <table class="table table-hover container">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Video</th>
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

                                    <iframe width="70" height="70"
                                        src="https://www.youtube-nocookie.com/embed/{{ $video->url }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </td>
                                <td>
                                    <h5 class="card-title">{{ $video->video_Order }}</h5>
                                </td>
                                <td>
                                    <h5 class="card-title">{{ $video->course->name }}</h5>
                                </td>
                                <td>
                                    {{--  --}}
                                    <div class="btn-group gap-1">

                                        <a href="{{ route('video.show', $video->id) }}" class="btn btn-primary"
                                            aria-current="page">Show</a>
                                        <a href="{{ route('video.edit', $video->id) }}" class="btn btn-success">Edit</a>
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
