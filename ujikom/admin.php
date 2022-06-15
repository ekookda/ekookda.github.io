<?php
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
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="barang-tab" data-bs-toggle="tab" data-bs-target="#data_barang" type="button" role="tab" aria-controls="data_barang" aria-selected="true">DATA BARANG</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="penjualan-tab" data-bs-toggle="tab" data-bs-target="#penjualan" type="button" role="tab" aria-controls="penjualan" aria-selected="false">PENJUALAN</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Data Barang -->
                <div class="tab-pane fade show active" id="data_barang" role="tabpanel" aria-labelledby="barang-tab">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            <i class="fab fa-product-hunt"></i>&nbsp;Tabel Produk
                        </h1>
                    </div>

                    <!-- DataTables Barang -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Button Add New Product modal -->
                            <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#modalAddProduct">
                                <i class="fas fa-plus-circle"></i>&nbsp;Tambah Barang
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_product" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Penjualan -->
                <div class="tab-pane fade" id="penjualan" role="tabpanel" aria-labelledby="penjualan-tab">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between my-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            <i class="fas fa-shopping-cart"></i>&nbsp;Tabel Penjualan
                        </h1>
                    </div>

                    <!-- DataTables Barang -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Button Add New Penjualan modal -->
                            <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#modalAddPenjualan">
                                <i class="fas fa-plus-circle"></i>&nbsp;Tambah Penjualan
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_penjualan" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nomor Penjualan</th>
                                            <th>Nama Kasir</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Jam Penjualan</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Nomor Penjualan</th>
                                            <th>Nama Kasir</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Jam Penjualan</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
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

    <!-- Modal Bagian Barang -->
    <!-- Modal Form Add New Product -->
    <div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"><i class="fab fa-product-hunt"></i>&nbsp;Tambah Barang Baru</h4>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!-- end .modal-header -->
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="q_product.php?f=add_product" id="form_add_product" method="POST">
                        <!-- Kode Barang -->
                        <div class="mb-3">
                            <label for="productCode" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" name="product_code" id="product_code" required>
                        </div>
                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <label for="productNameLabel" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" required>
                        </div>
                        <!-- Harga Beli -->
                        <div class="mb-3">
                            <label for="productBuy" class="form-label">Harga Beli</label>
                            <input type="text" class="form-control" name="product_buy" id="product_buy" required>
                        </div>
                        <!-- Harga Jual -->
                        <div class="mb-3">
                            <label for="productSellLabel" class="form-label">Harga Jual</label>
                            <input type="text" class="form-control" name="product_sell" id="product_sell" required>
                        </div>
                        <!-- Stok -->
                        <div class="mb-3">
                            <label for="productStok" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="product_stok" id="product_stok" required>
                        </div>
                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="productSatuanLabel" class="form-label">Satuan</label>
                            <input type="text" class="form-control" name="product_satuan" id="product_satuan" required>
                        </div>
                    </form>
                </div> <!-- end .modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="submit_add_product" class="btn btn-primary">Tambah Produk</button>
                </div> <!-- end .modal-footer -->
            </div>
        </div>
    </div> <!-- End #Add New Product Modal -->
    <!-- End .modal-fade / Modal Registration -->

    <!-- Modal Form Update Barang -->
    <div class="modal fade" id="update_product" tabindex="-1" aria-labelledby="updateProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"><i class="fab fa-product-hunt"></i> Update Data Produk</h4>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="q_product.php?f=update_product" id="form_update_product" method="POST">
                        <input type="hidden" name="product_id" class="product_id" required>
                        <!-- Kode Barang -->
                        <div class="mb-3">
                            <label for="product_code_label" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" name="update_product_code" id="update_product_code" required>
                        </div>
                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <label for="product_name_label" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="update_product_name" id="update_product_name" required>
                        </div>
                        <!-- Harga Beli -->
                        <div class="mb-3">
                            <label for="product_buy_label" class="form-label">Harga Beli</label>
                            <input type="text" class="form-control" name="update_product_buy" id="update_product_buy" required>
                        </div>
                        <!-- Harga Jual -->
                        <div class="mb-3">
                            <label for="product_sell_label" class="form-label">Harga Jual</label>
                            <input type="text" class="form-control" name="update_product_sell" id="update_product_sell" required>
                        </div>
                        <!-- Stok -->
                        <div class="mb-3">
                            <label for="product_stok_label" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="update_product_stok" id="update_product_stok" required>
                        </div>
                        <!-- Satuan -->
                        <div class="mb-3">
                            <label for="product_satuan_label" class="form-label">Satuan</label>
                            <input type="text" class="form-control" name="update_product_satuan" id="update_product_satuan" required>
                        </div>
                    </form>
                </div> <!-- end .modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="submit_update_product" class="btn btn-primary">Ubah Data Produk</button>
                </div> <!-- end .modal-footer -->
            </div>
        </div>
    </div> <!-- End #registrasiModal -->
    <!-- End .modal-fade / Modal Registration -->

    <!-- Delete Modal Barang -->
    <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 font-weight-bold">Delete</h4>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="q_product.php?f=delete_product" method="POST" id="form_delete_product">
                        <input type="hidden" name="product_id" class="form-control product_id">
                </div>
                <h4 class="text-center">Item akan dihapus dari database.<br>Yakin??</h4>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="btn_form_delete" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ##################### Modal Bagian Penjualan ################### -->
    <!-- Modal Form Add New Penjualan -->
    <div class="modal fade" id="modalAddPenjualan" tabindex="-1" aria-labelledby="addPenjualanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"><i class="fab fa-product-hunt"></i>&nbsp;Tambah Penjualan</h4>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!-- end .modal-header -->
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="q_penjualan.php?f=add_penjualan" id="form_add_penjualan" method="POST">
                        <!-- Nomor Penjualan -->
                        <div class="mb-3">
                            <label for="penjualan_number_label" class="form-label">Nomor Penjualan</label>
                            <input type="text" class="form-control" name="penjualan_number" id="penjualan_number" required>
                        </div>
                        <!-- Nama Kasir -->
                        <div class="mb-3">
                            <label for="cashierNameLabel" class="form-label">Nama Kasir</label>
                            <input type="text" class="form-control" name="cashier_name" id="cashier_name" required>
                        </div>
                        <!-- Tanggal Penjualan -->
                        <div class="mb-3">
                            <label for="tgl_penjualan_label" class="form-label">Tanggal Penjualan</label>
                            <input type="text" class="form-control" name="tgl_penjualan" id="tgl_penjualan" required>
                        </div>
                        <!-- Jam Penjualan -->
                        <div class="mb-3">
                            <label for="jam_penjualan_label" class="form-label">Jam Penjualan</label>
                            <input type="text" class="form-control" name="jam_penjualan" id="jam_penjualan" required>
                        </div>
                        <!-- Total -->
                        <div class="mb-3">
                            <label for="total_penjualan" class="form-label">Total</label>
                            <input type="text" class="form-control" name="total_penjualan" id="total_penjualan" required>
                        </div>
                    </form>
                </div> <!-- end .modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="submit_add_penjualan" class="btn btn-primary">Tambah Penjualan</button>
                </div> <!-- end .modal-footer -->
            </div>
        </div>
    </div> <!-- End #Add New Penjualan Modal -->
    <!-- End .modal-fade / Modal Penjualan -->

    <!-- Modal Form Update Penjualan -->
    <div class="modal fade" id="update_penjualan" tabindex="-1" aria-labelledby="updatePenjualanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"><i class="fab fa-product-hunt"></i> Update Data Penjualan</h4>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="q_penjualan.php?f=update_penjualan" id="form_update_penjualan" method="POST">
                        <input type="hidden" name="penjualan_id" class="penjualan_id" required>
                        <!-- Nomor Penjualan -->
                        <div class="mb-3">
                            <label for="penjualan_number_label" class="form-label">Nomor Penjualan</label>
                            <input type="text" class="form-control" name="update_penjualan_number" id="update_penjualan_number" required>
                        </div>
                        <!-- Nama Kasir -->
                        <div class="mb-3">
                            <label for="cashier_name_label" class="form-label">Nama Kasir</label>
                            <input type="text" class="form-control" name="update_cashier_name" id="update_cashier_name" required>
                        </div>
                        <!-- Tanggal Penjualan -->
                        <div class="mb-3">
                            <label for="penjualan_buy_label" class="form-label">Tanggal Penjualan</label>
                            <input type="text" class="form-control" name="update_tgl_penjualan" id="update_tgl_penjualan" required>
                        </div>
                        <!-- Jam Penjualan -->
                        <div class="mb-3">
                            <label for="penjualan_jam_label" class="form-label">Harga Jual</label>
                            <input type="text" class="form-control" name="update_jam_penjualan" id="update_jam_penjualan" required>
                        </div>
                        <!-- Total -->
                        <div class="mb-3">
                            <label for="penjualan_total_label" class="form-label">Total</label>
                            <input type="text" class="form-control" name="update_penjualan_total" id="update_penjualan_total" required>
                        </div>
                    </form>
                </div> <!-- end .modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="submit_update_penjualan" class="btn btn-primary">Ubah Data Penjualan</button>
                </div> <!-- end .modal-footer -->
            </div>
        </div>
    </div> <!-- End #Update Modal -->
    <!-- End .modal-fade / Modal Update Penjualan -->

    <!-- Delete Modal Penjualan -->
    <div class="modal fade" id="modal_delete_penjualan" tabindex="-1" aria-labelledby="deletePenjualanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 font-weight-bold">Delete</h4>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="q_penjualan.php?f=delete_penjualan" method="POST" id="form_delete_penjualan">
                        <input type="hidden" name="penjualan_id" class="form-control penjualan_id">
                </div>
                <h4 class="text-center">Item akan dihapus dari database.<br>Yakin??</h4>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="btn_form_penjualan_delete" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'layout_admin/footer.php'; ?>

    <script>
        $(document).ready(function() {
            // -------------------------- Bagian Barang ------------------------------
            // Insert data
            $('#submit_add_product').on('click', function(e) {
                let url = $('#form_add_product').attr('action');
                let data = $('#form_add_product').serialize();
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        let d = $.parseJSON(response);
                        if (d.status == 1) {
                            $('#modalAddProduct').modal('hide');
                            $('#form_add_product')[0].reset();
                            $('#product_table').DataTable().ajax.reload();
                            alert(d.message);
                            window.setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            alert(d.message);
                        }
                    },
                    error(err) {
                        console.log(err);
                    }
                });
                e.preventDefault();
            });

            // Menampilkan data barang ke tabel barang
            let tableProduct = $('#table_product').DataTable({
                ajax: 'q_product.php?f=get_all_product',
                columns: [{
                        data: 'id',
                        visible: false
                    },
                    {
                        data: 'kode_barang'
                    },
                    {
                        data: 'nama_barang'
                    },
                    {
                        data: 'harga_beli'
                    },
                    {
                        data: 'harga_jual'
                    },
                    {
                        data: 'stok'
                    },
                    {
                        data: 'satuan'
                    },
                    {
                        defaultContent: '<button class="btn btn-primary btn-sm update" data-bs-toggle="modal" data-bs-target="#update_product"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger btn-sm delete"><i class="fas fa-trash-alt"></i></button>'
                    }
                ],
            });

            // Menampilkan data barang ke dalam form update
            $('#table_product tbody').on('click', '.update', function() {
                let row = $(this).closest('tr');
                let product_id = tableProduct.row(row).data().id;
                $.ajax({
                    url: 'q_product.php?f=get_product_by_id&id=' + product_id,
                    type: 'POST',
                    success: function(result) {
                        let data = $.parseJSON(result);
                        $('#updateProduct').modal('show');
                        $('#update_product_code').val(data.kode_barang);
                        $('#update_product_name').val(data.nama_barang);
                        $('#update_product_buy').val(data.harga_beli);
                        $('#update_product_sell').val(data.harga_jual);
                        $('#update_product_stok').val(data.stok);
                        $('#update_product_satuan').val(data.satuan);
                        $('.product_id').val(data.id);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
            // Menyimpan data produk yang di update
            $("#submit_update_product").on('click', function(e) {
                let url = $('#form_update_product').attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_update_product").serialize(),
                    success: function(result) {
                        // console.log(result);
                        let d = $.parseJSON(result);
                        if (d.status == 1) {
                            $("#update_product").modal('hide');
                            $('#table_product').DataTable().ajax.reload();
                            $('#form_update_product')[0].reset();
                            alert(d.message);
                        } else {
                            alert(d.message);
                        }
                    },
                    error: function(error) {
                        alert(error);
                    }
                });
                e.preventDefault();
            });

            // Menghapus data product
            $('#table_product tbody').on('click', '.delete', function(e) {
                let row = $(this).closest('tr');
                let product_id = tableProduct.row(row).data().id;
                $("#modal_delete").modal('show');
                $('.product_id').val(product_id);
                e.preventDefault();
            });
            $('#btn_form_delete').on('click', function(e) {
                $.ajax({
                    url: 'q_product.php?f=delete_product',
                    type: 'POST',
                    data: $('#form_delete_product').serialize(),
                    success: function(response) {
                        let d = $.parseJSON(response)
                        if (d.status == 1) {
                            $('#modal_delete').modal('hide');
                            $('#table_product').DataTable().ajax.reload();
                            $('#form_delete_product')[0].reset();
                            alert(d.message);
                        } else {
                            alert(d.message);
                        }
                    },
                    error(err) {
                        console.log(err);
                    }
                });
                e.preventDefault();
            });

            // -------------------------- Bagian Penjualan ------------------------------
            // Menampilkan data ke tabel Penjualan
            let tablePenjualan = $('#table_penjualan').DataTable({
                ajax: 'q_penjualan.php?f=get_all_penjualan',
                columns: [{
                        data: 'id',
                        visible: false
                    },
                    {
                        data: 'no_penjualan'
                    },
                    {
                        data: 'nama_kasir'
                    },
                    {
                        data: 'tgl_penjualan'
                    },
                    {
                        data: 'jam_penjualan'
                    },
                    {
                        data: 'total'
                    },
                    {
                        defaultContent: '<button class="btn btn-primary btn-sm update" data-bs-toggle="modal" data-bs-target="#update_penjualan"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger btn-sm delete_penjualan"><i class="fas fa-trash-alt"></i></button>'
                    }
                ],
            });

            // Insert data
            $('#submit_add_penjualan').on('click', function(e) {
                let url = $('#form_add_penjualan').attr('action');
                let data = $('#form_add_penjualan').serialize();
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        let d = $.parseJSON(response);
                        if (d.status == 1) {
                            $('#modalAddPenjualan').modal('hide');
                            $('#form_add_penjualan')[0].reset();
                            $('#table_penjualan').DataTable().ajax.reload();
                            alert(d.message);
                            window.setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            alert(d.message);
                        }
                    },
                    error(err) {
                        console.log(err);
                    }
                });
                e.preventDefault();
            });

            // Menampilkan data penjualan ke dalam form update
            $('#table_penjualan tbody').on('click', '.update', function() {
                let row = $(this).closest('tr');
                let penjualan_id = tablePenjualan.row(row).data().id;
                $.ajax({
                    url: 'q_penjualan.php?f=get_penjualan_by_id&id=' + penjualan_id,
                    type: 'POST',
                    success: function(result) {
                        let data = $.parseJSON(result);
                        $('#updateProduct').modal('show');
                        $('#update_penjualan_number').val(data.no_penjualan);
                        $('#update_cashier_name').val(data.nama_kasir);
                        $('#update_tgl_penjualan').val(data.tgl_penjualan);
                        $('#update_jam_penjualan').val(data.jam_penjualan);
                        $('#update_penjualan_total').val(data.total);
                        $('.penjualan_id').val(data.id);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
            // Menyimpan data penjualan yang di update
            $("#submit_update_penjualan").on('click', function(e) {
                let url = $('#form_update_penjualan').attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_update_penjualan").serialize(),
                    success: function(result) {
                        // console.log(result);
                        let d = $.parseJSON(result);
                        if (d.status == 1) {
                            $("#update_penjualan").modal('hide');
                            $('#table_penjualan').DataTable().ajax.reload();
                            $('#form_update_penjualan')[0].reset();
                            alert(d.message);
                        } else {
                            alert(d.message);
                        }
                    },
                    error: function(error) {
                        alert(error);
                    }
                });
                // e.preventDefault();
            });

            // Menghapus data penjualan
            $('#table_penjualan tbody').on('click', '.delete_penjualan', function(e) {
                let row = $(this).closest('tr');
                let penjualan_id = tablePenjualan.row(row).data().id;
                $("#modal_delete_penjualan").modal('show');
                $('.penjualan_id').val(penjualan_id);
                e.preventDefault();
            });
            $('#btn_form_penjualan_delete').on('click', function(e) {
                $.ajax({
                    url: 'q_penjualan.php?f=delete_penjualan',
                    type: 'POST',
                    data: $('#form_delete_penjualan').serialize(),
                    success: function(response) {
                        let d = $.parseJSON(response)
                        if (d.status == 1) {
                            $('#modal_delete_penjualan').modal('hide');
                            $('#table_penjualan').DataTable().ajax.reload();
                            $('#form_delete_penjualan')[0].reset();
                            alert(d.message);
                        } else {
                            alert(d.message);
                        }
                    },
                    error(err) {
                        console.log(err);
                    }
                });
                e.preventDefault();
            });
        });
        // End jQready
    </script>

    </body>

    </html>