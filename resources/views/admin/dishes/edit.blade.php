@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Dish</h2>
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back to Menu
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $dish->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                    id="description" name="description" rows="4">{{ old('description', $dish->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="base_price" class="form-label">Base Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" step="0.01" class="form-control @error('base_price') is-invalid @enderror" 
                                               id="base_price" name="base_price" value="{{ old('base_price', $dish->base_price) }}" required>
                                    </div>
                                    @error('base_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select @error('category') is-invalid @enderror" 
                                            id="category" name="category" required>
                                        <option value="">Select Category</option>
                                        <option value="veg" {{ old('category', $dish->category) == 'veg' ? 'selected' : '' }}>
                                            <i class="fas fa-leaf text-success"></i> Vegetarian
                                        </option>
                                        <option value="non-veg" {{ old('category', $dish->category) == 'non-veg' ? 'selected' : '' }}>
                                            <i class="fas fa-drumstick-bite text-danger"></i> Non-Vegetarian
                                        </option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">Dish Image</label>
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <img id="imagePreview" 
                                             src="{{ $dish->image_path ? Storage::url($dish->image_path) : asset('images/placeholder.jpg') }}" 
                                             class="img-fluid rounded" 
                                             style="max-height: 200px; width: auto;">
                                    </div>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Recommended size: 500x500px. Max size: 2MB.<br>
                                        Leave empty to keep the current image.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="is_available" 
                                       name="is_available" value="1" 
                                       {{ old('is_available', $dish->is_available) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_available">Available for Order</label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Update Dish
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Image preview
const imageInput = document.getElementById('image');
if (imageInput) {
    imageInput.addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
        }
        if (this.files && this.files[0]) {
            reader.readAsDataURL(this.files[0]);
        }
    });
}
</script>
@endpush
@endsection
