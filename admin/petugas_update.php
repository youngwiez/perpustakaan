<?php 
include '../db_connect.php';

$id_petugas = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$jabatan_petugas = $_POST['jabatan_petugas'];
$no_telp_petugas = $_POST['no_telp_petugas'];
$alamat_petugas = $_POST['alamat_petugas'];

$myConn->query("UPDATE petugas SET id_petugas='$id_petugas', nama_petugas='$nama_petugas', 
jabatan_petugas='$jabatan_petugas', no_telp_petugas='$no_telp_petugas', alamat_petugas='$alamat_petugas'
WHERE id_petugas='$id_petugas'");

header("location:petugas.php");
