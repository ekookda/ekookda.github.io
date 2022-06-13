<?php
include_once dirname(__DIR__, 1) . '/connection.php';
include_once dirname(__DIR__, 1) . '/function.php';

$url = isset($_GET['f']) ? $_GET['f'] : "";

if ($url == 'update_product') {
    update_product($db);
} else if ($url == 'add_product') {
    add_product($db);
} else if ($url == 'get_all_product') {
    get_all_product($db);
} else if ($url == 'get_product_by_id') {
    get_product_by_id($db, $_GET['id']);
} else if ($url == 'delete_product') {
    delete_product($db);
} else {
    header("location: login.php");
}

function add_product($db)
{
    $product_name = validasi_input($_POST['nama']);
    $sku = validasi_input($_POST['sku']);
    $stok = validasi_input($_POST['stok']);
    $harga_satuan = validasi_input($_POST['harga_satuan']);
    $image_name = $_FILES['img_url']['name'];

    if ($image_name != "") {
        // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
        $ekstensi_izin = array('png', 'jpg', 'jpeg');
        // Memisahkan nama file dengan Ekstensinya
        $pisahkan_ekstensi = explode('.', $image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        // Nama file yang berada di dalam direktori temporer server
        $file_tmp = $_FILES['img_url']['tmp_name'];
        // Membuat angka/huruf acak berdasarkan waktu diupload
        $image_date = md5(date('Y-m-d h:i:s'));
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $image_name_new = $image_date . '-' . $image_name;
        // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
        if (in_array($ekstensi, $ekstensi_izin) === true) {
            // Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, 'images/product/main/' . $image_name_new);
            $query = "INSERT INTO produk (nama, sku, stok, harga_satuan, img_url) VALUES ('$product_name', '$sku', '$stok', '$harga_satuan', '$image_name_new')";
        }
    } else {
        $query = "INSERT INTO produk (nama, sku, stok, harga_satuan) VALUES ('$product_name', '$sku', '$stok', '$harga_satuan')";
    }

    if ($db->query($query) === TRUE) {
        $data = array(
            'status' => 1,
            'message' => 'Insert produk berhasil!'
        );
        echo json_encode($data);
    } else {
        echo json_encode(
            array(
                'status' => 0,
                'message' => "Error: " . $query . "<br>" . $db->error
            )
        );
    }
}

function update_product($db)
{
    $produk_id = validasi_input($_POST['produk_id']);
    $product_name = validasi_input($_POST['nama']);
    $sku = validasi_input($_POST['sku']);
    $stok = validasi_input($_POST['stok']);
    $harga_satuan = validasi_input($_POST['harga_satuan']);
    $image_name = $_FILES['img_url']['name'];

    if (!is_uploaded_file($image_name) || $image_name == "") { // Jika gambar tidak diupload
        $sql = "UPDATE produk SET nama='$product_name', sku='$sku', stok='$stok', harga_satuan='$harga_satuan' WHERE produk_id='$produk_id'";
    } else {
        $sql = "UPDATE produk SET nama='$product_name', sku='$sku', stok='$stok', harga_satuan='$harga_satuan', img_url='$image_name' WHERE produk_id='$produk_id'";
    }

    if ($db->query($sql) === TRUE) {
        echo "Record has been updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function delete_product($db)
{
    $produk_id = $_POST['produk_id'];
    $sql = "DELETE FROM produk WHERE produk_id='$produk_id'";
    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: products.php');
    } else {
        echo "Error deleting record: " . $db->error;
    }
}

function get_all_product($db)
{
    $sql = "SELECT produk_id, nama, sku, stok, harga_satuan, img_url FROM produk ORDER BY produk_id DESC";
    $result = $db->query($sql);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['data' => $result_array]);
}

function get_product_by_id($db, $produk_id)
{
    $sql = "SELECT produk_id, nama, sku, stok, harga_satuan, img_url FROM produk WHERE produk_id = '$produk_id'";
    $result = $db->query($sql);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result_array[0]);
}
