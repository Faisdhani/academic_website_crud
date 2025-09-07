<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home - Sistem Informasi Akademik</title>
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

    /* Features Section */
    .features {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-around;
        margin-bottom: 30px;
    }
    .feature {
        text-align: center;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        flex: 1 1 250px;
    }
    .feature i {
        font-size: 3rem;
        color: #007bff;
    }
    .feature h3 {
        margin-top: 10px;
        font-weight: 600;
        font-size: 1.5rem;
    }
    .feature p {
        font-size: 1rem;
        line-height: 1.5;
    }
    .feature:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }

    .features-right {
        display: flex;
        flex: 1 1 auto;
        gap: 20px;
        justify-content: space-between;
        align-items: center;
    }

    .feature-right {
        text-align: center;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        width: 45%;
    }
    .feature-right i {
        font-size: 3rem;
        color: #007bff;
    }
    .feature-right h3 {
        margin-top: 10px;
        font-weight: 600;
        font-size: 1.5rem;
    }
    .feature-right p {
        font-size: 0.9rem;
        line-height: 1.4;
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
        background-color: #343a40;
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.3s;
    }
    .login-button a:hover {
        background-color: #212529;
        transform: scale(1.05);
    }

    /* Animated GIF */
    .animated-gif {
        text-align: center;
        margin-top: 30px;
    }
</style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <h1>Sistem Informasi Akademik</h1>
            <p>Selamat datang di portal Sistem Informasi Akademik</p>
        </div>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <section class="features">
            <div class="feature">
                <i class="fas fa-users"></i>
                <h3>Mahasiswa</h3>
                <p>Informasi lengkap tentang data mahasiswa</p>
            </div>
            <div class="feature">
                <i class="fas fa-chalkboard-teacher"></i>
                <h3>Dosen</h3>
                <p>Informasi lengkap tentang data dosen</p>
            </div>
            <div class="feature">
                <i class="fas fa-book-open"></i>
                <h3>Administrator</h3>
                <p>Informasi data mahasiswa & dosen</p>
            </div>
            <div class="feature-right">
                <i class="fas fa-graduation-cap"></i>
                <h3>Mata Kuliah</h3>
                <p>Informasi jadwal dan deskripsi mata kuliah.</p>
            </div>
            <div class="feature-right">
                <i class="fas fa-calendar-alt"></i>
                <h3>Kuliah Tawar</h3>
                <p>Perencanaan mata kuliah mahasiswa.</p>
            </div>
           
        </section>
        <!-- Login Button -->
        <div class="login-button">
            <a href="iindex_06959_fais.php" class="btn btn-secondary">Login</a>
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
