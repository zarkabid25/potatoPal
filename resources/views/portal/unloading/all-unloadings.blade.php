@extends('components.layouts')

@section('title', 'All Unloadings')

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
                    <h4 class="receival">Unloading</h4>
                </div>
                <div class="user-right-button">
                    <ul>
                        <li><a href="javascript:void(0)" class="filter-btn"><span class="fa fa-trash-o"></span></a></li>
                        <li>
                            <a href="javascript:void(0)" class="add-button" id="" onclick="editUnload(this);"><span class="fa fa-edit"></span> Edit</a>
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
                    @forelse($unloading as $key=>$val)
                        <li class="@if($key === 0) active @endif">
                            <a href="#tab-{{ $key }}" id="tab{{ $key }}-tab" data-toggle="tab" onclick="activeTab(this);"
                            data-id="{{ $val->id }}" data-growerName="{{ $val->grower_name }}" data-receivalID="{{ $val->receival->id }}"
                               data-unloadDate="{{ date('Y-m-d H:i:s', strtotime($val->receival->created_at)) }}" data-unloadStatus="{{ $val->receival->unloading_status }}"
                               data-fungicide="{{ $val->receival->fungicide }}" data-seedBinSize="{{ $val->receival->seed_bin_size }}" data-overSizeBin="{{ $val->receival->oversize_bin_size }}"
                            >
                                <div class="user-table">
                                    <table class="table">
                                        <tr>
                                            <th>Grower Name</th>
                                            <th>Unloading ID</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $val->receival->grower_name }}</td>
                                            <td>{{ $val->unloading_ID ?? '--' }}</td>
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
                    @forelse($unloading as $v=>$unload)
                        <div class="tab-pane @if($v === 0) active @endif" id="tab-{{ $v }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="user-boxes">
                                        <h6>Grower Name</h6>
                                        <h5>{{ $unload->receival->grower_name }}</h5>

                                        <h6>Unloading ID</h6>
                                        <h5>{{ $unload->receival->unloading_ID ?? '--' }}</h5>

                                        <h6>Time Added</h6>
                                        <h5> {{ date('Y-m-d H:i:s', strtotime($unload->updated_at)) }}</h5>
                                        <h6>Status</h6>
                                        <ul>
                                            <li><a href="javascript:void(0)">{{ $unload->receival->unloading_status ?? '--' }}</a></li>
                                        </ul>
                                    </div>
                                    <!--user-boxes -->
                                    <h4>Important Information</h4>
                                    <div class="user-boxes">
                                        <h6>Seed Type</h6>
                                        @php
                                            $seed_types = json_decode($val->receival->seed_type)
                                        @endphp
                                        @forelse($seed_types as $seed_type)
                                            <h5>{{ $seed_type }}</h5>
                                        @empty
                                            <h5>--</h5>
                                        @endforelse

                                        <h6>Oversize Bin Size</h6>
                                        <h5>{{ $val->receival->oversize_bin_size }}</h5>

                                        <h6>Seed Bin Size</h6>
                                        <h5>{{ $val->receival->seed_bin_size }}</h5>
                                    </div>
                                </div>
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

