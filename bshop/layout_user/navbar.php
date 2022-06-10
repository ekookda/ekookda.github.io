<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container">
        <!-- Navbar Brand / Logo -->
        <a class="navbar-brand" href="#">
            <img src="<?= base_url(); ?>/images/logo.png" alt="Logo B-Shop" style="width:40px;" class="rounded-pill d-inline-block align-text-middle">B-Shop
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
                <li class="nav-item"><a class="nav-link btn btn-outline-warning mx-sm-2 px-4 text-warning" href="#" id="btnLogin" data-bs-toggle="modal" data-bs-target="#loginModal">MASUK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-warning mx-sm-2 px-4 text-dark" href="#" data-bs-toggle="modal" id="btnRegister" data-bs-target="#registrasiModal">DAFTAR</a>
                </li>
            </ul> <!-- end .navbar-nav -->
        </div> <!-- End Navbar Menu -->
    </div> <!-- end container -->
</nav>
<!-- End Navigation -->