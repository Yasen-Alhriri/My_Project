@extends('layouts.layout')

@section('title', 'Product')
@section('PageName', 'Product')

@section('content')


    <!--  -->





    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: -webkit-fill-available;">

        {{-- Alert Messages --}}
        @include('common.alert')

        <div class="card" style="min-width: fit-content;">
            <div class="card-body p-3">

                {{-- Soft Delete --}}
                <div>
                    <a href="{{ route('product.soft.delete.show') }}" class="btn btn-info" aria-current="page">Soft
                        Delete</a>
                </div>
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
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">
                                    <p>{{ ++$count }}</p>
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

                                        {{-- <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary"
                                            aria-current="page">Show</a> --}}
                                        <form action="{{ route('product.soft.delete', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Soft Delete</button>
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



    {{ $products->links() }}
@endsection
