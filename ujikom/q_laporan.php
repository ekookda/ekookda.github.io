<?php
include_once 'connection.php';

$get = isset($_GET['f']) ? $_GET['f'] : "";

if ($get == 'get_laporan') {
    get_laporan($conn);
} 

function get_laporan($conn)
{
    $query = "SELECT kode_barang, nama_barang, harga_jual, SUM(jumlah_barang) AS JumlahPenjualan, tbl_barang.satuan, SUM(sub_total) AS TotalPenjualan 
                FROM tbl_penjualan 
                LEFT JOIN tbl_detail_penjualan 
                USING (no_penjualan) 
                LEFT JOIN tbl_barang 
                USING (nama_barang) 
                GROUP BY kode_barang";
    $result = $conn->query($query);
    $result_array = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(array('data' => $result_array));
}
