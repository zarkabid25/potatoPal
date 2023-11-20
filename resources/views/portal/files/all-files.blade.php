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
                            <input type="text" class="form-control customInput" placeholder="Search Files">
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
                        <h4>Files</h4>
                        <p>
                            <a href="#" data-toggle="modal" data-target="#notes-modal" class="mobile-redbtn">Add</a>
                        </p>
                    </div>
                    <!-- topbar-flex -->
                    <p class="mobile-filtericon">
                        <a href="#" data-toggle="modal" data-target="#myModal2">Filter <img src="images/filter-list.png" alt=""></a>
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
                        <li><a href="">Files</a></li>
                    </ul>
                </div>
                <div class="menu-right">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#myModal2" class="filter-btn"><span class="fa fa-filter"></span></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#file-modal" class="add-button"><span class="fa fa-plus"></span> Add</a></li>
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
                            <a href="javascript:void (0);" id="" onclick="editFile(this);" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;" class="add-button"><span class="fa fa-edit"></span> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user-right-flex -->
        </div>
        <!-- middle-right-->
    </div>
    <!-- middle-section -->
    <!-- tab-section -->
    <div class="tab-section files-section">
        <div class="row row0">
            <div class="col-lg-3 col-sm-6">
                <div class="files-left">
                    @foreach ($organizedFiles as $date => $fileGroup)
                        <h5>{{ $date }}</h5>
                        <ul id="files">
                            @foreach ($fileGroup as $v=>$file)
                                @php
                                    $img = ($file['image']) ? $file['image'] : 'no-img.png';
                                @endphp
                                <li class="{{ $v === 0 ? 'active' : '' }}"><a href="javascript:void (0);" onclick="activeTab(this);" data-id="{{ $file['id'] }}" data-title="{{ $file['title'] }}">
                                        <img src="{{ asset('images') . "/" . $img }}" alt="{{ $file['title'] }}" width="80"></a></li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8 col-sm-6">
                <!-- Tab panes -->
                <div class="slider-files hidden-xs">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @foreach($slider as $key => $item)
                                <div class="item {{ $key === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('images' . "/" . $item['image'] ?? 'no-img.png') }}" width="150" alt="...">
                                    <div class="">
                                        <h4>{{ $item['date'] }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- slider -->
                </div>

                <!-- slider-files -->
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- row -->
    </div>
    <!-- tab-section -->

    @include('portal.files.add-files')
    @include('portal.files.edit-file')
@endsection

@section('JS')
    <script>
        const fileInput = document.getElementById('file-input');
        const selectedImage = document.getElementById('selected-image');
;

        fileInput.addEventListener('change', function() {
            selectedImage.textContent = `${fileInput.files[0].name}`;
        });

        let id = $('#files .active a').attr('data-id');
        let title = $('#files .active a').attr('data-title');;
        $('.add-button').attr('id', id);
        $('#title').text(title);
        $('#delete').attr('action', '{{ route('file.destroy', ['file' => ':id']) }}'.replace(':id', id));

        function activeTab(pointer){
            let title = $(pointer).attr('data-title');
            $('#title').text(title);

            let id = $(pointer).attr('data-id');
            $('.add-button').attr('id', id);
            $('#delete').attr('action', '{{ route('file.destroy', ['file' => ':id']) }}'.replace(':id', id));
        }

        function editFile(pointer){
            let id = $(pointer).attr('id');

            $.ajax({
                url: `{{ route('file.edit', ['file' => ':id']) }}`.replace(':id', id),
                type: 'GET',
                dataType: 'JSON',
                data: {id: id},
                success: function (response) {
                    console.log(response.data);
                    let updateRoute = `{{ route('file.update', ['file' => ':id']) }}`.replace(':id', response.data.id);
                    $('.edit-file-modal').html(`
                        <form action="${updateRoute}" method="post" enctype="multipart/form-data">
                        @method('put')
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control title-field" value="${response.data.title}" name="title" id="">
                        </div>
                        <div  class="choose-file">
                            <div>
                                <p>Choose Images</p>
                            </div>
                            <div id="selected-image"></div>
                            <div>
                                <label style="background: #E22827; color: #fff; border: 1px solid #E22827;
                            padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Choose
                                        <input type="file" size="60" id="file-input" name="f_img" accept="image/*">
                                    </label>
                                </div>
                            </div>
                            <!-- choose-file -->
                            <!-- <p class="text-center">
                               <a href="" class="btn red-btn"> <span class="fa fa-plus"></span> Add File</a>
                               </p> -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                            text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">+ Update File</button>
                        </div>
                    </form>
`)
                    $('#edit-file-modal').modal('show');
                }
            });
        }
    </script>
@endsection
