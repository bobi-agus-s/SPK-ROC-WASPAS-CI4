-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 02:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_bansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(5) UNSIGNED NOT NULL,
  `nama_agama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES
(4, 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(5) UNSIGNED NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_penduduk` int(5) UNSIGNED NOT NULL,
  `status_penilaian` int(11) NOT NULL DEFAULT 0,
  `status_pengajuan` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_periode`, `id_penduduk`, `status_penilaian`, `status_pengajuan`) VALUES
(2, 1, 2, 1, 1),
(3, 1, 3, 1, 1),
(4, 1, 4, 1, 1),
(5, 1, 5, 1, 1),
(6, 1, 6, 1, 1),
(7, 1, 7, 1, 1),
(8, 1, 8, 1, 1),
(9, 1, 9, 1, 1),
(10, 1, 10, 1, 1),
(11, 1, 11, 1, 1),
(12, 1, 12, 1, 1),
(13, 1, 13, 1, 1),
(14, 1, 14, 1, 1),
(15, 1, 15, 1, 1),
(16, 1, 16, 1, 1),
(17, 1, 17, 1, 1),
(18, 1, 18, 1, 1),
(19, 1, 19, 1, 1),
(20, 1, 20, 1, 1),
(21, 1, 21, 1, 1),
(22, 1, 22, 1, 1),
(23, 1, 23, 1, 1),
(24, 1, 24, 1, 1),
(25, 1, 25, 1, 1),
(26, 1, 26, 1, 1),
(27, 1, 27, 1, 1),
(28, 1, 28, 1, 1),
(29, 1, 29, 1, 1),
(30, 1, 30, 1, 1),
(31, 1, 31, 1, 1),
(32, 1, 32, 1, 1),
(33, 1, 33, 1, 1),
(34, 1, 34, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(5) UNSIGNED NOT NULL,
  `nama_dusun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `nama_dusun`) VALUES
(1, 'Banjarejo'),
(3, 'Mekarsari'),
(4, 'Krajan'),
(5, 'Mulyosari'),
(6, 'Margodadi'),
(7, 'Mekarindah'),
(8, 'Wadah');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(5) UNSIGNED NOT NULL,
  `id_alternatif` int(5) UNSIGNED NOT NULL,
  `hasil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `hasil`) VALUES
(1, 2, '0.55198208341568'),
(2, 3, '0.77638282209967'),
(3, 4, '0.75773394264429'),
(4, 5, '0.55198208341568'),
(5, 6, '0.76666598834232'),
(6, 7, '0.55622807546236'),
(7, 8, '0.62665977567733'),
(8, 9, '0.86674446641468'),
(9, 10, '0.8513467611424'),
(10, 11, '0.76666598834232'),
(11, 12, '0.6505072832537'),
(12, 13, '0.57547216989008'),
(13, 14, '0.65431068005979'),
(14, 15, '0.57547216989008'),
(15, 16, '0.57547216989008'),
(16, 17, '0.55198208341568'),
(17, 18, '0.87225249066179'),
(18, 19, '0.77106474834453'),
(19, 20, '0.76172324529231'),
(20, 21, '0.8513467611424'),
(21, 22, '0.7362085632664'),
(22, 23, '0.71841735601148'),
(23, 24, '0.62922995782301'),
(24, 25, '0.65431068005979'),
(25, 26, '0.65431068005979'),
(26, 27, '0.65431068005979'),
(27, 28, '0.55622807546236'),
(28, 29, '0.63373944385232'),
(29, 30, '0.57978115271272'),
(30, 31, '0.76666598834232'),
(31, 32, '0.57978115271272'),
(32, 33, '0.76666598834232'),
(33, 34, '0.658893266156');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) UNSIGNED NOT NULL,
  `id_periode` int(11) NOT NULL,
  `kode_kriteria` varchar(255) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `jenis_kriteria` enum('benefit','cost') NOT NULL DEFAULT 'benefit',
  `prioritas` int(5) NOT NULL DEFAULT 0,
  `bobot` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_periode`, `kode_kriteria`, `nama_kriteria`, `jenis_kriteria`, `prioritas`, `bobot`) VALUES
