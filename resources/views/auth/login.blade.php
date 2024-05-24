@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div>
                    <div>
                        <a href="index.html" class="logo logo-admin"><img
                                src="{{ asset('dashboard/assets/images/photo_2024-01-18_12-00-52.jpg') }}" height="28" alt="logo"></a>
                    </div>
                    <h5 class="font-14 text-muted mb-4">Responsive Bootstrap 4 Admin Dashboard</h5>
                    <p class="text-muted mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                        praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                        occaecati cupiditate non provident.</p>

                    <h5 class="font-14 text-muted mb-4">Terms :</h5>
                    <div>
                        <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>At solmen va esser necessi far uniform
                            paroles.</p>
                        <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Donec sapien ut libero venenatis faucibus.
                        </p>
                        <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Nemo enim ipsam voluptatem quia voluptas sit
                            .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="p-2">
                            <h4 class="text-muted float-right font-18 mt-4">{{ __('Login') }}</h4>


                            <div>
                                <a href="index.html" class="logo logo-admin"><img
                                        src="{{ asset('dashboard/assets/images/photo_2024-01-18_12-00-52.jpg') }}" height="28"
                                        alt="logo"></a>
                            </div>
                        </div>

                        <div class="p-2">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf



                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-12">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">

                                    <div class="form-group text-center row m-t-20">
                                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                            {{ __('Login') }}
                                        </button>


                                    </div>
                                </div>

                                <div class="form-group m-t-10 mb-0 row">
                                    <div class="col-sm-7 m-t-20">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"class="text-muted"><i
                                                    class="mdi mdi-lock"></i>
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                    <div class="col-sm-5 m-t-20">
                                        <a href="{{ route('register') }}" class="text-muted"><i
                                                class="mdi mdi-account-circle"></i> Create an account</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection
