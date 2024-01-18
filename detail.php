<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika dataSiswa diklik maka
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // mengambil data siswa dari nis yang berasal dari dataSiswa
    $sql = "SELECT * FROM mahasiswa WHERE nim = '" . $_POST['dataSiswa'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <th width="40%">NIM</th>
                            <td width="60%">' . $row['nim'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Kelas</th>
                            <td width="60%">' . $row['kelas'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Email</th>
                            <td width="60%">' . $row['email'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Telepon</th>
                            <td width="60%">' . $row['tlp'] . '</td>
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
                            <th width="40%">Alamat</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}