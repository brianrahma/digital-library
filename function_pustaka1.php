<?php

class digilib {
    // membuat fungsi query dalam bentuk array
    function query($query) {
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
    }
    
    public function koneksi() {
        //variable
        $host="localhost";
        $user="n1577229_digilib_kel1";
        $pass="*t3lk0m#2023";
        $db="n1577229_digilib_tk_kel1";

        //koneksi
        $koneksi = mysqli_connect($host,$user,$pass,$db);
        if (!$koneksi) return mysqli_connect_error();
        else return $koneksi;
    }

    public function nim_to_nama($nim) {
        $q = mysqli_query($this->koneksi(), "SELECT nama FROM mahasiswa WHERE nim='$nim'");
        $d = mysqli_fetch_row($q);
        return $d[0];
    }

    public function nip_to_nama($nip) {
        $q = mysqli_query($this->koneksi(), "SELECT nama FROM dosen WHERE nip='$nip'");
        $d = mysqli_fetch_row($q);
        if (!empty($d[0])) {
            $nama = strtoupper($d[0]); 
            // $nama = strtolower($d[0]); 
            // $nama_lengkap = ucwords($nama);
            // return $nama_lengkap;
            return $nama;
        }
    }
}

?>