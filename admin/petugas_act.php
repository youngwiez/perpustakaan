<?php 
include '../db_connect.php';

$nama_petugas = $_POST['nama_petugas'];
$jabatan_petugas = $_POST['jabatan_petugas'];
$no_telp_petugas = $_POST['no_telp_petugas'];
$alamat_petugas = $_POST['alamat_petugas'];

$myConn->query("INSERT INTO petugas VALUES (NULL, '$nama_petugas','$jabatan_petugas', 
'$no_telp_petugas','$alamat_petugas')");

header("location:petugas.php");