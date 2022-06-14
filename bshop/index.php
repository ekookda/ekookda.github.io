<?php
if (!isset($_SESSION)) session_start();

include_once 'function.php';
$layout = dirname(__FILE__) . "/layout_user/";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>B-Shop</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <!-- CDN Jquery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS v5.1.3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FontAwesome 5.15.4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php include_once $layout . "navbar.php"; ?>

    <?php include_once $layout . "header.php"; ?>

    <?php include_once $layout . "content.php"; ?>

    <?php include_once $layout . "footer.php"; ?>

    <?php include_once $layout . "modal_registrasi.php"; ?>

    <?php include_once $layout . "modal_login.php"; ?>

    <!-- Jquery Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery UI Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" integrity="sha512-8cU710tp3iH9RniUh6fq5zJsGnjLzOWLWdZqBMLtqaoZUA6AWIE34lwMB3ipUNiTBP5jEZKY95SfbNnQ8cCKvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery Zoom Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js" integrity="sha512-m5kAjE5cCBN5pwlVFi4ABsZgnLuKPEx0fOnzaH5v64Zi3wKnhesNUYq4yKmHQyTa3gmkR6YeSKW1S+siMvgWtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="myScript.js"></script>
    <script>
        $(document).ready(function() {
            // Cek jumlah session
            let count_session = <?php echo count($_SESSION); ?>;
            if (count_session != 0) {
                $('#btnLogin').hide();
                $('#btnRegister').hide();
                $('#btnLogout').show();
            } else {
                $('#btnLogin').show();
                $('#btnRegister').show();
                $('#btnLogout').hide();
            }

            $('#btnRegister').click(function(reload) {
                // reset form
                $('#formRegistrasi')[0].reset();
            });

            // submit register
            $('#formRegistrasi').submit(function(e) {
                let url = $(this).attr("action");
                $.ajax({
                    type: $(this).attr("method"),
                    url: url,
                    data: $(this).serialize(),
                    success: function(response) {
                        let d = $.parseJSON(response);
                        if (d.status == 1) {
                            $('#registrasiModal').modal('hide');
                            alert(d.message);
                            window.setTimeout(
                                function() {
                                    location.reload(true);
                                },
                                1000
                            );
                        } else {
                            alert(d.message);
                        }
                    },
                    error: function(requestObject, error, errorThrown) {
                        alert(error);
                        console.log(errorThrown);
                    }
                });
                e.preventDefault();
            });

            // submit login
            $('#form_login').submit(function(e) {
                $.ajax({
                    type: $(this).attr("method"),
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    success: function(response) {
                        let d = $.parseJSON(response);
                        if (d.status == 1) {
                            $('#modal_login').modal('hide');
                            alert(d.message);
                            // console.log(d);
                            window.setTimeout(
                                function() {
                                    location.reload(true);
                                },
                                1000
                            );
                        } else {
                            alert(d.message);
                        }
                    },
                    error: function(requestObject, error, errorThrown) {
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
                success: function(result) {
                    let product = $.parseJSON(result);
                    // console.log(product);
                    for (let i = 0; i < product.length; i++) {
                        $(".list-product").append('<div class="col-sm-3 mt-0 p-2 card-group"><div class="card"><a class="zoom" id="ex' + i + '"><img class="card-img-top" src="' + product[i].img_url + '" alt="Card image cap"></a><div class="card-body"><h6 class="card-title text-center productname">' + product[i].nama + '</h6><span class="badge rounded-pill positionl float-end px-3 m-2"><i class="far fa-heart" id="wishlist"'+ i +'"></i></span><p class="card-text p-0 m-0 sku">' + product[i].sku + '</p><p class="card-text p-0 mb-0 price" id="price">Rp ' + product[i].harga_satuan + ' </p><p class="card-text p-0 mb-0 stok"><small class="text-muted">Stok ' + product[i].stok + ' item</small></p><input type="number" class="form-control quantity" name="fAddToCart" placeholder="Jumlah item yang dibeli" min="1" aria-label="Add To Cart" aria-describedby="btn-addToCart" required><button type="button" class="btn btn-primary mt-1 btn-cart">Add to cart</button></div></div></div>');
                    }
                },
                error: function(){
                    alert("failure");
                }
            });

            // Checkout
            $('#btn_checkout').click(function(e) {
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
                    success: function(result) {
                        //var product=jQuery.parseJSON(result)
                    },
                    error: function() {
                        //alert("failure");
                    }
                });
                for (let i = 0; i < product.length; i++) {
                    $.ajax({
                        url: 'q_transaction.php?f=add_detail_transaction',
                        type: "POST",
                        dataType: "json",
                        data: JSON.parse(product[i]),
                        success: function(result) {
                            //var product=jQuery.parseJSON(result)
                        },
                        error: function() {
                            //alert("failure");
                        }
                    });
                }
                // };
            });
        });
    </script>
</body>

</html>