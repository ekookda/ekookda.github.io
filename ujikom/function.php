<?php
date_default_timezone_set("ASIA/JAKARTA");

if (!function_exists('validasi_input')) {
    // Fungsi untuk menvalidasi seluruh Input
    function validasi_input($input = false)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
}
$validasi_input = validasi_input();
