@extends('dashboard.layouts.master') 
@section('title' , __('create-dash.Card Title'))

@inject('category','App\Models\Category')  

@section('main-content')

<style>
.container-custom {
    max-width: 900px;
    margin: auto;
    border-radius: 1rem;
    overflow: hidden;
    min-height: 400px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
}

.card-custom {
    background: linear-gradient(135deg, #0066cc, #3399ff);
    color: #fff;
    transition: background 0.5s ease;
}

.card-custom:hover {
    background: linear-gradient(135deg, #004999, #1a75ff);
}

.card-body-custom {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.btn-custom {
    border-radius: 30px;
    font-size: 1rem;
    padding: 12px 24px;
    transition: all 0.3s ease;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    background-color:#E4E7EC;
}

.btn-custom:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    background-color:#198754;
}

.btn-custom-reset {
    border-radius: 30px;
    font-size: 1rem;
    padding: 12px 24px;
    transition: all 0.3s ease;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    background-color:#E4E7EC;
}

.btn-custom-reset:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    background-color:#DC3545;
}


.btn-success {
    background: linear-gradient(135deg, #28a745, #218838);
    color: #fff;
}

.btn-warning {
    background: linear-gradient(135deg, #ffc107, #e0a800);
    color: #fff;
}

.card-title {
    font-weight: bold;
    letter-spacing: 1px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 24px;
    text-align:center;
}

body {
    font-family: 'Cairo', sans-serif; 
}


    </style>

<div class="container container-custom my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card card-custom shadow-lg mb-4">
                <div class="card-header">
                    <strong class="card-title  fs-2">{{ __('create-dash.Create Category') }}</strong>
                </div>
                <div class="card-body card-body-custom">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                @include('dashboard.pages.category.form')
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
