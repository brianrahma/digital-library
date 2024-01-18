<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa berhasil ditambahkan!');
                document.location.href = 'mahasiswa.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data Mahasiswa gagal ditambahkan!');
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Digilib Prodi Telkom| CRUD</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark text-uppercase" style="background-color:#6c63ff">
        <div class="container">
            <a class="navbar-brand" href="hero.php">Digilib Prodi Telkom| CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="hero.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="dosen.php">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="pustaka1.php">Pustaka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Mahasiswa
                </h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg-5">
                            <label for="nim" class="form-label">NIM:</label>
                            <input type="text" class="form-control" placeholder="Masukkan NIM" name="nim">
                        </div>
                        <div class="col-lg-7">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg">
                            <label for="kelas" class="form-label">Kelas:</label>
                            <select type="text" class="form-select" name="kelas">
                                <option selected disabled>Pilih</option>
                                <?php
                                $k = array('TK-2A', 'TK-2B', 'TK-3A', 'TK-3B', 'TE-2A', 'TE-2B', 'TE-3A', 'TE-3B', 'TE-4A', 'TE-4B');
                                foreach ($k as $kls){
                                    if ($kls == $kelas) $sel = "SELECTED";
                                    else $sel = "";
                                    echo "<option value='$kls' $sel>$kls</option>";
                                }
                               ?>
                            </select>
                        </div>
                        <div class="mb-3 col-lg">
                            <label for="prodi" class="form-label">Prodi:</label>
                            <select type="text" class="form-select" placeholder="Masukkan Prodi" name="prodi">
                                <option selected disabled>Pilih</option>
                                <?php
                                $pro = array('D3-Teknik Telekomunikasi', 'D4-Teknik Telekomunikasi');
                                foreach ($pro as $prod){
                                    if ($prod == $prodi) $sel = "SELECTED";
                                    else $sel = "";
                                    echo "<option value='$prod' $sel>$prod</option>";
                                }
    
                               ?>
                            </select>
                        </div>
                        <div class="col-lg">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select class="form-select" name="jurusan">
                                <option selected disabled>Pilih</option>
                                <?php
                                $j = array ('Teknik Elektro');
                                foreach ($j as $jrs) {
                                    if ($jrs == $jurusan) $sel = "SELECTED";
                                    else $sel = "";
                                    echo "<option value='$jrs' $sel>$jrs</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" placeholder="Masukkan Email" name="email">
                        </div>
                        <div class="col-lg">
                            <label for="tlp" class="form-label">Telepon:</label>
                            <input type="text" class="form-control" placeholder="Masukkan Telepon" name="tlp">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" rows="5" name="alamat"></textarea>
                    </div>
                    <hr>
                    <a href="mahasiswa.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>