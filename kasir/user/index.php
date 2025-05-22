<?php
include "header.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    body {
      padding-top: 100px; 
    }
    .input-group {
      max-width: 500px;
      margin: 0 auto 30px auto;
    }
    .table th, .table td {
      vertical-align: middle;
      text-align: center;
    }
    .btn {
      min-width: 60px;
    }
  </style>
</head>
<body>
  <div class="container">

    <!-- Pencarian -->
    

    <!-- Tabel Data User -->
    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
          <thead class="table-light">
            <tr>
              <th>ID User</th>
              <th>Username</th>
              <th>Password</th>
              <th>Level</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('../koneksi.php');

              $keyword = '';
              if (isset($_POST['cari'])) {
                  $keyword = $_POST['keyword'];
              }

              $query = "SELECT * FROM user WHERE username LIKE '%$keyword%' OR id_user LIKE '%$keyword%' OR level LIKE '%$keyword%'";
              $result = mysqli_query($koneksi, $query);

              if (mysqli_num_rows($result) == 0) {
                  echo '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>';
              } else {
                  while ($data = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>' . ($data['id_user']) . '</td>';
                      echo '<td>' . ($data['username']) . '</td>';
                      echo '<td>' . ($data['password']) . '</td>';
                      echo '<td>' . ($data['level']) . '</td>';
                      echo '<td>
                              <a class="btn btn-primary btn-sm me-1" href="edit.php?id=' . $data['id_user'] . '">Edit</a>
                              <a class="btn btn-danger btn-sm" href="hapus.php?id=' . $data['id_user'] . '" onclick="return confirm(\'Yakin ingin menghapus?\')">Hapus</a>
                            </td>';
                      echo '</tr>';
                  }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
