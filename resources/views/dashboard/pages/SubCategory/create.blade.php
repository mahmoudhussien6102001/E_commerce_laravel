@extends('dashboard.layouts.master') 
@section('title' , __('create-dash.titleSubcategory'))

@inject('category','App\Models\SubCategory')  

@section('main-content')

<div class="container container-custom my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-custom mb-4">
                
                <div class="card-header">
                    <strong class="card-title  fs-2">{{ __('create-dash.titleSubcategory') }}</strong>
                </div>
                
                <div class="card-body card-body-custom">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('subcategories.store') }}" method="POST">
                                @csrf
                                @include('dashboard.pages.SubCategory.form')
                                <button type="submit" class="btn    btn-custom">{{ __('create-dash.Submit') }}</button>
                                <button type="reset" class="btn     btn-custom-reset">{{ __('create-dash.Reset') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  
@endsection
