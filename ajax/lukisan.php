<?php 

require '../koneksi.php';

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
                <div class="col-md-4 mb-3" id="container">
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