<?php
date_default_timezone_set("ASIA/JAKARTA");
include_once 'connection.php';

$url = $_GET['f'];

if ($url == 'register') {
    registerCustomer($db);
} else if ($url == 'update') {
    # code...
} else if ($url == 'delete') {
    # code...
} else if ($url == 'getAllCustomer') {
    # code
} else if ($url == 'getCustomerById') {
    # code...
} else {
    header("location: index.php", true, 301);
    exit();
}

// function register customer
function registerCustomer($db)
{
    $query = "INSERT INTO pelanggan (nama, email, password, tanggal_lahir, alamat, kodepos) 
                VALUES (
                    '" . $_POST['fname'] . "',
                    '" . $_POST['femail'] . "',
                    '" . $_POST['fpass1'] . "',
                    '" . $_POST['fTglLahir'] . "',
                    '" . $_POST['falamat'] . "',
                    '" . $_POST['fkodepos'] . "'
                )";
    if ($db->query($query) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
}
