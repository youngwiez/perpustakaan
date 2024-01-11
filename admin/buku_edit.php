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
          <h1>Data Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="buku.php">Data Buku</a></li>
            <li class="breadcrumb-item active">Edit Data Buku</li>
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
            <a href="buku.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
        <div class="box-body">
          <form action="buku_update.php" method="post" enctype="multipart/form-data">
            <?php 
              $id = $_GET['id'];              
              $data = $myConn->query("SELECT * FROM buku WHERE id_buku='$id'");
              while($d = $data->fetch_array()){
            ?>
            <div class="form-group">
              <label>Kode</label>
              <input type="number" class="form-control" name="kode_buku" value="<?php echo $d['kode_buku'] ?>" required="required">
              <input type="hidden" class="form-control" name="id_buku" value="<?php echo $d['id_buku'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Judul</label>
              <input type="text" class="form-control" name="judul_buku" value="<?php echo $d['judul_buku'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Penulis</label>
              <input type="text" class="form-control" name="penulis_buku" value="<?php echo $d['penulis_buku'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Penerbit</label>
              <input type="text" class="form-control" name="penerbit_buku" value="<?php echo $d['penerbit_buku'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Tahun Terbit</label>
              <input type="number" class="form-control" name="tahun_penerbit" value="<?php echo $d['tahun_penerbit'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Stok</label>
              <input type="text" class="form-control" name="stok" value="<?php echo $d['stok'] ?>" required="required">
            </div>
            
            <div class="form-group">
              <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
            </div>
            <?php
              }
            ?>
          </form>
        </div>
      </section>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>