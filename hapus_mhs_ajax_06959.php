<?php
include 'koneksi_06959.php';

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Query untuk mendapatkan data mahasiswa berdasarkan ID
$query_select = "SELECT foto FROM mahasiswa WHERE id = $id";
$result = mysqli_query($koneksi, $query_select);
$data = mysqli_fetch_assoc($result);

// Jika data ditemukan, hapus file foto
if ($data && !empty($data['foto'])) {
    $filePath = 'uploads/' . $data['foto'];
    
    // Cek apakah file foto ada di folder uploads
    if (file_exists($filePath)) {
        unlink($filePath); // Hapus file foto
    }
}

// Hapus data mahasiswa dari database
$query_delete = "DELETE FROM mahasiswa WHERE id = $id";
mysqli_query($koneksi, $query_delete);

// Redirect ke halaman dashboard
header("Location: dashboard_mahasiswa_06959.php");
exit;
?>
