<?php 
include '../db_connect.php';

$id = $_GET['id'];

$myConn->query("DELETE from anggota where id_anggota='$id'");

$myConn->query("DELETE from user where id='$id'");

header("location:anggota.php");