<?php
include 'koneksi_06959_fais.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodematkul = $_POST['kodematkul'];
    $namamatkul = $_POST['namamatkul'];
    $sks = $_POST['sks'];
    $jns = $_POST['jns'];
    $smt = $_POST['smt'];

    // Cek data kembar berdasarkan kodematkul
    $query_check = "SELECT * FROM matkul WHERE kodematkul = ?";
    $stmt_check = mysqli_prepare($koneksi, $query_check);
    mysqli_stmt_bind_param($stmt_check, 's', $kodematkul);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($result_check) > 0) {
        $error_message = "Kode Mata Kuliah sudah ada. Silakan gunakan kode lain.";
    } else {
        // Insert data ke database
        $query_insert = "INSERT INTO matkul (kodematkul, namamatkul, sks, jns, smt) 
                         VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($koneksi, $query_insert);
        mysqli_stmt_bind_param($stmt_insert, 'ssiss', $kodematkul, $namamatkul, $sks, $jns, $smt);

        if (mysqli_stmt_execute($stmt_insert)) {
            echo "<script>
                    alert('Data mata kuliah berhasil ditambahkan!');
                    setTimeout(function() {
                        window.location.href = 'dashboard_matkul_06959_fais.php';
                    }, 2000);
                  </script>";
        } else {
            $error_message = "Gagal menambahkan data: " . mysqli_error($koneksi);
        }
    }
    mysqli_stmt_close($stmt_check);
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Kustomisasi tambahan CSS */
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
    <h2 class="text-center">Tambah Mata Kuliah</h2>

    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="kodematkul">Kode Mata Kuliah</label>
            <input type="text" name="kodematkul" id="kodematkul" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="namamatkul">Nama Mata Kuliah</label>
            <input type="text" name="namamatkul" id="namamatkul" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="sks">SKS</label>
            <select name="sks" id="sks" class="form-control" required>
                <option value="">Pilih Jumlah SKS</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jns">Jenis Mata Kuliah</label>
            <select name="jns" id="jns" class="form-control" required>
                <option value="T">Teori</option>
                <option value="P">Praktikum</option>
                <option value="T/P">Teori/Praktikum</option>
            </select>
        </div>

        <div class="form-group">
            <label for="smt">Semester</label>
            <select name="smt" id="smt" class="form-control" required>
                <option value="">Pilih Semester</option>
                <?php for ($i = 1; $i <= 8; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
    </form>
</div>

<!-- Bootstrap Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
