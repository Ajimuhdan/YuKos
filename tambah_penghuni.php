<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data Penghuni</title>
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
                <form method="post" action="proses_tambah_penghuni.php">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Penghuni" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Penghuni" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No. HP Penghuni" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option>-Pilih Jenis Kelamin-</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_kamar" class="form-label">No. Kamar</label>
                        <select type="text" class="form-control" name="id_kamar" required>
                            <?php
                            $query_no_kamar = "SELECT id, no_kamar FROM kamar WHERE keterangan = 'Kosong'";
                            $result_no_kamar = mysqli_query($koneksi, $query_no_kamar);

                            while ($row = mysqli_fetch_assoc($result_no_kamar)) {
                                echo "<option value=\"{$row['id']}\">{$row['no_kamar']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</body>

</html>