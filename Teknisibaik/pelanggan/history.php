<?php 
session_start();

// CEK APAKAH USER SUDAH LOGIN
if (!isset($_SESSION['loginpelanggan'])) {
  header("Location: loginpelanggan.php");
  exit;
}

// mengambil nama user
$user = $_SESSION['userpelanggan'];

// set waktu local
date_default_timezone_set('Asia/Jakarta');
$waktu = date('d-m-Y H:i:s');

// menghubungkan halaman function
require '../function.php';

// query mengambil semua data di tabel orderperbaikan berdasarkan user
$perbaikan = query("SELECT * FROM orderperbaikan WHERE nama = '$user' ORDER BY id DESC ");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css" />

    <title>History Order</title>
    <style>
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #f1f1f1;
            font-weight: bold;
        }
        .btn-status {
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 0.9rem;
        }
        .history-time {
            font-size: 0.9rem;
            color: #6c757d;
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
            <li class="nav-item"><a class="nav-link active" href="dashboard.php">Beranda</a></li>
            <li class="nav-item"><a class="nav-link active" href="order.php">Order</a></li>
            <li class="nav-item"><a class="nav-link active" href="history.php">History</a></li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="#"><?= $user; ?></a></li>
            <li class="nav-item"><a class="nav-link active" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- History Section -->
    <section class="history mt-5 pt-5">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-11">
            <p class="text-muted">Terakhir Update : <?= $waktu; ?></p>
          </div>
          <div class="col-md-1 text-end">
            <a href="refresh.php" class="btn btn-primary">Refresh</a>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <?php $i=1; ?>
            <?php foreach($perbaikan as $data) : ?>
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                    <h5><i class="fas fa-tools"></i> <?= $i; ?>. Layanan Perbaikan: <?= $data["layananperbaikan"]; ?></h5>
                  </div>
                  <div class="history-time">
                    <i class="far fa-calendar-alt"></i> <?= $data["tanggal"]; ?> <?= $data["waktu"]; ?>
                  </div>
                </div>
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <h6><strong>Jenis Perbaikan:</strong> <?= $data["jenisperbaikan"]; ?></h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <span class="btn-status <?= $data['status'] === 'Selesai' ? 'btn btn-success' : 'btn btn-warning' ?>">
                        <i class="fas <?= $data['status'] === 'Selesai' ? 'fa-check-circle' : 'fa-hourglass-half' ?>"></i> <?= $data['status']; ?>
                      </span>
                      <p class="mt-2"><strong>Teknisi:</strong> <?= $data["teknisi"]; ?></p>
                    </div>
                  </div>
                  <hr>
                  <h6><i class="fas fa-user"></i> Informasi Pelanggan</h6>
                  <table class="table table-borderless">
                    <tr><td><strong>Nama:</strong></td><td><?= $data["nama"]; ?></td></tr>
                    <tr><td><strong>No. Hp:</strong></td><td><?= $data["hp"]; ?></td></tr>
                    <tr><td><strong>Alamat:</strong></td><td><?= $data["alamat"]; ?></td></tr>
                  </table>
                </div>
              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
    <!-- End History Section -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
