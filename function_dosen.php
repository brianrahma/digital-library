<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "n1577229_digilib_kel1", "*t3lk0m#2023", "n1577229_digilib_tk_kel1");

// membuat fungsi query dalam bentuk array
function query($query)
{
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

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nip = htmlspecialchars($data['nip']);
    $nama = htmlspecialchars($data['nama']);
    $tlp = $data['tlp'];
    $homebase = $data['homebase'];
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);


    $sql = "INSERT INTO dosen VALUES ('$nip','$nama', '$homebase', '$tlp', '$email','$alamat')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nip)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM dosen WHERE nip = '$nip'");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nip = $data['nip'];
    $nama = htmlspecialchars($data['nama']);
    $tlp = $data['tlp'];
    $homebase = $data['homebase'];
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);


    $sql = "UPDATE dosen SET nama = '$nama', homebase = '$homebase', tlp = '$tlp',  email = '$email', alamat = '$alamat' WHERE nip = '$nip'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}