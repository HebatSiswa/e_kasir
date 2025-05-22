<?php
$koneksi = mysqli_connect("localhost", "root", "", "kasir");

if (!$koneksi){
    echo "Koneksi ke database gagal";
}
?>