<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Ambil ID kamar dari parameter URL
    $id_kamar = $_GET['id'];

    // Lindungi dari SQL injection
    $id_kamar = mysqli_real_escape_string($koneksi, $id_kamar);

    // Query untuk menghapus data kamar dari database
    $query = "DELETE FROM kamar WHERE id = $id_kamar";

    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil dihapus, redirect ke halaman data kamar
        header("location: dtkmr.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>