@extends('components.layouts')

@section('title', 'Dashboard')

@section('content')
    <div class="admin-access">
        <div class="container">
            <div class="logout-text">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" style="border: none; background-color: unset">Logout</button>
                </form>
            </div>

            <div class="top-logo">
                <a href="users.html">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </div>
            <div class="admin-menu">
                <h5>Welcome {{ ucwords(auth()->user()->name) }}</h5>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="{{ route('all-users') }}">
                                <img src="{{ asset('images/menu1.png') }}" alt="">
                                <span> Users </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="{{ route('all-receivals') }}">
                                <img src="{{ asset('images/menu2.png') }}" alt="">
                                <span> Receivals </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="unloading.html">
                                <img src="{{ asset('images/menu3.png') }}" alt="">
                                <span> Unloading </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu4.png') }}" alt="">
                                <span> TIA Samples </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu5.png') }}" alt="">
                                <span> Allocations </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu6.png') }}" alt="">
                                <span> Inventory </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu7.png') }}" alt="">
                                <span> Invoices </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu8.png') }}" alt="">
                                <span> Labels </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu9.png') }}" alt="">
                                <span> Dispatch </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu10.png') }}" alt="">
                                <span> Reports </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu11.png') }}" alt="">
                                <span> Cutting </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu12.png') }}" alt="">
                                <span> Weighbridge </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu13.png') }}" alt="">
                                <span> Other Jobs </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="">
                                <img src="{{ asset('images/menu14.png') }}" alt="">
                                <span> Notifications </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="notes.html">
                                <img src="{{ asset('images/menu15.png') }}" alt="">
                                <span> Notes </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="menu-icon">
                            <a href="files.html">
                                <img src="{{ asset('images/menu16.png') }}" alt="">
                                <span> Files </span>
                            </a>
                        </div>
                        <!-- menu-icon -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
            </div>
            <!-- admin-menu -->
        </div>
        <!-- container -->
    </div>
@endsection
