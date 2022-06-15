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
            <!-- DataTables Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h1 class="h3 mb-0 text-gray-800">
                        <i class="fab fa-product-hunt"></i>&nbsp;Laporan Penjualan
                    </h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_laporan" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Jual</th>
                                    <th>Jumlah Penjualan</th>
                                    <th>Satuan</th>
                                    <th>Total Penjualan</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Jual</th>
                                    <th>Jumlah Penjualan</th>
                                    <th>Satuan</th>
                                    <th>Total Penjualan</th>
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

    <?php include 'layout_admin/footer.php'; ?>

    <script>
        $(document).ready(function() {
            // Menampilkan data barang ke tabel
            let table_laporan = $('#table_laporan').DataTable({
                ajax: 'q_laporan.php?f=get_laporan',
                columns: [
                    {
                        data: 'kode_barang'
                    },
                    {
                        data: 'nama_barang'
                    },
                    {
                        data: 'harga_jual'
                    },
                    {
                        data: 'JumlahPenjualan'
                    },
                    {
                        data: 'satuan'
                    },
                    {
                        data: 'TotalPenjualan'
                    }
                ],
            });
        });
        // End jQready
    </script>

    </body>

    </html>
