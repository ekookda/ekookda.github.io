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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddProduct">
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
    <div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="labelAddProduk" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="titleAddDataProduk" aria-label="Close"><i class="fab fa-product-hunt"></i>&nbsp;Add New Product</h4>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="query_product.php?f=add_product" id="form_add_product" method="POST">
                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <label for="lAddNamaProduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <!-- SKU -->
                        <div class="mb-3">
                            <label for="lAddSKU" class="form-label">Nomor SKU</label>
                            <input type="text" class="form-control" name="sku" id="sku" required>
                        </div>
                        <!-- Stok -->
                        <div class="mb-3">
                            <label for="lAddStok" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" required>
                        </div>
                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="lAddHargaSatuan" class="form-label">Harga Satuan</label>
                            <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" required>
                        </div>
                        <!-- Foto Produk -->
                        <div class="mb-3">
                            <label for="lAddImageProduk" class="form-label">File Foto</label>
                            <input type="file" class="form-control" id="img_url" name="img_url" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="btn-add-product" id="btn_add_product" class="btn btn-primary">Tambah Produk</button>
                        </div>
                    </form>
                </div> <!-- end .modal-body -->
            </div>
        </div>
    </div> <!-- End #Add New Product Modal -->
    <!-- End .modal-fade / Modal Registration -->

    <!-- Modal Form Update -->
    <div class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="labelUpdateProduk" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="titleProduk" aria-label="Close"><i class="fab fa-product-hunt"></i> Update
                        Data Produk</h4>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="query_product.php?f=update_product" id="formUpdate" method="POST">
                        <input type="hidden" name="produk_id" class="produk_id" required>
                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <label for="lAddNamaProduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <!-- SKU -->
                        <div class="mb-3">
                            <label for="lAddSKU" class="form-label">Nomor SKU</label>
                            <input type="text" class="form-control" name="sku" id="sku" required>
                        </div>
                        <!-- Stok -->
                        <div class="mb-3">
                            <label for="lAddStok" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" required>
                        </div>
                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="lAddHargaSatuan" class="form-label">Harga Satuan</label>
                            <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" required>
                        </div>
                        <!-- Foto Produk -->
                        <div class="mb-3">
                            <label for="lAddImageProduk" class="form-label">File Foto</label>
                            <input type="file" class="form-control" id="img_url" name="img_url" required>
                            <span>Abaikan jika tidak mengganti gambar</span>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" name="btn-update-product" id="btn-update-product" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div> <!-- end .modal-body -->
            </div>
        </div>
    </div> <!-- End #registrasiModal -->
    <!-- End .modal-fade / Modal Registration -->

    <!-- Delete Modal -->
    <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="query_product.php?f=delete_product" method="POST" id="form_delete">
                        <input type="hidden" name="produk_id" class="form-control produk_id">
                </div>
                <h3 class="text-center">Anda yakin menghapus produk ini?</h3>
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
            // Insert data
            $('#btn_add_product').on('submit', '#form_add_product', function(e) {
                let url = $('#form_add_product').attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: $('#form_add_product').serialize(),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log($('#form_add_product').serialize())
                        $('#modalAddProduct').modal('hide');
                        $('#table_product').DataTable().ajax.reload();
                        $('#form_add_product')[0].reset();
                        alert(data);
                        window.setTimeout(
                            function() {
                                location.reload(true)
                            },
                            2000
                        );
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
                        defaultContent: '<button class="btn btn-primary btn-sm update" data-bs-toggle="modal" data-bs-target="#updateProduct"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger btn-sm delete"><i class="fas fa-trash-alt"></i></button>'
                    }
                ],
            });

            // Menampilkan data customer ke dalam form update
            $('#table_product tbody').on('click', '.update', function() {
                let row = $(this).closest('tr');
                let produk_id = tableProduct.row(row).data().produk_id;
                $.ajax({
                    url: 'query_product.php?f=get_product_by_id&id=' + produk_id,
                    type: 'POST',
                    success: function(result) {
                        let data = jQuery.parseJSON(result);
                        $('#updateProduct').modal('show');
                        $('#nama').val(data.nama);
                        $('#sku').val(data.sku);
                        $('#stok').val(data.stok);
                        $('#harga_satuan').val(data.harga_satuan);
                        //$('#img_url').val(data.img_url); // Image
                        $('.produk_id').val(data.produk_id);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            // Menyimpan data produk yang di update
            $("#formUpdate").on('click', function() {
                let url = $(this).attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formUpdate").serialize(),
                    success: function(result) {
                        $("#updateProduct").modal('hide');
                        alert(result);
                        window.setTimeout(
                            function() {
                                location.reload(true)
                            },
                            3000
                        );
                    },
                    error: function(error) {
                        alert(error);
                    }
                });
                return false;
            });

            // Menghapus data product
            $('#table_product tbody').on('click', '.delete', function() {
                let row = $(this).closest('tr');
                let produk_id = tableProduct.row(row).data().produk_id;
                $("#modal_delete").modal('show');
                $('.produk_id').val(produk_id);
                alert('Record deleted successfully');
                window.setTimeout(
                    function() {
                        location.reload(true)
                    },
                    3000
                );
            });
        });
        // End jQready
    </script>

    </body>

    </html>