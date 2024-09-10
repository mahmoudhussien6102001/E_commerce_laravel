@extends('dashboard.layouts.master')

@section('title', __('404-error.404_title'))

@section('main-content')
<main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>{{ __('404-error.404_title') }}</h1>
        <h2>{{ __('404-error.404_message') }}</h2>
        <a class="btn" href="{{ url('/') }}">{{ __('404-error.back_to_home') }}</a>
        <img src="{{ asset('dashboard/assets/img/not-found.svg') }}" class="img-fluid py-5" alt="{{ __('404-error.404_title') }}">
        <div class="credits">
          {!! __('404-error.credits') !!}
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection
