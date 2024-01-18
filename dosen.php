<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function_dosen.php';

// Menampilkan semua data dari table dosen berdasarkan nip secara Descending
$dosen = query("SELECT * FROM dosen ORDER BY nip ASC");
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
            <a class="navbar-brand" href="index.php">Digilib Prodi Telkom | CRUD</a>
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
                        <a class="nav-link text-white active" aria-current="page" href="#">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pustaka1.php">Pustaka</a>
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
                <h3 class="text-center fw-bold text-uppercase">Data Dosen</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="addData_dosen.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah
                    Data</a>
                <a href="export_dosen.php" target="_blank" class="btn btn-success ms-1"><i
                        class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md table-responsive">
                <table id="data" class="table table-striped table-responsive table-hover text-center"
                    style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Homebase</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dosen as $row) : ?>
                        <tr>
                            <td><?= $row['nip']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['tlp']; ?></td>
                            <td><?= $row['homebase']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td>
                                <button class="btn btn-success btn-sm text-white detail" data-id="<?= $row['nip']; ?>"
                                    style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i></button>

                                <a href="ubah_dosen.php?nip=<?= $row['nip']; ?>" class="btn btn-warning btn-sm"
                                    style="font-weight: 600;"><i class="bi bi-pencil-square"></i></a>

                                <a href="hapus_dosen.php?nip=<?= $row['nip']; ?>" class="btn btn-danger btn-sm"
                                    style="font-weight: 600;"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nip']; ?> ?');"><i
                                        class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Close Container -->

    <!-- Modal Detail Data -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-uppercase" id="detail">Detail Data Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="detail-dosen">
                </div>
            </div>
        </div>
    </div>
    <!-- Close Modal Detail Data -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js">
    </script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        // Fungsi Table
        $('#data').DataTable();
        // Fungsi Table

        // Fungsi Detail
        $('.detail').click(function() {
            var dataDosen = $(this).attr("data-id");
            $.ajax({
                url: "detail_dosen.php",
                method: "post",
                data: {
                    dataDosen,
                    dataDosen
                },
                success: function(data) {
                    $('#detail-dosen').html(data);
                    $('#detail').modal("show");
                }
            });
        });
        // Fungsi Detail
    });
    </script>
</body>

</html>