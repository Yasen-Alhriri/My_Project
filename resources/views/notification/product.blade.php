@extends('layouts.layout')

@section('PageName', 'Notification Product')

@section('content')



    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4 container" style="width: auto;">

        <div class="card">
            <div class="card-body p-3">
                <div class="row">


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
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">
                                        <p>{{ ++$count }}</p>
                                    </th>
                                    <td>
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                    </td>
                                    <td>
                                        <img src="{{ asset('image/product/' . $product->image) }}" class="card-img-top"
                                            alt="..." width="50px" height="50px">
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $product->description }}</h5>
                                    </td>
                                    <td>
                                        <h5 class="card-title">{{ $product->phone }}</h5>
                                    </td>
                                    <td>
                                        {{--  --}}
                                        <div class="btn-group">
                                            <a href="{{ route('product.acceptance.notification', $product->id) }}"
                                                class="btn btn-primary" aria-current="page">Acceptance</a>
                                            <a href="{{ route('product.refused.notification', $product->id) }}"
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



        {{ $products->links() }}
    @endsection
