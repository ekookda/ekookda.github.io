$(document).ready(function () {
    // Image Zoom
    $('img.zoom').zoom();

    // Datepicker
    $("#fTglLahir").datepicker({
        dateFormat: "yy-mm-dd"
    });

    // function wishlist
    const wishlist = function (id, className) {
        if (className == 'far fa-heart') {
            $(`#${id}`).removeClass('far fa-heart').addClass('fas fa-heart wishlist');
        } else {
            $(`#${id}`).removeClass('fas fa-heart wishlist').addClass('far fa-heart');
        }
    }

    // onclick wishlist button
    const wishlistLength = $('.fa-heart').length;
    for (let i = 0; i < wishlistLength; i++) {
        $(`#wishlist${i}`).click(function () {
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

    // Cek jumlah session
    let count_session = "<?php echo count($_SESSION); ?>";
    if (count_session != 0) {
        $('#btnLogin').hide();
        $('#btnRegister').hide();
        $('#btnLogout').show();
    } else {
        $('#btnLogin').show();
        $('#btnRegister').show();
        $('#btnLogout').hide();
    }

    $('#btnRegister').click(function (reload) {
        // reset form
        $('#formRegistrasi')[0].reset();
    });

    // submit register
    $('#formRegistrasi').submit(function (e) {
        let url = $(this).attr("action");
        $.ajax({
            type: $(this).attr("method"),
            url: url,
            data: $(this).serialize(),
            success: function (response) {
                let d = $.parseJSON(response);
                if (d.status == 1) {
                    $('#registrasiModal').modal('hide');
                    alert(d.message);
                    window.setTimeout(
                        function () {
                            location.reload(true);
                        },
                        1000
                    );
                } else {
                    alert(d.message);
                }
            },
            error: function (requestObject, error, errorThrown) {
                alert(error);
                console.log(errorThrown);
            }
        });
        e.preventDefault();
    });

    // submit login
    $('#form_login').submit(function (e) {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                let d = $.parseJSON(response);
                if (d.status == 1) {
                    $('#modal_login').modal('hide');
                    alert(d.message);
                    // console.log(d);
                    window.setTimeout(
                        function () {
                            location.reload(true);
                        },
                        1000
                    );
                } else {
                    alert(d.message);
                }
            },
            error: function (requestObject, error, errorThrown) {
                alert(error);
                console.log(errorThrown);
            }
        });
        e.preventDefault();
    });

    // Menampilkan gambar produk dalam card
    $.ajax({
        url: "q_product.php?f=get_all_product",
        type: "POST",
        success: function (result) {
            let product = $.parseJSON(result);
            for (let i = 0; i < product.length; i++) {
                $(".card-group").append('<div class="col-sm-3 mt-0 p-2"><div class="card"><a class="zoom" id="ex' + i + '"><img class="card-img-top" src="' + product[i].img_url + '" alt="Card image cap"></a><div class="card-body"><h6 class="card-title text-center productname">' + product[i].nama + '</h6><span class="badge rounded-pill positionl float-end px-3 m-2"><i class="far fa-heart" id="wishlist"' + i + '"></i></span><p class="card-text p-0 m-0 sku">' + product[i].sku + '</p><p class="card-text p-0 mb-0 price" id="price">Rp ' + product[i].harga_satuan + ' </p><p class="card-text p-0 mb-0 stok"><small class="text-muted">Stok ' + product[i].stok + ' item</small></p><input type="number" class="form-control quantity" name="fAddToCart" placeholder="Jumlah item yang dibeli" min="1" aria-label="Add To Cart" aria-describedby="btn-addToCart" required><button type="submit" class="btn btn-primary mt-1 add_to_cart">Add to cart</button></div></div></div>');
            }
        },
        error: function () {
            alert("failure");
        }
    });

    // Checkout
    $('#btn_checkout').click(function (e) {
        // Memastikan pembeli sudah login
        // if (count_session == 0) {
        //     alert("Silahkan login terlebih dahulu");
        //     e.preventDefault();
        // } else {
        // Mengambil cart product dari session storage
        const product = JSON.parse(sessionStorage.getItem('cart'));
        $.ajax({
            url: "q_transaction.php?f=add_transaction",
            type: "POST",
            dataType: "json",
            data: $.parseJSON(product[i]),
            success: function (result) {
                //var product=jQuery.parseJSON(result)
            },
            error: function () {
                //alert("failure");
            }
        });
        for (let i = 0; i < product.length; i++) {
            $.ajax({
                url: 'q_transaction.php?f=add_detail_transaction',
                type: "POST",
                dataType: "json",
                data: JSON.parse(product[i]),
                success: function (result) {
                    //var product=jQuery.parseJSON(result)
                },
                error: function () {
                    //alert("failure");
                }
            });
        }
        // };
    });
});