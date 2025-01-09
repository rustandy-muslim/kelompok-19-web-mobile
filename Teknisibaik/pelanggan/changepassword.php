<?php
require '../function.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Cek token valid
    $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE reset_token = '$token' AND reset_expires > NOW()");
    if (mysqli_num_rows($result) > 0) {
        if (isset($_POST['submit'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Update password di database
            mysqli_query($conn, "UPDATE pelanggan SET password = '$password', reset_token = NULL, reset_expires = NULL WHERE reset_token = '$token'");

            echo "Kata sandi berhasil diubah. <a href='loginpelanggan.php'>Login sekarang</a>";
            exit;
        }
    } else {
        echo "Token tidak valid atau sudah kedaluwarsa.";
        exit;
    }
} else {
    echo "Token tidak ditemukan.";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Kata Sandi</title>
</head>
<body>
    <h2>Ganti Kata Sandi</h2>
    <form action="" method="post">
        <input type="password" name="password" placeholder="Masukkan kata sandi baru" required>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
