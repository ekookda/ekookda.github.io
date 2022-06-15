<?php
include_once 'connection.php';
include_once 'function.php';

$get = isset($_GET['f']) ? $_GET['f'] : "";

if ($get == 'get_all_penjualan') {
    get_all_penjualan($conn);
} else if ($get == 'add_penjualan') {
    add_penjualan($conn);
} else if($get == 'update_penjualan') {
    update_penjualan($conn);
} else if ($get == 'get_penjualan_by_id') {
    get_penjualan_by_id($conn, $_GET['id']);
} else if ($get == 'delete_penjualan') {
    delete_penjualan($conn);
}

function get_all_penjualan($conn) {
    $query = "SELECT * FROM tbl_penjualan ORDER BY id DESC";
    $result = $conn->query($query);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(array('data'=>$result_array));
}

function add_penjualan($conn) {
    $penjualan_number = validasi_input($_POST['penjualan_number']); // nomor penjualan
    $cashier_name = validasi_input($_POST['cashier_name']); // nama kasir
    $tgl_penjualan = validasi_input($_POST['tgl_penjualan']); // Tanggal Penjualan
    $jam_penjualan = validasi_input($_POST['jam_penjualan']); // Jam Penjualan
    $total_penjualan = validasi_input($_POST['total_penjualan']); // Total Penjualan

    $query = "INSERT INTO tbl_penjualan (no_penjualan, nama_kasir, tgl_penjualan, jam_penjualan,total) VALUES ('$penjualan_number', '$cashier_name', '$tgl_penjualan', '$jam_penjualan', '$total_penjualan')";

    if ($conn->query($query) === TRUE) {
        echo json_encode(
            array(
                'status' => 1,
                'message' => 'Penjualan has been added successfully!'
            )
        );
    } else {
        echo json_encode(
            array(
                'status' => 0,
                'message' => "Error: " . $query . "<br>" . $conn->error
            )
        );
    }
}

function get_penjualan_by_id($conn, $id) {
    $query = "SELECT id, kno_penjualan, nama_kasir, tgl_penjualan, jam_penjualan,total FROM tbl_penjualan WHERE id='$id'";
    $result = $conn->query($query);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result_array[0]);
}

function update_penjualan($conn) {
    $penjualan_id = validasi_input($_POST['penjualan_id']); // ID barang
    $penjualan_code = validasi_input($_POST['update_penjualan_code']); // kode barang
    $penjualan_name = validasi_input($_POST['update_penjualan_name']); // nama barang
    $penjualan_buy = validasi_input($_POST['update_penjualan_buy']); // harga beli
    $penjualan_sell = validasi_input($_POST['update_penjualan_sell']); // harga jual
    $penjualan_stok = validasi_input($_POST['update_penjualan_stok']); // stok
    $penjualan_satuan = validasi_input($_POST['update_penjualan_satuan']); // satuan

    $query = "UPDATE tbl_penjualan
                SET 
                    kode_barang='$penjualan_code', nama_barang='$penjualan_name', harga_beli='$penjualan_buy', harga_jual='$penjualan_sell', stok='$penjualan_stok', satuan='$penjualan_satuan'
                WHERE id='$penjualan_id'";
    if($conn->query($query) === TRUE) {
        echo json_encode(
            array(
                'status' => 1,
                'message' => 'Record has been updated successfully!'
            )
        );
    } else {
        echo json_encode(
            array(
                'status' => 0,
                'message' => "Error: " . $query . "<br>" . $conn->error
            )
        );
    }
}

function delete_penjualan($conn) {
    if (isset($_POST['penjualan_id'])) {
        $id = validasi_input($_POST['penjualan_id']);
        $query = "DELETE FROM tbl_penjualan WHERE id='$id'";
        if ($conn->query($query) === TRUE) {
            echo json_encode(
                array(
                    'status' => 1,
                    'message' => 'Penjualan berhasil dihapus!'
                )
            );
        } else {
            echo json_encode(
                array(
                    'status' => 0,
                    'message' => "Error: " . $query . "<br>" . $conn->error
                )
            );
        }
    } else {
        echo json_encode(
            array(
                'status' => 0,
                'message' => "Product ID not found!"
            )
        );
    }
}