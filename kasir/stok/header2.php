<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
        margin: 0;
        padding: 45px;
      }
    </style>
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
    <?php
    $dashboard_link = '#';

// Cek level user dari session
if (isset($_SESSION['level'])) {
  if ($_SESSION['level'] == 'Admin') {
    $dashboard_link = '../stok/index.php';
  } elseif ($_SESSION['level'] == 'User') {
    $dashboard_link = '../produk/index.php';
  }
}
?>
<a class="navbar-brand" href="<?= $dashboard_link ?>" style="cursor: pointer;">
<i class="bi bi-arrow-left-circle-fill fs-4"></i> Kasir
</a>
     
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
