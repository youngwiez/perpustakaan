<?php 
  include '../db_connect.php';
  session_start();


$id_anggota = $_SESSION['id'];

include 'header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Anda</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data Anda</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <section class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th width="1%">NO</th>
              <th>KODE</th>
              <th>NAMA</th>
              <th>JK</th>
              <th>KELAS</th>
              <th>JURUSAN</th>
              <th>NO. TELP</th>
              <th>ALAMAT</th>
              <th width="15%">OPSI</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              include '../db_connect.php';
              $no=1;
              $qAnggota= "SELECT * FROM anggota WHERE id_anggota='$id_anggota'";
              $rsAnggota=$myConn->query($qAnggota);
                while($d = $rsAnggota->fetch_assoc()){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['kode_anggota']; ?></td>
              <td><?php echo $d['nama_anggota']; ?></td>
              <td><?php echo $d['jk_anggota']; ?></td>
              <td><?php echo $d['kelas_anggota']; ?></td>
              <td><?php echo $d['jurusan_anggota']; ?></td>
              <td><?php echo $d['no_telp_anggota'];?></td>
              <td><?php echo $d['alamat_anggota'];?></td>
              <td>
                <a class="btn btn-warning btn-sm" href="anggota_edit.php?id=<?php echo $d['id_anggota'] ?>"><i class="fa fa-cog"></i></a>
              </td>
            </tr>
            <?php 
              }
            ?>
          </tbody>
        </table>
      </section>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>