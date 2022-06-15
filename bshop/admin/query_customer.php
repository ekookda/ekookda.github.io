<?php
include_once dirname(__DIR__, 1) . '/connection.php';
include_once dirname(__DIR__, 1) . '/function.php';

$url = isset($_GET['f']) ? $_GET['f'] : "";

if ($url == 'updateCustomer') {
    updateCustomer($db);
} else if ($url == 'getAllCustomers') {
    getAllCustomers($db);
} else if ($url == 'getCustomerById') {
    getCustomerById($db, $_GET['id']);
} else if ($url == 'deleteCustomer') {
    deleteCustomer($db);
}

function updateCustomer($db)
{
    $id = validasi_input($_POST['pelanggan_id']);
    $nama = validasi_input($_POST['fname']);
    $email = validasi_input($_POST['femail']);
    $tanggal_lahir = validasi_input($_POST['fTglLahir']);
    $alamat = validasi_input($_POST['falamat']);

    $sql = "UPDATE pelanggan SET nama='$nama', email='$email', tanggal_lahir='$tanggal_lahir', alamat='$alamat' WHERE pelanggan_id='$id'";

    if ($db->query($sql) === TRUE) {
        echo "Record has been updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

function deleteCustomer($db)
{
    $id = $_POST['pelanggan_id'];
    $sql = "DELETE FROM pelanggan WHERE pelanggan_id='$id'";
    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $db->error;
    }
}

function getAllCustomers($db)
{
    $sql = "SELECT pelanggan_id, nama, tanggal_lahir, email, alamat FROM pelanggan ORDER BY pelanggan_id DESC";
    $result = $db->query($sql);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['data' => $result_array]);
}

function getCustomerById($db, $id)
{
    $sql = "SELECT pelanggan_id, nama, tanggal_lahir, email, alamat FROM pelanggan WHERE pelanggan_id = '$id'";
    $result = $db->query($sql);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result_array[0]);
}
