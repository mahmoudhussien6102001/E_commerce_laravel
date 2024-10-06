{{-- Title --}}
<div class="form-group mb-3">
    <label for="title" class="form-label text-white">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" id="title" 
           value="{{ old('title', $product->title ?? '') }}" 
           placeholder="Enter Title" 
           class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Description (textarea) --}}
<div class="form-group mb-3">
    <label for="description" class="form-label text-white">Description</label>
    <textarea name="description" id="description" 
              rows="4"
              placeholder="Enter Description" 
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Price --}}
<div class="form-group mb-3">
    <label for="price" class="form-label text-white">Price <span class="text-danger">*</span></label>
    <input type="number" step="0.01" name="price" id="price" 
           value="{{ old('price', $product->price ?? '') }}" 
           placeholder="Enter Price" 
           class="form-control @error('price') is-invalid @enderror">
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Available Quantity --}}
<div class="form-group mb-3">
    <label for="available_quantity" class="form-label text-white">Available Quantity <span class="text-danger">*</span></label>
    <input type="number" name="available_quantity" id="available_quantity" 
           value="{{ old('available_quantity', $product->available_quantity ?? '') }}" 
           placeholder="Enter Available Quantity" 
           class="form-control @error('available_quantity') is-invalid @enderror">
    @error('available_quantity')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Category --}}
<div class="form-group mb-3">
    <label for="category_id" class="form-label text-white">Category <span class="text-danger">*</span></label>
    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="" disabled selected> --- Select a Category --- </option>

        @forelse ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->title }}
            </option>
        @empty
            <option value="" disabled>--- No categories available ---</option>
        @endforelse
    </select>

    @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Subcategory --}}
<div class="form-group mb-3">
    <label for="sub_category_id" class="form-label text-white">Subcategory</label>
    <select name="sub_category_id" id="sub_category_id" class="form-control @error('sub_category_id') is-invalid @enderror">
        <option value="" disabled selected> --- Select a Subcategory --- </option>

        @forelse ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}" {{ old('sub_category_id', $product->sub_category_id ?? '') == $subcategory->id ? 'selected' : '' }}>
                {{ $subcategory->title }}
            </option>
        @empty
            <option value="" disabled>--- No subcategories available ---</option>
        @endforelse
    </select>

    @error('sub_category_id')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

