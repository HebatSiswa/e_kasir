<?php
include "../koneksi.php";
include "../stok/header2.php";

if(isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];

    $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
    $data = mysqli_fetch_array($query);
}
?>

<div class="container mt-5">

<div class="row justify-content-center">
    <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                    <p><b>ID transaksi : </b><?php echo $data['id_transaksi'] ?></p>
                    <p><b>Tanggal pembelian : </b><?php echo $data['tanggal'] ?></p>
                    <p><b>Nama produk : </b>
                        <ul>
                            <li><?php echo $data['nama_produk'] ?> (<?php echo $data['jumlah'] ?> pcs)</li>
                            <?php
                            $query2 = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_transaksi='$data[id_transaksi]'");
                            while($data2 = mysqli_fetch_array($query2)) {
                            ?>
                            <li><?php echo $data2['nama_produk'] ?> (<?php echo $data2['jumlah'] ?> pcs)</li>
                            <?php } ?>
                        </ul>
                    </p>
                    <p><b>Jumlah barang : </b>
                        <?php
                        $jml_1 = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah1 FROM transaksi WHERE id_transaksi='$data[id_transaksi]'");
                        $jml_1 = mysqli_fetch_array($jml_1);
                        $jml_2 = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah2 FROM barang WHERE id_transaksi='$data[id_transaksi]'");
                        $jml_2 = mysqli_fetch_array($jml_2);

                        $total_jumlah = $jml_1['jumlah1'] + $jml_2['jumlah2'];
                        ?> <?php echo $total_jumlah . " pcs"?>
                    </p>
                    <p><b>Harga /pcs : </b>
                    <ul>
                            <li><?php echo $data['nama_produk'] ?> Rp. <?php echo number_format($data['hargaPCS']) ?> /pcs</li>
                            <?php
                            $query2 = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_transaksi='$data[id_transaksi]'");
                            while($data2 = mysqli_fetch_array($query2)) {
                            ?>
                            <li><?php echo $data2['nama_produk'] ?> Rp. <?php echo number_format($data2['hargaPCS']) ?> /pcs</li>
                            <?php } ?>
                        </ul>
                    </p>
                    <p class="fs-4"><b>Total harga : </b>
                    <?php

                        $total_harga1 = mysqli_query($koneksi, "SELECT SUM(total) AS total_harga1 FROM transaksi WHERE id_transaksi='$data[id_transaksi]'");
                        $final1 = mysqli_fetch_array($total_harga1);

                        $total_harga2 = mysqli_query($koneksi, "SELECT SUM(total) AS total_harga2 FROM barang WHERE id_transaksi='$data[id_transaksi]'");
                        $final2 = mysqli_fetch_array($total_harga2);

                        $total_harga_kes = $final1['total_harga1'] + $final2['total_harga2'];

                        ?> Rp. <?php echo number_format($total_harga_kes) ?>
                    </p>
                    <hr>
                        <form action="" method="POST">
                            <input type="hidden" name="total" class="form-control" value="<?php echo $total_harga_kes ?>">
                            <input type="text" name="uang_cash" class="form-control" placeholder="Masukan jumlah uang Cash" required autofocus autocomplete="off">
                            <div class="d-grid gap-2 mt-2">
                            <input type="submit" name="submit" class="btn btn-primary" value="Bayar">
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>
                    </div> 
</div> 

<?php
if(isset($_POST['submit'])) {
    $total = $_POST['total'];
    $uang_cash = $_POST['uang_cash'];
    $kembalian = $uang_cash - $total;

    $update = mysqli_query($koneksi, "UPDATE transaksi SET total_kes='$total', uang_cash='$uang_cash', kembalian='$kembalian' WHERE id_transaksi = '$id_transaksi' ");

    if($update) {
        ?>
        <script>
            setTimeout(function() {
                window.location = "index.php";
            }, 2000);
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Pembayaran Gagal");
            document.location="index.php";
        </script>
        <?php
    }
}
?>

