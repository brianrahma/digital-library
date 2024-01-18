<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
include 'koneksi.php';

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

    <!-- <link rel="stylesheet" href="./jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.structure.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.theme.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.theme.min.css"> -->
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.structure.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.theme.css">
    <link rel="stylesheet" href="./jquery-ui/jquery-ui.theme.min.css">

    <title>Digilib Prodi Telkom</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark text-uppercase" style="background-color:#6c63ff">
        <div class="container">
            <a class="navbar-brand" href="hero.php">Digilib Prodi Telkom | CRUD</a>
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
                        <a class="nav-link text-white active" aria-current="page" href="pustaka1.php">Pustaka</a>
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Pustaka
                </h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="POST" id="form_pustaka" enctype="multipart/form-data">
                    <input type="hidden" name="p" value="pustaka">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul:</label>
                        <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul">
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="tipe" class="form-label">Tipe:</label>
                            <select class="form-select" name="tipe" id="tipe">
                                <option selected disabled>Pilih</option>
                                <option value="TA">TA</option>
                                <option value="Magang">Magang</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="tahun" class="form-label">Tahun:</label>
                            <select class="form-select" name="tahun">
                                <option selected disabled>Pilih</option>
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
                        <div class="mb-3 col-lg">
                            <label for="pembimbing1" class="form-label">Pembimbing 1:</label>
                            <select class="form-select" name="pembimbing1">
                                <option selected disabled>Pilih</option>
                                <?php
                                $q = mysqli_query($koneksi, "SELECT nip, nama FROM dosen ORDER BY nama ASC");
                                while ($d = mysqli_fetch_row($q)){
                                    echo "<option value='$d[0]'>$d[1] $d[2]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg" id="hide1">
                            <label for="pembimbing2" class="form-label">Pembimbing 2:</label>
                            <select class="form-select" name="pembimbing2">
                                <option selected disabled>Pilih</option>
                                <?php
                                $q = mysqli_query($koneksi, "SELECT nip, nama FROM dosen ORDER BY nama ASC");
                                while ($d = mysqli_fetch_row($q)){
                                    echo "<option value='$d[0]'>$d[1] $d[2]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class=" mb-3 col-lg" id="hide2">
                            <label for="ketuapenguji" class="form-label">Ketua Penguji:</label>
                            <select class="form-select" name="ketuapenguji">
                                <option selected disabled>Pilih</option>
                                <?php
                                $q = mysqli_query($koneksi, "SELECT nip, nama FROM dosen ORDER BY nama ASC");
                                while ($d = mysqli_fetch_row($q)){
                                    echo "<option value='$d[0]'>$d[1] $d[2]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg" id="hide3">
                            <label for="sekretaris" class="form-label">Sekretaris:</label>
                            <select class="form-select" name="sekretaris">
                                <option selected disabled>Pilih</option>
                                <?php
                                $q = mysqli_query($koneksi, "SELECT nip, nama FROM dosen ORDER BY nama ASC");
                                while ($d = mysqli_fetch_row($q)){
                                    echo "<option value='$d[0]'>$d[1] $d[2]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg" id="hide4">
                            <label for="penguji1" class="form-label">Penguji 1:</label>
                            <select class="form-select" name="penguji1">
                                <option selected disabled>Pilih</option>
                                <?php
                                $q = mysqli_query($koneksi, "SELECT nip, nama FROM dosen ORDER BY nama ASC");
                                while ($d = mysqli_fetch_row($q)){
                                    echo "<option value='$d[0]'>$d[1] $d[2]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 col-lg" id="hide5">
                            <label for="penguji2" class="form-label">Penguji 2:</label>
                            <select class="form-select" name="penguji2">
                                <option selected disabled>Pilih</option>
                                <?php
                                $q = mysqli_query($koneksi, "SELECT nip, nama FROM dosen ORDER BY nama ASC");
                                while ($d = mysqli_fetch_row($q)){
                                    echo "<option value='$d[0]'>$d[1] $d[2]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg" id="hide6">
                            <label for="penguji3" class="form-label">Penguji 3:</label>
                            <select class="form-select" name="penguji3">
                                <option selected disabled>Pilih</option>
                                <?php
                                $q = mysqli_query($koneksi, "SELECT nip, nama FROM dosen ORDER BY nama ASC");
                                while ($d = mysqli_fetch_row($q)){
                                    echo "<option value='$d[0]'>$d[1] $d[2]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="mhs[]" class="form-label">Nama:</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama" name="mhs[]">
                        </div>
                        <div class="col mt-4" style="padding-top:15px;">
                            <button type="button" name="tambahkan" id="tambahkan" class="btn add_button"
                                style="border:none; background-color:white">
                                <i class="bi bi-plus-square-fill fa-2x plus text-success"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3" id="input_kelas">
                        <label class="form-label" for="customFile">Upload Dokumen</label>
                        <input type="file" class="form-control" name="laporan" id="customFile" name="file" multiple />
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

    <!-- <script type="text/javascript">
    // // hide div when option selected
    // const el = document.getElementById('tipe');
    // const box1 = document.getElementById('hide1');
    // const box2 = document.getElementById('hide2');
    // const box3 = document.getElementById('hide3');
    // const box4 = document.getElementById('hide4');
    // const box5 = document.getElementById('hide5');
    // const box6 = document.getElementById('hide6');
    // const box7 = document.getElementById('hide7');

    // el.addEventListener('change', function handleChange(event) {
    //     if (event.target.value === 'Magang') {
    //         box1.style.display = 'none';
    //         box2.style.display = 'none';
    //         box3.style.display = 'none';
    //         box4.style.display = 'none';
    //         box5.style.display = 'none';
    //         box6.style.display = 'none';
    //         box7.style.display = 'none';
    //     } else {
    //         box1.style.display = 'block';
    //         box2.style.display = 'block';
    //         box3.style.display = 'block';
    //         box4.style.display = 'block';
    //         box5.style.display = 'block';
    //         box6.style.display = 'block';
    //         box7.style.display = 'block';
    //     }
    // });
    </script> -->
    <script>
    $(document).ready(function() {
        // hide div when option selected
        $("select[name='tipe']").on("change", function() {

            tipe = $(this).find(":selected").val();
            console.log("ke select " + tipe);
            if (tipe == "Magang") {
                $("#hide1, #hide2, #hide3, #hide4, #hide5, #hide6, .add_button").fadeOut(500);
            } else {
                $("#hide1, #hide2, #hide3, #hide4, #hide5, #hide6, .add_button").fadeIn(500);
            }
        })

        $(".add_button").click(function() {
            mhs1 = '<div class="row" id="mhs_del">';
            mhs2 = '<div class="col-sm-6 mb-3">';
            mhs3 = '<input type="text" class="form-control" placeholder="Masukkan nama" name="mhs[]">';
            mhs4 = '</div>';
            mhs5 = '<div class="col-sm-2 remove_button">';
            mhs6 =
                '<button type="button" name="tambahkan" id="tambahkan"class="btn"><i class="bi bi-x-square-fill text-danger"></i></button>';
            mhs7 = '</div>';
            mhs8 = '</div>';
            mhs_add = mhs1 + mhs2 + mhs3 + mhs4 + mhs5 + mhs6 + mhs7 + mhs8;

            $("#input_kelas").before(mhs_add);

            $(".remove_button").click(function() {
                console.log("remove button");
                $("#mhs_del").remove();
            })
            $("input[name='mhs[]']").keyup(function() {
                mhs_nama = $(this).val();
                console.log("nama: " + mhs_nama);

                $.ajax({
                        method: "POST",
                        url: "data_ajax.php",
                        data: {
                            p: "mahasiswa",
                            nama: mhs_nama
                        },
                        dataType: "json"
                    })
                    .done(function(data) {
                        $("input[name='mhs[]']").autocomplete({
                            source: data
                        });
                    })
                    .fail(function(msg) {
                        console.log("error: " + msg);
                    })
            })
        })

        //agar ketika pembimbing1 = ketuapenguji saat select
        $("select[name='pembimbing1']").on("change", function() {
            pembimbing1 = $(this).find(":selected").val();
            $("select[name='ketuapenguji']").val(pembimbing1);
        })

        $("select[name='ketuapenguji']").on("change", function() {
            ketuapenguji = $(this).find(":selected").val();
            $("select[name='pembimbing1']").val(ketuapenguji);
        })

        // syntax mencari nama dengan ajax
        $("input[name='mhs[]']").keyup(function() {
            mhs_nama = $(this).val();
            console.log("nama: " + mhs_nama);

            $.ajax({
                    method: "POST",
                    url: 'data_ajax.php',
                    data: {
                        p: "mahasiswa",
                        nama: mhs_nama
                    },
                    dataType: "json"
                })
                .done(function(data) {
                    $("input[name='mhs[]']").autocomplete({
                        source: data
                    });
                })
                .fail(function(msg) {
                    console.log("error: " + msg);
                })
        })
        $('#form_pustaka').submit(function(e) {
            e.preventDefault(); // prefent default form submission

            // Get the form data
            var formData = new FormData(this);

            // make an ajax request
            $.ajax({
                    url: 'data_ajax.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false
                })
                .done(function() {
                    console.log("oke");
                })
                .fail(function(msg) {
                    console.log("error " + msg)
                })
        })
    });
    </script>
    <script src="./jquery-ui/jquery-ui.js"></script>
    <script src="./jquery-ui/jquery-ui.min.js"></script>
</body>

</html>