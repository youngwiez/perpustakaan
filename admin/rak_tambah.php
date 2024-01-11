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
          <h1>Tambah Rak</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="rak.php">Data Rak</a></li>
            <li class="breadcrumb-item active">Tambah Rak</li>
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
            <a href="rak.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="rak_act.php" method="post">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_rak" required="required" placeholder="Masukkan nama rak">
              </div>
              <div class="form-group">
                <label>Lokasi</label>
                <input type="text" class="form-control" name="lokasi_rak" required="required" placeholder="Masukkan lokasi rak">
              </div>
              <div class="form-group">
                <label>Nama Buku</label>
                <select class="form-control" name="id_buku" required="required">
                  <option value=""> - Pilih Buku - </option>
                  <?php 
                  $buku = $myConn->query("SELECT * from buku");
                  while($b=mysqli_fetch_array($buku)){
                  ?>
                  <option value="<?php echo $b['id_buku']; ?>"><?php echo $b['judul_buku']; ?></option>
                  <?php 
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