@extends('dashboard.layouts.master') 
@section('title' , 'Create Product')

@section('main-content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-7">  <!-- Adjusted column width to be larger -->
            <div class="card card-custom mb-4">
                
                <div class="card-header">
                    <strong class="card-title fs-4">Create Product</strong>  <!-- Font size adjusted -->
                </div>
                
                <div class="card-body card-body-custom">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('products.store') }}" method="POST">
                                @csrf
                                @include('dashboard.pages.Product.form') <!-- Include form partial for products -->
                                <div class="d-flex justify-content-between">  <!-- Make buttons responsive -->
                                    <button type="submit" class="btn btn-custom">Submit</button>
                                    <button type="reset" class="btn btn-custom-reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
