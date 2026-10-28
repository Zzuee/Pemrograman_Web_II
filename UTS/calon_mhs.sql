-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3309
-- Generation Time: 28 Okt 2026 pada 13.37
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lat_dbase`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_mhs`
--

CREATE TABLE `calon_mhs` (
  `id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `pekerjaan_ortu` varchar(50) NOT NULL,
  `tempat_tes` varchar(50) NOT NULL,
  `mat` float NOT NULL,
  `bing` float NOT NULL,
  `umum` float NOT NULL,
  `rata` float NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calon_mhs`
--

INSERT INTO `calon_mhs` (`id`, `tgl_input`, `kode`, `nama`, `jk`, `tempat_lahir`, `tgl_lahir`, `asal_sekolah`, `pekerjaan_ortu`, `tempat_tes`, `mat`, `bing`, `umum`, `rata`, `keterangan`) VALUES
(1, '2026-10-23', 'A3', 'aju', 'Laki-Laki', 'tangerang', '2026-10-23', 'tangsel', 'usaha', 'Gedung A', 100, 100, 100, 100, 'Lulus'),
(2, '2026-10-23', 'A3', 'aju', 'Laki-Laki', 'tangerang', '2026-10-23', 'tangsel', 'usaha', 'Gedung A', 100, 100, 100, 100, 'Lulus'),
(3, '2026-08-13', '4A', 'saasaaa', 'Perempuan', 'tangerang', '2026-08-18', 'tangsel', 'usaha', 'Tidak Diketahui', 100, 100, 100, 100, 'Lulus'),
(4, '2026-09-22', '2M', 'riniii', 'Perempuan', 'tangerang', '2026-10-16', 'pamulang', 'usaha', 'Tidak Diketahui', 100, 100, 100, 100, 'Lulus'),
(5, '2026-12-17', '7H', 'bazuri', 'Laki-Laki', 'tangerang', '2026-10-17', 'tangsel', 'usaha', 'Tidak Diketahui', 100, 100, 100, 100, 'Lulus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_mhs`
--
ALTER TABLE `calon_mhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_mhs`
--
ALTER TABLE `calon_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
