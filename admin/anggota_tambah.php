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
          <h1>Tambah Anggota</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="anggota.php">Data Anggota</a></li>
            <li class="breadcrumb-item active">Tambah Anggota</li>
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
            <form action="anggota_act.php" method="post">
              <div class="form-group">
                  <label>Kode</label>
                  <input type="number" class="form-control" name="kode_anggota" required="required" placeholder="Masukkan kode anggota">
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_anggota" required="required" placeholder="Masukkan nama anggota">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required="required" placeholder="Masukkan username anggota">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required="required" placeholder="Masukkan password anggota">
              </div>
              <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level" required="required">
                  <option value=""> - Pilih Level - </option>
                  <option value="admin"> Admin </option>
                  <option value="anggota"> Anggota </option>
                </select>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jk_anggota" required="required">
                  <option value=""> - Pilih Jenis Kelamin - </option>
                  <option value="L"> Laki-laki </option>
                  <option value="P"> Perempuan </option>
                </select>
              </div>
              <div class="form-group">
                <label>Kelas</label>
                <input type="hidden" name="id_anggota" value="<?php echo $d['id_anggota'] ?>">
                <select class="form-control" name="kelas_anggota" required="required">
                  <option value=""> - Pilih Kelas Anggota - </option>
                  <option value="10"> 10 </option>
                  <option value="11"> 11 </option>
                  <option value="12"> 12 </option>
                </select>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <select class="form-control" name="jurusan_anggota" required="required">
                  <option value=""> - Pilih Jurusan Anggota - </option>
                  <option value="SIJA"> SIJA </option>
                  <option value="TFLM"> TFLM </option>
                  <option value="KI"> KI </option>
                  <option value="KA"> KA </option>
                  <option value="DPIB"> DPIB </option>
                  <option value="TOI"> TOI </option>
                  <option value="TEDK"> TEDK </option>
                  <option value="TMPO"> TMPO </option>
                  <option value="TBO"> TBO </option>
                  <option value="GP"> GP </option>
                  <option value="TP"> TP </option>
                  <option value="TITL"> TITL </option>
                  <option value="TKR"> TKR </option>
                  <option value="TBKR"> TBKR </option>
                </select>
              </div>
              <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="tel" class="form-control" name="no_telp_anggota" required="required" placeholder="Masukkan nomor telepon anggota" maxlength="13">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat_anggota" required="required" placeholder="Masukkan alamat anggota">
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