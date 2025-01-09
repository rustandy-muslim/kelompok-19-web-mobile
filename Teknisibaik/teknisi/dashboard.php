<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['login'])) {
	header("Location: loginteknisi.php");
	exit;
}

// mengambil nama dari user
$user = $_SESSION['userteknisi'];

// untuk set waktu lokal
date_default_timezone_set('Asia/Jakarta');
$waktu = date('d-m-Y H:i:s');

// menghubungkan ke halaman function
require '../function.php';

// query ambil order dimanana statusnya belum completed
$perbaikan = query("SELECT * FROM orderperbaikan WHERE teknisi = '' ORDER BY id DESC ");
?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="../style.css" />

    <style>
      body {
        background-color: #f8f9fa;
      }
      .navbar {
        background-color: #198754;
      }
      .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
      }
      .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .btn-primary, .btn-success {
        background-color: #198754;
        border: none;
      }
      .btn-primary:hover, .btn-success:hover {
        background-color: #198754b;
      }
      .card-header h5 {
        color: #198754;
        font-weight: bold;
      }
      .card-header, .card-body {
        padding: 20px;
      }
      .text-danger {
        font-size: 0.9rem;
        font-weight: 500;
      }
      table {
        font-size: 1rem;
      }
    </style>

    <title>Dashboard Teknisi</title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../index.html">Teknisi Baik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="order.php">Order Anda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="historyteknisi.php">History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="ubah_biodata_teknisi.php">Ubah Biodata</a></li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#"><?= $user; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Card History -->
    <section class="history mt-5 pt-5">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-11">
            <p>Terakhir Update: <?= $waktu ?></p>
          </div>
          <div class="col-md-1">
            <a href="refresh.php" class="btn btn-primary">Refresh</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <?php $i=1; ?>
            <?php foreach($perbaikan as $data) : ?>
            <div class="card mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-10">
                    <h5><?= $i; ?>. Layanan Perbaikan Handphone <?= $data["layananperbaikan"]; ?></h5>
                  </div>
                  <div class="col-md-2 text-end">
                    <p><?= $data["tanggal"]; ?> <?= $data["waktu"]; ?></p>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <table>
                      <tr>
                        <td><strong>Jenis Perbaikan</strong></td>
                        <td>: <?= $data['jenisperbaikan']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Status</strong></td>
                        <td>: <?= $data['status']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Teknisi</strong></td>
                        <td>: <?= $data['teknisi']; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-2 text-center">
                     <a href="ambilorder.php?id=<?= $data["id"]; ?>" class="btn btn-success mb-2" onclick="return confirm('Anda yakin?')">Ambil Order</a> 
                     <p class="text-danger">*Pastikan menghubungi pelanggan sebelum mengambil order</p>
                  </div>
                </div>
                
                <hr>
                <h5 class="card-title">Identitas Pelanggan</h5>
                <table>
                  <tr>
                    <td><strong>Atas Nama</strong></td>
                    <td>: <?= $data["nama"]; ?></td>
                  </tr>
                  <tr>
                    <td><strong>No. Hp</strong></td>
                    <td>: <?= $data["hp"]; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Alamat</strong></td>
                    <td>: <?= $data["alamat"]; ?></td>
                  </tr>
                </table>
              </div>
            </div>
             <?php $i++; ?>
             <?php endforeach; ?>
          </div>  
        </div>
      </div>
    </section>
    <!-- Akhir Card History -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
