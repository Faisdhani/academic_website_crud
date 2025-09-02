<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['status'] != 'admin') {
    header('Location: iindex_06959.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
       body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fc; /* Background putih terang */
    color: #333;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Navbar Styling */
.navbar {
    background: linear-gradient(90deg, #326da8, #508bce);
    padding: 1px 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.navbar h1 {
    font-size: 24px;
    text-align: center;
    flex-grow: 1;
}

/* Container Styling */
.container {
    padding: 40px;
    max-width: 800px;
    margin: 40px auto;
    background-color: rgba(255, 255, 255, 0.8); /* Latar belakang semi transparan */
    border-radius: 15px;
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.container h2 {
    font-size: 30px;
    color: #326da8;
    margin-bottom: 20px;
}

.container p {
    font-size: 18px;
    color: #555;
    margin-bottom: 30px;
}

/* Dashboard Cards Layout */
.dashboard {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
}

.dashboard .card {
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    padding: 30px;
    width: 280px;
    text-align: center;
    backdrop-filter: blur(6px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

.dashboard .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

.card h3 {
    font-size: 22px;
    color: #508bce;
    margin-bottom: 15px;
}

.card p {
    font-size: 15px;
    color: #666;
    margin-bottom: 20px;
}

.card a {
    display: inline-block;
    background-color: #326da8;
    color: white;
    padding: 12px 20px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.card a:hover {
    background-color: #508bce;
}

/* Footer Styling */
footer {
    margin-top: auto;
    background-color: #326da8;
    color: #eee;
    text-align: center;
    padding: 12px 0;
    font-size: 12px;
    box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
}
    </style>
</head>
<body>
  

    <!-- Container -->
    <div class="container">
        <h2>Selamat Datang, Admin <?php echo $_SESSION['username']; ?>!</h2>
        <p>Gunakan panel di bawah untuk mengelola sistem.</p>
        
        <!-- Dashboard Cards -->
        <div class="dashboard">
            <div class="card">
                <h3>Data Mahasiswa</h3>
                <p>Tambah, edit, atau hapus mahasiswa dari sistem.</p>
                <a href="dashboard_mahasiswa_06959_fais.php">Lihat Data</a>
            </div>

            <div class="card">
                <h3>Data Dosen</h3>
                <p>Tambah, edit, atau hapus dosen dari sistem.</p>
                <a href="dashboard_dosen_06959.php_fais">Lihat Data</a>
            </div>
            <div class="card">
                <h3>Data Mata Kuliah</h3>
                <p>Tambah, edit, atau hapus dosen dari sistem.</p>
                <a href="dashboard_matkul_06959.php_fais">Lihat Data</a>
            </div><div class="card">
                <h3>Data KRS</h3>
                <p>Tambah, edit, atau hapus dosen dari sistem.</p>
                <a href="dashboard_kultawar_06959_fais.php">Lihat Data</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2025 Admin Dashboard. All Rights Reserved.
    </footer>
</body>
</html>
