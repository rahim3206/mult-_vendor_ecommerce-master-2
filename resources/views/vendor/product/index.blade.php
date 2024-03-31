@extends('vendor.layouts.app')
@section('title', 'All Products')
@section('vendor_content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <h6>Products Table</h6>
                            </div>
                            <div>
                                <a class="btn btn-primary btn-sm" href="{{ route('vendor.product.create') }}"> <i class="fa fa-plus"></i> Add Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            #</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Image</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Sub Categories</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="p-4"><p class="text-xs font-weight-bold mb-0">{{ $serial++ }}</p></td>
                                            <td>
                                                <img src="{{ asset('product_image/'. $product->image)}}" height="100px" width="auto" alt="">
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $product->title }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                hj
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <select name="status" class="changeProductStatus  form-select" data-id="{{ $product->id }}" data-url="{{ route('vendor.product.change_product_status') }}">
                                                    <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Published</option>
                                                    <option value="0" {{ $product->status == '0' ? 'selected' : '' }}>Draft</option>
                                                </select>
                                            </td>
                                            <td class="align-middle ">
                                                <a href="{{ route('vendor.product.edit', $product->id) }}" class="btn text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>&nbsp;
                                                <form action="{{ route('vendor.product.destroy', $product->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="text-danger font-weight-bold text-xs btn"
                                                        data-toggle="tooltip" data-original-title="Delete user">
                                                        Delete
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="w-100 d-flex justify-content-end p-3">
                                <div>
                                    {{ $products->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
