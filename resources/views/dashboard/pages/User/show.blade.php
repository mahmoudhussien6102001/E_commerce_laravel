@extends('dashboard.layouts.master') 

@section('title', __('show-dash.title'))

@section('main-content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-custom border-light shadow-lg">
                <div class="card-header text-center">
                    <h2 class="mb-0 display-4">{{ $user->username ?? 'No Title' }}</h2>
                </div>
                <div class="card-body">
                    <h4 class="display-5">{{ $user->name ?? 'No Name' }}</h4>
                    <p class="card-text large-text bold-text display-6">{{ $user->email ?? 'No Email' }}</p>
                    <p class="card-text display-6">{{ $user->phone ?? 'No Phone' }}</p>
                    <p class="card-text display-6">{{ $user->user_type ?? 'No User Type' }}</p>
                    <hr>
                    
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-secondary btn-custom3" href="{{ route('users.edit', $user->id) }}">
                            <i class="fa-solid fa-edit"></i> {{ __('show-dash.Edit') }} 
                        </a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-custom3" type="submit">
                                <i class="fa-solid fa-trash-alt"></i> {{ __('show-dash.Delete') }} 
                            </button>
                        </form>

                        <a class="btn btn-outline-primary btn-custom3" href="{{ route('users.index') }}">
                            <i class="fa-solid fa-arrow-left"></i> {{ __('show-dash.Return to Users') }} 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
