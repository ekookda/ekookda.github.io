<?php
session_start();
include_once dirname(__DIR__, 1) . '/connection.php';
include_once dirname(__DIR__, 1) . '/function.php';

$url = isset($_GET['f']) ? $_GET['f'] : "";

if ($url == 'login') {
    login($db);
    // echo 'login';
} else if ($url == 'signout') {
    signout($db);
    // echo 'signout';
} else {
    echo 'restarting...';
    // header('Location: login.php', true, 301);
}

//function login
function login($db)
{
    $email = validasi_input($_POST['email']);
    $password = validasi_input($_POST['password']);
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $result_array = $result->fetch_assoc();
        if (password_verify($password, $result_array['password'])) {
            // Simpan session untuk nama di dashboard dan check login
            $_SESSION['name'] = $result_array['nama'];
            $_SESSION['is_logged_in'] = true;
            echo json_encode(
                array(
                    'data' => $result_array,
                    'status' => 1,
                    'session' => $_SESSION
                )
            );
        } else {
            echo json_encode(array('messages' => 'Password salah!'));
            // header('Location: ' . base_url() . 'admin/login.php?f=login', true, 301);
        }
    } else {
        echo json_encode(array('messages' => 'Login tidak berhasil. Data tidak ditemukan!'));
    }
}

function signout($db)
{
    session_unset();
    session_destroy();
    header('Location: login.php?f=login', true, 301);
}
