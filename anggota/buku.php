<?php
include '../db_connect.php';
session_start();
include 'header.php';

$id_anggota = $_SESSION['id'];

// Jumlah data per halaman
$limit = 3;

// Mengambil halaman aktif dari parameter URL
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

// Menghitung offset data
$offset = ($halaman - 1) * $limit;

// Query untuk mengambil data buku yang dipinjam oleh anggota
$query = "SELECT * FROM buku
          WHERE id_buku IN (
            SELECT id_buku FROM peminjaman
            WHERE id_anggota = '$id_anggota' AND status = 'Belum Dikembalikan'
          )
          LIMIT $offset, $limit";
$result = $myConn->query($query);

// Menghitung total data buku yang dipinjam oleh anggota
$totalData = $myConn->query("SELECT COUNT(*) as total FROM buku
                            WHERE id_buku IN (
                              SELECT id_buku FROM peminjaman
                              WHERE id_anggota = '$id_anggota' AND status = 'Belum Dikembalikan'
                            )")->fetch_assoc()['total'];

// Menghitung total halaman
$totalHalaman = ceil($totalData / $limit);

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Peminjaman Buku Anda</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data Peminjaman Buku Anda</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <section class="card-body p-0">
        <?php
        if ($result && $result->num_rows > 0) {
          ?>
          <table class="table table-striped projects">
            <thead>
              <tr>
                <th width="1%">NO</th>
                <th>KODE</th>
                <th>JUDUL</th>
                <th>PENULIS</th>
                <th>PENERBIT</th>
                <th>TAHUN</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = ($halaman - 1) * $limit + 1;
              while ($d = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['kode_buku']; ?></td>
                  <td><?php echo $d['judul_buku']; ?></td>
                  <td><?php echo $d['penulis_buku']; ?></td>
                  <td><?php echo $d['penerbit_buku']; ?></td>
                  <td><?php echo $d['tahun_penerbit']; ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
      </section>
      <?php
      } else {
        echo '<div class="alert alert-info">Tidak ada buku yang sedang dipinjam.</div>';
      }
      ?>
    </div>
  </section>
  <?php
    if ($totalHalaman > 1) {
      ?>
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
    <?php
    }
  ?>
</div>

<?php include 'footer.php'; ?>