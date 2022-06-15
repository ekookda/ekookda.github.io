<?php
session_start();
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
    $product_name = validasi_input($_POST['product_name']);
    $product_sku = validasi_input($_POST['product_sku']);
    $product_stok = (int) validasi_input($_POST['product_stok']);
    $product_price = validasi_input($_POST['product_price']);
    // $product_image = (file_exists($_FILES['product_image']['name']) || is_uploaded_file($_FILES['product_image']['name'])) ? $_FILES['product_image']['name'] : "";

    // if ($image_name != "") {
    //     // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
    //     $ekstensi_izin = array('png', 'jpg', 'jpeg');
    //     // Memisahkan nama file dengan Ekstensinya
    //     $pisahkan_ekstensi = explode('.', $image_name);
    //     $ekstensi = strtolower(end($pisahkan_ekstensi));
    //     // Nama file yang berada di dalam direktori temporer server
    //     $file_tmp = $_FILES['img_url']['tmp_name'];
    //     // Membuat angka/huruf acak berdasarkan waktu diupload
    //     $image_date = md5(date('Y-m-d h:i:s'));
    //     // Menyatukan angka/huruf acak dengan nama file aslinya
    //     $image_name_new = $image_date . '-' . $image_name;
    //     // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
    //     if (in_array($ekstensi, $ekstensi_izin) === true) {
    //         // Memindahkan File kedalam Folder "FOTO"
    //         move_uploaded_file($file_tmp, 'images/product/main/' . $image_name_new);
    //         $query = "INSERT INTO produk (nama, sku, stok, harga_satuan, img_url) VALUES ('$product_name', '$sku', '$stok', '$harga_satuan', '$image_name_new')";
    //     }
    // } else {
    // $query = "INSERT INTO produk (nama, sku, stok, harga_satuan, img_url) VALUES ('$product_name', '$product_sku', '$product_stok', '$product_price','$product_image')";
    $query = "INSERT INTO produk (nama, sku, stok, harga_satuan) VALUES ('$product_name', '$product_sku', '$product_stok', '$product_price')";
    // }

    if ($db->query($query) === TRUE) {
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
                'message' => "Error: " . $query . "<br>" . $db->error
            )
        );
    }
}

function update_product($db)
{
    if (isset($_POST['product_id'])) {
        $product_id = validasi_input($_POST['product_id']);
        $product_name = validasi_input($_POST['update_product_name']);
        $product_sku = validasi_input($_POST['update_product_sku']);
        $product_stok = validasi_input($_POST['update_product_stok']);
        $product_price = validasi_input($_POST['update_product_price']);
        $product_image = (isset($_FILES['update_product_image']['name']) || $_FILES['update_product_image']['name'] != "") ? $_FILES['update_product_image']['name'] : "";

        if (!is_uploaded_file($product_image) || $product_image == "") { // Jika gambar tidak diupload
            $query = "UPDATE produk SET nama='$product_name', sku='$product_sku', stok='$product_stok', harga_satuan='$product_price' WHERE produk_id='$product_id'";
        } else {
            $query = "UPDATE produk SET nama='$product_name', sku='$product_sku', stok='$product_stok', harga_satuan='$product_price', img_url='$product_image' WHERE produk_id='$product_id'";
        }

        if ($db->query($query) === TRUE) {
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
                    'message' => "Error: " . $query . "<br>" . $db->error
                )
            );
        }
    }
    return false;
}

function delete_product($db)
{
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $query = "DELETE FROM produk WHERE produk_id='$product_id'";
        if ($db->query($query) === TRUE) {
            echo json_encode(
                array(
                    'status' => 1,
                    'message' => 'Delete produk berhasil!'
                )
            );
        } else {
            echo json_encode(
                array(
                    'status' => 0,
                    'message' => "Error: " . $query . "<br>" . $db->error
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

function get_all_product($db)
{
    $query = "SELECT produk_id, nama, sku, stok, harga_satuan, img_url FROM produk ORDER BY produk_id DESC";
    $result = $db->query($query);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['data' => $result_array]);
}

function get_product_by_id($db, $produk_id)
{
    $query = "SELECT produk_id, nama, sku, stok, harga_satuan, img_url FROM produk WHERE produk_id = '$produk_id'";
    $result = $db->query($query);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result_array[0]);
}
