-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 10:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uici`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `isiberita` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul`, `gambar`, `isiberita`, `tanggal`) VALUES
(14, 'Pantai Yang Indah', '27-alam.png', 'Pantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang IndahPantai Yang Indah', '2022-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id_event` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `isievent` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id_event`, `judul`, `gambar`, `isievent`, `status`, `tanggal`) VALUES
(2, 'Manado Fest', '', 'Manado cekk!!!', 'Soon', '2022-12-30'),
(4, 'Dilan kwew', '', 'haiii semua jangan lupa join live yahaiii semua jangan lupa join live ya', 'haiii semua jangan lupa join live ya', '2022-12-21'),
(5, 'Coming Soon', 'Bansos.png', 'Coming SoonComing SoonComing Soon', 'Coming Soon', '2022-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `sumber` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `gambar`, `judul`, `sumber`, `tempat`) VALUES
(28, '718-alam.png', 'Laut Gorontalo', 'Instagram', 'Pantai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kabupaten` varchar(128) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `kodepos` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `visi` varchar(256) NOT NULL,
  `misi` varchar(300) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_profil`
--

INSERT INTO `tbl_profil` (`id`, `nama`, `kabupaten`, `provinsi`, `alamat`, `telepon`, `kodepos`, `email`, `visi`, `misi`, `gambar`) VALUES
(1, 'Mandalika Network Group', 'Kota Manado', 'Sulawesi Utara, Indonesia', 'Jl. Yusuf Hasiru, 143 Linkungan 2 Kleak', '081242998806', '95115', 'contact@fanlimandalika.com', 'â€œTerwujudnya masyarakat Gorontalo yang unggul, maju dan sejahteraâ€.', '1. Mewujudkan pengelolaan pariwisata dan sumber daya alam yang berwawasan lingkungan dan berkelanjutan,\r\n2. Menjamin ketersediaan infrastruktur daerah,\r\n3. Meningkatkan kesejahteraan masyarakat yang lebih merata dan adil,\r\n4. Meningkatkan kualitas sumber daya manusia.', '17-bgLogin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proker`
--

CREATE TABLE `tbl_proker` (
  `id_proker` int(11) NOT NULL,
  `namakeg` varchar(255) NOT NULL,
  `tujuankeg` varchar(255) NOT NULL,
  `sasarankeg` varchar(255) NOT NULL,
  `danakeg` varchar(255) NOT NULL,
  `waktukeg` datetime(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' ON UPDATE current_timestamp(6),
  `tempatkeg` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_proker`
--

INSERT INTO `tbl_proker` (`id_proker`, `namakeg`, `tujuankeg`, `sasarankeg`, `danakeg`, `waktukeg`, `tempatkeg`) VALUES
(26, 'Mandalika Network Group', 'mendorong SDM cakap digital', 'Masyarakat 21-45 Tahun Pengguna Internet', 'Dana Investor', '2022-12-22 00:00:00.000000', 'Indonesia'),
(34, 'Yayasan Indonesia Care Org', 'Social Movement', 'Masyarakat Terdampak Bendana', 'Swadaya', '2022-12-31 00:00:00.000000', 'Indonesia'),
(37, 'IT Development', 'Pemanrapan lulusan digital', 'Mahasiswa uici', 'Dana Hibah', '2028-12-22 00:00:00.000000', 'universitas insan cita indonesia'),
(38, 'Indonesian Startup', 'Pebisnis', 'Mendukung Indonesia memiliki 10 Juta pengusaha muda sukses', 'Hybrid', '2022-12-23 00:00:00.000000', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `password2` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `password2`, `nama`, `gambar`, `level`) VALUES
(20, 'admin', '$2y$10$lA2iBNf00ZwrIgz6e47BQ.zw/iJ6zDjhfuWMBhgLtxAEswDDIYP6W', '12345', 'Fanli', 'default.png', 'superadmin'),
(25, 'direktur', '$2y$10$nFZRhdDShWLxdS.2LPllC.8pVmIiA8yCMjxI5Qwo0hIjnNHMw6nCq', 'admin123', 'Direktur Japesda', '3x4.jpg_63b57eb6cc38a.jpg', 'direktur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_proker`
--
ALTER TABLE `tbl_proker`
  ADD PRIMARY KEY (`id_proker`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_proker`
--
ALTER TABLE `tbl_proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
