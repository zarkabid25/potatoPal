@extends('components.layouts')

@section('title', 'Users')

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
                            <form action="{{ route('logout') }}" method="post">
                                @csrf

                                <button type="submit" style="border: none; background-color: unset">Logout</button>
                            </form>

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
                            <a href="super-admin.html">  <span class="fa fa-angle-left"></span></a>
                        </p>
                        <h4>Users</h4>
                        <p>
                            <a href="" class="mobile-redbtn">Add</a>
                        </p>
                    </div>
                    <!-- topbar-flex -->
                    <p class="mobile-filtericon">
                        <a href="#" data-toggle="modal" data-target="#myModal2">Filter <img src="{{ asset('images/filter-list.png') }}" alt=""></a>
                    </p>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search for a user here.." name="" id="">
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
                        <li><a href="">Users</a></li>
                    </ul>
                </div>
                <div class="menu-right">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#myModal2" class="filter-btn"><span class="fa fa-filter"></span></a></li>
                        <li>
{{--                            <a href="" class="add-button"><span class="fa fa-plus"></span> Add</a>--}}
                            <button type="button" class="add-button" data-toggle="modal" data-target="#exampleModal">
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
                    <h4 class="user_name"></h4>
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
                <ul class="nav nav-tabs tabs-left sideways" id="myTabs">
                    @forelse($users as $key=>$user)
                        <li class="@if($key === 0) active @endif">
                            <a href="#tab-{{ $key }}" id="tab{{ $key }}-tab" data-toggle="tab" data-name="{{ $user->name }}" data-id="{{ $user->id }}" data-username="{{ $user->username }}"
                               data-email="{{ $user->email }}" data-phone="{{ $user->phone }}" onclick="activeTab('{{ $user->name }}', '{{ $user->id }}', '{{ $user->username }}', '{{ $user->email }}', '{{ $user->phone }}');">
                                <div class="user-table">
                                    <table class="table">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                        <tr>
                                            <td>{{ ucwords($user->name) }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                    </table>
                                    <span class="fa fa-angle-right angle-right"></span>
                                </div>
                            </a>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>

            <div class="col-lg-8 col-sm-6">
                <!-- Tab panes -->
                <div class="tab-content">
                    @forelse($users as $key=>$val)
                        @php
                            $roles = explode(',', $val->role);
                        @endphp

                        <div class="tab-pane @if($key === 0) active @endif" id="tab-{{ $key }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="user-boxes">
                                        <h6>Name</h6>
                                        <h5>{{ ucwords($val->name) }}</h5>
                                        <h6>Email</h6>
                                        <h5>{{ $val->email }}</h5>
                                        <h6>Username</h6>
                                        <h5>{{ $val->username }}</h5>
                                        <h6>User Access</h6>
                                        <ul>
                                            @forelse($roles as $role)
                                                <li><a href="javascript:void(0)">{{ ucfirst($role) }}</a></li>
                                            @empty
                                                <li><a href="javascript:void(0)">--</a></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <!--user-boxes -->

                                    @if(!empty($val->grower))
                                        <h4>Grower Details</h4>
                                        @php
                                            $growerGroup = explode(',', json_decode($val->grower->grower_group));
                                            $growerTags = explode(',', json_decode($val->grower->grower_tags));
                                        @endphp
                                        <div class="user-boxes">
                                            <h6>Grower Group</h6>
                                            <ul>
                                                @forelse($growerGroup as $group)
                                                    <li><a href="javascript:void(0)">{{ $group }}</a></li>
                                                @empty
                                                    <li><a href="javascript:void(0)">--</a></li>
                                                @endforelse
                                            </ul>
                                            <h6>Grower Name</h6>
                                            <h5>{{ $val->grower->grower_name }}</h5>
                                            <h6>Unique Tags</h6>
                                            <ul>
                                                @forelse($growerGroup as $group)
                                                    <li><a href="javascript:void(0)">{{ $group }}</a></li>
                                                @empty
                                                    <li><a href="javascript:void(0)">--</a></li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    @endif
                                    <!--user-boxes -->
                                </div>
                                <!-- col -->
                                <div class="col-md-6">
                                    @if(!empty($val->buyer))
                                        <h4>Buyer Details</h4>
                                        @php
                                            $buyerGroup = explode(',', json_decode($val->buyer->buyer_group));
                                            $buyerTags = explode(',', json_decode($val->buyer->buyer_tags));
                                        @endphp
                                        <div class="user-boxes">
                                            <h6>Grower Group</h6>
                                            @forelse($buyerGroup as $bGroup)
                                                <h5>{{ $bGroup }}</h5>
                                            @empty
                                                <h5>--</h5>
                                            @endforelse
                                            <h6>Unique Tags</h6>
                                            <ul>
                                                @forelse($buyerTags as $bTag)
                                                    <li><a href="javascript:void(0)">{{ $bTag }}</a></li>
                                                @empty
                                                    <li><a href="javascript:void(0)">--</a></li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    @endif
                                    <!--user-boxes -->
                                    @if(!empty($val->paddock))
                                            @php
                                                $paddockNames = json_decode($val->paddock->paddock_name);
                                                $NoHectares = json_decode($val->paddock->no_of_hectares);
                                            @endphp

                                        <h4>Paddocks</h4>
                                        <div class="user-boxes">
                                            @forelse($paddockNames as $keyy=>$paddockName)
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Paddock Name</h6>
                                                        <h5>{{ $paddockName }}</h5>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <h6>No of Hactares</h6>
                                                        <h5>{{ $NoHectares[$keyy] }}</h5>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Paddock Name</h6>
                                                        <h5>--</h5>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <h6>No of Hactares</h6>
                                                        <h5>--</h5>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    @endif
                                    <!--user-boxes -->
                                </div>
                                <!-- col -->
                            </div>
                            <!-- row -->
                        </div>
                        <!-- tab-1 -->
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- row -->
    </div>
    <!-- tab-section -->

    @include('portal.user.add-user')
    @include('portal.user.edit-user-details')
@endsection

@section('JS')
    <script>
        $(document).ready(function (){
            var name = $('#myTabs .active a').data('name');
            var id = $('#myTabs .active a').data('id');
            var email = $('#myTabs .active a').data('email');
            var username = $('#myTabs .active a').data('username');
            var phone = $('#myTabs .active a').data('phone');
            $('.user_name').text(name);

            $('.add-button').attr('id', ':id'.replace(':id', id));
            $('.filter-btn').attr('href', '{{ route('delete-user', ['id' => ':id']) }}'.replace(':id', id));

            appendEditModel(id, name, username, email, phone);
            initializeMultiSelect();
        });

        function appendEditModel(id, name, username, email, phone){
            $('.edit-modal').html(`
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Edit User</h5>
                    </div>
                    <form action="{{ route('update-user') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="${id}">

                   <div class="modal-body">
                       <h4>User Detail</h4>
                       <div class="form-group">
                           <label for="name">Name<span class="text-danger">*</span></label>
                           <input type="text" name="name" class="form-control" value="${name}" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="${email}" id="email">
                    </div>

                    <div class="form-group">
                        <label for="username">User Name<span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" value="${username}" id="username">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        <input type="number" name="phone" class="form-control" value="${phone}" id="phone">
                    </div>

                    <hr>

                    @if(!empty($user->grower))
            <h4>Grower Details</h4>
            <div class="form-group">
                <label for="grower_name">Grower Name</label>
                <input type="text" name="grower_name" class="form-control" value="{{ $user->grower->grower_name }}" id="grower_name" />
                        </div>

                        <div class="form-group">
                            <label for="grower_group">Grower Group</label>
                            @php
                $growerGroup = explode(',', json_decode($user->grower->grower_group));
                $growerTags = explode(',', json_decode($user->grower->grower_tags));
            @endphp
            <select id="grower_group" name="grower_group" class="js-example-tags form-control" multiple="multiple">
@forelse($growerGroup as $group)
            <option value="{{ $group }}" selected>{{ $group }}</option>
                                @empty
            @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="grower_tags">Unique Tags</label>
            <select id="grower_tags" name="grower_tags" class="js-example-tags form-control" multiple="multiple">
            @forelse($growerTags as $tag)
                <option value="{{ $tag }}">{{ $tag }}</option>
            @empty
            @endforelse
            </select>
        </div>
        @else
            <h4>Grower Details</h4>
            <div class="form-group">
                <label for="grower_name">Grower Name</label>
                <input type="text" name="grower_name" class="form-control" id="grower_name" />
            </div>

            <div class="form-group">
                <label for="grower_group">Grower Group</label>
                <select id="grower_group" name="grower_group" class="js-example-tags form-control" multiple="multiple"></select>
            </div>

            <div class="form-group">
                <label for="grower_tags">Unique Tags</label>
                <select id="grower_tags" name="grower_tags" class="js-example-tags form-control" multiple="multiple"></select>
            </div>
@endif

            <hr>

@if(!empty($user->buyer))
            <h4>Buyer Details</h4>
            <div class="form-group">
                <label for="buyer_group">Buyer Group</label>
@php
                $buyerGroup = explode(',', json_decode($user->buyer->buyer_group));
                $buyerTags = explode(',', json_decode($user->buyer->buyer_tags));
            @endphp
            <select id="buyer_group" name="buyer_group" class="js-example-tags form-control" multiple="multiple">
@forelse($buyerGroup as $bGroup)
            <option value="{{ $bGroup }}">{{ $bGroup }}</option>
                                @empty
            @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="buyer_tags">Unique Tags</label>
            <select id="buyer_tags" name="buyer_tags" class="js-example-tags form-control" multiple="multiple">
@forelse($buyerTags as $bTag)
            <option value="{{ $bTag }}">{{ $bTag }}</option>
                                @empty
            @endforelse
            </select>
        </div>
@else
            <h4>Buyer Details</h4>
            <div class="form-group">
                <label for="buyer_group">Buyer Group</label>
                <select id="buyer_group" name="buyer_group" class="js-example-tags form-control" multiple="multiple"></select>
            </div>

            <div class="form-group">
                <label for="buyer_tags">Unique Tags</label>
                <select id="buyer_tags" name="buyer_tags" class="js-example-tags form-control" multiple="multiple"></select>
            </div>
@endif

            <hr>

@if(!empty($user->paddock))
            <h4>Paddock</h4>
            <div class="paddock_card">
@php
                $paddockNames = json_decode($user->paddock->paddock_name);
                $NoHectares = json_decode($user->paddock->no_of_hectares);
            @endphp

            @forelse($paddockNames as $key=>$paddockName)
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Paddock Name</label>
                        <input type="text" name="paddock_name[]" value="{{ $paddockName }}" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label for="">No. of Hectares</label>
                                            <input type="text" name="no_of_hectares[]" value="{{ $NoHectares[$key] }}" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            @empty
            @endforelse
            </div>
@else
            <h4>Paddock</h4>
            <div class="paddock_card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Paddock Name</label>
                            <input type="text" name="paddock_name[]" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="">No. of Hectares</label>
                            <input type="text" name="no_of_hectares[]" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
@endif
            <div class="text-right">
                <button type="button" class="btn text-danger add_paddock" onclick="appendFields();">+ Add</button>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="add-button" data-dismiss="modal" style="background: #E22827; border: 1px solid #E22827; color: #fff;
            text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Close</button>
            <button type="submit" class="add-button" style="background: #E22827; border: 1px solid #E22827; color: #fff;
            text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Update</button>
        </div>
    </form>
`);
        }

        function activeTab(name, id, username, email, phone){
            console.log([name, id, username, email, phone]);
            $('.user_name').text(name);
            $('.add-button').attr('id', ':id'.replace(':id', id));
            $('.filter-btn').attr('href', '{{ route('delete-user', ['id' => ':id']) }}'.replace(':id', id));
            appendEditModel(id, name, username, email, phone);
            initializeMultiSelect();
        }

        function editUser(pointer){
            let id = $(pointer).attr('id');

            $.ajax({
               url: '{{ route('user-edit') }}',
               type: 'GET',
               dataType: 'JSON',
               data: {id:id},
               success: function (response){
                   // console.log(response.data);

                   $('#exampleModal2').modal('show');
               }
            });
        }

        function appendFields(){
            $('.paddock_card').append(`
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Paddock Name</label>
                            <input type="text" name="paddock_name[]" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="">No. of Hectares</label>
                            <input type="text" name="no_of_hectares[]" class="form-control" />
                        </div>
                    </div>
                </div>
            `);
        }

        function initializeMultiSelect(){
            setTimeout(function () {
                $('.js-example-tags').select2({
                    tags: true,
                });
            }, 500);
        }
    </script>
@endsection
