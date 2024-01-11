<?php 
include '../db_connect.php';

$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$id_buku = $_POST['id_buku'];
$id_anggota = $_POST['id_anggota'];
$id_petugas = $_POST['id_petugas'];

// Menghitung selisih hari antara tanggal kembali dengan tanggal pinjam
$selisih_hari = (strtotime($tgl_kembali) - strtotime($tgl_pinjam)) / (60 * 60 * 24);

// Menghitung jumlah denda
$denda = 0;
if ($selisih_hari > 14) {
  $denda = ($selisih_hari - 14) * 1000;
}

$myConn->query("INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, id_buku, id_anggota, id_petugas, denda) VALUES ('$tgl_pinjam', '$tgl_kembali', '$id_buku', '$id_anggota', '$id_petugas', '$denda')");

header("location:kembali.php");