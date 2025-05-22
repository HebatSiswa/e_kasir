<?php

if (isset($_POST['tambah'])) {
    include('../koneksi.php'); 

    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = "INSERT INTO user (id_user, username, password, level) VALUES ('$id_user', '$username','$password', '$level')";

    if (mysqli_query($conn, $query)) {
        echo 'Data berhasil ditambahkan! ';
        echo '<a href="index.php">Kembali</a>';
    } else {
        echo 'Gagal menambahkan data! ' . mysqli_error($koneksi);
        echo '<a href="tambah.php">Kembali</a>';
    }

} else {
    echo '<script>window.history.back()</script>';
}
?>