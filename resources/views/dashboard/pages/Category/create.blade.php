@extends('dashboard.layouts.master') 
@section('title' ,'Create category')
@inject('category','App\Models\category')
@section('main-content')
    <div class="container">
       <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <strong class="card-title fs-2">Create Category</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                           <form action="{{route('categories.store')}}">
                            @csrf 
                               @include('dashboard.pages.category.form')
                               <button type="Submit" class="btn btn-success btn-md py-1 font-weight-bold fs-5 border-2 border-dark rounded">Sumbit</button>
                               <button type="Reset" class="btn btn-secondary btn-md py-1 font-weight-bold fs-5 border-2 border-dark rounded">Reset</button>
                           </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

       </div>
    </div>


@endsection