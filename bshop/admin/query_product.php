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
    $product_name = validasi_input($_POST['fProductName']);
    $sku = validasi_input($_POST['fsku']);
    $stok = validasi_input($_POST['fStok']);
    $harga_satuan = validasi_input($_POST['fHargaSatuan']);
    $image_url = $_POST['fImageProduct'];

    $query = "INSERT INTO produk (product_name, sku, stok, harga_satuan, image_url) VALUES ('$product_name', '$sku', '$stok', '$harga_satuan', '$image_url')";

    if ($db->query($query) === TRUE) {
        $data = array(
            'status' => 1,
            'message' => 'Register berhasil. Silahkan login!'
        );
        echo json_encode($data);
    } else {
        echo json_encode(array('status' => 0, 'message' => "Error: " . $query . "<br>" . $db->error));
    }
}

function update_product($db)
{
    $produk_id = validasi_input($_POST['produk_id']);
    $product_name = validasi_input($_POST['fProductName']);
    $sku = validasi_input($_POST['fsku']);
    $stok = validasi_input($_POST['fStok']);
    $harga_satuan = validasi_input($_POST['fHargaSatuan']);
    $image_url = $_POST['fImageProduct'];

    $sql = "UPDATE produk SET nama='$product_name', sku='$sku', stok='$stok', harga_satuan='$harga_satuan', img_url='$image_url' WHERE produk_id='$produk_id'";

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
    } else {
        echo "Error deleting record: " . $db->error;
    }
}

function get_all_product($db)
{
    $sql = "SELECT produk_id, nama, sku, stok, harga_satuan, img_url FROM produk ORDER BY produk_id DESC";
    $result = $db->query($sql);
    $result_array = $result->fetch_assoc();
    echo json_encode(['data' => $result_array]);
}

function get_product_by_id($db, $produk_id)
{
    $sql = "SELECT produk_id, nama, sku, stok, harga_satuan, img_url FROM produk WHERE produk_id = '$produk_id'";
    $result = $db->query($sql);
    $result_array = $result->fetch_assoc();
    echo json_encode($result_array[0]);
}
