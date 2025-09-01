<?php
// Menyertakan file koneksi
include 'koneksi_06959_fais.php';

// Memeriksa apakah parameter 'id' tersedia di URL
if (isset($_GET['id'])) {
    // Mengambil nilai 'id' dari URL dan membersihkannya
    $id = intval($_GET['id']); // Pastikan 'id' adalah angka agar aman

    // Membuat query untuk menghapus data berdasarkan 'id'
    $query = "DELETE FROM matkul WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id); // Bind 'id' sebagai integer

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        // Jika berhasil dihapus, arahkan kembali ke halaman dashboard
        echo "<script>
                alert('Data mata kuliah berhasil dihapus.');
                window.location.href = 'dashboard_matkul_06959_fais.php'; // Ganti dengan halaman dashboard yang sesuai
              </script>";
    } else {
        // Jika gagal, tampilkan pesan error dan arahkan kembali
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
                window.location.href = 'dashboard_matkul_06959_fais.php'; // Ganti dengan halaman dashboard yang sesuai
              </script>";
    }

    // Menutup statement
    mysqli_stmt_close($stmt);
} else {
    // Jika 'id' tidak ada di URL
    echo "<script>
            alert('ID mata kuliah tidak valid.');
            window.location.href = 'dashboard_matkul_06959_fais.php'; // Ganti dengan halaman dashboard yang sesuai
          </script>";
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
