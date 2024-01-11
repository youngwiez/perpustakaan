<?php 
include '../db_connect.php';
session_start();
?>

<?php include 'header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Peminjaman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="pinjam.php">Data Peminjaman</a></li>
            <li class="breadcrumb-item active">Tambah Peminjaman</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">       
        <div class="box box-info">
          <div class="box-header">
            <a href="kembali.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="kembali_act.php" method="post">
              <div class="form-group">
                <label>Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="tgl_pinjam" required="required" placeholder="Masukkan tanggal peminjaman buku">
              </div>
              <div class="form-group">
                <label>Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="tgl_kembali" required="required" placeholder="Masukkan tanggal pengembalian buku">
              </div>
              <div class="form-group">
                <label>Nama Buku</label>
                <select class="form-control" name="id_buku" required="required">
                  <option value=""> - Pilih Buku - </option>
                  <?php
                  $qBuku = "SELECT * FROM buku";
                  $rsBuku = $myConn->query($qBuku);
                  while ($d = $rsBuku->fetch_assoc()) {
                    echo "<option value='".$d['id_buku']."'>".$d['judul_buku']."</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Anggota</label>
                <select class="form-control" name="id_anggota" required="required">
                  <option value=""> - Pilih Anggota - </option>
                  <?php
                  $qAnggota = "SELECT * FROM anggota";
                  $rsAnggota = $myConn->query($qAnggota);
                  while ($d = $rsAnggota->fetch_assoc()) {
                    echo "<option value='".$d['id_anggota']."'>".$d['nama_anggota']."</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Petugas</label>
                <select class="form-control" name="id_petugas" required="required">
                  <option value=""> - Pilih Petugas - </option>
                  <?php
                  $qPetugas = "SELECT * FROM petugas";
                  $rsPetugas = $myConn->query($qPetugas);
                  while ($d = $rsPetugas->fetch_assoc()) {
                    echo "<option value='".$d['id_petugas']."'>".$d['nama_petugas']."</option>";
                  }
                  ?>
                </select>
              </div>
              
              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>