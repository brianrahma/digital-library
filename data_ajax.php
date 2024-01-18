<?php

include 'koneksi.php';
//koneksi
$koneksi = mysqli_connect("localhost", "n1577229_digilib_kel1", "*t3lk0m#2023", "n1577229_digilib_tk_kel1");
// $digi = new digilib;
// $koneksi = $digi->koneksi();

if (isset($_POST['p'])) {
    $p = $_POST['p'];
    if ($p == "mahasiswa") {
        $nama = $_POST['nama'];
        $q = mysqli_query($koneksi, "SELECT nim,nama,kelas FROM mahasiswa WHERE nama LIKE '%$nama%'");
        while ($d = mysqli_fetch_row($q)) {
            // $data[] = array('nim' => $d[0], 'nama' => $d[1], 'kelas' => $d[2]);
            $label = '[' . $d[2] . '] ' . $d[0] . ' ' . $d[1];
            $value = $d[0] . ' ' . $d[1];
            $data[] = array('label' => $label, 'value' => $value);
        }
        echo json_encode($data);
    }

    elseif($p == "pustaka") {
        $judul = $_POST ['judul'];
        $tahun = $_POST ['tahun'];  
        $tipe = $_POST ['tipe'];   
        $pembimbing1 = $_POST ['pembimbing1'];
        $pembimbing2 = $_POST ['pembimbing2'];
        $ketuapenguji = $_POST ['ketuapenguji'];
        $penguji1 = $_POST ['penguji1'];
        $penguji2 = $_POST ['penguji2'];
        $penguji3 = $_POST ['penguji3'];
        $sekretaris = $_POST ['sekretaris'];
        $mhs = $_POST ['mhs'];

        if($tipe == 'Magang') $ketuapenguji = "";

        //upload file 
        $target_dir = "laporan/";
        $nama_file = basename($_FILES["laporan"]["name"]);
        $target_file = $target_dir . $nama_file;
        move_uploaded_file($_FILES["laporan"]["tmp_name"], $target_file);

        mysqli_query($koneksi, "INSERT INTO pustaka1 (judul,tahun,tipe,pembimbing1,pembimbing2,ketuapenguji,penguji1,penguji2,penguji3,sekretaris,nama_file) VALUES (\"$judul\",'$tahun','$tipe','$pembimbing1','$pembimbing2','$ketuapenguji','$penguji1','$penguji2','$penguji3','$sekretaris',\"$nama_file\")");
        $last_id = mysqli_insert_id($koneksi);

        for($i = 0; $i < count($mhs); $i++){
            
            $e = explode(' ',$mhs[$i]);
            mysqli_query($koneksi, "INSERT INTO pustaka2 (id_judul,nim) VALUES ('$last_id','$e[0]')");
        }

    }
}
?>