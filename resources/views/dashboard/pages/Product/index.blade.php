@extends('dashboard.layouts.master')
@section('title', 'Products Page')
@section('main-content')

<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('products.create') }}" class="btn btn-custom1 my-3 text-light font-weight-bold">
                    <span>Add Product</span>
                </a>
            </div>
        </div>
    </div>
</div>

@include('dashboard.pages.Category.indexmessages.messages')

<!-- Table with stripped rows -->
<table class="table table-striped-custom w-100 mx-auto">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Available Quantity</th>
            <th scope="col">Category</th>
            <th scope="col">Subcategory</th>
            <th scope="col" style="white-space: nowrap;">Created By</th>
            <th scope="col" style="white-space: nowrap;">Updated By</th>
            <th scope="col" style="white-space: nowrap;">Created At</th>
            <th scope="col" style="white-space: nowrap;">Updated At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    
    <tbody>
        @forelse ($products as $product)
        <tr>
            <td class="font-weight-bold">{{ $loop->iteration }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ Str::words($product->description, 3, '...') }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>{{ $product->available_quantity }}</td>
            <td>{{ $product->category->name ?? 'N/A' }}</td>
            <td>{{ $product->subcategory->name ?? 'N/A' }}</td>
            <td>{{ $product->create_user->name ?? '...' }}</td>
            <td>{{ $product->update_user->name ?? 'N/A' }}</td>
            <td>{{ $product->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $product->updated_at ? $product->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-flex justify-content-between align-items-center">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6 custom-btn-space">Show</a>
                    @if(auth()->user()->user_type == 'admin')
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm font-weight-bold fs-6 custom-btn-space">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6 custom-btn-space">Delete</button>
                    @endif
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="12" class="text-center">
                <div class="alert alert-danger-custom my-5 w-50 mx-auto">
                    <span>There are no products yet! <a href="{{ route('products.create') }}" class="fw-bold text-danger">Add Products From Here</a></span>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
<!-- End Table with stripped rows -->

<!-- Pagination -->
<div class="my-4 pagination-custom d-flex justify-content-center">
    {{ $products->links() }}
</div>

@endsection
