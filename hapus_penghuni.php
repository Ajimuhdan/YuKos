<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Ambil ID penghuni
    $id_penghuni = $_GET['id'];

    // Lindungi dari SQL injection
    $id_penghuni = mysqli_real_escape_string($koneksi, $id_penghuni);

    // Ambil id_kamar sebelum menghapus penghuni
    $query_select_kamar = "SELECT id_kamar FROM penghuni WHERE id = $id_penghuni";
    $result_select_kamar = mysqli_query($koneksi, $query_select_kamar);

    if ($row_select_kamar = mysqli_fetch_assoc($result_select_kamar)) {
        $id_kamar = $row_select_kamar['id_kamar'];

        // Query untuk menghapus data penghuni dari database
        $query_delete_penghuni = "DELETE FROM penghuni WHERE id = $id_penghuni";

        if (mysqli_query($koneksi, $query_delete_penghuni)) {
            // Set keterangan kamar menjadi kosong setelah penghuni dihapus
            $query_update_kamar = "UPDATE kamar SET keterangan = 'Kosong' WHERE id = $id_kamar";
            mysqli_query($koneksi, $query_update_kamar);

            // Jika berhasil dihapus, redirect ke halaman data penghuni
            header("location: dtpenghuni.php");
            exit();
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error
            echo "Error: " . $query_delete_penghuni . "<br>" . mysqli_error($koneksi);
        }
    } else {
        // Handle jika tidak ada data kamar ditemukan
        echo "Data kamar tidak ditemukan.";
    }
}

mysqli_close($koneksi);