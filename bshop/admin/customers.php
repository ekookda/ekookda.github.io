<?php
session_start();
include_once 'admin.php';

include 'head.php';

include 'sidebar.php';

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">

        <?php include 'topbar.php'; ?>

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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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
                    <form action="#">
                        <div class="mb-3">
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
                            <button type="button" name="btn-registrasi" id="btn-registrasi" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div> <!-- end .modal-body -->
            </div>
        </div>
    </div> <!-- End #registrasiModal -->
    <!-- End .modal-fade / Modal Registration -->

    <?php include 'footer.php'; ?>

    <script>
        $(document).ready(function() {
            // Menampilkan data customers ke tabel
            $('#TableCustomers').DataTable({
                ajax: 'customers.php?f=getAllCustomers',
                columns: [{
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
                        defaultContent: '<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateDataCustomer"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-sm btn-danger delete" id="2"><i class="fa-trash-alt"></i></button>'
                    }
                ]
            });

            // Konfirmasi Delete Data Customers
            $('.delete').click(function() {
                let id = $(this).attr('id');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal(`Poof! ID Number ${id} has been deleted!`, {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });
        });
    </script>


    </body>

    </html>