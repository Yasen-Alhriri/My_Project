@extends('layouts.layout')

@section('PageName', 'Notification Rep')

@section('content')



    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        <div class="card">
            <div class="card-body p-3">


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
                            @foreach ($reportVideo as $reportVideo)
                                <tr>
                                    <th scope="row">
                                        <p>{{ ++$count }}</p>
                                    </th>
                                    <td>
                                        <h5 class="card-title">{{ $reportVideo->user->phone  }}</h5>
                                    </td>
                                    {{-- <td>
                                        <h5 class="card-title">{{ $reportVideo->l_name }}</h5>
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $reportVideo->gender }}</h5>
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $reportVideo->phone }}</h5> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>




                </div>
            </div>
        </div>



        {{-- {{ $reportVideo->links() }} --}}
    @endsection
