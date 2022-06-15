<!-- Modal Form Registration -->
<div class="modal fade" id="registrasiModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-center"><i class="fa-solid fa-circle-check"></i> Form Registrasi
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="q_customer.php?f=register" method="post" autocomplete="off" id="formRegistrasi">
                    <div class="mb-3">
                        <!-- Nama -->
                        <label for="lname" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="fname" id="fname">
                    </div>
                    <div class="mb-3">
                        <!-- Password 1 -->
                        <label for="lpass1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="fpass1" id="fpass1">
                    </div>
                    <div class="mb-3">
                        <!-- Password 2 -->
                        <label for="lpass2" class="form-label">Masukkan Password Lagi</label>
                        <input type="password" class="form-control" name="fpass2" id="fpass2">
                    </div>
                    <div class="mb-3">
                        <!-- Tanggal Lahir -->
                        <label for="lTglLahir" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="fTglLahir" id="fTglLahir">
                    </div>
                    <div class="mb-3">
                        <!-- Email -->
                        <label for="lemail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="femail" id="femail">
                    </div>
                    <div class="mb-3">
                        <!-- Alamat -->
                        <label for="lname" class="form-label">Alamat</label>
                        <textarea id="falamat" class="form-control" name="falamat" rows="5" cols="30"></textarea>
                    </div>
                    <div class="mb-3">
                        <!-- Kode Pos -->
                        <label for="lkodepos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" name="fkodepos" id="fkodepos">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="btnRegistrasi" id="btnRegistrasi" class="btn btn-primary">Daftar
                            Sekarang</button>
                    </div>
                </form>
            </div> <!-- end .modal-body -->
        </div>
    </div>
</div> <!-- End #registrasiModal -->
<!-- End .modal-fade / Modal Registration -->