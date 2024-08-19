@extends('layouts.app_auth')

@push('title')
    {{ __('auth.register') }}
@endpush

@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('/') }}images/logo-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </a>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ __('auth.register') }}</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nickname">{{ __('auth.nickname') }}</label>
                                        <input type="text" id="nickname" name="nickname" value="{{ old('nickname') }}" placeholder="{{ __('auth.enter_nickname') }}" class="form-control @error('nickname') is-invalid @enderror" autofocus>
                                        @error('nickname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="full_name">{{ __('auth.full_name') }}</label>
                                        <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" placeholder="{{ __('auth.enter_full_name') }}" class="form-control @error('full_name') is-invalid @enderror">
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('auth.email') }}</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('auth.enter_email') }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">{{ __('auth.password') }}</label>
                                        <input type="password" name="password" id="password" placeholder="{{ __('auth.enter_password') }}" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password-confirm" class="d-block">{{ __('auth.confirm_password') }}</label>
                                        <input type="password" name="password_confirmation" id="password-confirm" placeholder="{{ __('auth.enter_password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" id="agree" class="custom-control-input @error('agree') is-invalid @enderror" value="1" {{ old('agree') == '1' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="agree">{{ __('auth.agree_terms') }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        {{ __('auth.register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        {{ __('auth.already_have_account') }} <a href="{{ url('login') }}">{{ __('auth.login') }}</a>
                    </div>
                    <div class="simple-footer">
                        {{ __('app.copyright') }} &copy; {{ config('app.brand', 'Brand') . ' ' . config('app.year', 'Year') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
