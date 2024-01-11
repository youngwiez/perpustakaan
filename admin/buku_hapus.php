<?php 
include '../db_connect.php';

$id = $_GET['id'];

$myConn->query("DELETE from buku where id_buku='$id'");

header("location:buku.php");
