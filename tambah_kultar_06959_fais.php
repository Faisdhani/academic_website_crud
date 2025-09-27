<?php
include 'koneksi_06959_fais.php';

// Query untuk mendapatkan data dari database
$query_matkul = "SELECT namamatkul FROM matkul";
$query_dosen = "SELECT namadosen FROM dosen";
$query_jamkul = "SELECT DISTINCT jamkul FROM kultawar";
$query_ruang = "SELECT DISTINCT ruang FROM kultawar";

// Eksekusi query
$result_matkul = mysqli_query($koneksi, $query_matkul);
$result_dosen = mysqli_query($koneksi, $query_dosen);
$result_jamkul = mysqli_query($koneksi, $query_jamkul);
$result_ruang = mysqli_query($koneksi, $query_ruang);

// Tambah data ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matkul = $_POST['matkul'];
    $dosen = $_POST['dosen'];
    $klp = $_POST['klp'];
    $hari = $_POST['hari'];
    $jamkul = $_POST['jamkul'];
    $ruang = $_POST['ruang'];

    $query_insert = "INSERT INTO kultawar (matkul, dosen, klp, hari, jamkul, ruang)
                     VALUES ('$matkul', '$dosen', '$klp', '$hari', '$jamkul', '$ruang')";
    if (mysqli_query($koneksi, $query_insert)) {
        // Redirect ke halaman dashboard setelah berhasil menambahkan data
        header("Location: dashboard_kultawar_06959_fais.php");
        exit; // Stop script after redirect
    } else {
        $error_message = "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kuliah Tawar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Tambah Kuliah Tawar</h2>

    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php elseif (isset($success_message)): ?>
        <div class="alert alert-success"><?= $success_message; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="matkul">Nama Mata Kuliah</label>
            <select name="matkul" id="matkul" class="form-control" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php while ($row = mysqli_fetch_assoc($result_matkul)): ?>
                    <option value="<?= $row['namamatkul']; ?>"><?= $row['namamatkul']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="dosen">Nama Dosen</label>
            <select name="dosen" id="dosen" class="form-control" required>
                <option value="">-- Pilih Dosen --</option>
                <?php while ($row = mysqli_fetch_assoc($result_dosen)): ?>
                    <option value="<?= $row['namadosen']; ?>"><?= $row['namadosen']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="klp">Kelompok</label>
            <select name="klp" id="klp" class="form-control" required>
                <option value="">-- Pilih Kelompok --</option>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <option value="A12.62<?= sprintf('%02d', $i); ?>">A12.62<?= sprintf('%02d', $i); ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="hari">Hari Kuliah</label>
            <select name="hari" id="hari" class="form-control" required>
                <option value="">-- Pilih Hari --</option>
                <?php foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari): ?>
                    <option value="<?= $hari; ?>"><?= $hari; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="jamkul">Jam Kuliah</label>
            <select name="jamkul" id="jamkul" class="form-control" required>
                <option value="">-- Pilih Jam Kuliah --</option>
                <?php while ($row = mysqli_fetch_assoc($result_jamkul)): ?>
                    <option value="<?= $row['jamkul']; ?>"><?= $row['jamkul']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ruang">Ruangan</label>
            <select name="ruang" id="ruang" class="form-control" required>
                <option value="">-- Pilih Ruangan --</option>
                <?php while ($row = mysqli_fetch_assoc($result_ruang)): ?>
                    <option value="<?= $row['ruang']; ?>"><?= $row['ruang']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Kuliah Tawar</button>
    </form>
</div>

<!-- Bootstrap Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
