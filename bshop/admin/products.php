<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
    header('Location: login.php');
}

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
                    <i class="fab fa-product-hunt"></i>&nbsp;Tabel Produk
                </h1>
            </div>

            <!-- DataTables Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- Button Add New Product modal -->
                    <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#modalAddProduct">
                        <i class="fas fa-plus-circle"></i>&nbsp;Add New Product
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_product" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Nomor SKU</th>
                                    <th>Stok</th>
                                    <th>Harga Satuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Nomor SKU</th>
                                    <th>Stok</th>
                                    <th>Harga Satuan</th>
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

    <!-- Modal Form Add New Product -->
    <div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"><i class="fab fa-product-hunt"></i>&nbsp;Add New Product</h4>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!-- end .modal-header -->
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="query_product.php?f=add_product" id="form_add_product" method="POST">
                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <label for="productNameLabel" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" required>
                        </div>
                        <!-- SKU -->
                        <div class="mb-3">
                            <label for="productNameSku" class="form-label">Nomor SKU</label>
                            <input type="text" class="form-control" name="product_sku" id="product_sku" required>
                        </div>
                        <!-- Stok -->
                        <div class="mb-3">
                            <label for="productStok" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="product_stok" id="product_stok" required>
                        </div>
                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="productPriceLabel" class="form-label">Harga Satuan</label>
                            <input type="text" class="form-control" name="product_price" id="product_price" required>
                        </div>
                        <!-- Foto Produk -->
                        <!-- <div class="mb-3">
                            <label for="productImageLabel" class="form-label">File Foto</label>
                            <input type="file" class="form-control" id="product_image" name="product_image">
                        </div> -->
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

    <!-- Modal Form Update -->
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
                    <form action="query_product.php?f=update_product" id="form_update_product" method="POST">
                        <input type="hidden" name="product_id" class="product_id" required>
                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <label for="product_name_label" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="update_product_name" id="update_product_name" required>
                        </div>
                        <!-- SKU -->
                        <div class="mb-3">
                            <label for="product_sku_label" class="form-label">Nomor SKU</label>
                            <input type="text" class="form-control" name="update_product_sku" id="update_product_sku" required>
                        </div>
                        <!-- Stok -->
                        <div class="mb-3">
                            <label for="product_stok_label" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="update_product_stok" id="update_product_stok" required>
                        </div>
                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="product_price_label" class="form-label">Harga Satuan</label>
                            <input type="text" class="form-control" name="update_product_price" id="update_product_price" required>
                        </div>
                        <!-- Foto Produk -->
                        <!-- <div class="mb-3">
                            <label for="product_image_label" class="form-label">File Foto</label>
                            <input type="file" class="form-control" id="update_product_image" name="update_product_image">
                            <span>Abaikan jika tidak mengganti gambar</span>
                        </div> -->
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

    <!-- Delete Modal -->
    <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 font-weight-bold">Delete</h4>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="query_product.php?f=delete_product" method="POST" id="form_delete_product">
                        <input type="hidden" name="product_id" class="form-control product_id">
                </div>
                <h4 class="text-center">Item akan dihapus dari database.<br>Yakin??</h4>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btn_form_delete" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'layout_admin/footer.php'; ?>

    <script>
        $(document).ready(function() {
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

            // Menampilkan data customers ke tabel
            let tableProduct = $('#table_product').DataTable({
                ajax: 'query_product.php?f=get_all_product',
                columns: [{
                        data: 'produk_id',
                        visible: false
                    },
                    {
                        data: 'img_url',
                        render: function(data, type, row) {
                            return '<img src="' + data + '" class="img-fluid" width="100px">';
                        }
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'sku'
                    },
                    {
                        data: 'stok'
                    },
                    {
                        data: 'harga_satuan'
                    },
                    {
                        defaultContent: '<button class="btn btn-primary btn-sm update" data-bs-toggle="modal" data-bs-target="#update_product"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger btn-sm delete"><i class="fas fa-trash-alt"></i></button>'
                    }
                ],
            });

            // Menampilkan data customer ke dalam form update
            $('#table_product tbody').on('click', '.update', function() {
                let row = $(this).closest('tr');
                let product_id = tableProduct.row(row).data().produk_id;
                $.ajax({
                    url: 'query_product.php?f=get_product_by_id&id=' + product_id,
                    type: 'POST',
                    success: function(result) {
                        let data = $.parseJSON(result);
                        $('#updateProduct').modal('show');
                        $('#update_product_name').val(data.nama);
                        $('#update_product_sku').val(data.sku);
                        $('#update_product_stok').val(data.stok);
                        $('#update_product_price').val(data.harga_satuan);
                        // $('#update_product_image').val(data.img_url); // Image
                        $('.product_id').val(data.produk_id);
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
                let product_id = tableProduct.row(row).data().produk_id;
                $("#modal_delete").modal('show');
                $('.product_id').val(product_id);
                e.preventDefault();
            });
            $('#btn_form_delete').on('click', function(e) {
                $.ajax({
                    url: 'query_product.php?f=delete_product',
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
        });
        // End jQready
    </script>

    </body>

    </html>