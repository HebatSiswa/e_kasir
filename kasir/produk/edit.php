<?php
include "../koneksi.php";

if(isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
    $data = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" onclick="history.back()" style="cursor: pointer;">
        <i class="bi bi-arrow-left-circle-fill fs-4"></i> Kembali
      </a>
     
    </div>
  </nav>

<div class="container mt-5 pt-5">
    <div class="row">

        <div class="col-md-4 text-center">
        <img src="../asset/img/<?php echo $data['foto']?>" alt="" style="height:350px; width:300px;">
        </div>

        <div class="col-md-8">
            <form action="edit_proses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_produk" value="<?php echo $data['id_produk'] ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Produk:</label>
                    <input type="text" name="nama_produk" value="<?php echo $data['nama_produk'] ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga /pcs:</label>
                    <input type="text" name="harga" value="<?php echo $data['harga'] ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Produk:</label>
                    <textarea name="deskripsi" rows="5" class="form-control"><?php echo $data['deskripsi'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Produk:</label>
                    <input type="file" name="foto" class="form-control">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">Selesai</button>
                    <a href="hapus.php?id_produk=<?php echo $data['id_produk']?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus Produk</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
