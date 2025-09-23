<?php
include 'koneksi_06959_fais.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $foto = '';

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        move_uploaded_file($tmp_name, $upload_dir . $foto);
    }

    $query = $koneksi->prepare("INSERT INTO mahasiswa (nim, nama, email, foto) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $nim, $nama, $email, $foto);

    if ($query->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data']);
    }
}
?>
