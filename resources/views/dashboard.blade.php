@extends('layouts.layout')

@section('title', 'Dashboard')
@section('PageName', 'Dashboard')


@section('dashboard')


    {{-- Statistics --}}
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money </p>
                                <h5 class="font-weight-bolder mb-0">
                                    $53,000
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Users</p>
                                <h5 class="font-weight-bolder mb-0">
                                    2,300
                                    <span class="text-success text-sm font-weight-bolder">+3%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
                                <h5 class="font-weight-bolder mb-0">
                                    +3,462
                                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
                                <h5 class="font-weight-bolder mb-0">
                                    $103,430
                                    <span class="text-success text-sm font-weight-bolder">+5%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Statistics --}}
    {{--  --}}
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Product
                        <a href="{{ route('product.index') }}" class="btn btn-info float-md-end
                    ">See
                            All</a>
                    </h6>

                </div>
                <div class="card-body p-3">
                    <div class="chart">
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
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">
                                            <p>{{ ++$count }}</p>
                                        </th>
                                        <td>
                                            <h6 class="card-title">
                                                {{ $product->user->f_name . ' ' . $product->user->l_name }}</h6>
                                        </td>
                                        <td>
                                            <img src="{{ asset('image/product/' . $product->image) }}"
                                                class="card-img-top" alt="..." width="50px" height="50px">
                                        </td>
                                        <td>
                                            <h6 class="card-title">{{ $product->name }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-title">{{ $product->description }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="card-title">{{ $product->categoryProduct->name }}</h6>
                                        </td>
                                        <td>
                                            {{--  --}}
                                            <div class="btn-group gap-1">

                                                {{-- <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary"
                                                    aria-current="page">Show</a> --}}
                                                <form action="{{ route('product.soft.delete', $product->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    {{-- <i type="submit" class="fas fa-minus-square bg-gradient-light  text-primary"></i> --}}
                                                    <button type="submit" class="btn"><i type="submit"
                                                            class="fas fa-minus-square text-primary"></i></button>
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
        </div>
    </div>



@endsection
