<?php
include "../koneksi.php";

if(isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    $ambil_foto = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
    $tangkap_foto = mysqli_fetch_array($ambil_foto);
    $foto = $tangkap_foto['foto'];


    $hapus_produk = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$id_produk'");

    $hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_produk='$id_produk'");

    if($hapus) {
        ?>
        <script>
            setTimeout(function() {
                window.location = "../stok/index.php";
            }, 2000);
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("produk gagal dihapus");
            document.location="index.php";
        </script>
        <?php
    }
}

?> 