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
          <h1>Data Rak</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="rak.php">Data Rak</a></li>
            <li class="breadcrumb-item active">Edit Data Rak</li>
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
          <form action="rak_update.php" method="post" enctype="multipart/form-data">
            <?php 
              $id = $_GET['id'];              
              $data = $myConn->query("SELECT * FROM rak WHERE id_rak='$id'");
              $d = $data->fetch_assoc();
            ?>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama_rak" value="<?php echo $d['nama_rak'] ?>" required="required">
              <input type="hidden" class="form-control" name="id_rak" value="<?php echo $d['id_rak'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" class="form-control" name="lokasi_rak" value="<?php echo $d['lokasi_rak'] ?>" required="required">
            </div>
            <div class="form-group">
              <label>Judul Buku</label>
              <select class="form-control" name="id_buku" required="required">
                <option value=""> - Pilih Buku - </option>
                <?php 
                  $buku = $myConn->query("SELECT * from buku");
                  while($b = $buku->fetch_assoc()){
                    $selected = ($b['id_buku'] == $d['id_buku']) ? 'selected' : '';
                    echo "<option value='".$b['id_buku']."' ".$selected.">".$b['judul_buku']."</option>";
                  }
                ?>
              </select>
            </div>
            
            <div class="form-group">
              <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
            </div>
          </form>
        </div>
      </section>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>