<?php 
include '../db_connect.php';
session_start();

$id_anggota = $_SESSION['id'];

include 'header.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Data Anda</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Edit Data Anda</li>
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
            <a href="anggota.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
        <div class="box-body">
          <?php 
            $data = $myConn->query("SELECT * FROM anggota WHERE id_anggota='$id_anggota'");
            while($d = $data->fetch_array()){
          ?>
          <form action="anggota_update.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Kode</label>
              <input type="number" class="form-control" name="kode_anggota" value="<?php echo $d['kode_anggota'] ?>" required="required">
              <input type="hidden" class="form-control" name="id_anggota" value="<?php echo $d['id_anggota'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama_anggota" value="<?php echo $d['nama_anggota'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="jk_anggota" required="required">
                <option value=""> - Pilih Jenis Kelamin - </option>
                <option <?php if($d['jk_anggota'] == "L"){echo "selected='selected'";} ?> value="L"> Laki-laki </option>
                <option <?php if($d['jk_anggota'] == "P"){echo "selected='selected'";} ?> value="P"> Perempuan </option>
              </select>
            </div>
            <div class="form-group">
              <label>Kelas</label>
              <select class="form-control" name="kelas_anggota" required="required">
                <option value=""> - Pilih Kelas - </option>
                <option <?php if($d['kelas_anggota'] == "10"){echo "selected='selected'";} ?> value="10"> 10 </option>
                <option <?php if($d['kelas_anggota'] == "11"){echo "selected='selected'";} ?> value="11"> 11 </option>
                <option <?php if($d['kelas_anggota'] == "12"){echo "selected='selected'";} ?> value="12"> 12 </option>
              </select>
            </div>
            <div class="form-group">
              <label>Jurusan</label>
              <select class="form-control" name="jurusan_anggota" required="required">
                <option value=""> - Pilih Jurusan - </option>
                <option <?php if($d['jurusan_anggota'] == "SIJA"){echo "selected='selected'";} ?> value="SIJA"> SIJA </option>
                <option <?php if($d['jurusan_anggota'] == "TFLM"){echo "selected='selected'";} ?> value="TFLM"> TFLM </option>
                <option <?php if($d['jurusan_anggota'] == "KI"){echo "selected='selected'";} ?> value="KI"> KI </option>
                <option <?php if($d['jurusan_anggota'] == "KA"){echo "selected='selected'";} ?> value="KA"> KA </option>
                <option <?php if($d['jurusan_anggota'] == "DPIB"){echo "selected='selected'";} ?> value="DPIB"> DPIB </option>
                <option <?php if($d['jurusan_anggota'] == "TOI"){echo "selected='selected'";} ?> value="TOI"> TOI </option>
                <option <?php if($d['jurusan_anggota'] == "TEDK"){echo "selected='selected'";} ?> value="TEDK"> TEDK </option>
                <option <?php if($d['jurusan_anggota'] == "TMPO"){echo "selected='selected'";} ?> value="TMPO"> TMPO </option>
                <option <?php if($d['jurusan_anggota'] == "TBO"){echo "selected='selected'";} ?> value="TBO"> TBO </option>
                <option <?php if($d['jurusan_anggota'] == "GP"){echo "selected='selected'";} ?> value="GP"> GP </option>
                <option <?php if($d['jurusan_anggota'] == "TP"){echo "selected='selected'";} ?> value="TP"> TP </option>
                <option <?php if($d['jurusan_anggota'] == "TITL"){echo "selected='selected'";} ?> value="TITL"> TITL </option>
                <option <?php if($d['jurusan_anggota'] == "TKR"){echo "selected='selected'";} ?> value="TKR"> TKR </option>
                <option <?php if($d['jurusan_anggota'] == "TBKR"){echo "selected='selected'";} ?> value="TBKR"> TBKR </option>
              </select>            
            </div>
            <div class="form-group">
              <label>Nomor Telepon</label>
              <input type="tel" class="form-control" name="no_telp_anggota" value="<?php echo $d['no_telp_anggota'] ?>" required="required" maxlength="13">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat_anggota" value="<?php echo $d['alamat_anggota'] ?>" required="required">
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