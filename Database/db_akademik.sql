-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 09:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(150) NOT NULL,
  `maksimal_mahasiswa` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`, `maksimal_mahasiswa`) VALUES
(3, 'Ninik Lintang', '30'),
(4, 'Laily Isna', '20'),
(6, 'Herawati Budiasuti', '30'),
(7, 'Bambang Setiamulyadi', '25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_krs`
--

CREATE TABLE `tb_krs` (
  `id_mahasiswa_isi_data_krs` int(11) NOT NULL,
  `unik_id_mata_kuliah_krs` int(11) NOT NULL,
  `nama_matkul_krs` int(11) NOT NULL,
  `SKS_krs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login_mahasiswa`
--

CREATE TABLE `tb_login_mahasiswa` (
  `id_mahasiswa_login` int(11) NOT NULL,
  `Username` varchar(9) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `rules` varchar(10) NOT NULL DEFAULT 'mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login_mahasiswa`
--

INSERT INTO `tb_login_mahasiswa` (`id_mahasiswa_login`, `Username`, `Password`, `rules`) VALUES
(1, '201424001', 'Hai124', 'mahasiswa'),
(2, '201424002', 'Jai128', 'mahasiswa'),
(3, '201424003', 'Cai134', 'mahasiswa'),
(4, '201424004', 'Kai121', 'mahasiswa'),
(5, '201424005', 'Lai194', 'mahasiswa'),
(6, '201424006', 'Xai120', 'mahasiswa'),
(7, '201424007', 'Jap150', 'mahasiswa'),
(8, '201424008', 'Jar164', 'mahasiswa'),
(9, '201424009', 'Kat124', 'mahasiswa'),
(10, '201424010', 'Qir115', 'mahasiswa'),
(13, 'ramdan', 'Ramdan123', 'admin'),
(14, '201424011', 'Deu574', 'mahasiswa'),
(15, '201424012', 'Bdg785', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa_isi_data` int(11) NOT NULL,
  `NIM` char(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `agama` text NOT NULL,
  `semester` varchar(2) NOT NULL,
  `no_kontak_referensi` varchar(15) NOT NULL,
  `hubungan_dengan_kontak` varchar(50) NOT NULL,
  `nama_kontak` varchar(150) NOT NULL,
  `krs` text DEFAULT NULL,
  `status_kirim` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa_isi_data`, `NIM`, `nama`, `jenis_kelamin`, `no_telpon`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `golongan_darah`, `agama`, `semester`, `no_kontak_referensi`, `hubungan_dengan_kontak`, `nama_kontak`, `krs`, `status_kirim`) VALUES
(1, '201424001', 'Yayat Suryana J', 'Perempuan', '08945268774', 'Garut', '2024-10-09', 'Islam', 'B', 'Islam', '5', '02147885', 'Bapak', 'Sudrajat', '[\"1\",\"3\",\"7\",\"5\",\"1\",\"1\"]', 1),
(2, '201424002', 'Azizah Rizkia', 'Perempuan', '08154996271', 'Cimahi', '2001-10-28', 'Jl. Cina', 'O', 'Kristen', '3', '0815471620', 'Ibu', 'Ria Ricis', '[\"2\"]', 1),
(3, '201424003', 'Rafil Adnan Zibara', 'Pria', '0848165263', 'Kabupaten Bandung', '2002-07-20', 'Jl. Bojong Soang', 'B', 'Islam', '7', '08459763201', 'Ayah', 'Asep', '[\"5\",\"2\",\"9\"]', 1),
(4, '201424004', 'Windah', 'Perempuan', '0841574932', 'Bandung', '2001-05-05', 'Jl. Bandung', 'A', 'Islam', '3', '08171626015', 'Ibu', 'Aurel', '[\"5\"]', 1),
(5, '201424005', 'Mikael Hartono', 'Pria', '08584816985', 'Cimahi', '2002-05-14', 'Jl. Rusiak', 'AB', 'Kristen', '5', '0827196230', 'Kakak', 'Christine', '[\"1\"]', 1),
(6, '201424006', 'I Made', 'Pria', '08147299257', 'Bandung', '2002-09-20', 'Jl. Rusak Banget', 'A', 'Budha', '3', '08185741586', 'Ibu', 'Putu Rahayu', NULL, 0),
(15, '201424007', 'Azma Nuzula', 'Perempuan', '054874', 'Bandung', '2024-10-02', 'Jl. Pahlawan', 'A', 'Islam', '4', '08148252747', 'Teman', 'Mariam', NULL, 0),
(22, '201424009', 'Tiara Anjani Suhartono Putri', 'Perempuan', '081572517949', 'Bandung', '2002-05-05', 'Jl. Dungus Cariang No. 82/79', 'B', 'Islam', '8', '0817462658455', 'Pacar', 'Jungkook', NULL, 0),
(23, '201424010', 'Mariam', 'Perempuan', '08117641454', 'Bandung', '2002-04-05', 'Jl. Gending Jati No.4', 'O', 'Islam', '8', '0817462658455', 'Teman', 'Mingyu', NULL, 0),
(24, '201424011', 'Putri', 'Perempuan', '081572517949', 'Bandung', '2001-05-05', 'dfef', 'B', 'Islam', '8', '0817462658455', 'Teman', 'Sujiman', NULL, 0),
(25, 'ramdan', 'ramdan', '', '', '', '0000-00-00', '', '', '', '', '', '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mata_kuliah`
--

CREATE TABLE `tb_mata_kuliah` (
  `id_mata_kuliah` int(11) NOT NULL,
  `unik_id_mata_kuliah` varchar(7) NOT NULL,
  `mata_kuliah` varchar(50) NOT NULL,
  `SKS` varchar(2) NOT NULL,
  `id_dosen_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mata_kuliah`
--

INSERT INTO `tb_mata_kuliah` (`id_mata_kuliah`, `unik_id_mata_kuliah`, `mata_kuliah`, `SKS`, `id_dosen_matkul`) VALUES
(1, 'HMJ2001', 'Operasi Teknik Kimia', '3', 3),
(2, 'HMJ2201', 'Pengolahan Limbah', '3', 4),
(3, 'HMJ2211', 'Bahan Korosi', '2', 3),
(4, 'HMJ2221', 'Manajemen Lingkungan', '3', 4),
(5, 'HMJ2222', 'Tugas Akhir', '4', 6),
(6, 'HMJ2210', 'Proses Teknik Kimia', '2', 6),
(7, 'HMJ2101', 'Audit Energi', '2', 7),
(8, 'HMJ2514', 'Praktikum Pilot Plant', '4', 3),
(9, 'HMJ2415', 'Gambar Sistem Proses', '2', 6),
(10, 'HMJ9841', 'Bioteknologi', '2', 7),
(11, 'HMJ6471', 'Bioproses', '2', 6),
(12, 'HMJ1254', 'Laboratorium Teknologi', '3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_relasi`
--

CREATE TABLE `tb_relasi` (
  `id` int(11) NOT NULL,
  `id_mahasiswa_isi_data` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mata_kuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD UNIQUE KEY `SKS` (`id_mahasiswa_isi_data_krs`);

--
-- Indexes for table `tb_login_mahasiswa`
--
ALTER TABLE `tb_login_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa_login`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa_isi_data`);

--
-- Indexes for table `tb_mata_kuliah`
--
ALTER TABLE `tb_mata_kuliah`
  ADD PRIMARY KEY (`id_mata_kuliah`);

--
-- Indexes for table `tb_relasi`
--
ALTER TABLE `tb_relasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_login_mahasiswa`
--
ALTER TABLE `tb_login_mahasiswa`
  MODIFY `id_mahasiswa_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa_isi_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_mata_kuliah`
--
ALTER TABLE `tb_mata_kuliah`
  MODIFY `id_mata_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_relasi`
--
ALTER TABLE `tb_relasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
