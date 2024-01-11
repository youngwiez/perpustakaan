<?php
include '../db_connect.php';
session_start();

$id_anggota = $_SESSION['id'];

include 'header.php';

// Jumlah data per halaman
$limit = 3;

// Mengambil halaman aktif dari parameter URL
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

// Menghitung offset data
$offset = ($halaman - 1) * $limit;

// Query untuk mengambil data pengembalian dengan limit dan offset
$query = "SELECT * FROM pengembalian WHERE id_anggota = '$id_anggota' LIMIT $offset, $limit";
$result = $myConn->query($query);

// Menghitung total data pengembalian
$totalData = $myConn->query("SELECT COUNT(*) as total FROM pengembalian WHERE id_anggota = '$id_anggota'")->fetch_assoc()['total'];

// Menghitung total halaman
$totalHalaman = ceil($totalData / $limit);

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pengembalian Buku Anda</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data Pengembalian Buku Anda</li>
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
              <th>TANGGAL KEMBALI</th>
              <th>STATUS</th>
              <th>DENDA</th>
              <th>JUDUL BUKU</th>
              <th>NAMA ANGGOTA</th>
              <th>NAMA PETUGAS</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $qkembali =
              "SELECT 
                pengembalian.id_pengembalian,
                pengembalian.tgl_pengembalian,
                pengembalian.status,
                pengembalian.denda,
                buku.judul_buku,
                anggota.nama_anggota,
                petugas.nama_petugas
              FROM pengembalian
              JOIN buku ON pengembalian.id_buku = buku.id_buku
              JOIN anggota ON pengembalian.id_anggota = anggota.id_anggota
              JOIN petugas ON pengembalian.id_petugas = petugas.id_petugas
              WHERE pengembalian.id_anggota = '$id_anggota'
              ORDER BY pengembalian.tgl_pengembalian ASC
              LIMIT $offset, $limit";
            $no = ($halaman - 1) * $limit + 1;
            $rsKembali = $myConn->query($qkembali);
            while ($d = $rsKembali->fetch_assoc()) {
              // Mengatur warna tulisan berdasarkan status pengembalian
              $status = $d['status'];
              $statusColor = '';
              if ($d['denda'] > 0) {
                $status = 'Terlambat Dikembalikan';
                $statusColor = "text-danger";
              } else {
                $status = 'Dikembalikan';
                $statusColor = "text-success";
              }
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['tgl_pengembalian']; ?></td>
                <td>
                  <span class="<?php echo $statusColor; ?>">
                    <?php echo $status; ?>
                  </span>
                </td>
                <td><?php echo $d['denda']; ?></td>
                <td><?php echo $d['judul_buku']; ?></td>
                <td><?php echo $d['nama_anggota']; ?></td>
                <td><?php echo $d['nama_petugas']; ?></td>
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