<?php
include_once 'connection.php';
include_once 'function.php';

$r = isset($_GET['f']) ? $_GET['f'] : '';

if ($r == 'login') {
    login($db);
} else if ($r == 'logout') {
    logout($db);
} elseif ($r == 'register') {
    register($db);
} else {
    header("location: index.php");
}

function register($db)
{
    $nama = validasi_input($_POST['fname']);
    $email = validasi_input($_POST['femail']);
    $fpass1 = validasi_input($_POST['fpass1']);
    $fpass2 = validasi_input($_POST['fpass2']);
    $tgl_lahir = validasi_input($_POST['fTglLahir']);
    $alamat = validasi_input($_POST['falamat']);
    $kodepos = validasi_input($_POST['fkodepos']);

    if ($fpass1 == $fpass2) {
        $password = password_hash($fpass1, PASSWORD_DEFAULT);
        $query = "INSERT INTO pelanggan (nama, email, password, tanggal_lahir, alamat, kodepos) 
                VALUES (
                    '" . $nama . "',
                    '" . $email . "',
                    '" . $password . "',
                    '" . $tgl_lahir . "',
                    '" . $alamat . "',
                    '" . $kodepos . "'
                )";
        if ($db->query($query) === TRUE) {
            $data = array(
                'status' => 1,
                'message' => 'Register berhasil. Silahkan login!'
            );
            echo json_encode($data);
        } else {
            echo json_encode(array('status' => 0, 'message' => "Error: " . $query . "<br>" . $db->error));
        }
    } else {
        echo json_encode(array('status' => 0, 'message' => 'Password tidak sama'));
    }
}

//function login
function login($db)
{
    $email = validasi_input($_POST['email']);
    $password = validasi_input($_POST['password']);
    $sql = "SELECT * FROM pelanggan WHERE email = '$email'";
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
                    'session' => $_SESSION,
                    'status' => 1,
                    'message' => 'Login berhasil!'
                )
            );
        } else {
            echo json_encode(array('message' => 'Password salah!'));
        }
    } else {
        echo json_encode(array('message' => 'Login tidak berhasil. Data tidak ditemukan!'));
    }
}

function logout($db)
{
    session_unset();
    session_destroy();
    header('Location: index.php');
}
