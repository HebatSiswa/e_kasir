<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <style>
      body {
        padding: 40px;
        font-family: arial;
      }
    .barang:hover {
      border:1px solid blue;
      box-sizing: border-box;
    }
    </style>

    <title>KASIR</title>
    <link rel="shortcut icon" href="assets/img/logo.ico" type="image/x-icon"/>
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
      <div class="container">
    <form class="d-flex mb-1" action="index.php" method="POST">
      <input class="form-control me-2" type="search" name="keyword" placeholder="Cari nota..." aria-label="Search" autofocus>
      <button class="btn btn-primary" type="submit" name="cari"><i class="bi bi-search"></i></button>
    </form>
    </div>
      <a class="navbar-brand" href="../laporan.php" >
      <i class="bi bi-file-earmark-text"></i> Laporan
    </div>
  </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>