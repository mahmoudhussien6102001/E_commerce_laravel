@extends('dashboard.layouts.master') 
@section('title' ,'Deleted categories')
@section('main-content')

<!-- Table with stripped rows -->
<table class="table table-striped w-50 m-auto">
    <thead>
      <tr>
        <th scope="col">{{__('index-dash.#')}}</th>
        <th scope="col">{{__('index-dash.Title')}}</th>
        <th scope="col">{{__('index-dash.Description')}}</th>
        <th scope="col">{{__('index-dash.Created By')}}</th>
        <th scope="col">{{__('index-dash.Updated By')}}</th>
        <th scope="col">{{__('index-dash.Created At')}}</th>
        <th scope="col">{{__('index-dash.Updated At')}}</th>
        <th scope="col">{{__('index-dash.Deleted At')}}</th>
        @if(auth()->user()->user_type == "admin")
        <th class="col ">{{ __('index-dash.Action') }}</th>
        

        @endif
     
      </tr>
    </thead>

    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td class="font-weight-bold">{{$loop->iteration}}</td>
            <td>{{$category->title}}</td>
            <td>{{Str::words($category->description, '3', '...')}}</td>
            <td>{{ $category->create_user->name ?? 'N/A' }}</td>
            <td>{{ $category->update_user->name ?? 'N/A' }}</td>
            <td>{{ $category->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $category->updated_at ? $category->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
            <td>{{ $category->deleted_at ? $category->deleted_at->format('Y-m-d H:i') : 'N/A' }}</td>
            @if(auth()->user()->user_type == "admin")
            <td class="text-center">

            <div class="d-flex jusify-contend-between">
                <form action="{{Route('categories.restore', $category->id)}}" method="GET">
                     <button type="submit" class="btn btn-sm btn-success font-weight-bold fs-6 mx-1">Restore</button>
                </form>
                
                <div>
                <form action="{{Route('categories.forceDelete',$category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                     <button type="submit" class="btn btn-sm btn-danger font-weight-bold fs-6 mx-1">Delete</button>

                </form> 
                </div>
            </div>
            </td>

            @endif
        </tr>

        @empty
                <div class="alert alert-danger my-5 w-50 mx-auto">
                    <span>There are no categories yet! </span>
                </div>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center my-4">
    <div class="me-6">
    {{ $categories->links() }}
    </div>
</div>


  

<!-- End Table with stripped rows -->
@endsection
