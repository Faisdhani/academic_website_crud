<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "uas_pwl_06959";

    $koneksi = mysqli_connect($host, $user, $pass, $db);

    // Periksa koneksi
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>
