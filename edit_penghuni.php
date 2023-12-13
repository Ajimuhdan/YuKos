<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Edit Data Penghuni YUKOS</title>
</head>

<body>
    <script src="js/bootstrap.bundle.min.js"></script>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary sticky-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="profil.php">Y U K O S</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dtkmr.php">Data Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dtpenghuni.php">Data Penghuni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card text-bg-light mt-5">
            <div class="card-header text-center fs-5 fw-bold">
                Edit Data Penghuni
            </div>
            <div class="card-body">
                <div class="col-md-6 mx-auto">
                </div>
                <?php
                // Ambil ID penghuni dari parameter URL
                $id_penghuni = $_GET['id'];

                // Query untuk mengambil data penghuni berdasarkan ID
                $query_penghuni = "SELECT * FROM penghuni WHERE id = $id_penghuni";
                $result_penghuni = mysqli_query($koneksi, $query_penghuni);

                // Periksa apakah data ditemukan
                if ($result_penghuni->num_rows > 0) {
                    $penghuni = $result_penghuni->fetch_assoc();
                } else {
                    die("Data penghuni tidak ditemukan");
                }        

                // Mendapatkan data kamar yang kosong
                $query_kamar_kosong = "SELECT * FROM kamar WHERE keterangan = 'Kosong'";
                $result_kamar_kosong = mysqli_query($koneksi, $query_kamar_kosong);

                if ($result_kamar_kosong->num_rows > 0) {
                    $kamar_kosong = $result_kamar_kosong->fetch_all(MYSQLI_ASSOC);
                } else {
                    die("Tidak ada kamar kosong");
                }
                ?>
                <form method="post" action="proses_edit_penghuni.php">
                    <input type="hidden" name="id_penghuni" value="<?= $penghuni['id']; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $penghuni['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $penghuni['alamat']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" class="form-control" name="no_hp" value="<?= $penghuni['no_hp']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option value="Laki-laki" <?= $penghuni['gender'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $penghuni['gender'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_kamar" class="form-label">No. Kamar</label>
                        <select id="kamar" class="form-control" name="id_kamar" required>
                            <?php
                            // Loop kamar yang kosong untuk membuat pilihan dropdown
                            foreach ($kamar_kosong as $kamar) {
                                echo '<option value="' . $kamar['id'] . '"';
                                if ($kamar['id'] == $penghuni['id_kamar']) {
                                    echo ' selected'; // Menandai kamar yang dipilih sebelumnya
                                }
                                echo '>' . $kamar['no_kamar'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</body>

</html>