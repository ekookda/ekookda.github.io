<?php
include_once dirname(__DIR__, 1) . '/connection.php';
include_once dirname(__DIR__, 1) . '/function.php';

$url = isset($_GET['f']) ? $_GET['f'] : "";

if ($url == 'update_customer') {
    update_customer($db);
} else if ($url == 'get_all_product') {
    get_all_product($db);
} else if ($url == 'get_product_by_id') {
    get_product_by_id($db, $_GET['id']);
} else if ($url == 'delete_product') {
    delete_product($db);
}

function update_customer($db)
{
    $id = validasi_input($_POST['produk_id']);
    $nama_produk = validasi_input($_POST['fproductname']);
    $sku = validasi_input($_POST['fsku']);
    $stok = validasi_input($_POST['fTglLahir']);
    $harga_satuan = validasi_input($_POST['harga_satuan']);
    $img_url = validasi_input($_POST['fimage']);

    $sql = "UPDATE produk SET nama='$nama_produk', sku='$sku', stok='$stok', img_url='$img_url' harga_satuan='$harga_satuan' WHERE produk_id='$id'";

    if ($db->query($sql) === TRUE) {
        echo "Record has been updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function delete_product($db)
{
    $id = $_POST['produk_id'];
    $sql = "DELETE FROM produk WHERE produk_id='$id'";
    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $db->error;
    }
}

function get_all_product($db)
{
    $sql = "SELECT produk_id, nama, sku, harga_satuan, img_url FROM produk ORDER BY produk_id DESC";
    $result = $db->query($sql);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['data' => $result_array]);
}

function get_product_by_id($db, $id)
{
    $sql = "SELECT produk_id, nama, sku, harga_satuan, img_url FROM produk WHERE produk_id = '$id'";
    $result = $db->query($sql);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result_array[0]);
}
