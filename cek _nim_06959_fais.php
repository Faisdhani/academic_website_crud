<?php
include 'koneksi_06959_fais.php'; // Pastikan koneksi database sudah benar

$nim = $_POST['nim']; // Ambil nilai NIM dari request

$query = "SELECT * FROM mahasiswa WHERE nim = '$nim'"; // Query untuk cek apakah NIM sudah ada
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo json_encode(['status' => 'exists']); // Jika NIM sudah ada
} else {
    echo json_encode(['status' => 'available']); // Jika NIM belum ada
}
?>
