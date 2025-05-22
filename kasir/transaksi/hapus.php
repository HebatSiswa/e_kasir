<?php
include "../koneksi.php";

if (isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];

    $cek_bayar = mysqli_query($koneksi, "SELECT uang_cash FROM transaksi WHERE id_transaksi='$id_transaksi'");
    $data_bayar = mysqli_fetch_assoc($cek_bayar);

    if ($data_bayar['uang_cash'] == 0) {
    //    JIKA BARANG BELUM DIBAYAR MAKA STOK AKAN DIKEMBALIKAN
        $barang1 = mysqli_query($koneksi, "SELECT id_produk, jumlah FROM transaksi WHERE id_transaksi='$id_transaksi'");
        while ($b1 = mysqli_fetch_assoc($barang1)) {
            mysqli_query($koneksi, "UPDATE produk SET stok = stok + {$b1['jumlah']} WHERE id_produk = '{$b1['id_produk']}'");
        }

        $barang2 = mysqli_query($koneksi, "SELECT id_produk, jumlah FROM barang WHERE id_transaksi='$id_transaksi'");
        while ($b2 = mysqli_fetch_assoc($barang2)) {
            mysqli_query($koneksi, "UPDATE produk SET stok = stok + {$b2['jumlah']} WHERE id_produk = '{$b2['id_produk']}'");
        }
    }

    
    mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
    mysqli_query($koneksi, "DELETE FROM barang WHERE id_transaksi='$id_transaksi'");

    echo "<script>
        alert('Transaksi berhasil dihapus, jika barang belum dibayar maka stok bisa dikembalikan');
        document.location='index.php';
    </script>";
}
?>
