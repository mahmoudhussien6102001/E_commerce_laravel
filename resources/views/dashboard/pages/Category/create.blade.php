@extends('dashboard.layouts.master') 
@section('title' , __('create-dash.Card Title'))

@inject('category','App\Models\Category')  

@section('main-content')
    <div class="container w-50 my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg mb-4">
                    <div class="card-header">
                        <strong class="card-title fs-2">{{ __('create-dash.Create Category') }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('categories.store') }}" method="POST"> <!-- Added missing closing bracket for the action attribute -->
                                    @csrf
                                    @include('dashboard.pages.category.form')
                                    <button type="submit" class="btn btn-success btn-md py-1 font-weight-bold fs-5 border-2 border-dark rounded">{{ __('create-dash.Submit') }}</button> <!-- Changed 'Submit' to 'submit' -->
                                    <button type="reset" class="btn btn-warning btn-md py-1 font-weight-bold fs-5 border-2 border-dark rounded">{{ __('create-dash.Reset') }}</button> <!-- Changed 'Reset' to 'reset' -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
