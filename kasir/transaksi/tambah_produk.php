<?php
if(isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>E-Kasir</title>
    <style>
       body{
        margin: 0;
        padding: 45px;
      }
      a.btn-primary {
        display: block;
        width: 100%;
        text-align: center;
      }
      .card {
        height: 100%; 
        border: none;
      }
      .card-img-top {
        height: 200px; 
        object-fit: cover; 
      }
    </style>
  </head>
  <body>

<!-- NAVBAR START -->
  <nav class="navbar navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
  <a class="navbar-brand" onclick="history.back()" style="cursor: pointer;">
        <i class="bi bi-arrow-left-circle-fill fs-4"></i> Kembali
      </a>
    <div class="container">
    <form class="d-flex ms-auto mt-2 mb-2" action="" method="POST">
      <input class="form-control me-2" type="search" name="keyword" placeholder="Cari produk" aria-label="Search" autofocus>
      <button class="btn btn-primary" type="submit" name="cari"><i class="bi bi-search"></i></button>
    </form>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Selesai</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- NAVBAR END -->
<div class="container-fluid mt-5"> 
      <div class="row gx-0"> 
<?php
include "../koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk DESC");
$no=0;
if(isset($_POST['cari'])) {
  $keyword = $_POST['keyword'];
  $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR harga LIKE '%$keyword%'  OR id_produk LIKE '%$keyword%' ORDER BY id_produk DESC");
}
while($data = mysqli_fetch_array($query)) {
$no++
?>

<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mx-3 shadow" style="width: 16rem;">
 <img src="../asset/img/<?php  echo $data['foto'] ?>"
 class="card-img-top" alt="<?php echo $data['nama_produk'] ?>" style="height: 200px; object-fit: cover;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['nama_produk'] ?></h5>
    <p class="card-text">Rp. <?php echo number_format($data['harga']) ?></p>
    <a href="tambah.php?id_transaksi=<?=$id_transaksi?>&id_produk=<?=$data['id_produk']?>" class="btn btn-primary">Tambah</a>
    </div>
</div>

<?php } ?>
</div> 
</div> 

