<?php
include "../koneksi.php";
include "header.php";
?>

<div class="container mt-5">
    <h3 align="center">Tambah Produk</h3>
    <form action="tambah_proses.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            
            <div class="col-8">
                <div>
                    <b class="form-label">Nama Produk</b>
                    <input type="text" name="nama_produk" placeholder="Masukan Nama Produk" class="form-control mt-1" autofocus>
                </div>
                <div>
                    <b class="form-label">Harga</b>
                    <input type="text" name="harga" placeholder="Masukan Harga" class="form-control mt-1">
                </div>
                <div>
                    <b class="form-label">Jumlah Stock</b>
                    <input type="text" name="stok" placeholder="Masukan Jumlah Stock" class="form-control mt-1">
                </div>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control mt-1">Deskripsi</textarea>
                <div class="d-grid gap-2 mt-1">
                    <input type="submit" name="submit" class="btn btn-primary mt-1" value="Tambah">
                </div>
            </div>
            <div class="col-4 text-center mb-3" >
                <input type="file" name="foto" id="" class="mt-1">
            </div>
        </div>
    </form>
</div>