<?php
include "../koneksi.php";
include "header.php";

$query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk DESC");
$no=0;
if(isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR harga LIKE '%$keyword%'  OR id_produk LIKE '%$keyword%' ORDER BY id_produk DESC");
}
?>

<html>
  <head>
    <title>HALAMAN TAMPIL PRODUK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
      .btn-primary {
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
    <div class="container-fluid mt-5"> 
      <div class="row gx-0">
        <?php
        while($data = mysqli_fetch_array($query)) {
          $no++;
        ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mx-3 shadow" style="width: 16rem;"> 
          <div class="card shadow"> 
            <img src="../asset/img/<?php echo $data['foto'] ?>" class="card-img-top" alt="<?php echo $data['nama_produk'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['nama_produk'] ?></h5>
              <p class="card-text">Rp. <?php echo number_format($data['harga']) ?></p>
              <a href="../transaksi/beli.php?id_produk=<?=$data['id_produk']?>" class="btn btn-primary">Beli</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div> 
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
  </body>
</html>