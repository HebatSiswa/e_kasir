<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Data User </title>
    <link rel="shortcut icon" href="assets/img/logo.ico" type="image/x-icon"/>
   
  </head>
  <body>

<!-- NAVBAR START -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <!-- LOGO AND BACK BUTTON -->
      <h4 href="index.php"  class="navbar-brand">Kasir</h4>
      
      <!-- SEARCH FORM -->
      <div class="container">
        <form class="d-flex ms-auto" action="index.php" method="POST">
          <input class="form-control me-2" type="search" name="keyword" placeholder="Cari Pengguna" aria-label="Search" autofocus>
          <button class="btn btn-transparant" type="submit" name="cari"><i class="bi bi-search"></i></button>
        </form>
      </div>

      <!-- NAVIGATION LINKS -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Data User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="tambah.php">Tambah User</a>
          </li>
          
          <!-- LOGOUT ICON -->
          <li class="nav-item">
            <a class="nav-link" href="../logout.php" title="Logout" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Logout">
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- NAVBAR END -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
