<?php 
include '../db_connect.php';

$id_anggota = $_POST['id_anggota'];
$kode_anggota = $_POST['kode_anggota'];
$nama_anggota = $_POST['nama_anggota'];
$jk_anggota = $_POST['jk_anggota'];
$kelas_anggota = $_POST['kelas_anggota'];
$jurusan_anggota = $_POST['jurusan_anggota'];
$no_telp_anggota = $_POST['no_telp_anggota'];
$alamat_anggota = $_POST['alamat_anggota'];

$myConn->query("UPDATE anggota SET id_anggota='$id_anggota', kode_anggota='$kode_anggota', 
nama_anggota='$nama_anggota', jk_anggota='$jk_anggota', kelas_anggota='$kelas_anggota',
jurusan_anggota='$jurusan_anggota', no_telp_anggota='$no_telp_anggota', alamat_anggota='$alamat_anggota'
WHERE id_anggota='$id_anggota'");

header("location:anggota.php");
