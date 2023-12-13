<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_penghuni = $_POST['id_penghuni'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $gender = $_POST['gender'];
    $id_kamar = $_POST['id_kamar'];

    // Lindungi dari SQL injection
    $id_penghuni = mysqli_real_escape_string($koneksi, $id_penghuni);
    $nama = mysqli_real_escape_string($koneksi, $nama);
    $alamat = mysqli_real_escape_string($koneksi, $alamat);
    $no_hp = mysqli_real_escape_string($koneksi, $no_hp);
    $gender = mysqli_real_escape_string($koneksi, $gender);
    $id_kamar = mysqli_real_escape_string($koneksi, $id_kamar);

    // Query untuk mengupdate data penghuni di database
    $query = "UPDATE penghuni SET nama='$nama', alamat='$alamat', no_hp='$no_hp', gender='$gender', id_kamar='$id_kamar' WHERE id=$id_penghuni";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Query untuk mengupdate data kamar
        $query_kamar = "UPDATE kamar SET keterangan = 'Isi' WHERE id = '$id_kamar'";
        $result_kamar = mysqli_query($koneksi, $query_kamar);
        // Jika berhasil diedit, redirect ke halaman data penghuni
        if ($result_kamar) {
            header("location: dtpenghuni.php");
            exit();
        } else {
            echo "Error: " . $query_kamar . "<br>" . mysqli_error($koneksi);
        }
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>