(1, 1, 'C1', 'Penghasilan per bulan', 'cost', 1, '0.339732143'),
(2, 1, 'C2', 'Lansia tunggal', 'benefit', 2, '0.214732143'),
(3, 1, 'C3', 'Anggota keluarga sakit kronis', 'benefit', 3, '0.152232143'),
(4, 1, 'C4', 'Anggota keluarga menderita difabel', 'benefit', 4, '0.110565476'),
(5, 1, 'C5', 'Jumlah ART yang bekerja', 'cost', 5, '0.079315476'),
(6, 1, 'C6', 'Pendidikan', 'cost', 6, '0.054315476'),
(7, 1, 'C7', 'Sumber penerangan', 'benefit', 7, '0.033482143'),
(8, 1, 'C8', 'Sumber air minum', 'benefit', 8, '0.015625');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(85, '2023-05-05-013201', 'App\\Database\\Migrations\\Kriteria', 'default', 'App', 1687661022, 1),
(86, '2023-05-06-020032', 'App\\Database\\Migrations\\SubKriteria', 'default', 'App', 1687661022, 1),
(87, '2023-06-21-040019', 'App\\Database\\Migrations\\Alternatif', 'default', 'App', 1687661022, 1),
(88, '2023-06-21-044713', 'App\\Database\\Migrations\\Penilaian', 'default', 'App', 1687661022, 1),
(89, '2023-06-22-032630', 'App\\Database\\Migrations\\Hasil', 'default', 'App', 1687661022, 1),
(90, '2023-06-23-020855', 'App\\Database\\Migrations\\Penduduk', 'default', 'App', 1687661022, 1),
(91, '2023-06-23-021951', 'App\\Database\\Migrations\\Dusun', 'default', 'App', 1687661022, 1),
(92, '2023-06-23-021955', 'App\\Database\\Migrations\\Agama', 'default', 'App', 1687661022, 1),
(93, '2023-06-25-023830', 'App\\Database\\Migrations\\User', 'default', 'App', 1687661022, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(5) UNSIGNED NOT NULL,
  `id_agama` int(5) UNSIGNED NOT NULL,
  `id_dusun` int(5) UNSIGNED NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_penduduk` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `id_agama`, `id_dusun`, `no_kk`, `nik`, `nama_penduduk`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `rt`, `rw`) VALUES
(2, 4, 1, '3501120706120006', '3501121012820001', 'MARYONO', 'L', 'Pacitan', '1982-12-10', '01', '01'),
(3, 4, 1, '3501121007120000', '3501125001530002', 'SOINEM', 'P', 'Pacitan', '1953-01-10', '02', '01'),
(4, 4, 1, '3501122612071310', '3501123007650005', 'KATIJAN', 'L', 'Pacitan', '1965-07-30', '03', '01'),
(5, 4, 1, '3501122612071110', '3501122408680004', 'PAIMUN AGUS TRIONO', 'L', 'Pacitan', '1968-08-24', '01', '02'),
(6, 4, 1, '3501122612071210', '3501120305540002', 'TUKIMUN', 'L', 'Pacitan', '1954-05-03', '02', '02'),
(7, 4, 4, '3501120803120000', '3501120504890002', 'RIAS WAHYONO', 'L', 'Pacitan', '1989-04-05', '01', '01'),
(8, 4, 4, '3501122702190000', '3501120808990004', 'MUSTAKIM', 'L', 'Pacitan', '1999-08-08', '02', '01'),
(9, 4, 4, '3501120805170000', '3501127006680007', 'TUKIRAH', 'P', 'Pacitan', '1968-06-30', '03', '01'),
(10, 4, 4, '3501122304090040', '3501121605530001', 'SUPARDI', 'L', 'Pacitan', '1953-06-16', '01', '02'),
(11, 4, 4, '3501121002100190', '3501121002680003', 'SARWAN', 'L', 'Pacitan', '1968-02-10', '02', '02'),
(12, 4, 7, '3501122512070760', '3501120507540002', 'KIJO', 'L', 'Pacitan', '1954-07-05', '01', '01'),
(13, 4, 7, '3501122205170000', '3501120508890002', 'PARJIANTO', 'L', 'Pacitan', '1989-08-05', '01', '01'),
(14, 4, 7, '3501122512070770', '3501124807640002', 'WOYEM', 'P', 'Pacitan', '1964-07-08', '01', '02'),
(15, 4, 7, '3501122512070670', '3501120606800004', 'TUKILAN', 'L', 'Pacitan', '1980-06-06', '02', '02'),
(16, 4, 8, '0', '3501124203760001', 'RENI SUSANTI', 'P', 'pacitan', '0001-01-01', '01', '01'),
(17, 4, 8, '0', '3501122808880004', 'LISTIONO', 'L', 'Pacitan', '0001-01-01', '01', '02'),
(18, 4, 8, '0', '3501121508460001', 'KARUH', 'L', 'Pacitan', '0001-01-01', '02', '02'),
(19, 4, 8, '0', '3501121410480001', 'TOIMAN', 'L', 'Pacitan', '0001-01-01', '02', '01'),
(20, 4, 3, '3501122701055690', '3501126512650001', 'SUKATMI', 'P', 'Pacitan', '1965-12-25', '01', '01'),
(21, 4, 3, '3501122612071490', '3501122510400001', 'PAIJO', 'L', 'Pacitan', '1940-10-25', '02', '01'),
(22, 4, 3, '3501122701055650', '3501122708590001', 'TUKIMIN', 'L', 'Pacitan', '1959-08-27', '01', '02'),
(23, 4, 3, '3501122612071690', '3501127006550028', 'TOIJEM', 'P', 'Pacitan', '1955-06-30', '02', '02'),
(24, 4, 5, '3501122504090010', '3501121211710001', 'SUTOYO', 'L', 'Pacitan', '1971-11-12', '01', '01'),
(25, 4, 5, '3501122612070290', '3501120701600004', 'KATUBI', 'P', 'Pacitan', '1960-01-07', '02', '01'),
(26, 4, 5, '3501122612070520', '3501121111430001', 'PAERAN', 'L', 'Pacitan', '1943-11-11', '03', '01'),
(27, 4, 5, '3501122612070910', '3501120711610001', 'PONIJO', 'L', 'Pacitan', '1961-11-07', '01', '02'),
(28, 4, 5, '3501121003200000', '3501121009900005', 'SUYONO', 'L', 'Pacitan', '1991-12-10', '02', '02'),
(29, 4, 5, '3501122612070420', '3501120711600004', 'KATNI', 'P', 'Pacitan', '1960-11-07', '03', '02'),
(30, 4, 6, '3501122512071710', '3501124906810005', 'PARYATIN', 'P', 'Pacitan', '1981-06-09', '01', '01'),
(31, 4, 6, '3501122512072020', '3501125303620003', 'MISKIJEM', 'P', 'Pacitan', '1962-03-13', '02', '01'),
(32, 4, 6, '3501122107080050', '3501120605720005', 'MISKIJO', 'L', 'Pacitan', '1972-05-06', '01', '02'),
(33, 4, 6, '3501122512072270', '3501124507380003', 'PAINAH', 'P', 'Pacitan', '1938-07-05', '02', '02'),
(34, 4, 6, '3501122512071630', '3501126007450002', 'SOIYAH', 'P', 'Pacitan', '1945-07-20', '03', '02');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(5) UNSIGNED NOT NULL,
  `id_alternatif` int(5) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `id_subkriteria` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_penduduk`, `id_kriteria`, `id_subkriteria`, `id_periode`) VALUES
