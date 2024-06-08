<?php

    require "session.php";
    require "../koneksi.php";

    $id = $_GET['id'];

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
    $data =  mysqli_fetch_array($query); 

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1 )];
        }
        return $randomString;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Lukisan Detail</title>
</head>

<style>
    form div {
        margin-bottom: 10px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    
    <div class="container mt-5">
        <h2>Detail Lukisan</h2>

        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data">

                <div>   
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?= $data['nama']; ?>" class="form-control" autocomplete="off" required>
                </div>

                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?= $data['kategori_id']; ?>"><?= $data['nama_kategori']; ?></option>
                        <?php
                            while($dataKategori=mysqli_fetch_array($queryKategori)){
                        ?>
                            <option value="<?= $dataKategori['id']; ?>"><?= $dataKategori['nama']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" value="<?= $data['harga']; ?>" name="harga" required>
                </div>
                
                <div>
                    <label for="currentFoto">Foto Lukisan Sekarang</label>
                    <img src="../image/<?= $data['foto']; ?>" alt="" width="100px">
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="7" class="form-control">
                        <?= $data['detail']; ?>
                    </textarea>
                </div>
                
                <div>
                    <label for="ketersediaan">Ketersediaan</label>
                    <select name="ketersediaan" id="ketersediaan" class="form-control">
                        <option value="<?= $data['ketersediaan']; ?>"><?= $data['ketersediaan']; ?></option>
                        <?php
                            if($data['ketersediaan']=='Tersedia'){
                        ?>
                                <option value="habis" value="Habis">Habis</option>
                        <?php
                            }
                            else {
                        ?>
                                <option value="tersedia" value="Tersedia">Tersedia</option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan'])) {
                    // var_dump("UBAH"); die();
                    $nama = htmlspecialchars($_POST['nama']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $detail = htmlspecialchars($_POST['detail']);
                    $ketersediaan = htmlspecialchars($_POST['ketersediaan']);

                    $target_dir = "../image/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]['size'];
                    $random_name = generateRandomString(20);
                    $new_name = $random_name . "." . $imageFileType;

                    if($nama=='' || $kategori=='' || $harga=='') {
            ?>
                        <div class="alert alert-warning mt-3" role="alert">
                             Nama, Kategori dan Harga wajib diisi!
                        </div>
            <?php
                    }
                    else {
                        
                        $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', harga='$harga', detail='$detail', ketersediaan='$ketersediaan' WHERE id='$id'");

                        if(isset($_FILES['foto'])) {
                            if($nama_file!='') {
                                if($image_size > 500000) {
            ?>
                                    <div class="alert alert-warning mt3" role="alert">
                                        File tidak boleh lebih dari 500kb!
                                    </div>
            <?php
                                }
                                else {
                                    if($imageFileType != 'jpg' && $imageFileType != 'png') {
            ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            File wajib bertipe jpg atau png!
                                        </div>
            <?php
                                    }
                                    else {
                                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                                        $queryUpdate = mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");

                                        if($queryUpdate) {
                                            
            ?>
                                            <div class="alert alert-primary mt-3" role="alert">
                                                Lukisan Berhasil Diupdate!
                                            </div>

                                            <meta http-equiv="refresh" content="2; url=produk.php" />
            <?php
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                if(isset($_POST['hapus'])) {
                    $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");

                    if($queryHapus) {
            ?>
                        <div  class="alert alert-primary mt-3" role="alert">
                            Lukisan Berhasil Dihapus!
                        </div>

                        <meta http-equiv="refresh" content="2; url=produk.php" />
            <?php
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