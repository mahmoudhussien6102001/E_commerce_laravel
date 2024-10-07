@extends('dashboard.layouts.master') 
@section('title' ,  __('create-dash.Create Product'))

@section('main-content')

<div class="container container-custom my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">  {{-- Column width adjusts based on screen size --}}
            <div class="card card-custom mb-4">
                
                <div class="card-header">
                    <strong class="card-title fs-4">{{ __('create-dash.Create Product') }}</strong>  {{-- Font size adjusted --}}
                </div>
                
                <div class="card-body card-body-custom">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('dashboard.pages.Product.form') 
                                <div class="d-flex justify-content-between"> 
                                    <button type="submit" class="btn btn-custom">{{ __('create-dash.Reset') }}</button>
                                    <button type="reset" class="btn btn-custom-reset">{{ __('create-dash.Reset') }}</button>
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
