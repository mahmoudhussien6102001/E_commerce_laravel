@extends('dashboard.layouts.master')
@section('title', __('edit-dash.title', ['category' => $category->title]))
@section('main-content')



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
