<?php
// Menyertakan file koneksi
include 'koneksi_06959_fais.php';

// Deklarasi variabel untuk menyimpan pesan error
$error_message = "";

// Periksa apakah parameter 'id' ada di URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Mengambil nilai 'id' dari URL

    // Ambil data mata kuliah berdasarkan id
    $query_get = "SELECT * FROM matkul WHERE id = ?";
    $stmt_get = mysqli_prepare($koneksi, $query_get);
    mysqli_stmt_bind_param($stmt_get, 'i', $id);
    mysqli_stmt_execute($stmt_get);
    $result_get = mysqli_stmt_get_result($stmt_get);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result_get) > 0) {
        $row = mysqli_fetch_assoc($result_get); // Ambil data mata kuliah
    } else {
        $error_message = "Data mata kuliah dengan ID tersebut tidak ditemukan.";
    }
    mysqli_stmt_close($stmt_get);
} else {
    $error_message = "ID tidak valid atau tidak ditemukan.";
}

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodematkul = $_POST['kodematkul'];
    $namamatkul = $_POST['namamatkul'];
    $sks = $_POST['sks'];
    $jns = $_POST['jns'];
    $smt = $_POST['smt'];

    // Validasi: Pastikan semua field diisi
    if (empty($kodematkul) || empty($namamatkul) || empty($sks) || empty($jns) || empty($smt)) {
        $error_message = "Semua field harus diisi!";
    } else {
        // Update data ke database
        $query_update = "UPDATE matkul SET kodematkul = ?, namamatkul = ?, sks = ?, jns = ?, smt = ? WHERE id = ?";
        $stmt_update = mysqli_prepare($koneksi, $query_update);
        mysqli_stmt_bind_param($stmt_update, 'ssissi', $kodematkul, $namamatkul, $sks, $jns, $smt, $id);

        if (mysqli_stmt_execute($stmt_update)) {
            echo "<script>
                    alert('Data mata kuliah berhasil diperbarui!');
                    window.location.href = 'dashboard_matkul_06959_fais.php'; 
                  </script>";
            exit;
        } else {
            $error_message = "Gagal memperbarui data: " . mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt_update);
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: 600;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .alert {
            margin-bottom: 20px;
        }
        select, input {
            border-radius: 6px;
        }
        select:focus, input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Edit Mata Kuliah</h2>

    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php endif; ?>

    <?php if (!empty($row)): ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="kodematkul">Kode Mata Kuliah</label>
            <input type="text" name="kodematkul" id="kodematkul" class="form-control" 
                   value="<?= htmlspecialchars($row['kodematkul']); ?>" required>
        </div>

        <div class="form-group">
            <label for="namamatkul">Nama Mata Kuliah</label>
            <input type="text" name="namamatkul" id="namamatkul" class="form-control" 
                   value="<?= htmlspecialchars($row['namamatkul']); ?>" required>
        </div>

        <div class="form-group">
            <label for="sks">SKS</label>
            <select name="sks" id="sks" class="form-control" required>
                <option value="">Pilih Jumlah SKS</option>
                <?php for ($i = 1; $i <= 6; $i++): ?>
                    <option value="<?= $i; ?>" <?= $row['sks'] == $i ? 'selected' : ''; ?>><?= $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="jns">Jenis Mata Kuliah</label>
            <select name="jns" id="jns" class="form-control" required>
                <option value="T" <?= $row['jns'] == 'T' ? 'selected' : ''; ?>>Teori</option>
                <option value="P" <?= $row['jns'] == 'P' ? 'selected' : ''; ?>>Praktikum</option>
                <option value="T/P" <?= $row['jns'] == 'T/P' ? 'selected' : ''; ?>>Teori/Praktikum</option>
            </select>
        </div>

        <div class="form-group">
            <label for="smt">Semester</label>
            <select name="smt" id="smt" class="form-control" required>
                <option value="">Pilih Semester</option>
                <?php for ($i = 1; $i <= 8; $i++): ?>
                    <option value="<?= $i; ?>" <?= $row['smt'] == $i ? 'selected' : ''; ?>><?= $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
    <?php endif; ?>
</div>

<!-- Bootstrap Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
