@extends('layouts.app')

@push('title')
    {{ __('produk.edit_produk') }}
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Product</div>

                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" name="code" id="code" value="{{ $product->code }}" placeholder="Enter code" class="form-control @error('code') is-invalid @enderror">
                                @error('code')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" value="{{ $product->name }}" placeholder="Enter name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" name="stock" id="stock" value="{{ $product->stock }}" placeholder="Enter stock quantity" class="form-control @error('stock') is-invalid @enderror" min="0">
                                @error('stock')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" value="{{ $product->price }}" placeholder="Enter price" class="form-control @error('price') is-invalid @enderror" min="0" step="0.01">
                                @error('price')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" placeholder="Enter description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ $product->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image (Optional)</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @if ($product->image)
                                    <a href="{{ Storage::url($product->image) }}" target="_blank">
                                        <img src="{{ Storage::url($product->image) }}" alt="Image" class="img-thumbnail img-preview">
                                    </a>
                                @endif
                                @error('image')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
