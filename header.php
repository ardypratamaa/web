<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Haxball Indonesia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/css/bootstrap.css" rel="stylesheet">
  <link href="/assets/css/custom-navbar.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/6.5.2/css/font-awesome.min.css" />
  <link rel="stylesheet" href="fab/css/font-awesome.min.css" />
  <style>
    .navbar-brand img {
      height: 70px;
      margin-top: -25px; /* Ubah nilai ini untuk menyesuaikan posisi vertikal logo */
    }
    .navbar {
      min-height: 70px; /* Sesuaikan dengan tinggi navbar */
      background-color: #071952;
    }
    .navbar-nav > li > a {
      padding-top: 25px; /* Sesuaikan dengan tinggi navbar */
      padding-bottom: 25px; /* Sesuaikan dengan tinggi navbar */
    }
    .navbar-nav .nav-link {
      color: white;
    }
    /* Warna latar belakang untuk item navbar yang aktif */
    .navbar-nav .nav-item.active {
      background-color: black;
    }
    /* Warna teks untuk item navbar yang aktif */
    .navbar-nav .nav-item.active .nav-link {
      color: white;
    }
    /* Tampilkan dropdown menu saat item dropdown di-hover */
    .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
      display: block;
    }
    /* Gaya untuk dropdown menu */
    .navbar-nav .dropdown-menu {
      margin-top: 0;
      border-radius: 0;
    }
    /* Tambahkan margin kanan untuk memberikan jarak antar item navbar */
    .navbar-nav .nav-item {
      margin-right: 15px; /* Anda dapat menyesuaikan nilai ini sesuai kebutuhan */
    }
    /* Tambahkan padding untuk menambah ruang dalam item navbar */
    .navbar-nav .nav-link {
      padding: 10px 15px; /* Sesuaikan padding sesuai kebutuhan */
    }
    /* Contoh untuk penyesuaian lebih lanjut pada hover atau focus */
    .navbar-nav .nav-link:hover, 
    .navbar-nav .nav-link:focus {
      background-color: #555; /* Warna latar belakang saat di-hover atau di-klik */
      color: white; /* Warna teks saat di-hover atau di-klik */
    }
    .navbar-nav.logout-item {
      margin-left: auto; /* Agar posisi kanan */
    }
    .navbar-nav .username-info {
      color: white;
      margin-left: 500px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="assets/img/RSI_LOGO.png" alt="Brand Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="leaderboard.php"><span class="glyphicon glyphicon-sort"></span> Leaderboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="settings.php"><span class="glyphicon glyphicon-user"></span> Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php"><span class="glyphicon glyphicon-briefcase"></span> About Us</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <?php if (isset($_SESSION['username'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
