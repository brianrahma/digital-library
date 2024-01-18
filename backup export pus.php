<?php
// Memanggil atau membutuhkan file function.php
require 'function_pustaka1.php';

// Menampilkan semua data dari table dosen berdasarkan nip secara Descending
$pustaka1 = query("SELECT * FROM pustaka1 ORDER BY id ASC")

// Membuat nama file
$filename = "data pustaka1-" . date('Ymd') . ".xls";

// Kodingamn untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pustaka.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Tipe</th>
            <th>Tahun</th>
            <th>Pembimbing 1</th>
            <th>Pembimbing 2</th>
            <th>Ketua Penguji</th>
            <th>Penguji 1</th>
            <th>Penguji 2</th>
            <th>Penguji 3</th>
            <th>Sekretaris</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>

        <?php foreach ($pustaka1 as $row) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['tipe']; ?></td>
            <td><?= $row['tahun']; ?></td>
            <td><?= $row['pembimbing1']; ?></td>
            <td><?= $row['pembimbing2']; ?></td>
            <td><?= $row['ketuapenguji']; ?></td>
            <td><?= $row['penguji1']; ?></td>
            <td><?= $row['penguji2']; ?></td>
            <td><?= $row['penguji3']; ?></td>
            <td><?= $row['sekretaris']; ?></td>
        </tr>
    </tbody>
</table>