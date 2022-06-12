<!-- Modal Form Login -->
<div class="modal fade" id="modal_login" tabindex="-1" aria-labelledby="modal_login_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="modal_login_label">
                    <i class="fas fa-user"></i> Login
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="q_customer.php?f=login" id="form_login" method="post" autocomplete="off">
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
                        <button type="submit" id="submit_login" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- End #modalFormLogin -->
<!-- End Form Login -->

<!-- Modal Logout -->
<div class="modal fade" id="modal_logout" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Yakin akan keluar?</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <a href="q_customer.php?f=logout" class="btn btn-primary" id="btn_logout">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Logout -->