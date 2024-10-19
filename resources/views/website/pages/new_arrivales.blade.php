@extends('website.layouts.master')

@section('title', __('new_arrivals.new_arrivals'))

@section('main-content')
{{-- New Arrivals Page --}}

<div class="site-wrap" style="background-color: #F5F5F7;"> <!-- خلفية موحدة بلون موف باهت -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}" class="text-primary">{{ __('home.home') }}</a>
                    <span class="mx-2 mb-0 text-muted">/</span>
                    <strong class="text-dark">{{ __('new_arrivals.new_arrivals') }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-purple">{{ __('new_arrivals.check_out_latest') }}</h2> <!-- لون موف للعنوان -->
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="card product-card shadow-lg rounded-lg" style="background-color: #FDFDFD; border-radius: 20px; height: 100%;"> <!-- خلفية فاتحة مع زوايا مستديرة وزيادة ارتفاع البطاقات -->
                                    <img src="{{ asset('storage/' . $product->image) }}" class="product-img rounded-top" alt="{{ $product->title }}" style="border-radius: 20px 20px 0 0; width: 100%; height: 250px; object-fit: cover;"> <!-- ضبط الصورة -->
                                    <div class="p-3 d-flex flex-column justify-content-between" style="height: 100%;"> <!-- توزيع المساحات داخل البطاقة -->
                                        <div>
                                            <h5 class="product-title text-dark text-center">{{ $product->title }}</h5>
                                            <p class="product-price text-success text-center">${{ $product->price }}</p>
                                        </div>
                                        <a href="{{ route('shopsingle', ['id' => $product->id]) }}" class="btn btn-purple btn-block rounded-pill hover-effect mt-auto" style="background-color:#5A50E5; color: white; border-radius: 30px;">{{__('new_arrivals.view_details')}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-effect:hover {
        background-color: #5A50E5 !important; /* لون زر عند التمرير - موف أغمق */
        transition: background-color 0.3s ease;
    }

    .text-purple {
        color: #5A50E5; /* لون موف */
    }

    .product-card {
        border: none;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: scale(1.05);
    }

    .product-img {
        width: 100%;
        height: 250px;
        object-fit: cover; /* الحفاظ على نسبة الأبعاد وتغطية الصورة بالكامل */
    }

    .product-title {
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
    }

    .product-price {
        text-align: center;
        font-size: 1.1rem;
    }

    .product-card .btn {
        margin-top: auto;
    }
</style>

@endsection
