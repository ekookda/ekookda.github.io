<?php
include_once '../connection.php';

$url = $_GET['f'];

if ($url == 'login') {
    login($db);
} else if ($url == 'getAllCustomers') {
    getAllCustomers($db);
}

function login($db)
{
}

function getAllCustomers($db)
{
    $sql = "SELECT * FROM pelanggan ORDER BY pelanggan_id DESC";
    $result = $db->query($sql);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['data' => $result_array]);
}
