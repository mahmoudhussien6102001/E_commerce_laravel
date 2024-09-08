@extends('dashboard.layouts.master') 
@section('title' ,'index Page')
@section('main-content')

<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('categories.create') }}" class="btn btn-success my-5 text-light font-weight-bold">
                    <span>Add Category</span>
                </a>
            </div>

        </div>

    </div>
</div>

 <!-- Table with stripped rows -->
 <table class="table table-striped w-50 m-auto">
    <thead>
      <tr>
        <th scope="text-center">#</th>
        <th scope="text-center">title</th>
        <th scope="text-center">description</th>
        <th scope="text-center">Create By</th>
        <th scope="text-center">Update By</th>
        <th scope="text-center">Create at</th>
        <th scope="text-center">Update at</th>
        <th scope="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
      <tr>
        <td class="font-weight-bold">{{$loop->iteration}}</td>
        <td>{{$category->title}}</td>
        <td>{{$category->description,'5','......'}}</td>
        <td>{{$category->create_user->name ?? '...'}}</td>
        <td>{{$category->update_user->name ?? 'N/A'}}</td>
        <td>{{$category->created_at}}</td>
        <td>{{$category->update_at ?? 'N/A'}}</td>
        <td>
            <form method="POST" class="d-flex justify-content-between align-items-center"></form>
        </td>
        @empty
        
        @endforelse
      </tr>
    </tbody>
  </table>
  <!-- End Table with stripped rows -->


@endsection