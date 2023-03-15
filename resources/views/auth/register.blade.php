@extends('layouts.auth')

@section('page-title', 'Register')

@section('page-content')
    <div class="mt-4">
        <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="Name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Enter Your Full Name" required>
                <div class="invalid-feedback">
                    Please enter Name
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter Email" required>
                <div class="invalid-feedback">
                    Please enter Email
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password-input">Password</label>
                <div class="position-relative auth-pass-inputgroup">
                    <input type="password" name="password"
                        class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                        onpaste="return false" placeholder="Enter password" id="password-input"
                        aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <button
                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                    <div class="invalid-feedback">
                        Please enter password
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="password-input">Password Confirmation</label>
                <div class="position-relative auth-pass-inputgroup">
                    <input type="password" name="password_confirmation"
                        class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                        onpaste="return false" placeholder="Enter password" id="password-input"
                        aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <button
                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                    <div class="invalid-feedback">
                        Please confirm password
                    </div>

                </div>
            </div>

            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                <h5 class="fs-13">Password must contain:</h5>
                <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
            </div>

            <div class="mt-4">
                <button class="btn btn-success w-100" type="submit">Sign Up</button>
            </div>

        </form>
    </div>
    <div class="mt-5 text-center">
        <p class="mb-0">Already have an account ? <a href="{{ route('login') }}"
                class="fw-semibold text-primary text-decoration-underline"> Signin</a> </p>
    </div>

@endsection