(9, 34, 34, 1, 1, 1),
(10, 34, 34, 2, 5, 1),
(11, 34, 34, 3, 7, 1),
(12, 34, 34, 4, 21, 1),
(13, 34, 34, 5, 10, 1),
(14, 34, 34, 6, 12, 1),
(15, 34, 34, 7, 15, 1),
(16, 34, 34, 8, 20, 1),
(17, 33, 33, 1, 1, 1),
(18, 33, 33, 2, 5, 1),
(19, 33, 33, 3, 8, 1),
(20, 33, 33, 4, 21, 1),
(21, 33, 33, 5, 10, 1),
(22, 33, 33, 6, 12, 1),
(23, 33, 33, 7, 15, 1),
(24, 33, 33, 8, 20, 1),
(25, 32, 32, 1, 1, 1),
(26, 32, 32, 2, 4, 1),
(27, 32, 32, 3, 7, 1),
(28, 32, 32, 4, 21, 1),
(29, 32, 32, 5, 10, 1),
(30, 32, 32, 6, 12, 1),
(31, 32, 32, 7, 15, 1),
(32, 32, 32, 8, 20, 1),
(33, 31, 31, 1, 1, 1),
(34, 31, 31, 2, 5, 1),
(35, 31, 31, 3, 8, 1),
(36, 31, 31, 4, 21, 1),
(37, 31, 31, 5, 10, 1),
(38, 31, 31, 6, 12, 1),
(39, 31, 31, 7, 15, 1),
(40, 31, 31, 8, 20, 1),
(41, 30, 30, 1, 1, 1),
(42, 30, 30, 2, 4, 1),
(43, 30, 30, 3, 7, 1),
(44, 30, 30, 4, 21, 1),
(45, 30, 30, 5, 10, 1),
(46, 30, 30, 6, 12, 1),
(47, 30, 30, 7, 15, 1),
(48, 30, 30, 8, 20, 1),
(49, 29, 29, 1, 1, 1),
(50, 29, 29, 2, 5, 1),
(51, 29, 29, 3, 7, 1),
(52, 29, 29, 4, 21, 1),
(53, 29, 29, 5, 10, 1),
(54, 29, 29, 6, 13, 1),
(55, 29, 29, 7, 15, 1),
(56, 29, 29, 8, 20, 1),
(57, 28, 28, 1, 1, 1),
(58, 28, 28, 2, 4, 1),
(59, 28, 28, 3, 7, 1),
(60, 28, 28, 4, 21, 1),
(61, 28, 28, 5, 10, 1),
(62, 28, 28, 6, 13, 1),
(63, 28, 28, 7, 15, 1),
(64, 28, 28, 8, 20, 1),
(65, 27, 27, 1, 1, 1),
(66, 27, 27, 2, 5, 1),
(67, 27, 27, 3, 7, 1),
(68, 27, 27, 4, 21, 1),
(69, 27, 27, 5, 10, 1),
(70, 27, 27, 6, 12, 1),
(71, 27, 27, 7, 15, 1),
(72, 27, 27, 8, 19, 1),
(73, 26, 26, 1, 1, 1),
(74, 26, 26, 2, 5, 1),
(75, 26, 26, 3, 7, 1),
(76, 26, 26, 4, 21, 1),
(77, 26, 26, 5, 10, 1),
(78, 26, 26, 6, 12, 1),
(79, 26, 26, 7, 15, 1),
(80, 26, 26, 8, 19, 1),
(81, 25, 25, 1, 1, 1),
(82, 25, 25, 2, 5, 1),
(83, 25, 25, 3, 7, 1),
(84, 25, 25, 4, 21, 1),
(85, 25, 25, 5, 10, 1),
(86, 25, 25, 6, 12, 1),
(87, 25, 25, 7, 15, 1),
(88, 25, 25, 8, 19, 1),
(89, 24, 24, 1, 1, 1),
(90, 24, 24, 2, 5, 1),
(91, 24, 24, 3, 7, 1),
(92, 24, 24, 4, 21, 1),
(93, 24, 24, 5, 10, 1),
(94, 24, 24, 6, 13, 1),
(95, 24, 24, 7, 15, 1),
(96, 24, 24, 8, 19, 1),
(97, 23, 23, 1, 1, 1),
(98, 23, 23, 2, 6, 1),
(99, 23, 23, 3, 7, 1),
(100, 23, 23, 4, 21, 1),
(101, 23, 23, 5, 10, 1),
(102, 23, 23, 6, 12, 1),
(103, 23, 23, 7, 15, 1),
(104, 23, 23, 8, 19, 1),
(105, 22, 22, 1, 1, 1),
(106, 22, 22, 2, 5, 1),
(107, 22, 22, 3, 7, 1),
(108, 22, 22, 4, 22, 1),
(109, 22, 22, 5, 10, 1),
(110, 22, 22, 6, 12, 1),
(111, 22, 22, 7, 15, 1),
(112, 22, 22, 8, 20, 1),
(113, 21, 21, 1, 1, 1),
(114, 21, 21, 2, 5, 1),
(115, 21, 21, 3, 8, 1),
(116, 21, 21, 4, 22, 1),
(117, 21, 21, 5, 10, 1),
(118, 21, 21, 6, 12, 1),
(119, 21, 21, 7, 15, 1),
(120, 21, 21, 8, 20, 1),
(121, 20, 20, 1, 1, 1),
(122, 20, 20, 2, 5, 1),
(123, 20, 20, 3, 8, 1),
(124, 20, 20, 4, 21, 1),
(125, 20, 20, 5, 10, 1),
(126, 20, 20, 6, 12, 1),
(127, 20, 20, 7, 15, 1),
(128, 20, 20, 8, 19, 1),
(129, 19, 19, 1, 1, 1),
(130, 19, 19, 2, 5, 1),
(131, 19, 19, 3, 7, 1),
(132, 19, 19, 4, 22, 1),
(133, 19, 19, 5, 9, 1),
(134, 19, 19, 6, 12, 1),
(135, 19, 19, 7, 15, 1),
(136, 19, 19, 8, 19, 1),
(137, 18, 18, 1, 1, 1),
(138, 18, 18, 2, 6, 1),
(139, 18, 18, 3, 7, 1),
(140, 18, 18, 4, 22, 1),
(141, 18, 18, 5, 9, 1),
(142, 18, 18, 6, 12, 1),
(143, 18, 18, 7, 17, 1),
(144, 18, 18, 8, 20, 1),
(145, 17, 17, 1, 1, 1),
(146, 17, 17, 2, 4, 1),
(147, 17, 17, 3, 7, 1),
(148, 17, 17, 4, 21, 1),
(149, 17, 17, 5, 10, 1),
(150, 17, 17, 6, 13, 1),
(151, 17, 17, 7, 15, 1),
(152, 17, 17, 8, 19, 1),
(153, 16, 16, 1, 1, 1),
(154, 16, 16, 2, 4, 1),
(155, 16, 16, 3, 7, 1),
(156, 16, 16, 4, 21, 1),
(157, 16, 16, 5, 10, 1),
(158, 16, 16, 6, 12, 1),
(159, 16, 16, 7, 15, 1),
(160, 16, 16, 8, 19, 1),
(161, 15, 15, 1, 1, 1),
(162, 15, 15, 2, 4, 1),
(163, 15, 15, 3, 7, 1),
(164, 15, 15, 4, 21, 1),
(165, 15, 15, 5, 10, 1),
(166, 15, 15, 6, 12, 1),
(167, 15, 15, 7, 15, 1),
(168, 15, 15, 8, 19, 1),
(169, 14, 14, 1, 1, 1),
(170, 14, 14, 2, 5, 1),
(171, 14, 14, 3, 7, 1),
(172, 14, 14, 4, 21, 1),
(173, 14, 14, 5, 10, 1),
(174, 14, 14, 6, 12, 1),
(175, 14, 14, 7, 15, 1),
(176, 14, 14, 8, 19, 1),
(177, 13, 13, 1, 1, 1),
(178, 13, 13, 2, 4, 1),
(179, 13, 13, 3, 7, 1),
(180, 13, 13, 4, 21, 1),
(181, 13, 13, 5, 10, 1),
(182, 13, 13, 6, 12, 1),
(183, 13, 13, 7, 15, 1),
(184, 13, 13, 8, 19, 1),
(185, 12, 12, 1, 1, 1),
(186, 12, 12, 2, 5, 1),
(187, 12, 12, 3, 7, 1),
(188, 12, 12, 4, 21, 1),
(189, 12, 12, 5, 11, 1),
(190, 12, 12, 6, 12, 1),
(191, 12, 12, 7, 16, 1),
(192, 12, 12, 8, 19, 1),
(193, 11, 11, 1, 1, 1),
(194, 11, 11, 2, 5, 1),
(195, 11, 11, 3, 8, 1),
(196, 11, 11, 4, 21, 1),
(197, 11, 11, 5, 10, 1),
(198, 11, 11, 6, 12, 1),
(199, 11, 11, 7, 15, 1),
(200, 11, 11, 8, 20, 1),
(201, 10, 10, 1, 1, 1),
(202, 10, 10, 2, 5, 1),
(203, 10, 10, 3, 8, 1),
(204, 10, 10, 4, 22, 1),
(205, 10, 10, 5, 10, 1),
(206, 10, 10, 6, 12, 1),
(207, 10, 10, 7, 15, 1),
(208, 10, 10, 8, 20, 1),
(209, 9, 9, 1, 1, 1),
(210, 9, 9, 2, 5, 1),
(211, 9, 9, 3, 8, 1),
(212, 9, 9, 4, 22, 1),
(213, 9, 9, 5, 10, 1),
(214, 9, 9, 6, 12, 1),
(215, 9, 9, 7, 16, 1),
(216, 9, 9, 8, 20, 1),
(217, 8, 8, 1, 1, 1),
(218, 8, 8, 2, 4, 1),
(219, 8, 8, 3, 7, 1),
(220, 8, 8, 4, 22, 1),
(221, 8, 8, 5, 10, 1),
(222, 8, 8, 6, 13, 1),
(223, 8, 8, 7, 15, 1),
(224, 8, 8, 8, 20, 1),
(225, 7, 7, 1, 1, 1),
(226, 7, 7, 2, 4, 1),
(227, 7, 7, 3, 7, 1),
(228, 7, 7, 4, 21, 1),
(229, 7, 7, 5, 10, 1),
(230, 7, 7, 6, 13, 1),
(231, 7, 7, 7, 15, 1),
(232, 7, 7, 8, 20, 1),
(233, 6, 6, 1, 1, 1),
(234, 6, 6, 2, 5, 1),
(235, 6, 6, 3, 8, 1),
(236, 6, 6, 4, 21, 1),
(237, 6, 6, 5, 10, 1),
(238, 6, 6, 6, 12, 1),
(239, 6, 6, 7, 15, 1),
(240, 6, 6, 8, 20, 1),
(241, 5, 5, 1, 1, 1),
(242, 5, 5, 2, 4, 1),
(243, 5, 5, 3, 7, 1),
(244, 5, 5, 4, 21, 1),
(245, 5, 5, 5, 10, 1),
(246, 5, 5, 6, 13, 1),
(247, 5, 5, 7, 15, 1),
(248, 5, 5, 8, 19, 1),
(249, 4, 4, 1, 1, 1),
(250, 4, 4, 2, 4, 1),
(251, 4, 4, 3, 8, 1),
(252, 4, 4, 4, 22, 1),
(253, 4, 4, 5, 10, 1),
(254, 4, 4, 6, 12, 1),
(255, 4, 4, 7, 15, 1),
(256, 4, 4, 8, 20, 1),
(257, 3, 3, 1, 1, 1),
(258, 3, 3, 2, 6, 1),
(259, 3, 3, 3, 7, 1),
(260, 3, 3, 4, 21, 1),
(261, 3, 3, 5, 9, 1),
(262, 3, 3, 6, 12, 1),
(263, 3, 3, 7, 16, 1),
(264, 3, 3, 8, 20, 1),
(265, 2, 2, 1, 1, 1),
(266, 2, 2, 2, 4, 1),
(267, 2, 2, 3, 7, 1),
(268, 2, 2, 4, 21, 1),
(269, 2, 2, 5, 10, 1),
(270, 2, 2, 6, 13, 1),
(271, 2, 2, 7, 15, 1),
(272, 2, 2, 8, 19, 1),
(486, 2, 0, 30, 34, 0),
(487, 3, 0, 30, 34, 0),
(488, 4, 0, 30, 34, 0),
(489, 5, 0, 30, 34, 0),
(490, 6, 0, 30, 34, 0),
(491, 7, 0, 30, 34, 0),
(492, 8, 0, 30, 34, 0),
(493, 9, 0, 30, 34, 0),
(494, 10, 0, 30, 34, 0),
(495, 11, 0, 30, 34, 0),
(496, 12, 0, 30, 34, 0),
(497, 13, 0, 30, 34, 0),
(498, 14, 0, 30, 34, 0),
(499, 15, 0, 30, 34, 0),
(500, 16, 0, 30, 34, 0),
(501, 17, 0, 30, 34, 0),
(502, 18, 0, 30, 34, 0),
(503, 19, 0, 30, 34, 0),
(504, 20, 0, 30, 34, 0),
(505, 21, 0, 30, 34, 0),
(506, 22, 0, 30, 34, 0),
(507, 23, 0, 30, 34, 0),
(508, 24, 0, 30, 34, 0),
(509, 25, 0, 30, 34, 0),
(510, 26, 0, 30, 34, 0),
(511, 27, 0, 30, 34, 0),
(512, 28, 0, 30, 34, 0),
(513, 29, 0, 30, 34, 0),
(514, 30, 0, 30, 34, 0),
(515, 31, 0, 30, 34, 0),
(516, 32, 0, 30, 34, 0),
(517, 33, 0, 30, 34, 0),
(518, 34, 0, 30, 34, 0),
(519, 2, 0, 31, 36, 0),
(520, 3, 0, 31, 36, 0),
(521, 4, 0, 31, 36, 0),
(522, 5, 0, 31, 36, 0),
(523, 6, 0, 31, 36, 0),
(524, 7, 0, 31, 36, 0),
(525, 8, 0, 31, 36, 0),
(526, 9, 0, 31, 36, 0),
(527, 10, 0, 31, 36, 0),
(528, 11, 0, 31, 36, 0),
(529, 12, 0, 31, 36, 0),
(530, 13, 0, 31, 36, 0),
(531, 14, 0, 31, 36, 0),
(532, 15, 0, 31, 36, 0),
(533, 16, 0, 31, 36, 0),
(534, 17, 0, 31, 36, 0),
(535, 18, 0, 31, 36, 0),
(536, 19, 0, 31, 36, 0),
(537, 20, 0, 31, 36, 0),
(538, 21, 0, 31, 36, 0),
(539, 22, 0, 31, 36, 0),
(540, 23, 0, 31, 36, 0),
(541, 24, 0, 31, 36, 0),
(542, 25, 0, 31, 36, 0),
(543, 26, 0, 31, 36, 0),
(544, 27, 0, 31, 36, 0),
(545, 28, 0, 31, 36, 0),
(546, 29, 0, 31, 36, 0),
(547, 30, 0, 31, 36, 0),
(548, 31, 0, 31, 36, 0),
(549, 32, 0, 31, 36, 0),
(550, 33, 0, 31, 36, 0),
(551, 34, 0, 31, 36, 0),
(552, 59, 0, 30, 35, 0),
(553, 59, 0, 31, 36, 0),
(554, 60, 0, 30, 35, 0),
(555, 60, 0, 31, 37, 0);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `periode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `periode`) VALUES
(1, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_dusun` int(11) NOT NULL,
  `status_pengajuan` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `id_periode`, `id_penduduk`, `id_dusun`, `status_pengajuan`) VALUES
