@extends('layouts.layout')

@section('PageName', 'User Show')

@section('content')



    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        <div class="card">
            <div class="card-body p-3">

                <a href="{{ route('user.index') }}" class="btn btn-secondary" aria-current="page">Back</a>


                    <table class="table table-hover container">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>


                        <tbody>
                                <tr>
                                    <th scope="row">
                                        <p>1</p>
                                    </th>
                                    <td>
                                        <h5 class="card-title">{{ $user->f_name .' '. $user->l_name }}</h5>
                                    </td>
                                    <td>
                                        <img src="{{ asset('image/user/' . $user->image) }}" class="card-img-top"
                                            alt="..." width="50px" height="50px">
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

                                                <form action="{{route('user.soft.delete' , $user->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Soft Delete</button>
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
