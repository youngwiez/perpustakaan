<?php 
include '../db_connect.php';

$id_rak = $_POST['id_rak'];
$nama_rak = $_POST['nama_rak'];
$lokasi_rak = $_POST['lokasi_rak'];
$id_buku = $_POST['id_buku'];

$myConn->query("UPDATE rak SET nama_rak='$nama_rak', lokasi_rak='$lokasi_rak', id_buku='$id_buku' WHERE id_rak='$id_rak'");

header("location:rak.php");
?>