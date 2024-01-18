<?php
// Memanggil atau membutuhkan file function.php
require 'function_dosen.php';

// Menampilkan semua data dari table dosen berdasarkan nip secara Descending
$dosen = query("SELECT * FROM dosen ORDER BY nip DESC");

// Membuat nama file
$filename = "data dosen-" . date('Ymd') . ".xls";

// Kodingamn untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Dosen.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>E-Mail</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($dosen as $row) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nip']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['tlp']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['alamat']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>