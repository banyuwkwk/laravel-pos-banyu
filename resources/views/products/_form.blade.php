<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">

Category

</label>

<select
name="category_id"
class="form-select @error('category_id') is-invalid @enderror">

<option value="">Choose Category</option>

@foreach($categories as $category)

<option
value="{{ $category->id }}"
@selected(old('category_id',$product->category_id ?? '')==$category->id)>

{{ $category->name }}

</option>

@endforeach

</select>

@error('category_id')

<div class="invalid-feedback">

{{ $message }}

</div>

@enderror

</div>

<div class="col-md-6 mb-3">

<label class="form-label">

Product Name

</label>

<input
type="text"
name="name"
class="form-control @error('name') is-invalid @enderror"
value="{{ old('name',$product->name ?? '') }}">

@error('name')

<div class="invalid-feedback">

{{ $message }}

</div>

@enderror

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">

Price

</label>

<input
type="number"
name="price"
class="form-control @error('price') is-invalid @enderror"
value="{{ old('price',$product->price ?? '') }}">

@error('price')

<div class="invalid-feedback">

{{ $message }}

</div>

@enderror

</div>

<div class="col-md-6 mb-3">

<label class="form-label">

Stock

</label>

<input
type="number"
name="stock"
class="form-control @error('stock') is-invalid @enderror"
value="{{ old('stock',$product->stock ?? '') }}">

@error('stock')

<div class="invalid-feedback">

{{ $message }}

</div>

@enderror

</div>

</div>

<div class="mb-3">

<label class="form-label">

Description

</label>

<textarea
name="description"
rows="4"
class="form-control">{{ old('description',$product->description ?? '') }}</textarea>

</div>

<div class="mb-3">

<label class="form-label">

Product Image

</label>

<label class="form-label">

Product Image

</label>

@if(isset($product) && $product->image)

<div class="mb-3">

<img
src="{{ asset('storage/'.$product->image) }}"
class="rounded border"
width="120">

</div>

@endif

<input
type="file"
name="image"
class="form-control">

</div>

<div class="form-check form-switch mb-4">

<input
class="form-check-input"
type="checkbox"
name="is_active"
value="1"
{{ old('is_active',$product->is_active ?? true) ? 'checked' : '' }}>

<label class="form-check-label">

Active Product

</label>

</div>

<div class="d-flex gap-2">

<button class="btn btn-primary">

<i class="bi bi-check-circle"></i>

Save Product

</button>

<a
href="{{ route('products.index') }}"
class="btn btn-outline-secondary">

Cancel

</a>

</div>