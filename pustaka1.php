<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

include('koneksi.php');
include('function_pustaka1.php');
$digi = new digilib;
$koneksi = $digi->koneksi();

//ambil value dan variable dari payload
if(isset($_POST['tombol'])){
    if ($_POST['tombol'] == 'edit'){
        $id_judul = $_POST['id_judul'];
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $tipe = $_POST['tipe'];
        $tahun = $_POST['tahun'];
        $pembimbing1 = $_POST['pembimbing1'];
        $pembimbing2 = $_POST['pembimbing2'];
        $ketuapenguji = $_POST['ketuapenguji'];
        $penguji1 = $_POST['penguji1'];
        $penguji2 = $_POST['penguji2'];
        $penguji3 = $_POST['penguji3'];
        $sekretaris = $_POST['sekretaris'];
        $mhs = $_POST['mhs'];

        $nama_form = "form_pustaka";
        $tombol_val = "simpan";
        
        //upload file 
        $target_dir = "laporan/";
        $nama_file = basename($_FILES["laporan"]["name"]);
        $target_file = $target_dir . $nama_file;

        //jika nama file diisi
        if (!empty($nama_file)) move_uploaded_file($_FILES["laporan"]["tmp_name"], $target_file);

        //update tabel pustaka1
        if (!empty($nama_file)) {
            mysqli_query($koneksi, "UPDATE pustaka1 SET judul=\"$judul\",tahun='$tahun',tipe='$tipe',pembimbing1='$pembimbing1',pembimbing2='$pembimbing2',ketuapenguji='$ketuapenguji',penguji1='$penguji1',penguji2='$penguji2',penguji3='$penguji3',sekretaris='$sekretaris',nama_file=\"$nama_file\" WHERE id='$id_judul'");
        }
        else {
            mysqli_query($koneksi, "UPDATE pustaka1 SET judul=\"$judul\",tahun='$tahun',tipe='$tipe',pembimbing1='$pembimbing1',pembimbing2='$pembimbing2',ketuapenguji='$ketuapenguji',penguji1='$penguji1',penguji2='$penguji2',penguji3='$penguji3',sekretaris='$sekretaris' WHERE id='$id_judul'");
        }

        //update tabel pustaka2
        mysqli_query($koneksi, "DELETE FROM pustaka2 WHERE id_judul='$id_judul'");

        for ($i = 0; $i < count($mhs); $i++) {
            $e = explode(' ', $mhs[$i]);
            mysqli_query($koneksi, "INSERT INTO pustaka2 (id_judul,nim) VALUES ('$id_judul','$e[0]')");
        }
    
        // cek data masuk
        if (mysqli_affected_rows($koneksi) > 0) echo "<script>alert('Data berhasil diubah!');
        document.location.href = 'pustaka1.php';</script>";
        
        else echo "<script>alert('Data gagal diubah!')</script>";
    
            $judul = "";
            $tipe = "";
            $tahun = "";
            $pembimbing1 = "";
            $pembimbing2 = "";
            $ketuapenguji = "";
            $penguji1 = "";
            $penguji2 = "";
            $penguji3 = "";
            $sekretaris = "";
            $mhs = "";
    }
    elseif ($_POST['tombol'] == "hapus") {
        $id_judul = $_POST['id_judul'];
        
        $q = mysqli_query($koneksi, "SELECT nama_file FROM pustaka1 WHERE id='$id_judul'");
        $d = mysqli_fetch_row($q);

        //hapus file
        if (!empty($d[0])) {
            $laporan = "./laporan/$d[0]";
            unlink($laporan);
        }

        //hapus data dari pustaka1
        mysqli_query($koneksi, "DELETE FROM pustaka1 WHERE id='$id_judul'");
        //hapus data dari pustaka2
        mysqli_query($koneksi, "DELETE FROM pustaka2 WHERE id_judul='$id_judul'");
        $judul = "";
        $nama_file = "";
        $nama_form = "form_pustaka";
    }
}

elseif (!empty($_GET['t'])) {
    if ($_GET['t'] == 'edit') {
        $id = $_GET['id'];

        //sql tampilkan data
        $q = mysqli_query($koneksi, "SELECT judul,tipe,tahun,pembimbing1,pembimbing2,ketuapenguji,penguji1,penguji2,penguji3,sekretaris,nama_file FROM pustaka1 WHERE id='$id'");
        $d = mysqli_fetch_row($q);
        $judul=$d[0];
        $tipe=$d[1];
        $tahun=$d[2];
        $pembimbing1=$d[3];
        $pembimbing2=$d[4];
        $ketuapenguji=$d[5];
        $penguji1=$d[6];
        $penguji2=$d[7];
        $penguji3=$d[8];
        $sekretaris=$d[9];
        $nama_file=$d[10];

        $nama_form = "form_pustaka_edit";
        $tombol_val = "edit";

        // if (mysqli_affected_rows($koneksi) > 0) {
        //     echo "<script>alert('Data berhasil diubah!');
        //     document.location.href = 'pustb.php';</script>";
        // }
        // else {
        //     $judul = "";
        //     $tipe = "";
        //     $tahun = "";
        //     $pembimbing_1 = "";
        //     $pembimbing_2 = "";
        //     $ketua_penguji = "";
        //     $penguji_1 = "";
        //     $penguji_2 = "";
        //     $penguji_3 = "";
        //     $sekretaris = "";
        //     $mhs = "";
        //     $tombol_val = "simpan";
        //     echo "<script>alert('Data gagal diubah!')</script>";
        // }
    }
}

