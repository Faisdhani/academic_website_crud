<?php
include 'koneksi_06959_fais.php';

// Mendapatkan ID dari parameter URL
$id = $_GET['idkultawar'];

// Mengambil data berdasarkan ID
$query_kultawar = "SELECT * FROM kultawar WHERE idkultawar=$id";
$result_kultawar = mysqli_query($koneksi, $query_kultawar);

// Periksa apakah query berhasil
if (!$result_kultawar || mysqli_num_rows($result_kultawar) == 0) {
    die("Data tidak ditemukan.");
}
$row = mysqli_fetch_assoc($result_kultawar);

// Mendapatkan data referensi untuk dropdown
$query_matkul = "SELECT namamatkul FROM matkul";
$query_dosen = "SELECT namadosen FROM dosen";
$query_jamkul = "SELECT DISTINCT jamkul FROM kultawar";
$query_ruang = "SELECT DISTINCT ruang FROM kultawar";

$result_matkul = mysqli_query($koneksi, $query_matkul);
$result_dosen = mysqli_query($koneksi, $query_dosen);
$result_jamkul = mysqli_query($koneksi, $query_jamkul);
$result_ruang = mysqli_query($koneksi, $query_ruang);

// Update data ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matkul = $_POST['matkul'];
    $dosen = $_POST['dosen'];
    $klp = $_POST['klp'];
    $hari = $_POST['hari'];
    $jamkul = $_POST['jamkul'];
    $ruang = $_POST['ruang'];

    // Corrected query with 'idkultawar'
    $query_update = "UPDATE kultawar SET matkul='$matkul', dosen='$dosen', klp='$klp', hari='$hari', jamkul='$jamkul', ruang='$ruang' WHERE idkultawar=$id";
    if (mysqli_query($koneksi, $query_update)) {
        $success_message = "Data kuliah tawar berhasil diperbarui.";
        // Redirect to the dashboard page after successful update
        header("Location: dashboard_kultawar_06959_fais.php");
        exit; // Stop the script after the redirect
    } else {
        $error_message = "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kuliah Tawar</title>
    <style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
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
        text-align: center;
    }
    .form-group label {
        font-weight: bold;
        color: #495057;
    }
    .form-control {
        padding: 10px;
        font-size: 14px;
        border-radius: 5px;
        border: 1px solid #ced4da;
        width: 100%;
        margin-bottom: 15px;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    .alert {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
    }
    .alert-success {
        background-color: #28a745;
        color: white;
    }
    .alert-danger {
        background-color: #dc3545;
        color: white;
    }
</style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Edit Kuliah Tawar</h2>

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
                <?php while ($matkul_row = mysqli_fetch_assoc($result_matkul)): ?>
                    <option value="<?= $matkul_row['namamatkul']; ?>" <?= $matkul_row['namamatkul'] == $row['matkul'] ? 'selected' : ''; ?>>
                        <?= $matkul_row['namamatkul']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="dosen">Nama Dosen</label>
            <select name="dosen" id="dosen" class="form-control" required>
                <option value="">-- Pilih Dosen --</option>
                <?php while ($dosen_row = mysqli_fetch_assoc($result_dosen)): ?>
                    <option value="<?= $dosen_row['namadosen']; ?>" <?= $dosen_row['namadosen'] == $row['dosen'] ? 'selected' : ''; ?>>
                        <?= $dosen_row['namadosen']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="klp">Kelompok</label>
            <select name="klp" id="klp" class="form-control" required>
                <option value="">-- Pilih Kelompok --</option>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <option value="A12.62<?= sprintf('%02d', $i); ?>" <?= "A12.62" . sprintf('%02d', $i) == $row['klp'] ? 'selected' : ''; ?>>
                        A12.62<?= sprintf('%02d', $i); ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="hari">Hari Kuliah</label>
            <select name="hari" id="hari" class="form-control" required>
                <option value="">-- Pilih Hari --</option>
                <?php foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari): ?>
                    <option value="<?= $hari; ?>" <?= $hari == $row['hari'] ? 'selected' : ''; ?>>
                        <?= $hari; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="jamkul">Jam Kuliah</label>
            <select name="jamkul" id="jamkul" class="form-control" required>
                <option value="">-- Pilih Jam Kuliah --</option>
                <?php while ($jamkul_row = mysqli_fetch_assoc($result_jamkul)): ?>
                    <option value="<?= $jamkul_row['jamkul']; ?>" <?= $jamkul_row['jamkul'] == $row['jamkul'] ? 'selected' : ''; ?>>
                        <?= $jamkul_row['jamkul']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ruang">Ruangan</label>
            <select name="ruang" id="ruang" class="form-control" required>
                <option value="">-- Pilih Ruangan --</option>
                <?php while ($ruang_row = mysqli_fetch_assoc($result_ruang)): ?>
                    <option value="<?= $ruang_row['ruang']; ?>" <?= $ruang_row['ruang'] == $row['ruang'] ? 'selected' : ''; ?>>
                        <?= $ruang_row['ruang']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
