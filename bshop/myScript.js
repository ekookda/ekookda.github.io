// onclick addToCart
const btnCart = document.getElementsByClassName("btn-cart");
for (let i = 0; i < btnCart.length; i++) {
	btnCart[i].addEventListener("click", function () {
		addToCart(this);
	});
}

// NumberFormat Rupiah
const rupiah = (angka) => {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
	}).format(angka);
};

// function to convert string to number
const toAngka = (rupiah) => parseInt(rupiah.replace(/,.*|\D/g, ""), 10);

// Function addToCart
const addToCart = function (e) {
	// initialize
	let getProductName = null;
	let getSKU = null;
	let getProductPrice = null;
	let getProductQuantity = null;
	let sibs = [];
	let cart = [];

	//cycles siblings for product info near the add button
	while ((e = e.previousSibling)) {
		// console.log(e);
		if (e.nodeType === 3) continue; // text nodex
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
};

/* Calculate Cart Total */
const updateCartTotal = function () {
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
};

//user feedback on successful add
const addedToCart = function (pname) {
	let message = pname + " was added to the cart";
	let alerts = document.getElementById("alerts");
	alerts.innerHTML = message;
	if (!alerts.classList.contains("message")) {
		alerts.classList.add("message");
	}
};

/* User Manually empty cart */
const emptyCart = function () {
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
};

/* get cart total from session on load */
updateCartTotal();

$(document).ready(function () {
	// Datepicker
	$("#fTglLahir").datepicker({
		dateFormat: "yy-mm-dd"
	});
	// Image Zoom
	$('.zoom').zoom();
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

	// Tampilkan Form Tambah Data
	$('#btnRegister').click(function (reload) {
		// reset form
		$('#formRegistrasi')[0].reset();
	});

	// Ketika form register di submit
	$("#formRegistrasi").submit(function (e) {
		let url = $(this).attr("action");
		$.ajax({
			type: $(this).attr("method"),
			url: url,
			data: $(this).serialize(),
			success: function (res) {
				$('#registrasiModal').modal('hide');
				swal({
					position: 'top-end',
					icon: 'success',
					title: 'Registrasi berhasil! Silahkan login.',
					showConfirmButton: false,
					allowEscapeKey: false,
					allowOutsideClick: false,
					// timer: 3000
				});
			},
			error: function () {
				swal({
					position: 'top-end',
					icon: 'error',
					title: 'Data gagal disimpan!',
					showConfirmButton: false,
					timer: 3000
				});
			}
		});
		e.preventDefault();
	});
});