<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('note.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="notes_title" class="form-control" />
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" rows="4" name="notes_discription"></textarea>
                    </div>

                    <div class="form-group">
                        <select id="receival" name="receivals[]" class="js-example-tags form-control" multiple="multiple"></select>
                    </div>

                    <div class="form-group">
                        <label for="notes_img">Attachment</label>
                        <input type="file" id="notes_img" name="notes_img" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn" style="background: #E22827; border: 1px solid #E22827; color: #fff;
                    text-decoration: none; padding: 8px 16px; border-radius: 3px; transition: 300ms ease-out !important;">+ Add Notes</button>
                </div>
            </form>
        </div>
    </div>
</div>
