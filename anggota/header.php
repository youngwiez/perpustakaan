<?php 
  include '../db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stembayo Library</title>
    <link rel="shortcut icon" href="../dist/img/logoweb.png">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>
          </li>
        </ul>
      </nav>
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
          <img src="../dist/img/logoweb.png" alt="Logo " class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Stembayo Library</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <?php 
                  $id_user = $_SESSION['id'];
                  $profil = $myConn->query("SELECT * FROM user WHERE id='$id_user'");
                  $profil = $profil->fetch_assoc();
                ?>
                <img src="../dist/img/user.png" class="img-circle">
              </div>
              <div class="info">
                <p class="d-block" style="color:white;"><?php echo $_SESSION['nama_anggota']; ?></p>
                <a href="#" class="d-block"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="data_buku.php" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Data Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="anggota.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Data Anda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="buku.php" class="nav-link">
                  <i class="nav-icon fas fa-upload"></i>
                  <p>Peminjaman Buku Anda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kembali.php" class="nav-link">
                  <i class="nav-icon fas fa-download"></i>
                  <p>Pengembalian Buku Anda</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>