@extends('layouts.auth')

@section('content')

<!-- Register & Login Start -->
<div class="section section-padding">
    <div class="container">

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Register & Login Wrapper Start -->
        <div class="register-login-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6">

                    <!-- Register & Login Images Start -->
                    <div class="register-login-images">
                        <div class="shape-1">
                            <img src="assets/images/shape/shape-26.png" alt="Shape">
                        </div>


                        <div class="images">
                            <img src="assets/images/register-login.png" alt="Register Login">
                        </div>
                    </div>
                    <!-- Register & Login Images End -->

                </div>
                <div class="col-lg-6">

                    <!-- Register & Login Form Start -->
                    <div class="register-login-form">
                        <h3 class="title">Login <span>Now</span></h3>

                        <div class="form-wrapper">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input type="email" placeholder="Username or Email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input type="password" placeholder="Password" name="password" required autocomplete="current-password">
                                </div>
                                <!-- Single Form End -->
                                <div class="single-form">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif

                                <p class="mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500">{{ __('Register') }}</a></p>
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <button type="submit" class="btn btn-primary btn-hover-dark w-100">Login</button>
                                </div>
                                <!-- Single Form End -->
                            </form>
                        </div>
                    </div>
                    <!-- Register & Login Form End -->

                </div>
            </div>
        </div>
        <!-- Register & Login Wrapper End -->

    </div>
</div>
<!-- Register & Login End -->

@endsection