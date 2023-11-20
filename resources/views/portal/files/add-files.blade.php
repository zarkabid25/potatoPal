<div class="modal fade notes-modal" id="file-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add File</h4>
            </div>
            <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control title-field" placeholder="Add Title" name="title" id="">
                    </div>
                    <div  class="choose-file">
                        <div>
                            <p>Choose Images</p>
                        </div>
                        <div id="selected-image"></div>
                        <div>
                            <label style="background: #E22827; color: #fff; border: 1px solid #E22827;
                        padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Choose
                                {{--                            <input type="file"  size="60" >--}}
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
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">+ Add File</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal -->
