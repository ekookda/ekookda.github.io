// // onclick addToCart
let btnCart = document.getElementsByClassName("addtocart");
for (let i = 0; i < btnCart.length; i++) {
	btnCart[i].addEventListener("click", function () {
		addToCart(this);
	});
}

// Function addToCart
const addToCart = (e) => {
	// console.log(e.nodeType);
	// initialize
	let getProductName;
	let getSKU;
	let getProductPrice;
	let getProductQuantity;
	let sibs = [];
	let cart = [];
	let count = 0;

	//cycles siblings for product info near the add button
	while ((e = e.previousSibling)) {
		// console.log(e);
		if (e.nodeType === 3) continue; // text nodex
		if (e.className == "price") {
			getProductPrice = e.innerText;
		}
		if (e.className == "card-title text-center productname") {
			getProductName = e.innerText;
		}
		if (e.className == "sku") {
			getSKU = e.innerText;
		}
		if (e.className == "form-control quantity") {
			getProductQuantity = e.value;
		}
		sibs.push(e);
	}
	// console.log(getProductName);
	//create product object
	let product = {
		productname: getProductName,
		price: getProductPrice,
		sku: getSKU,
		quantity: getProductQuantity,
	};
	console.log(product);

	//convert product data to JSON for storage
	let stringProduct = JSON.stringify(product);

	console.log(stringProduct);

	/*send product data to session storage */
	if (!sessionStorage.getItem("cart")) {
		//append product JSON object to cart array
		cart.push(stringProduct);
		//cart to JSON
		stringCart = JSON.stringify(cart);
		//create session storage cart item
		sessionStorage.setItem("cart", stringCart);
		addedToCart(getProductName);
		// updateCartTotal();
	} else {
		//get existing cart data from storage and convert back into array
		cart = JSON.parse(sessionStorage.getItem("cart"));
		//append new product JSON object
		cart.push(stringProduct);
		//cart back to JSON
		stringCart = JSON.stringify(cart);
		//overwrite cart data in sessionstorage
		sessionStorage.setItem("cart", stringCart);
		// console.log(addedToCart(getProductName));
		// updateCartTotal();
	}
};

// /* Calculate Cart Total */
// const updateCartTotal = () => {
// 	//init
// 	let total = 0;
// 	let price = 0;
// 	let items = 0;
// 	let productname = "";
// 	let carttable = "";
// 	if (sessionStorage.getItem("cart")) {
// 		//get cart data & parse to array
// 		let cart = JSON.parse(sessionStorage.getItem("cart"));
// 		//get no of items in cart
// 		items = cart.length;
// 		//loop over cart array
// 		for (let i = 0; i < items; i++) {
// 			//convert each JSON product in array back into object
// 			let x = JSON.parse(cart[i]);
// 			//get property value of price
// 			price = parseFloat(x.price.split("$")[1]);
// 			productname = x.productname;
// 			//add price to total
// 			carttable +=
// 				"<tr><td>" +
// 				productname +
// 				"</td><td>$" +
// 				price.toFixed(2) +
// 				"</td></tr>";
// 			total += price;
// 		}
// 	}
// 	//update total on website HTML
// 	// document.getElementById("total").innerHTML = total.toFixed(2);
// 	console.log("Total ", total);
// 	console.log("Carttable ", carttable);
// 	console.log("Items ", items);
// 	// insert saved products to cart table
// 	// document.getElementById("carttable").innerHTML = carttable;
// 	//update items in cart on website HTML
// 	// document.getElementById("itemsquantity").innerHTML = items;
// };

//user feedback on successful add
const addedToCart = (pname) => {
	let message = pname + " was added to the cart";
	let alerts = document.getElementById("alerts");
	alerts.innerHTML = message;
	if (!alerts.classList.contains("message")) {
		alerts.classList.add("message");
	}
};

// /* User Manually empty cart */
// const emptyCart = () => {
// 	//remove cart session storage object & refresh cart totals
// 	if (sessionStorage.getItem("cart")) {
// 		sessionStorage.removeItem("cart");
// 		updateCartTotal();
// 		//clear message and remove class style
// 		let alerts = document.getElementById("alerts");
// 		alerts.innerHTML = "";
// 		if (alerts.classList.contains("message")) {
// 			alerts.classList.remove("message");
// 		}
// 	}
// };

// /* get cart total from session on load */
// updateCartTotal();
