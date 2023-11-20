<!-- Modal add-->
<div class="modal fade" id="tab-80" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Paddock Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('paddock.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="paddock">Paddock</label>
                    <input type="text" id="paddock" name="paddock" class="form-control" />

                    <label for="no_of_hectares">No of Hectares</label>
                    <input type="text" id="no_of_hectares" name="no_of_hectares" class="form-control" />
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
