@extends('layouts.layout')

@section('PageName', 'Notification User')

@section('content')



    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4 container" style="width: auto;">

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
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">
                                        <p>{{ ++$count }}</p>
                                    </th>
                                    <td>
                                        <h5 class="card-title">{{ $user->f_name }}</h5>
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $user->l_name }}</h5>
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $user->gender }}</h5>
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $user->phone }}</h5>
                                    </td>
                                    <td>
                                        {{--  --}}
                                        <div class="btn-group">
                                            <a href="{{ route('user.acceptance.notification', $user->id) }}"
                                                class="btn btn-primary" aria-current="page">Acceptance</a>
                                            <a href="{{ route('user.refused.notification', $user->id) }}"
                                                class="btn btn-success">Refused</a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>




                </div>
            </div>
        </div>



        {{ $users->links() }}
    @endsection
