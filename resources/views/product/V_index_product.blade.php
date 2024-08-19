@extends('layouts.app')

@push('title')
    {{ __('produk.produks') }}
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Products
                        <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Add New Product</a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($products as $product)
                                        <tr class="text-nowrap">
                                            <td class="width-1">{{ $i++ }}</td>
                                            <td>{{ $product->code }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td class="text-wrap">{{ $product->description }}</td>
                                            <td>
                                                @if ($product->image)
                                                    <a href="{{ Storage::url($product->image) }}" target="_blank">
                                                        <img src="{{ Storage::url($product->image) }}" alt="Image" class="img-thumbnail img-list">
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="width-1">
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

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
