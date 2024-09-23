
{{-- Title --}}
<div class="form-group mb-3">
    <label for="title" class="form-label  text-white ">{{ __('form-dash.Title') }} <span class="text-danger">*</span></label>
    <input type="text" name="title" id="title" 
           value="{{ old('title', $category->title ?? '') }}"   {{--هنا بترجع القيمة القديمة اللي المستخدم كتبها لو حصل خطأ في الإدخال، أو بتجيب قيمة العنوان المخزنة في قاعدة البيانات (لو موجودة).--}}   
           class="form-control @error('title') is-invalid @enderror">
           
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Description --}}
<div class="form-group mb-3">
    <label for="description" class="form-label text-white">{{ __('form-dash.Description') }} </label>
    <input type="text" name="description" id="description" 
           value="{{ old('description', $category->description ?? '') }}" 
           class="form-control @error('description') is-invalid @enderror">
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
