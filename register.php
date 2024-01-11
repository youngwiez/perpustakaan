<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Stembayo Library</title>
  <link rel="shortcut icon" href="dist/img/logoweb.png">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="dist/img/logoweb.png" class="img-responsive" style="width: 100px">
    <br>
    <b>Stembayo Library</b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Daftar akun baru</p>

      <form action="register_act.php" method="post">
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="kode_anggota" required="required" placeholder="Kode Anggota">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-clipboard"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama_anggota" required="required" placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" required="required" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-list"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required="required" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
              <select class="form-control" name="level" required="required">
                <option value=""> - Pilih Level - </option>
                <option value="admin"> Admin </option>
                <option value="anggota"> Anggota </option>
              </select>
        </div>
        <div class="input-group mb-3">
              <select class="form-control" name="jk_anggota" required="required">
                <option value=""> - Pilih Jenis Kelamin - </option>
                <option value="L"> Laki-laki </option>
                <option value="P"> Perempuan </option>
              </select>
        </div>
        <div class="input-group mb-3">
              <select class="form-control" name="kelas_anggota" required="required">
                <option value=""> - Pilih Kelas - </option>
                <option value="10"> 10 </option>
                <option value="11"> 11 </option>
                <option value="12"> 12 </option>
              </select>
        </div>
        <div class="input-group mb-3">
              <select class="form-control" name="jurusan_anggota" required="required">
                <option value=""> - Pilih Jurusan - </option>
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
        <div class="input-group mb-3">
          <input type="tel" class="form-control" name="no_telp_anggota" required="required" placeholder="Nomor Telepon">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="alamat_anggota" required="required" placeholder="Alamat">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="index.php" class="text-center">Saya sudah punya akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
