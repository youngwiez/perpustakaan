<?php 
include '../db_connect.php';

$nama_rak = $_POST['nama_rak'];
$lokasi_rak = $_POST['lokasi_rak'];
$id_buku = $_POST['id_buku'];

$myConn->query("INSERT INTO rak (nama_rak, lokasi_rak, id_buku) VALUES ('$nama_rak', '$lokasi_rak', '$id_buku')");

header("location:rak.php");