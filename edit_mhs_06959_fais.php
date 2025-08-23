<?php
include 'koneksi_06959.php';

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id=$id");

// Periksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
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
            padding: 30px;
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
            margin-top: 10px;
            font-weight: bold;
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
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }

        #foto-preview {
            margin-top: 15px;
            width: 100px;
            height: 100px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Mahasiswa</h1>
        <form id="editForm" action="" method="post" enctype="multipart/form-data">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" maxlength="14" value="<?= $row['nim']; ?>" required>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?= $row['nama']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $row['email']; ?>" required>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" accept="image/*">
            
            <!-- Preview Foto -->
            <?php if (!empty($row['foto'])): ?>
                <img src="uploads/<?= $row['foto']; ?>" id="foto-preview" alt="Foto Lama">
            <?php endif; ?>

            <button type="submit" id="submitButton">Update</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Highlight input on focus
            $('input').on('focus', function() {
                $(this).css('background-color', '#e0f7fa');
            }).on('blur', function() {
                $(this).css('background-color', '');
            });

            // Konfirmasi submit dengan animasi slide
            $('#editForm').on('submit', function(event) {
                event.preventDefault(); // Mencegah form untuk submit tradisional
                var formData = new FormData(this); // Ambil semua data dari form

                // Mengirim data menggunakan AJAX
                $.ajax({
                    url: "edit_mhs_ajax.php", // Ganti dengan file PHP yang menghandle proses edit
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert("Data berhasil diupdate!");
                        window.location.href = 'dashboard_mahasiswa_06959.php'; // Redirect ke halaman daftar mahasiswa setelah sukses
                    },
                    error: function(xhr, status, error) {
                        alert("Terjadi kesalahan: " + error);
                    }
                });
            });

            // Preview foto sebelum upload
            $('#foto').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#foto-preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>
</html>
