<?php

    // Koneksi ke database
    require "koneksi.php";

    // Mengambil semua data dari nama di tabel produk
    $nama = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
    $produk = mysqli_fetch_array($queryProduk);

    // Mengambil data kategori yang di batas
    $queryProdukTerkait =mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!= '$produk[id]' LIMIT 4");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <!-- Navbar -->
    <?php require "navbar.php"; ?>

    <!-- Detail Lukisan -->
    <div class="container-fluid my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <img src="image/<?= $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?= $produk['nama']; ?></h1>
                    <p class="fs-5">
                        <?= $produk['detail']; ?>
                    </p>
                    <p class="fs-4">
                        Rp. <?= $produk['harga']; ?>
                    </p>
                    <p class="fs-5">
                        Status Ketersediaan : <strong><?= $produk['ketersediaan']; ?></strong>
                    </p>
                    <a href="https://wa.me/6282124943674" class="btn btn-outline-success fs-5">
                        Pesan Lukisan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Lukisan terkait -->
    <div class="container-fluid py-5 warna1">
        <div class="container">
            <h2 class="text-center text-white mb-5">Lukisan Terkait</h2>

            <div class="row">
                <?php
                    while($data  = mysqli_fetch_array($queryProdukTerkait)) {
                ?>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="produk-detail.php?nama=<?= $data['nama']; ?>">
                                <img src="image/<?= $data['foto']; ?>" class="img-fluid img-thumbnail produk-terkait-image" alt="">
                            </a>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require "footer.php"; ?>

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- font awesome -->
<script src="https://kit.fontawesome.com/c7fe0a8bea.js" crossorigin="anonymous"></script>
</body>
</html>;