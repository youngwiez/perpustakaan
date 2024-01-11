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
          <h1>Data Petugas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="petugas.php">Data Petugas</a></li>
            <li class="breadcrumb-item active">Edit Data Petugas</li>
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
            <a href="petugas.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
        <div class="box-body">
          <form action="petugas_update.php" method="post" enctype="multipart/form-data">
            <?php 
              $id = $_GET['id'];              
              $data = $myConn->query("SELECT * FROM petugas WHERE id_petugas='$id'");
              while($d = $data->fetch_array()){
            ?>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama_petugas" value="<?php echo $d['nama_petugas'] ?>" required="required">
              <input type="hidden" class="form-control" name="id_petugas" value="<?php echo $d['id_petugas'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <input type="text" class="form-control" name="jabatan_petugas" value="<?php echo $d['jabatan_petugas'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Nomor Telepon</label>
              <input type="tel" class="form-control" name="no_telp_petugas" value="<?php echo $d['no_telp_petugas'] ?>" required="required" maxlength="13">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat_petugas" value="<?php echo $d['alamat_petugas'] ?>" required="required">
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