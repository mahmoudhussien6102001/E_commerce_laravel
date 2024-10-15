@extends('dashboard.layouts.master')
@section('title', __('index-dash.index profiles'))
@section('main-content')


<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('profiles.create') }}" class="btn btn-custom1 my-3 text-light font-weight-bold">
                    <span>{{__('index-dash.Add Profile')}}</span>
                </a>
                </div>

            </div>
        </div>
    </div>

    @include('dashboard.pages.Category.indexmessages.messages')

<!-- Table with stripped rows -->
<table class="table table-striped-custom w-100 mx-auto">
    <thead>
        <tr>
            <th scope="col">{{__('index-dash.#')}}</th>
            <th scope="col">{{__('index-dash.Image')}}</th>
            <th scope="col">{{__('index-dash.UserName')}}</th>
            <th scope="col">{{__('index-dash.User Id')}}</th>
            <th scope="col">{{__('index-dash.Bio')}}</th>
            <th scope="col">{{__('index-dash.Address')}}</th>
            <th scope="col">{{__('index-dash.Gender')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Created At')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Updated At')}}</th>
            <th scope="col">{{__('index-dash.Action')}}</th>
        </tr>
    </thead>
    
    <tbody>
        @forelse ($userProfiles as $userProfile)
        <tr>
            <td class="font-weight-bold">{{ $loop->iteration }}</td>
            <td>
                @if($userProfile->image)
                <img src="{{ asset('storage/' . $userProfile->image) }}" alt="Profile Image" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                @else
                    <span>No Image</span>
                @endif
                <br>
            </td>
            <td>{{ $userProfile->user->username}}</td>
            <td>{{ $userProfile->user->id}}</td>
            <td>{{  $userProfile->bio}}</td>
            <td>{{  $userProfile->address}}</td>
            <td>{{  $userProfile->gender}}</td>
            <td>{{ $userProfile->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $userProfile->updated_at ? $userProfile->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
            <td>
                <form action="{{ route('profiles.destroy', $userProfile->id) }}" method="POST" class="d-flex justify-content-between align-items-center">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('profiles.show', $userProfile->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Show') }}</a>
                    @if(auth()->user()->user_type == 'admin')
                        <a href="{{ route('profiles.edit', $userProfile->id) }}" class="btn btn-success btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Edit') }}</a>
                        <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Delete') }}</button>
                    @endif
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="12" class="text-center">
                <div class="alert alert-danger-custom my-5 w-50 mx-auto">
                    <span>There are no profiles yet! <a href="{{ route('profiles.create') }}" class="fw-bold text-danger">Add Profiles From Here</a></span>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
