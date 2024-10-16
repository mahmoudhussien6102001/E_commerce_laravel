@extends('website.layouts.master')

@section('title',__('profile_admin.Edit Profile'))

@section('main-content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-size: 2.5rem; font-weight: bold; color: #7B1FA2;">{{ __('profile_admin.Edit Profile') }}</h1>

    @if(session('success'))
        <div class="alert alert-success text-center" style="background-color: #E1BEE7; font-weight: bold; font-size: 1.1rem; border-radius: 8px;">
            <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 rounded-lg shadow-lg" style="border: none; border-radius: 20px; background-color: #f8f9fa; padding: 20px;">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="first_name" style="color: #7B1FA2; font-weight: bold;">{{ __('profile_admin.First Name') }}:</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="last_name" style="color: #7B1FA2; font-weight: bold;">{{ __('profile_admin.Last Name') }}:</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone" style="color: #7B1FA2; font-weight: bold;">{{ __('profile_admin.Phone') }}:</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address" style="color: #7B1FA2; font-weight: bold;">{{ __('profile_admin.Address') }}:</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth" style="color: #7B1FA2; font-weight: bold;">{{ __('profile_admin.Date of Birth') }}:</label>
                            <input type="date" name="date_of_birth" class="form-control" value="{{ $user->date_of_birth }}" required>
                        </div>

                        <div class="form-group">
                            <label for="gender" style="color: #7B1FA2; font-weight: bold;">{{ __('profile_admin.Gender') }}:</label>
                            <select name="gender" class="form-control" required>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>{{ __('profile_admin.Male') }}</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>{{ __('profile_admin.Female') }}</option>
                                <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>{{ __('profile_admin.Other') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image" style="color: #7B1FA2; font-weight: bold;">{{ __('profile_admin.Profile Image') }}:</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success rounded-pill shadow-sm" style="padding: 8px 15px; font-size: 1rem; border-radius: 15px;">
                                <i class="fas fa-user-edit"></i> {{ __('profile_admin.Update Profile') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
