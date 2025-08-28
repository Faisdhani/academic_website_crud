<?php
// Menyertakan file koneksi
include 'koneksi_06959_fais.php';

// Memeriksa apakah parameter ID tersedia di URL
if (isset($_GET['id'])) {
    // Mengambil nilai ID dari URL dan membersihkannya
    $id = intval($_GET['id']); // Konversi ke integer untuk menghindari SQL injection
    
    // Membuat query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM dosen WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data Dosen berhasil dihapus.');
                window.location.href = 'dashboard_dosen_06959_fais.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
                window.location.href = 'dashboard_dosen_06959_fais.php';
              </script>";
    }

    // Menutup statement
    mysqli_stmt_close($stmt);
} else {
    // Jika ID tidak ada di URL
    echo "<script>
            alert('ID tidak valid.');
            window.location.href = 'dashboard_dosen_06959_fais.php';
          </script>";
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
