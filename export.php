<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nim DESC");

// Membuat nama file
$filename = "data mahasiswa-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>E-Mail</th>
            <th>Telepon</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['tlp']; ?></td>
            <td><?= $row['prodi']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td><?= $row['alamat']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>