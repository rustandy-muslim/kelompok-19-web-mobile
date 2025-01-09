<?php
require '../function.php';
require '../Mail/phpmailer/PHPMailerAutoload.php';

if (isset($_POST['check_email'])) {
    $email = $_POST['email'];

    // Periksa apakah email terdaftar
    $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        $email_found = true;
    } else {
        $error = "Email tidak ditemukan.";
    }
}

if (isset($_POST['set_password'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    // Hash password baru
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update password di database
    $stmt_update = $conn->prepare("UPDATE pelanggan SET password = ? WHERE email = ?");
    $stmt_update->bind_param("ss", $hashed_password, $email);
    if ($stmt_update->execute()) {
        // Kirim konfirmasi via email dengan PHPMailer
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'saddansatria23@gmail.com'; // Ganti dengan email pengirim
        $mail->Password = 'eitzqyhgnfmhuitj'; // Ganti dengan password email pengirim

        $mail->setFrom('saddansatria23@gmail.com', 'Password Reset');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Password Anda Telah Diperbarui';
        $mail->Body = '<p>Password Anda telah berhasil diperbarui. Silakan gunakan password baru Anda untuk login ke akun Anda.</p>';

        if (!$mail->send()) {
            echo 'Gagal mengirim email. Error: ' . $mail->ErrorInfo;
        } else {
            echo "<script>alert('Password baru berhasil diperbarui dan telah dikirim ke email Anda.');</script>";
            header("Location: loginpelanggan.php");
            exit();
        }
    } else {
        echo "<script>alert('Gagal memperbarui password di database.');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-control {
            margin-bottom: 1rem;
        }
        .btn-primary {
            background-color: #198754;
            border-color: #198754;
        }
        .btn-primary:hover {
            background-color: #157347;
        }
        .text-danger {
            color: #dc3545 !important;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center mb-4">Reset Kata Sandi</h2>
    
    <?php if (!isset($email_found) && !isset($_POST['set_password'])): ?>
    <form method="POST">
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
        <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
        <button type="submit" name="check_email" class="btn btn-primary w-100">Cek Email</button>
    </form>
    <?php endif; ?>

    <?php if (isset($email_found)): ?>
    <form method="POST">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <input type="password" name="new_password" class="form-control" placeholder="Masukkan password baru" required>
        <button type="submit" name="set_password" class="btn btn-primary w-100">Setel Password</button>
    </form>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
