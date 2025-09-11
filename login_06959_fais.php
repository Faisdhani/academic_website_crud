<?php
    session_start();
    include('koneksi_06959_fais.php');

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // Query untuk mengecek username dan password
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['status'] = $row['status'];

            // Redirect sesuai status user
            if ($row['status'] == 'mhs') {
                header('Location: homepage_mahasiswa_06959_fais.php');
            } elseif ($row['status'] == 'dosen') {
                header('Location: homepage_dosen_06959_fais.php');
            } elseif ($row['status'] == 'admin') {
                header('Location: homepage_admin_06959_fais.php');
            }
            exit();
        } else {
            // Login gagal
            echo "<script>alert('Login gagal! Username atau password salah.'); window.location.href='iindex_06959_fais.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="login_06959_fais.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
