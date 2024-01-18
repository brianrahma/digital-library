<?php
session_start();
// // Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}
// Memanggil atau membutuhkan file function.php
require 'function_pustaka1.php';

// Mengambil data dari nis dengan fungsi get
$id = $_GET['id'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapus($id) > 0) {
    echo "<script>
                alert('Data pustaka berhasil dihapus!');
                document.location.href = 'pustaka1.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data pustaka gagal dihapus!');
        </script>";
}