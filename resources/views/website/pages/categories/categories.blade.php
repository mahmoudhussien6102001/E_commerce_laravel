@extends('website.layouts.master')

@section('title', 'Categories')  

@section('main-content') 

<div class="row justify-content-center mb-5 mt-5">
  @forelse($categories as $category)
    <div class="col-sm-6 col-md-4 col-lg-3 mt-3 mb-3">
      <div class="card h-100 text-center shadow-lg">
        <!-- Card Image/Header -->
        <div class="card-header" style="background-image: url('{{ asset('assets/images/T3.jpg') }}');">
          <!-- Example of a representative image/icon -->
          <i class="bi bi-folder-fill card-icon"></i>
        </div>
        <div class="card-body">
          <h5 class="card-title mt-3">{{$category->title}}</h5>
          <p class="card-text">{{$category->descrption ?? 'No description available'}}</p>
          <a href="#" class="btn btn-outline-primary mt-3">Explore</a>
        </div>
      </div>
    </div>
  @empty
    <div class="col-12 mt-5">
      <div class="alert alert-warning text-center" role="alert">
        No categories available to display at the moment.
      </div>
    </div>
  @endforelse
</div>



@endsection
