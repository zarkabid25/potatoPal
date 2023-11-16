<!-- Modal -->
<div class="modal fade" id="receivalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Receival</h5>
            </div>

            <form action="{{ route('user-register') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="grower_name">Grower Name<span class="text-danger">*</span></label>
                        <input id="grower_name" name="grower_name" class="form-control" value="{{ ($growerName) ? $growerName : '' }}" />
{{--                        <select id="grower_name" name="grower_name" class="js-example-tags form-control" multiple="multiple"></select>--}}
                    </div>

                    <div class="form-group">
                        <label for="grower_group">Grower Group<span class="text-danger">*</span></label>
                        <select id="grower_group" name="grower_group" class="js-example-tags form-control" multiple="multiple">
                            @forelse($growerGroup as $group)
                                <option value="{{ $group }}" >{{ $group }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="paddock">Paddock<span class="text-danger">*</span></label>
                        <select id="paddock" name="paddock_name" class="js-example-tags form-control" multiple="multiple">
                            @forelse($paddockName as $pName)
                                <option value="{{ $pName }}">{{ $pName }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="seed_variety">Seed Variety</label>
                        <select id="seed_variety" name="seed_variety" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="seed_generation">Seed Generation</label>
                        <select id="seed_generation" name="seed_generation" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="seed_class">Seed Class</label>
                        <select id="seed_class" name="seed_class" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="tia_sample_id">TIA Sample ID</label>
                        <input type="text" name="tia_sample_id" id="tia_sample_id" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="unloading_status">Unloading Status</label>

                        <div>
                            <input type="radio" id="pending" name="unloading_status" />
                            <label class="tab" for="pending">Pending</label>

                            <input type="radio" id="completed" name="unloading_status" />
                            <label class="tab" for="completed">Completed</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unloading_ID">Unloading ID</label>
                        <input type="text" name="unloading_ID" id="unloading_ID" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="seed_type">Seed Type</label>
                        <select id="seed_type" name="seed_type" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="unloading_status">Seed Bin Size</label>

                        <div>
                            <input type="radio" id="one_tone" name="seed_bin_size" />
                            <label class="tab" for="one_tone">One Tone</label>

                            <input type="radio" id="tow_tone" name="seed_bin_size" />
                            <label class="tab" for="tow_tone">Two Tone</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="transport_co">Transport Co</label>
                        <select id="transport_co" name="transport_co" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="delivery_type">Delivery Type</label>
                        <select id="delivery_type" name="delivery_type" class="js-example-tags form-control" multiple="multiple"></select>
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
                        <select id="fungicide" name="fungicide" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="driver_name">Driiver Name</label>
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
