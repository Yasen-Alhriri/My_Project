@extends('layouts.layout')

@section('title','Product')
@section('PageName', 'Product')

@section('content')


    <!--  -->





    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: fit-content;">

        <div class="card">
            <div class="card-body p-3">

                <a href="{{ route('product.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

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
                                <tr>
                                    <th scope="row">
                                        <p>{{ $product->id }}</p>
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

                                            
                                            <form action="{{route('product.soft.delete' , $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
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
