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

// Query untuk mengambil data buku dengan limit dan offset
$query = "SELECT * FROM anggota LIMIT $offset, $limit";
$result = $myConn->query($query);

// Menghitung total data buku
$totalData = $myConn->query("SELECT COUNT(*) as total FROM anggota")->fetch_assoc()['total'];

// Menghitung total halaman
$totalHalaman = ceil($totalData / $limit);

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Anggota</h1>
          <br>
          <a href="anggota_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Data Anggota</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data Anggota</li>
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
              $no = ($halaman - 1) * $limit + 1;
              while ($d = $result->fetch_assoc()) {
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
                <a class="btn btn-danger btn-sm" href="anggota_hapus_konfir.php?id=<?php echo $d['id_anggota'] ?>"><i class="fa fa-trash"></i></a>
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