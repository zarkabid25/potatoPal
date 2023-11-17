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
{{--                            <a href="">Logout</a>--}}
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
                        <li>
                            <a href="javascript:void(0)" class="add-button" id="" onclick="editReceival(this);"><span class="fa fa-edit"></span> Edit</a>
                        </li>
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
                    @forelse($receivals as $key=>$receival)
                        <li class="@if($key === 0) active @endif">
                            <a href="#tab-{{ $key }}" id="tab{{ $key }}-tab" data-toggle="tab" onclick="activeTab(this);"
                            data-id="{{ $receival->id }}" data-growerName="{{ $receival->grower_name }}" data-growerGroup="{{ $receival->grower_group }}" data-paddockName="{{ $receival->paddock_name }}"
                            data-seedVariety="{{ $receival->seed_variety }}" data-seedGeneration="{{ $receival->seed_generation }}" data-seedClass="{{ $receival->seed_class }}"
                            data-unloadingstatus="{{ $receival->seedType }}" data-seedBinSize="{{ $receival->seed_bin_size }}" data-oversizeBinSize="{{ $receival->oversize_bin_size }}"
                            data-transportCo="{{ $receival->transport_co }}" data-deliveryType="{{ $receival->delivery_type }}" data-fungicide="{{ $receival->fungicide }}">
                                <div class="user-table">
                                    <table class="table">
                                        <tr>
                                            <th>Grower Name</th>
                                            <th>Receival ID</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $receival->grower_name ?? '--' }}</td>
                                            <td>{{ $receival->id }}</td>
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
                    @forelse($receivals as $v=>$receival)
                        @php
                            //$grower_name = json_decode($receival->grower_name);
                            $grower_groups = json_decode($receival->grower_group);
                            $paddock_names = json_decode($receival->paddock_name);
                            $seed_varietess = json_decode($receival->seed_variety);
                            $seed_generations = json_decode($receival->seed_generation);
                            $seed_classes = json_decode($receival->seed_class);
                            $seed_types = json_decode($receival->seed_type);
                            $transport_cos = json_decode($receival->transport_co);
                            $delivery_types = json_decode($receival->delivery_type);
                            $fungicides = json_decode($receival->fungicide);
                        @endphp
                        <div class="tab-pane @if($v === 0) active @endif" id="tab-{{ $v }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="user-boxes">
                                        <h6>Grower Name</h6>
                                        <h5>{{ $receival->grower_name ?? '--' }}</h5>
                                        <h6>Grower Group</h6>
                                        @forelse($grower_groups as $grower_group)
                                            <h5>{{ $grower_group }}</h5>
                                        @empty
                                            <h5>--</h5>
                                        @endforelse
                                        <h6>Time Added</h6>
                                        <h5>{{ date('Y-m-d H:i:s', strtotime($receival->created_at)) }}</h5>
                                        <h6>Paddock</h6>
                                        <ul>
                                            @forelse($paddock_names as $paddock_name)
                                                <li><a href="javascript:void(0)">{{ $paddock_name }}</a></li>
                                            @empty
                                                <li><a href="javascript:void(0)">--</a></li>
                                            @endforelse

                                        </ul>
                                    </div>
                                    <!--user-boxes -->
                                    <h4>Seed Information</h4>
                                    <div class="user-boxes">
                                        <h6>Seed Variety</h6>
                                        @forelse($seed_varietess as $seed_variety)
                                            <h5>{{ $seed_variety }}</h5>
                                        @empty
                                            <h5>--</h5>
                                        @endforelse

                                        <h6>Seed Generation</h6>
                                        @forelse($seed_generations as $seed_generation)
                                            <h5>{{ $seed_generation }}</h5>
                                        @empty
                                            <h5>--</h5>
                                        @endforelse

                                        <h6>Seed Class</h6>
                                        @forelse($seed_classes as $seed_classe)
                                            <h5>{{ $seed_classe }}</h5>
                                        @empty
                                            <h5>--</h5>
                                        @endforelse


                                        <button type="button" class="btn" @if($receival->tia_sample_push == 1) disabled @endif style="color: white; background-color: black" onclick="pushTIASample('{{ $receival->id }}');">Push for TIA Sample</button>

                                        <h6>TIA Sample ID</h6>
                                        <h5>{{ $receival->tia_sample_id ?? '--' }}</h5>
                                    </div>
                                    <!--user-boxes -->
                                </div>
                                <!-- col -->
                                <div class="col-md-6">
                                    <h4>Unloading Information</h4>
                                    <div class="user-boxes">
                                        <h6>Unloading Status</h6>

                                        <button type="button" class="btn" @if($receival->unloading_push_status == 1) disabled @endif style="color: white; background-color: black" onclick="pushUnloading('{{ $receival->id }}');">Push for Unload</button>

                                        <h6>Unloading ID</h6>
                                        <h5>{{ $receival->unloading_ID ?? '--' }}</h5>
                                        <h6>Seed Type</h6>
                                        @forelse($seed_types as $seed_type)
                                            <h5>{{ $seed_type }}</h5>
                                        @empty
                                            <h5>--</h5>
                                        @endforelse

                                        <h6>Oversize Bin Size</h6>
                                        <h5>{{ $receival->oversize_bin_size ?? '--' }}</h5>
                                        <h6>Seed Bin Size</h6>
                                        <h5>{{ $receival->seed_bin_size ?? '--' }}</h5>
                                    </div>

                                    <!--user-boxes -->
                                    <h4>Other Information</h4>
                                    <div class="user-boxes">
                                        <div class="user-column-two">
                                            <div>
                                                <h6>Transport Co</h6>
                                                @forelse($transport_cos as $transport_co)
                                                    <h5>{{ $transport_co }}</h5>
                                                @empty
                                                    <h5>--</h5>
                                                @endforelse

                                                <h6>Delivery Type</h6>
                                                @forelse($delivery_types as $delivery_type)
                                                    <h5>{{ $delivery_type }}</h5>
                                                @empty
                                                    <h5>--</h5>
                                                @endforelse

                                                <h6>Grower's Docket No</h6>
                                                <h5>{{ $receival->grower_docket_no ?? '--' }}</h5>

                                                <h6>CHC Receival Docket No</h6>
                                                <h5>{{ $receival->chc_docket_no ?? '--' }}</h5>

                                                <h6>Fungicide</h6>
                                                @forelse($fungicides as $fungicide)
                                                    <h5>{{ $fungicide }}</h5>
                                                @empty
                                                    <h5>--</h5>
                                                @endforelse

                                                <h6>Driver Name</h6>
                                                <h5>{{ $receival->driver_name ?? '--' }}</h5>
                                                <h6>Comments</h6>
                                                <h5>{{ $receival->comments ?? '--' }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!--user-boxes -->
                                </div>
                                <!-- col -->
                            </div>
                            <!-- row -->
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- row -->
    </div>
    <!-- tab-section -->

    @include('portal.receival.add-receival-modal')
    @include('portal.receival.edit-receival')
@endsection

@section('JS')
    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        function pushUnloading(id){
            $.ajax({
                url: '{{ route('unload.receivals') }}',
                type: 'POST',
                dataType: 'JSON',
                data: {receivalID: id},
                success: function (response){
                    if(response.status === true){
                        console.log(response.status)
                        window.location.reload();
                    }
                }
            })
        }

        function pushTIASample(id){
            $.ajax({
                url: '{{ route('pushTIA.receivals') }}',
                type: 'POST',
                dataType: 'JSON',
                data: {receivID: id},
                success: function (response){
                    if(response.status === true){
                        console.log(response.status)
                        window.location.reload();
                    }
                }
            })
        }

        $(document).ready(function (){
            var growerName = $('#myTabs .active a').data('growerName');
            var id = $('#myTabs .active a').data('id');
            var growerGroup = $('#myTabs .active a').data('growerGroup');
            var paddockName = $('#myTabs .active a').data('paddockName');
            var seedVariety = $('#myTabs .active a').data('seedVariety');
            var seedGeneration = $('#myTabs .active a').data('seedGeneration');
            var seedClass = $('#myTabs .active a').data('seedClass');
            var unloadingstatus = $('#myTabs .active a').data('unloadingstatus');
            var seedBinSize = $('#myTabs .active a').data('seedBinSize');
            var oversizeBinSize = $('#myTabs .active a').data('oversizeBinSize');
            var transportCo = $('#myTabs .active a').data('transportCo');
            var deliveryType = $('#myTabs .active a').data('deliveryType');
            var fungicide = $('#myTabs .active a').data('fungicide');
            $('#groweName').text(growerName);

            $('.add-button').attr('id', ':id'.replace(':id', id));
            $('.filter-btn').attr('href', '{{ route('delete.receivals', ['id' => ':id']) }}'.replace(':id', id));
        });

        function activeTab(pointer){
                var growerName = $(pointer).data('growerName');
                var id = $(pointer).data('id');
                var growerGroup = $(pointer).data('growerGroup');
                var paddockName = $(pointer).data('paddockName');
                var seedVariety = $(pointer).data('seedVariety');
                var seedGeneration = $(pointer).data('seedGeneration');
                var seedClass = $(pointer).data('seedClass');
                var unloadingstatus = $(pointer).data('unloadingstatus');
                var seedBinSize = $(pointer).data('seedBinSize');
                var oversizeBinSize = $(pointer).data('oversizeBinSize');
                var transportCo = $(pointer).data('transportCo');
                var deliveryType = $(pointer).data('deliveryType');
                var fungicide = $(pointer).data('fungicide');
                $('#groweName').text(growerName);

            $('.add-button').attr('id', ':id'.replace(':id', id));
            $('.filter-btn').attr('href', '{{ route('delete-user', ['id' => ':id']) }}'.replace(':id', id));
        }

        function editReceival(pointer){
            let id = $(pointer).attr('id');

            $.ajax({
                url: '{{ route('edit.receivals') }}',
                type: 'GET',
                dataType: 'JSON',
                data: {id:id},
                success: function (response){
                    appendEditModel(response.data);
                    initializeMultiSelect();
                    $('#user-details').modal('show');
                }
            });
        }

        function initializeMultiSelect(){
            setTimeout(function () {
                $('.js-example-tags').select2({
                    tags: true,
                });
            }, 500);
        }

        function appendEditModel(receival){
            receival.grower_group = JSON.parse(receival.grower_group);
            receival.paddock_name = JSON.parse(receival.paddock_name);
            receival.seed_variety = JSON.parse(receival.seed_variety);
            receival.seed_generation = JSON.parse(receival.seed_generation);
            receival.seed_class = JSON.parse(receival.seed_class);
            receival.seed_type = JSON.parse(receival.seed_type);
            receival.transport_co = JSON.parse(receival.transport_co);
            receival.delivery_type = JSON.parse(receival.delivery_type);
            receival.fungicide = JSON.parse(receival.fungicide);

            function generateSelectOptions(dataArray) {
                let options = '';
                dataArray.forEach(item => {
                    options += `<option value="${item}" selected>${item}</option>`;
                });
                return options;
            }

            $('.modal-content').append(`
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="fa fa-arrow-left"></span>
        </button>

    </div>

    <form action="{{ route('update.receivals') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="${receival.id}" />

        <div class="modal-body">
            <ol class="breadcrumb">
                <li><a href="#">Menu</a></li>
                <li><a href="#">Receivals</a></li>
            </ol>

            <div class="form-group">
                <label for="grower_name">Grower Name<span class="text-danger">*</span></label>
                <input id="grower_name" name="grower_name" class="form-control" value="${receival.grower_name ? receival.grower_name : ''}" />
            </div>

            <div class="form-group">
                <label for="grower_group">Grower Group<span class="text-danger">*</span></label>
                <select id="grower_group" name="grower_group[]" class="js-example-tags form-control" multiple="multiple">
                    ${generateSelectOptions(receival.grower_group)}
                </select>
            </div>

            <div class="form-group">
                <label for="paddock">Paddock<span class="text-danger">*</span></label>
                <select id="paddock" name="paddock_name[]" class="js-example-tags form-control" multiple="multiple">
                    ${generateSelectOptions(receival.paddock_name)}
                </select>
            </div>


            <div class="form-group">
                <label for="seed_variety">Seed Variety</label>
                <select id="seed_variety" name="seed_variety[]" class="js-example-tags form-control" multiple="multiple">
                    ${generateSelectOptions(receival.seed_variety)}
                </select>
            </div>

        <div class="form-group">
            <label for="seed_generation">Seed Generation</label>
            <select id="seed_generation" name="seed_generation[]" class="js-example-tags form-control" multiple="multiple">
                ${generateSelectOptions(receival.seed_generation)}
            </select>
        </div>

        <div class="form-group">
            <label for="seed_class">Seed Class</label>
            <select id="seed_class" name="seed_class[]" class="js-example-tags form-control" multiple="multiple">
                ${generateSelectOptions(receival.seed_class)}
            </select>
        </div>

        <div class="form-group">
            <label for="tia_sample_id">TIA Sample ID</label>
            <input type="text" name="tia_sample_id" id="tia_sample_id" value="${receival.tia_sample_id ? receival.tia_sample_id : ''}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="unloading_status">Unloading Status</label>

                        <div>
                            <input type="radio" id="pending" name="unloading_status" ${receival.unloading_status === 'pending' ? 'checked' : ''} value="pending" />
                            <label class="tab" for="pending">Pending</label>

                            <input type="radio" id="completed" name="unloading_status" value="completed" ${receival.unloading_status === 'completed' ? 'checked' : ''} />
                            <label class="tab" for="completed">Completed</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unloading_ID">Unloading ID</label>
                        <input type="text" name="unloading_ID" id="unloading_ID" value="${receival.unloading_ID ? receival.unloading_ID : '' }" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="seed_type">Seed Type</label>
                        <select id="seed_type" name="seed_type[]" class="js-example-tags form-control" multiple="multiple">
                            ${generateSelectOptions(receival.seed_type)}
                        </select>
        </div>

                    <div class="form-group">
                        <label for="unloading_status">Seed Bin Size</label>
                        <div>
                            <input type="radio" id="one_tone" name="seed_bin_size" value="one tone" ${receival.seed_bin_size === 'one tone' ? 'checked' : ''} />
                            <label class="tab" for="one_tone">One Tone</label>

                            <input type="radio" id="tow_tone" name="seed_bin_size" value="two tone" ${receival.seed_bin_size === 'two tone' ? 'checked' : ''} />
                            <label class="tab" for="tow_tone">Two Tone</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Oversize Bin Size</label>

                        <div>
                            <input type="radio" id="oversize_one_tone" name="oversize_bin_size" value="one tone" ${receival.oversize_bin_size === 'one tone' ? 'checked' : ''} />
                            <label class="tab" for="oversize_one_tone">One Tone</label>

                            <input type="radio" id="oversize_tow_tone" name="oversize_bin_size" value="two tone" ${receival.oversize_bin_size === 'two tone' ? 'checked' : ''} />
                            <label class="tab" for="oversize_tow_tone">Two Tone</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="transport_co">Transport Co</label>
                        <select id="transport_co" name="transport_co[]" class="js-example-tags form-control" multiple="multiple">
                                ${generateSelectOptions(receival.transport_co)}
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="delivery_type">Delivery Type</label>
                        <select id="delivery_type" name="delivery_type[]" class="js-example-tags form-control" multiple="multiple">
                             ${generateSelectOptions(receival.delivery_type)}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="grower_docket_no">Grower Docket No</label>
                        <input type="text" name="grower_docket_no" id="grower_docket_no" class="form-control" value="${receival.grower_docket_no ? receival.grower_docket_no : ''}" />
                    </div>

                    <div class="form-group">
                        <label for="chc_docket_no">CHC Docket No</label>
                        <input type="text" name="chc_docket_no" id="chc_docket_no" class="form-control" value="${receival.chc_docket_no ? receival.chc_docket_no : ''}" />
                    </div>

                    <div class="form-group">
                        <label for="fungicide">Fungicide</label>
                        <select id="fungicide" name="fungicide[]" class="js-example-tags form-control" multiple="multiple">
                            ${generateSelectOptions(receival.fungicide)}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="driver_name">Driver Name</label>
                        <input type="text" name="driver_name" id="driver_name" class="form-control" value="${receival.driver_name ? receival.driver_name : ''}" />
                    </div>

                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" rows="3" name="comments" id="comments">${receival.comments ? receival.comments : ''}</textarea>
                    </div>
            </div>

        <div class="modal-footer">
            <button type="button" class="add-button" data-dismiss="modal" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Close</button>
            <button type="submit" class="add-button" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Submit</button>
        </div>
    </form>
`);

        }
    </script>
@endsection
