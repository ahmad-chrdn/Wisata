-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2024 at 03:32 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikp`
--

-- --------------------------------------------------------

--
-- Table structure for table `duks`
--

CREATE TABLE `duks` (
  `id` bigint UNSIGNED NOT NULL,
  `pegawai_id` bigint UNSIGNED NOT NULL,
  `pangkat_id` bigint UNSIGNED NOT NULL,
  `pangkatYad_tmt` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `duks`
--

INSERT INTO `duks` (`id`, `pegawai_id`, `pangkat_id`, `pangkatYad_tmt`, `created_at`, `updated_at`) VALUES
(1, 5, 13, '2025-04-01', '2024-01-22 03:52:49', '2024-01-22 03:52:49'),
(2, 12, 13, '2027-04-01', '2024-01-22 04:00:06', '2024-01-22 04:00:06'),
(3, 21, 11, '2025-04-01', '2024-01-22 05:21:39', '2024-01-22 05:21:39'),
(4, 25, 9, '2026-04-01', '2024-01-22 05:23:27', '2024-01-22 05:23:27'),
(5, 26, 9, '2025-04-01', '2024-01-22 05:24:00', '2024-01-22 05:24:00'),
(6, 27, 10, '2025-01-01', '2024-01-22 05:25:14', '2024-01-22 05:25:14'),
(7, 28, 8, '2025-01-01', '2024-01-22 05:26:25', '2024-01-22 05:26:25'),
(8, 8, 12, '2024-04-01', '2024-01-22 05:36:21', '2024-01-22 07:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint UNSIGNED NOT NULL,
  `kd_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `kd_jabatan`, `nm_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'JBT-001', 'Kepala Dinas', '2024-01-16 22:29:47', '2024-01-16 22:34:42'),
(2, 'JBT-002', 'Sekretaris', '2024-01-16 22:30:12', '2024-01-16 22:34:35'),
(3, 'JBT-003', 'Kabid. Statistik Sektoral', '2024-01-16 22:30:47', '2024-01-16 22:34:28'),
(4, 'JBT-004', 'Kabid Tata Kelola Pemerintahan Berbasis Elektronik dan Telematika', '2024-01-16 22:34:17', '2024-01-16 22:34:17'),
(5, 'JBT-005', 'Kabid Informasi dan Komunikasi Publik', '2024-01-16 22:35:09', '2024-01-16 22:35:09'),
(6, 'JBT-006', 'Statistisi Ahli Muda (Fungsional) Bidang Statistik Sektoral', '2024-01-16 22:35:53', '2024-01-16 22:35:53'),
(7, 'JBT-007', 'Kasubbag. Umum dan Aparatur', '2024-01-16 22:36:12', '2024-01-16 22:36:12'),
(8, 'JBT-008', 'Kasubbag. Perencanaan dan Keuangan', '2024-01-16 22:36:25', '2024-01-16 22:36:25'),
(9, 'JBT-009', 'Kasi. Persandian dan Keamanan Sistem Informasi  Bid. Tata Kelola Pemerintahan Berbasis Elektronik dan Telematika', '2024-01-16 22:36:39', '2024-01-16 22:36:39'),
(10, 'JBT-010', 'Pranata Komputer Ahli Muda (Fungsional) Bid. Tata Kelola Pemerintahan Berbasis Elektronik dan Telematika', '2024-01-16 22:36:57', '2024-01-16 22:36:57'),
(11, 'JBT-011', 'Pranata Hubungan Masyarakat Ahli Muda (Fungsional) Bid.Informasi dan Komunikasi Publik', '2024-01-16 22:37:31', '2024-01-16 22:37:31'),
(12, 'JBT-012', 'Analis Pengaduan Masyarakat Bid.Informasi dan Komunikasi Publik', '2024-01-16 22:38:00', '2024-01-17 05:05:47'),
(13, 'JBT-013', 'Analis Kebijakan (Fungsional) Bid. Tata Kelola Pemerintahan Berbasis Elektronik dan Telematika', '2024-01-17 05:06:12', '2024-01-17 05:06:12'),
(14, 'JBT-014', 'Penyusun Bahan Informasi dan Publikasi Bid.Informasi dan Komunikasi Publik', '2024-01-17 05:06:53', '2024-01-17 05:06:53'),
(15, 'JBT-015', 'Penyusun Kebutuhan Barang Inventaris ( Penyimpan Barang ) Subbag Umum dan Aparatur', '2024-01-17 05:07:24', '2024-01-22 02:40:59'),
(16, 'JBT-016', 'Analis Perencanaan Subbag Perencanaan dan Keuanagan', '2024-01-17 05:08:13', '2024-01-17 05:08:13'),
(17, 'JBT-017', 'Analis Data dan Informasi Bid. Statistik Sektoral', '2024-01-17 05:08:37', '2024-01-17 05:08:37'),
(18, 'JBT-018', 'Sandiman Ahli Pratama (Fungsional) Seksi Persandian dan Keamanan Sistem Informasi', '2024-01-17 05:09:37', '2024-01-17 05:09:37'),
(19, 'JBT-019', 'Pengolah Data Penyuluhan dan Layanan Informasi Bid.Informasi dan Komunikasi Publik', '2024-01-17 05:09:58', '2024-01-17 05:09:58'),
(20, 'JBT-020', 'Pengelola Pemanfaatan Barang Milik Daerah ( Pengurus Barang ) Subbag Umum dan Aparatur', '2024-01-17 05:10:12', '2024-01-17 05:10:12'),
(21, 'JBT-021', 'Pranata Komputer Ahli Pertama ( Fungsional ) Bid. Tata Kelola Pemerintahan Berbasis Elektronik dan Telematika', '2024-01-17 05:10:51', '2024-01-17 05:10:51'),
(22, 'JBT-022', 'Statistisi Ahli Pertama( Fungsional ) Bid. Statistik Sektoral', '2024-01-17 05:11:56', '2024-01-17 05:11:56'),
(23, 'JBT-023', 'Analis Publikasi Bid.Informasi dan Komunikasi Publik', '2024-01-17 05:12:25', '2024-01-17 05:12:25'),
(24, 'JBT-024', 'Pranata Kearsipan Subbag Umum dan Aparatur', '2024-01-17 05:12:53', '2024-01-17 05:12:53'),
(25, 'JBT-025', 'Perancang Grafis Bid.Informasi dan Komunikasi Publik', '2024-01-17 05:13:08', '2024-01-17 05:13:08'),
(26, 'JBT-026', 'Bendahara Subbag Perencanaan dan Keuangan', '2024-01-17 05:13:29', '2024-01-17 05:13:29'),
(27, 'JBT-027', 'Pranata Teknologi Informasi Komputer Bid. Tata Kelola Pemerintahan Berbasis Elektronik dan Telematika', '2024-01-17 05:14:15', '2024-01-17 05:14:15'),
(28, 'JBT-028', 'Operator Sandi dan Telekomunikasi Seksi Persandian dan Keamanan Sistem Informasi', '2024-01-17 05:14:42', '2024-01-17 05:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_28_080446_create_pangkats_table', 1),
(6, '2023_12_29_140852_create_jabatans_table', 1),
(7, '2023_12_30_120412_create_pegawais_table', 1),
(8, '2024_01_04_203642_create_duks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pangkats`
--

