<?php
include_once 'connection.php';
include_once 'function.php';

$get = isset($_GET['f']) ? $_GET['f'] : "";

if ($get == 'get_all_product') {
    get_all_product($conn);
} else if ($get == 'add_product') {
    add_product($conn);
} else if($get == 'update_product') {
    update_product($conn);
} else if ($get == 'get_product_by_id') {
    get_product_by_id($conn, $_GET['id']);
} else if ($get == 'delete_product') {
    delete_product($conn);
}

function get_all_product($conn) {
    $query = "SELECT * FROM tbl_barang ORDER BY id DESC";
    $result = $conn->query($query);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(array('data'=>$result_array));
}

function add_product($conn) {
    $product_code = validasi_input($_POST['product_code']); // kode barang
    $product_name = validasi_input($_POST['product_name']); // nama barang
    $product_buy = validasi_input($_POST['product_buy']); // harga beli
    $product_sell = validasi_input($_POST['product_sell']); // harga jual
    $product_stok = validasi_input($_POST['product_stok']); // stok
    $product_satuan = validasi_input($_POST['product_satuan']); // satuan

    $query = "INSERT INTO tbl_barang (kode_barang, nama_barang, harga_beli, harga_jual, stok, satuan) VALUES ('$product_code', '$product_name', $product_buy, $product_sell, '$product_stok', '$product_satuan')";

    if ($conn->query($query) === TRUE) {
        echo json_encode(
            array(
                'status' => 1,
                'message' => 'Product has been added successfully!'
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

function get_product_by_id($conn, $id) {
    $query = "SELECT id, kode_barang, nama_barang, harga_beli, harga_jual, stok, satuan FROM tbl_barang WHERE id='$id'";
    $result = $conn->query($query);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result_array[0]);
}

function update_product($conn) {
    $product_id = validasi_input($_POST['product_id']); // ID barang
    $product_code = validasi_input($_POST['update_product_code']); // kode barang
    $product_name = validasi_input($_POST['update_product_name']); // nama barang
    $product_buy = validasi_input($_POST['update_product_buy']); // harga beli
    $product_sell = validasi_input($_POST['update_product_sell']); // harga jual
    $product_stok = validasi_input($_POST['update_product_stok']); // stok
    $product_satuan = validasi_input($_POST['update_product_satuan']); // satuan

    $query = "UPDATE tbl_barang 
                SET 
                    kode_barang='$product_code', nama_barang='$product_name', harga_beli='$product_buy', harga_jual='$product_sell', stok='$product_stok', satuan='$product_satuan'
                WHERE id='$product_id'";
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

function delete_product($conn) {
    if (isset($_POST['product_id'])) {
        $id = validasi_input($_POST['product_id']);
        $query = "DELETE FROM tbl_barang WHERE id='$id'";
        if ($conn->query($query) === TRUE) {
            echo json_encode(
                array(
                    'status' => 1,
                    'message' => 'Hapus produk berhasil!'
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