<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function_pustaka1.php';

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
// if (isset($_POST['simpan'])) {
//     if (tambah($_POST) > 0) {
//         echo "<script>
//                 alert('Data pustaka berhasil ditambahkan!');
//                 document.location.href = 'pustaka1.php';
//             </script>";
//     } else {
//         // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
//         echo "<script>
//                 alert('Data pustaka gagal ditambahkan!');
//             </script>";
//     }
// }
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
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Digilib Prodi Telkom</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark text-uppercase" style="background-color:#6c63ff">
        <div class="container">
            <a class="navbar-brand" href="mahasiswa.php">Digilib Prodi Telkom| CRUD</a>
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
                        <a class="nav-link text-white" aria-current="page" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="pustaka1.php">Pustaka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logout.php">Logout</a>
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Pustaka
                </h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul:</label>
                        <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul">
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="tipe" class="form-label">Tipe:</label>
                            <select class="form-select" name="tipe" id="select">
                                <option selected>Pilih</option>
                                <option value="TA">TA</option>
                                <option value="Magang">Magang</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="tahun" class="form-label">Tahun:</label>
                            <select type="text" class="form-select" name="tahun">
                                <option>Pilih</option>
                                <?php
                            $th = array('2017', '2018', '2019', '2020', '2021', '2022');
                            foreach ($th as $tah){
                                if ($tah == $tahun) $sel = "SELECTED";
                                else $sel = "";
                                echo "<option value='$tah' $sel>$tah</option>";
                            }
                            ?>
                            </select>

                        </div>

                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="pembimbing1" class="form-label">Pembimbing 1:</label>
                            <select type="text" class="form-select" name="pembimbing1">
                                <option>Pilih</option>
                                <?php
                            $pb1 = array('a', 'b', 'c', 'd', 'e', 'f');
                            foreach ($pb1 as $pem1){
                                if ($pem1 == $pembimbing1) $sel = "SELECTED";
                                else $sel = "";
                                echo "<option value='$pem1' $sel>$pem1</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col" id="hide1">
                            <label for="pembimbing2" class="form-label">Pembimbing 2:</label>
                            <select type="text" class="form-select" name="pembimbing2">
                                <option>Pilih</option>
                                <?php
                            $pb2 = array('a', 'b', 'c', 'd', 'e', 'f');
                            foreach ($pb2 as $pem2){
                                if ($pem2 == $pembimbing2) $sel = "SELECTED";
                                else $sel = "";
                                echo "<option value='$pem2' $sel>$pem2</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col" id="hide2">
                            <label for="ketua_penguji" class="form-label">Ketua Penguji:</label>
                            <select type="text" class="form-select" name="ketua_penguji">
                                <option>Pilih</option>
                                <?php
                            $kp = array('a', 'b', 'c', 'd', 'e', 'f');
                            foreach ($kp as $ket){
                                if ($ket == $ketua_penguji) $sel = "SELECTED";
                                else $sel = "";
                                echo "<option value='$ket' $sel>$ket</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col" id="hide3">
                            <label for="sekretaris" class="form-label">Sekretaris:</label>
                            <select type="text" class="form-select" name="sekretaris">
                                <option>Pilih</option>
                                <?php
                            $sk = array('a', 'b', 'c', 'd', 'e', 'f');
                            foreach ($sk as $sek){
                                if ($sek == $sekretaris) $sel = "SELECTED";
                                else $sel = "";
                                echo "<option value='$sek' $sel>$sek</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col" id="hide4">
                            <label for="penguji1" class="form-label">Penguji 1:</label>
                            <select type="text" class="form-select" name="penguji1">
                                <option>Pilih</option>
                                <?php
                            $pn1 = array('a', 'b', 'c', 'd', 'e', 'f');
                            foreach ($pn1 as $peng1){
                                if ($peng1 == $penguji1) $sel = "SELECTED";
                                else $sel = "";
                                echo "<option value='$peng1' $sel>$peng1</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col" id="hide5">
                            <label for="penguji2" class="form-label">Penguji 2:</label>
                            <select type="text" class="form-select" name="penguji2">
                                <option>Pilih</option>
                                <?php
                            $pn2 = array('a', 'b', 'c', 'd', 'e', 'f');
                            foreach ($pn2 as $peng2){
                                if ($peng2 == $penguji2) $sel = "SELECTED";
                                else $sel = "";
                                echo "<option value='$peng2' $sel>$peng2</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col" id="hide6">
                            <label for="penguji3" class="form-label">Penguji 3:</label>
                            <select type="text" class="form-select" name="penguji3">
                                <option>Pilih</option>
                                <?php
                            $pn3 = array('a', 'b', 'c', 'd', 'e', 'f');
                            foreach ($pn3 as $peng3){
                                if ($peng3 == $penguji3) $sel = "SELECTED";
                                else $sel = "";
                                echo "<option value='$peng3' $sel>$peng3</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row add input_fields_wrap">
                        <div class="col">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
                        </div>
                        <div class="col">
                            <label for="nim" class="form-label">NIM:</label>
                            <input type="text" class="form-control" placeholder="Masukkan NIM" name="nim">
                        </div>
                        <div class="col">
                            <label for="kelas" class="form-label">Kelas:</label>
                            <select type="text" class="form-select" placeholder="Masukkan Kelas" name="kelas">
                                <option>Pilih</option>
                                <?php
                                $k = array('TK-3A', 'TK-3B', 'TE-4A', 'TE-4B');
                                foreach ($k as $kls){
                                    if ($kls == $kelas) $sel = "SELECTED";
                                    else $sel = "";
                                    echo "<option value='$kls' $sel>$kls</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col mt-4" id="hide7">
                            <button class="add_field_button" style="border:none; background-color:white">
                                <i class="bi bi-plus-square-fill fa-2x plus text-success"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi:</label>
                        <select type="text" class="form-select" placeholder="Masukkan Prodi" name="prodi">
                            <option>Pilih</option>
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
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" name="jurusan">
                            <option value="">Pilih</option>
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
                    <div class="mb-3">
                        <label class="form-label" for="customFile">Upload Dokumen</label>
                        <input type="file" class="form-control" id="customFile" />
                        <hr>
                        <a href="pustaka1.php" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- Form End -->
        </div>
    </div>
    <!-- Close Container -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        // dynamic input form
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(
                    '<div class="row">' +
                    '<div class="col">' +
                    '<label for="nama" class="form-label">Nama:</label>' +
                    '<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">' +
                    '</div>' +
                    '<div class="col">' +
                    '<label for="nim" class="form-label">NIM:</label>' +
                    '<input type="text" class="form-control" placeholder="Masukkan NIM" name="nim">' +
                    '</div>' +
                    '<div class="col">' +
                    '<label for="kelas" class="form-label">Kelas:</label>' +
                    '<select type="text" class="form-select" placeholder="Masukkan Kelas" name="kelas">' +
                    '<option>Pilih</option>' +
                    <?php
                                $k = array('TK-3A', 'TK-3B', 'TE-4A', 'TE-4B');
                                foreach ($k as $kls){
                                    if ($kls == $kelas) $sel = "SELECTED";
                                    else $sel = "";
                                    echo "<option value='$kls' $sel>$kls</option>";
                                }
                                ?> '</select>' +
                    '</div>' +
                    '<div class="col mt-4 remove_field" id="hide7">' +
                    '<button style="border:none; background-color:black">' +
                    '<i id="myIcon" class="bi bi-x-square-fill fa-2x plus text-danger"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                ); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });

    // hide div when option selected
    const el = document.getElementById('select');
    const box1 = document.getElementById('hide1');
    const box2 = document.getElementById('hide2');
    const box3 = document.getElementById('hide3');
    const box4 = document.getElementById('hide4');
    const box5 = document.getElementById('hide5');
    const box6 = document.getElementById('hide6');
    const box7 = document.getElementById('hide7');

    el.addEventListener('change', function handleChange(event) {
        if (event.target.value === 'Magang') {
            box1.style.display = 'none';
            box2.style.display = 'none';
            box3.style.display = 'none';
            box4.style.display = 'none';
            box5.style.display = 'none';
            box6.style.display = 'none';
            box7.style.display = 'none';
        } else {
            box1.style.display = 'block';
            box2.style.display = 'block';
            box3.style.display = 'block';
            box4.style.display = 'block';
            box5.style.display = 'block';
            box6.style.display = 'block';
            box7.style.display = 'block';
        }
    });
    </script>
</body>

</html>