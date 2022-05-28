const phi = Math.PI;
const d = new Date();

// Fungsi keterangan waktu saat akses
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

// Check input sudah terisi atau kosongq\]
const checkInput = (n) => {
	if (n == null || n == "") {
		return false;
	} else {
		return true;
	}
};

// Fungsi menghitung volume kerucut
const volumeKerucut = (r, t) => {
	return (phi * r * r * t) / 3;
};

//Fungsi menghitung luas permukaan kerucut
const luasPermukaanKerucut = (r, s) => {
	return phi * r * s + phi * r * r;
};

// Tombol hitung di klik
const hitung = () => {
	let r = document.getElementById("jari").value;
	let s = document.getElementById("garis_pelukis").value;
	let t = document.getElementById("tinggi").value;

	if (
		// Validasi input sudah terisi atau kosong
		checkInput(r) == false ||
		checkInput(s) == false ||
		checkInput(t) == false
	) {
		alert("Masukkan tidak boleh kosong");
	} else {
		// Mengecek input angka atau bukan
		if (isNaN(r) || isNaN(s) || isNaN(t)) {
			alert("Input tidak valid harus berupa angka");
		} else {
			// Meletakkan hasil perhitungan pada elemen dengan ID
			document.getElementById("hasilVolume").innerHTML =
				volumeKerucut(r, t).toFixed(2) + " m<sup>3</sup>";
			document.getElementById("hasilLuasPermukaan").innerHTML =
				luasPermukaanKerucut(r, s).toFixed(2) + " m<sup>2</sup>";
		}
	}
};
