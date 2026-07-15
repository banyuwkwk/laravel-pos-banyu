<div class="mb-3">
    <label class="form-label">
        Category Name
    </label>

    <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $category->name ?? '') }}"
        placeholder="Enter category name">

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">

    <label class="form-label">

        Description

    </label>

    <textarea
        name="description"
        rows="4"
        class="form-control @error('description') is-invalid @enderror"
        placeholder="Category description">{{ old('description', $category->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="form-check form-switch mb-4">

    <input
        class="form-check-input"
        type="checkbox"
        name="is_active"
        value="1"
        {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>

    <label class="form-check-label">

        Active Category

    </label>

</div>

<div class="d-flex gap-2">

    <button
        class="btn btn-primary">

        <i class="bi bi-check-circle"></i>

        Save

    </button>

    <a
        href="{{ route('categories.index') }}"
        class="btn btn-light border">

        Cancel

    </a>

</div>