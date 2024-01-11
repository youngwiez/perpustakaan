<?php 
include '../db_connect.php';

$kode_anggota = $_POST['kode_anggota'];
$nama_anggota = $_POST['nama_anggota'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$jk_anggota = $_POST['jk_anggota'];
$kelas_anggota = $_POST['kelas_anggota'];
$jurusan_anggota = $_POST['jurusan_anggota'];
$no_telp_anggota = $_POST['no_telp_anggota'];
$alamat_anggota = $_POST['alamat_anggota'];

$myConn->query("INSERT INTO user VALUES (NULL,'$nama_anggota','$username','$password','$level')");

// Ambil ID pengguna yang baru ditambahkan
$id_pengguna = $myConn->insert_id;

// Tambahkan data anggota berdasarkan ID pengguna
$myConn->query("INSERT INTO anggota VALUES (NULL,'$kode_anggota','$nama_anggota','$jk_anggota',
'$kelas_anggota','$jurusan_anggota','$no_telp_anggota','$alamat_anggota')");

header("location:anggota.php");