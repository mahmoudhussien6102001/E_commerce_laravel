{{--@extends('dashboard.layouts.master') 
@section('title' ,'Deleted categories')
@section('main-content')

<!-- Table with stripped rows -->
<table class="table table-striped w-50 m-auto">
    <thead>
      <tr>
        <th scope="text-center">{{__('index-dash.#')}}</th>
        <th scope="text-center">{{__('index-dash.Title')}}</th>
        <th scope="text-center">{{__('index-dash.Description')}}</th>
        <th scope="text-center">{{__('index-dash.Created By')}}</th>
        <th scope="text-center">{{__('index-dash.Updated By')}}</th>
        <th scope="text-center">{{__('index-dash.Created At')}}</th>
        <th scope="text-center">{{__('index-dash.Updated At')}}</th>
        @if(auth()->user_type == "admin")
        <th scope="text-center">{{__('index-dash.Action')}}</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td class="font-weight-bold">{{$loop->iteration}}</td>
            <td>{{$category->title}}</td>
            <td>{{Illuminate\Support\Str::words($category->description, 3, '...') }}</td>
            <td>{{$category->create_user->name ?? '...'}}</td>
            <td>{{$category->update_user->name ?? 'N/A'}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at ?? 'N/A'}}</td>
            <td>{{$category->deleted_at ?? 'N/A'}}</td>

            <td>
                <form method="POST" class="d-flex justify-content-between align-items-center">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6 ms-2">{{__('index-dash.Show')}}</a>
                    @if(auth()->user()->user_type == 'admin')
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-danger btn-sm font-weight-bold fs-6 ms-2">{{__('index-dash.Edit')}}</a>
                        <button type="submit" class="btn btn-success btn-sm font-weight-bold fs-6 ms-2">{{__('index-dash.Delete')}}</button>
                    @endif
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">
                <div class="alert alert-danger my-5 w-50 mx-auto">
                    <span>There are no categories yet! <a href="{{ route('categories.create') }}" class="fw-bold text-danger">Add Categories From Here</a></span>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
<!-- End Table with stripped rows -->
@endsection
--}