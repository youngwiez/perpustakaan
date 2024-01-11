<?php 
include '../db_connect.php';

$id = $_GET['id'];

$myConn->query("DELETE from petugas where id_petugas='$id'");

header("location:petugas.php");
