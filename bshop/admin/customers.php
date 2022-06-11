<?php
session_start();

include 'layout_admin/head.php';

include 'layout_admin/sidebar.php';

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">

        <?php include 'layout_admin/topbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-users"></i>&nbsp;Tabel Customer
                </h1>
            </div>

            <!-- Content Row -->
            <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

            <!-- DataTables Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="TableCustomers" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <!-- <th>No.</th> -->
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <!-- <th>No.</th> -->
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Form Update -->
    <div class="modal fade" id="updateDataCustomer" tabindex="-1" aria-labelledby="updateDataCustomer" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="titleDataCustomer" aria-label="Close"><i class="fas fa-user"></i> Update
                        Data Customer</h4>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="query_customer.php?f=updateCustomer" id="formUpdate" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="pelanggan_id" class="pelanggan_id">
                            <!-- Nama -->
                            <label for="lname" class="form-label">Nama Customer</label>
                            <input type="text" class="form-control" name="fname" id="fname">
                        </div>
                        <div class="mb-3">
                            <!-- Tanggal Lahir -->
                            <label for="lTglLahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="fTglLahir" id="fTglLahir">
                        </div>
                        <div class="mb-3">
                            <!-- Email -->
                            <label for="lemail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="femail" id="femail" readonly>
                        </div>
                        <div class="mb-3">
                            <!-- Alamat -->
                            <label for="lname" class="form-label">Alamat</label>
                            <textarea id="falamat" class="form-control" name="falamat" rows="5" cols="30"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit_update" id="submit_update" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div> <!-- end .modal-body -->
            </div>
        </div>
    </div> <!-- End #registrasiModal -->
    <!-- End .modal-fade / Modal Update -->

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="query_customer.php?f=deleteCustomer" method="POST" id="form_delete">
                        <input type="hidden" name="pelanggan_id" class="form-control pelanggan_id">
                </div>
                <h3 class="text-center">Anda yakin menghapus data customer?</h3>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'layout_admin/footer.php'; ?>

    <script>
        $(document).ready(function() {
            // Menampilkan data customers ke tabel
            let tableCustomers = $('#TableCustomers').DataTable({
                ajax: 'query_customer.php?f=getAllCustomers',
                columns: [{
                        data: 'pelanggan_id',
                        visible: false
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'tanggal_lahir'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'alamat'
                    },
                    {
                        defaultContent: '<button class="btn btn-primary btn-sm update" data-bs-toggle="modal" data-bs-target="#updateDataCustomer"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger btn-sm delete"><i class="fas fa-trash-alt"></i></button>'
                    }
                ],
            });

            // Menghapus data customer
            $('#TableCustomers tbody').on('click', '.delete', function() {
                let row = $(this).closest('tr');
                let pelanggan_id = tableCustomers.row(row).data().pelanggan_id;
                $("#deleteModal").modal('show');
                $('.pelanggan_id').val(pelanggan_id);
            });

            // Update data customer
            $('#TableCustomers tbody').on('click', '.update', function() {
                let row = $(this).closest('tr');
                let pelanggan_id = tableCustomers.row(row).data().pelanggan_id;
                $.ajax({
                    url: 'query_customer.php?f=getCustomerById&id=' + pelanggan_id,
                    type: 'POST',
                    success: function(result) {
                        let data = jQuery.parseJSON(result);
                        $('#updateDataCustomer').modal('show');
                        $('#fname').val(data.nama);
                        $('#fTglLahir').val(data.tanggal_lahir);
                        $('#femail').val(data.email);
                        $('#falamat').val(data.alamat);
                        $('.pelanggan_id').val(data.pelanggan_id);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            // Simpan Update
            $("#formUpdate").submit(function(e) {
                let url = $(this).attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formUpdate").serialize(),
                    success: function(result) {
                        $("#updateModal").modal('hide');
                        // $("#successNotification").toast("show");
                        alert(result);

                        window.setTimeout(
                            function() {
                                location.reload(true)
                            },
                            3000
                        );
                    },
                    error: function(error) {
                        // $("#failedNotification").toast("show");
                        alert(error);
                    }
                });
                e.preventDefault();
            });
        });
    </script>


    </body>

    </html>