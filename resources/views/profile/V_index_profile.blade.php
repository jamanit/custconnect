@extends('layouts.app')

@push('title')
    {{ __('profile.profile') }}
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('profile.profile') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">{{ __('profile.dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('profile.profile') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <form action="{{ route('profile.update', $profile->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">

                                    @if (session('success') || session('error'))
                                        <x-alert :type="session('success') ? 'success' : 'danger'" :message="session('success') ? session('success') : session('error')" />
                                    @endif

                                    <div class="mb-3">
                                        <label for="nickname" class="form-label">{{ __('profile.nickname') }}</label>
                                        <input type="text" name="nickname" id="nickname" value="{{ $profile->nickname }}" placeholder="{{ __('profile.enter_nickname') }}" class="form-control @error('nickname') is-invalid @enderror">
                                        @error('nickname')
                                            <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="full_name" class="form-label">{{ __('profile.full_name') }}</label>
                                        <input type="text" name="full_name" id="full_name" value="{{ $profile->full_name }}" placeholder="{{ __('profile.enter_full_name') }}" class="form-control @error('full_name') is-invalid @enderror">
                                        @error('full_name')
                                            <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('profile.email') }}</label>
                                        <input type="text" name="email" id="email" value="{{ $profile->email }}" placeholder="{{ __('profile.enter_email') }}" class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('profile.password') }}</label>
                                        <input type="password" name="password" id="password" value="" placeholder="{{ __('profile.enter_password') }}" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password-confirm" class="d-block">{{ __('profile.password_confirmation') }}</label>
                                        <input type="password" name="password_confirmation" id="password-confirm" value="" placeholder="{{ __('profile.enter_password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">{{ __('profile.phone_number') }}</label>
                                        <input type="number" name="phone_number" id="phone_number" value="{{ $profile->phone_number }}" placeholder="{{ __('profile.enter_phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror">
                                        @error('phone_number')
                                            <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">{{ __('profile.address') }}</label>
                                        <textarea name="address" id="address" placeholder="{{ __('profile.enter_address') }}" class="form-control @error('address') is-invalid @enderror" cols="30" rows="5">{{ $profile->address }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback font-weight-bold" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">{{ __('profile.status') }}</label>
                                        <input type="text" value="{{ $profile->status }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="{{ __('app.loading') }}">{{ __('app.update') }}</button>
                                </div>
                            </form>

                        </div>
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
