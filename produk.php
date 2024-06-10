<?php

    // Koneksi ke database
    require "koneksi.php";

    // Mengambil semua data dari tabel kategori
    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    // Get produk by nama produk/keyword
    if(isset($_GET['keyword'])) {
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    }

    // Get produk by kategori
    else if(isset($_GET['kategori'])) {
        $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);

        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
    }

    // Get produk default
    else {
        $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    }

    $countData = mysqli_num_rows($queryProduk);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lukisan</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <!-- Navbar -->
    <?php require "navbar.php" ?>

    <!-- Banner -->
    <div class="container-fluid banner2 d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Lukisan</h1>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Lukisan" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" id="keyword">
                        <button type="submit" class="btn btn-primary text-white" id="tombol-cari">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <h3 class="mb-3">Kategori</h3>
                <ul class="list-group">
                    <?php
                        while($kategori = mysqli_fetch_array($queryKategori)) {
                    ?>
                            <a class="no-decoration" href="produk.php?kategori=<?= $kategori['nama'] ?>"><li class="list-group-item"><?= $kategori['nama']; ?></li></a>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="col-lg-9 text-center">
                <h3 class="text-center mb-3">Lukisan</h3>
                <div id="lukisan">
                    <div class="row">
                        <?php
                            if($countData < 1) {
                        ?>
                                <h4 class="my-5">Lukisan yang anda cari tidak tersedia</h4>
                        <?php
                            }
                        ?>
                        <?php
                            while($produk = mysqli_fetch_array($queryProduk)) {
                        ?>
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <div class="image-box">
                                            <img src="image/<?= $produk['foto']; ?>" class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $produk['nama']; ?></h4>
                                            <p class="card-text text-truncate"><?= $produk['detail']; ?></p>
                                            <p class="card-text text-harga">Rp. <?= $produk['harga']; ?></p>
                                            <a href="produk-detail.php?nama=<?= $produk['nama'] ?>" class="btn btn-primary">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <?php require "footer.php"; ?>

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- font awesome -->
<script src="https://kit.fontawesome.com/c7fe0a8bea.js" crossorigin="anonymous"></script>

<!--  -->
<script src="js/script.js"></script>
</body>
</html>