{{--    @include('portal.receival.add-receival-modal')--}}
    @include('portal.unloading.edit-unloading')
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
            var unloadingstatus = $('#myTabs .active a').data('unloadingstatus');
            var seedBinSize = $('#myTabs .active a').data('seedBinSize');
            var oversizeBinSize = $('#myTabs .active a').data('oversizeBinSize');
            var fungicide = $('#myTabs .active a').data('fungicide');
            var unloadDate = $('#myTabs .active a').data('unloadDate');
            $('#groweName').text(growerName);

            $('.add-button').attr('id', ':id'.replace(':id', id));
            $('.filter-btn').attr('href', '{{ route('delete.receivals', ['id' => ':id']) }}'.replace(':id', id));
        });

        function activeTab(pointer){
            var growerName = $(pointer).data('growerName');
            var id = $(pointer).data('id');
            var unloadingstatus = $(pointer).data('unloadingstatus');
            var seedBinSize = $(pointer).data('seedBinSize');
            var oversizeBinSize = $(pointer).data('oversizeBinSize');
            var fungicide = $(pointer).data('fungicide');
            var unloadDate = $(pointer).data('unloadDate');
            $('#groweName').text(growerName);

            $('.add-button').attr('id', ':id'.replace(':id', id));
            $('.filter-btn').attr('href', '{{ route('delete-user', ['id' => ':id']) }}'.replace(':id', id));
        }

        function editUnload(pointer){
            let id = $(pointer).attr('id');

            $.ajax({
                url: '{{ route('edit-unloadings') }}',
                type: 'GET',
                dataType: 'JSON',
                data: {id:id},
                success: function (response){
                    console.log(response.data)
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
            receival.receival.fungicide = JSON.parse(receival.receival.fungicide);

            function generateSelectOptions(dataArray, selectedValue) {
                // if (!dataArray || !Array.isArray(dataArray)) {
                //     return '';
                // }

                let options = '';

                dataArray.forEach(item => {
                    options += `<option value="${item}" selected>${item}</option>`;
                });

                return options;
            }
            // <select id="grower_name" name="grower_name[]" class="js-example-tags form-control" multiple="multiple">
            //     ${generateSelectOptions([receival.receival.grower_name], receival.receival.grower_name)}
            // </select>
            $('.modal-content').append(`
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="fa fa-arrow-left"></span>
        </button>

    </div>

    <form action="{{ route('update-unloadings') }}" method="post">
        @csrf

            <input type="hidden" name="id" value="${receival.id}" />
            <input type="hidden" name="r_id" value="${receival.receival_id}" />

        <div class="modal-body">
            <ol class="breadcrumb">
                <li><a href="#">Menu</a></li>
                <li><a href="#">Receivals</a></li>
            </ol>

            <div class="form-group">
                <label for="grower_name">Grower Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="grower_name" name="grower_name" value="${receival.receival.grower_name ? receival.receival.grower_name : ''}" />

            </div>

            <div class="form-group">
                <label for="receival_id">Receival ID<span class="text-danger">*</span></label>
                <select id="receival_id" name="receival_id[]" class="js-example-tags form-control" multiple="multiple">
                    ${generateSelectOptions([receival.receival.id], receival.receival.id)}
                </select>
            </div>

        <div class="form-group">
            <label for="tia_sample_id">Date Unloading</label>
            <input type="date" name="date_unloading" id="date_unloading" value="${receival.receival.created_at ? receival.receival.created_at.slice(0, 10) : ''}" class="form-control" />
            </div>

                    <div class="form-group">
                        <label for="unloading_status">Unloading Status</label>

                        <div>
                            <input type="radio" id="pending" name="unloading_status" ${receival.receival && receival.receival.unloading_status === 'pending' ? 'checked' : ''} value="pending" />
                            <label class="tab" for="pending">Pending</label>

                            <input type="radio" id="completed" name="unloading_status" value="completed" ${receival.receival && receival.receival.unloading_status === 'completed' ? 'checked' : ''} />
                            <label class="tab" for="completed">Completed</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tia_sample">Loading to be TIA Sample</label>

                        <div>
                            <input type="radio" id="tia_sample_yes" name="tia_sample" ${receival.receival && receival.receival.tia_sample === 'yes' ? 'checked' : ''} value="yes" />
                            <label class="tab" for="tia_sample_yes">Yes</label>

                            <input type="radio" id="tia_sample_no" name="tia_sample" value="no" ${receival.receival && receival.receival.tia_sample === 'no' ? 'checked' : ''} />
                            <label class="tab" for="tia_sample_no">No</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unloading_status">Seed Bin Size</label>
                        <div>
                            <input type="radio" id="one_tone" name="seed_bin_size" value="one tone" ${receival.receival.seed_bin_size === 'one tone' ? 'checked' : ''} />
                            <label class="tab" for="one_tone">One Tone</label>

                            <input type="radio" id="tow_tone" name="seed_bin_size" value="two tone" ${receival.receival.seed_bin_size === 'two tone' ? 'checked' : ''} />
                            <label class="tab" for="tow_tone">Two Tone</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Oversize Bin Size</label>

                        <div>
                            <input type="radio" id="oversize_one_tone" name="oversize_bin_size" value="one tone" ${receival.receival.oversize_bin_size === 'one tone' ? 'checked' : ''} />
                            <label class="tab" for="oversize_one_tone">One Tone</label>

                            <input type="radio" id="oversize_tow_tone" name="oversize_bin_size" value="two tone" ${receival.receival.oversize_bin_size === 'two tone' ? 'checked' : ''} />
                            <label class="tab" for="oversize_tow_tone">Two Tone</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fungicide">Fungicide</label>
                        <select id="fungicide" name="fungicide[]" class="js-example-tags form-control" multiple="multiple">
                            ${generateSelectOptions(receival.receival.fungicide)}
                        </select>
                    </div>

                    <div class="form-group">
                         <label for="no_of_seeding_bins">Number of Seed bins weight at a time</label>
                        <input type="text" class="form-control" id="no_of_seeding_bins" name="no_of_seeding_bins" value="${receival.no_of_seeding_bins ? receival.no_of_seeding_bins : ''}" />
                    </div>

                    <div class="form-group">
                        <label for="weighed_bin">Weighed bins</label>
                        <input type="text" class="form-control" id="weighed_bin" name="weighed_bin" value="${receival.weighed_bin ? receival.weighed_bin : ''}" />
                    </div>

                    <div class="form-group">
                        <label for="weighed_weight">Weighed Weight</label>
                        <input type="text" class="form-control" id="weighed_weight" name="weighed_weight" value="${receival.weighed_weight ? receival.weighed_weight : ''}" />
                    </div>

                    <div class="form-group">
                        <label for="no_oversize_bins">No of oversize bins</label>
                        <input type="text" class="form-control" id="no_oversize_bins" name="no_oversize_bins" value="${receival.no_oversize_bins ? receival.no_oversize_bins : ''}" />
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
