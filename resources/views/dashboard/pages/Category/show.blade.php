@extends('dashboard.layouts.master') 

@section('title', 'Show Page')

@section('main-content')

<style>
    .card-custom {
        max-width: 900px; 
        margin: auto; 
        border-radius: 1rem; 
        overflow: hidden; 
        min-height: 400px; 
    }
    .card-header {
        background: linear-gradient(135deg, #0066cc, #3399ff); 
        color: #fff; 
    }
    .card-body {
        padding: 2rem; 
        display: flex;
        flex-direction: column;
        justify-content: space-between; 
    }
    .btn-custom {
        border-radius: 30px;
        font-size: 1rem; 
        padding: 12px 24px; 
    }
    .btn-custom:hover, .btn-custom:focus {
        box-shadow: none; 
        outline: none; 
        text-decoration: none; 
    }
    .large-text {
        font-size: 24px; 
    }
    .bold-text {
        font-weight: bold; 
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-custom border-light shadow-lg">
                <div class="card-header text-center">
                    <h2 class="mb-0">{{ $category->title ?? 'No Title' }}</h2>
                </div>
                <div class="card-body">
                    <p class="card-text large-text bold-text">{{ $category->description ?? 'No Description' }}</p>

                    <hr>
                    
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-secondary btn-custom" href="{{ route('categories.edit', $category->id) }}">
                            <i class="fa-solid fa-edit"></i> {{ __('show-dash.Edit') }} 
                        </a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-custom" type="submit">
                                <i class="fa-solid fa-trash-alt"></i> {{ __('show-dash.Delete') }} 
                            </button>
                        </form>

                        <a class="btn btn-outline-primary btn-custom" href="{{ route('categories.index') }}">
                            <i class="fa-solid fa-arrow-left"></i> {{ __('show-dash.Return to Categories') }} 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
