@extends('layouts.app')

@push('title')
    {{ __('user.edit_user') }}
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('user.edit_user') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">{{ __('user.dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ url('users') }}">{{ __('user.users') }}</a></div>
                    <div class="breadcrumb-item">{{ __('user.edit_user') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('users.update', $user->uuid) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">
                                    <x-input type="text" name="nickname" label="{{ __('user.nickname') }}" :value="$user->nickname" placeholder="{{ __('user.enter_nickname') }}" />

                                    <x-input type="text" name="full_name" label="{{ __('user.full_name') }}" :value="$user->full_name" placeholder="{{ __('user.enter_full_name') }}" />

                                    <x-input type="email" name="email" label="{{ __('user.email') }}" :value="$user->email" placeholder="{{ __('user.enter_email') }}" />

                                    <x-input type="password" name="password" label="{{ __('user.password') }}" placeholder="{{ __('user.enter_password') }}" class="pwstrength" data-indicator="pwindicator" autocomplete="new-password" />

                                    <x-input type="password" name="password_confirmation" label="{{ __('user.password_confirmation') }}" placeholder="{{ __('user.enter_password_confirmation') }}" autocomplete="new-password" />

                                    <x-input type="number" name="phone_number" label="{{ __('user.phone_number') }}" :value="$user->phone_number" placeholder="{{ __('user.enter_phone_number') }}" />

                                    <x-textarea name="address" label="{{ __('user.address') }}" :value="$user->address" placeholder="{{ __('user.enter_address') }}" cols="30" rows="5" />

                                    <x-select name="role_id" label="{{ __('user.role_id') }}" :options="$roles" :selected="$user->role_id" />

                                    <x-select name="status" label="{{ __('user.status') }}" :options="$status" :selected="$user->status" />
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="{{ __('app.loading') }}">{{ __('app.update') }}</button>
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
