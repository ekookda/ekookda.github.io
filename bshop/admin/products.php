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
                    <i class="fab fa-product-hunt"></i>&nbsp;Tabel Produk
                </h1>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- Button Add New Product modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataProduk">
                        <i class="fas fa-plus-circle"></i>&nbsp;Add New Product
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
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
                                    <th>No.</th>
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

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; 2022. Eko Okda. All Rights
                    Reserved.</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

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
                <form action="query_product.php?f=add_product">
                    <!-- Nama Produk -->
                    <div class="mb-3">
                        <label for="lAddNamaProduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="fProductName" id="fProductName">
                    </div>
                    <!-- SKU -->
                    <div class="mb-3">
                        <label for="lAddSKU" class="form-label">Nomor SKU</label>
                        <input type="text" class="form-control" name="fsku" id="fsku">
                    </div>
                    <!-- Stok -->
                    <div class="mb-3">
                        <label for="lAddStok" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="fStok" id="fStok">
                    </div>
                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="lAddHargaSatuan" class="form-label">Harga Satuan</label>
                        <input type="text" class="form-control" name="fHargaSatuan" id="fHargaSatuan">
                    </div>
                    <!-- Foto Produk -->
                    <div class="mb-3">
                        <label for="lAddImageProduk" class="form-label">File Foto</label>
                        <input type="file" class="form-control" id="fImageProduct">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" name="btn-add-product" id="btn_add_product" class="btn btn-primary">Tambah Produk</button>
                    </div>
                </form>
            </div> <!-- end .modal-body -->
        </div>
    </div>
</div> <!-- End #Add New Product Modal -->
<!-- End .modal-fade / Modal Registration -->

<!-- Modal Form Update -->
<div class="modal fade" id="updateDataProduk" tabindex="-1" aria-labelledby="updateDataProduk" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-center" id="titleDataProduk" aria-label="Close"><i class="fab fa-product-hunt"></i> Update
                    Data Produk</h4>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="#">
                    <!-- Nama Produk -->
                    <div class="mb-3">
                        <label for="lnamaProduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="fnamaProduk" id="fnamaProduk">
                    </div>
                    <!-- SKU -->
                    <div class="mb-3">
                        <label for="lSKU" class="form-label">Nomor SKU</label>
                        <input type="text" class="form-control" name="fSKU" id="fSKU">
                    </div>
                    <!-- Stok -->
                    <div class="mb-3">
                        <label for="lStok" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="fStok" id="fStok">
                    </div>
                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="lHargaSatuan" class="form-label">Harga Satuan</label>
                        <input type="text" class="form-control" name="fHargaSatuan" id="fHargaSatuan">
                    </div>
                    <!-- Foto Produk -->
                    <div class="mb-3">
                        <label for="lImageProduk" class="form-label">File Foto</label>
                        <input type="file" class="form-control" id="fImageProduk">
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
<?php include 'layout_admin/footer.php'; ?>
</body>

</html>