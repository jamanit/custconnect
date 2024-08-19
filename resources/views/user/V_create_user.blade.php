@extends('layouts.app')

@push('title')
    {{ __('user.create_user') }}
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('user.create_user') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">{{ __('user.dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('users') }}">{{ __('user.users') }}</a></div>
                    <div class="breadcrumb-item">{{ __('user.create_user') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <x-input type="text" name="nickname" label="{{ __('user.nickname') }}" :value="old('nickname')" placeholder="{{ __('user.enter_nickname') }}" autofocus />

                                    <x-input type="text" name="full_name" label="{{ __('user.full_name') }}" :value="old('full_name')" placeholder="{{ __('user.enter_full_name') }}" />

                                    <x-input type="email" name="email" label="{{ __('user.email') }}" :value="old('email')" placeholder="{{ __('user.enter_email') }}" />

                                    <x-input type="password" name="password" label="{{ __('user.password') }}" :value="old('password')" placeholder="{{ __('user.enter_password') }}" class="pwstrength" data-indicator="pwindicator" autocomplete="new-password" />

                                    <x-input type="password" name="password_confirmation" label="{{ __('user.password_confirmation') }}" :value="old('password_confirmation')" placeholder="{{ __('user.enter_password_confirmation') }}" autocomplete="new-password" />

                                    <x-input type="number" name="phone_number" label="{{ __('user.phone_number') }}" :value="old('phone_number')" placeholder="{{ __('user.enter_phone_number') }}" />

                                    <x-textarea name="address" label="{{ __('user.address') }}" :value="old('address')" placeholder="{{ __('user.enter_address') }}" cols="30" rows="5" />

                                    <x-select name="role_id" label="{{ __('user.role_id') }}" :options="$roles" :selected="old('role_id')" />

                                    <x-select name="status" label="{{ __('user.status') }}" :options="$status" :selected="old('status')" />
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="{{ __('app.loading') }}">{{ __('app.save') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
