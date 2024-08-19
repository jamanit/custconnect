@extends('layouts.app')

@push('title')
    {{ __('user.users') }}
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('user.users') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">{{ __('user.dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('user.users') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        @if (session('success') || session('error'))
                            <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">{{ __('app.add') }}</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-costume">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>#</th>
                                                <th>{{ __('user.nickname') }}</th>
                                                <th>{{ __('user.full_name') }}</th>
                                                <th>{{ __('user.email') }}</th>
                                                <th>{{ __('user.role_name') }}</th>
                                                <th>{{ __('user.actions') }}</th>
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

    <x-delete-modal :title="__('user.delete_user')" :message="__('app.do_you_want_to_continue?')" />
@endsection

@push('styles')
@endpush

@push('scripts')
    <x-lang-datatable />

    <script>
        $(document).ready(function() {
            $("#table-costume").DataTable({
                processing: true,
                serverSide: true,
                language: lang_datatable(),
                order: [
                    [0, 'desc']
                ],
                ajax: "{{ route('users.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        class: 'width-1',
                    }, {
                        data: 'nickname',
                        name: 'nickname'
                    },
                    {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role_name',
                        name: 'role_name'
                    },
                    {
                        data: 'uuid',
                        class: 'text-nowrap width-1',
                        "render": function(data, type, row) {
                            return `
                                <a href="/users/${data}/edit" class="btn btn-warning btn-sm" title="{{ __('app.edit') }}"><i class="bi bi-pencil"></i></a>
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
                form.attr('action', '/users/' + itemId);
            });
        });
    </script>
@endpush
