@extends('dashboard.layouts.master') 
@section('title', __('index-dash.Index Page'))
@section('main-content')

<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="#" class="btn btn-custom1 my-3 text-light font-weight-bold">
                    <span>{{__('index-dash.Add admin')}}</span>
                </a>
            </div>
        </div>
    </div>
</div>

@include('dashboard.pages.Category.indexmessages.messages')  {{-- تضمين رسائل النجاح أو الخطأ --}}

<!-- Table with stripped rows -->
<table class="table table-striped-custom w-100 mx-auto">
    <thead>
        <tr>
            <th scope="col">{{__('index-dash.#')}}</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col" style="white-space: nowrap;">Email</th>
            <th scope="col" style="white-space: nowrap;">user_Type</th>
            <th scope="col" style="white-space: nowrap;">Phone</th>
            <th scope="col" style="white-space: nowrap;">Created At</th>
            <th scope="col" style="white-space: nowrap;">Updated At</th>
            <th scope="col">{{__('index-dash.Action')}}</th>
        </tr>
    </thead>
    
    <tbody>
        @forelse ($admins as $admin)
        <tr>
            <td class="font-weight-bold">{{ $loop->iteration }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->username }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->user_type }}</td>
            <td>{{ $admin->phone ?? 'N/A' }}</td>
            <td>{{ $admin->created_at->format('Y-m-d H:i') }}</td> {{-- تنسيق التاريخ --}}
            <td>{{ $admin->updated_at ? $admin->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
            <td>
                <form action="{{ route('users.destroy', $admin->id) }}" method="POST" class="d-flex justify-content-between align-items-center">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('users.show', $admin->username) }}" class="btn btn-warning btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Show') }}</a>
                    @if(auth()->user()->user_type == 'admin')
                        <a href="{{ route('users.edit', $admin->id) }}" class="btn btn-success btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Edit') }}</a>
                        <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Delete') }}</button>
                    @endif
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center">
                <div class="alert alert-danger-custom my-5 w-50 mx-auto">
                    <span>There are no admins yet! <a href="{{ route('admins.create') }}" class="fw-bold text-danger">Add admins From Here</a></span>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- End Table with stripped rows -->

<!-- Pagination -->
<div class="my-4 pagination-custom d-flex justify-content-center">
    {{ $admins->links() }}
</div>

@endsection
