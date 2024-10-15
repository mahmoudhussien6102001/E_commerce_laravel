@extends('dashboard.layouts.master')
@section('title', 'Edit User Data')

@section('main-content')

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-custom mb-4">
                <div class="card-header">
                    <strong class="card-title fs-2">
                        @if(auth()->user()->id !== $user->id)
                            {{ $user->username }}
                        @else
                            Edit your data
                        @endif
                    </strong>
                </div>
                <div class="card-body card-body-custom">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        @include('dashboard.pages.user.form')
                        
                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-lg btn-custom2">
                                {{ __('edit-dash.update_button') }}
                            </button>
                            <div>
                                <a href="{{ route('users.index') }}" class="btn btn-lg  btn-custom2-reset">
                                    {{ __('edit-dash.return_button') }}
                                </a>
                                <a href="{{ url()->previous() }}" class="btn btn-lg btn-custom2-go">
                                    {{ __('edit-dash.back_button') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
