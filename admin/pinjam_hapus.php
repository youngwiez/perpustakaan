<?php 
include '../db_connect.php';

$id = $_GET['id'];

$myConn->query("DELETE from peminjaman where id_peminjaman='$id'");

header("location:pinjam.php");
