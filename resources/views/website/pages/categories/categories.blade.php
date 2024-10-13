@extends('website.layouts.master')

@section('title', 'Categories')  

@section('main-content') 

<div class="row justify-content-center mb-5 mt-5">
  @forelse($categories as $category)
    <div class="col-sm-6 col-md-4 col-lg-3 mt-3 mb-3">
      <div class="card h-100 text-center shadow-lg">
        <!-- Card Image/Header -->
        @php
          $imagePath = getCategoryImage($category->title);
          // تسجيل مسار الصورة في ملف السجل
          \Log::info('Image Path: ' . $imagePath);
        @endphp
        <div class="card-header" style="background-image: url('{{ asset($imagePath) }}');">
          <i class="bi bi-folder-fill card-icon"></i>
        </div>
        <div class="card-body">
          <h5 class="card-title mt-3">{{$category->title}}</h5>
          <p class="card-text">{{$category->description ?? 'No description available'}}</p>
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

@php
function getCategoryImage($categoryTitle) {
    switch (strtolower(trim($categoryTitle))) {
        case 'men':
            return 'assets/images/pngtree-a-fashionable-young-man.jpg'; // مسار صورة الرجال
        case 'women':
            return 'assets/images/pngtree-businesswoman-multitasks.jpg'; // مسار صورة النساء
        case 'children':
            return 'assets/images/cute-girl-choosing-modern-stylish-children-clothing.avif'; // مسار صورة الأطفال
        default:
            return 'assets/images/default.jpg'; // صورة افتراضية في حال لم توجد فئة
    }
}
@endphp
