<?php
include 'koneksi_06959_fais.php';

// Pagination setup
$limit = 5; // Number of data per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$start = ($page > 1) ? ($page * $limit) - $limit : 0; // Calculate starting data

// Query to count total data
$result_total = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM matkul");
$total_data = mysqli_fetch_assoc($result_total)['total'];

// Calculate total pages
$total_pages = ceil($total_data / $limit);

// Query to fetch data with limit
$result = mysqli_query($koneksi, "SELECT * FROM matkul LIMIT $start, $limit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" />
    <style>
        body {
            background-image: url('inigambar.jpg');
            background-size: cover;
            background-attachment: fixed;
        }
        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            overflow-x: auto; /* For responsive table */
        }
        .pagination {
            justify-content: flex-start;
        }
        .table th, .table td {
            vertical-align: middle; /* Center text vertically */
            padding: 15px; /* Add padding for better spacing */
        }
        .table td, .table th {
            text-align: center; /* Default is center */
        }
        .action-links a {
            margin-right: 5px;
            font-size: 12px;
            padding: 5px 10px;
        }
        .data-container {
            background-color: #f9f9f9;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: bold;
            letter-spacing: 1px;
            background: linear-gradient(45deg, #4caf50, #03a9f4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .custom-heading {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
            color: transparent;
            background: linear-gradient(45deg, #4caf50, #03a9f4);
            -webkit-background-clip: text;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);
        }
        .table {
            table-layout: auto; /* Adjust table width to fit data */
            width: 100%; /* Make table responsive */
        }
        /* Responsive Design for Table */
        @media (max-width: 768px) {
            .table th, .table td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <!-- Brand (Dashboard Admin) -->
        <a class="navbar-brand text-gradient" href="#">
            <i class="fas fa-tachometer-alt me-2"></i>Dashboard Admin
        </a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Daftar Mahasiswa -->
                <li class="nav-item">
                    <a class="nav-link px-3" href="dashboard_mahasiswa_06959_fais.php">
                        <i class="fas fa-user-graduate me-2"></i>Daftar Mahasiswa
                    </a>
                </li>

                <!-- Daftar Dosen -->
                <li class="nav-item">
                    <a class="nav-link px-3" href="dashboard_dosen_06959_fais.php">
                        <i class="fas fa-chalkboard-teacher me-2"></i>Daftar Dosen
                    </a>
                </li>

                <!-- Data Mata Kuliah -->
                <li class="nav-item">
                    <a class="nav-link px-3" href="dashboard_matkul_06959_fais.php">
                        <i class="fas fa-book me-2"></i>Data Mata Kuliah
                    </a>
                </li>

                <!-- Data KRS -->
                <li class="nav-item">
                    <a class="nav-link px-3" href="dashboard_kultawar_06959_fais.php">
                        <i class="fas fa-calendar-check me-2"></i>Data Kuliah tawar
                    </a>
                </li>

                <!-- Logout Button -->
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-danger nav-link text-white rounded-pill px-4" href="index.php">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Navbar Background */
    .navbar {
        background-color: #343a40;
        transition: all 0.3s ease-in-out;
    }

    /* Navbar Brand */
    .navbar-brand {
        font-family: 'Poppins', sans-serif;
        font-size: 1.8rem;
        font-weight: bold;
        letter-spacing: 1px;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.1);
    }

    /* Gradient effect */
    .text-gradient {
        background: linear-gradient(45deg, #4caf50, #03a9f4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Hover effect for links */
    .nav-link {
        font-weight: 500;
        transition: color 0.3s, background-color 0.3s;
    }

    .nav-link:hover {
        background-color: #495057;
        color: #fff;
        border-radius: 10px;
    }

    /* Button style */
    .btn-danger.nav-link {
        font-size: 0.9rem;
        font-weight: 500;
        padding: 0.5rem 1rem;
    }

    .btn-danger.nav-link:hover {
        background-color: #ff4d4d;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* Adjust Logout Button for Large Screens */
    @media (min-width: 992px) {
        .ms-lg-3 {
            margin-left: auto !important;
        }
    }
</style>
<div class="container">
    <h2 class="text-center my-4 custom-heading">Daftar Mata Kuliah</h2>
    <div class="text-center"><a class="btn btn-primary btn-lg shadow-lg rounded-pill text-white" href="printmatkul_06959_fais.php"><i class="fas fa-print me-2"></i>Print</a></div>
    <div class="d-flex justify-content-between mb-4">
        <a href="tambah_matkul_06959_fais.php" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Mata Kuliah</a>
        <form class="form-inline" role="search">
            <input class="form-control mr-2" type="search" id="searchInput" placeholder="Cari mata kuliah..." aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </form>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Jenis</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr class="data-container">
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['kodematkul']; ?></td>
                            <td><?= $row['namamatkul']; ?></td>
                            <td><?= $row['sks']; ?></td>
                            <td><?= $row['jns']; ?></td>
                            <td><?= $row['smt']; ?></td>
                            <td class="action-links">
                                <a href="editmatkul_06959_fais.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="hapusmatkul_06959_fais.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <nav>
        <ul class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

</body>
</html>
