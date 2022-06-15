<?php
session_start();
include_once 'connection.php';
include_once 'function.php';

$url = isset($_GET['f']) ? $_GET['f'] : "";

if ($url == 'add_transaction') {
    add_transaction($db);
} else if ($url == 'add_detail_transaction') {
    add_detail_transaction($db);
} else {
    header("location: index.php");
}

function add_transaction($db)
{
    // Buat kode transaksi
    $kode_transaksi = "TRX" . date("Ymd") . "-" . rand(10, 100);
    // Masukkan kedalam session
    $_SESSION['kode_transaksi'] = $kode_transaksi;
    // Masukkan ke dalam database
    $sql = "INSERT INTO transaksi (kode_transaksi, tanggal_transaksi, email_pelanggan, status_pembayaran) VALUES ('$kode_transaksi', NOW(), '" . $_SESSION['email'] . "', 'Belum Lunas')";
    if ($db->query($sql) === true) {
        $data = array(
            'status' => 1,
            'message' => 'New record created successfully!'
        );
    } else {
        $data = array(
            'status' => 0,
            'message' => 'Error creating record: ' . $db->error
        );
    }
    echo json_encode($data);
}

function add_detail_transaction($db)
{
    $sql = "INSERT INTO detail_transaksi (kode_transaksi, sku) VALUES ('" . $_SESSION['kode_transaksi'] . "','" . $_POST['nama'] . "')";
    if ($db->query($sql) === TRUE) {
        //echo "New record created successfully";
        $data = array("state" => "1", "notifikasi" => "New record created successfully");
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $data = array("state" => "0", "notifikasi" => "Error creating record: " . $db->error);
    }
    echo json_encode($data);
}
