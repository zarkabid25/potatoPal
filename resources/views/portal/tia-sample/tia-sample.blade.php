@extends('components.layouts')

@section('title', 'TIA Sample')

@section('css')
    <style>
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
            border-top: none;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            /*box-shadow: 0 0 1px #2196F3;*/
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        /*.container{*/
        /*    position:relative;*/
        /*    width:100%;*/
        /*    height:100%;*/
        /*    display:flex;*/
        /*    !*justify-content:center;*!*/
        /*    !*align-items:center;*!*/
        /*}*/
        .selector{
            position:relative;
            width: 100%;
            background-color:var(--smoke-white);
            height:40px;
            display:flex;
            justify-content:space-around;
            align-items:center;
            border-radius: 5px;
            border: 1px solid rgba(0,0,0,.2);
            /*box-shadow:0 0 16px rgba(0,0,0,.2);*/
        }

        .selector-item{
            position:relative;
            flex-basis:calc(90% / 3);
            height:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            margin-top: 5px;
        }
        .selector-item_radio{
            appearance:none;
            display:none;
        }
        .selector-item_label{
            position:relative;
            height:100%;
            width:100%;
            text-align:center;
            line-height:280%;
            font-family: 'Poppins', sans-serif;
            font-weight:700;
            /*transition-duration:.5s;*/
        }
        .selector-item_radio:checked + .selector-item_label{
            background-color:var(--blue);
            color:var(--white);
            border-radius: 1px;
            border: 1px solid rgba(0,0,0,.2);
        }

        @media (max-width:480px) {
            .selector{
                width: 90%;
            }
        }

        .selector_result{
            position:relative;
            width: 100%;
            background-color:var(--smoke-white);
            height:40px;
            display:flex;
            justify-content:space-around;
            align-items:center;
            border-radius: 5px;
            border: 1px solid rgba(0,0,0,.2);
        }

        .selector-item_result{
            appearance:none;
            display:none;
        }

        .selector-item_label_result{
            position:relative;
            height:100%;
            width:100%;
            text-align:center;
            line-height:280%;
            font-family: 'Poppins', sans-serif;
            font-weight:700;
        }

        .selector-item_result:checked +  .selector-item_label_result {
            background-color: darkgray;
        }

        .align-center{
            text-align: center;
        }

    </style>
@endsection

