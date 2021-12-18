@extends('layouts.layout')


@section('title', 'Show Video')
@section('PageName', 'Shoe Video')

@section('content')





    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">


        {{-- Alert Messages --}}
        @include('common.alert')


        <div class="card">
            <div class="card-body p-3">

                <a href="{{ route('video.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

                {{--  --}}

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
                        <tr>
                            <th scope="row">
                            </th>
                            <td>
                                <h6 class="card-title">{{ $video->name }}</h6>
                            </td>
                            <td>
                                <iframe width="70" height="70"
                                    src="https://www.youtube-nocookie.com/embed/{{ $video->url }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </td>
                            <td>
                                <h6 class="card-title">{{ $video->video_Order }}</h6>
                            </td>
                            <td>
                                <h6 class="card-title">{{ $video->course->name }}</h6>
                            </td>
                            <td>
                                {{--  --}}
                                <div class="btn-group">


                                    <a href="{{ route('video.edit', $video->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('video.delete', $video->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>




            </div>
        </div>
    </div>



@endsection
