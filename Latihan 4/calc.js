const phi = Math.PI;
const d = new Date();

// Jam saat ini
let h = d.getHours();
const hour = (h) => {
	if (h >= 0 && h <= 11) {
		return "Selamat Pagi";
	} else if (h >= 12 && h <= 15) {
		return "Selamat Siang";
	} else if (h >= 16 && h <= 18) {
		return "Selamat Sore";
	} else if (h >= 19 && h <= 24) {
		return "Selamat Malam";
	} else {
		return "Waktu tidak valid";
	}
};

// Tombol hitung di klik
const hitung = () => {
	if (
		document.getElementById("jari").value === "" ||
		document.getElementById("garis_pelukis").value === "" ||
		document.getElementById("tinggi").value === ""
	) {
		alert("Masukan tidak boleh kosong");
	} else {
		let r = Number(document.getElementById("jari").value);
		let s = Number(document.getElementById("garis_pelukis").value);
		let t = Number(document.getElementById("tinggi").value);
		// console.log(phi);

		volumeKerucut(r, t);
		luasPermukaanKerucut(r, s);
	}
};

// function calculate volume kerucut
const volumeKerucut = (r, t) => {
	let volumeKerucut = (phi * r * r * t) / 3;
	document.getElementById("hasilVolume").innerHTML =
		volumeKerucut.toFixed(2) + " m<sup>3</sup>";
};

//function calculate luas permukaan kerucut
const luasPermukaanKerucut = (r, s) => {
	let luas = phi * r * s + phi * r * r;
	// let luas = phi * r * (r + s);
	document.getElementById("hasilLuasPermukaan").innerHTML =
		luas.toFixed(2) + " m<sup>2</sup>";
};
