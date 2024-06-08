<?php

    require "session.php";
    require "../koneksi.php";

    $id = $_GET['id'];

    $query = mysqli_query($con, "SELECT *FROM kategori WHERE id = '$id'");
    $data  = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Detail</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php require "navbar.php"; ?>
    <div class="container mt-3">
        <h2>Detail Kategori</h2>

        <div class="col-12 col md-6">
            <form action=""  method="post">
                <div>
                    <label for="nama">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control mt-2" value="<?= $data['nama']; ?>" autocomplete="off">
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
                    <button type="submit" class="btn btn-danger" name="hapusBtn">Hapus</button>
                </div>
            </form>

            <?php
                if(isset($_POST['editBtn'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    if($data['nama']==$kategori){
            ?>
                            <meta http-equiv="refresh" content="0; url=kategori.php" />
            <?php
                    }
                    else{
                        $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama = '$kategori'");
                        $jumlahData = mysqli_num_rows($query);
                        
                        if($jumlahData > 0){
            ?>
                                <div class="alert alert-warning mt-1" role="alert">
                                    Kategori Sudah Ada!
                                </div>
            <?php
                        }
                        else{
                            $querySimpan = mysqli_query($con, "UPDATE kategori SET nama = '$kategori' WHERE id = '$id'");

                            if($querySimpan){
            ?>
                                    <div class="alert alert-primary mt-1" role="alert">
                                        Kategori Berhasil Diedit!
                                    </div>
    
                                    <meta http-equiv="refresh" content="2; url=kategori.php" />
            <?php
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        }
                    }
                }

                if(isset($_POST['hapusBtn'])){
                    $queryCheck = mysqli_query($con, "SELECT *FROM produk WHERE kategori_id = '$id'");
                    $dataCount = mysqli_num_rows($queryCheck);
                    
                    if($dataCount > 0) {
            ?>
                            <div class="alert alert-warning mt-1" role="alert">
                                Kategori tidak bisa dihapus, karena sudah digunakan di Lukisan!
                            </div>
            <?php
                        die();
                    }

                    $queryHapus = mysqli_query($con, "DELETE FROM kategori WHERE id = '$id'");
                    
                    if($queryHapus){
            ?>
                            <div class="alert alert-primary mt-1" role="alert">
                                Kategori Berhasil  Dihapus
                            </div>

                            <meta http-equiv="refresh" content="2; url=kategori.php" />
            <?php
                    }
                    else{
                        echo mysqli_error($con);   
                    }
                }
            ?>
        </div>
    </div>

    <!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- font awesome -->
<script src="https://kit.fontawesome.com/c7fe0a8bea.js" crossorigin="anonymous"></script>
</body>
</html>