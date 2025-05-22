<?php
if(isset($_GET['id'])){
    include('../koneksi.php');

    $id = $_GET['id'];

    $cek = mysqli_query($koneksi, "SELECT id_user FROM user WHERE id_user='$id'") or die(mysqli_error());
    if(mysqli_num_rows($cek) == 0    ){
        echo '<script>window.history.back()</script>';
    }else{
        $del = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id'");
        if($del){
            echo 'Data user berhasil dihapus! ';
            echo '<a href = "index.php">Kembali</a>';

        }else{
            echo 'Gagal menghapus data! ';
            echo '<a href = "index.php">Kembali</a>';

        }
    }
}else{
    echo '<script>window.history.back()</script>';
}
?>