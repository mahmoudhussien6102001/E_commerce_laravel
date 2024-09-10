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
    background-color: #eaeaea; لون خلفية فاتح ومناسب للتصميم العصري
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15); /* ظل صندوق أكثر نعومة */
}

.card-custom {
    background: linear-gradient(135deg, #FFFFFF); 
    color: #fff; 
    color: #fff;
    border-radius: 1.25rem;
    transition: background 0.4s ease, transform 0.3s ease, box-shadow 0.3s ease;
}

.card-custom:hover {
    /* background: linear-gradient(135deg, #e45c6c, #c87ef6); تدرج ألوان أعمق عند التمرير */
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
    padding: 12px 28px;
    transition: all 0.3s ease;
    border: none;
    background-color:  #fff; 
    color: #000;
   
}

.btn-custom:hover, .btn-custom:focus {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    outline: none;
    text-decoration: none;
    background-color:#DC3545 ;
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
<<<<<<< HEAD
            <div class="card card-custom shadow-md mb-4">
                <strong class="card-title fs-2">{{ __('edit--.heading', ['category' => $category->title]) }}</strong>
=======
            <div class="card shadow-md mb-4">
                <strong class="card-title fs-2">{{ __('edit-dash.heading', ['category' => $category->title]) }}</strong>
>>>>>>> 64922bd68c6ec449d61e9cfbeb37817a927015df
            </div>
            <div class="card-body card-body-custom">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('categories.update', $category->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            @include('dashboard.pages.category.form')
<<<<<<< HEAD
                            <button type="submit" class="btn  btn-custom btn-md px-4 font-weight-bold fs-5">{{ __('edit--.update_button') }}</button>
                            <a href="{{ route('categories.index') }}" class="btn  btn-custom btn-md px-2 py-2">{{ __('edit--.return_button') }}</a>
                            <a href="{{ url()->previous() }}" class="btn  btn-custom btn-md px-2 py-2">{{ __('edit--.back_button') }}</a>
=======
                            <button type="submit" class="btn btn-primary btn-md px-4 font-weight-bold fs-5">{{ __('edit-dash.update_button') }}</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-dark btn-md px-2 py-2">{{ __('edit-dash.return_button') }}</a>
                            <a href="{{ url()->previous() }}" class="btn btn-dark btn-md px-2 py-2">{{ __('edit-dash.back_button') }}</a>
>>>>>>> 64922bd68c6ec449d61e9cfbeb37817a927015df
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
