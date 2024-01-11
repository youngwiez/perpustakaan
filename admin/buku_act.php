<?php 
include '../db_connect.php';

$kode_buku = $_POST['kode_buku'];
$judul_buku = $_POST['judul_buku'];
$penulis_buku = $_POST['penulis_buku'];
$penerbit_buku = $_POST['penerbit_buku'];
$tahun_penerbit = $_POST['tahun_penerbit'];
$stok = $_POST['stok'];

$myConn->query("INSERT INTO buku VALUES (NULL,'$kode_buku','$judul_buku','$penulis_buku',
'$penerbit_buku','$tahun_penerbit','$stok')");

header("location:buku.php");