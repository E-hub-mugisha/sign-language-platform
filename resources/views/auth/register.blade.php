@extends('layouts.auth')

@section('content')

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
                <div class="col-md-6">
                    <!-- Register & Login Form Start -->
                    <div class="register-login-form">
                        <h3 class="title">Register</h3>

                        <div class="form-wrapper">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="single-form mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="single-form mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Role -->
                                <div class="single-form mb-3">
                                    <label for="role" class="form-label">Register as</label>
                                    <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                        <option value="student">Student</option>
                                        <option value="parent">Parent</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="single-form mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="single-form mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('login') }}" class="text-decoration-underline">Already registered?</a>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection