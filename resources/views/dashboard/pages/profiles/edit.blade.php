@extends('dashboard.layouts.master')
@section('title', __('edit-dash.Edit Profile'))
@section('main-content')

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-custom mb-4">
                
                <div class="card-header">
                    <strong class="card-title fs-2"> {{ __('edit-dash.Edit Profile') }} ({{$userProfile->user->username}})</strong>
                </div>
                
                <div class="card-body card-body-custom">
                    <form action="{{ route('profiles.update', $userProfile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
 {{-- Image --}}
<div class="form-group mb-3">
    <label for="image" class="form-label text-white">{{ __('form-dash.Product Image') }}</label>
    <input type="file" name="image" id="image" 
           class="form-control @error('image') is-invalid @enderror">
    @if(isset($userProfile) && $userProfile->image)
        <div class="mt-2">
            <img src="{{ Storage::url($userProfile->image) }}" alt="Profile Image" class="img-fluid" style="width: 100%; height: auto;"> 
        </div>
    @endif
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
{{-- User Name --}}
<div class="form-group mb-3">
    <label for="user_id" class="form-label text-white">{{ __('form-dash.User Name') }}</label>
    <input type="text" name="user_id" id="user_id" 
           value="{{ old('user_id', $userProfile->user->username ?? '') }}" 
           class="form-control @error('user_id') is-invalid @enderror">
           
    @error('user_id')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
{{-- bio --}}
<div class="form-group mb-3">
    <label for="bio" class="form-label text-white">{{ __('form-dash.Bio') }}<span class="text-danger">*</span></label>
    <textarea name="bio" id="bio" 
              rows="4"
              placeholder="{{ __('form-dash.Enter bio') }}" 
              class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $userProfile->bio ?? '') }}</textarea>
    @error('bio')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
{{-- address --}}
<div class="form-group mb-3">
    <label for="address" class="form-label text-white">{{ __('form-dash.Addess') }}<span class="text-danger">*</span></label>
    <input type="address" name="address" id="address" 
           value="{{ old('bio', $userProfile->address ?? '') }}" 
           placeholder="{{ __('form-dash.Enter address') }}" 
           class="form-control @error('address') is-invalid @enderror">
    @error('address')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- gender --}}
<div class="form-group mb-3">
    <label for="gender" class="form-label text-white">{{ __('form-dash.Gender') }}</label>
    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
        <option value="" text-second>{{ __('form-dash.Select Gender') }}</option>
        <option value="male" {{ old('gender', $userProfile->gender ?? '') == 'male' ? 'selected' : '' }}>
            {{ __('form-dash.Male') }}
        </option>
        <option value="female" {{ old('gender', $userProfile->gender ?? '') == 'female' ? 'selected' : '' }}>
            {{ __('form-dash.Female') }}
        </option>
    </select>
    @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
   
                       <div class="d-flex justify-content-between mt-3">
                          <button type="submit" class="btn btn-md px-4 font-weight-bold fs-5 btn-custom2">{{ __('edit-dash.update_button') }}</button>
                            <div>
                                <a href="{{ route('profiles.index') }}" class="btn btn-md px-2 py-2 btn-custom2-reset">{{ __('edit-dash.Return_to_Profiles') }}</a>
                                <a href="{{ url()->previous() }}" class="btn btn-md px-2 py-2 btn-custom2-go">{{ __('edit-dash.back_button') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
