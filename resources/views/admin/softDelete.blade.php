@extends('layouts.layout')

@section('PageName', 'Admin')

@section('content')



    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        <div class="card">
            <div class="card-body p-3">

                <a href="{{ route('admin.show') }}" class="btn btn-secondary" aria-current="page">Back</a>


                <table class="table table-hover container">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">permission</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <th scope="row">
                                    <p>{{ ++$count }}</p>
                                </th>
                                <td>
                                    <img src="{{ asset('image/admin/' . $admin->image) }}" class="card-img-top" alt="..."
                                        width="50px" height="50px">
                                </td>
                                <td>
                                    <h5 class="card-title">{{ $admin->F_name . ' ' . $admin->L_name }}</h5>
                                </td>
                                <td>
                                    <p class="card-title">{{ $admin->name }}</p>
                                </td>


                                <td>
                                    <p class="card-title">{{ $admin->email }}</p>
                                </td>
                                <td>
                                    <p class="card-title">{{ $admin->phone }}</p>
                                </td>
                                <td>
                                    <p class="card-title">{{ $admin->role }}</p>
                                </td>
 <td>
                                    {{--  --}}
                                    <div class="btn-group">
                                        <form action="{{ route('admin.delete', $admin->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                        <form action="{{ route('admin.back.soft.delete', $admin->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Back Soft Delete</button>
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



    {{-- {{$admin->links()}} --}}
@endsection
