<?php
  require '../function.php';
  
  if (isset($_POST['daftar'])) {
    if (registrasiP($_POST) > 0) {
      echo "
        <script>
        alert('User baru berhasil ditambahkan');
        document.location.href = 'loginpelanggan.php';
        </script>
       ";
    } else {
      echo mysqli_error($conn);
    }
  }
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
        background-color: #f5f7fa;
      }
      .form-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 40px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      .btn-primary {
        background-color: #08107C;
        border: none;
      }
      .btn-primary:hover {
        background-color: #07106b;
      }
      h2 {
        font-weight: 700;
        color: #08107C;
      }
    </style>

    <title>Halaman Registrasi Pelanggan</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #08107C;">
      <div class="container">
        <a class="navbar-brand" href="../index.html">Teknisi Baik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="order.php">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="history.php">History</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="loginpelanggan.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Form Registrasi -->
    <section class="mt-5 pt-5 mb-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="form-container">
              <h2 class="text-center">Registrasi Pelanggan</h2>
              <form action="" method="post">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" id="username" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="daftar" class="btn btn-primary w-100">Daftar</button>
                <p class="mt-3 text-center">Sudah punya akun? <a href="loginpelanggan.php">Login disini</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Form Registrasi -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
