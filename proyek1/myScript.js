// onclick addToCart
const btnCart = document.getElementsByClassName("btn-cart");

for (let i = 0; i < btnCart.length; i++) {
	btnCart[i].addEventListener("click", function () {
		addToCart(this);
	});
}

// Function addToCart
const addToCart = (e) => {
	// initialize
	let getProductName = null;
	let getSKU = null;
	let getProductPrice = null;
	let getProductQuantity = null;
	let sibs = [];
	let cart = [];
	let count = 0;

	//cycles siblings for product info near the add button
	while ((e = e.previousSibling)) {
		// console.log(e);
		if (e.nodeType === 3) continue; // text nodex
		if (e.className == "card-text p-0 mb-0 price") {
			getProductPrice = e.innerText;
		}
		if (e.className == "card-title text-center productname") {
			getProductName = e.innerText;
		}
		if (e.className == "card-text p-0 m-0 sku") {
			getSKU = e.innerText;
		}
		if (e.className == "form-control quantity") {
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
	console.log(cart);
};

/* Calculate Cart Total */
const updateCartTotal = () => {
	//init
	let total = 0;
	let price = 0;
	let items = 0;
	let no = 1;
	let productName = null;
	let productSKU = null;
	let productQty = null;
	let cartTable = "";
	if (sessionStorage.getItem("cart")) {
		//get cart data & parse to array
		let cart = JSON.parse(sessionStorage.getItem("cart"));
		//get no of items in cart
		items = cart.length;
		console.log(cart);
		//loop over cart array
		for (let i = 0; i < items; i++) {
			//convert each JSON product in array back into object
			let x = JSON.parse(cart[i]);
			//get property value of price
			price = parseFloat(x.price.split("Rp ")[1]);
			productName = x.productname;
			productSKU = x.sku;
			productQty = x.quantity;

			//add price to total
			cartTable +=
				"<tr><td>" +
				no +
				"</td><td>" +
				productName +
				"</td><td>" +
				productSKU +
				"</td><td>" +
				productQty +
				"</td><td>Rp " +
				price.toFixed(6) +
				"</td>" +
				'<td><i class="fas fa-window-close" style="color:red ">' +
				"</td></tr>";
			total += price;
			no++;
		}
	}
	//update total on website HTML
	// document.getElementById("total").innerHTML = total.toFixed(2);
	console.log("Carttable ", cartTable);
	console.log("Items ", items);
	console.log("Total ", total);
	// insert saved products to cart table
	document.getElementById("cartTable").innerHTML = cartTable;
	//update items in cart on website HTML
	// document.getElementById("itemsquantity").innerHTML = items;
};

//user feedback on successful add
const addedToCart = (pname) => {
	let message = pname + " was added to the cart";
	let alerts = document.getElementById("alerts");
	alerts.innerHTML = message;
	if (!alerts.classList.contains("message")) {
		alerts.classList.add("message");
	}
};

/* User Manually empty cart */
const emptyCart = () => {
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
