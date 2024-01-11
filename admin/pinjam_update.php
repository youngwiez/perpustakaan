<?php
include '../db_connect.php';
session_start();

// Mendapatkan nilai dari form
$id_peminjaman = $_POST['id_peminjaman'];
$tgl_kembali = $_POST['tgl_kembali'];
$status = $_POST['status'];

// Mendapatkan data peminjaman berdasarkan ID
$query = "SELECT * FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'";
$result = $myConn->query($query);
$peminjaman = $result->fetch_assoc();

// Menghitung denda jika status peminjaman "Terlambat Dikembalikan"
$denda = 0;
if ($status == 'Terlambat Dikembalikan') {
    // Menghitung selisih hari terlambat
    $tgl_pinjam = $peminjaman['tgl_pinjam'];
    $tgl_kembali_seharusnya = $peminjaman['tgl_kembali'];
    $selisih_hari = intval((strtotime($tgl_kembali) - strtotime($tgl_kembali_seharusnya)) / (60 * 60 * 24));
    
    // Menghitung denda per hari (dalam contoh ini 1000)
    $denda_per_hari = 1000;
    $denda = $selisih_hari * $denda_per_hari;
}

// Update data peminjaman
$update_query = "UPDATE peminjaman SET tgl_kembali = '$tgl_kembali', status = '$status' WHERE id_peminjaman = '$id_peminjaman'";
$myConn->query($update_query);

// Simpan data pengembalian ke tabel pengembalian
$insert_query = "INSERT INTO pengembalian (tgl_pengembalian, denda, id_buku, id_anggota, id_petugas) 
                VALUES ('$tgl_kembali', '$denda', '".$peminjaman['id_buku']."', '".$peminjaman['id_anggota']."', '".$peminjaman['id_petugas']."')";
$myConn->query($insert_query);

// Redirect ke halaman pinjam.php setelah update
header("Location: pinjam.php");
exit();
?>