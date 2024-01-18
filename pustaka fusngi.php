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
if(isset($_POST['simpan'])){
    // $id = $_POST['id'];
    $judul = $_POST['judul'];
    $nim = $_POST['nim'];
    $pembimbing1 = $_POST['pembimbing1'];
    $pembimbing2 = $_POST['pembimbing2'];
    $ketuapenguji = $_POST['ketuapenguji'];
    $penguji1 = $_POST['penguji1'];
    $penguji2 = $_POST['penguji2'];
    $penguji3 = $_POST['penguji3'];
    $sekretaris = $_POST['sekretaris'];
    $tipe = $_POST['tipe'];
    $tahun = $_POST['tahun'];

    // Tambah File PDF
    $file_pdf = $_FILES['file']['name'];
    $path = 'laporan/'.$file_pdf;

    $sql = mysqli_query($koneksi, "INSERT INTO pustaka1 VALUES ('','$judul','$nim','$pembimbing1','$pembimbing2', '$ketuapenguji', '$penguji1', '$penguji2', '$penguji3', '$sekretaris','$tipe','$tahun', '$path')");

    if($sql){
        move_uploaded_file($_FILES['file']['tmp_name'], $path);
    }
    // cek data masuk
    if (mysqli_affected_rows($koneksi) > 0) echo "<script>alert('Data berhasil masuk!');
    document.location.href = 'pustaka1.php'</script>";
    
    else echo "<script>alert('Data gagal masuk!')</script>";
    
            $judul = "";
            $nama = "";
            $nim = "";
            $kelas = "";
            $prodi = "";
            $jurusan = "";
            $pembimbing1 = "";
            $pembimbing2 = "";
            $tipe = "";
            $tahun = "";
}

// Membuat fungsi hapus
function hapus($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM pustaka1 WHERE id = '$id'");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;
    $id = $data['id'];
    $judul = $data['judul'];
    $nama = htmlspecialchars($data['nama']);
    $nim = $data['nim'];
    $kelas = $data['kelas'];
    $prodi = $data['prodi'];
    $jurusan = $data['jurusan'];
    $pembimbing1 = $data['pembimbing1'];
    $pembimbing2 = $data['pembimbing2'];
    $ketuapenguji = $data['ketuapenguji'];
    $penguji1 = $data['penguji1'];
    $penguji2 = $data['penguji2'];
    $penguji3 = $data['penguji3'];
    $sekretaris = $data['sekretaris'];
    $tipe = $data['tipe'];
    $tahun = $data['tahun'];
    $file_pdf = $_FILES['file']['name'];
    $path = 'file_pdf/'.$file_pdf;


    $sql = "UPDATE pustaka1 SET judul = '$judul', nama = '$nama', nim = '$nim', kelas = '$kelas', prodi = '$prodi', jurusan = '$jurusan', pembimbing1 = '$pembimbing1', pembimbing2 = '$pembimbing2', ketuapenguji = '$ketuapenguji', penguji1 = '$penguji1', penguji2 = '$penguji2', penguji3 = '$penguji3', sekretaris = '$sekretaris', tipe = '$tipe', tahun = '$tahun', file_pdf =  '$path' WHERE id = '$id'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}