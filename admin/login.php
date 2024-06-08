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
    <title>Login</title>
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
        height: 300px;
        box-sizing: border-box;
        border-radius: 50px;
        background-color: rgb(30, 191, 209);
    }

    .
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off">
                </div>  
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>  
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <a href="../registrasi/registrasi.php">Registrasi</a>
                </div>
            </form>
        </div>

        <div class="mt-3" style="width: 500px">
        <?php
            if(isset($_POST['loginbtn'])){
               $username = htmlspecialchars($_POST['username']);
               $password = htmlspecialchars($_POST['password']);
               $role = query("SELECT role FROM user WHERE username = '$username'")[0]["role"];
               
               $query = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
               $countdata = mysqli_num_rows($query);
               $data = mysqli_fetch_array($query);
               
               if($countdata>0) {
                if(password_verify($password, $data['password'])) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['login'] = true;

                    var_dump($role);

                    if($role==="admin") {
                        header('location:index.php');
                        exit;
                    }
                    else {
                        header('location:../index.php');
                        exit;
                    }
                }
                else {
        ?>
                  <div class="alert alert-warning" role="alert">Password anda salah!</div>
        <?php 
                }
               } 
               else {
        ?>
                  <div class="alert alert-warning" role="alert">Akun tidak terdaftar!</div>
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