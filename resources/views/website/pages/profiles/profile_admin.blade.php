@extends('website.layouts.master')

@section('title', __('profile_admin.Profile'))  

@section('main-content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-size: 2.5rem; font-weight: bold; color: #7B1FA2;">{{ __('profile_admin.User Profile') }}</h1>
    
    @if(session('success'))
        <div class="alert alert-success text-center" style="font-weight: bold; font-size: 1.1rem; border-radius: 8px;">
            <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4 rounded-lg shadow-lg" style="border: none; border-radius: 20px; background-color: #f8f9fa;">
                <div class="card-body text-center">
                    <img src="{{ $profile->image ? asset('storage/' . $profile->image) : asset('images/default-profile.png') }}" class="rounded-circle" style="width: 150px; height: 150px; border: 4px solid #007bff;" alt="Profile Image">
                    <h5 class="card-title mt-3" style="color: #7B1FA2;">{{ $profile->user->username}}</h5>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card border-light shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 style="color: #7B1FA2; font-weight: bold; font-size: 1.2rem;">
                                        <i class="fas fa-user-tag"></i> {{ __('profile_admin.User Type') }}:
                                    </h6>
                                    <p class="text-muted" style="font-size: 1.1rem; font-weight: bold;">
                                        {{ $profile->user->user_type ?? 'User' }}
                                    </p>
                                </div>
                            </div>
                    
                            <div class="card border-light shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 style="color: #7B1FA2; font-weight: bold; font-size: 1.2rem;">
                                        <i class="fas fa-user"></i>{{ __('profile_admin.Bio') }}:
                                    </h6>
                                    <p class="card-text" style="font-size: 1.1rem; line-height: 1.6;">
                                        {{ $profile->bio }}
                                    </p>
                                </div>
                            </div>
                    
                            <div class="card border-light shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 style="color: #7B1FA2; font-weight: bold; font-size: 1.2rem;">
                                        <i class="fas fa-map-marker-alt"></i>{{ __('profile_admin.Address') }}:
                                    </h6>
                                    <p class="card-text" style="font-size: 1.1rem; line-height: 1.6;">
                                        <strong>{{ $profile->address }}</strong>
                                    </p>
                                </div>
                            </div>
                    
                            <div class="card border-light shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 style="color: #7B1FA2; font-weight: bold; font-size: 1.2rem;">
                                        <i class="fas fa-venus-mars"></i>{{ __('profile_admin.Gender') }} :
                                    </h6>
                                    <p class="card-text" style="font-size: 1.1rem; line-height: 1.6;">
                                        <strong>{{ ucfirst($profile->gender) }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 d-flex justify-content-around">
                        <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning rounded-pill shadow-sm" style="transition: background-color 0.3s, transform 0.3s; padding: 10px 20px; border-radius: 20px;">
                            <i class="fas fa-eye"></i>{{ __('profile_admin.View') }} 
                        </a>
                        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-success rounded-pill shadow-sm" style="transition: background-color 0.3s, transform 0.3s; padding: 10px 20px; border-radius: 20px;">
                            <i class="fas fa-edit"></i> {{ __('profile_admin.Edit') }}
                        </a>
                        <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill shadow-sm" style="transition: background-color 0.3s, transform 0.3s; padding: 10px 20px; border-radius: 20px;">
                                <i class="fas fa-trash-alt"></i>{{ __('profile_admin.Delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
