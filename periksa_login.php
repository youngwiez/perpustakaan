<?php 
// menghubungkan dengan koneksi
include 'db_connect.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$rsUser = $myConn->query("SELECT * FROM user WHERE username='$username' AND password='$password'");

$cek = $rsUser->num_rows;

if($cek > 0){
	session_start();
	$data = $rsUser->fetch_assoc();

	//echo var_dump($data);
	//die("Stop");

	$_SESSION['id'] = $data['id'];
	$_SESSION['nama_anggota'] = $data['nama_anggota'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['level'] = $data['level'];

	//die("Stop");

	if($data['level'] == "admin"){
		header("location:admin/");
	} else if($data['level'] == "anggota"){
		header("location:anggota/");
	} else{
		header("location:index.php?alert=gagal");
	}
} else{
	header("location:index.php?alert=gagal");
}
