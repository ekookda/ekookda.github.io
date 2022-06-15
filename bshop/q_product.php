<?php
session_start();
include_once 'connection.php';
include_once 'function.php';

$url = isset($_GET['f']) ? $_GET['f'] : "";

if ($url == 'get_all_product') {
    get_all_product($db);
// } else if ($url == 'get_product') {
    // get_product($db);
} else {
    header("location: index.php");
}

function get_all_product($db)
{
    $sql = "SELECT produk_id, nama, sku, stok, harga_satuan, img_url FROM produk ORDER BY produk_id DESC";
    $result = $db->query($sql);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result_array);
}

// function get_product($db)
// {
//     $sql = "SELECT produk_id, nama, sku, stok, harga_satuan, img_url FROM produk ORDER BY produk_id DESC";
//     $result = $db->query($sql);
//     $result_array = $result->fetch_all(MYSQLI_ASSOC);
//     echo json_encode($result_array);
// }
