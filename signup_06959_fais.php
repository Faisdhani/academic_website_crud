<?php
// Sertakan file koneksi
include('koneksi_06959_fais.php');

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Enkripsi password
    $status = $_POST['status'];

    // Pastikan koneksi berhasil
    if ($koneksi) {
        // Cek apakah username sudah digunakan
        $checkQuery = "SELECT * FROM user WHERE username='$username'";
        $checkResult = mysqli_query($koneksi, $checkQuery);

        if (!$checkResult) {
            die("Query gagal: " . mysqli_error($koneksi));
        }

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>alert('Username sudah digunakan. Silakan pilih username lain.'); window.location.href='signup_06959_fais.php';</script>";
        } else {
            // Masukkan data baru ke tabel user
            $insertQuery = "INSERT INTO user (username, password, status) VALUES ('$username', '$password', '$status')";
            if (mysqli_query($koneksi, $insertQuery)) {
                echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href='iindex_06959_fais.php';</script>";
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        }
    } else {
        echo "<script>alert('Gagal terhubung ke database.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        form {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            width: 400px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        input, select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
        }
        button {
            background-color: #1845ad;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="signup_06959_fais.php" method="POST">
        <h3>Daftar Akun</h3>
        <label>Username:</label>
        <input type="text" name="username" required placeholder="Masukkan username">
        <label>Password:</label>
        <input type="password" name="password" required placeholder="Masukkan password">
        <label>Status:</label>
        <select name="status" required>
            <option value="mhs">Mahasiswa</option>
            <option value="dosen">Dosen</option>
            <option value="admin">Administrator</option>
        </select>
        <button type="submit" name="signup">Daftar</button>
    </form>
</body>
</html>
