<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            padding-top: 50px;
        }

       
    </style>
</head>
<body>

<div class="container">
   

    <div class="form-container">
        <h3>Tambah Data User</h3>
        <form action="tambah_proses.php" method="post">
            <div class="mb-3">
                <label for="id_user" class="form-label">ID User</label>
                <input type="text" class="form-control" name="id_user" id="id_user" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" name="level" id="level" required>
                    <option value="admin">Admin</option>
                    <option value="user">Kasir</option>
                </select>
            </div>

            <div class="text-end">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
