@extends('dashboard.layouts.master')
@section('title', __('edit-dash.title', ['category' => $category->title]))
@section('main-content')

<style>

.container-custom {
    max-width: 900px;
    margin: auto;
    border-radius: 1.5rem;
    overflow: hidden;
    min-height: 400px;
    background-color: #eaeaea; 
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15); 
}

.card-custom {
    background: linear-gradient(135deg, #FFFFFF); 
    color: #fff; 
    color: #fff;
    border-radius: 1.25rem;
    transition: background 0.4s ease, transform 0.3s ease, box-shadow 0.3s ease;
}

.card-custom:hover {

    transform: translateY(-8px);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.25);
}

.card-body {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: linear-gradient(135deg, #0066cc, #3399ff); 
    border-radius: 0 0 1.25rem 1.25rem;
    box-shadow: inset 0 -2px 8px rgba(0, 0, 0, 0.15);
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
    color: #fff;
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
    color: #fff;
}

.btn-custom-go {
    border-radius: 30px;
    font-size: 1rem;
    padding: 12px 24px;
    transition: all 0.3s ease;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    background-color:#E4E7EC;
}

.btn-custom-go:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    background-color:#6C757D;
    color: #fff;
}

.card-title {
    font-weight: 700;
    letter-spacing: 1px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    font-size: 32px;
    margin-bottom: 1rem;
    text-align:center;
}



    </style>

<div class="container container-custom w-50 m-auto my-3">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card shadow-md mb-4">
                <strong class="card-title fs-2">{{ __('edit-dash.heading', ['category' => $category->title]) }}</strong>

            </div>
            <div class="card-body card-body-custom">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('categories.update', $category->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            @include('dashboard.pages.category.form')

                            <button type="submit" class="btn       btn-md px-4 font-weight-bold fs-5  btn-custom">{{ __('edit-dash.update_button') }}</button>
                            <a href="{{ route('categories.index') }}" class="btn  btn-md px-2 py-2  btn-custom-reset">{{ __('edit-dash.return_button') }}</a>
                            <a href="{{ url()->previous() }}" class="btn  btn-md px-2 py-2  btn-custom-go">{{ __('edit-dash.back_button') }}</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
