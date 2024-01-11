<?php 
include '../db_connect.php';

$id = $_GET['id'];

$myConn->query("DELETE from anggota where id_anggota='$id'");

header("location:anggota.php");