(1, 1, 2, 1, 1),
(2, 1, 3, 1, 1),
(3, 1, 4, 1, 1),
(4, 1, 5, 1, 1),
(5, 1, 6, 1, 1),
(6, 1, 7, 4, 1),
(7, 1, 8, 4, 1),
(8, 1, 9, 4, 1),
(9, 1, 10, 4, 1),
(10, 1, 11, 4, 1),
(11, 1, 12, 7, 1),
(12, 1, 13, 7, 1),
(13, 1, 14, 7, 1),
(14, 1, 15, 7, 1),
(15, 1, 16, 8, 1),
(16, 1, 17, 8, 1),
(17, 1, 18, 8, 1),
(18, 1, 19, 8, 1),
(19, 1, 20, 3, 1),
(20, 1, 21, 3, 1),
(21, 1, 22, 3, 1),
(22, 1, 23, 3, 1),
(23, 1, 24, 5, 1),
(24, 1, 25, 5, 1),
(25, 1, 26, 5, 1),
(26, 1, 27, 5, 1),
(27, 1, 28, 5, 1),
(28, 1, 29, 5, 1),
(29, 1, 30, 6, 1),
(30, 1, 31, 6, 1),
(31, 1, 32, 6, 1),
(32, 1, 33, 6, 1),
(33, 1, 34, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(5) UNSIGNED NOT NULL,
  `id_kriteria` int(5) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(1, 1, 'Kurang dari 500.000', '1'),
(2, 1, '500.000 s\\d 1.000.000', '2'),
(3, 1, 'Lebih dari 1.000.000', '3'),
(4, 2, 'Bukan lansia', '1'),
(5, 2, 'Lansia tinggal dengan keluarga', '2'),
(6, 2, 'Lansia tunggal', '3'),
(7, 3, 'Tidak memiliki', '1'),
(8, 3, 'Memiliki', '3'),
(9, 5, 'Tidak ada', '1'),
(10, 5, '1-2 Orang', '2'),
(11, 5, 'Lebih dari 2 orang', '3'),
(12, 6, 'Tidak sekolah / SD sederajat', '1'),
(13, 6, 'SMP Sederajat', '2'),
(14, 6, 'SMA Sederajat / lebih tinggi', '3'),
(15, 7, 'Listrik meteran', '1'),
(16, 7, 'Nyalur tetangga', '2'),
(17, 7, 'Bukan listrik', '3'),
(18, 8, 'PDAM / jaringan air bersih', '1'),
(19, 8, 'Sumur milik sendiri', '2'),
(20, 8, 'Air sungai / kali', '3'),
(21, 4, 'Tidak memiliki', '1'),
(22, 4, 'Memiliki', '3'),
(34, 30, 'a', '1'),
(35, 30, 'b', '2'),
(36, 31, 'a', '1'),
(37, 31, 'b', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) UNSIGNED NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` enum('administrator','kasi_kesejahteraan','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `user_level`) VALUES
(1, 'admin', 'admin', 'admin', 'administrator'),
(4, 'Mayuri Shiina', 'kasi', 'kasi', 'kasi_kesejahteraan'),
(8, 'Saya User Baru', 'user', 'user', 'user'),
(10, 'administrator', 'admin2', 'admin', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
