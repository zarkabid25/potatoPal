<!-- Modal add-->
<div class="modal fade" id="tab-30" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delivery Type Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('deliveryType.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="delivery_type">Delivery Type</label>
                    <input type="text" id="delivery_type" name="delivery_type" class="form-control" />
                </div>
                <div class="modal-footer">
                    {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
