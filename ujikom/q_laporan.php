<?php
include_once 'connection.php';

$get = isset($_GET['f']) ? $_GET['f'] : "";

if ($get == 'get_laporan') {
    get_laporan($conn);
} 

function get_laporan($conn){
    
}
