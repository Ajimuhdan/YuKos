<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_kamar = $_GET['id'];

    $query_get_kamar = "SELECT * FROM kamar WHERE id = $id_kamar";
    $result_get_kamar = mysqli_query($koneksi, $query_get_kamar);

    if ($result_get_kamar && mysqli_num_rows($result_get_kamar) > 0) {
        $kamar = mysqli_fetch_assoc($result_get_kamar);
    } else {
        header("Location: dtkmr.php");
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kamar = $_POST['id'];
    $no_kamar = $_POST['no_kamar'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    $query_update_kamar = "UPDATE kamar SET no_kamar = '$no_kamar', ukuran = '$ukuran', harga = $harga, keterangan = '$keterangan' WHERE id = $id_kamar";

    if (mysqli_query($koneksi, $query_update_kamar)) {
        header("Location: dtkmr.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Edit Data Kamar YUKOS</title>
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
                Edit Data Kamar
            </div>
            <div class="card-body">
                <div class="col-md-6 mx-auto">
                </div>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $kamar['id']; ?>">
                    <div class="mb-3">
                        <label for="no_kamar" class="form-label">Nomor Kamar</label>
                        <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="<?= $kamar['no_kamar']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ukuran" class="form-label">Ukuran</label>
                        <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= $kamar['ukuran']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $kamar['harga']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <select class="form-control" id="keterangan" name="keterangan"><?= $kamar['keterangan']; ?>>
                            <option value="Isi">Isi</option>
                            <option value="Kosong">Kosong</option>
                            <option value="Renovasi">Renovasi</option>
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