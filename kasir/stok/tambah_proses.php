<?php
include "../koneksi.php";

if(isset($_POST['submit'])) {
    $id_produk = ($_POST['id_produk']);
    $stok = ($_POST['stok']);

    $query = mysqli_query($koneksi, "SELECT stok FROM produk WHERE id_produk='$id_produk'");
    $data = mysqli_fetch_array($query);
    $stok_sekarang = $data['stok']; 
    $stok_baru = (int)$stok_sekarang + (int)$stok;

$ubah = mysqli_query($koneksi, "UPDATE produk SET stok='$stok_baru' WHERE id_produk='$id_produk'");

    if($ubah) {
        ?>
        <script>
            alert("Berhasil Ditambah");
            document.location="index.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Gagal Ditambah");
            document.location="index.php";
        </script>
        <?php

    }
}
?>