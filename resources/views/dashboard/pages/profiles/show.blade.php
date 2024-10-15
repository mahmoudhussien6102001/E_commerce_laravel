@extends('dashboard.layouts.master') 

@section('title', __('show-dash.show profile'))

@section('main-content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-custom border-light shadow-lg">
                <div class="card-header text-center">
                    <h1>{{$userProfile->id}}</h1>
                </div>
                <div class="card-body">
                    @if($userProfile->image) 
                    <img src="{{ Storage::url($userProfile->image) }}" alt="Profile Image" class="img-fluid" style="max-width: 100%; height: auto;">
                    @else
                    <p>No Image Available</p>
                    @endif

                    <h2>{{ $userProfile->user->username}}</h2>
                    <h5>{{ $userProfile->user->id }}</h5>
                    <p class="card-text large-text bold-text">{{ $userProfile->bio ?? 'No Bio' }}</p>
                    <h3>{{ $userProfile->address ?? 'No address' }}</h3>
                    <h4>{{ $userProfile->gender ?? '' }}</h4> 
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-secondary btn-custom3" href="{{ route('profiles.edit',  $userProfile->id) }}">
                            <i class="fa-solid fa-edit"></i>{{ __('show-dash.Edit') }}  
                        </a>

                        <form action="{{ route('profiles.destroy',  $userProfile->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-custom3" type="submit">
                                <i class="fa-solid fa-trash-alt"></i> {{ __('show-dash.Delete') }} 
                            </button>
                        </form>

                        <a class="btn btn-outline-primary btn-custom3" href="{{ route('profiles.index') }}">
                            <i class="fa-solid fa-arrow-left"></i>  {{ __('show-dash.Return_to_Profiles') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
