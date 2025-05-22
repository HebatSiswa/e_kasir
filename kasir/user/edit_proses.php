<?php
if (isset($_POST['simpan'])) {
    include('../koneksi.php'); 
   
    $id = $_POST['id'];
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $update = mysqli_query($koneksi, "UPDATE user SET id_user='$id_user', username='$username', password='$password', level='$level' WHERE id_user='$id'");

    if ($update) {
        echo 'Data berhasil disimpan! ';
    } else {
        echo 'Gagal menyimpan data! ' . mysqli_error($koneksi); 
    }
    echo '<a href="index.php">Kembali</a>'; 
} else {
    echo '<script>window.history.back()</script>';
}
?>