<?php 
include '../db_connect.php';

$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$id_buku = $_POST['id_buku'];
$id_anggota = $_POST['id_anggota'];
$id_petugas = $_POST['id_petugas'];
$status = $_POST['status'];

$myConn->query("INSERT INTO peminjaman VALUES 
(NULL, '$tgl_pinjam', '$tgl_kembali', '$id_buku', '$id_anggota', '$id_petugas', '$status')");

header("location: pinjam.php");