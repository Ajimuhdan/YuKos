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
    <title>Tambah Data Kamar</title>
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
                        <a class="nav-link active" aria-current="page" href="dtkmr.php">Data Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dtpenghuni.php">Data Penghuni</a>
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
                Tambah Data Kamar
            </div>
            <div class="card-body">
                <div class="col-md-6 mx-auto">
                </div>
                <form method="post" action="proses_tambah_kamar.php">
                    <div class="mb-3">
                        <label for="no_kamar" class="form-label">Nomor Kamar</label>
                        <input type="text" class="form-control" name="no_kamar" placeholder="Masukkan Nomor Kamar" required>
                    </div>
                    <div class="mb-3">
                        <label for="ukuran" class="form-label">Ukuran</label>
                        <select class="form-control" id="ukuran" name="ukuran" required><?= $kamar['ukuran']; ?>>
                            <option>-Pilih Ukuran Kamar-</option>
                            <option value="3m X 3m">3m X 3m</option>
                            <option value="4m X 4m">4m X 4m</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Kamar" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <select class="form-control" id="keterangan" name="keterangan" required><?= $kamar['keterangan']; ?>>
                            <option>-Pilih Keterangan Kamar-</option>
                            <option value="Isi">Isi</option>
                            <option value="Kosong">Kosong</option>
                            <option value="Renovasi">Renovasi</option>
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