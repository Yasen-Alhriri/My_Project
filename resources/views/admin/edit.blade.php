@extends('layouts.layout')

@section('title', 'Edit profile')
@section('PageName', 'Edit profile')

@section('content')

    <!--  -->


    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: -webkit-fill-available;">

        {{-- Alert Messages --}}
        @include('common.alert')

        <div class="card">
            <div class="card-body p-3">

                <form action="{{ route('admin.update', $admin->id) }}" method="post" enctype="multipart/form-data"
                    class="container mt-5">
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="f_name" placeholder="Name"
                            value="{{ $admin->F_name }}" required>
                        <label for="floatingInput">First Name</label>
                        {{-- Error --}}
                        @include('common.error', [$name='f-name'])
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="l_name" placeholder="Name"
                            value="{{ $admin->L_name }}" required>
                        <label for="floatingInput">last Name</label>
                        {{-- Error --}}
                        @include('common.error', [$name='l_name'])
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $admin->name }}"
                            required>
                        <label for="floatingInput">Name</label>
                        {{-- Error --}}
                        @include('common.error', [$name='name'])
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email"
                            placeholder="example@gmail.com" value="{{ $admin->email }}" required>
                        <label for="floatingInput">Email</label>
                        {{-- Error --}}
                        @include('common.error', [$name='email'])
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="phone" placeholder="07########"
                            value="{{ $admin->phone }}" required>
                        <label for="floatingInput">phone</label>
                        {{-- Error --}}
                        @include('common.error', [$name='phone'])
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="floatingInput" name="image" placeholder="User image">
                        <label for="floatingInput">User image</label>
                        {{-- Error --}}
                        @include('common.error', [$name='image'])
                    </div>



                    <button type="submit" class="btn btn-primary">Save profile</button>
                    <a href="{{ route('profile') }}" class="btn btn-secondary" aria-current="page">Back</a>
                </form>

            </div>
        </div>
    </div>

@endsection
