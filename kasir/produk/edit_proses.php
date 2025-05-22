<?php
include "../koneksi.php";

if(isset($_POST['submit'])) {
    $id_produk = ($_POST['id_produk']);
    $nama_produk = ($_POST['nama_produk']);
    $foto = ($_POST['foto']);
    $tanggal = date("d F Y");
    $harga = ($_POST['harga']);
    $deskripsi = ($_POST['deskripsi']);

    $ubah = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk',foto='$foto', stok='$stok', terakhir_direstok='$tanggal', harga='$harga', deskripsi='$deskripsi' WHERE id_produk='$id_produk'");

    if($ubah) {
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
            alert("Gagal diubah");
            document.location="../stok/index.php";
        </script>
        <?php

    }
}
?>