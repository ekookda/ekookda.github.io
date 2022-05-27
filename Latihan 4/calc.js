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
		console.log(phi);

		console.log("LuasPermukaanKerucut = " + luasPermukaanKerucut(r, s));
		console.log("VolumeKerucut = " + volumeKerucut(r, t));
	}
};

// function calculate volume kerucut
const volumeKerucut = (r, t) => {
	return (phi * r * r * t) / 3;
};

//function calculate luas permukaan kerucut
const luasPermukaanKerucut = (r, s) => {
	// return phi * r * s + phi * r * r;
	return phi * r * (r + s);
};
