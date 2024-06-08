<?php
    session_start();
    require "../koneksi.php";
    require "../functions/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .main {
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)),
            url("../image/banner\(background_halaman_web\).jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .login-box {
        width: 500px;
        height: 350px;
        box-sizing: border-box;
        border-radius: 50px;
        background-color: rgb(30, 191, 209);
    }

    .
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-4 shadow">
            <form action="" method="post">
                <h3 class="text-center">
                    <b>REGISTRASI</b>
                </h3>
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off">
                </div>  
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password1" id="password">
                </div>  
                <div>
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password2" id="password">
                </div>  
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>

        <?php
            if(isset($_POST['loginbtn'])){
               $username = htmlspecialchars($_POST['username']);
               $password1 = htmlspecialchars($_POST['password1']);
               $password2 = htmlspecialchars($_POST['password2']);
               $result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");

               if($password1 !== $password2) {
                echo "<script> alert('Komfirmasi Password Salah!')</script>";
                return false;
                }
            
                if(mysqli_num_rows($result) > 0) {
                echo "<script> alert('username telah terdaftar!')</script>";
                return false;
                }

                if(registrasi($_POST) > 0) {
                    echo "<script> alert('registrasi berhasil')</script>";
                }

                header("location: ../admin/login.php");
            }
        ?>
        </div>
