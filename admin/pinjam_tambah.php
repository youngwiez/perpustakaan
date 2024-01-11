<?php 
  include '../db_connect.php';
  session_start();
?>

<?php include 'header.php'; 
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;
$tglKembali = date('Y-m-d', strtotime($today . ' + 1 weeks'));
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Peminjaman Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="pinjam.php">Data Peminjaman Buku</a></li>
            <li class="breadcrumb-item active">Tambah Peminjaman Buku</li>
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
            <form action="pinjam_act.php" method="post">
            <div class="form-group">
                <label>Tanggal Peminjaman (Hari Ini)</label>
                <input type="date" class="form-control" value="<?= $today ?>" name="tgl_pinjam" required="required" placeholder="Masukkan tanggal peminjaman buku" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Pengembalian (1 Minggu dari Sekarang)</label>
                <input type="date" class="form-control" value="<?= $tglKembali ?>" min="<?= $today ?>" max="<?= $tglKembali ?>" name="tgl_kembali" required="required" placeholder="Masukkan tanggal pengembalian buku" readonly>
            </div>
            <div class="form-group">
                <label>Judul Buku</label>
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
                <label>Nama Anggota</label>
                <input type="hidden" name="id_pinjam" value="<?php echo $d['id_pinjam'] ?>">
                <select class="form-control" name="id_anggota" required="required">
                  <option value=""> - Pilih Anggota - </option>
                  <?php 
                  $anggota = $myConn->query("SELECT * from anggota");
                  while($b=mysqli_fetch_array($anggota)){
                  ?>
                  <option value="<?php echo $b['id_anggota']; ?>"><?php echo $b['nama_anggota']; ?></option>
                  <?php 
                  }
                  ?>
              </select>
              </div>
              <div class="form-group">
                <label>Nama Petugas</label>
                <select class="form-control" name="id_petugas" required="required">
                  <option value=""> - Pilih Petugas - </option>
                  <?php 
                  $petugas = $myConn->query("SELECT * from petugas");
                  while($b=mysqli_fetch_array($petugas)){
                  ?>
                  <option value="<?php echo $b['id_petugas']; ?>"><?php echo $b['nama_petugas']; ?></option>
                  <?php 
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Status Peminjaman</label>
                <input type="text" class="form-control" name="status" value="Belum Dikembalikan" required="required" readonly>
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