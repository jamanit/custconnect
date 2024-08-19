@extends('layouts.app_auth')

@push('title')
    {{ __('auth.login') }}
@endpush

@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('/') }}images/logo-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </a>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ __('auth.login') }}</h4>
                        </div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">{{ __('auth.email') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('auth.email') }}" class="form-control @error('email') is-invalid @enderror" tabindex="1" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">{{ __('auth.password') }}</label>
                                        <div class="float-right">
                                            <a href="#" class="text-small">
                                                {{ __('auth.forgot_password') }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" name="password" id="password" value="" placeholder="{{ __('auth.password') }}" class="form-control @error('password') is-invalid @enderror" tabindex="2">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">{{ __('auth.remember_me') }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        {{ __('auth.login') }}
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        {{ __('auth.no_account') }} <a href="{{ url('register') }}">{{ __('auth.create_one') }}</a>
                    </div>
                    <div class="simple-footer">
                        {{ __('auth.copyright') }} &copy; {{ config('app.brand', 'Brand') . ' ' . config('app.year', 'Year') }}
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
