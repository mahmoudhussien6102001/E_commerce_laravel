@extends('website.layouts.master')
@section('title', 'Shop Page') 
@section('main-content')

<div class="site-wrap">
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{route('home')}}">{{ __('shop.Home') }}</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ __('shop.Shop') }}</strong></div>
      </div>
    </div>
  </div>
  
  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">{{__('shop.shop_all')}}</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{__('shop.latest')}}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="{{ route('shop', ['category' => 'men']) }}">{{__('shop.men')}}</a>
                      <a class="dropdown-item" href="{{ route('shop', ['category' => 'women']) }}">{{__('shop.women')}}</a>
                      <a class="dropdown-item" href="{{ route('shop', ['category' => 'children']) }}">{{__('shop.children')}}</a>
                  </div>
              </div>
              
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('shop.reference')}}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">{{__('shop.relevance')}}</a>
                    <a class="dropdown-item" href="#">{{__('shop.name_a_to_z')}}</a>
                    <a class="dropdown-item" href="#">{{__('shop.name_z_to_a')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">{{__('shop.price_low_to_high')}}</a>
                    <a class="dropdown-item" href="#">{{__('shop.price_high_to_low')}}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            <div class="container mb-5">
              <div class="row">
                  @forelse($products as $product)
                      <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up" style="min-height: 400px;">
                          <div class="card text-center border shadow-sm">
                            <figure class="block-4-image">
                              <a href="{{ route('shopsingle', $product->id) }}">
                                  <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                              </a>
                            </figure>
                              <div class="card-body">
                                  <h3 class="card-title">
                                      <a href="{{ route('shopsingle', $product->id) }}" class="text-decoration-none text-dark">{{ $product->title }}</a>
                                  </h3>
                                  <p class="card-text">{{ Str::limit($product->description ?? 'No description available', 50, '...') }}</p>
                                  <p class="text-primary font-weight-bold">{{ $product->price }}$</p>
                                  <p class="text-secondary">{{ $product->available_quantity }} available</p>
                              </div>
                          </div>
                      </div>
                  @empty
                      <div class="col-12 mt-5">
                          <div class="alert alert-warning text-center" role="alert">
                              No Products available to display at the moment.
                          </div>
                      </div>
                  @endforelse
              </div>
          </div>
          
           
          </div>
          <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-center">
                <div class="site-block-27">
                    <ul>
                        <!-- Previous Page Link -->
                        @if ($products->onFirstPage())
                            <li class="disabled"><span>&lt;</span></li>
                        @else
                            <li><a href="{{ $products->previousPageUrl() }}">&lt;</a></li>
                        @endif
        
                        <!-- Pagination Elements -->
                        @foreach ($products->onEachSide(2)->links()->elements as $element)
                            <!-- "Three Dots" Separator -->
                            @if (is_string($element))
                                <li class="disabled"><span>{{ $element }}</span></li>
                            @endif
        
                            <!-- Array Of Links -->
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $products->currentPage())
                                        <li class="active"><span>{{ $page }}</span></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
        
                        <!-- Next Page Link -->
                        @if ($products->hasMorePages())
                            <li><a href="{{ $products->nextPageUrl() }}">&gt;</a></li>
                        @else
                            <li class="disabled"><span>&gt;</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.categories') }}</h3>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1">
                        <a href="#" class="d-flex">
                            <span>{{ __('shop.men_count') }}</span>
                            <span class="text-black ml-auto">({{ $menCount }})</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="d-flex">
                            <span>{{ __('shop.women_count') }}</span>
                            <span class="text-black ml-auto">({{ $womenCount }})</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="d-flex">
                            <span>{{ __('shop.children_count') }}</span>
                            <span class="text-black ml-auto">({{ $childrenCount }})</span>
                        </a>
                    </li>
                </ul>
        </div>
        

          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">{{__('shop.filter_by_price')}}</h3>
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">{{__('shop.size')}}</h3>
              <label for="s_sm" class="d-flex">
                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">{{__('shop.small_size')}}</span>
              </label>
              <label for="s_md" class="d-flex">
                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">{{__('shop.medium_size')}}</span>
              </label>
              <label for="s_lg" class="d-flex">
                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">{{__('shop.large_size')}}</span>
              </label>
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.color') }}</h3>
              
              <a href="#" class="d-flex color-item align-items-center">
                  <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> 
                  <span class="text-black">{{ __('shop.red_color') }}</span>
              </a>
              
              <a href="#" class="d-flex color-item align-items-center">
                  <span class="bg-success color d-inline-block rounded-circle mr-2"></span> 
                  <span class="text-black">{{ __('shop.green_color') }}</span>
              </a>
              
              <a href="#" class="d-flex color-item align-items-center">
                  <span class="bg-info color d-inline-block rounded-circle mr-2"></span> 
                  <span class="text-black">{{ __('shop.blue_color') }}</span>
              </a>
              
              <a href="#" class="d-flex color-item align-items-center">
                  <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> 
                  <span class="text-black">{{ __('shop.purple_color') }}</span>
              </a>
              
              <!-- إضافة ألوان جديدة -->
              <a href="#" class="d-flex color-item align-items-center">
                  <span class="bg-warning color d-inline-block rounded-circle mr-2"></span> 
                  <span class="text-black">{{ __('shop.yellow_color') }}</span>
              </a>
              
              <a href="#" class="d-flex color-item align-items-center">
                  <span class="bg-dark color d-inline-block rounded-circle mr-2"></span> 
                  <span class="text-black">{{ __('shop.black_color') }}</span>
              </a> 
              <a href="#" class="d-flex color-item align-items-center">
                  <span class="bg-secondary color d-inline-block rounded-circle mr-2"></span> 
                  <span class="text-black">{{ __('shop.gray_color') }}</span>
              </a>
          </div>
          

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="site-section site-blocks-2">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7 site-section-heading pt-4">
                  <h2>{{__('shop.categories')}}</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                  <a class="block-2-item" href="#">
                    <figure class="image">
                      <img src="{{asset('assets/images/pngtree-businesswoman-multitasks.jpg')}}" alt="" class="img-fluid" style="height: 229.18px;">
                    </figure>
                    <div class="text">
                      <span class="text-uppercase">{{__('shop.collections')}}</span>
                      <h3>{{__('shop.women')}}</h3>
                    </div>
                  </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                  <a class="block-2-item" href="#">
                    <figure class="image">
                      <img src="{{asset('assets/images/cute-girl-choosing-modern-stylish-children-clothing.avif')}}" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <span class="text-uppercase">{{__('shop.collections')}}</span>
                      <h3>{{__('shop.children')}}</h3>
                    </div>
                  </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                  <a class="block-2-item" href="#">
                    <figure class="image">
                      <img src="{{asset('assets/images/pngtree-a-fashionable-young-man.jpg')}}" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <span class="text-uppercase">{{__('shop.collections')}}</span>
                      <h3>{{__('shop.men')}}</h3>
                    </div>
                  </a>
                </div>
              </div>

          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection