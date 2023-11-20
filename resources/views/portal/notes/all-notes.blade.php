@extends('components.layouts')

@section('title', 'Notes')

@section('content')
    <div class="main-section">
        <div class="container-fluid">
            <div class="topbar">
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <div class="user-logo">
                            <a href=""><img src="images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="form-group has-feedback">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control customInput" placeholder="Search Notes">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <div class="logout-top">
                            <a href="{{ route('logout') }}">Logout</a>
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
                        <h4>Notes</h4>
                        <p>
                            <a href="#" data-toggle="modal" data-target="#notes-modal" class="mobile-redbtn">Add</a>
                        </p>
                    </div>
                    <!-- topbar-flex -->
                    <p class="mobile-filtericon">
                        <a href="#" data-toggle="modal" data-target="#myModal2">Filter <img src="images/filter-list.png" alt=""></a>
                    </p>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search for a notes here.." name="" id="">
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
                        <li><a href="">Notes</a></li>
                    </ul>
                </div>
                <div class="menu-right">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#myModal2" class="filter-btn"><span class="fa fa-filter"></span></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal" class="add-button"><span class="fa fa-plus"></span> Add</a></li>
                    </ul>
                </div>
            </div>
            <!-- user-menu -->
        </div>
        <!-- middle-left -->
        <div class="middle-right">
            <div class="user-right-flex">
                <div>
                    <h4 id="title"></h4>
                </div>
                <div class="user-right-button">
                    <div class="row">
                        <div class="col-md-3">
                            <form action="" method="post" id="delete">
                                @method('delete')
                                @csrf

                                <button type="submit" style="border: none !important; background-color: unset !important;">
                                    <span class="fa fa-trash-o"></span>
                                </button>
                                {{--                                <a href="" class="filter-btn"></a>--}}
                            </form>
                        </div>

                        <div class="col-md-9">
                            <a href="javascript:void (0);" id="" onclick="editNote(this);" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;" class="add-button"><span class="fa fa-edit"></span> Edit</a>
                        </div>
                    </div>
{{--                    <ul>--}}
{{--                        <li>--}}

{{--                        </li>--}}

{{--                    </ul>--}}
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
                    @forelse($notes as $key=>$note)
                        <li class="@if($key === 0) active @endif">
                            <a href="#tab-{{ $key }}" id="tab{{ $key }}-tab" data-id="{{ $note->id }}" data-title="{{ $note->notes_title ?? '' }}" onclick="activeTab(this);" data-toggle="tab">
                                <div class="user-table">
                                    <table class="table">
                                        <tr>
                                            <th>{{ date('Y-m-d', strtotime($note->created_at)) ?? '' }}</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>{{ $note->notes_title ?? ''}}</td>
                                            <td>
                                                @php $receival = json_decode($note->receivals) @endphp
                                                <a href="javascript:void (0)" class="tab-redbtn">{{ $receival[0] ?? '' }}</a>
                                            </td>
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
                    @forelse($notes as $v=>$val)
                        <div class="tab-pane @if($v === 0) active @endif" id="tab-{{ $v }}">
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="user-boxes notes-list">
                                        <p>
                                            {{ $val->notes_discription ?? '' }}
                                        </p>
                                        <ul>
                                            @php
                                                $img = ($note->notes_img) ? $note->notes_img : 'no-img.png';
                                            @endphp
                                            <li><a href=""><img src="{{ asset('images') . "/" . $img }}" alt="No Image"></a></li>
                                        </ul>
                                    </div>
                                    <!-- user-boxes -->
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

    @include('portal.notes.add-notes')
    @include('portal.notes.edit-notes')
@endsection

@section('JS')
    <script>
        $('.js-example-tags').select2({
            tags: true,
        });

        $(document).ready(function (){
            let title = $('#myTabs .active a').attr('data-title');
            let id = $('#myTabs .active a').attr('data-id');
            $('#title').text(title);
            $('.add-button').attr('id', id);
            $('#delete').attr('action', '{{ route('note.destroy', ['note' => ':id']) }}'.replace(':id', id));
        });

        function activeTab(pointer){
            let title = $(pointer).attr('data-title');
            $('#title').text(title);

            let id = $(pointer).attr('data-id');
            $('.add-button').attr('id', id);
            $('#delete').attr('action', '{{ route('note.destroy', ['note' => ':id']) }}'.replace(':id', id));
        }

        function editNote(pointer){
            let id = $(pointer).attr('id');

            $.ajax({
                url: `{{ route('note.edit', ['note' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response){
                    let updateRoute = `{{ route('note.update', ['note' => ':id']) }}`.replace(':id', response.data.id);
                    response.data.receivals = JSON.parse(response.data.receivals);

                    function generateSelectOptions(dataArray) {
                        let options = '';
                        dataArray.forEach(item => {
                            options += `<option value="${item}" selected>${item}</option>`;
                        });
                        return options;
                    }

                    $('.edit-note').html(`
                        <form action="${updateRoute}" method="post" enctype="multipart/form-data">
                            @method('put')
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="notes_title" value="${response.data.notes_title}" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="notes_discription">${response.data.notes_discription}</textarea>
                                </div>

                                <div class="form-group">
                                    <select id="receival" name="receivals[]" class="js-example-tags form-control" multiple="multiple">
                                        ${generateSelectOptions(response.data.receivals)}
                                    </select>
                                </div>

                            <div class="form-group">
                                <label for="notes_img">Attachment</label>
                                <input type="file" id="notes_img" name="notes_img" class="form-control" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                            text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">+ Update Notes</button>
                        </div>
                    </form>
`);
                    initializeMultiSelect();
                    $('#edit-note').modal('show');
                }
            });
        }


        function initializeMultiSelect(){
            setTimeout(function () {
                $('.js-example-tags').select2({
                    tags: true,
                });
            }, 100);
        }
    </script>
@endsection
