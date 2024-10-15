@extends('website.layouts.master')

@section('title', 'User Profile')

@section('main-content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-size: 2.5rem; font-weight: bold; color: #7B1FA2;">User Profile</h1>
    
    @if(session('success'))
        <div class="alert alert-success text-center" style="background-color: #E1BEE7; font-weight: bold; font-size: 1.1rem; border-radius: 8px;">
            <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4 rounded-lg shadow-lg" style="border: none; border-radius: 20px; background-color: #f8f9fa;">
                <div class="card-body text-center">
                    <img src="{{ $user->image ? asset('storage/profiles/' . $user->image) : asset('images/default-profile.png') }}" class="rounded-circle" style="width: 150px; height: 150px; border: 4px solid #007bff;" alt="Profile Image">
                    <h5 class="card-title mt-3" style="color: #7B1FA2;">{{ $user->first_name }} {{ $user->last_name }}</h5>
                    
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card border-light shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 style="color: #7B1FA2; font-weight: bold; font-size: 1.2rem;">
                                        <i class="fas fa-user-tag"></i> User Type:
                                    </h6>
                                    <p class="text-muted" style="font-size: 1.1rem; font-weight: bold;">
                                        {{ $user->user_type ?? 'User' }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="card border-light shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 style="color: #7B1FA2; font-weight: bold; font-size: 1.2rem;">
                                        <i class="fas fa-phone"></i> Phone:
                                    </h6>
                                    <p class="card-text" style="font-size: 1.1rem; line-height: 1.6;">
                                        {{ $user->phone }}
                                    </p>
                                </div>
                            </div>

                            <div class="card border-light shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 style="color: #7B1FA2; font-weight: bold; font-size: 1.2rem;">
                                        <i class="fas fa-map-marker-alt"></i> Address:
                                    </h6>
                                    <p class="card-text" style="font-size: 1.1rem; line-height: 1.6;">
                                        <strong>{{ $user->address }}</strong>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="card border-light shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 style="color: #7B1FA2; font-weight: bold; font-size: 1.2rem;">
                                        <i class="fas fa-venus-mars"></i> Gender:
                                    </h6>
                                    <p class="card-text" style="font-size: 1.1rem; line-height: 1.6;">
                                        <strong>{{ ucfirst($user->gender) }}</strong>
                                    </p>
                                </div>
                            </div>

                            <div class="card border-light shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 style="color: #7B1FA2; font-weight: bold; font-size: 1.2rem;">
                                        <i class="fas fa-calendar-alt"></i> Date of Birth:
                                    </h6>
                                    <p class="card-text" style="font-size: 1.1rem; line-height: 1.6;">
                                        <strong>{{ $user->date_of_birth }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-around">
                        <a href="{{ route('profile.edit') }}" class="btn btn-success rounded-pill shadow-sm" style="transition: background-color 0.3s, transform 0.3s; padding: 10px 20px; border-radius: 20px;">
                            <i class="fas fa-edit"></i> Edit Profile
                        </a>
                        <a href="{{ route('profile.changePassword', ['username' => $user->username]) }}" class="btn btn-warning rounded-pill shadow-sm" style="transition: background-color 0.3s, transform 0.3s; padding: 10px 20px; border-radius: 20px;">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
