@extends('layouts.layout')

@section('title', 'Category Product')
@section('PageName', 'Category Product')

@section('content')




    <!--  -->
    <div class="col-lg-7 mb-lg-0 mb-4" style="min-width: -webkit-fill-available;">

        {{-- Alert Messages --}}
        @include('common.alert')

        <div class="card" style="min-width: fit-content;">
            <div class="card-body p-3">

                {{-- Soft Delete --}}
                <div>
                    <a href="{{ route('categoryProduct.create') }}" class="btn btn-primary">Add Category Product</a>
                    <a href="{{ route('categoryProduct.soft.delete.show') }}" class="btn btn-info" aria-current="page">Soft Delete</a>
                </div>

                {{--  --}}

                <table class="table table-hover container">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">
                                    <p>{{ ++$count }}</p>
                                </th>
                                <td>
                                    <img src="{{ asset('image/category/' . $category->image) }}" class="rounded"
                                        alt="..." width="70px" height="70px">
                                </td>
                                <td>
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                </td>
                                <td>
                                    {{--  --}}
                                    <div class="btn-group gap-1">

                                        {{-- <a href="{{ route('categoryProduct.show', $category->id) }}" class="btn btn-primary"
                                                aria-current="page">Show</a> --}}
                                        <a href="{{ route('categoryProduct.edit', $category->id) }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ route('categoryProduct.get.product.by.category', $category->id) }}"
                                            class="btn btn-primary">Show Product</a>
                                        <form action="{{ route('categoryProduct.soft.delete', $category->id) }}" method="post">
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



    {{ $categories->links() }}
@endsection