else {
    $judul = "";
    $nim = "";
    $nama = "";
    $kelas = "";
    $jurusan = "";
    $prodi = "";
    $pembimbing1 = "";
    $pembimbing2 = "";
    $tipe = "";
    $tahun = "";
    $tombol_val = "simpan";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">


                </div>

            </div>
        </div>
    </div>

    <!-- jquery -->
    <script>
    $(document).ready(function() {
        $("a:nth-child(2)").click(function() {
            console.log("diklik lho...");
            id_judul = $(this).attr("href");
            judul = $(this).attr("data-judul");
            $(".modal-title").text("Konfirmasi Hapus");
            $(".modal-body").text("Apakah anda yakin ingin menghapus " + judul + " ?");
            form1 = "<form method=post>";
            form2 = "<input type=hidden name=id_judul value=" + id_judul + ">";
            form3 =
                "<button type=submit class=\"btn btn-danger me-2\" name=tombol value=hapus>Ya</button>";
            form4 =
                "<button type=button class=\"btn btn-secondary\" data-bs-dismiss=modal>Tidak</button>";
            form5 = "</form>";
            form = form1 + form2 + form3 + form4 + form5;

            $(".modal-footer").empty().append(form);
        })
    })
    </script>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark text-uppercase" style="background-color:#6c63ff">
        <div class="container">
            <a class="navbar-brand" href="home.php">Digilib Prodi Telkom | CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="hero.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dosen.php">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="mahasiswa.php">Mahasiswa</a>
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
                <h3 class="text-center fw-bold text-uppercase">Data Pustaka</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="addData_pustaka1.php" class="btn btn-primary"><i
                        class="bi bi-person-plus-fill"></i>&nbsp;Tambah
                    Data</a>
                <a href="export_pustaka1.php" target="_blank" class="btn btn-success ms-1"><i
                        class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md table-responsive">
                <table id="data" class="table table-striped table-responsive table-hover text-center"
                    style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Mahasiswa</th>
                            <th scope="col">Pembimbing</th>
                            <th scope="col">Ketua Penguji</th>
                            <th scope="col">Penguji</th>
                            <th scope="col">Sekretaris</th>
                            <th scope="col">File Laporan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = mysqli_query($koneksi, "SELECT * FROM pustaka1 ORDER BY tahun ASC,tipe ASC");
                        while ($d = mysqli_fetch_row($q)) {
                            $id = $d[0];
                            $judul = $d[1];
                            $tipe = $d[2];
                            $tahun = $d[3];
                            $pembimbing1 = $digi->nip_to_nama($d[4]);
                            $pembimbing2 = $digi->nip_to_nama($d[5]);
                            $ketuapenguji = $digi->nip_to_nama($d[6]);
                            $penguji1 = $digi->nip_to_nama($d[7]);
                            $penguji2 = $digi->nip_to_nama($d[8]);
                            $penguji3 = $digi->nip_to_nama($d[9]);
                            $sekretaris = $digi->nip_to_nama($d[10]);
                            $nama_file = $d[11];

                            echo "<tr>                         
                                  <td>$judul</td>
                                  <td>$tipe</td>
                                  <td>$tahun</td>
                                  <td>";
                                        //data mahasiswa
                                        $n = 0 ;
                                        $q2 = mysqli_query($koneksi, "SELECT nim FROM pustaka2 WHERE id_judul='$id'");
                                        while ($d2 = mysqli_fetch_row($q2)) {
                                            $n++;
                                                echo "$n. " . $digi->nim_to_nama($d2[0]); echo"<br>";
                                        }
                            echo "</td>
                                  <td>1. $pembimbing1<BR>2. $pembimbing2</td>
                                  <td>$ketuapenguji</td>
                                  <td>1. $penguji1<BR>2. $penguji2<BR>3. $penguji3</td>
                                  <td>$sekretaris</td>
                                  <td><button type=button class='btn btn-outline-primary'><a href=\"laporan/$nama_file\" target=_blank><i class=\"bi bi-file-pdf\"></i></a></button>
                                  </td>
                                  <td>
                                    <a href = 'ubah_pustaka1.php?t=edit&id=$id'><span class=\"badge bg-primary me-2\">Edit</span></a>
                                    <a href = '$id' data-judul='$judul' data-bs-toggle=modal data-bs-target=#myModal><span class=\"badge bg-danger\">Hapus</span></a>
                                  </td>
                                  </tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Close Container -->


    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <!-- Close Container -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        // Fungsi Table
        $('#data').DataTable();
        // Fungsi Table
    });
    </script>
</body>

</html>