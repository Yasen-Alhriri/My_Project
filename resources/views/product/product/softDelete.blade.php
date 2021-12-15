@extends('layouts.layout')


@section('title','Soft Delete Product')
@section('PageName', 'Soft Delete Product')

@section('content')


    <!--  -->
    <div>

        <a href="{{ route('product.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

    </div>







    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="width: auto;">


        {{-- Alert Messages --}}
        @include('common.alert')

        <div class="card">
            <div class="card-body p-3">
                <div class="row">


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
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">
                                        <p>{{ ++$count }}</p>
                                    </th>
                                    <td>
                                        <img src="{{ asset('image/product/' . $product->image) }}" class="card-img-top"
                                            alt="..." width="50px" height="50px">
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                    </td>
                                    <td>
                                        {{--  --}}
                                        <div class="btn-group">

                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary"
                                                aria-current="page">Show</a>
                                            <a href="{{ route('product.back.soft.delete', $product->id) }}" class="btn btn-primary"
                                                aria-current="page">Back</a>
                                            <form action="{{route('product.delete' , $product->id)}}" method="post">
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



        {{ $products->links() }}
    @endsection
