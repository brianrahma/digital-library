<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data dari nim dengan fungsi get
$nim = $_GET['nim'];

// Mengambil data dari table mahasiswa dari nim yang tidak sama dengan 0
$mahasiswa = query("SELECT * FROM mahasiswa WHERE nim = '$nim'")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data mahasiswa berhasil diubah!');
                document.location.href = 'mahasiswa.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data mahasiswa gagal diubah!');
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
            <a class="navbar-brand" href="index.php">Digilib Prodi Telkom | CRUD</a>
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Mahasiswa</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg-5">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" value="<?= $mahasiswa['nim']; ?>"
                                name="nim" readonly>
                        </div>
                        <div class="col-lg-7">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" value="<?= $mahasiswa['nama']; ?>"
                                name="nama" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select class="form-select" id="prodi" name="kelas">
                                <option disabled>Pilih Kelas</option>
                                <option value="TK-2A"
                                    <?php if ($mahasiswa['kelas'] == 'TK-2A') {  echo "selected"; } ?>>
                                    TK-2A</option>
                                <option value="TK-2B"
                                    <?php if ($mahasiswa['kelas'] == 'TK-2B') {  echo "selected"; } ?>>
                                    TK-2B</option>
                                <option value="TK-3A"
                                    <?php if ($mahasiswa['kelas'] == 'TK-3A') {  echo "selected"; } ?>>
                                    TK - 3A</option>
                                <option value="TK-3B"
                                    <?php if ($mahasiswa['kelas'] == 'TK-3B') {  echo "selected"; }  ?>>
                                    TK - 3B</option>
                                <option value="TE-2A"
                                    <?php if ($mahasiswa['kelas'] == 'TE-2A') {  echo "selected"; } ?>>
                                    TE-2A</option>
                                <option value="TE-2B"
                                    <?php if ($mahasiswa['kelas'] == 'TE-2B') {  echo "selected"; } ?>>
                                    TE-2B</option>
                                <option value="TE-3A"
                                    <?php if ($mahasiswa['kelas'] == 'TE-3A') {  echo "selected"; } ?>>
                                    TE-3A</option>
                                <option value="TE-3B"
                                    <?php if ($mahasiswa['kelas'] == 'TE-3B') {  echo "selected"; } ?>>
                                    TE-3B</option>
                                <option value="TE-4A"
                                    <?php if ($mahasiswa['kelas'] == 'TE-4A') {  echo "selected"; } ?>>
                                    TE-4A</option>
                                <option value="TE-4B"
                                    <?php if ($mahasiswa['kelas'] == 'TE-4B') {  echo "selected"; } ?>>
                                    TE-4B</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg">
                            <label for="prodi" class="form-label">Prodi</label>
                            <select class="form-select" id="prodi" name="prodi">
                                <option disabled>Pilih Prodi</option>
                                <option value="D3-Teknik Telekomunikasi"
                                    <?php if ($mahasiswa['prodi'] == 'D3-Teknik Telekomunikasi') { ?> selected=''
                                    <?php } ?>>D3-Teknik Telekomunikasi</option>
                                <option value="D4-Teknik Telekomunikasi"
                                    <?php if ($mahasiswa['prodi'] == 'D4-Teknik Telekomunikasi') { ?> selected=''
                                    <?php } ?>>D4-Teknik Telekomunikasi</option>
                            </select>
                        </div>
                        <div class="col-lg">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select class="form-select" id="jurusan" name="jurusan">
                                <option disabled>Pilih Jurusan</option>
                                <option value="Teknik Elektro"
                                    <?php if ($mahasiswa['jurusan'] == 'Teknik Eelektro') { ?> selected='' <?php } ?>>
                                    Teknik Elektro</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" value="<?= $mahasiswa['email']; ?>"
                                name="email" autocomplete="off" required>
                        </div>
                        <div class="col-lg">
                            <label for="tlp" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="tlp" value="<?= $mahasiswa['tlp']; ?>"
                                name="tlp" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="5" name="alamat"
                            autocomplete="off"><?= $mahasiswa['alamat']; ?></textarea>
                    </div>
                    <hr>
                    <a href="mahasiswa.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
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