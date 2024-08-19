@extends('layouts.app')

@push('title')
    {{ __('category.categories') }}
@endpush

@section('content')

    @if ($role['isOwner'] || $role['isAdmin'])
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>{{ __('category.categories') }}</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home') }}">{{ __('category.dashboard') }}</a></div>
                        <div class="breadcrumb-item">{{ __('category.categories') }}</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-12">

                            @if (session('success') || session('error'))
                                <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">{{ __('app.add') }}</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-serverside">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th>#</th>
                                                    <th>{{ __('category.category_name') }}</th>
                                                    <th>{{ __('category.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif

    @if ($role['isUser'])
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>{{ __('category.categories') }}</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ url('home') }}">{{ __('category.dashboard') }}</a></div>
                        <div class="breadcrumb-item">{{ __('category.categories') }}</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-12">

                            @if (session('success') || session('error'))
                                <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                            @endif


                            <div class="card">
                                <div class="card-header">
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">{{ __('app.add') }}</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsivet">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th>{{ __('category.category_name') }}</th>
                                                    <th>{{ __('category.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->category_name }}</td>
                                                        <td class="text-nowrap width-1">
                                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="{{ $category->uuid }}" title="{{ __('app.edit') }}"><i class="bi bi-pencil"></i></a>
                                                            <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteModal" data-id="{{ $category->uuid }}" title="{{ __('app.delete') }}"><i class="bi bi-trash"></i></a>
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
            </section>
        </div>
    @endif

    <x-delete-modal :title="__('category.delete_category')" :message="__('app.do_you_want_to_continue?')" />
    @include('category.V_create_category')
    @include('category.V_edit_category')
@endsection

@push('styles')
@endpush

@push('scripts')
    <x-lang-datatable />

    <script>
        $(document).ready(function() {
            $("#table-serverside").DataTable({
                processing: true,
                serverSide: true,
                language: lang_datatable(),
                order: [
                    [0, 'desc']
                ],
                ajax: "{{ route('categories.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        class: 'width-1'
                    }, {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'uuid',
                        class: 'text-nowrap width-1',
                        "render": function(data, type, row) {
                            return `
                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="${data}" title="{{ __('app.edit') }}"><i class="bi bi-pencil"></i></a>
                                <a href="#" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#deleteModal" data-id="${data}" title="{{ __('app.delete') }}"><i class="bi bi-trash"></i></a>
                            `;
                        }
                    },
                ]
            });

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var form = $(this).find('#deleteForm');
                form.attr('action', '/categories/' + itemId);
            });

            $('#createModal').on('show.bs.modal', function(event) {
                var form = $(this).find('#createForm');
                form.attr('action', '/categories');
            });

            $('#editModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var itemId = button.data('id');
                var form = $(this).find('#editForm');
                form.attr('action', '/categories/' + itemId);

                // Lakukan request AJAX untuk mendapatkan data kategori
                $.ajax({
                    url: '/categories/' + itemId + '/edit',
                    method: 'GET',
                    success: function(data) {
                        alert(itemId + ' ' + data)
                        form.find('input[name="category_name"]').val(data.category_name);
                    },
                    error: function(xhr) {
                        console.error("Error fetching category data:", xhr);
                    }
                });
            });
        });
    </script>
@endpush
