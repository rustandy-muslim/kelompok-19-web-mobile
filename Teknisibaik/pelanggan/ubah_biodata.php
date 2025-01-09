<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "reparasihp");
session_start();
// Cek koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Ambil data user berdasarkan ID (contoh menggunakan ID 15)
$id = $_SESSION['userid']; // ID pelanggan yang ingin diedit
$query = "SELECT * FROM pelanggan WHERE id = $id";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    die("Data tidak ditemukan atau query gagal: " . mysqli_error($conn));
}

// Proses update biodata
if (isset($_POST['update'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);

    $updateQuery = "UPDATE pelanggan SET 
                    nama = '$nama',
                    username = '$username',
                    email = '$email'
                    WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>
                alert('Biodata berhasil diupdate!');
                document.location.href = 'ubah_biodata.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
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

    <title>Ubah Biodata</title>
  </head>
  <body>
    <div class="container mt-5">
        <h2 class="text-center">Ubah Biodata</h2>
        <form action="" method="post" class="mt-4">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?= isset($user['nama']) ? $user['nama'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="<?= isset($user['username']) ? $user['username'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="<?= isset($user['email']) ? $user['email'] : ''; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary w-100">Update Biodata</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
