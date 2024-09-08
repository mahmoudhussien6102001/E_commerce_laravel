{{--title--}}

<div class="form-group mb-3">
    <label for="title">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" id="title" value="{{ Request::old('title') ? Request::old : $category->title }} class="form-control" @error('title') is-invalid @enderror "">
     @error('title')
      <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
     @enderror
</div>
{{--description--}}
<div class="form-group mb-3">
    <label for="description">Description <span class="text-danger">*</span></label>
    <input type="text" name="description" id="description" value="{{ Request::old('description') ? Request::old : $category->description }} class="form-control" @error('description') is-invalid @enderror "">
     @error('description')
      <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
     @enderror
</div>