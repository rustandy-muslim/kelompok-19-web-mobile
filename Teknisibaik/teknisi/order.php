<?php
session_start();

// cek user sudah login belum
if (!isset($_SESSION['login'])) {
	header("Location: loginteknisi.php");
	exit;
}

// ambil nama dari user
$user = $_SESSION['userteknisi'];

// menghubungkan ke halaman function
require '../function.php';

// query untuk menampilkan data dari tebel order perbaikan dimana teknisi = user dan statusnya dalam penganan
$perbaikan = query("SELECT * FROM orderperbaikan WHERE teknisi = '$user' && status = 'Dalam Penanganan' ORDER BY id DESC ");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css" />

    <title>Dashboard Teknisi</title>
    <style>
        .card { 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }
        .card-header { 
            background-color: #f8f9fa; 
            font-weight: bold; 
        }
        .btn-custom { 
            display: flex; 
            align-items: center; 
            gap: 5px;
        }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../index.html">Teknisi Baik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="order.php">Order Anda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="historyteknisi.php">History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="ubah_biodata_teknisi.php">ubah biodata</a>
            </li>
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
    <!-- End Navbar -->

    <!-- Card History -->
    <section class="history mt-5 pt-5">
    <?php $i = 1; ?>
    <?php foreach($perbaikan as $data) : ?>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-10">
                    <h5><i class="fas fa-tools"></i> <?= $i; ?>. Layanan Perbaikan Handphone <?= $data["layananperbaikan"]; ?></h5>
                  </div>
                  <div class="col-md-2 text-end">
                    <p><i class="far fa-calendar-alt"></i> <?= $data["tanggal"]; ?> <?= $data["waktu"]; ?></p>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <table class="table table-borderless">
                      <tr><td>Jenis Perbaikan:</td><td><?= $data['jenisperbaikan']; ?></td></tr>
                      <tr><td>Status:</td><td><span class="badge bg-warning"><?= $data['status']; ?></span></td></tr>
                      <tr><td>Teknisi:</td><td><?= $data['teknisi']; ?></td></tr>
                    </table>
                  </div>
                  <div class="col-md-3 d-flex flex-column align-items-end">
                    <a href="completed.php?id=<?= $data["id"]; ?>" class="btn btn-success btn-custom mb-2" onclick="return confirm('Anda yakin?')"><i class="fas fa-check"></i> Complete</a>
                    <a href="canceled.php?id=<?= $data["id"]; ?>" class="btn btn-danger btn-custom" onclick="return confirm('Anda yakin?')"><i class="fas fa-times"></i> Cancel</a>
                  </div>
                </div>
                <hr>
                <table cellspacing="" cellpadding="5">
                  <tr>
                    <td>Atas Nama </td>
                    <td>: <?= $data["nama"]; ?></td>
                  </tr>
                  <tr>
                    <td>No. Hp </td>
                    <td>: <?= $data["hp"]; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat </td>
                    <td>: <?= $data["alamat"]; ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>  
        </div>
      </div>
      <?php $i++; ?>
      <?php endforeach; ?>
    </section>
    
    <!-- End Card History -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
