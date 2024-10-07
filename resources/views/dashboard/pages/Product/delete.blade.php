@extends('dashboard.layouts.master') 
@section('title', __('index-dash.Deleted categories'))

@section('main-content')

@include('dashboard.pages.Category.indexmessages.messages')

<div class="table-responsive">
    <table class="table table-striped w-100 m-auto">
        <thead>
            <tr>
                <th scope="col">{{ __('index-dash.#') }}</th>
                <th scope="col">{{ __('index-dash.Title') }}</th>
                <th scope="col">{{ __('index-dash.Description') }}</th>
                <th scope="col" style="white-space: nowrap;">{{ __('index-dash.Created By') }}</th>
                <th scope="col" style="white-space: nowrap;">{{ __('index-dash.Updated By') }}</th>
                <th scope="col" style="white-space: nowrap;">{{ __('index-dash.Created At') }}</th>
                <th scope="col" style="white-space: nowrap;">{{ __('index-dash.Updated At') }}</th>
                <th scope="col" style="white-space: nowrap;">{{ __('index-dash.Deleted At') }}</th>
                @if(auth()->user()->user_type == "admin")
                <th class="col">{{ __('index-dash.Action') }}</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $pro)  
            <tr>
                <td class="font-weight-bold">{{ $loop->iteration }}</td>
                <td>{{ $pro->title ?? 'N/A' }}</td> 
                <td>{{ Str::words($pro->description, '3', '...') ?? 'N/A' }}</td>
                <td>{{ $pro->update_user->name ?? 'N/A' }}</td>
                <td>{{ $pro->create_user->name ?? 'N/A' }}</td>
                <td>{{ $pro->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $pro->updated_at ? $pro->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
                <td>{{ $pro->deleted_at ? $pro->deleted_at->format('Y-m-d H:i') : 'N/A' }}</td>
                @if(auth()->user()->user_type == "admin")
                <td class="text-center">
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('products.restore', $pro->id) }}" method="GET">
                            <button type="submit" class="btn btn-sm btn-success font-weight-bold fs-6 mx-1">{{ __('index-dash.Restore') }}</button>
                        </form>

                        <form action="{{ route('products.forceDelete', $pro->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger font-weight-bold fs-6 mx-1">{{ __('index-dash.Delete') }}</button>
                        </form>
                    </div>
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="{{ auth()->user()->user_type == 'admin' ? 9 : 8 }}" class="text-center">
                    <div class="alert alert-danger my-5 w-50 mx-auto">
                        <span>{{ __('index-dash.No Products Yet') }}</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center my-4">
    <div class="me-6">
        {{ $products->links() }}
    </div>
</div>

@endsection
