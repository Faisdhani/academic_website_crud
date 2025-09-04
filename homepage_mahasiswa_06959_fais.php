<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Selamat Datang Mahasiswa</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
    /* Global CSS */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f7f9;
        color: #343a40;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 900px;
        margin: auto;
        padding: 20px;
    }
    h1, h3 {
        text-align: center;
    }

    /* Header Section */
    .header {
        background: linear-gradient(45deg, #007bff, #6c757d);
        color: #ffffff;
        padding: 20px 0;
        margin-bottom: 30px;
        text-align: center;
        border-radius: 8px;
    }
    .header h1 {
        font-weight: 700;
        font-size: 2.5rem;
    }

    /* Welcome Section */
    .welcome {
        text-align: center;
        background-color: #ffffff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .welcome h2 {
        font-weight: 600;
        color: #007bff;
    }
    .welcome p {
        font-size: 1.1rem;
        color: #6c757d;
    }

    /* Footer Section */
    .footer {
        text-align: center;
        margin-top: 50px;
        padding: 20px 0;
        background: linear-gradient(45deg, #6c757d, #343a40);
        color: #ffffff;
        border-radius: 8px;
    }
    .footer p {
        margin-bottom: 0;
    }

    /* Login Button */
    .login-button {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }
    .login-button a {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.3s;
    }
    .login-button a:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }
</style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <h1>Selamat Datang Mahasiswa</h1>
        </div>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <div class="welcome">
            <h2>Halo Mahasiswa!</h2>
            <p>Selamat datang di portal Sistem Informasi Akademik. Gunakan platform ini untuk mengakses informasi akademik, perencanaan KRS, jadwal mata kuliah, dan lain-lain.</p>
        </div>

        <!-- Login Button -->
        <div class="login-button">
            <a href="mahasiswa_dashboard.php" class="btn btn-primary">Masuk ke Dashboard</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Sistem Informasi Akademik. Al2.2022.06959. Muhammad Fais Ramadhani</p>
    </footer>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