@section('content')
    <div class="main-section">
        <div class="container-fluid">
            <div class="topbar">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="user-logo">
                            <a href=""><img src="images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group has-feedback">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control customInput" placeholder="Search Admin">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="logout-top">
                            <a href="">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- topbar -->
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
                        <li><a href="javascript:void(0)">TIA Sample</a></li>
                    </ul>
                </div>
                <div class="menu-right">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#myModal2" class="filter-btn"><span class="fa fa-filter"></span></a></li>
                    </ul>
                </div>
            </div>
            <!-- user-menu -->
        </div>
        <!-- middle-left -->
        <div class="middle-right">
            <div class="user-right-flex">
                <div>
                    <h4>TIA Sample</h4>
                </div>
                <div class="user-right-button">
                    <ul>
{{--                        <li><a href="javascript:void(0)" class="filter-btn"><span class="fa fa-trash-o"></span></a></li>--}}
                        <li><a href="" data-toggle="modal" data-target="#user-details" class="add-button"><span class="fa fa-edit"></span> Add</a></li>
                    </ul>
                </div>
            </div>
            <!-- user-right-flex -->
        </div>
        <!-- middle-right-->
    </div>
    <!-- tab-section -->
    <div class="tab-section">
        <div class="row row0">
            <div class="col-lg-3 col-sm-6">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left sideways" id="myTabs">
                    @forelse($tiaSample as $key=>$receival)
                        @php
                            if(is_string($receival->receival->grower_name) && is_array(json_decode($receival->receival->grower_name, true))){
                                $grower_name = $receival->receival->grower_name;
                            }
                            else{
                                $grower_name = $receival->receival->grower_name;
                            }
                        @endphp

                    <li class="@if($key === 0) active @endif">
                        <a href="#tab-{{ $key }}" id="tab{{ $key }}-tab" data-toggle="tab" onclick="activeTab(this);"
                           data-receivalId="{{ $receival->receival_id }}" data-id="{{ $receival->id }}">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Grower Name</th>
                                        <th>TIA Sample ID</th>
                                    </tr>
                                    <tr>
                                        @if(is_string($receival->receival->grower_name) && is_array(json_decode($receival->receival->grower_name, true)))
                                            @foreach(json_decode($receival->receival->grower_name) as $gName)
                                                <td>{{ ucwords($gName) ?? '--' }}</td>
                                            @endforeach
                                        @else
                                            <td>{{ ucwords($receival->receival->grower_name) ?? '--' }}</td>
                                        @endif

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
                @forelse($tiaSample as $v=>$val)
                    @php
                        if(is_string($val->receival->grower_name) && is_array(json_decode($val->receival->grower_name, true))){
                            $grower_name = json_decode($val->receival->grower_name);
                        }
                        else{
                            $grower_name = $val->receival->grower_name;
                        }
                        $paddock_names = json_decode($val->receival->paddock_name);
                        $seed_varietes = json_decode($val->receival->seed_variety);
                        $seed_generations = json_decode($val->receival->seed_generation);
                        @endphp

                        <div class="tab-pane @if($v === 0) active @endif" id="tab-{{ $v }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="user-boxes">
                                        <h6>Grower Name</h6>
                                        @if(is_array($grower_name))
                                            @foreach($grower_name as $gName)
                                                <h5>{{ $gName ?? '--' }}</h5>
                                            @endforeach
                                        @else
                                            <h5>{{ $grower_name ?? '--' }}</h5>
                                        @endif

                                        <h6>Time Added</h6>
                                        <h5>{{ $val->date }}</h5>

                                        <h6>Status</h6>
                                        <h5>{{ (!empty($val->result)) ?  $val->result : 'pending'}}</h5>

                                        <h6>Received ID</h6>
                                        <h5>{{ $val->id ?? '--'}}</h5>
                                    </div>
                                    <!--user-boxes -->
                                    <div class="user-boxes">
                                        <h6>Seed Variety</h6>
                                        @forelse($seed_varietes as $seed_variety)
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

                                        <h6>Grower Docket</h6>

                                        @forelse($paddock_names as $paddock_name)
                                            <h5>{{ $paddock_name }}</h5>
                                        @empty
                                            <h5>--</h5>
                                        @endforelse

                                        <h6>Cool Store</h6>
                                        <h5>Cherry Hills</h5>

                                        <h6>Processor</h6>
                                        <h5>{{ (isset($val->processor)) ? $val->processor : '--' }}</h5>

                                        <h6>Size</h6>
                                        <h5>{{ (isset($val->size)) ? $val->size : '--' }}</h5>

                                        <h6>Tonnes</h6>
                                        <h5>{{ (isset($val->tonnes)) ? $val->tonnes : '--' }}</h5>

                                        <h6>Destination</h6>
                                        <h5>{{ (isset($val->destination)) ? $val->destination : '--' }}</h5>

                                        <h6>Field Rating</h6>
                                        <h5>{{ (isset($val->field_rating)) ? $val->field_rating : '--' }}</h5>

                                        <h6>Label</h6>
                                        <h5>{{ (isset($val->labels)) ? $val->labels : '--' }}</h5>
                                    </div>
                                    <!--user-boxes -->
                                </div>
                                <!-- col -->
                                <div class="col-md-6">
                                    <h4>TIA Seed Potato Certification Sheet</h4>
                                    <div class="user-boxes">
                                        <h6>No of Tubers Samples: {{ (isset($val->tubers_qty)) ? $val->tubers_qty : '--' }}</h6>

                                        <h6>Dry Rot: {{ (isset($val->dry_rot)) ? $val->dry_rot : '--' }} {{ (isset($val->dry_rot_percent)) ? '('.$val->dry_rot_percent.'%)' : '--' }}</h6>

                                        <h6>Black Scurf 2mm: {{ (isset($val->black_scruf_2mm)) ? $val->black_scruf_2mm : '--' }} {{ (isset($val->black_scruf_2mm_percent)) ? '('.$receival->black_scruf_2mm_percent.'%)' : '--' }}</h6>

                                        <h6>Powdery Scab: {{ (isset($val->powdery_scab)) ? $val->powdery_scab : '--' }} {{ (isset($val->powdery_scab_percent)) ? '('.$val->powdery_scab_percent.'%)' : '--' }}</h6>

                                        <h6>Rootnot Nematode: {{ (isset($val->rootnot_nema)) ? $val->rootnot_nema : '--' }} {{ (isset($val->rootnot_nema_percent)) ? '('.$val->rootnot_nema_percent.'%)' : '--' }}</h6>

                                        <h6>Soft Rots: {{ (isset($val->soft_rots)) ? $val->soft_rots : '--' }} {{ (isset($val->soft_rots_percent)) ? '('.$val->soft_rots_percent.'%)' : '--' }}</h6>

                                        <h6>Pink Rot: {{ (isset($val->pink_rot)) ? $val->pink_rot : '--' }} {{ (isset($val->pink_rot_percent)) ? '('.$val->pink_rot_percent.'%' : '--' }}</h6>

                                        <h6>Sub Total: {{ (isset($val->sub_total_percentage)) ? $val->sub_total_percentage .'%' : '--' }}</h6>

                                        <h6>Common Scab: {{ (isset($val->common_scab)) ? $val->common_scab : '--' }} {{ (isset($val->common_scab_percent)) ? '('.$val->common_scab_percent.'%)' : '--' }}</h6>

                                        <h6>TOTAL DISEASE: {{ (isset($val->total_disease_percent)) ? ($val->total_disease_percent) : '--' }}</h6>

                                    </div>

                                    <!--user-boxes -->
                                    <h4>Continue External Report</h4>
                                    <div class="user-boxes">
                                        <h6>Black Scurf scatter: {{ (isset($val->black_scurf_scatter)) ? $val->black_scurf_scatter : '--' }} {{ (isset($val->black_scurf_scatter_percent)) ? '('.$val->black_scurf_scatter_percent.'%)' : '--' }}</h6>

                                        <h6>Insect damage: {{ (isset($val->insect_damage)) ? $val->insect_damage : '--' }} {{ (isset($val->insect_damage_percent)) ? '('.$val->insect_damage_percent.'%)' : '--' }}</h6>

                                        <h6>Malformed tubers: {{ (isset($val->malformed_tuber)) ? $val->malformed_tuber : '--' }} {{ (isset($val->malformed_tuber_percent)) ? '('.$val->malformed_tuber_percent.'%)' : '--' }}</h6>

                                        <h6>Mechanical damage: {{ (isset($val->mechanical_damage)) ? $val->mechanical_damage : '--' }} {{ (isset($val->mechanical_damage_percent)) ? '('.$val->mechanical_damage_percent.'%)' : '--' }}</h6>

                                        <h6>Stem end discolour: {{ (isset($val->stem_end_discolour)) ? $val->stem_end_discolour : '--' }} {{ (isset($val->stem_end_discolour_percent)) ? '('.$val->stem_end_discolour_percent.'%)' : '--' }}</h6>

                                        <h6>Foreign cultivars: {{ (isset($val->foreign_cultivars)) ? $val->foreign_cultivars : '--' }} {{ (isset($val->foreign_cultivars_percent)) ? '('.$val->foreign_cultivars_percent.'%)' : '--' }}</h6>

                                        <h6>Misc. frost: {{ (isset($val->misc_frost)) ? $val->misc_frost : '--' }} {{ (isset($val->misc_frost_percent)) ? '('.$val->misc_frost_percent.'%)' : '--' }}</h6>

                                        <h6>Total Defects: {{ (isset($val->total_defects)) ? ($val->total_defects.'%') : '--' }}</h6>

                                        <h6>Minimal insect feeding: {{ (isset($val->minimal_insect_feeding)) ? $val->minimal_insect_feeding : '--' }} {{ (isset($val->minimal_insect_feeding_percent)) ? '('.$val->minimal_insect_feeding_percent.'%)' : '--' }}</h6>

                                        <h6>Oversize: {{ (isset($val->oversize)) ? $val->oversize : '--' }} {{ (isset($val->oversize_percent)) ? '('.$val->oversize_percent.'%)' : '--' }}</h6>

                                        <h6>Undersize: {{ (isset($val->undersize)) ? $val->undersize : '--' }} {{ (isset($val->undersize_percent)) ? '('.$val->undersize_percent.'%)' : '--' }}</h6>

                                        <h6>Disease Scoring Key: {{ (isset($val->disease_score)) ? $val->disease_score : '--' }}</h6>
                                    </div>
                                    <!--user-boxes -->

                                    <h4>Continue External Report</h4>
                                    <div class="user-boxes">
                                        <h6>Excessive dirt: {{ (isset($val->excessive_dirt)) ? $val->excessive_dirt : '--' }}</h6>

                                        <h6>Minor skin cracking: {{ (isset($val->minor_skin_cracking)) ? $val->minor_skin_cracking : '--' }}</h6>

                                        <h6>Skining: {{ (isset($val->skining)) ? $val->skining : '--' }}</h6>

                                        <h6>Regrading: {{ (isset($val->regrading)) ? $val->regrading : '--' }}</h6>

                                        <h6>Comment: {{ (isset($val->comment)) ? $val->comment : '--' }}</h6>
                                    </div>
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

    @include('portal.tia-sample.add-tia')
