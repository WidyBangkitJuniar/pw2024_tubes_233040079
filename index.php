<?php

    // Koneksi ke database
    require "koneksi.php";

    // Mengambil data id, nama, harga, foto, detail di tabel produk seanyak 6
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php require "navbar.php"; ?>
    
    <!-- Search -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Toko Online Lukisan</h1>
            <h3>Mau Cari Apa?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Lukisan" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn btn-primary text-white">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- highlighted Lukisan -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5 d-flex justify-content-evenly">
                <div class="col-md-2 mb-2">
                    <div class="highlighted-kategori kategori-1 d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Art Karakter">Art Karakter</a></h4>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <div class="highlighted-kategori kategori-2 d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Art Muka">Art Muka</a></h4>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <div class="highlighted-kategori kategori-3 d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Art View">Art View</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tentang Kami -->
    <div class="container-fluid tentang-kami py-5">
        <div class="container fs-5 text-white">
            <h3>Tentang Kami</h3>
            <hr>
            <p>
            Toko Online Lukisan bukan hanya toko biasa, tapi gerbang menuju dunia seni yang penuh keindahan dan inspirasi. Kami menghadirkan koleksi lukisan yang beragam, dari seniman lokal dan internasional, dengan berbagai gaya dan genre yang siap menghidupkan ruang Anda.
            </p>

            <p>
            Belanja mudah dan nyaman dari mana saja dan kapan saja. Kunjungi website kami, temukan lukisan yang Anda sukai, dan lakukan pembelian dengan aman dan mudah. Kami juga menawarkan konsultasi seni gratis untuk membantu Anda memilih lukisan yang tepat.
            </p>

            <p>
            Temukan lukisan impian Anda di Toko Online Lukisan. Hiasi rumah, kantor, atau koleksi pribadi Anda dengan karya seni yang indah dan inspiratif.
            </p>

            <p>
            Lebih dari sekadar toko, Toko Online Lukisan adalah komunitas pecinta seni. Kami menyelenggarakan pameran online dan offline, mengadakan workshop seni, dan berbagi informasi menarik tentang dunia seni. Bergabunglah dengan komunitas kami dan rasakan kecintaan terhadap seni bersama kami.
            </p>

            <p>
            Toko Online Lukisan: Membawa seni ke dalam kehidupan Anda.
            </p>

            <p>
            Mengapa Memilih Toko Online Lukisan?
            </p>

            <ul>
                <li>
                    Koleksi lukisan yang luas dan beragam
                </li>
                <li>
                    Harga yang kompetitif
                </li>
                <li>
                    Layanan pelanggan yang ramah dan profesional
                </li>
                <li>
                    Konsultasi seni gratis
                </li>
                <li>
                    Pengiriman ke seluruh Indonesia
                </li>
                <li>
                    Komunitas pecinta seni yang aktif
                </li>
           </ul>

        </div>
    </div>

    <!-- Lukisan -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <!-- Card -->
            <div class="row mt-5">
                <?php 
                    while($data = mysqli_fetch_array($queryProduk)) { 
                ?>
                        <div class="col-sm-6 col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="image-box">
                                <img src="image/<?= $data['foto']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?= $data['nama']; ?></h4>
                                    <p class="card-text text-truncate"><?= $data['detail']; ?></p>
                                    <p class="card-text text-harga">Rp. <?= $data['harga'] ?></p>
                                    <a href="produk-detail.php?nama=<?= $data['nama'] ?>" class="btn btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                <?php 
                    } 
                 ?>
            </div>
            <a href="produk.php" class="btn btn-outline-warning mt-3 p-2 fs-5">Lihat Lainnya</a>
        </div>
    </div>

    <!-- Footer -->
    <?php require "footer.php"; ?>

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- font awesome -->
<script src="https://kit.fontawesome.com/c7fe0a8bea.js" crossorigin="anonymous"></script>
</body>
</html>