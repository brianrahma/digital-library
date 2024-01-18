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

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = $data['kelas'];
    $tlp = $data['tlp'];
    $jurusan = $data['jurusan'];
    $prodi = $data['prodi'];
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);


    $sql = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$kelas','$tlp','$alamat','$email','$jurusan','$prodi')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nim)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim'");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nim = $data['nim'];
    $nama = htmlspecialchars($data['nama']);
    $kelas = $data['kelas'];
    $tlp = $data['tlp'];
    $jurusan = $data['jurusan'];
    $prodi = $data['prodi'];
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);


    $sql = "UPDATE mahasiswa SET nama = '$nama', kelas = '$kelas', tlp = '$tlp', jurusan = '$jurusan', prodi = '$prodi', email = '$email', alamat = '$alamat' WHERE nim = '$nim'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}