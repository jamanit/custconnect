@extends('layouts.app')

@push('title')
    {{ __('produk.create_produk') }}
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Product</div>

                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" name="code" id="code" value="{{ old('code') }}" placeholder="Enter code" class="form-control @error('code') is-invalid @enderror">
                                @error('code')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock') }}" placeholder="Enter stock" class="form-control @error('stock') is-invalid @enderror" min="0">
                                @error('stock')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="Enter price" class="form-control @error('price') is-invalid @enderror" min="0" step="0.01">
                                @error('price')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" placeholder="Enter description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Product</button>
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
