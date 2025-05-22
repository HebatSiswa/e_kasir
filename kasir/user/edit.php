<?php
include "header.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            padding-top: 50px;
        }

    </style>
</head>
<body>

<?php
include('../koneksi.php');
$id = $_GET['id'];
$show = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");

if (mysqli_num_rows($show) == 0) {
    echo '<script>window.history.back()</script>';
} else {
    $data = mysqli_fetch_assoc($show);
}
?>

<div class="container">
    <div class="brand">E-Kasir</div>

    <div class="mb-3 text-center">
        <a href="index.php" class="btn btn-info me-2">Beranda</a>
        <a href="tambah.php" class="btn btn-primary">+Tambah</a>
    </div>

    <div class="form-container">
        <h3>Edit Data User</h3>
        <form action="edit-proses.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3">
                <label for="id_user" class="form-label">ID User</label>
                <input type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $data['id_user']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="<?php echo $data['username']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" id="password" value="<?php echo $data['password']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" name="level" id="level" required>
                    <option value="admin" <?php if ($data['level'] == 'Admin') echo 'selected'; ?>>Admin</option>
                    <option value="user" <?php if ($data['level'] == 'User') echo 'selected'; ?>>User</option>
                </select>
            </div>

            <div class="text-end">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
