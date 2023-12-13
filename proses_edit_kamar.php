<?php
include 'koneksi.php';

$id = $_POST['id'];
$no_kamar = $_POST['no_kamar'];
$ukuran = $_POST['ukuran'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

$query = "UPDATE kamar SET no_kamar='$no_kamar', ukuran='$ukuran', harga='$harga', keterangan='$keterangan' WHERE id='$id'";
if (mysqli_query($koneksi, $query)) {
    header('Location: dtkmr.php');
} else {
    echo 'Gagal mengedit mahasiswa: ' . mysqli_error($koneksi);
}
?>