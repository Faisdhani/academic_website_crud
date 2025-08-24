<?php
include 'koneksi_06959_fais.php';

// Ambil 'id' dari URL
$id = $_GET['id'];

// Ambil data dosen berdasarkan id
$result = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id=$id");

// Periksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil baris data
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $npp = $_POST['npp'];
    $namadosen = $_POST['namadosen'];
    $homebase = $_POST['homebase'];

    // Update data tanpa foto
    $query = "UPDATE dosen SET npp='$npp', namadosen='$namadosen', homebase='$homebase' WHERE id=$id";
    if (mysqli_query($koneksi, $query)) {
        // Redirect ke halaman dashboard setelah update berhasil
        header("Location: dashboard_dosen_06959_fais.php");
        exit(); // Pastikan untuk mengeksekusi penghentian skrip setelah redirect
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>
    <script src="jquery-3.7.1.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        input:focus {
            border-color: #007bff;
            background-color: #e0f7fa;
            outline: none;
        }

        button {
            margin-top: 20px;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Dosen</h1>
        <form action="" method="post">
            <!-- NPP input field -->
            <label for="npp">NPP:</label>
            <input type="text" name="npp" id="npp" value="<?= $row['npp']; ?>" required>
            
            <!-- Nama Dosen input field -->
            <label for="namadosen">Nama Dosen:</label>
            <input type="text" name="namadosen" id="namadosen" value="<?= $row['namadosen']; ?>" required>

            <!-- Homebase input field -->
            <label for="homebase">Homebase:</label>
            <input type="text" name="homebase" id="homebase" value="<?= $row['homebase']; ?>" required>

            <button type="submit" name="submit">Update</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Highlight input saat fokus
            $('input').on('focus', function() {
                $(this).css('background-color', '#e0f7fa');
            }).on('blur', function() {
                $(this).css('background-color', '');
            });

            // Konfirmasi sebelum submit form
            $('form').on('submit', function() {
                return confirm("Apakah Anda yakin ingin mengupdate data ini?");
            });
        });
    </script>
</body>
</html>
