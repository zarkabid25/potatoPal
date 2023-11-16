@extends('components.layouts')

@section('title', 'Account Approval')

@section('content')
    <div  class="login-section account-approval">
        <div class="container">
            <div class="login-box">
                <p>
                    <a href=""><img src="{{ asset('images/logo.png') }}" class="logo" alt=""></a>
                </p>

                <div class="approval-img">
                    <img src="{{ asset('images//hourglass-start.png') }}" alt="">
                </div>

                <p>
                    Your account is under progress once <span class="block"></span> completed you’ll be notified.
                </p>

                <a href="javascript:void(0);" class="btn btn-red">
{{--                    <span class="fa fa-call"></span> --}}
                    Approval Wating...
                </a>

                <p>
                    For any inquiries free to give us a call
                </p>
            </div>
        </div>
    </div>
@endsection
