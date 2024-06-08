<?php
    require "session.php";
    require "../koneksi.php";

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
    // $query = mysqli_query($con, "SELECT *, kategori.nama AS nama, produk.nama AS produk_nama, produk.id AS produk_id FROM produk JOIN kategori ON produk.kategori_id = kategori.id");
    $jumlahProduk = mysqli_num_rows($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

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
    <title>Lukisan</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    form div  {
        margin-bottom: 10px;
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
                    <a href="produk.php" class="no-decoration text-muted">Lukisan</a>
                </li>
            </ol>
        </nav>

        <!-- Tambah Produk -->
        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Lukisan</h3>

            <form action="" method="post" enctype="multipart/form-data">

                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
                </div>

                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        <?php
                            while($data=mysqli_fetch_array($queryKategori)){
                        ?>
                            <option value="<?= $data['id']; ?>"><?= $data['nama']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>

                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>

                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="7" class="form-control"></textarea>
                </div>

                <div>
                    <label for="ketersediaan">Ketersediaan</label>
                    <select name="ketersediaan" id="ketersediaan" class="form-control">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Habis">Habis</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan'])) {
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
                            Nama, Kategori dan Harga wajin diisi!
                        </div>
            <?php
                    } 
                    else {
                        if($nama_file!='') {
                            if($image_size > 500000) {
            ?>
                                <div class="alert alert-warning mt3" role="alert">
                                    File tidak boleh lebih dari 500kb!
                                </div>
            <?php
                                exit();
                            }
                            else {
                                if($imageFileType != 'jpg' && $imageFileType != 'png') {
            ?>
                                    <div class="alert alert-warning mt-3" role="alert">
                                        File wajib bertipe jpg atau png!
                                    </div>
            <?php
                                    exit();
                                }
                                else {
                                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                                }
                            }
                        }

                        // Query insert ke Produk tabel
                        $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, foto, detail, nama, ketersediaan, harga) VALUES ('$kategori', '$new_name', '$detail', '$nama', '$ketersediaan', '$harga')");
    
                        if($queryTambah) {
            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Lukisan Berhasil Ditambahkan!
                            </div>
    
                            <meta http-equiv="refresh" content="2; url=produk.php"/>
            <?php
                        }
                        else {
                            echo mysqli_error($con);
                        }
                    }
                }
            ?>
        </div>

        <div class="mt-3 mb-5">
            <h2>List Lukisan</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Ketersediaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($jumlahProduk == 0){
                            ?>
                                <tr>
                                    <td colspan=6 class="text-center">Data Lukisan tidak tersedia</td>
                                </tr>
                            <?php
                        }
                        else{
                            $jumlah = 1;
                            while($data=mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <td><?= $jumlah; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['nama_kategori']; ?></td>
                                    <td><?= $data['harga']; ?></td>
                                    <td><?= $data['ketersediaan']; ?></td>
                                    <td>
                                    <a href="produk-detail.php?id=<?= $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
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