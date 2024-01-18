<?php
// Memanggil atau membutuhkan file function.php
require 'function_pustaka1.php';

// Jika dataSiswa diklik maka
if (isset($_POST['dataPustaka1'])) {
    $output = '';

    // mengambil data siswa dari nis yang berasal dari dataSiswa
    $sql = "SELECT * FROM pustaka1 WHERE id = '" . $_POST['dataPustaka1'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <th width="40%">ID</th>
                            <td width="60%">' . $row['id'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Judul</th>
                            <td width="60%">' . $row['judul'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">NIM</th>
                            <td width="60%">' . $row['nim'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Kelas</th>
                            <td width="60%">' . $row['kelas'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Prodi</th>
                            <td width="60%">' . $row['prodi'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jurusan</th>
                            <td width="60%">' . $row['jurusan'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Pembimbing 1</th>
                            <td width="60%">' . $row['pembimbing1'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Pembimbing 2</th>
                            <td width="60%">' . $row['pembimbing2'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tipe</th>
                            <td width="60%">' . $row['tipe'] . '</td>
                        </tr>
                        
                        <tr>
                            <th width="40%">Tahun</th>
                            <td width="60%">' . $row['tahun'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}