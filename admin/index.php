<?php 
  include '../db_connect.php';
  session_start();
?>

<?php include 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Home</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php 
                $buku = $myConn->query("SELECT * FROM buku");
              ?>
              <h3><?php echo $buku->num_rows; ?></h3>
              <p>Data Buku</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-book"></i>
            </div>
            <a href="buku.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php 
                $anggota = $myConn->query("SELECT * FROM anggota");
              ?>
              <h3><?php echo $anggota->num_rows; ?></h3>
              <p>Data Anggota</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-user"></i>
            </div>
            <a href="anggota.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php 
                $rak = $myConn->query("SELECT * FROM rak");
              ?>
              <h3><?php echo $rak->num_rows; ?></h3>
              <p>Data Rak Buku</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-clipboard"></i>
            </div>
            <a href="rak.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php 
                $petugas = $myConn->query("SELECT * FROM petugas");
              ?>
              <h3><?php echo $petugas->num_rows; ?></h3>
              <p>Data Petugas</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-medal"></i>
            </div>
            <a href="petugas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <?php 
                $pinjam = $myConn->query("SELECT * FROM peminjaman");
              ?>
              <h3><?php echo $pinjam->num_rows; ?></h3>
              <p>Peminjaman Buku</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-upload"></i>
            </div>
            <a href="pinjam.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-pink">
            <div class="inner">
              <?php 
                $kembali = $myConn->query("SELECT * FROM pengembalian");
              ?>
              <h3><?php echo $kembali->num_rows; ?></h3>
              <p>Pengembalian Buku</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-download"></i>
            </div>
            <a href="kembali.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">    
        <section class="col-lg-7">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Detail Login</h3>
            </div>
            <div class="box-body">
              <table class="table table-striped projects">
                <tr>
                  <th width="30%">Nama</th>
                  <td><?php echo $_SESSION['nama_anggota']; ?></td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td><?php echo $_SESSION['username']; ?></td>
                </tr>
                <tr>
                  <th>Level Hak Akses</th>
                  <td>
                    <span class="label label-success text-uppercase"><?php echo $_SESSION['level']; ?></span>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php'; ?>