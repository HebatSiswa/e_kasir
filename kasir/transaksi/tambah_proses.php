<?php
include "../koneksi.php";

function updateStok($koneksi, $id_produk, $jumlah) {
    $stok = mysqli_query($koneksi, "SELECT stok FROM produk WHERE id_produk='$id_produk'");
    $s = mysqli_fetch_assoc($stok);
    $new_stok = $s['stok'] - $jumlah;
    return mysqli_query($koneksi, "UPDATE produk SET stok='$new_stok' WHERE id_produk='$id_produk'");
}
function redirect($id_transaksi) {
    echo "<script>document.location='tambah_produk.php?id_transaksi=$id_transaksi';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    $id_transaksi = ($_POST['id_transaksi']);
    $id_produk = ($_POST['id_produk']);
    $nama_produk = ($_POST['nama_produk']);
    $hargaPCS = ($_POST['hargaPCS']);
    $jumlah = ($_POST['jumlah']);
    $stok = $_POST['stok'];

    if ($jumlah > $stok) {
        echo "<script>alert('Barang yang dipesan lebih banyak dari stok yang tersedia');</script>";
        
        redirect($id_transaksi);
    }

    $cek_transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk'");
    $cek_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk'");

    if (mysqli_num_rows($cek_transaksi) > 0) {
        $data = mysqli_fetch_assoc($cek_transaksi);
        // jumlah sebelumnya ditambah jumlah yang sekarang
        $new_jumlah = $data['jumlah'] + $jumlah;
        // total ditambah jumlah barang dikali harga
        $new_total = $data['total'] + ($jumlah * $hargaPCS);

        mysqli_query($koneksi, "UPDATE transaksi SET jumlah='$new_jumlah', total='$new_total' WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk'");
        updateStok($koneksi, $id_produk, $jumlah);
        redirect($id_transaksi);
    }

    if (mysqli_num_rows($cek_barang) > 0) {
        $data = mysqli_fetch_assoc($cek_barang);
        $new_jumlah = $data['jumlah'] + $jumlah;
        $new_total = $data['total'] + ($jumlah * $hargaPCS);

        mysqli_query($koneksi, "UPDATE barang SET jumlah='$new_jumlah', total='$new_total' WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk'");
        updateStok($koneksi, $id_produk, $jumlah);
        redirect($id_transaksi);
    }
    $total = $jumlah * $hargaPCS;
    $tanggal = date("Y-m-d, H:i a");

    mysqli_query($koneksi, "INSERT INTO barang (id_transaksi, id_produk, nama_produk, jumlah, hargaPCS, total, tanggal) VALUES ('$id_transaksi', '$id_produk', '$nama_produk', '$jumlah', '$hargaPCS', '$total', '$tanggal')");
    updateStok($koneksi, $id_produk, $jumlah);
    redirect($id_transaksi);
}
?>
