<?php
session_start();
if (isset($_SESSION['is_logged_in']) == false) {
    header('Location: login.php', true, 301);
}
?>
<?php include 'layout_admin/head.php'; ?>
<style>
    .toast-container {
        position: fixed;
        right: 25px;
        top: 85px;
        z-index: 11;
    }

    .toast:not(.showing):not(.show) {
        display: none !important;
    }
</style>
<?php
include 'layout_admin/sidebar.php';
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php include 'layout_admin/topbar.php'; ?>

        <!-- Toast -->
        <div class="toast-container">
            <div class="toast d-flex align-items-center text-white bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body"></div>
                <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php print_r($_SESSION); ?>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!--  Total Pelanggan,  Total Produk, Total Penjualan -->
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Pelanggan
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        40
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Produk
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        100
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Penjualan
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        500
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-6 mb-4">
                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Illustrations
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem" src="../src/img/undraw_posting_photo.svg" alt="..." />
                            </div>
                            <p>
                                Add some quality, svg illustrations
                                to your project courtesy of
                                <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                constantly updated collection
                                of beautiful svg images that you can
                                use completely free and without
                                attribution!
                            </p>
                            <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                unDraw
                                &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <?php include 'layout_admin/footer.php'; ?>

    <script src="../src/js/jquery.session.js"></script>

    <script>
        $(document).ready(function() {
            if ($.session.get('success') != null) {
                $('.toast-body').html($.session.get('success'));
                $('.toast').toast('show');
                $.session.remove('success');
            }

            // $('#logout').click(function() {
            //     $.session.set('messages', 'Logout berhasil!');
            //     window.location.href = 'logout.php';
            // });
        });
    </script>

    </body>

    </html>