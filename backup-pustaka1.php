<?php 
                        $no=1;
                        foreach ($pustaka1 as $row) : ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['tipe']; ?></td>
    <td><?= $row['tahun']; ?></td>
    <td><?= $row['judul']; ?></td>
    <td><?= $row['pembimbing1']; ?></td>
    <td><?= $row['pembimbing2']; ?></td>
    <td><?= $row['ketuapenguji']; ?></td>
    <td><?= $row['penguji1']; ?></td>
    <td><?= $row['penguji2']; ?></td>
    <td><?= $row['penguji3']; ?></td>
    <td><?= $row['sekretaris']; ?></td>
    <td><?= $row['nama_file']; ?></td>
    <td>
        <button class="btn btn-success btn-sm text-white detail" data-id="<?= $row['id']; ?>"
            style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i></button>

        <a href="ubah_pustaka1.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i
                class="bi bi-pencil-square"></i></a>

        <a href="hapus_pustaka1.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;"
            onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['id']; ?> ?');"><i
                class="bi bi-trash-fill"></i></a>
    </td>
</tr>
<?php endforeach; ?>