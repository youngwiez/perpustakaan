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
          <h1>Hapus Petugas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="petugas.php">Data Petugas</a></li>
            <li class="breadcrumb-item active">Hapus Petugas</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-6">       
        <div class="box box-info">
          <div class="box-header">
            <h4 class="box-title">Yakin Ingin Menghapus Data Petugas?</h3>
          </div>
          <div class="box-body">
            <p>Dengan menghapus, semua data petugas ini akan ikut dihapus.</p>
            <br/>
            <a href="petugas.php" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
            <?php 
              $id = $_GET['id'];
            ?>
            <a href="petugas_hapus.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</a> 
          </div>
        </div>
      </section>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>