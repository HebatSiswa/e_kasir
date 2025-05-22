<?php
session_start();
include "../koneksi.php";
include "header.php";
?>

<div class="container mt-5">

    <div class="row justify-content-center">

    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");
    $no=0;
 
    if(isset($_POST['cari'])) {
        $keyword =  $_POST['keyword'];

        $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal LIKE '%$keyword%' OR id_produk LIKE '%$keyword%' OR nama_produk LIKE '%$keyword%'");
    }
    while($data=mysqli_fetch_array($query)) {
        $no++ 
    ?>
        <div class="col-md-12 mt-2">
            <div class="card mb-3">
                <div class="card-header bg-primary text-light text-center pb-0 ">
                    
                    <p class="float-end mb-1 mt-0"><a href="print.php?id_transaksi=<?php echo $data['id_transaksi']?>" class="btn btn-dark btn-sm"><i class="bi bi-printer-fill"></i></a> 
                    <a href="hapus.php?id_transaksi=<?php echo $data['id_transaksi']?>" 
                 class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                </p>

                </div>
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
                    <?php
                    if($data['uang_cash'] == 0) {
                        ?>
                         <?php if ($_SESSION['level'] === 'User'): ?>
                        <div class="d-flex justify-content-center">
                            <p class="float-start"><a href="tambah_produk.php?id_transaksi=<?php echo $data['id_transaksi']?>" class="btn btn-primary mx-2">Tambah Produk</a></p>
                            <p class="float-end"><a href="bayar.php?id_transaksi=<?php echo $data['id_transaksi']?>" class="btn btn-danger mx-2">Bayar</a></p>
                        </div>
                        <?php endif; ?>
                    <?php
                    } else {
                        ?>
                        <div>
                        <p class="text-primary fs-4 " style="text-decoration:underline;"><b>Total bayar : </b>Rp. <?php echo number_format($data['uang_cash']) ?></p>
                        </div>
                        <div>
                        <p class="text-dark fs-4 " style="text-decoration:underline;"><b>Kembalian : </b>Rp. <?php echo number_format($data['kembalian']) ?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
               
            </div>
        </div>
        <?php } ?>
    </div> 
</div> 

