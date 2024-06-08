<?php

require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }
</style>

<body>
    
    <?php require "navbar.php"; ?>

    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php" class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="kategori.php" class="no-decoration text-muted">Kategori</a>
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Kategori</h3>

            <form action="" method="post">

                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="input nama kategori" class="form-control mt-1" autocomplete="off">
                </div>

                <div class="mt-3">
                    <input class="btn btn-primary" type="submit" name="simpan_kategori" value="Simpan" ></input>
                </div>

            </form>

            <?php
                if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);
               
                    $queryEx = mysqli_query($con, "SELECT * FROM kategori WHERE nama = '$kategori'");
                    $jumlahDataKategoriBaru = mysqli_num_rows($queryEx);

                    if($jumlahDataKategoriBaru > 0){
            ?>
                            <div class="alert alert-warning mt-1" role="alert">
                                Kategori Sudah Ada!
                            </div>
            <?php
                    }
                    else{
                        $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUE ('$kategori')");
                        
                        if($querySimpan){
            ?>
                                <div class="alert alert-primary mt-1" role="alert">
                                    Kategori Berhasil Di Tambahkan!
                                </div>

                                <meta http-equiv="refresh" content="2; url=kategori.php" />
            <?php
                        }
                        else{
                            echo mysqli_error($con);
                        }
                    }
                } 
            ?>

        </div>

        <div class="mt-3">
            <h3>List Kategori</h3>

            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($jumlahKategori==0){
                        ?>
                            <tr>
                                <td class="text-center" colspan=3>Data kategori tidak tersedia</td>
                            </tr>
                        <?php
                            }
                            else{
                                $jumlah = 1;
                                while($data=mysqli_fetch_array($queryKategori)){
                        ?>
                            <tr>
                                <td><?= $jumlah; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td>
                                    <a href="kategori-detail.php?id=<?= $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                </td>
                            </tr>
                        <?php 
                            $jumlah++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- font awesome -->
<script src="https://kit.fontawesome.com/c7fe0a8bea.js" crossorigin="anonymous"></script>

</body>
</html>