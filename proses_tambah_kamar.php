<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_kamar = $_POST['no_kamar'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    // Lindungi dari SQL injection
    $no_kamar = mysqli_real_escape_string($koneksi, $no_kamar);
    $ukuran = mysqli_real_escape_string($koneksi, $ukuran);
    $harga = mysqli_real_escape_string($koneksi, $harga);
    $keterangan = mysqli_real_escape_string($koneksi, $keterangan);

    // Query untuk menambahkan data kamar ke database
    $query = "INSERT INTO kamar (no_kamar, ukuran, harga, keterangan) VALUES ('$no_kamar', '$ukuran', '$harga', '$keterangan')";

    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil ditambahkan, redirect ke halaman data kamar
        header("location: dtkmr.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>