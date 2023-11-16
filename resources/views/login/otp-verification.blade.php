@extends('components.layouts')

@section('title', 'OTP Verification')

@section('content')
    <div  class="login-section">
        <div class="container">
            <div class="login-box">
                <p>
                    <a href=""><img src="{{ asset('images/logo.png') }}" class="logo" alt=""></a>
                </p>

                <form action="{{ route('verify-otp') }}" method="get">

                    <div class="form-group has-feedback">
                        <input type="number" name="otp" class="form-control customInput" placeholder="01234">
                    </div>

                    <button type="submit" class="btn btn-red">
                        Verify Number
                    </button>
                </form>

                <p class="terms-condition">
                    By logging in to the Cherry Hill Coolstores platform you agree to our <a href=""> Terms & Conditions</a> & <a href=""> Privacy Policy</a>
                </p>
            </div>
        </div>
        <!-- container-->
    </div>
@endsection
