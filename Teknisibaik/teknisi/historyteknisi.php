<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    header("Location: loginteknisi.php");
    exit;
}

// Ambil nama user
$user = $_SESSION['userteknisi'];

// Menghubungkan ke function
require '../function.php';

// Query untuk menampilkan data
$perbaikan = query("SELECT * FROM orderperbaikan WHERE teknisi = '$user' ORDER BY id DESC");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .card-header {
            background-color: #e9ecef;
            font-weight: bold;
            color: #495057;
            border-bottom: 2px solid #ced4da;
        }
        .history h3 {
            color: #198754;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #198754;
            border-color: #198754;
        }
        .btn-primary:hover {
            background-color: #157347;
            border-color: #157347;
        }
    </style>
    <title>History Teknisi</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../index.html"><i class="fas fa-tools"></i> Teknisi Baik</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">Order Anda</a></li>
                <li class="nav-item"><a class="nav-link active" href="historyteknisi.php">History</a></li>
                <li class="nav-item"><a class="nav-link active" href="ubah_biodata_teknisi.php">ubah biodata</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link"><i class="fas fa-user"></i> <?= $user; ?></a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="history mt-5 pt-5">
    <div class="container">
        <h3><i class="fas fa-history"></i> History Teknisi</h3>
        <?php foreach ($perbaikan as $data): ?>
        <div class="card mb-3">
            <div class="card-header">
                <?= $data['layananperbaikan']; ?> - <span class="badge bg-<?= $data['status'] === 'Selesai' ? 'success' : ($data['status'] === 'Proses' ? 'warning' : 'danger'); ?>"><?= $data['status']; ?></span>
            </div>
            <div class="card-body">
                <p><i class="fas fa-tools"></i> <strong>Jenis Perbaikan:</strong> <?= $data['jenisperbaikan']; ?></p>
                <p><i class="fas fa-user"></i> <strong>Nama:</strong> <?= $data['nama']; ?></p>
                <p><i class="fas fa-phone"></i> <strong>No. HP:</strong> <?= $data['hp']; ?></p>
                <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> <?= $data['alamat']; ?></p>
                <p><i class="fas fa-calendar-alt"></i> <strong>Waktu:</strong> <?= $data['tanggal'] . ' ' . $data['waktu']; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
