<?php
session_start();
// Jika bisa login maka ke index.php
if (isset($_SESSION['login'])) {
    header('location:hero.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// jika tombol yang bernama login diklik
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // password menggunakan md5

    // mengambil data dari user dimana username yg diambil
    $result = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username'");

    $cek = mysqli_num_rows($result);

    // jika $cek lebih dari 0, maka berhasil login dan masuk ke index.php
    if ($cek > 0) {
        $_SESSION['login'] = true;

        header('location:hero.php');
        exit;
    }
    // jika $cek adalah 0 maka tampilkan error
    $error = true;  
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login Digilib</title>
</head>

<body
    style="background-image: url(https://img.freepik.com/free-photo/abstract-surface-textures-white-concrete-stone-wall_74190-8189.jpg?w=1060&t=st=1686409575~exp=1686410175~hmac=ba13ff62686032703acd971a8f92f3fe1a1a34ac73621366d6cef0d77ad4ea9e)">
    <div class="content">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="mb-4 text-center">
                                <img src="https://visionic.co.id/wp-content/uploads/2022/01/polines_brand-1024x230.png"
                                    alt="logo-polines" class="img-fluid mb-5" style=" max-width: 75%">
                                <p class="mb-10">Enter your login details</p>
                                <!-- Ini Error jika tidak bisa login -->
                                <?php if (isset($error)) : ?>
                                <?php echo '<script>alert("Username atau Password Salah!");</script>'; ?>
                                <?php endif; ?>
                            </div>
                            <form action="" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" autocomplete="off" required>

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" autocomplete="off"
                                        required>
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> -->
                                </div>

                                <input type="submit" value="Log In" name="login" class="btn btn-block btn-primary">

                                <!-- <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>

                <div class="social-login">
                  <a href="#" class="facebook">
                    <span class="icon-facebook mr-3"></span>
                  </a>
                  <a href="#" class="twitter">
                    <span class="icon-twitter mr-3"></span>
                  </a>
                  <a href="#" class="google">
                    <span class="icon-google mr-3"></span>
                  </a>
                </div> -->
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>