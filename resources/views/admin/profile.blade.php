@extends('layouts.layout')


@section('content')




    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        <div class="card">
            <div class="card-body p-3">

                {{-- Soft Delete --}}

                <table class="table table-hover container">
                    <thead>
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <th scope="row">
                                <p>1</p>
                            </th>
                            <td>
                                <img src="{{ asset('image/admin/' . $admin->image) }}" class="card-img-top" alt="..."
                                    width="50px" height="50px">
                            </td>
                            <td>
                                <h5 class="card-title">{{ $admin->name }}</h5>
                            </td>
                            <td>
                                <h5 class="card-title">{{ $admin->email }}</h5>
                            </td>
                            <td>
                                {{--  --}}
                                <div class="btn-group">

                                    <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-success">Edit</a>
                                    @if (Auth::user()->role == 1)
                                        <a href="{{ route('admin.show') }}" class="btn btn-primary"
                                            aria-current="page">Show Other Admin</a>
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
