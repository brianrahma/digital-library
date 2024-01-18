<?php
// Memanggil atau membutuhkan file function.php
require 'function_dosen.php';

// Jika dataSiswa diklik maka
if (isset($_POST['dataDosen'])) {
    $output = '';

    // mengambil data dosen dari nip yang berasal dari dataDosen
    $sql = "SELECT * FROM dosen WHERE nip = '" . $_POST['dataDosen'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <th width="40%">NIP</th>
                            <td width="60%">' . $row['nip'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
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
                            <th width="40%">Homebase</th>
                            <td width="60%">' . $row['homebase'] . '</td>
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