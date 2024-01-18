-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2021 pada 13.17
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tmpt_Lahir` varchar(50) NOT NULL,
  `tgl_Lahir` date NOT NULL,
  `jekel` enum('Laki - Laki','Perempuan') NOT NULL,
  `jurusan` enum('Teknik Jaringan Akses','Teknik Komputer dan Jaringan','Multimedia','Rekayasa Perangkat Lunak') NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `tmpt_Lahir`, `tgl_Lahir`, `jekel`, `jurusan`, `email`, `gambar`, `alamat`) VALUES
('210301', 'Tobiah Mc Mechan', 'Mangaldan', '2001-06-03', 'Perempuan', 'Teknik Komputer dan Jaringan', 'tmcmechan0@tamu.edu', '60433ff651b20.png', '14 Sloan Park'),
('210302', 'Gav Colly', 'Kamieniec Podolski', '2003-01-23', 'Laki - Laki', 'Rekayasa Perangkat Lunak', 'gcolly1@simplemachines.org', '604340becfb49.png', '8 Brentwood Hill'),
('210303', 'Editha Jiggens', 'Uyugan', '2000-04-22', 'Laki - Laki', 'Multimedia', 'ejiggens2@bloglines.com', '604342d27f34b.png', '2 Heffernan Street'),
('210304', 'Celle Probert', 'Houston', '2003-07-05', 'Perempuan', 'Teknik Jaringan Akses', 'cprobert3@techcrunch.com', '604343274043b.png', '19387 Lake View Park'),
('210305', 'Othella Pitts', 'Zhouzhuang', '2005-06-15', 'Perempuan', 'Multimedia', 'opitts4@etsy.com', '6043437e9dd54.png', '74105 Ryan Road'),
('210306', 'Peta Layson', 'Oebai', '2002-06-02', 'Perempuan', 'Rekayasa Perangkat Lunak', 'playson5@gnu.org', '604343d4a6b79.png', '11 Hayes Terrace'),
('210307', 'Sonny Adolfson', 'Lisui', '2001-02-08', 'Perempuan', 'Teknik Komputer dan Jaringan', 'sadolfson6@ed.gov', '6043441cd4d96.png', '5345 Oak Valley Center'),
('210308', 'Dalt Polendine', 'Muang Sam Sip', '2003-02-08', 'Laki - Laki', 'Teknik Komputer dan Jaringan', 'dpolendine7@weebly.com', '60434474053e7.png', '8332 Nelson Alley'),
('210309', 'Marlee Ertelt', 'Kapunduk', '2005-12-06', 'Laki - Laki', 'Multimedia', 'mertelt8@webnode.com', '604344cee38d6.png', '0330 Shasta Alley'),
('210310', 'Haroun Mathiasen', 'Tambakbaya', '2000-01-21', 'Perempuan', 'Teknik Jaringan Akses', 'hmathiasen9@tuttocitta.it', '6043451f48ae3.png', '652 Heath Place'),
('210311', 'Sylvan Mizzi', 'Kayes', '2000-10-14', 'Perempuan', 'Rekayasa Perangkat Lunak', 'smizzia@joomla.org', '6043456c9fc89.png', '87142 Scofield Drive'),
('210312', 'Mirna Duffill', 'Patao', '2000-07-15', 'Perempuan', 'Teknik Komputer dan Jaringan', 'mduffill@pbs.org', '604345bd3abd1.png', '812 Hallows Parkway'),
('210313', 'Sherlock Frackiewicz', 'Moate', '2004-01-31', 'Laki - Laki', 'Multimedia', 'sfrackiewiczc@uiuc.edu', '604346173ee94.png', '37998 Pankratz Alley'),
('210314', 'Yolande Arne', 'Mpraeso', '2003-04-06', 'Perempuan', 'Teknik Jaringan Akses', 'yarned@youku.com', '6043464ca2b46.png', '2 Union Circle'),
('210315', 'Catrina De Brett', 'Tasil', '2004-09-03', 'Laki - Laki', 'Teknik Jaringan Akses', 'cdebrette@xrea.com', '6043469155dc3.png', '8 Texas Court');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
