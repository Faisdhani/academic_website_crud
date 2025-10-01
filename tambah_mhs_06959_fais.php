<?php
include 'koneksi_06959.php';

function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$error_nim = $error_foto = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = clean_input($_POST["nim"]);
    $nama = clean_input($_POST["nama"]);
    $email = clean_input($_POST["email"]);
    $foto = "";

    // Validasi NIM
    if (strlen($nim) != 14) {
        $error_nim = "Isian NIM tidak sesuai, silahkan isi kembali.";
    } else {
        // Periksa NIM apakah sudah ada di database
        $check_query = $koneksi->prepare("SELECT nim FROM mahasiswa WHERE nim = ?");
        $check_query->bind_param("s", $nim);
        $check_query->execute();
        $result = $check_query->get_result();

        if ($result->num_rows > 0) {
            $error_nim = "Data sudah ada, silahkan isikan yang lain";
        } else {
            // Proses Upload Foto jika ada
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                $foto_ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                if (in_array($foto_ext, $allowed_types)) {
                    $foto = uniqid() . "." . $foto_ext;
                    $tmp_name = $_FILES['foto']['tmp_name'];
                    $upload_dir = 'uploads/';
                    if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

                    $target_file = $upload_dir . $foto;
                    if (!move_uploaded_file($tmp_name, $target_file)) {
                        $error_foto = "Gagal mengunggah foto.";
                    }
                } else {
                    $error_foto = "Tipe file tidak diizinkan.";
                }
            }

            // Insert Data ke Database
            if (empty($error_nim) && empty($error_foto)) {
                $insert_query = $koneksi->prepare("INSERT INTO mahasiswa (nim, nama, email, foto) VALUES (?, ?, ?, ?)");
                $insert_query->bind_param("ssss", $nim, $nama, $email, $foto);

                if ($insert_query->execute()) {
                    header("Location: dashboard_mahasiswa.php");
                    exit();
                } else {
                    $message = "Terjadi kesalahan: " . $koneksi->error;
                }
                $insert_query->close();
            }
        }
        $check_query->close();
    }
}
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <script src="jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f5f5f5; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .container { width: 600px; background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); }
        label, .error { display: block; margin-top: 15px; }
        input { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 8px; }
        button { background-color: #007bff; color: #fff; padding: 15px; width: 100%; border: none; margin-top: 20px; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Mahasiswa</h2>
    <form method="post" enctype="multipart/form-data">
        <label>NIM (14 Karakter):</label>
        <input type="text" name="nim" id="nim" maxlength="14" required>
        <span class="error" id="nim-error"><?php echo $error_nim; ?></span>

        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Foto:</label>
        <input type="file" name="foto" accept="image/*">

        <button type="submit">Tambah</button>
        <p><?php echo $message; ?></p>
    </form>
</div>

<script>   
$(document).ready(function () {
    $('#nim').on('blur', function () {
        var nim = $(this).val().trim();
        
        // Validasi panjang NIM
        if (nim.length !== 14) {
            $('#nim-error').text("Isian NIM tidak 14 karakter, silahkan isi kembali.");
            return;
        }

        $.ajax({
        url: 'cek_nim.php', // Pastikan URL ini sesuai dengan lokasi cek_nim.php
        type: 'POST',
        data: { nim: nim },
        success: function (response) {
            var data = JSON.parse(response);

            // Tampilkan pesan jika NIM sudah ada
            if (data.status === 'exists') {
                $('#error_nim').text("Data sudah ada, silahkan isikan NIM lain.");
                $('#nim').focus();
            } else {
                $('#error_nim').text(''); // Hapus pesan jika NIM tidak ada
            }
        },
        error: function (xhr, status, error) {
            // Menampilkan pesan error lebih jelas
            console.log("AJAX Error: " + status + " - " + error);
            $('#error_nim').text("Terjadi kesalahan pada server. Coba lagi nanti.");
         }
          });
    });
});
</script>
</body>
</html>
