@extends('dashboard.layouts.master') 
@section('title', __('index-dash.Index Page'))
@section('main-content')
<style>
     .table-striped-custom tbody tr:nth-of-type(odd) {
          background: linear-gradient(135deg, #0066cc, #3399ff);
  }
  .table-striped-custom tbody tr:hover {
      background-color: #e8e8e8;
      transition: background-color 0.3s ease;
  }
  .table th, .table td {
      text-align: center;
      vertical-align: middle;
      font-size: 1rem;
  }
  .table th {
    background: linear-gradient(135deg, #4572ff, #3879ff);
      color: #fff;
      text-transform: uppercase;
      font-weight: bold;
      padding: 1rem;
      border:1px solid  #3399ff;
  }
  .table td {
      padding: 0.75rem;
  }
  .btn-custom {
    background: linear-gradient(135deg, #0066cc, #3399ff);
      color: white;
      font-weight: bold;
      font-size: 2.9rem;
      border-radius: 10px;
      padding: 0.5rem 1.5rem;
      transition: all 0.3s ease;
      margin:70px;
  }
  .btn-custom:hover {
      background-color: #e85a4f;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      color: white;
  }
  .pagination-custom .pagination {
      justify-content: center;
     
  }
  .pagination-custom .page-item .page-link {
      color: #FF6F61;
  }
  .pagination-custom .page-item.active .page-link {
      background-color: #FF6F61;
      border-color: #FF6F61;
  }
  .alert-danger-custom {
      background-color: #ffe6e6;
      color: #d9534f;
      font-weight: bold;
      border: 1px solid #d9534f;
  }
  .custom-margin {
      margin-top: 1rem;
      margin-bottom: 1rem;
  }
  .custom-btn-space {
      margin-left: 0.5rem;
  }


  .btn {
            border-radius: 30px;
            font-size: 1rem; 
            padding: 12px 24px; 
        }
        
        .btn:hover, .btn:focus {
            box-shadow: none; 
            outline: none; 
            text-decoration: none; 
        }

    </style>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('categories.create') }}" class="btn btn-custom my-3 text-light font-weight-bold custom-margin">
                    <span>{{__('index-dash.Add Category')}}</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Table with stripped rows -->
<div class="d-flex justify-content-center align-items-center ms-5">
<table class="table table-striped-custom w-50 ms-5">
    <thead>
      <tr>
        <th scope="col">{{__('index-dash.#')}}</th>
        <th scope="col">{{__('index-dash.Title')}}</th>
        <th scope="col">{{__('index-dash.Description')}}</th>
        <th scope="col">{{__('index-dash.Created By')}}</th>
        <th scope="col">{{__('index-dash.Updated By')}}</th>
        <th scope="col">{{__('index-dash.Created At')}}</th>
        <th scope="col">{{__('index-dash.Updated At')}}</th>
        <th scope="col">{{__('index-dash.Action')}}</th>
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
            <td>
                <form method="POST" class="d-flex justify-content-center align-items-center" action="{{ route('categories.destroy' ,$category->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6 custom-btn-space">{{__('index-dash.Show')}}</a>
                    @if(auth()->user()->user_type == 'admin')
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm font-weight-bold fs-6 custom-btn-space">{{__('index-dash.Edit')}}</a>
                        <button type="submit" class="btn btn-danger  btn-sm font-weight-bold fs-6 custom-btn-space">{{__('index-dash.Delete')}}</button>
                    @endif
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">
                <div class="alert alert-danger-custom my-5 w-50 mx-auto">
                    <span>There are no categories yet! <a href="{{ route('categories.create') }}" class="fw-bold text-danger">Add Categories From Here</a></span>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
<!-- End Table with stripped rows -->

<div class="my-4 pagination-custom d-flex justify-content-center">
    {{ $categories->links() }}
</div>

@endsection