CREATE TABLE `pangkats` (
  `id` bigint UNSIGNED NOT NULL,
  `kd_pangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_pangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gol_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pangkats`
--

INSERT INTO `pangkats` (`id`, `kd_pangkat`, `nm_pangkat`, `gol_ruang`, `created_at`, `updated_at`) VALUES
(1, 'PKT-001', 'Juru Muda', 'I / a', '2024-01-16 21:13:03', '2024-01-16 21:13:03'),
(2, 'PKT-002', 'Juru Muda Tingkat 1', 'I / b', '2024-01-16 21:13:22', '2024-01-16 21:13:22'),
(3, 'PKT-003', 'Juru', 'I / c', '2024-01-16 21:13:36', '2024-01-16 21:13:36'),
(4, 'PKT-004', 'Juru Tingkat 1', 'I / d', '2024-01-16 21:13:57', '2024-01-16 21:13:57'),
(5, 'PKT-005', 'Pengatur Muda', 'II / a', '2024-01-16 21:14:16', '2024-01-16 21:14:16'),
(6, 'PKT-006', 'Pengatur Muda Tingkat 1', 'II / b', '2024-01-16 21:14:39', '2024-01-16 21:14:39'),
(7, 'PKT-007', 'Pengatur', 'II / c', '2024-01-16 21:29:53', '2024-01-16 21:29:53'),
(8, 'PKT-008', 'Pengatur Tingkat 1', 'II / d', '2024-01-16 21:30:17', '2024-01-16 21:30:17'),
(9, 'PKT-009', 'Penata Muda', 'III / a', '2024-01-16 21:31:56', '2024-01-16 21:31:56'),
(10, 'PKT-010', 'Penata Muda Tingkat 1', 'III / b', '2024-01-16 21:34:38', '2024-01-16 21:34:38'),
(11, 'PKT-011', 'Penata', 'III / c', '2024-01-16 21:34:56', '2024-01-16 21:34:56'),
(12, 'PKT-012', 'Penata Tingkat 1', 'III / d', '2024-01-16 21:35:19', '2024-01-16 21:35:19'),
(13, 'PKT-013', 'Pembina', 'IV / a', '2024-01-16 21:36:47', '2024-01-16 21:36:47'),
(14, 'PKT-014', 'Pembina Tingkat 1', 'IV / b', '2024-01-16 21:37:23', '2024-01-16 21:37:23'),
(15, 'PKT-015', 'Pembina Utama Muda', 'IV / c', '2024-01-16 21:46:25', '2024-01-16 21:46:25'),
(16, 'PKT-016', 'Pembina Utama Madya', 'IV / d', '2024-01-16 22:26:42', '2024-01-16 22:26:42'),
(17, 'PKT-017', 'Pembina Utama', 'IV / e', '2024-01-16 22:27:04', '2024-01-16 22:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat_tmt` date NOT NULL,
  `jabatan_tmt` date DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat_id` bigint UNSIGNED NOT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nip`, `nm_pegawai`, `jk`, `tempat_lahir`, `tgl_lahir`, `agama`, `pendidikan`, `pangkat_tmt`, `jabatan_tmt`, `keterangan`, `pangkat_id`, `jabatan_id`, `created_at`, `updated_at`) VALUES
(1, '19660127 198603 1 009', 'Drs. ZULKARNAIN, M.Si', 'L', 'Pontianak', '1966-01-27', 'Islam', 'S.2', '2014-10-01', NULL, NULL, 15, 1, '2024-01-22 01:22:44', '2024-01-22 15:02:26'),
(2, '19730518 199503 1 003', 'EDY PURWANTO, S.E, M.E', 'L', 'Bengkayang', '1973-05-18', 'Islam', 'S.2', '2018-04-01', NULL, NULL, 13, 2, '2024-01-22 01:29:02', '2024-01-22 02:17:23'),
(3, '19660228 199303 1 009', 'RUDHY PIRNGADI, SE', 'L', 'Pontianak', '1966-02-28', 'Islam', 'S.1', '2013-04-01', NULL, NULL, 13, 3, '2024-01-22 01:33:25', '2024-01-22 01:33:25'),
(4, '19740428 200003 1 004', 'FAHMI KURNIA HIDAYAT, SE', 'L', 'Malang', '1974-04-28', 'Islam', 'S.1', '2012-04-01', NULL, NULL, 12, 4, '2024-01-22 01:36:41', '2024-01-22 01:36:41'),
(5, '19791109 200212 2 006', 'VIVI SALMIARNI, S.Sos, M.A.P', 'P', 'Mempawah', '1979-11-09', 'Islam', 'S.2', '2021-04-01', NULL, NULL, 12, 5, '2024-01-22 01:46:19', '2024-01-22 15:03:22'),
(6, '19690623 200312 2 007', 'JUMIATI, SE, ME', 'P', 'Ketapang', '1969-06-23', 'Islam', 'S.2', '2020-04-01', NULL, NULL, 13, 6, '2024-01-22 01:54:28', '2024-01-22 01:54:28'),
(7, '19680619 199307 1 001', 'ISWANDI, S.Sos', 'L', 'Sambas', '1968-06-19', 'Islam', 'S.1', '2014-04-01', NULL, NULL, 12, 7, '2024-01-22 02:03:39', '2024-01-22 02:03:39'),
(8, '19761208 200501 1 005', 'URAY DENI ANDRIYADI, S.T', 'L', 'Sintang', '1976-12-08', 'Islam', 'S.1', '2020-04-01', NULL, NULL, 11, 8, '2024-01-22 02:07:38', '2024-01-22 02:18:33'),
(9, '19820716 200802 1 001', 'I WAYAN NUGROHO PS, ST', 'L', 'Bandar Lampung', '1982-07-16', 'Islam', 'S.1', '2018-04-01', NULL, NULL, 12, 9, '2024-01-22 02:11:05', '2024-01-22 02:11:05'),
(10, '19790528 200501 2 008', 'SRI WULANI REZEKI ELIDA, S.Si, M.A, M.S.E', 'P', 'Pontianak', '1979-05-28', 'Islam', 'S.2', '2020-04-01', NULL, NULL, 12, 10, '2024-01-22 02:15:56', '2024-01-22 02:15:56'),
(11, '19790204 200212 2 008', 'HENNY IRAWATY, S.Kom', 'P', 'Pontianak', '1979-02-04', 'Islam', 'S.1', '2021-10-01', NULL, NULL, 12, 11, '2024-01-22 02:20:49', '2024-01-22 02:20:49'),
(12, '19730516 200801 1 012', 'M. SURYADIN, SE, MM', 'L', 'Sintang', '1973-05-16', 'Islam', 'S.2', '2023-04-01', NULL, NULL, 12, 11, '2024-01-22 02:23:18', '2024-01-22 02:23:18'),
(13, '19790410 200212 2 007', 'ULLY APRIAYANI, SE', 'P', 'Pontianak', '1979-04-10', 'Islam', 'S.1', '2018-10-01', NULL, NULL, 12, 12, '2024-01-22 02:26:00', '2024-01-22 02:26:00'),
(14, '19750428 200212 1 005', 'DIAN WAHYUDI, S.Kom', 'L', 'Sambas', '1975-04-28', 'Islam', 'S.1', '2021-10-01', NULL, NULL, 12, 13, '2024-01-22 02:27:48', '2024-01-22 02:27:48'),
(15, '19800513 200502 1 003', 'AFRIZAL, S.AP', 'L', 'Tebas Kab. Sambas', '1980-05-13', 'Islam', 'S.1', '2019-10-01', NULL, NULL, 12, 14, '2024-01-22 02:37:57', '2024-01-22 02:37:57'),
(16, '19790714 200802 2 001', 'YANTI, SE', 'P', 'Kapuas Hulu', '1979-07-14', NULL, 'S.1', '2021-04-01', NULL, NULL, 12, 15, '2024-01-22 02:40:15', '2024-01-22 02:40:15'),
(17, '19731216 201001 2 003', 'SUHAIMAH, S.Sos', 'P', 'Pontianak', '1973-12-16', 'Islam', 'S.1', '2022-04-01', NULL, NULL, 12, 16, '2024-01-22 02:43:17', '2024-01-22 02:43:17'),
(18, '19761013 200803 1 001', 'ARIS MUNANDAR, S.Si', 'L', 'Singkawang', '1976-10-13', NULL, 'S.1', '2020-10-01', NULL, NULL, 12, 17, '2024-01-22 02:50:12', '2024-01-22 02:50:12'),
(19, '19781017 200902 1 003', 'ARIF RAHSIA GUMELAR, S.Kom', 'L', 'Pontianak', '1978-10-17', NULL, 'S.1', '2018-04-01', NULL, NULL, 10, 18, '2024-01-22 02:52:32', '2024-01-22 02:52:32'),
(20, '19801030 200312 1 003', 'ERY  RADEANSYAH, A.Md', 'L', 'Pontianak', '1980-10-30', NULL, 'D-III', '2019-10-01', NULL, NULL, 10, 19, '2024-01-22 02:56:42', '2024-01-22 02:56:42'),
(21, '19860524 200902 2 001', 'NURUL HUDA RIMADHANTI, S.Akun', 'P', 'Pontianak', '1986-05-24', 'Islam', 'S.1', '2021-04-01', NULL, NULL, 10, 20, '2024-01-22 02:59:18', '2024-01-22 02:59:18'),
(22, '19901208 201903 1 001', 'ADHITYA TEGUH NUGRAHA, S.T', 'L', 'Bandung', '1990-12-08', NULL, 'S.1', '2019-03-01', NULL, NULL, 9, 21, '2024-01-22 03:04:06', '2024-01-22 03:04:06'),
(23, '19950410 201903 1 003', 'ABANG YOGI PRATAMA,  S.Stat', 'L', 'Sanggau', '1995-04-10', 'Islam', 'S.1', '2019-03-01', NULL, NULL, 9, 22, '2024-01-22 03:06:53', '2024-01-22 03:06:53'),
(24, '19700713 200701 1 032', 'SAMSULLASMIN', 'L', 'Pontianak', '1970-07-13', 'Islam', 'STM Bangunan', '2023-04-01', NULL, NULL, 9, 24, '2024-01-22 03:14:34', '2024-01-22 03:14:34'),
(25, '19830308 201001 1 003', 'DOVVI', 'L', 'Pontianak', '1983-03-08', NULL, 'SMU', '2022-04-01', NULL, NULL, 8, 27, '2024-01-22 03:25:06', '2024-01-22 03:25:06'),
(26, '19840820 200901 2 006', 'NONNY MAYASARI', 'P', 'Pontianak', '1984-08-20', NULL, 'SMA', '2021-04-01', NULL, NULL, 8, 26, '2024-01-22 03:36:22', '2024-01-22 03:36:22'),
(27, '19901228 202012 1 006', 'DEDEH MUSTAFA RAMADHAN, S.Kom', 'L', 'Pontianak', '1990-12-28', 'Islam', 'S.1', '2021-01-01', NULL, NULL, 9, 25, '2024-01-22 03:39:01', '2024-01-22 11:36:09'),
(28, '19981029 202012 1 005', 'TEGAR SUNANTA PRATAMA, A.Md.Kom', 'L', 'Pontianak', '1998-10-29', 'Islam', 'D-III', '2021-01-01', NULL, NULL, 7, 28, '2024-01-22 03:42:53', '2024-01-22 11:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$pJHp7NhuZw3492e88gygEutbbA1AlHfyPN8hHAwbC3madDFQYpDhy', 'xKb2KjQE600T87eZ5C5Ul2Za5eKjBPouBYznQcETkUheUWinzFjAwRXpvWfW', 'avatar-default.png', '2024-01-22 01:00:06', '2024-01-22 01:00:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `duks`
--
ALTER TABLE `duks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duks_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `duks_pangkat_id_foreign` (`pangkat_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jabatans_kd_jabatan_unique` (`kd_jabatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pangkats`
--
ALTER TABLE `pangkats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pangkats_kd_pangkat_unique` (`kd_pangkat`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_nip_unique` (`nip`),
  ADD KEY `pegawais_pangkat_id_foreign` (`pangkat_id`),
  ADD KEY `pegawais_jabatan_id_foreign` (`jabatan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `duks`
--
ALTER TABLE `duks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pangkats`
--
ALTER TABLE `pangkats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `duks`
--
ALTER TABLE `duks`
  ADD CONSTRAINT `duks_pangkat_id_foreign` FOREIGN KEY (`pangkat_id`) REFERENCES `pangkats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `duks_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawais_pangkat_id_foreign` FOREIGN KEY (`pangkat_id`) REFERENCES `pangkats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
