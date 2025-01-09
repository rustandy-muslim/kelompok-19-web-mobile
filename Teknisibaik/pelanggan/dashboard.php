<?php
session_start();
if (!isset($_SESSION['loginpelanggan'])) {
	header("Location: loginpelanggan.php");
	exit;
}

$user = $_SESSION['userpelanggan'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css" />
    <title>Dashboard Pelanggan</title>

    <style>
        body {
            background-color: #f7f9fc;
        }
        .navbar {
            background-color: #007bff;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }
        .menu-img img {
            width: 80px;
            height: auto;
            transition: transform 0.2s ease;
        }
        .menu-img:hover img {
            transform: scale(1.1);
        }
        .menu-title {
            margin-top: 8px;
            font-size: 1rem;
            color: #333;
        }
        .menu-title:hover {
            color: #007bff;
            text-decoration: none;
        }
        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="../index.html">Teknisi Baik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" href="dashboard.php">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
            <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
            <li class="nav-item"><a class="nav-link" href="ubah_biodata.php">Ubah Biodata</a></li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#"><?= $user; ?></a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Main Content -->
    <section class="container mt-5 pt-1">
        <div class="text-center mb-5">
            <h2>Perbaikan Handphone</h2>
            <hr class="mx-auto" style="width: 200px; border: 1px solid #007bff;">
        </div>
        
        <div class="card">
            <div class="card-header">Pilih Merek Handphone</div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3 col-6 menu-img">
                        <a href="order1.php?layanan=iPhone">
                            <img src="../img/Logo-Iphone.jpg" alt="iPhone">
                            <p class="menu-title">iPhone</p>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 menu-img">
                        <a href="order1.php?layanan=Samsung">
                            <img src="../img/samsung.png" alt="Samsung">
                            <p class="menu-title">Samsung</p>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 menu-img">
                        <a href="order1.php?layanan=Xiaomi">
                            <img src="../img/xiaomi log.png" alt="Xiaomi">
                            <p class="menu-title">Xiaomi</p>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 menu-img">
                        <a href="order1.php?layanan=Realme">
                            <img src="../img/Realme_logo.png" alt="Realme">
                            <p class="menu-title">Realme</p>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 menu-img mt-4">
                        <a href="order1.php?layanan=Vivo">
                            <img src="../img/vivo logo.png" alt="Vivo">
                            <p class="menu-title">Vivo</p>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 menu-img mt-4">
                        <a href="order1.php?layanan=Asus">
                            <img src="../img/logo asus.png" alt="Asus">
                            <p class="menu-title">Asus</p>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 menu-img mt-4">
                        <a href="order.php">
                            <img src="../img/titik3.png" alt="all Item">
                            <p class="menu-title">All Merk</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Main Content -->

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?= date('Y'); ?> Teknisi Baik. All rights reserved.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
