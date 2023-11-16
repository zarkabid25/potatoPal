@extends('components.layouts')

@section('title', 'Receivals')

@section('css')
    <style>
        input[type="radio"] {
            display: none;
        }

        .tab {
            display: inline-block;
            padding: 10px 20px;
            cursor: pointer;
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            border-radius: 5px 5px 0 0;
        }

        input[type="radio"]:checked + .tab {
            background-color: #E22827;
            color: white;
        }
    </style>
@endsection

@section('content')
    <div class="main-section">
        <div class="container-fluid">
            <div class="topbar">
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <div class="user-logo">
                            <a href=""><img src="{{ asset('images/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="form-group has-feedback">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control customInput" placeholder="Search Users">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <div class="logout-top">
                            <a href="">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- topbar -->
            <div class="mobile-topbar visible-xs">
                <div class="container">
                    <div class="topbar-flex">
                        <p>
                            <a href="javascript:void(0);">  <span class="fa fa-angle-left"></span></a>
                        </p>
                        <h4>Receivals</h4>
                        <p>
                            <a href="" class="mobile-redbtn">Add</a>
                        </p>
                    </div>
                    <!-- topbar-flex -->
                    <p class="mobile-filtericon">
                        <a href="#" data-toggle="modal" data-target="#myModal2">Filter <img src="{{ asset('images/filter-list.png') }}" alt=""></a>
                    </p>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search for a user here.." name="search">
                    </div>
                </div>
            </div>
            <!-- mobile-topbar -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- main-section -->

    <!-- middle-section -->
    <div class="middle-section">
        <div class="middle-left">
            <div class="user-menu">
                <div class="menu-left">
                    <ul>
                        <li><a href="{{ route('dashboard') }}"><span class="fa fa-arrow-left"></span> Menu</a></li>
                        <li> <span class="fa fa-chevron-right"></span> </li>
                        <li><a href="">Receivals</a></li>
                    </ul>
                </div>
                <div class="menu-right">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#myModal2" class="filter-btn"><span class="fa fa-filter"></span></a></li>
                        <li>
                            <button type="button" class="add-button" data-toggle="modal" data-target="#receivalModal">
                                Add
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- user-menu -->
        </div>
        <!-- middle-left -->
        <div class="middle-right">
            <div class="user-right-flex">
                <div>
                    <h4 class="receival">Receivals</h4>
                </div>
                <div class="user-right-button">
                    <ul>
                        <li><a href="javascript:void(0)" class="filter-btn"><span class="fa fa-trash-o"></span></a></li>
                        <li><a href="javascript:void(0)" class="add-button" onclick="editUser(this);"><span class="fa fa-edit"></span> Edit</a></li>
                    </ul>
                </div>
            </div>
            <!-- user-right-flex -->
        </div>
        <!-- middle-right-->
    </div>
    <!-- middle-section -->

    <!-- tab-section -->
    <div class="tab-section">
        <div class="row row0">
            <div class="col-lg-3 col-sm-6">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left sideways">
                    <li class="active">
                        <a href="#tab-1" data-toggle="tab">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                    <tr>
                                        <td>Shehar Yar</td>
                                        <td>shehar@next-x.com.au</td>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8 col-sm-6">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="user-boxes">
                                    <h6>Name</h6>
                                    <h5>Shehar Yar</h5>
                                    <h6>Email</h6>
                                    <h5>shehar@next-x.com.au</h5>
                                    <h6>Username</h6>
                                    <h5>SheharYar</h5>
                                    <h6>User Access</h6>
                                    <ul>
                                        <li><a href="">Admin</a></li>
                                        <li><a href="">Grower</a></li>
                                        <li><a href="">Buyer</a></li>
                                    </ul>
                                </div>
                                <!--user-boxes -->
                                <h4>Grower Details</h4>
                                <div class="user-boxes">
                                    <h6>Grower Group</h6>
                                    <ul>
                                        <li><a href="">McCain</a></li>
                                        <li><a href="">Simplot</a></li>
                                    </ul>
                                    <h6>Grower Name</h6>
                                    <h5>ABC Name</h5>
                                    <h6>Unique Tags</h6>
                                    <ul>
                                        <li><a href="">Abcd</a></li>
                                        <li><a href="">Xyzd</a></li>
                                    </ul>
                                </div>
                                <!--user-boxes -->
                            </div>
                            <!-- col -->
                            <div class="col-md-6">
                                <h4>Buyer Details</h4>
                                <div class="user-boxes">
                                    <h6>Grower Group</h6>
                                    <h5>McCain</h5>
                                    <h6>Unique Tags</h6>
                                    <ul>
                                        <li><a href="">Abcd</a></li>
                                        <li><a href="">Xyzd</a></li>
                                    </ul>
                                </div>
                                <!--user-boxes -->
                                <h4>Paddocks</h4>
                                <div class="user-boxes">
                                    <div class="user-column-two">
                                        <div>
                                            <h6>Paddock Name</h6>
                                            <h5>Sheharyar’s Paddock 1</h5>
                                            <h6>Paddock Name</h6>
                                            <h5>Sheharyar’s Paddock 1</h5>
                                            <h6>Paddock Name</h6>
                                            <h5>Sheharyar’s Paddock 1</h5>
                                        </div>
                                        <div>
                                            <h6>No of Hactares</h6>
                                            <h5>40</h5>
                                            <h6>No of Hactares</h6>
                                            <h5>40</h5>
                                            <h6>No of Hactares</h6>
                                            <h5>40</h5>
                                        </div>
                                    </div>
                                </div>
                                <!--user-boxes -->
                            </div>
                            <!-- col -->
                        </div>
                        <!-- row -->
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- row -->
    </div>
    <!-- tab-section -->

    @include('portal.receival.add-receival-modal')
@endsection

@section('JS')
    <script>
        $(".js-example-tags").select2({
            tags: true,
            tokenSeparators: [',', ' '],
        });
    </script>
@endsection
