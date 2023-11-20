@extends('components.layouts')

@section('title', 'Admin Options')

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
                        <li><span class="fa fa-chevron-right"></span></li>
                        <li><a href="">Admin Options</a></li>
                    </ul>
                </div>
                <div class="menu-right">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#myModal2" class="filter-btn"><span
                                    class="fa fa-filter"></span></a></li>
                    </ul>
                </div>
            </div>
            <!-- user-menu -->
        </div>
        <!-- middle-left -->
        <div class="middle-right">
            <div class="user-right-flex">
                <div>
                    <h4>Admin Options</h4>
                </div>
                <div class="user-right-button">
                    <ul>
                        <li><a href="" class="add-button" data-toggle="modal" data-target=""><span
                                    class="fa fa-edit"></span> Add</a></li>
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
            <div class="col-lg-3">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left tabs-left-admin sideways">
                    {{--                    <li class="active">--}}
                    {{--                        <a href="#tab-1" data-toggle="tab">--}}
                    {{--                            <div class="user-table">--}}
                    {{--                                <table class="table">--}}
                    {{--                                    <tr>--}}
                    {{--                                        <th>Bin Size</th>--}}
                    {{--                                    </tr>--}}
                    {{--                                </table>--}}
                    {{--                                <span class="fa fa-angle-right angle-right"></span>--}}
                    {{--                            </div>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    <li class="active">
                        <a href="#tab-2" data-toggle="tab" onclick="activeTab(this);">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Seed Class</th>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-3" data-toggle="tab" onclick="activeTab(this);">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Delivery Type</th>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-4" data-toggle="tab" onclick="activeTab(this);">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Fungicide</th>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-5" data-toggle="tab" onclick="activeTab(this);">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Seed Generation</th>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-6" data-toggle="tab" onclick="activeTab(this);">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Buyer Group Type</th>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-7" data-toggle="tab" onclick="activeTab(this);">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Grower Group Type</th>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="#tab-8" data-toggle="tab" onclick="activeTab(this);">--}}
{{--                            <div class="user-table">--}}
{{--                                <table class="table">--}}
{{--                                    <tr>--}}
{{--                                        <th>Job Type</th>--}}
{{--                                    </tr>--}}
{{--                                </table>--}}
{{--                                <span class="fa fa-angle-right angle-right"></span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li>
                        <a href="#tab-8" data-toggle="tab" onclick="activeTab(this);">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Paddocks</th>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
                    {{--                    <li>--}}
                    {{--                        <a href="#tab-10" data-toggle="tab">--}}
                    {{--                            <div class="user-table">--}}
                    {{--                                <table class="table">--}}
                    {{--                                    <tr>--}}
                    {{--                                        <th>Seasons</th>--}}
                    {{--                                    </tr>--}}
                    {{--                                </table>--}}
                    {{--                                <span class="fa fa-angle-right angle-right"></span>--}}
                    {{--                            </div>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    <li>
                        <a href="#tab-9" data-toggle="tab" onclick="activeTab(this);">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Seed Type</th>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-10" data-toggle="tab" onclick="activeTab(this);">
                            <div class="user-table">
                                <table class="table">
                                    <tr>
                                        <th>Seed Variety</th>
                                    </tr>
                                </table>
                                <span class="fa fa-angle-right angle-right"></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8">
                <!-- Tab panes -->
                <div class="tab-content">
{{--                    <div class="tab-pane active" id="tab-1">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="user-boxes">--}}
{{--                                    <h5>Bin Size</h5>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="" class="red-btn"> <span class="fa fa-edit"></span> Edit</a></li>--}}
{{--                                        <li><a href="" class="trash-btn"><span class="fa fa-trash-o"></span></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <!--user-boxes -->--}}
{{--                            </div>--}}
{{--                            <!-- col -->--}}
{{--                        </div>--}}
{{--                        <!-- row -->--}}
{{--                    </div>--}}
                    <!-- tab-1 -->
                    <div class="tab-pane" id="tab-2"></div>
                    <!-- tab-2 -->
                    <div class="tab-pane" id="tab-3"></div>
                    <!-- tab-3 -->
                    <div class="tab-pane" id="tab-4"></div>
                    <!-- tab-4 -->
                    <div class="tab-pane" id="tab-5"></div>
                    <!-- tab-5 -->
                    <div class="tab-pane" id="tab-6"></div>
                    <!-- tab-6 -->
                    <div class="tab-pane" id="tab-7"></div>
                    <!-- tab-7 -->
                    <div class="tab-pane" id="tab-8"></div>

                    <div class="tab-pane" id="tab-9"></div>

                    <div class="tab-pane" id="tab-10"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- row -->
    </div>
    <!-- tab-section -->
    <!-- Modal -->
    <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">&times;</span> -->
                        <span class="fa fa-arrow-left"></span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Unloading</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <li><a href="">Unique ID <span class="fa fa-angle-right"></span> </a></li>
                        <li><a href="">Name <span class="fa fa-angle-right"></span> </a></li>
                        <li><a href="">Email <span class="fa fa-angle-right"></span> </a></li>
                        <li><a href="">Username <span class="fa fa-angle-right"></span> </a></li>
                        <li><a href="">User Access <span class="fa fa-angle-right"></span> </a></li>
                    </ul>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- modal -->

    @include('portal.admin-options.seed-class-model')
    @include('portal.admin-options.delivery-type')
    @include('portal.admin-options.fungicide')
    @include('portal.admin-options.seed-generation')
    @include('portal.admin-options.buyer_group_type')
    @include('portal.admin-options.grower-group-type')
    @include('portal.admin-options.paddock')
    @include('portal.admin-options.seed-type')
    @include('portal.admin-options.seed-variety')
    @include('portal.admin-options.edit-seed-class')
    @include('portal.admin-options.edit-delivery-type')
    @include('portal.admin-options.edit-fungicide')
    @include('portal.admin-options.edit-seed-generation')
    @include('portal.admin-options.edit-seed-type')
    @include('portal.admin-options.edit-seed-variety')
    @include('portal.admin-options.edit-buyer-type')
    @include('portal.admin-options.edit-grower-type')
    @include('portal.admin-options.edit-paddock')
@endsection

@section('JS')
    <script>
        $(document).ready(function () {
            $('.add-button').attr('data-target', '#tab-20');
            getData('#tab-20');
        });

        function activeTab(pointer) {
            let target = $(pointer).attr('href');
            target = target + 0;
            $('.add-button').attr('data-target', target);
            getData(target);
        }

        function getData(t){
            let url;
            let selector;

            if(t === '#tab-20'){
                url = '{{ route('seedClass.index') }}';
                selector = '#tab-2';
            }
            if(t === '#tab-30'){
                url = '{{ route('deliveryType.index') }}';
                selector = '#tab-3';
            }
            if(t === '#tab-40'){
                url = '{{ route('fungicide.index') }}';
                selector = '#tab-4';
            }
            if(t === '#tab-50'){
                url = '{{ route('seedGeneration.index') }}';
                selector = '#tab-5';
            }
            if(t === '#tab-60'){
                url = '{{ route('buyerGroupType.index') }}';
                selector = '#tab-6';
            }
            if(t === '#tab-70'){
                url = '{{ route('growerGroupType.index') }}';
                selector = '#tab-7';
            }
            if(t === '#tab-80'){
                url = '{{ route('paddock.index') }}';
                selector = '#tab-8';
            }
            if(t === '#tab-90'){
                url = '{{ route('seedType.index') }}';
                selector = '#tab-9';
            }
            if(t === '#tab-100'){
                url = '{{ route('seedVariety.index') }}';
                selector = '#tab-10';
            }

            $.ajax({
               url: url,
               type: 'GET',
               dataType: 'JSON',
               success: function (response){
                   console.log(response.data)
                   $(selector).addClass('active').html(response.data);
               }
            });
        }

        function editSeedClass(pointer){
            let id = $(pointer).data('id');
            $.ajax({
                url: `{{ route('seedClass.edit', ['seedClass' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('seedClass.update', ['seedClass' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-seed-class').html(`
                        <form action="${updateRoute}" method="post">
                            @method('put')
                                @csrf
                            <div class="modal-body">
                                <label for="seed_class_name">Seed Class Name</label>
                                <input type="text" id="seed_class_name" name="seed_class_name" value="${response.data.name}" class="form-control" />
                            </div>
                            <div class="modal-footer">
                                {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                                text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">update</button>
                            </div>
                        </form>
                    `);

                    $('#edit-seed-class').modal('show');
                }
            });

        }

        function editDeliveryType(pointer){
            let id = $(pointer).data('id');
            $.ajax({
                url: `{{ route('deliveryType.edit', ['deliveryType' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('deliveryType.update', ['deliveryType' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-delivery-type').html(`
                        <form action="${updateRoute}" method="post">
                            @method('put')
                            @csrf

                            <div class="modal-body">
                                <label for="delivery_type">Delivery Type</label>
                                <input type="text" id="delivery_type" name="delivery_type" value="${response.data.name}" class="form-control" />
                            </div>

                            <div class="modal-footer">
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                                text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">update</button>
                            </div>
                        </form>
`);

                    $('#edit-delivery-type').modal('show');
                }
            });

        }

        function editFungicide(pointer){
            let id = $(pointer).data('id');
            $.ajax({
                url: `{{ route('fungicide.edit', ['fungicide' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('fungicide.update', ['fungicide' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-fungicide').html(`
                        <form action="${updateRoute}" method="post">
                            @method('put')
                            @csrf

                    <div class="modal-body">
                        <label for="fungicide">Fungicide</label>
                        <input type="text" id="fungicide" name="fungicide" value="${response.data.name}" class="form-control" />
                    </div>

                    <div class="modal-footer">
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                        <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                        text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">update</button>
                    </div>
            </form>
        `);

                    $('#edit-fungicide').modal('show');
                }
            });

        }

        function editSeedGeneration(pointer){
            let id = $(pointer).data('id');
            $.ajax({
                url: `{{ route('seedGeneration.edit', ['seedGeneration' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('seedGeneration.update', ['seedGeneration' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-seed-generation').html(`
                        <form action="${updateRoute}" method="post">
                            @method('put')
                            @csrf

                    <div class="modal-body">
                        <label for="seed_generation">Seed Generation</label>
                        <input type="text" id="seed_generation" name="seed_generation" value="${response.data.name}" class="form-control" />
                    </div>

                    <div class="modal-footer">
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">update</button>
                </div>
        </form>
`);

                    $('#edit-seed-generation').modal('show');
                }
            });

        }

        function editSeedType(pointer){
            let id = $(pointer).data('id');
            $.ajax({
                url: `{{ route('seedType.edit', ['seedType' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('seedType.update', ['seedType' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-seed-type').html(`
                        <form action="${updateRoute}" method="post">
                            @method('put')
                    @csrf

                    <div class="modal-body">
                        <label for="seed_type">Seed Type</label>
                        <input type="text" id="seed_type" name="seed_type" value="${response.data.name}" class="form-control" />
                    </div>

                    <div class="modal-footer">
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">update</button>
                </div>
        </form>
`);

                    $('#edit-seed-type').modal('show');
                }
            });

        }

        function editSeedVariety(pointer){
            let id = $(pointer).data('id');
            $.ajax({
                url: `{{ route('seedVariety.edit', ['seedVariety' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('seedVariety.update', ['seedVariety' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-seed-variety').html(`
                        <form action="${updateRoute}" method="post">
                            @method('put')
                            @csrf

                    <div class="modal-body">
                        <label for="seed_variety">Seed Variety</label>
                        <input type="text" id="seed_variety" name="seed_variety" value="${response.data.name}" class="form-control" />
                    </div>

                    <div class="modal-footer">
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">update</button>
                </div>
        </form>
`);

                    $('#edit-seed-variety').modal('show');
                }
            });

        }

        function editSBuyerGroup(pointer){
            let id = $(pointer).data('id');
            $.ajax({
                url: `{{ route('buyerGroupType.edit', ['buyerGroupType' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('buyerGroupType.update', ['buyerGroupType' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-buyer-type').html(`
                        <form action="${updateRoute}" method="post">
                            @method('put')
                    @csrf

                    <div class="modal-body">
                        <label for="buyer_group_type">Buyer Group Type</label>
                        <input type="text" id="buyer_group_type" name="buyer_group_type" value="${response.data.name}" class="form-control" />
                    </div>

                    <div class="modal-footer">
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">update</button>
                </div>
        </form>
`);

                    $('#edit-buyer-type').modal('show');
                }
            });

        }

        function editGrowerGroup(pointer){
            let id = $(pointer).data('id');
            $.ajax({
                url: `{{ route('growerGroupType.edit', ['growerGroupType' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('growerGroupType.update', ['growerGroupType' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-grower-type').html(`
                        <form action="${updateRoute}" method="post">
                            @method('put')
                    @csrf

                    <div class="modal-body">
                        <label for="grower_group_type">Grower Group Type</label>
                        <input type="text" id="grower_group_type" name="grower_group_type" value="${response.data.name}" class="form-control" />
                    </div>

                    <div class="modal-footer">
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">update</button>
                </div>
        </form>
`);

                    $('#edit-grower-type').modal('show');
                }
            });

        }

        function editPaddock(pointer){
            let id = $(pointer).data('id');
            $.ajax({
                url: `{{ route('paddock.edit', ['paddock' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('paddock.update', ['paddock' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-paddock').html(`
                        <form action="${updateRoute}" method="post">
                            @method('put')
                    @csrf

                    <div class="modal-body">
                        <label for="paddock">Paddock</label>
                        <input type="text" id="paddock" name="paddock" value="${response.data.paddock_name}" class="form-control" />

                        <label for="no_of_hectares">No of Hectares</label>
                        <input type="text" id="no_of_hectares" name="no_of_hectares" value="${response.data.no_of_hectares}" class="form-control" />
                    </div>

                    <div class="modal-footer">
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">update</button>
                </div>
        </form>
`);

                    $('#edit-paddock').modal('show');
                }
            });

        }
    </script>
@endsection
