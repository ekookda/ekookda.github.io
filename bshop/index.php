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

    <?php include_once $layout . "modal_registrasi.php"; ?>

    <?php include_once $layout . "modal_login.php"; ?>

    <?php include_once $layout . "footer.php"; ?>

    <!-- Jquery Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery UI Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" integrity="sha512-8cU710tp3iH9RniUh6fq5zJsGnjLzOWLWdZqBMLtqaoZUA6AWIE34lwMB3ipUNiTBP5jEZKY95SfbNnQ8cCKvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery Zoom Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js" integrity="sha512-m5kAjE5cCBN5pwlVFi4ABsZgnLuKPEx0fOnzaH5v64Zi3wKnhesNUYq4yKmHQyTa3gmkR6YeSKW1S+siMvgWtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="myScript.js"></script> -->
    <script src="myJquery.js"></script>
    <script>
        /* get cart total from session on load */
        updateCartTotal();

        // onclick addToCart
        let btnCart = document.getElementsByClassName("add_to_cart");
        for (let i = 0; i < btnCart.length; i++) {
            btnCart[i].addEventListener("click", function() {
                addToCart(this);
            });
        }

        // NumberFormat Rupiah
        function rupiah(angka) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(angka);
        }

        // function to convert string to number
        function toAngka(rupiah) {
            return parseInt(rupiah.replace(/,.*|\D/g, ""), 10);
        }

        // Function addToCart
        function addToCart(e) {
            // initialize
            let getProductName;
            let getSKU;
            let getProductPrice;
            let getProductQuantity;
            let sibs = [];
            let cart = [];

            //cycles siblings for product info near the add button
            while ((e = e.previousSibling)) {
                // console.log(e);
                if (e.nodeType === 3)
                    continue; // text nodex
                if (e.className.match("price") == "price") {
                    getProductPrice = toAngka(e.innerText);
                }
                if (e.className.match("productname") == "productname") {
                    getProductName = e.innerText;
                }
                if (e.className.match("sku") == "sku") {
                    getSKU = e.innerText;
                }
                if (e.className.match("quantity") == "quantity") {
                    getProductQuantity = e.value;
                }
                sibs.push(e);
            }

            //create product object
            const product = {
                productname: getProductName,
                price: getProductPrice,
                sku: getSKU,
                quantity: getProductQuantity,
            };

            //convert product data to JSON for storage
            let stringProduct = JSON.stringify(product);

            /*send product data to session storage */
            if (!sessionStorage.getItem("cart")) {
                //append product JSON object to cart array
                cart.push(stringProduct);
                //cart to JSON
                stringCart = JSON.stringify(cart);
                //create session storage cart item
                sessionStorage.setItem("cart", stringCart);
                addedToCart(getProductName);
                updateCartTotal();
            } else {
                //get existing cart data from storage and convert back into array
                cart = JSON.parse(sessionStorage.getItem("cart"));
                //append new product JSON object
                cart.push(stringProduct);
                //cart back to JSON
                stringCart = JSON.stringify(cart);
                //overwrite cart data in sessionstorage
                sessionStorage.setItem("cart", stringCart);
                updateCartTotal();
            }
        }

        /* Calculate Cart Total */
        function updateCartTotal() {
            //init
            let sumPrice = 0;
            let total = 0;
            let items = 0;
            let no = 1;
            let productName = null;
            let productSKU = null;
            let productQty = null;
            let productPrice = null;
            let qtyItem = 0;
            let cartTable = "";
            if (sessionStorage.getItem("cart")) {
                //get cart data & parse to array
                let cart = JSON.parse(sessionStorage.getItem("cart"));
                //get no of items in cart
                items = cart.length;

                //loop over cart array
                for (let i = 0; i < items; i++) {
                    //convert each JSON product in array back into object
                    let x = JSON.parse(cart[i]);
                    //get property value of price
                    // price = parseFloat(x.price.split("Rp ")[1]);
                    productPrice = x.price;
                    productName = x.productname;
                    productSKU = x.sku;
                    productQty = x.quantity;
                    sumPrice = productPrice * productQty;

                    //add price to total
                    cartTable +=
                        "<tr><td>" +
                        no +
                        "</td><td>" +
                        productName +
                        "</td><td>" +
                        productSKU +
                        '</td><td class="text-center">' +
                        productQty +
                        "</td><td>Rp " +
                        productPrice +
                        "</td><td>" +
                        rupiah(sumPrice) +
                        "</td>" +
                        '<td class="text-center"><button class=""><i class="fas fa-window-close" style="color:red "></button>' +
                        "</td></tr>";
                    total += sumPrice;
                    qtyItem += parseInt(productQty);
                    no++;
                }
            }
            //update total on website HTML
            document.getElementById("totalPrice").innerHTML = rupiah(total);
            // insert saved products to cart table
            document.getElementById("cartTable").innerHTML = cartTable;
            //update items in cart on website HTML
            document.getElementById("totalItem").innerHTML = qtyItem;
        }

        //user feedback on successful add
        function addedToCart(pname) {
            let message = pname + " was added to the cart";
            let alerts = document.getElementById("alerts");
            alerts.innerHTML = message;
            if (!alerts.classList.contains("message")) {
                alerts.classList.add("message");
            }
        }

        /* User Manually empty cart */
        function emptyCart() {
            //remove cart session storage object & refresh cart totals
            if (sessionStorage.getItem("cart")) {
                sessionStorage.removeItem("cart");
                updateCartTotal();
                //clear message and remove class style
                const alerts = document.getElementById("alerts");
                alerts.innerHTML = "";
                if (alerts.classList.contains("message")) {
                    alerts.classList.remove("message");
                }
            }
        }
    </script>
</body>

</html>