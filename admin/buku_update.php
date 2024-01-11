<?php 
include '../db_connect.php';

$id_buku = $_POST['id_buku'];
$kode_buku = $_POST['kode_buku'];
$judul_buku = $_POST['judul_buku'];
$penulis_buku = $_POST['penulis_buku'];
$penerbit_buku = $_POST['penerbit_buku'];
$tahun_penerbit = $_POST['tahun_penerbit'];
$stok = $_POST['stok'];

$myConn->query("UPDATE buku SET id_buku='$id_buku', kode_buku='$kode_buku', 
judul_buku='$judul_buku', penulis_buku='$penulis_buku', penerbit_buku='$penerbit_buku',
tahun_penerbit='$tahun_penerbit', stok='$stok'
WHERE id_buku='$id_buku'");

header("location:buku.php");
