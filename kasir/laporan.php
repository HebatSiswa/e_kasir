<?php
include "koneksi.php";
session_start(); 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
      body{
        margin: 0;
        padding: 60px;
      }
      .btn-sm{
        background-color: transparent; 
    color:rgb(71, 73, 75);
    padding: 10px 20px; 
    text-decoration: none; 
    transition: background-color 0.3s, color 0.3s; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
      }
      .btn-sm:hover {
    background-color:green; 
    color: white; 
}
.btn-sm.me-3{
        background-color: transparent; 
    color:rgb(71, 73, 75); 
    padding: 10px 20px; 
    text-decoration: none; 
    transition: background-color 0.3s, color 0.3s; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
      }
      .btn-sm.me-3:hover {
    background-color:rgb(231, 17, 17); 
    color: white; 
}
.btn-primary:hover {
    background-color:rgb(23, 52, 211); 
    color: white; 
}

    </style>
</head>
  <body>
    <!-- NAVBAR START -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container">
    <!-- LOGO START -->
    <a class="navbar-brand" href="javascript:void(0);" onclick="window.history.back();">
      <b>ALAMAK</b></a>
<!-- LOGO END -->

<!-- SEARCH BUTTON START -->
    <div class="container">
    <form class="d-flex ms-auto" action="" method="POST">
    <input class="form-control me-2" type="search" name="keyword" placeholder="Cari barang" aria-label="Search" autofocus>
    <button class="btn btn-primary" type="submit" name="cari"><i class="bi bi-search"></i></button>
    </form>
  </div>
<!-- SEARCH BUTTON END -->

  </div>
</nav> 
<!-- NAVBAR END -->
<div class="container mt-3">
    <!-- STOK START -->
    <div class="container mt-3 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <input type="submit" value="Stok Terbanyak" name="stok_banyak" class="btn btn-sm ">
                            <input type="submit" value="Stok Tersedikit" name="stok_sedikit" class="btn btn-sm  me-3">
                            <?php if ($_SESSION['level'] == 'Admin'):   ?>
                            <input type="submit" name="lihat_transaksi" value="Tampilkan Transaksi" class="btn btn-sm btn-primary">
                            <?php endif; ?>
                        </form>
                       
                    </div>
                </div>
            </div>
    </div>
    <!-- STOK END-->

    <!-- TABEL PRODUK START -->
    <div class="container">
        <div class="card">

        
        <table class="table text-center table-striped table-hover">
            <thead class="bg-primary text-light">
                <tr>
                    <td>Id Produk</td>
                    <td>Nama Produk</td>
                    <td>Harga /PCS</td>
                    <td>Stok Tersedia</td>
                    <?php if ($_SESSION['level'] == 'Admin'):   ?>
                    <td>Jumlah Terjual</td>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM produk";
                if (isset($_POST['cari'])) {
                    $keyword = $_POST['keyword'];
                    $query .= " WHERE nama_produk LIKE '%$keyword%'";
                }

                if (isset($_POST['stok_banyak'])) {
                    $query .= " ORDER BY stok DESC";
                } else if (isset($_POST['stok_sedikit'])) {
                    $query .= " ORDER BY stok ASC";
                }
                

                $result = mysqli_query($koneksi, $query);

                while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                <td><?php echo $data['id_produk']; ?></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td>Rp. <?php echo number_format($data['harga']); ?></td>
                    <td><?php echo $data['stok']; ?> pcs</td>
                    <?php if ($_SESSION['level'] == 'Admin'):   ?>
                    <td><?php echo $data['barang_terjual']; ?> pcs</td>
                    <?php endif; ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
    <!-- TABEL PRODUK END -->


    <?php if (isset($_POST['lihat_transaksi'])): ?>
    <!-- TABEL TRANSAKSI START -->
<div class="container mt-5" id="transaksi">
    <h4 class="mb-3">Semua Transaksi</h4>
    <table class="table text-center table-striped table-hover">
        <thead class="bg-secondary text-light">
            <tr>
                <td>ID Transaksi</td>
                <td>Nama Produk</td>
                <td>Jumlah</td>
                <td>Total Harga</td>
                <td>Tanggal</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_transaksi = "SELECT t.id_transaksi, p.nama_produk, t.jumlah, t.total, t.tanggal 
                                FROM transaksi t
                                JOIN produk p ON t.id_produk = p.id_produk
                                ORDER BY t.tanggal DESC";

            $result_transaksi = mysqli_query($koneksi, $query_transaksi);

            if (mysqli_num_rows($result_transaksi) > 0) {
                while ($transaksi = mysqli_fetch_array($result_transaksi)) {
            ?>
            <tr>
                <td><?php echo $transaksi['id_transaksi']; ?></td>
                <td><?php echo $transaksi['nama_produk']; ?></td>
                <td><?php echo $transaksi['jumlah']; ?></td>
                <td>Rp. <?php echo number_format($transaksi['total']); ?></td>
                <td><?php echo date('d-m-Y', strtotime($transaksi['tanggal'])); ?></td>
            </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="5" class="text-center">Belum ada transaksi</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<!-- TABEL TRANSAKSI END -->

</div>
<?php if (isset($_POST['lihat_transaksi'])): ?>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const transaksiSection = document.getElementById("transaksi");
        if (transaksiSection) {
            transaksiSection.scrollIntoView({ behavior: "smooth" });
        }
    });
</script>
<?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>