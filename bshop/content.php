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