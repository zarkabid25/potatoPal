<!-- Modal -->
<div class="modal right fade user-details" id="receivalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    <span class="fa fa-arrow-left"></span>
                </button>
{{--                <h4 class="modal-title" id="myModalLabel3">Shehar Yar</h4>--}}
{{--                <div class="modal-menu">--}}
{{--                    <!-- Single button -->--}}
{{--                    <div class="btn-group">--}}
{{--                        <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <span class="fa fa-ellipsis-v"></span>--}}
{{--                        </button>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#"><span class="fa fa-trash-o"></span> Delete</a></li>--}}
{{--                            <li><a href="#"><span class="fa fa-edit"></span> Edit</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <form action="{{ route('store.receivals') }}" method="post">
                @csrf
                <div class="modal-body">
                    <ol class="breadcrumb">
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Receivals</a></li>
                    </ol>
                    <div class="form-group">
                        <label for="grower_name">Grower Name<span class="text-danger">*</span></label>
                        <input id="grower_name" name="grower_name" class="form-control" />
{{--                        <select id="grower_name" name="grower_name" class="js-example-tags form-control" multiple="multiple"></select>--}}
                    </div>

                    <div class="form-group">
                        <label for="grower_group">Grower Group<span class="text-danger">*</span></label>
                        <select id="grower_group" name="grower_group[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="paddock">Paddock<span class="text-danger">*</span></label>
                        <select id="paddock" name="paddock_name[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="seed_variety">Seed Variety</label>
                        <select id="seed_variety" name="seed_variety[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="seed_generation">Seed Generation</label>
                        <select id="seed_generation" name="seed_generation[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="seed_class">Seed Class</label>
                        <select id="seed_class" name="seed_class[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="tia_sample_id">TIA Sample ID</label>
                        <input type="text" name="tia_sample_id" id="tia_sample_id" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="unloading_status">Unloading Status</label>

                        <div>
                            <input type="radio" id="pending" name="unloading_status" value="pending" />
                            <label class="tab" for="pending">Pending</label>

                            <input type="radio" id="completed" name="unloading_status" value="completed" />
                            <label class="tab" for="completed">Completed</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unloading_ID">Unloading ID</label>
                        <input type="text" name="unloading_ID" id="unloading_ID" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="seed_type">Seed Type</label>
                        <select id="seed_type" name="seed_type[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="unloading_status">Seed Bin Size</label>

                        <div>
                            <input type="radio" id="one_tone" name="seed_bin_size" value="one tone" />
                            <label class="tab" for="one_tone">One Tone</label>

                            <input type="radio" id="tow_tone" name="seed_bin_size" value="two tone" />
                            <label class="tab" for="tow_tone">Two Tone</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Oversize Bin Size</label>

                        <div>
                            <input type="radio" id="oversize_one_tone" name="oversize_bin_size" value="one tone" />
                            <label class="tab" for="oversize_one_tone">One Tone</label>

                            <input type="radio" id="oversize_tow_tone" name="oversize_bin_size" value="two tone" />
                            <label class="tab" for="oversize_tow_tone">Two Tone</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="transport_co">Transport Co</label>
                        <select id="transport_co" name="transport_co[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="delivery_type">Delivery Type</label>
                        <select id="delivery_type" name="delivery_type[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="grower_docket_no">Grower Docket No</label>
                        <input type="text" name="grower_docket_no" id="grower_docket_no" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="chc_docket_no">CHC Docket No</label>
                        <input type="text" name="chc_docket_no" id="chc_docket_no" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="fungicide">Fungicide</label>
                        <select id="fungicide" name="fungicide[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="driver_name">Driver Name</label>
                        <input type="text" name="driver_name" id="driver_name" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" rows="3" name="comments" id="comments"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="add-button" data-dismiss="modal" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Close</button>
                    <button type="submit" class="add-button" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
