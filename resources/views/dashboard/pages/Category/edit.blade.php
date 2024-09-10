@extends('dashboard.layouts.master') 
@section('title' ,"Edit Category ($category->title )")
@section('main-content')

<div class="container w-50 m-auto my-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-md mb-4">
                  <strong class="card-title fs-2">Edit Category (<span class="text-primary">{{$category->title}}</span>)</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('categories.update' , $category->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            @include('dashboard.pages.category.form')
                            <button type="submit" class="btn btn-primary btn-md px-4 font-weight-bold fs-5">Update</button> 
                            <a href="{{route('categories.index')}}" class="btn btn-dark btn-md px-2 py-2">Return To Categories</a>
                            <a href="{{url()->previous()}}" class="btn btn-dark btn-md px-2 py-2">GO Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection