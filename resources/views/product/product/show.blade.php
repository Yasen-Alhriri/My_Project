@extends('layouts.layout')

@section('title', 'Product')
@section('PageName', 'Product')

@section('content')


    <!--  -->





    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">


        {{-- Alert Messages --}}
        @include('common.alert')

        <div class="card">
            <div class="card-body p-3">

                <a href="{{ route('product.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

                {{--  --}}

                <table class="table table-hover container">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <th scope="row">
                                <p>{{ $product->id }}</p>
                            </th>
                            <td>
                                <h5 class="card-title">{{ $product->user->f_name . ' ' . $product->user->l_name }}</h5>
                            </td>
                            <td>
                                <img src="{{ asset('image/product/' . $product->image) }}" class="card-img-top" alt="..."
                                    width="50px" height="50px">
                            </td>
                            <td>
                                <h5 class="card-title">{{ $product->name }}</h5>
                            </td>
                            <td>
                                <h5 class="card-title">{{ $product->description }}</h5>
                            </td>
                            <td>
                                <h5 class="card-title">{{ $product->categoryProduct->name }}</h5>
                            </td>
                            <td>
                                {{--  --}}
                                <div class="btn-group">

                                    @if ($product->deleted_at === 0)

                                        <form action="{{ route('product.soft.delete', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Soft Delete</button>
                                        </form>

                                    @else
                                        <a href="{{ route('product.back.soft.delete', $product->id) }}"
                                            class="btn btn-primary" aria-current="page">Back</a>
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
