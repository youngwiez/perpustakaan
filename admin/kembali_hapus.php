<?php 
include '../db_connect.php';

$id = $_GET['id'];

$myConn->query("DELETE from pengembalian where id_pengembalian='$id'");

header("location:kembali.php");
