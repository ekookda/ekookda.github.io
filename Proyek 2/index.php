<!DOCTYPE html>
<html lang="en">

<head>
    <title>B-Shop</title>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <!-- CDN Jquery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FontAwesome 5.15.4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @import "bootstrap";

        .btn-outline-warning:hover {
            color: #000000 !important;
        }

        a.hover:hover {
            color: #ffc107 !important;
        }

        #wishlist0,
        #wishlist1,
        #wishlist2,
        #wishlist3 {
            color: black;
            font-size: 24px;

        }

        .wishlist {
            color: red !important;
            font-size: 24px;
        }

        .autoCompleteList {
            position: fixed;
            z-index: 1030;
        }

        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {
            .navbar .nav-item .dropdown-menu {
                display: none;
            }

            .navbar .nav-item:hover .dropdown-menu {
                display: block;
            }

            .navbar .nav-item .dropdown-menu {
                margin-top: 0;
            }
        }

        /* ============ desktop view .end// ============ */
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container">
            <!-- Navbar Brand / Logo -->
            <a class="navbar-brand" href="#">
                <img src="images/logo.png" alt="Logo B-Shop" style="width:40px;" class="rounded-pill d-inline-block align-text-middle">B-Shop
            </a>
            <!-- Navbar Burger Menu / Responsive -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Search Box -->
            <div class="input-group p-2">
                <input type="text" id="search-box" name="search-box" class="form-control" placeholder="Minimal 2 huruf">
                <button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>
            </div> <!-- end .input-group p-2 -->

            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav d-flex mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <!-- Cart Menu -->
                    <li class="nav-item dropdown">
                        <button type="button" id="dropdownId" class="nav-link btn btn-link position-relative me-3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <!-- icon cart -->
                            <i class='fas fa-shopping-cart'></i>
                            <span class="position-absolute top-0 start-100 translate-middle-x badge rounded-pill bg-danger">
                                0</span>
                        </button>
                        <div class="dropdown-menu p-0" aria-labelledby="dropdownId">
                            <div class="card" style="width: 18rem;">
                                <img src="https://www.static-src.com/frontend/static/img/cart-empty.3e6fae9.svg" alt="Empty Cart" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-title text-center productname">Keranjang kamu masih kosong</h6>
                                    <p class="card-text text-center">
                                        <small>Kalau ada yang cocok di hati,<br>langsung saja tambahkan kesini!</small>
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end .dropdown-menu -->
                    </li> <!-- end .nav-item dropdown -->
                    <li class="nav-item"><a class="nav-link btn btn-outline-warning mx-sm-2 px-4 text-warning" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">MASUK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning mx-sm-2 px-4 text-dark" href="#" data-bs-toggle="modal" data-bs-target="#registrasiModal">DAFTAR</a>
                    </li>
                </ul> <!-- end .navbar-nav -->
            </div> <!-- End Navbar Menu -->
        </div> <!-- end container -->
    </nav>
    <!-- End Navigation -->

    <!-- Carousel Slide Images -->
    <div class="container-fluid">
        <div class="row bg-dark">
            <div id="carouselExampleFade" class="carousel slide p-0" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div> <!-- end .carousel-indicators -->

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://assets.jamtangan.com/images/banners/home/H1/b/0522/hgn-mei-2022-ca4ffa33e1dc76a699b6a4e4bad938c1.jpg" class="d-block w-100 img-fluid mx-auto" width="1316" height="329" alt="Image Carousel 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://assets.jamtangan.com/images/banners/home/H1/b/0522/-e-6402-48f5a5f125d782795dfdaa2cd889949a.jpg" class="d-block w-100 img-fluid mx-auto" width="1316" height="329" alt="Image Carousel 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://assets.jamtangan.com/images/banners/home/H1/b/0522/wow-ff4ff68df52217764cf00d6b416ac819.jpg" class="d-block w-100 img-fluid mx-auto" width="1316" height="329" alt="Image Carousel 3">
                    </div>
                    <div class="carousel-item">
                        <img src="https://assets.jamtangan.com/images/banners/home/H1/b/0522/sla061j1-limited-edition-ef7e487379f4a3e4c76400f10e940363.jpg" class="d-block w-100 img-fluid mx-auto" width="1316" height="329" alt="Image Carousel 4">
                    </div>
                    <div class="carousel-item">
                        <img src="https://assets.jamtangan.com/images/banners/home/H1/b/0522/casio-g-shock-dw-5600ca-fdde58206d5f1bc7fe82f5155ced46b4.jpg" class="d-block w-100 img-fluid mx-auto" width="1316" height="329" alt="Image Carousel 5">
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> <!-- end .carousel-inner -->
            </div> <!-- end .carousel slide -->
        </div> <!-- end .row -->
    </div><!-- end .container -->
    <!-- End Carousel Slide Images -->

    <!-- List Product -->
    <div class="container-fluidm mt-0 bg-light">
        <div class="container py-3">
            <div class="row shadow p-3 mb-0 bg-body rounded list-product">
                <!-- Left Section => New Product -->
                <div class="col-sm-3 mt-0 p-2">
                    <div class="card">
                        <a class='zoom' id='ex1'>
                            <span class="badge bg-secondary text-light rounded-pill position-absolute px-3 m-2">FREE
                                ONGKIR</span>
                            <img src="https://assets.jamtangan.com/images/product/alexandre-christie/ACF-8331-MDBRGSL/1l.jpg" class="card-img-top" alt="Image MK7217">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title text-center productname">Michael Kors Lexington Woman</h6>
                            <span class="badge rounded-pill positionl float-end px-3 m-2">
                                <i class="far fa-heart" id="wishlist0"></i>
                            </span>
                            <p class="card-text p-0 m-0 sku">MK-7217</p>
                            <p class="card-text p-0 mb-0 price" id="price">Rp 2.629.000</p>
                            <input type="number" name="fAddToCart" class="form-control quantity" placeholder="" min="1" aria-label="Add To Cart" aria-describedby="btn-addToCart" required>
                            <button class="btn btn-primary mt-1 btn-cart" type="button">Add to
                                cart</button>
                        </div> <!-- End .card-body -->
                    </div> <!-- End .card -->
                </div> <!-- End .col-sm-3 mt-0 p-2  -->

                <!-- Left Section => New Product -->
                <div class="col-sm-3 mt-0 p-2">
                    <div class="card">
                        <a class='zoom' id='ex2'>
                            <span class="badge bg-success text-light rounded-pill position-absolute px-3 m-2">TERLARIS</span>
                            <img src="https://assets.jamtangan.com/images/product/alexandre-christie/ACF-6457-MCLIPBA/1l.jpg" class="card-img-top" alt="Image AC6457">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title text-center productname">
                                Alexandre Christie Passion Men Chronograph Black
                            </h6>
                            <span class="badge rounded-pill positionl float-end px-3 m-2">
                                <i class="far fa-heart" id="wishlist1"></i>
                            </span>
                            <p class="card-text p-0 m-0 sku">AC-6457</p>
                            <p class="card-text p-0 mb-0 price" id="price">Rp 1.235.000</p>
                            <input type="number" name="fAddToCart" class="form-control quantity" placeholder="" min="1" aria-label="Add To Cart" aria-describedby="btn-addToCart" required>
                            <button class="btn btn-primary mt-1 btn-cart" type="button">Add to cart</button>
                        </div> <!-- End .card-body -->
                    </div> <!-- End .card -->
                </div> <!-- End .col-sm-3 mt-0 p-2  -->

                <div class="col-sm-3 mt-0 p-2">
                    <div class="card">
                        <a class='zoom' id='ex3'>
                            <span class="badge bg-warning text-light rounded-pill position-absolute px-3 m-2">FREE
                                ONGKIR</span>
                            <img src="https://assets.jamtangan.com/images/product/alexandre-christie/ACF-6457-MCLIPGR/1l.jpg" class="card-img-top" alt="Image AX1348">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title text-center productname">
                                Armani Exchange Chronograph Men Black Rubber Strap
                            </h6>
                            <span class="badge rounded-pill positionl float-end px-3 m-2">
                                <i class="far fa-heart" id="wishlist2"></i>
                            </span>
                            <p class="card-text p-0 m-0 sku">AX-1348</p>
                            <p class="card-text p-0 mb-0 price" id="price">Rp 1.500.000</p>
                            <input type="number" name="fAddToCart" class="form-control quantity" placeholder="" min="1" aria-label="Add To Cart" aria-describedby="btn-addToCart" required>
                            <button class="btn btn-primary mt-1 btn-cart" type="button">Add to cart</button>
                        </div> <!-- End .card-body -->
                    </div> <!-- End .card -->
                </div> <!-- End .col-sm-3 mt-0 p-2  -->

                <!-- Left Section => New Product -->
                <div class="col-sm-3 mt-0 p-2">
                    <div class="card">
                        <a class='zoom' id='ex4'>
                            <span class="badge bg-info text-light rounded-pill position-absolute px-3 m-2">TERMURAH</span>
                            <img src="https://assets.jamtangan.com/images/product/alexandre-christie/ACF-6292-BFBTBBA/1l.jpg" class="card-img-top" alt="Image FJ-3028">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title text-center productname">
                                Fjord Vendela Men Black Dial Green Leather Strap
                            </h6>
                            <span class="badge rounded-pill positionl float-end px-3 m-2">
                                <i class="far fa-heart" id="wishlist3"></i>
                            </span>
                            <p class="card-text p-0 m-0 sku">FJ-3028</p>
                            <p class="card-text p-0 mb-0 price" id="price">Rp 624.000</p>
                            <input type="number" name="fAddToCart" class="form-control quantity" placeholder="" min="1" aria-label="Add To Cart" aria-describedby="btn-addToCart" required>
                            <button class="btn btn-primary mt-1 btn-cart" type="button">Add to cart</button>
                        </div> <!-- End .card-body -->
                    </div> <!-- End .card -->
                </div> <!-- End .col-sm-3 mt-0 p-2  -->

            </div> <!-- End .row bg-secondary -->
        </div> <!-- End .container -->
        <hr>
    </div>

    <!-- Checkout Product Table -->
    <div class="container-fluid mb-0">
        <div class="container shadow">
            <div class="table-responsive mt-5 p-0">
                <h2 class="text-center mt-3 mb-0 pb-3">
                    <i class="fas fa-shopping-bag"></i> Checkout
                </h2>
                <div id="alerts" class="text-start text-info"></div>
                <table id="dataTable" class="table table-sm table-hover table-bordered mt-0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>SKU</th>
                            <th>Qty</th>
                            <th>Hrg Satuan</th>
                            <th>Jml Hrg</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="cartTable"></tbody>
                    <tfoot>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>SKU</th>
                            <th>Kuantitas</th>
                            <th>Hrg Satuan</th>
                            <th>Jml Harga</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-dark text-center">Total Item</td>
                            <td id="totalItem" colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-dark text-center">Total Harga</td>
                            <td id="totalPrice" colspan="3"></td>
                        </tr>
                    </tfoot>
                </table>
                <button type="button" onclick="emptyCart()" id="emptyCart" class="btn btn-outline-danger mb-3">Empty
                    Cart</button>
                <button type="button" onclick="checkOut()" id="checkOut" class="btn btn-outline-success mb-3 ms-1 float-end">Checkout</button>
            </div> <!-- End .table-responsive -->
        </div> <!-- End .container shadow -->
        <hr class="mb-0">
    </div>

    <!-- Informasi Keuntungan Belanja -->
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row">
                <h1 class="display-5 p-4 text-center text-muted">
                    Keuntungan Belanja di B-Shop
                </h1>
                <div class="col-md-3 text-center my-4 p-1">
                    <h1 class="display-6 text-primary">
                        <i class="fas fa-check-circle"></i>
                        Terpercaya
                    </h1>
                    <p>100% produk yang kami jual adalah barang original dengan garansi resmi, bukan barang palsu maupun
                        replika.</p>
                </div>
                <div class="col-md-4 offset-md-1 text-center my-4 p-1">
                    <h1 class="display-6 text-primary">
                        <i class="fas fa-truck"></i>
                        Tercepat
                    </h1>
                    <p>Dengan menggunakan kurir terpercaya, kami menjamin barang yang dipesan akan tiba sesuai alamat.
                    </p>
                </div>
                <div class="col-md-3 offset-md-1 text-center my-4 p-1">
                    <h5 class="display-6 text-primary">
                        <i class="fas fa-hand-holding-usd"></i>
                        Terbaik
                    </h5>
                    <p>Kami menjamin setiap produk yang kami jual online lebih murah dibanding yang dijual di toko
                        offline.
                    </p>
                </div>
            </div> <!-- end .row -->
        </div> <!-- .container mt-0 -->
        <hr>
    </div> <!-- End .container-fluid -->
    <!-- End Of Informasi Keuntungan Belanja -->

    <!-- Video Product and Spesification -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <h6 class="display-6 ps-3 text-center my-3">Expedition E 6816 MC RIPBAYL Chronograph<br>Men Black Dial
                    Yellow Rubber Strap</h6>
                <div class="col-sm-6 embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/Oub7ATAVUdY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-sm-6">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td style="width:30%;">Model No.</td>
                                    <td>EXF-6816-MCRIPBAYL</td>
                                </tr>
                                <tr>
                                    <td>Series</td>
                                    <td>Chronograph</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>Man</td>
                                </tr>
                                <tr>
                                    <td>Colour</td>
                                    <td>Black / Yellow</td>
                                </tr>
                                <tr>
                                    <td>Strap Material</td>
                                    <td>Rubber/Silicon/Resin/Karet</td>
                                </tr>
                                <tr>
                                    <td>Case Material</td>
                                    <td>Stainless Stell</td>
                                </tr>
                                <tr>
                                    <td>Water Resistant</td>
                                    <td>50 Meters/5 ATM/5 BAR</td>
                                </tr>
                                <tr>
                                    <td>What's Inside Box</td>
                                    <td>1x Expedition E 6816 MC RIPBAYL Chronograph Men Black Dial Yellow Rubber Strap1x
                                        Official Expedition Warranty Card1x Expedition Watch Box</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- End .row -->
        </div> <!-- End .container-fluid bg-light -->
        <hr class="my-0 bg-light">
    </div>
    <!-- End Video Product and Spesification -->

    <!-- Footer -->
    <footer>
        <div class="container-fluid bg-dark">
            <div class="container my-3">
                <div class="row">
                    <div class="col">
                        <img src="images/logo.png" alt="Logo B-Shop" style="width:80px;" class="rounded-pill d-inline-block ms-0">
                        <span class="h3 align-middle text-light">B-Shop</span>
                    </div>
                </div>
                <!-- End .row logo -->

                <div class="row">
                    <!-- Address -->
                    <div class="col-sm-4">
                        <p class="h5 text-warning">Customer Service</p>
                        <address class="text-sm text-light">
                            <small>
                                Senin - Jumat: 09:00 - 22:00 WIB<br>
                                Sabtu: 09:00 - 21:00 WIB<br>
                                Minggu: 10:00 - 18:00 WIB<br>
                                <div class="mt-2">
                                    <a href="tel:0211500489" class="text-light text-decoration-none hover">
                                        <i class="fas fa-phone-alt"></i>&nbsp;
                                        (021) 1500 489
                                    </a>
                                </div>
                                <div class="mt-1">
                                    <a href="mailto:admin@bshop.com" class="text-light text-decoration-none hover">
                                        <i class="fa fa-envelope"></i>&nbsp;
                                        admin@bshop.com
                                    </a>
                                </div>
                            </small>
                        </address>
                    </div> <!-- End .col-sm-4 -->
                    <!-- End Address -->

                    <!-- Newsletter -->
                    <div class="col-sm-4">
                        <p class="h5 text-warning">Newsletter</p>
                        <p class="text-light">Dapatkan voucher senilai Rp75.000 dengan cara berlangganan newsletter. Dan
                            segera nikmati voucher hanya di <a href="#" class="text-light text-decoration-none hover">bshop.com</a>.
                        </p>
                        <!-- Form Newsletter -->
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Masukkan email disini!" aria-label="Masukkan email disini!" aria-describedby="btn-newsletter">
                            <button class="btn btn-warning" type="button" id="btn-newsletter">wishlist</button>
                        </div>
                    </div>
                    <!-- End Newsletter -->

                    <!-- Empty Column -->
                    <div class="col-sm-1"></div>

                    <!-- Follow Icon -->
                    <div class="col-sm-3">
                        <p class="h5 text-warning">Ikuti Kami di:</p>
                        <ul class="h5 list-inline text-light">
                            <!-- Instagram -->
                            <li class="list-inline-item">
                                <a href="#" class="text-decorative-none text-light">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <!-- Facebook -->
                            <li class="list-inline-item">
                                <a href="#" class="text-decorative-none text-light">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <!-- Youtube -->
                            <li class="list-inline-item">
                                <a href="#" class="text-decorative-none text-light">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <!-- Twitter -->
                            <li class="list-inline-item">
                                <a href="#" class="text-decorative-none text-light">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <!-- Tiktok -->
                            <li class="list-inline-item">
                                <a href="#" class="text-decorative-none text-light">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            </li>
                        </ul>
                        <a href="https://ekookda.github.io/" class="text-light text-decoration-none hover">
                            <i class="fas fa-globe"></i>&nbsp;
                            www.bshop.com
                        </a>
                        <br>
                        <button name="btn-whatsapp" id="btn-whatsapp" class="btn btn-wa btn-success btn-sm mt-2" role="button">
                            <i class="fab fa-whatsapp"></i>&nbsp;Hubungi Whatsapp Kami
                        </button>
                    </div> <!-- End .col-sm-3 -->
                    <!-- End Follow Icon -->
                </div> <!-- End .row -->
            </div> <!-- End .container -->
            <hr class="text-light m-0">
        </div> <!-- End .container-fluid -->

        <!-- Copyright -->
        <div class="p-3 text-sm-center text-muted bg-dark">
            Copyright © 2022. Eko Okda. All Rights Reserved.
        </div> <!-- End .copyright -->
        <!-- End Copyright -->

    </footer>
    <!-- End Footer -->

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
                    <form action="" method="post" autocomplete="off" id="form-registrasi">
                        <div class="mb-3">
                            <!-- Nama -->
                            <label for="lname" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="fname" id="fname">
                        </div>
                        <div class="mb-3">
                            <!-- Password -->
                            <label for="lpass" class="form-label">Password</label>
                            <input type="password" class="form-control" name="fpass" id="fpass">
                        </div>
                        <div class="mb-3">
                            <!-- Tanggal Lahir -->
                            <label for="lTglLahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="fTglLahir" id="fTglLahir">
                        </div>
                        <div class="mb-3">
                            <!-- Umur -->
                            <label for="lumur" class="form-label">Umur</label>
                            <input type="number" class="form-control" name="fumur" id="fumur">
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
                            <button type="submit" name="form-registrasi" id="btn-registrasi" class="btn btn-primary">Daftar
                                Sekarang</button>
                        </div>
                    </form>
                </div> <!-- end .modal-body -->
            </div>
        </div>
    </div> <!-- End #registrasiModal -->
    <!-- End .modal-fade / Modal Registration -->

    <!-- Modal Form Login -->
    <div class="modal" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fas fa-user"></i> Login
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="#">
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
                            <button type="button" name="btn-login" id="btn-login" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- End #modalFormLogin -->
    <!-- End Form Login -->

    <!-- Jquery Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery UI Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- Jquery Zoom Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js" integrity="sha512-m5kAjE5cCBN5pwlVFi4ABsZgnLuKPEx0fOnzaH5v64Zi3wKnhesNUYq4yKmHQyTa3gmkR6YeSKW1S+siMvgWtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="myScript.js"></script>
    <script>
        $(document).ready(function() {
            // Datepicker
            $("#fTglLahir").datepicker();
            // Image Zoom
            $('.zoom').zoom();
            // function wishlist
            const wishlist = function(id, className) {
                if (className == 'far fa-heart') {
                    $(`#${id}`).removeClass('far fa-heart').addClass('fas fa-heart wishlist');
                } else {
                    $(`#${id}`).removeClass('fas fa-heart wishlist').addClass('far fa-heart');
                }
            }
            // onclick wishlist button
            const wishlistLength = $('.fa-heart').length;
            for (let i = 0; i < wishlistLength; i++) {
                $(`#wishlist${i}`).click(function() {
                    let id = $(`#wishlist${i}`).attr('id');
                    let className = $(`#wishlist${i}`).attr('class');
                    wishlist(id, className);
                });
            }

            // Autocomplete search product
            const listProduct = [
                "Michael Kors Lexington Woman",
                "Alexandre Christie Passion Men Chronograph Black",
                "Armani Exchange Chronograph Men Black Rubber Strap",
                "Fjord Vendela Men Black Dial Green Leather Strap",
            ];
            $("#search-box").autocomplete({
                source: listProduct,
                minLength: 2,
                classes: {
                    "ui-autocomplete": "autoCompleteList"
                }
            });

            // Ketika form register di submit
            $('#form-registrasi').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "function/register.php",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function(response) {
                        $('')
                    }
                });
            })

        });
    </script>
</body>

</html>