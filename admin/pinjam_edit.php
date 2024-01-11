<?php 
  include '../db_connect.php';
  session_start();
?>

<?php include 'header.php'; 
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Peminjaman Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="pinjam.php">Data Peminjaman Buku</a></li>
            <li class="breadcrumb-item active">Edit Peminjaman Buku</li>
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
            <a href="pinjam.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
        <div class="box-body">
          <form action="pinjam_update.php" method="post" enctype="multipart/form-data">
            <?php 
              $id = $_GET['id'];              
              $data = $myConn->query("SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
              while($d = $data->fetch_array()){
            ?>
            <div class="form-group">
              <label>Tanggal Peminjaman</label>
              <input type="date" class="form-control" name="tgl_pinjam" value="<?php echo $d['tgl_pinjam'] ?>" required="required" readonly>
              <input type="hidden" class="form-control" name="id_peminjaman" value="<?php echo $d['id_peminjaman'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Tanggal Pengembalian</label>
              <input type="date" class="form-control" name="tgl_kembali" value="<?= $today ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status" required="required">
                <option value=""> - Pilih Status - </option>
                <option <?php if($d['status'] == "Dikembalikan"){echo "selected='selected'";} ?> value="Dikembalikan"> Dikembalikan </option>
                <option <?php if($d['status'] == "Belum Dikembalikan"){echo "selected='selected'";} ?> value="Belum Dikembalikan"> Belum Dikembalikan </option>
                <option <?php if($d['status'] == "Terlambat Dikembalikan"){echo "selected='selected'";} ?> value="Terlambat Dikembalikan"> Terlambat Dikembalikan </option>
              </select>
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