@extends('dashboard.layouts.master') 
@section('title', __('Page customers'))
@section('main-content')

<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="#" class="btn btn-custom1 my-3 text-light font-weight-bold">
                    <span>{{__('index-dash.Add customer')}}</span>
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
            <th scope="col">{{__('index-dash.name')}}</th>
            <th scope="col">{{__('index-dash.username')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.email')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.type')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.phone')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.create_at')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.update_at')}}</th>
            <th scope="col">{{__('index-dash.Action')}}</th>
        </tr>
        
    </thead>
    
    <tbody>
        @forelse ($customers as $customer)
        <tr>
            <td class="font-weight-bold">{{ $loop->iteration }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->username }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->user_type }}</td>
            <td>{{ $customer->phone ?? 'N/A' }}</td>
            <td>{{ $customer->created_at->format('Y-m-d H:i') }}</td> {{-- تنسيق التاريخ --}}
            <td>{{ $customer->updated_at ? $customer->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
            <td>
                <form action="{{ route('users.destroy', $customer->id) }}" method="POST" class="d-flex justify-content-between align-items-center">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('users.show', $customer->username) }}" class="btn btn-warning btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Show') }}</a>
                    @if(auth()->user()->user_type == 'admin')
                        <a href="{{ route('users.edit', $customer->id) }}" class="btn btn-success btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Edit') }}</a>
                        <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Delete') }}</button>
                    @endif
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center">
                <div class="alert alert-danger-custom my-5 w-50 mx-auto">
                    <span>There are no customers yet! <a href="{{ route('users.create') }}" class="fw-bold text-danger">Add customers From Here</a></span>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- End Table with stripped rows -->

<!-- Pagination -->
<div class="my-4 pagination-custom d-flex justify-content-center">
    {{ $customers->links() }}
</div>

@endsection
