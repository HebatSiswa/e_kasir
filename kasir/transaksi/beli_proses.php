<?php
include "../koneksi.php";

if(isset($_POST['submit'])) {
    $id_produk = ($_POST['id_produk']);
    $nama_produk = ($_POST['nama_produk']);
    $hargaPCS = ($_POST['hargaPCS']);
    $jumlah = ($_POST['jumlah']);
    $stok = $_POST['stok'];

    if($jumlah > $stok) {
        ?>
        <script>
            alert("Barang yang dipesan lebih banyak dari stok yang tersedia");
            document.location="home.php";
        </script>
        <?php
    } else {

    $total = $hargaPCS * $jumlah;
    $tanggal = date ("Y-m-d, H:i a");
    $input = mysqli_query($koneksi, "INSERT INTO transaksi (id_produk, nama_produk, hargaPCS, jumlah, total, tanggal) VALUES ('$id_produk','$nama_produk','$hargaPCS','$jumlah','$total','$tanggal')");

    
    if($input) {
        
        $stok = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
        $ambil_stok = mysqli_fetch_array($stok);
        $stok_barang = $ambil_stok['stok'];

        $new_stok = $stok_barang - $jumlah;

        $upload_stok = mysqli_query($koneksi, "UPDATE produk SET stok='$new_stok' WHERE id_produk='$id_produk'");

        if($upload_stok) {
            ?>
            <script>
                document.location="../transaksi/index.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Gagal");
                document.location="../transaksi/index.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Gagall");
            document.location="../transaksi/index.php";
        </script>
        <?php
    }
}
}
?>