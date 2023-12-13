<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Profil YUKOS</title>
</head>

<body>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Y U K O S</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profil.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dtkmr.php">Data Kamar</a>
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
    
    <section>
        <div class="container-fluid banner">
            <div class="container banner-content col-lg-6">
                <div class="text-center">
                    <h2 class="fw-bold">YuKos</h2>
                    <h4>Kos-kosan Harmoni, Tempat Nyaman Untuk Kembali.</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="profilKos">
        <h2 class="text-center fw-bold mb-3">Tentang YuKos</h2>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h3>Visi</h3>
                    <p>"Menjadi pilihan utama dan terdepan dalam penyediaan kos-kosan yang memberikan lingkungan hunian yang nyaman, aman, dan harmonis."</p>
                    <h3>Misi</h3>
                    <p class="text-start">1. Menyediakan fasilitas tempat tinggal yang memadai kebutuhan penghuni.</p>
                    <p class="text-start">2. Menciptakan lingkungan kos-kosan yang bersih, aman, dan nyaman.</p>
                    <p class="text-start">3. Memberikan pelayanan prima dan ramah untuk menciptakan lingkungan yang harmonis.</p>
                </div>
                <div class="col embed-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.0165610691074!2d110.390302134806!3d-7.788068289346445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59d09e61768f%3A0xc812237e6ab3d520!2sJl.%20Bimokunthing%20No.60%2C%20Demangan%2C%20Kec.%20Gondokusuman%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta%2055221!5e0!3m2!1sen!2sid!4v1702262959110!5m2!1sen!2sid"
                    width="400" height="400" style="border:0; border-radius:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col">
                    <h3>Contact Person</h3>
                    <p>Tertarik? Langsung saja hubungi kami dengan klik di bawah ini!</p>
                    <a aria-label="Chat on WhatsApp" href="https://wa.me/6281215867310"><img alt="Chat on WhatsApp" src="image/whatsappwhite.svg"/></a>
                </div>
            </div>
        </div>
    </section>

    <section class="fotoKos">
        <h2 class="text-center fw-bold">Foto YuKos</h2>
        <div class="wrapper">
            <div class="slides">
                <span id="slide-1"></span>
                <span id="slide-2"></span>
                <span id="slide-3"></span>
                <span id="slide-4"></span>
                <div class="images">
                    <img src="image/gambar1.jpg" alt="Foto dalam kamar kos"/>
                    <img src="image/gambar3.jpg" alt="Foto dalam kamar kos"/>
                    <img src="image/gambar5.jpg" alt="Foto dalam kamar kos"/>
                    <img src="image/gambar6.jpg" alt="Foto dalam kamar kos"/>
                </div>
            </div>
            <div class="navigation">
                <a href="#slide-1">1</a>
                <a href="#slide-2">2</a>
                <a href="#slide-3">3</a>
                <a href="#slide-4">4</a>
            </div>
        </div>
    </section>

    <section class="watermark">
        <p class="text-center">®Created by Kelompok 3</p>
    </section>
</body>

</html>