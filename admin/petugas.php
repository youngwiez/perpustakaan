<?php 
  include '../db_connect.php';
  session_start();
?>

<?php include 'header.php';

// Jumlah data per halaman
$limit = 3;

// Mengambil halaman aktif dari parameter URL
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

// Menghitung offset data
$offset = ($halaman - 1) * $limit;

// Query untuk mengambil data petugas dengan limit dan offset
$query = "SELECT * FROM petugas LIMIT $offset, $limit";
$result = $myConn->query($query);

// Menghitung total data petugas
$totalData = $myConn->query("SELECT COUNT(*) as total FROM petugas")->fetch_assoc()['total'];

// Menghitung total halaman
$totalHalaman = ceil($totalData / $limit);

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Petugas</h1>
          <br>
          <a href="petugas_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Data Petugas</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data Petugas</li>
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
              <th>NAMA</th>
              <th>JABATAN</th>
              <th>NO. TELP</th>
              <th>ALAMAT</th>
              <th width="15%">OPSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = ($halaman - 1) * $limit + 1;
              while ($d = $result->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['nama_petugas']; ?></td>
              <td><?php echo $d['jabatan_petugas']; ?></td>
              <td><?php echo $d['no_telp_petugas'];?></td>
              <td><?php echo $d['alamat_petugas'];?></td>
              <td>
                <a class="btn btn-warning btn-sm" href="petugas_edit.php?id=<?php echo $d['id_petugas'] ?>"><i class="fa fa-cog"></i></a>
                <a class="btn btn-danger btn-sm" href="petugas_hapus_konfir.php?id=<?php echo $d['id_petugas'] ?>"><i class="fa fa-trash"></i></a>
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
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php
        // Membuat link pagination
        for ($i = 1; $i <= $totalHalaman; $i++) {
          if ($i == $halaman) {
            echo "<li class='page-item active'><a class='page-link' href='?halaman=$i'>$i</a></li>";
          } else {
            echo "<li class='page-item'><a class='page-link' href='?halaman=$i'>$i</a></li>";
          }
        }
      ?>
    </ul>
  </nav>
</div>

<?php include 'footer.php'; ?>