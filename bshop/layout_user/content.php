<!-- List Product -->
<div class="container-fluid mt-0 bg-light">
    <div class="container py-3">
        <div class="row shadow p-3 mb-0 bg-body rounded list-product">
            <!-- Card Group -->
            <div class="card-group"></div>
            <!-- End .col-sm-3 mt-0 p-2 card-group -->
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
                <tbody id="cartTable"></tbody>
            </table>
            <button type="button" onclick="emptyCart()" id="emptyCart" class="btn btn-outline-danger mb-3">Empty
                Cart</button>
            <button type="button" id="btn_checkout" class="btn btn-outline-success mb-3 ms-1 float-end">Checkout</button>
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