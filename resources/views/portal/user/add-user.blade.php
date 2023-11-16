<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            </div>

            <form action="{{ route('user-register') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="username">User Name<span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        <input type="number" name="phone" class="form-control" id="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" id="password" required>
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
