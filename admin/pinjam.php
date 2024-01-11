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

// Query untuk mengambil data peminjaman dengan limit dan offset
$query = "SELECT * FROM peminjaman LIMIT $offset, $limit";
$result = $myConn->query($query);

// Menghitung total data peminjaman
$totalData = $myConn->query("SELECT COUNT(*) as total FROM peminjaman")->fetch_assoc()['total'];

// Menghitung total halaman
$totalHalaman = ceil($totalData / $limit);

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Peminjaman Buku</h1>
          <br>
          <a href="pinjam_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Data Peminjaman</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data Peminjaman Buku</li>
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
              <th>TANGGAL PINJAM</th>
              <th>TANGGAL KEMBALI</th>
              <th>JUDUL BUKU</th>
              <th>NAMA ANGGOTA</th>
              <th>NAMA PETUGAS</th>
              <th>STATUS</th>
              <th width="15%">OPSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $qpinjam =
                "SELECT 
                  peminjaman.id_peminjaman,
                  peminjaman.tgl_pinjam,
                  peminjaman.tgl_kembali,
                  buku.judul_buku,
                  anggota.nama_anggota,
                  petugas.nama_petugas,
                  peminjaman.status
                FROM peminjaman
                JOIN buku ON peminjaman.id_buku=buku.id_buku
                JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
                JOIN petugas ON peminjaman.id_petugas=petugas.id_petugas
                ORDER BY peminjaman.id_peminjaman ASC
                LIMIT $offset, $limit";
              $no = ($halaman - 1) * $limit + 1;
              $rsPinjam = $myConn->query($qpinjam);
              while ($d = $rsPinjam->fetch_assoc()) {
                $status = '';
                $statusColor = '';
                // Mengatur warna status berdasarkan kondisi
                if ($d['status'] == "Dikembalikan") {
                  $statusColor = "text-success";
                } elseif ($d['status'] == "Belum Dikembalikan") {
                  $statusColor = "text-warning";
                } elseif ($d['status'] == "Terlambat Dikembalikan") {
                  $statusColor = "text-danger";
                }
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['tgl_pinjam']; ?></td>
                <td><?php echo $d['tgl_kembali']; ?></td>
                <td><?php echo $d['judul_buku']; ?></td>
                <td><?php echo $d['nama_anggota']; ?></td>
                <td><?php echo $d['nama_petugas']; ?></td>
                <td><span class="<?php echo $statusColor; ?>"><?php echo $d['status']; ?></span></td>
                <td>
                  <a class="btn btn-warning btn-sm" href="pinjam_edit.php?id=<?php echo $d['id_peminjaman'] ?>"><i class="fa fa-cog"></i></a>
                  <a class="btn btn-danger btn-sm" href="pinjam_hapus.php?id=<?php echo $d['id_peminjaman'] ?>"><i class="fa fa-trash"></i></a>
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