<?php 

session_start();
if (!isset($_SESSION['loginpelanggan'])) {
  header("Location: loginpelanggan.php");
  exit;
}

$user = $_SESSION['userpelanggan'];
$layananPerbaikan = isset($_GET['layanan']) ? $_GET['layanan'] : ''; // Check if 'layanan' is set

require '../function.php';

if (isset($_POST['kirim'])) {
  if (order($_POST) > 0) {
    echo "<script>
      alert('Permintaan berhasil dikirim');
      document.location.href = 'history.php';
    </script>";
  } else {
    echo "<script>
      alert('Permintaan gagal dikirim');
      document.location.href = 'history.php';
    </script>";
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Halaman Order</title>

  <style>
    body {
      background-color: #f7f7f7;
      padding-top: 80px;
    }
    .form-container {
      background-color: #ffffff;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .btn-custom {
      background-color: #007bff;
      color: white;
      border: none;
      transition: background-color 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #0056b3;
    }
    .navbar {
      background-color: #007bff;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="../index.html">Teknisi Baik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="dashboard.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
        <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#"><?= $user; ?></a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<section class="Order mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto form-container">
        <h3 class="text-center mb-4">Form Permintaan Perbaikan</h3>
        <form action="" method="post">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?= $user; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="hp" class="form-label">No. HP</label>
            <input type="text" name="hp" class="form-control" id="hp" required>
          </div>
          <div class="mb-3">
            <label for="layananPerbaikan" class="form-label">Merek Handphone</label>
            <input type="text" name="layananPerbaikan" class="form-control" id="layananPerbaikan" value="<?= $layananPerbaikan; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="jenisPerbaikan" class="form-label">Jenis Perbaikan</label>
            <input type="text" name="jenisPerbaikan" class="form-control" id="jenisPerbaikan" required>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" required>
          </div>
          <div class="mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            <input type="time" name="waktu" class="form-control" id="waktu" required>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" rows="3" required></textarea>
          </div>
          <input type="hidden" name="status" value="Menunggu Teknisi">
          <input type="hidden" name="teknisi" value="">
          <button type="submit" name="kirim" class="btn btn-custom w-100">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
