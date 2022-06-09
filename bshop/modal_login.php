<!-- Modal Form Login -->
<div class="modal" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-user"></i> Login
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="#">
                    <div class="mb-4">
                        <!-- Username / Email -->
                        <label for="username" class="form-label">Username / Email</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-4">
                        <!-- Password -->
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" id="password">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="button" name="btn-login" id="btn-login" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- End #modalFormLogin -->
<!-- End Form Login -->