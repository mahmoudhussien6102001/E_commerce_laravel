@extends('dashboard.layouts.master')

@section('title', __('show-dash.title'))

@section('main-content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card card-custom border-light shadow-lg" style="min-height: 600px;"> <!-- زيادة الطول -->
                <div class="card-header text-center">
                    <h2 class="mb-0 display-4">{{ $user->username ?? 'No Title' }}</h2>
                </div>
                <div class="card-body py-5"> <!-- زيادة padding عمودي -->
                    <div class="text-center">
                    <table class="table table-borderless" style="height: 400px;">

                            <tbody>
                                <tr>
                                    <td class="text-dark fw-bold"><b>Name:</b></td>
                                    <td class="fs-5">{{ $user->name ?? 'No Name' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark fw-bold"><b>Email:</b></td>
                                    <td class="fs-5">{{ $user->email ?? 'No Email' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark fw-bold"><b>Phone:</b></td>
                                    <td class="fs-5">{{ $user->phone ?? 'No Phone' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark fw-bold"><b>Type:</b></td>
                                    <td class="fs-5">{{ $user->user_type ?? 'No User Type' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <a class="btn btn-md px-4 font-weight-bold fs-5 btn-custom2" href="{{ route('users.edit', $user->id) }}">
                            <i class="fa-solid fa-edit"></i> {{ __('show-dash.Edit') }} 
                        </a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-custom3" type="submit">
                                <i class="fa-solid fa-trash-alt"></i> {{ __('show-dash.Delete') }} 
                            </button>
                        </form>

                        <a class="btn btn-primary btn-custom3" href="{{ route('users.index') }}">
                            <i class="fa-solid fa-arrow-left"></i> {{ __('show-dash.Return to Users') }} 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
