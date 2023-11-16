@extends('components.layouts')

@section('title', 'Register')

@section('content')
    <div class="signup-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-3 col-md-offset-2 col-md-4 col-sm-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="signup-box">
                            <p class="text-center">
                                <a href=""><img src="{{ asset('images/logo.png') }}" class="logo" alt=""></a>
                            </p>
                            <div class="form-group has-feedback">
                                <span class="fa fa-user-o form-control-feedback"></span>
                                <input type="text" class="form-control customInput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <span class="fa fa-envelope-o form-control-feedback"></span>
                                <input type="email" class="form-control customInput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <span class="fa fa-user-plus form-control-feedback"></span>
                                <input type="text" class="form-control customInput @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="UserName">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <span class="fa fa-globe form-control-feedback"></span>
                                <input type="password" class="form-control customInput @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="***************">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p>
                                <button type="submit" class="btn btn-red">
                                    Create Account
                                </button>
                            </p>
                            <p>
                                Already have an account? <a href="{{ route('logIn') }}">Login</a>
                            </p>
                            <p class="terms-condition">
                                By logging in to the Cherry Hill Coolstores platform you agree to our <a href=""> Terms & Conditions</a> & <a href=""> Privacy Policy</a>
                            </p>
                        </div>
                    </form>
                </div>
                <!-- col -->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="slider-box">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="{{ asset('images/carrot.png') }}" alt="...">
                                    <div class="">
                                        <h4>Baby Steps Count</h4>
                                        <p>
                                            One step forward at a time
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/carrot.png') }}" alt="...">
                                    <div class="">
                                        <h4>Baby Steps Count</h4>
                                        <p>
                                            One step forward at a time
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/carrot.png') }}" alt="...">
                                    <div class="">
                                        <h4>Baby Steps Count</h4>
                                        <p>
                                            One step forward at a time
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider-box -->
                </div>
            </div>
            <!-- row -->
        </div>
    </div>
@endsection
