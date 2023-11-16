@extends('components.layouts')

@section('title', 'Login')

@section('content')
    <div  class="login-section">
        <div class="container">
            <div class="login-box">
                <p>
                    <a href=""><img src="{{ asset('images/logo.png') }}" class="logo" alt=""></a>
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group has-feedback">
{{--                        <span class="form-control-feedback">--}}
{{--                             <img src="{{ asset('images/us.png') }}" class="us-flag" alt="">--}}
{{--                        </span>--}}

                        <input type="email" name="email" class="form-control customInput @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control customInput @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-red">
                        Login
                    </button>
                </form>

                <p>
                    Don’t have an account yet? <a href="{{ route('register') }}">Sign Up</a>
                </p>
                <p class="terms-condition">
                    By logging in to the Cherry Hill Coolstores platform you agree to our <a href=""> Terms & Conditions</a> & <a href=""> Privacy Policy</a>
                </p>
            </div>
        </div>

    </div>


@endsection
