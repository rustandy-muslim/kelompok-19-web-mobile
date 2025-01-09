<?php

  require '../function.php';
  if (isset($_POST['daftar'])) {
    if (registrasiT($_POST) > 0) {
      echo "
        <script>
        alert('user baru berhasil ditambahkan');
        document.location.href = 'loginteknisi.php';
  
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
    <title>Halaman Registrasi Teknisi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    
    <style>
      body {
        background-color: #f7f9fc;
        font-family: Arial, sans-serif;
      }
      .form-container {
        max-width: 500px;
        margin: 4rem auto;
        padding: 2rem;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }
      .form-title {
        font-weight: bold;
        color: #08107C;
        margin-bottom: 1.5rem;
        text-align: center;
      }
      .form-label {
        font-weight: 500;
        color: #333333;
      }
      .form-control:focus {
        box-shadow: 0 0 5px rgba(8, 16, 124, 0.2);
        border-color: #08107C;
      }
      .btn-primary {
        background-color: #08107C;
        border: none;
        font-weight: 600;
        width: 100%;
      }
      .btn-primary:hover {
        background-color: #334699;
      }
      .form-text a {
        color: #08107C;
        text-decoration: none;
        font-weight: 500;
      }
      .form-text a:hover {
        text-decoration: underline;
      }
      .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
      }
    </style>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../index.html">
          <i class="bi bi-gear-fill"></i> Teknisi Baik
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="dashboard.php">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="order.php">Order Anda</a></li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="loginteknisi.php">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Registration Form -->
    <section class="pt-5 mt-5">
      <div class="container form-container">
        <h2 class="form-title">Registrasi Teknisi</h2>
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
          <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
            
          </div>
          <div class="mb-3">
            <label class="form-label">Bidang Keahlian</label>
            <select class="form-select" name="keahlian" aria-label="Default select example" required>
              <option value="" disabled selected>--Pilih Bidang Keahlian--</option>
              <option value="teknisi mobil">Teknisi Handphone</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
          </div>
          <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
          <p class="mt-3 form-text">Sudah punya akun? <a href="loginteknisi.php">Login disini</a></p>
        </form>
      </div>
    </section>
    <!-- End Registration Form -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
