<?php

require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryProduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .kotak {
        border: solid;
    }

    .summary-kategori {
        background-color: #0a6b4a;
        border-radius: 15px;
    }

    .summary-produk {
        background-color: #26858D;
        border-radius: 15px;
    }

    .no-decoration {
        text-decoration: none;
    }

    .detail {
        color: white;
        transition: 0.3s;
    }

    .detail:hover  {
        color: blue;
    }
</style>

<body>

    <?php require "navbar.php"; ?>

    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php"  class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home</a>
                </li>
            </ol>
        </nav>
        <h2>Halo <?= $_SESSION["username"]; ?></h2>
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3">
                <div class="summary-kategori p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-list fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h4 class="fs-2">Kategori</h4>
                                <p class="fs-4"><?= $jumlahKategori; ?> Kategori</p>
                                <p><a href="kategori.php" class="detail no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <div  class="summary-produk p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-box fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h4 class="fs-2">Lukisan</h4>
                                <p class="fs-4"><?= $jumlahProduk; ?> Lukisan</p>
                                <p><a href="kategori.php" class="detail no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- font awesome -->
<script src="https://kit.fontawesome.com/c7fe0a8bea.js" crossorigin="anonymous"></script>

</body>
</html>