@endsection

@section('JS')
    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        function initializeMultiSelect(){
            setTimeout(function () {
                $('.js-example-tags').select2({
                    tags: true,
                });
            }, 500);
        }

        $(document).ready(function (){
            var id = $('#myTabs .active a').attr('data-receivalId');
            var tiaId = $('#myTabs .active a').attr('data-id');

            $.ajax({
               url: '{{ route('tia-add-modal') }}',
               type: 'GET',
               dataType: 'JSON',
               data: {id:id, tiaId: tiaId},
                success: function (response){
                   console.log(response.data);
                    appendEditModel(response.data);
                     initializeMultiSelect();
                }
            });

        });

        function activeTab(pointer){
            var id = $(pointer).attr('data-receivalId');
            var tiaId = $(pointer).attr('data-id');

            $.ajax({
                url: '{{ route('tia-add-modal') }}',
                type: 'GET',
                dataType: 'JSON',
                data: {id:id, tiaId: tiaId},
                success: function (response){
                    console.log(response.data);
                    appendEditModel(response.data);
                    initializeMultiSelect();
                }
            });
        }

        function appendEditModel(receival){
            receival.paddock_name = JSON.parse(receival.receival.paddock_name);
            receival.seed_variety = JSON.parse(receival.receival.seed_variety);
            receival.seed_generation = JSON.parse(receival.receival.seed_generation);
            // var growerName = receival.receival.grower_name;
            // checkGrowerNameString(growerName)

            function generateSelectOptions(dataArray) {
                let options = '';
                dataArray.forEach(item => {
                    options += `<option value="${item}" selected>${item}</option>`;
                });
                return options;
            }

            $('.append-form').html(`
                <form action="{{ route('store.tia_sample') }}" method="post" enctype="multipart/form-data">
                    @csrf

                <input type="hidden" name="tia_id" value="${receival.id}" />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inspection_no">Inspection No.</label>
                        <input type="text" id="inspection_no" name="inspection_no" class="form-control" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" value="${receival.created_at}" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grower_name">
                        <div class="form-group">
                            <label for="grower_name">Grower Name</label>
                            <input type="text" name="grower_name" value="${receival.receival.grower_name}" id="grower_name" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 seed_variety">
                        <div class="form-group">
                            <label for="seed_variety">Seed Variety</label>
                            <select name="seed_variet[]" id="seed_variety" class="js-example-tags form-control" multiple="multiple">
                                ${generateSelectOptions(receival.seed_variety)}
                            </select>

                        </div>
                    </div>

                    <div class="col-md-6 seed_generation">
                        <div class="form-group">
                            <label for="seed_generation">Seed Generation</label>
                            <select name="seed_generation[]" id="seed_generation" class="js-example-tags form-control" multiple="multiple">
                                ${generateSelectOptions(receival.seed_generation)}
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group grower_docket">
                            <label for="grower_docket">Grower Docket</label>
                            <input type="text" name="grower_docket" id="grower_docket" value="${receival.receival.grower_docket_no ? receival.receival.grower_docket_no : ''}" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cool_store">Coolstore</label>
                            <input type="text" name="cool_store" id="cool_store" style="pointer-events: none" value="Cherry Hills" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-6 paddock_no">
                        <div class="form-group">
                            <label for="paddock_no">Paddock No.</label>
                            <select name="paddock_no[]" id="paddock_no" class="js-example-tags form-control" multiple="multiple">
                                ${generateSelectOptions(receival.paddock_name)}
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="processor">Processor</label>
                            <input type="text" name="processor" id="processor" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Size:</label>
                        <div class="selector">
                            <div class="selector-item">
                                <input type="radio" id="size1" value="30-350g" name="size" class="selector-item_radio" checked>
                                <label for="size1" class="selector-item_label">30-350g</label>
                            </div>
                            <div class="selector-item">
                                <input type="radio" id="size2" value="90mm" name="size" class="selector-item_radio">
                                <label for="size2" class="selector-item_label">90mm</label>
                            </div>
                            <div class="selector-item">
                                <input type="radio" value="70mm" id="size3" name="size" class="selector-item_radio">
                                <label for="size3" class="selector-item_label">70mm</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tonnes">Tonnes: </label>
                            <input type="text" name="tonnes" class="form-control" id="tonnes" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="destination">Destination: </label>
                            <input type="text" name="destination" class="form-control" id="destination" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field_rating">Field Rating: </label>
                            <input type="text" name="field_rating" class="form-control" id="field_rating" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="labels">Labels: </label>
                            <input type="text" name="labels" class="form-control" id="labels" />
                        </div>
                    </div>
                </div>

                <table style="margin-top: 60px;" class="table">
                    <thead></thead>
                    <tbody>

@include('portal.tia-sample.tia-table')

            </tbody>
        </table>

        <div class="row">
            <div class="col-md-3">
                <p>Regrading
                    <span>
                    <label class="switch">
                      <input type="checkbox" name="regrading">
                      <span class="slider round"></span>
                    </label>
                </span></p>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-2">
                        <p>Comment</p>
                    </div>

                    <div class="col-md-10">
                        <input type="text" name="comment" class="form-control" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 30px; display: flex; justify-content: center;">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2" style="padding-top: 10px">
                        <label style="margin-right: 5px">Result:</label>
                    </div>
                    <div class="col-md-10">
                        <div class="selector">
                            <div class="selector-item">
                                <input type="radio" id="result1" name="result" value="certified" class="selector-item_radio" checked>
                                <label for="result1" class="selector-item_label" style="font-size: 12px; padding-top: 5px">Certified</label>
                            </div>
                            <div class="selector-item">
                                <input type="radio" id="result2" name="result" value="not_certified" class="selector-item_radio">
                                <label for="result2" class="selector-item_label" style="font-size: 12px; padding-top: 5px">Not Certified</label>
                            </div>
                            <div class="selector-item">
                                <input type="radio" id="result3" name="result" value="registered" class="selector-item_radio">
                                <label for="result3" class="selector-item_label" style="font-size: 12px; padding-top: 5px">Registered</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6" style="margin-top: 15px">
                <label for="tia_img">TIA Sample Image</label>

                <div>
                    <a class="btn" onclick="selectImage();" id="custom-button" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Choose Image</a>
                    <div id="selected-image"></div>
                    <input type="file" id="file-input" name="tia_image" style="display: none" accept="image/*">
                </div>
            </div>

            <div class="col-md-6" style="margin-top: 40px; text-align: end">
                <a href="javascript:void(0);" style="background: #E22827; border: 1px solid #E22827; color: #fff;
        text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Export Sample to Excel</a>
            </div>
        </div>

        <div style="margin-top: 20px; display: flex; justify-content: end">
        <span style="padding-right: 5px">
            <button type="button" class="add-button" data-dismiss="modal" style="background: #E22827; border: 1px solid #E22827; color: #fff;
        text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Close</button>
        </span>

            <span>
            <button type="submit" class="add-button" style="background: #E22827; border: 1px solid #E22827; color: #fff;
        text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Submit</button>
        </span>
        </div>
    </form>
`);
        }

        function selectImage(){
            const fileInput = document.getElementById('file-input');

            const customButton = document.getElementById('custom-button');
            const selectedImage = document.getElementById('selected-image');

            customButton.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                selectedImage.textContent = `${fileInput.files[0].name}`;
            });
        }

        function changeColor(pointer){
            var radioGroup = $('input[name="' + $(pointer).attr('name') + '"]');

            $('.selector_result').css('background-color', '');

            var selectorResult = $(pointer).closest('td').find('.selector_result');

            if (radioGroup.is(':checked')) {
                selectorResult.css('background-color', 'darkgray');
            }
        }

        function tuberQty(pointer){
            let qty = $(pointer).val();
            $('.tubers_qty').val(qty);
        }

        function dryRot(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.dry_rot_percent').val(result);
            } else{
                $('.dry_rot_percent').val('');
            }

            subTotal();
        }

        function blackScruf2mm(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.black_scruf_2mm_percent').val(result);
            } else{
                $('.black_scruf_2mm_percent').val('');
            }

            subTotal();
        }

        function powderyScab(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.powdery_scab_percent').val(result);
            } else{
                $('.powdery_scab_percent').val('');
            }

            subTotal();
        }

        function rootnotNema(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.rootnot_nema_percent').val(result);
            } else{
                $('.rootnot_nema_percent').val('');
            }

            subTotal();
        }

        function softRots(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.soft_rots_percent').val(result);
            } else{
                $('.soft_rots_percent').val('');
            }

            subTotal();
        }

        function pinkRot(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.pink_rot_percent').val(result);
            } else{
                $('.pink_rot_percent').val('');
            }

            subTotal();
        }

        function commonScab(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.common_scab_percent').val(result);
            } else{
                $('.common_scab_percent').val('');
            }

            totalDisease(result);
        }

        function totalDiseasePercent(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.black_scurf_scatter_percent').val(result);
            } else{
                $('.black_scurf_scatter_percent').val('');
            }
        }

        function blackScurfScatter(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.black_scurf_scatter_percent').val(result);
            } else{
                $('.black_scurf_scatter_percent').val('');
            }
            totalDefects();
        }

        function insectDamage(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.insect_damage_percent').val(result);
            } else{
                $('.insect_damage_percent').val('');
            }
            totalDefects();
        }

        function malformedTuber(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.malformed_tuber_percent').val(result);
            } else{
                $('.malformed_tuber_percent').val('');
            }
            totalDefects();
        }

        function mechanicalDamage(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.mechanical_damage_percent').val(result);
            } else{
                $('.mechanical_damage_percent').val('');
            }
            totalDefects();
        }

        function stemEndDiscolour(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.stem_end_discolour_percent').val(result);
            } else{
                $('.stem_end_discolour_percent').val('');
            }
            totalDefects();
        }

        function foreignCultivars(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.foreign_cultivars_percent').val(result);
            } else{
                $('.foreign_cultivars_percent').val('');
            }
            totalDefects();
        }

        function miscFrost(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.misc_frost_percent').val(result);
            } else{
                $('.misc_frost_percent').val('');
            }
            totalDefects();
        }

        function minimalInsectFeeding(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.minimal_insect_feeding_percent').val(result);
            } else{
                $('.minimal_insect_feeding_percent').val('');
            }

            totalDefects();
        }

        function overSize(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.oversize_percent').val(result);
            } else{
                $('.oversize_percent').val('');
            }

            totalDefects();
        }

        function underSize(pointer){
            let value = parseFloat($(pointer).val());

            let result = calculatePercent(value)
            if(result && !isNaN(result)){
                $('.undersize_percent').val(result);
            } else{
                $('.undersize_percent').val('');
            }

            totalDefects();
        }

        function calculatePercent(fieldValue){
            var tubersValue = parseFloat($('.tubers').val());

            if (!isNaN(fieldValue)) {
                var percentage = (fieldValue / tubersValue) * 100;
                return percentage.toFixed(2);
            } else {
                return 0;
            }
        }

        function subTotal(){
            let a = parseFloat($('.dry_rot_percent').val());
            let b = parseFloat($('.black_scruf_2mm_percent').val());
            let c = parseFloat($('.powdery_scab_percent').val());
            let d = parseFloat($('.rootnot_nema_percent').val());
            let e = parseFloat($('.soft_rots_percent').val());
            let f = parseFloat($('.pink_rot_percent').val());

            a = isNaN(a) ? 0 : a;
            b = isNaN(b) ? 0 : b;
            c = isNaN(c) ? 0 : c;
            d = isNaN(d) ? 0 : d;
            e = isNaN(e) ? 0 : e;
            f = isNaN(f) ? 0 : f;

            let result = a + b + c + d + e + f;

            if(result && !isNaN(result)){
                $('.sub_total_percentage').val(result.toFixed(2));
            } else{
                $('.sub_total_percentage').val('');
            }
        }

        function totalDisease(common_scab){
            let sub_total = $('.sub_total_percentage').val()
            sub_total = isNaN(sub_total) ? 0 : sub_total;

            if(common_scab && !isNaN(common_scab)){
                let result = parseFloat(common_scab) + parseFloat(sub_total);
                $('.total_disease_percent').val(result.toFixed(2));
            }
            else{
                $('.total_disease_percent').val('');
            }
        }

        function totalDefects(){

            let a = parseFloat($('.insect_damage_percent').val());
            let b = parseFloat($('.malformed_tuber_percent').val());
            let c = parseFloat($('.mechanical_damage_percent').val());
            let d = parseFloat($('.stem_end_discolour_percent').val());
            let e = parseFloat($('.foreign_cultivars_percent').val());
            let f = parseFloat($('.minimal_insect_feeding_percent').val());
            let g = parseFloat($('.misc_frost_percent').val());
            let h = parseFloat($('.oversize_percent').val());
            let i = parseFloat($('.undersize_percent').val());

            a = isNaN(a) ? 0 : a;
            b = isNaN(b) ? 0 : b;
            c = isNaN(c) ? 0 : c;
            d = isNaN(d) ? 0 : d;
            e = isNaN(e) ? 0 : e;
            f = isNaN(f) ? 0 : f;
            g = isNaN(g) ? 0 : g;
            h = isNaN(h) ? 0 : h;
            i = isNaN(i) ? 0 : i;

            let result = a + b + c + d + e + f + g + h + i;

            if(result && !isNaN(result)){
                $('.total_defects_percent').val(result.toFixed(2));
            } else{
                $('.total_defects_percent').val('');
            }
        }
    </script>

@endsection
