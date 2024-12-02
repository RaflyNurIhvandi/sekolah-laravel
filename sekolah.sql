-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2023 at 02:40 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `akreditasi`
--

CREATE TABLE `akreditasi` (
  `id` int(11) NOT NULL,
  `no_akreditasi` varchar(300) DEFAULT NULL,
  `npsn` varchar(100) DEFAULT NULL,
  `nama_akreditasi` varchar(1000) DEFAULT NULL,
  `min_a` int(100) DEFAULT NULL,
  `min_b` int(100) DEFAULT NULL,
  `min_c` int(100) DEFAULT NULL,
  `min_d` int(100) DEFAULT NULL,
  `max_a` int(100) DEFAULT NULL,
  `max_b` int(100) DEFAULT NULL,
  `max_c` int(100) DEFAULT NULL,
  `max_d` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akreditasi`
--

INSERT INTO `akreditasi` (`id`, `no_akreditasi`, `npsn`, `nama_akreditasi`, `min_a`, `min_b`, `min_c`, `min_d`, `max_a`, `max_b`, `max_c`, `max_d`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'AKS20230704071730', '1234567', 'Akreditas A', 90, 70, 50, 0, 100, 89, 69, 49, '2023-07-04 07:17:30', '2023-07-06 04:26:22', NULL),
(6, 'AKS20230803023641', '10293884756', 'Akreditasi A', 90, 80, 70, 0, 100, 89, 79, 69, '2023-08-03 02:36:41', '2023-08-03 02:36:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alamat_siswa`
--

CREATE TABLE `alamat_siswa` (
  `id` int(11) NOT NULL,
  `no_siswa` varchar(300) DEFAULT NULL,
  `no_alamat_siswa` varchar(300) DEFAULT NULL,
  `alamat_siswa` longtext,
  `kota_siswa` varchar(300) DEFAULT NULL,
  `provinsi_siswa` varchar(300) DEFAULT NULL,
  `kode_pos_siswa` varchar(100) DEFAULT NULL,
  `negara_siswa` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_siswa`
--

INSERT INTO `alamat_siswa` (`id`, `no_siswa`, `no_alamat_siswa`, `alamat_siswa`, `kota_siswa`, `provinsi_siswa`, `kode_pos_siswa`, `negara_siswa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'SS20230619023246', 'AS20230619023246', 'Rt 10, Rw 04, Desa Sidomulyo, Kec Pule, Kab Trenggalek', 'Trenggalek', 'Jawa Timur', '66062', 'Indonesia', '2023-06-19 02:32:46', '2023-06-19 02:32:46', NULL),
(11, 'SS20230619071133', 'AS20230619071133', 'Rt 10, Rw 04, Desa Sidomulyo, Kec Pule, Kab Trenggalek', 'Trenggalek', 'Jawa Timur', '66062', 'Indonesia', '2023-06-19 07:11:33', '2023-06-19 07:11:33', NULL),
(12, 'SS20230816043857', 'AS20230816043857', 'Rt 10, Rw 04, Desa Sidomulyo, Kec Pule, Kab Trenggalek', 'Trenggalek', 'Jawa Timur', '66062', 'Indonesia', '2023-08-16 04:38:57', '2023-08-16 04:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alamat_wali_siswa`
--

CREATE TABLE `alamat_wali_siswa` (
  `id` int(11) NOT NULL,
  `no_siswa` varchar(300) DEFAULT NULL,
  `no_alamat_wali` varchar(300) DEFAULT NULL,
  `alamat_wali` longtext,
  `kota_wali` varchar(300) DEFAULT NULL,
  `provinsi_wali` varchar(300) DEFAULT NULL,
  `kode_pos_wali` varchar(300) DEFAULT NULL,
  `negara_wali` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_wali_siswa`
--

INSERT INTO `alamat_wali_siswa` (`id`, `no_siswa`, `no_alamat_wali`, `alamat_wali`, `kota_wali`, `provinsi_wali`, `kode_pos_wali`, `negara_wali`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'SS20230619023246', 'AWS20230619023246', 'Rt 10, Rw 04, Desa SIdomulyo, Kec Pule, Kab Trenggalek', 'Trenggalek', 'Jawa Timur', '66062', 'Indonesia', '2023-06-19 02:32:46', '2023-06-19 02:32:46', NULL),
(8, 'SS20230619071133', 'AWS20230619071133', 'Rt 10, Rw 04, Desa SIdomulyo, Kec Pule, Kab Trenggalek', 'Trenggalek', 'Jawa Timur', '66062', 'Indonesia', '2023-06-19 07:11:33', '2023-06-19 07:11:33', NULL),
(9, 'SS20230816043857', 'AWS20230816043857', 'Rt 10, Rw 04, Desa SIdomulyo, Kec Pule, Kab Trenggalek', 'Trenggalek', 'Jawa Timur', '66062', 'Indonesia', '2023-08-16 04:38:57', '2023-08-16 04:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berkas_pendaftaran_siswa`
--

CREATE TABLE `berkas_pendaftaran_siswa` (
  `id` int(11) NOT NULL,
  `no_berkas` varchar(300) DEFAULT NULL,
  `no_siswa` varchar(300) DEFAULT NULL,
  `ktp_wali` varchar(1000) DEFAULT NULL,
  `kartu_keluarga` varchar(1000) DEFAULT NULL,
  `akta_kelahiran` varchar(1000) DEFAULT NULL,
  `nilai_rapor` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas_pendaftaran_siswa`
--

INSERT INTO `berkas_pendaftaran_siswa` (`id`, `no_berkas`, `no_siswa`, `ktp_wali`, `kartu_keluarga`, `akta_kelahiran`, `nilai_rapor`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'BS20230619023246', 'SS20230619023246', '1687141966_KTP.pdf', '1687141966_KK.pdf', '1687141966_AKTA KELAHIRAN.pdf', '1687141966_RAPOR.pdf', '2023-06-19 02:32:46', '2023-06-19 02:32:46', NULL),
(9, 'BS20230619071133', 'SS20230619071133', '1687158693_KTP.pdf', '1687158693_KK.pdf', '1687158693_AKTA KELAHIRAN.pdf', '1687158693_RAPOR.pdf', '2023-06-19 07:11:33', '2023-06-19 07:11:33', NULL),
(10, 'BS20230816043857', 'SS20230816043857', '1692160737_KTP.pdf', '1692160737_KK.pdf', '1692160737_AKTA KELAHIRAN.pdf', '1692160737_RAPOR.pdf', '2023-08-16 04:38:57', '2023-08-16 04:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cv_guru`
--

CREATE TABLE `cv_guru` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(300) DEFAULT NULL,
  `file` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_guru`
--

INSERT INTO `cv_guru` (`id`, `no_anggota`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20230503042803', '1685670642_CV_PSG_Rafly.pdf', '2023-06-02 01:50:42', '2023-06-02 01:50:42', NULL),
(2, '20230803020957', '1691028795_KTP.pdf', '2023-08-03 02:13:15', '2023-08-03 02:13:15', NULL),
(3, '20230820144250', '1692543682_cv_guru.pdf', '2023-08-20 15:01:22', '2023-08-20 15:01:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kelas`
--

CREATE TABLE `daftar_kelas` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(1000) DEFAULT NULL,
  `tingkat_kelas` varchar(100) DEFAULT NULL,
  `npsn` varchar(1000) DEFAULT NULL,
  `abjad_kelas` varchar(100) DEFAULT NULL,
  `catatan` longtext,
  `no_kelas` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_kelas`
--

INSERT INTO `daftar_kelas` (`id`, `jurusan`, `tingkat_kelas`, `npsn`, `abjad_kelas`, `catatan`, `no_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'JRS20230616083018', 'XI', '1234567', 'C', 'Kelas Paling Rajin', 'DK20230703061504', '2023-07-03 06:15:04', '2023-07-03 07:14:00', NULL),
(8, 'JRS20230616083018', 'X', '1234567', 'B', 'Kelas Baik', 'DK20230712041013', '2023-07-12 04:10:13', '2023-07-12 04:10:13', NULL),
(9, 'JRS20230802140405', 'XII', '10293884756', 'A', 'Kelas ini adalah kelas paling rajin.', 'DK20230803034249', '2023-08-03 03:42:49', '2023-08-03 03:42:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pembagian_siswa`
--

CREATE TABLE `daftar_pembagian_siswa` (
  `id` int(11) NOT NULL,
  `no_jumlah` varchar(300) DEFAULT NULL,
  `npsn` varchar(200) DEFAULT NULL,
  `jumlah_perkelas` int(100) DEFAULT NULL,
  `jumlah_perjurusan` int(100) DEFAULT NULL,
  `penerimaan_pertahun` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_sekolah`
--

CREATE TABLE `daftar_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `npsn` varchar(100) DEFAULT NULL,
  `alamat_sekolah` varchar(1000) DEFAULT NULL,
  `subjek` varchar(400) DEFAULT NULL,
  `deskripsi` longtext,
  `gambar` varchar(1000) DEFAULT NULL,
  `kode_sekolah` varchar(50) DEFAULT NULL,
  `grub` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_sekolah`
--

INSERT INTO `daftar_sekolah` (`id`, `nama_sekolah`, `npsn`, `alamat_sekolah`, `subjek`, `deskripsi`, `gambar`, `kode_sekolah`, `grub`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'SMKN 2 Trenggalek', '1234567', 'Rt 10, Rw 04, Desa Sumber Gedong, Kec Trenggalek, Kab Trenggalek, Jawa Timur Indonesia', 'Lorem ipsum dolor sit amet. Qui dicta iste et natus minus ab reprehenderit odit et rerum tempore et Quis itaque qui explicabo laboriosam non odit ullam. Et odio cupiditate ut magni similique qui iste tenetur est magni doloribus et voluptate odit et natus eveniet sit distinctio similique. Eum voluptatem ducimus non numquam voluptates sit eius voluptatibus. Qui voluptatem accusantium quo dicta nemo.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat odio facilisis mauris sit amet massa vitae tortor condimentum. Et netus et malesuada fames. Dui vivamus arcu felis bibendum ut tristique et egestas quis. At varius vel pharetra vel. Ut venenatis tellus in metus vulputate. At tellus at urna condimentum mattis pellentesque id nibh tortor. At auctor urna nunc id cursus metus. Viverra mauris in aliquam sem. Mi ipsum faucibus vitae aliquet. Pharetra sit amet aliquam id diam maecenas. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Nibh cras pulvinar mattis nunc sed blandit libero volutpat.\r\n\r\nMalesuada bibendum arcu vitae elementum. Eget felis eget nunc lobortis. Penatibus et magnis dis parturient montes. Tellus molestie nunc non blandit massa enim nec dui. Suspendisse ultrices gravida dictum fusce. Congue eu consequat ac felis donec. Cras adipiscing enim eu turpis egestas pretium aenean pharetra. Massa id neque aliquam vestibulum morbi blandit cursus. At elementum eu facilisis sed odio. Quis hendrerit dolor magna eget est lorem ipsum dolor. Lectus quam id leo in vitae turpis. Ornare massa eget egestas purus viverra accumsan in. Ac turpis egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus sit. Vitae nunc sed velit dignissim sodales.\r\n\r\nJusto nec ultrices dui sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium. Magnis dis parturient montes nascetur ridiculus mus mauris vitae ultricies. Eros in cursus turpis massa tincidunt. Cursus vitae congue mauris rhoncus aenean vel elit. Id aliquet lectus proin nibh nisl condimentum id venenatis a. Diam donec adipiscing tristique risus nec feugiat in fermentum. Ultrices sagittis orci a scelerisque purus semper. Tortor posuere ac ut consequat semper viverra nam libero justo. Dignissim diam quis enim lobortis scelerisque. Condimentum id venenatis a condimentum vitae. Ut sem viverra aliquet eget sit amet tellus cras adipiscing. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet. Arcu vitae elementum curabitur vitae nunc sed velit. Auctor augue mauris augue neque gravida in fermentum et. Pellentesque dignissim enim sit amet venenatis urna cursus eget nunc. Orci sagittis eu volutpat odio. Amet cursus sit amet dictum. Risus feugiat in ante metus dictum at tempor commodo.\r\n\r\nPhasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor. Nibh nisl condimentum id venenatis a condimentum. Nunc sed velit dignissim sodales ut eu sem integer vitae. Consectetur purus ut faucibus pulvinar elementum. Cursus risus at ultrices mi tempus imperdiet nulla. Laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Mollis nunc sed id semper risus. At varius vel pharetra vel turpis nunc eget. Integer enim neque volutpat ac tincidunt vitae semper quis. Viverra nibh cras pulvinar mattis nunc sed blandit libero. Nibh tortor id aliquet lectus proin. Viverra ipsum nunc aliquet bibendum enim facilisis gravida neque convallis. Hac habitasse platea dictumst quisque sagittis. Enim praesent elementum facilisis leo vel fringilla est ullamcorper eget. Adipiscing vitae proin sagittis nisl rhoncus. Dignissim enim sit amet venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet consectetur adipiscing elit ut.\r\n\r\nRhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. At tempor commodo ullamcorper a lacus vestibulum sed arcu non. Etiam tempor orci eu lobortis. Egestas pretium aenean pharetra magna ac placerat vestibulum. Tristique sollicitudin nibh sit amet commodo nulla facilisi. Orci porta non pulvinar neque laoreet suspendisse. Enim nec dui nunc mattis. Sed viverra tellus in hac habitasse platea dictumst. Scelerisque purus semper eget duis at tellus at urna condimentum. Donec massa sapien faucibus et molestie ac feugiat. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Mattis enim ut tellus elementum sagittis vitae et leo duis. Donec adipiscing tristique risus nec feugiat in fermentum.', NULL, 'DS20230509022538', 'T8', '2023-05-09 02:25:38', '2023-07-25 10:23:36', NULL),
(5, 'SMK NAGA', '10293884756', 'Rt 5, Rw 2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta, 10110', 'SMK NAGA adalah sekolah yang membentuk anak-anak sekolah sangat berprestasi dibidang yang diinginkan oleh anak-anak tersebut.', 'SMK NAGA adalah sekolah yang membentuk anak-anak sekolah sangat berprestasi dibidang yang diinginkan oleh anak-anak tersebut. Dengan adanya program wajib prestasi anak-anak diwajibkan untuk bisa pada keahliannya masing-masing, serta tidak menuntut anak untuk bisa pada hal yang tidak disukai.', NULL, 'DS20230802133810', 'T8', '2023-08-02 13:38:10', '2023-08-03 03:01:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_siswa`
--

CREATE TABLE `daftar_siswa` (
  `id` int(11) NOT NULL,
  `no_anggota_siswa` varchar(300) DEFAULT NULL,
  `kelas_siswa` varchar(300) DEFAULT NULL,
  `user` varchar(1000) DEFAULT NULL,
  `status_siswa` varchar(100) DEFAULT NULL,
  `no_siswa` varchar(300) DEFAULT NULL,
  `nama_siswa` varchar(300) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `sekolah_asal_siswa` varchar(300) DEFAULT NULL,
  `jenis_kelamin_siswa` varchar(25) DEFAULT NULL,
  `tempat_lahir_siswa` varchar(100) DEFAULT NULL,
  `tanggal_lahir_siswa` date DEFAULT NULL,
  `agama_siswa` varchar(100) DEFAULT NULL,
  `kewarganegaraan_siswa` varchar(50) DEFAULT NULL,
  `anak_ke` int(10) DEFAULT NULL,
  `no_hp_siswa` varchar(100) DEFAULT NULL,
  `email_siswa` varchar(300) DEFAULT NULL,
  `nama_sekolah_siswa` varchar(300) DEFAULT NULL,
  `npsn` varchar(100) DEFAULT NULL,
  `jurusan_siswa` varchar(300) DEFAULT NULL,
  `verifikasi_data` varchar(100) DEFAULT NULL,
  `verifikasi_patuh` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_siswa`
--

INSERT INTO `daftar_siswa` (`id`, `no_anggota_siswa`, `kelas_siswa`, `user`, `status_siswa`, `no_siswa`, `nama_siswa`, `nisn`, `sekolah_asal_siswa`, `jenis_kelamin_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `agama_siswa`, `kewarganegaraan_siswa`, `anak_ke`, `no_hp_siswa`, `email_siswa`, `nama_sekolah_siswa`, `npsn`, `jurusan_siswa`, `verifikasi_data`, `verifikasi_patuh`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, '20230602081152', 'KLS20230616083423', 'Murid', 'DITERIMA', 'SS20230619023246', 'Reva Fidela Adel Pantjoro', '202020', 'SMP Negeri 3 PULE', 'Perempuan', 'Trenggalek', '2006-07-14', 'Islam', 'WNI', 4, '08212121212', 'akuadalahmurid@gmail.com', 'SMKN 2 Trenggalek', '1234567', 'JRS20230616083018', 'verifikasi input data', 'verifikasi patuh', '2023-06-19 02:32:46', '2023-07-11 07:06:45', NULL),
(13, '', 'KLS20230616075650', 'Murid', 'DITERIMA', 'SS20230619071133', 'Adel Pantjoro', '01010101', 'SMP Negeri 3 PULE', 'Perempuan', 'Trenggalek', '2006-07-14', 'Islam', 'WNI', 4, '08776776766', 'adelpantjoro@gmail.com', 'SMKN 2 Trenggalek', '1234567', 'JRS20230616075046', 'verifikasi input data', 'verifikasi patuh', '2023-06-19 07:11:33', '2023-07-08 07:53:55', NULL),
(15, '20230803042921', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03 04:29:21', '2023-08-03 04:29:21', NULL),
(16, '20230803042921', 'KLS20230803014144', 'Rafly Nur Ihvandi', 'DITERIMA', 'SS20230816043857', 'Rafly Nur Ihvandi', '1234567', 'SMP Negeri 3 Pule', 'Laki-Laki', 'Trenggalek', '2005-12-14', 'Islam', 'WNI', 1, '082228618169', 'raflyfidela@gmail.com', 'SMK NAGA', '10293884756', 'JRS20230802140405', 'verifikasi input data', 'verifikasi patuh', '2023-08-16 04:38:57', '2023-08-23 02:27:19', NULL),
(17, '20230820144250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-20 14:42:51', '2023-08-20 14:42:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_wali_siswa`
--

CREATE TABLE `daftar_wali_siswa` (
  `id` int(11) NOT NULL,
  `no_wali` varchar(300) DEFAULT NULL,
  `no_siswa` varchar(300) DEFAULT NULL,
  `nama_wali` varchar(500) DEFAULT NULL,
  `jenis_kelamin_wali` varchar(25) DEFAULT NULL,
  `tempat_lahir_wali` varchar(300) DEFAULT NULL,
  `tanggal_lahir_wali` date DEFAULT NULL,
  `hubungan_keluarga` varchar(300) DEFAULT NULL,
  `kewarganegaraan_wali` varchar(300) DEFAULT NULL,
  `agama_wali` varchar(25) DEFAULT NULL,
  `pekerjaan_wali` varchar(300) DEFAULT NULL,
  `no_hp_wali` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_wali_siswa`
--

INSERT INTO `daftar_wali_siswa` (`id`, `no_wali`, `no_siswa`, `nama_wali`, `jenis_kelamin_wali`, `tempat_lahir_wali`, `tanggal_lahir_wali`, `hubungan_keluarga`, `kewarganegaraan_wali`, `agama_wali`, `pekerjaan_wali`, `no_hp_wali`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'WS20230619023246', 'SS20230619023246', 'Rafly Nur', 'Laki-Laki', 'Trenggalek', '2005-12-14', 'Suami', 'WNI', 'Islam', 'Atlit', '0123728131', '2023-06-19 02:32:46', '2023-06-19 02:32:46', NULL),
(11, 'WS20230619071133', 'SS20230619071133', 'Rafly Fidela', 'Laki-Laki', 'Trenggalek', '2005-12-14', 'Suami', 'WNI', 'Islam', 'Atlit', '0897979989', '2023-06-19 07:11:33', '2023-06-19 07:11:33', NULL),
(12, 'WS20230816043857', 'SS20230816043857', 'Katijan', 'Laki-Laki', 'Trenggalek', '1965-12-14', 'Ayah', 'WNI', 'Islam', 'Atlit', '082228618169', '2023-08-16 04:38:57', '2023-08-16 04:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entertiment_guru`
--

CREATE TABLE `entertiment_guru` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(300) DEFAULT NULL,
  `whatsapp` varchar(300) DEFAULT NULL,
  `instagram` varchar(300) DEFAULT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL,
  `youtube` varchar(300) DEFAULT NULL,
  `tiktok` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entertiment_guru`
--

INSERT INTO `entertiment_guru` (`id`, `no_anggota`, `whatsapp`, `instagram`, `facebook`, `twitter`, `youtube`, `tiktok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20230503042803', '085251252718', '@revafidela', '@revaadel', 'REVA FIDELA ADEL PANTJORO', 'ADELLL', '@Dedellll', '2023-06-02 01:50:42', '2023-06-02 01:50:42', NULL),
(2, '20230803020957', '08323434627', '@wulan', 'wulan', 'wulanTW', 'WULAN', '@wulan', '2023-08-03 02:13:15', '2023-08-03 02:13:15', NULL),
(3, '20230820144250', '08921737272', '@reza', 'rezacyber', 'reza_cyber', 'king_of_cyber', 'cyber_reza', '2023-08-20 15:01:22', '2023-08-20 15:01:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_tambahan`
--

CREATE TABLE `fasilitas_tambahan` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) DEFAULT NULL,
  `no_fasilitas` varchar(50) DEFAULT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `keterangan` varchar(5000) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `npsn` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_tambahan`
--

INSERT INTO `fasilitas_tambahan` (`id`, `nama_fasilitas`, `no_fasilitas`, `jumlah`, `keterangan`, `gambar`, `npsn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tempat Parkir', 'FT20230713083316', '2', 'Cukup Luas', NULL, '1234567', '2023-07-13 08:33:16', '2023-07-13 08:33:16', NULL),
(2, 'Tempat Parkir', 'FT20230803031352', '5', 'Tempat parkir sangat luas dan cukup terbilang banyak untuk siswa yang membawa kendaraan kesekolah.', NULL, '10293884756', '2023-08-03 03:13:52', '2023-08-03 03:13:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_umum`
--

CREATE TABLE `fasilitas_umum` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) DEFAULT NULL,
  `no_fasilitas` varchar(50) DEFAULT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `keterangan` varchar(5000) DEFAULT NULL,
  `npsn` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_umum`
--

INSERT INTO `fasilitas_umum` (`id`, `nama_fasilitas`, `no_fasilitas`, `jumlah`, `keterangan`, `npsn`, `created_at`, `updated_at`, `deleted_at`, `gambar`) VALUES
(15, 'Alat Olah Raga', 'FU20230713072935', '12', 'Lengkap', '1234567', '2023-07-13 07:29:35', '2023-07-13 07:29:35', NULL, NULL),
(17, 'Ruang Kelas', 'FU20230803031219', '50', 'Ruangkelas sangat nyaman dengan semua peralatan belajar yang dijaga dengan sangat baik.', '10293884756', '2023-08-03 03:12:19', '2023-08-03 03:12:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_siswa`
--

CREATE TABLE `file_siswa` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(300) DEFAULT NULL,
  `npsn` varchar(100) DEFAULT NULL,
  `no_file` varchar(300) DEFAULT NULL,
  `akta_kelahiran` varchar(1000) DEFAULT NULL,
  `kartu_keluarga` varchar(1000) DEFAULT NULL,
  `skl` varchar(1000) DEFAULT NULL,
  `rapor` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foter1`
--

CREATE TABLE `foter1` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foter1`
--

INSERT INTO `foter1` (`id`, `icon`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'twiter', 'https://www.youtube.com/watch?v=k0rlF5cf9FI', '2023-05-12 03:50:00', '2023-05-12 03:50:09', NULL),
(2, 'facebook', 'http://facebook', '2023-05-12 03:50:35', '2023-05-12 03:50:35', NULL),
(3, 'instagram', 'https://ig', '2023-05-12 03:50:54', '2023-05-12 03:50:54', NULL),
(4, 'whatsapp', 'https://wa', '2023-05-12 03:51:12', '2023-05-12 03:51:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fotersekolah`
--

CREATE TABLE `fotersekolah` (
  `id` int(11) NOT NULL,
  `deskripsi` longtext,
  `des` longtext,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `text` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotersekolah`
--

INSERT INTO `fotersekolah` (`id`, `deskripsi`, `des`, `contact`, `email`, `text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Go School adalah website untuk melakukan segala registrasi pendaftaran sekolah anda. Anda bisa mendaftarkan sekolah anda untuk memperluas jangkauan sekolah anda kepada masyarakat. Di era digital seperti ini kami menyediakan layanan untuk berbagai macam kebutuhan website untuk mengembangkan berbagai projek terutama proses pembelajaran juga sangat penting untuk semua orang, karena ilmu adalah salah satu kebutuhan yang penting untuk hidup di dunia.', 'Tuangkan kesempatan anda pada Go School maka jalan anda untuk sukses telah anda buka sendiri.', '+62 822-2861-8169', 'goschool@gmail.com', 'Terimakasih sudah berkunjung ke website kami. Semoga semua usaha anda membuahkan hasil yang sangat luar biasa, karena proses adalah hal terpenting untuk membentuk kesuksesan itu sendiri.', '2023-05-12 03:52:09', '2023-07-31 13:21:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foto_profile_admin`
--

CREATE TABLE `foto_profile_admin` (
  `id` int(11) NOT NULL,
  `gambar` varchar(1000) DEFAULT NULL,
  `no_anggota` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_profile_admin`
--

INSERT INTO `foto_profile_admin` (`id`, `gambar`, `no_anggota`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1683600574_118614049_2712641705729814_2606810650044478568_n.jpg', '20230503042803', '2023-05-09 02:25:38', '2023-05-09 02:49:34', NULL),
(2, '1690984556_profile_naga.png', '20230802131933', '2023-08-02 13:38:10', '2023-08-02 13:55:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foto_profile_guru`
--

CREATE TABLE `foto_profile_guru` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_fasilitas`
--

CREATE TABLE `gambar_fasilitas` (
  `id` int(11) NOT NULL,
  `gambar` varchar(1000) DEFAULT NULL,
  `no_fasilitas` varchar(300) DEFAULT NULL,
  `no_gambar` varchar(300) DEFAULT NULL,
  `grub` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_fasilitas`
--

INSERT INTO `gambar_fasilitas` (`id`, `gambar`, `no_fasilitas`, `no_gambar`, `grub`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, '1689237026_87848176_184275693005662_5290430840255712323_n.jpg', 'FU20230713072935', 'GFU20230713073023', 'UMUM', '2023-07-13 07:30:24', '2023-07-13 08:30:26', NULL),
(18, '1689237114_275621679_483685476551527_493078303229724912_n.jpg', 'FU20230713072935', 'GFU20230713083138', 'UMUM', '2023-07-13 08:31:39', '2023-07-13 08:31:54', NULL),
(19, '1689239960_174265357_370407047587639_1674435448328462617_n.jpg', 'FT20230713083316', 'GFT20230713083330', 'TAMBAHAN', '2023-07-13 08:33:30', '2023-07-13 09:19:20', NULL),
(21, '1689240449_175730215_133426578795180_295716214211358463_n.jpg', 'FT20230713083316', 'GFT20230713092729', 'TAMBAHAN', '2023-07-13 09:27:29', '2023-07-13 09:27:29', NULL),
(22, '1691033113_ruang_kelas.jpg', 'FU20230803031219', 'GFU20230803032513', 'UMUM', '2023-08-03 03:25:13', '2023-08-03 03:25:13', NULL),
(23, '1691033181_ruang_kelas2.jpg', 'FU20230803031219', 'GFU20230803032620', 'UMUM', '2023-08-03 03:26:21', '2023-08-03 03:26:21', NULL),
(24, '1691033250_ruang_kelas3.jpg', 'FU20230803031219', 'GFU20230803032730', 'UMUM', '2023-08-03 03:27:30', '2023-08-03 03:27:30', NULL),
(25, '1691033260_ruang_kelas4.jpg', 'FU20230803031219', 'GFU20230803032740', 'UMUM', '2023-08-03 03:27:40', '2023-08-03 03:27:40', NULL),
(26, '1691033656_tempat_parkir.png', 'FT20230803031352', 'GFT20230803033416', 'TAMBAHAN', '2023-08-03 03:34:16', '2023-08-03 03:34:16', NULL),
(27, '1691033668_tempat_parkir2.jfif', 'FT20230803031352', 'GFT20230803033428', 'TAMBAHAN', '2023-08-03 03:34:28', '2023-08-03 03:34:28', NULL),
(28, '1691033677_tempat_parkir3.jpg', 'FT20230803031352', 'GFT20230803033437', 'TAMBAHAN', '2023-08-03 03:34:37', '2023-08-03 03:34:37', NULL),
(29, '1691033685_tempat_parkir4.jpg', 'FT20230803031352', 'GFT20230803033445', 'TAMBAHAN', '2023-08-03 03:34:45', '2023-08-03 03:34:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gambar_profile_daftar_sekolah`
--

CREATE TABLE `gambar_profile_daftar_sekolah` (
  `id` int(11) NOT NULL,
  `no_gambar_profile` varchar(300) DEFAULT NULL,
  `gambar_profile` varchar(1000) DEFAULT NULL,
  `npsn` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_profile_daftar_sekolah`
--

INSERT INTO `gambar_profile_daftar_sekolah` (`id`, `no_gambar_profile`, `gambar_profile`, `npsn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GPS927346312', '1690285927_237121357_956022788288348_4545272682248400324_n.jpg', '1234567', '2023-07-25 10:41:52', '2023-07-25 11:52:07', NULL),
(2, 'GPS20230802133810', '1691031765_profile_naga.png', '10293884756', '2023-08-02 13:38:10', '2023-08-03 03:02:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grub_daftar_sekolah`
--

CREATE TABLE `grub_daftar_sekolah` (
  `id` int(11) NOT NULL,
  `grub` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grub_daftar_sekolah`
--

INSERT INTO `grub_daftar_sekolah` (`id`, `grub`, `keterangan`, `kode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'T1', 'PAUD', 'P1', '2023-05-04 01:46:20', '2023-05-05 01:24:36', NULL),
(2, 'T2', 'TK', 'P1', '2023-05-04 01:46:42', '2023-05-05 01:24:38', NULL),
(3, 'T3', 'SD', 'P2', '2023-05-04 01:47:19', '2023-05-05 01:24:42', NULL),
(4, 'T4', 'MI', 'P2', '2023-05-04 01:47:36', '2023-05-05 01:24:44', NULL),
(5, 'T5', 'SMP', 'P3', '2023-05-04 01:48:02', '2023-05-05 01:24:53', NULL),
(6, 'T6', 'Mts', 'P3', '2023-05-05 01:22:09', '2023-05-05 01:24:56', NULL),
(7, 'T7', 'SMA', 'P4', '2023-05-05 01:22:15', '2023-05-05 01:24:58', NULL),
(8, 'T8', 'SMK', 'P4', '2023-05-05 01:22:19', '2023-05-05 01:25:00', NULL),
(9, 'T9', 'Universitas', 'P5', '2023-05-05 01:22:23', '2023-05-05 01:25:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grub_status`
--

CREATE TABLE `grub_status` (
  `id` int(11) NOT NULL,
  `grub` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grub_status`
--

INSERT INTO `grub_status` (`id`, `grub`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BELUM DITERIMA', 'belum diterima', '2023-05-31 06:18:38', '2023-05-31 06:18:38', NULL),
(2, 'DITERIMA', 'diterima', '2023-05-31 06:18:56', '2023-05-31 06:18:56', NULL),
(3, 'DIBATALKAN', 'dibatalkan', '2023-05-31 06:19:01', '2023-05-31 06:19:19', NULL),
(4, 'DIKELUARKAN', 'dikeluarkan', '2023-05-31 06:19:58', '2023-05-31 06:20:03', NULL),
(5, 'BERHENTI', 'berhenti', '2023-05-31 06:20:25', '2023-05-31 06:20:25', NULL),
(6, 'RESIGN', 'permintaan berhenti', '2023-06-02 02:41:43', '2023-06-02 02:41:43', NULL),
(7, 'DITOLAK', 'ditolak', '2023-07-31 12:11:01', '2023-07-31 12:11:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `iconsekolah`
--

CREATE TABLE `iconsekolah` (
  `id` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL DEFAULT '',
  `tingkatan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iconsekolah`
--

INSERT INTO `iconsekolah` (`id`, `gambar`, `tingkatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1683530843_paud.png', 'PAUD', '2023-05-12 03:55:40', '2023-05-12 03:57:25', NULL),
(2, '1683702344_tk.png', 'TK', '2023-05-12 03:55:53', '2023-05-12 03:57:27', NULL),
(3, '1683702790_sd.png', 'SD', '2023-05-12 03:56:07', '2023-05-12 03:57:30', NULL),
(4, '1683617728_smp.png', 'SMP', '2023-05-12 03:56:25', '2023-05-12 03:57:32', NULL),
(5, '1683703474_sma.png', 'SMA', '2023-05-12 03:56:53', '2023-05-12 03:57:38', NULL),
(6, '1683617778_smk.png', 'SMK', '2023-05-12 03:57:07', '2023-05-12 03:57:41', NULL),
(7, '1683617827_univer.png', 'UNIVERCITY', '2023-05-12 03:57:16', '2023-05-12 03:57:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id` int(11) NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `mapel` varchar(1000) DEFAULT NULL,
  `jam_mulai` varchar(50) DEFAULT NULL,
  `jam_selesai` varchar(50) DEFAULT NULL,
  `nama_guru` varchar(1000) DEFAULT NULL,
  `no_urut_jadwal` int(11) DEFAULT NULL,
  `no_kelas` varchar(1000) DEFAULT NULL,
  `no_jadwal` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id`, `hari`, `mapel`, `jam_mulai`, `jam_selesai`, `nama_guru`, `no_urut_jadwal`, `no_kelas`, `no_jadwal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(27, 'senin', 'Javascript', '07:00', '07:30', 'Reva Fidela', 1, 'DK20230703061504', 'JK20230703071941', '2023-07-03 07:19:41', '2023-07-03 07:19:41', NULL),
(28, 'senin', 'PHP', '07:00', '07:30', 'Reva Fidela', 1, 'DK20230712041013', 'JK20230712041030', '2023-07-12 04:10:30', '2023-07-12 04:10:30', NULL),
(29, 'selasa', 'Javascript', '07:00', '07:30', 'Reva Fidela', 1, 'DK20230712041013', 'JK20230712041501', '2023-07-12 04:15:01', '2023-07-12 04:15:01', NULL),
(30, 'senin', 'PHP', '07:30', '08:00', 'Reva Fidela', 2, 'DK20230712041013', 'JK20230712042744', '2023-07-12 04:27:44', '2023-07-12 04:27:44', NULL),
(31, 'senin', 'Javascript', '08:00', '08:30', 'Reva Fidela', 3, 'DK20230712041013', 'JK20230712043114', '2023-07-12 04:31:14', '2023-07-12 04:31:14', NULL),
(32, 'selasa', 'Javascript', '07:30', '08:00', 'Reva Fidela', 2, 'DK20230712041013', 'JK20230712043128', '2023-07-12 04:31:28', '2023-07-12 04:31:54', NULL),
(33, 'rabu', 'mtk', '07:00', '07:30', 'Reva Fidela', 1, 'DK20230712041013', 'JK20230712043223', '2023-07-12 04:32:23', '2023-07-12 04:32:23', NULL),
(34, 'rabu', 'PHP', '07:30', '08:00', 'Reva Fidela', 2, 'DK20230712041013', 'JK20230712043249', '2023-07-12 04:32:49', '2023-07-12 04:32:49', NULL),
(35, 'rabu', 'Javascript', '08:00', '08:30', 'Reva Fidela', 3, 'DK20230712041013', 'JK20230712043306', '2023-07-12 04:33:06', '2023-07-12 04:33:06', NULL),
(36, 'kamis', 'Javascript', '07:00', '07:30', 'Reva Fidela', 1, 'DK20230712041013', 'JK20230712043323', '2023-07-12 04:33:23', '2023-07-12 04:33:23', NULL),
(37, 'jumat', 'mtk', '07:00', '07:30', 'Reva Fidela', 1, 'DK20230712041013', 'JK20230712043339', '2023-07-12 04:33:39', '2023-07-12 04:33:39', NULL),
(38, 'jumat', 'PHP', '07:30', '08:00', 'Reva Fidela', 2, 'DK20230712041013', 'JK20230712043403', '2023-07-12 04:34:04', '2023-07-12 04:34:04', NULL),
(39, 'sabtu', 'PHP', '07:00', '07:30', 'Reva Fidela', 1, 'DK20230712041013', 'JK20230712043418', '2023-07-12 04:34:18', '2023-07-12 04:34:18', NULL),
(40, 'sabtu', 'PHP', '07:30', '08:00', 'Reva Fidela', 2, 'DK20230712041013', 'JK20230712043439', '2023-07-12 04:34:39', '2023-07-12 04:34:39', NULL),
(41, 'sabtu', 'mtk', '08:00', '08:30', 'Reva Fidela', 3, 'DK20230712041013', 'JK20230712043500', '2023-07-12 04:35:00', '2023-07-12 04:35:00', NULL),
(42, 'senin', 'Pemrograman Web', '07:00', '07:30', 'Wulan', 1, 'DK20230803034249', 'JK20230803035100', '2023-08-03 03:51:00', '2023-08-03 03:51:00', NULL),
(43, 'selasa', 'Pemrograman Web', '07:00', '07:30', 'Wulan', 1, 'DK20230803034249', 'JK20230803035208', '2023-08-03 03:52:08', '2023-08-03 03:52:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `no_jurusan` varchar(300) DEFAULT NULL,
  `npsn` varchar(100) DEFAULT NULL,
  `nama_jurusan` varchar(1000) DEFAULT NULL,
  `subjek_jurusan` varchar(500) DEFAULT NULL,
  `deskripsi_jurusan` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `no_jurusan`, `npsn`, `nama_jurusan`, `subjek_jurusan`, `deskripsi_jurusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'JRS20230616075046', '1234567', 'KGSP', 'Kontruksi Gedung Sanitasi dan Perawatan (KGSP)', 'Jurusan ini memang lebih condong ke pelaksana/kerja menengah yang biasa disebut Tenaga Menengah Teknik Sipil, dimana proses belajar mengajarkan bagaimana cara menggambar, membangun bangunan, bagian-bagian bangunan, sampai pada struktur bangunan.\r\nUntuk jenjang sarjana, Korea University menawarkan banyak program studi menarik di bidang Business Administration, Liberal Arts, Life Sciences and Biotechnology, Political Science and Economics, Science, Engineering, Medicine, Education, Nursing, dan masih banyak lagi.', '2023-06-16 07:50:46', '2023-06-16 07:50:46', NULL),
(7, 'JRS20230616083018', '1234567', 'RPL', 'RPL adalah sebuah jurusan yang mempelajari dan mendalami semua cara-cara pengembangan perangkat lunak.', 'Pelajaran apa saja di jurusan RPL? 1. Coding. Pemograman Bahasa Pascal. 2. Desain. - Photoshop – Corel Draw – Video Editing – Web Design – Dan masih banyak lagi. 3. Algoritma. – Algoritma Dasar – Algoritma tingkat Lanjut – Microsoft Access – Gerbang Logika – Basis Data – DFD (Data Flow Diagram) – Dan masih banyak lagi. Selamat datang di SOFTWARE ENGGINERING.', '2023-06-16 08:30:18', '2023-06-16 08:30:18', NULL),
(8, 'JRS20230616083242', '1234567', 'AKL', 'Akuntansi dan Keuangan Lembaga', 'Apa Itu Jurusan Akuntansi dan Keuangan Lembaga ? Akuntansi dan Keuangan Lembaga adalah jurusan yang mempelajari tentang membuat laporan keuangan baik untuk perusahaan ataupun lembaga pemerintah. Akuntansi dan Keuangan Lembaga merupakan suatu jurusan yang mengaharuskan siswa untuk teliti dan kuat dalam berhitung.', '2023-06-16 08:32:42', '2023-06-16 08:32:42', NULL),
(9, 'JRS20230802140405', '10293884756', 'RPL', 'Rekayasa Perangkat Lunak', 'Rekayasa Perangkat Lunak adalah jurusan yang mempelajari tentang perangkat lunak pada komputer seperti segala jenis desain, web Developer, game Developer, dan juga mempelajari tentang instalasi jaringan termasuk memahami harwere komputer.', '2023-08-02 14:04:05', '2023-08-02 14:04:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `urutan` int(100) DEFAULT NULL,
  `no_kelas` varchar(300) DEFAULT NULL,
  `no_jurusan` varchar(300) DEFAULT NULL,
  `npsn` varchar(300) DEFAULT NULL,
  `tingkat` varchar(300) DEFAULT NULL,
  `abjad` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `urutan`, `no_kelas`, `no_jurusan`, `npsn`, `tingkat`, `abjad`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 10, 'KLS20230616075639', 'JRS20230616075046', '1234567', 'X', 'A', '2023-06-16 07:56:39', '2023-06-16 08:38:14', NULL),
(20, 11, 'KLS20230616075650', 'JRS20230616075046', '1234567', 'XI', 'A', '2023-06-16 07:56:50', '2023-06-16 08:39:39', NULL),
(21, 12, 'KLS20230616075720', 'JRS20230616075046', '1234567', 'XII', 'B', '2023-06-16 07:57:21', '2023-06-16 08:47:17', NULL),
(22, 10, 'KLS20230616075735', 'JRS20230616075046', '1234567', 'X', 'C', '2023-06-16 07:57:35', '2023-06-16 08:39:19', NULL),
(23, 10, 'KLS20230616075746', 'JRS20230616075046', '1234567', 'X', 'B', '2023-06-16 07:57:46', '2023-06-16 08:38:38', NULL),
(24, 11, 'KLS20230616075802', 'JRS20230616075046', '1234567', 'XI', 'B', '2023-06-16 07:58:02', '2023-06-16 08:46:18', NULL),
(25, 11, 'KLS20230616075838', 'JRS20230616075046', '1234567', 'XI', 'C', '2023-06-16 07:58:38', '2023-06-16 08:46:26', NULL),
(26, 12, 'KLS20230616075852', 'JRS20230616083018', '1234567', 'XII', 'A', '2023-06-16 07:58:52', '2023-06-16 08:44:22', NULL),
(27, 12, 'KLS20230616075904', 'JRS20230616075046', '1234567', 'XII', 'C', '2023-06-16 07:59:04', '2023-06-16 08:47:27', NULL),
(28, 10, 'KLS20230616083357', 'JRS20230616083018', '1234567', 'X', 'A', '2023-06-16 08:33:57', '2023-06-16 08:38:23', NULL),
(29, 10, 'KLS20230616083407', 'JRS20230616083242', '1234567', 'X', 'A', '2023-06-16 08:34:07', '2023-06-16 08:38:31', NULL),
(30, 10, 'KLS20230616083423', 'JRS20230616083018', '1234567', 'X', 'B', '2023-06-16 08:34:23', '2023-06-16 08:38:47', NULL),
(31, 10, 'KLS20230616083432', 'JRS20230616083242', '1234567', 'X', 'B', '2023-06-16 08:34:32', '2023-06-16 08:38:58', NULL),
(32, 10, 'KLS20230616083444', 'JRS20230616083018', '1234567', 'X', 'C', '2023-06-16 08:34:44', '2023-06-16 08:39:25', NULL),
(33, 10, 'KLS20230616083456', 'JRS20230616083242', '1234567', 'X', 'C', '2023-06-16 08:34:56', '2023-06-16 08:39:31', NULL),
(34, 11, 'KLS20230616083517', 'JRS20230616083018', '1234567', 'XI', 'A', '2023-06-16 08:35:17', '2023-06-16 08:39:46', NULL),
(35, 11, 'KLS20230616083526', 'JRS20230616083242', '1234567', 'XI', 'A', '2023-06-16 08:35:26', '2023-06-16 08:39:54', NULL),
(36, 11, 'KLS20230616083534', 'JRS20230616083018', '1234567', 'XI', 'B', '2023-06-16 08:35:34', '2023-06-16 08:46:39', NULL),
(37, 11, 'KLS20230616083540', 'JRS20230616083242', '1234567', 'XI', 'B', '2023-06-16 08:35:40', '2023-06-16 08:46:56', NULL),
(38, 11, 'KLS20230616083550', 'JRS20230616083018', '1234567', 'XI', 'C', '2023-06-16 08:35:50', '2023-06-16 08:46:46', NULL),
(39, 11, 'KLS20230616083558', 'JRS20230616083242', '1234567', 'XI', 'C', '2023-06-16 08:35:58', '2023-06-16 08:47:03', NULL),
(40, 12, 'KLS20230616083610', 'JRS20230616083242', '1234567', 'XII', 'A', '2023-06-16 08:36:10', '2023-06-16 08:47:55', NULL),
(41, 12, 'KLS20230616083620', 'JRS20230616075046', '1234567', 'XII', 'A', '2023-06-16 08:36:20', '2023-06-16 08:43:19', NULL),
(42, 12, 'KLS20230616083643', 'JRS20230616083018', '1234567', 'XII', 'B', '2023-06-16 08:36:43', '2023-06-16 08:47:38', NULL),
(43, 12, 'KLS20230616083651', 'JRS20230616083242', '1234567', 'XII', 'B', '2023-06-16 08:36:51', '2023-06-16 08:48:04', NULL),
(44, 12, 'KLS20230616083659', 'JRS20230616083018', '1234567', 'XII', 'C', '2023-06-16 08:36:59', '2023-06-16 08:47:46', NULL),
(45, 12, 'KLS20230616083707', 'JRS20230616083242', '1234567', 'XII', 'C', '2023-06-16 08:37:07', '2023-06-16 08:48:11', NULL),
(46, 12, 'KLS20230803014144', 'JRS20230802140405', '10293884756', 'XII', 'A', '2023-08-03 01:41:44', '2023-08-03 01:53:51', NULL),
(47, 12, 'KLS20230803014553', '', '10293884756', 'XII', 'B', '2023-08-03 01:45:53', '2023-08-03 01:45:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `npsn` varchar(300) DEFAULT NULL,
  `no_mapel` varchar(300) DEFAULT NULL,
  `no_guru_mapel` varchar(300) DEFAULT NULL,
  `no_akreditasi` varchar(300) DEFAULT NULL,
  `nama_mapel` varchar(300) DEFAULT NULL,
  `subjek_mapel` varchar(500) DEFAULT NULL,
  `deskripsi_mapel` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `npsn`, `no_mapel`, `no_guru_mapel`, `no_akreditasi`, `nama_mapel`, `subjek_mapel`, `deskripsi_mapel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1234567', 'NMS20230626082956', '20230503042803', 'AKS20230704071730', 'PHP', 'Hypertext Preprocessor', 'PHP (Hypertext Preprocessor) adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML. PHP banyak dipakai untuk memrogram situs web dinamis. PHP dapat digunakan untuk membangun sebuah CMS. Pada awalnya PHP merupakan kependekan dari Personal Home Page (Situs personal).', '2023-06-26 08:29:56', '2023-07-07 07:52:02', NULL),
(3, '1234567', 'NMS20230627035144', '20230503042803', '', 'Javascript', 'js', 'javascript', '2023-06-27 03:51:45', '2023-07-05 08:12:38', NULL),
(4, '1234567', 'NMS20230704082652', '20230503042803', 'AKS20230704071730', 'mtk', 'matematika', 'matematika', '2023-07-04 08:26:52', '2023-07-05 08:12:50', NULL),
(6, '10293884756', 'NMS20230803022735', '20230803020957', 'AKS20230803023641', 'Pemrograman Web', 'Pemrograman website', 'Pemgrograman website mengajarkan kita untuk membuat sebuah website.', '2023-08-03 02:27:35', '2023-08-03 02:43:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id` int(11) NOT NULL,
  `no_jurusan` varchar(300) DEFAULT NULL,
  `tingkat_kelas` varchar(50) DEFAULT NULL,
  `abjad_kelas` varchar(50) DEFAULT NULL,
  `no_siswa` varchar(300) DEFAULT NULL,
  `no_guru` varchar(300) DEFAULT NULL,
  `no_mapel` varchar(300) DEFAULT NULL,
  `nilai_absen` int(100) DEFAULT NULL,
  `nilai_tugas` int(100) DEFAULT NULL,
  `nilai_kuis` int(100) DEFAULT NULL,
  `tahun_ajaran` varchar(100) DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `nilai_uts` int(100) DEFAULT NULL,
  `nilai_uas` int(100) DEFAULT NULL,
  `nilai_huruf` varchar(50) DEFAULT NULL,
  `rata_rata` int(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `no_jurusan`, `tingkat_kelas`, `abjad_kelas`, `no_siswa`, `no_guru`, `no_mapel`, `nilai_absen`, `nilai_tugas`, `nilai_kuis`, `tahun_ajaran`, `semester`, `nilai_uts`, `nilai_uas`, `nilai_huruf`, `rata_rata`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'JRS20230616083018', 'X', 'B', 'SS20230619023246', '20230503042803', 'NMS20230626082956', 90, 89, 98, '2023 / 2024', '1', 99, 97, 'A', 95, 'Lulus', '2023-07-08 02:33:28', '2023-07-08 02:33:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('rafliamad620@gmail.com', '$2y$10$eLLt.5cEJBNLZlac1rIPBOA5O6a7TtpuLBZLqRpZaicIGojYezyAS', '2023-04-04 19:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `pas_foto_guru`
--

CREATE TABLE `pas_foto_guru` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(300) DEFAULT NULL,
  `gambar` varchar(10000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pas_foto_guru`
--

INSERT INTO `pas_foto_guru` (`id`, `no_anggota`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20230503042803', '1685670642_347830670_937100900967224_4290347692540079221_n.jpg', '2023-06-02 01:50:42', '2023-06-02 01:50:42', NULL),
(2, '20230803020957', '1691028795_347830670_937100900967224_4290347692540079221_n.jpg', '2023-08-03 02:13:15', '2023-08-03 02:13:15', NULL),
(3, '20230820144250', '1692543682_IMG-20221107-WA0027.jpg', '2023-08-20 15:01:23', '2023-08-20 15:01:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pas_foto_siswa`
--

CREATE TABLE `pas_foto_siswa` (
  `id` int(11) NOT NULL,
  `no_siswa` varchar(300) DEFAULT NULL,
  `no_foto` varchar(300) DEFAULT NULL,
  `gambar_siswa` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pas_foto_siswa`
--

INSERT INTO `pas_foto_siswa` (`id`, `no_siswa`, `no_foto`, `gambar_siswa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'SS20230619023246', 'FS20230619023246', '1687141966_347830670_937100900967224_4290347692540079221_n.jpg', '2023-06-19 02:32:46', '2023-06-19 02:32:46', NULL),
(11, 'SS20230619071133', 'FS20230619071133', '1687158693_330670545_726454015603052_6291136562212619551_n.jpg', '2023-06-19 07:11:33', '2023-06-19 07:11:33', NULL),
(12, 'SS20230816043857', 'FS20230816043857', '1692160737_IMG-20221107-WA0034.jpg', '2023-08-16 04:38:57', '2023-08-16 04:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `no_anggota` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `alamat` longtext,
  `user` varchar(100) DEFAULT NULL,
  `gambar` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama`, `nisn`, `no_anggota`, `tempat_lahir`, `tanggal_lahir`, `status`, `email`, `alamat`, `user`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Adel Pantjoro', '0101010', '20230503042803', 'Trenggalek', '2005-12-14', 'Admin', 'rafliamad620@gmail.com', 'Rt 10, Rw 04, Desa Sidomulyo, Kec Pule, Kab Trenggalek, Jawa Timur, Indonesia', 'sekolah', '1683172620_296101167_496147515649581_7139405712386654485_n.jpg', '2023-05-03 04:28:03', '2023-05-04 03:57:00', NULL),
(6, 'Reva Fidela Adel Pantjoro', '202020', '20230503050956', 'Trenggalek', '2006-07-14', 'Admin', 'adelpantjoro@gmail.com', 'Bima Sakti', 'Rafly', '1683090596_81860937_1202841136574694_531467967873140224_n.jpg', '2023-05-03 05:09:56', '2023-05-03 06:02:52', NULL),
(7, 'Dedel', '303030', '20230503051303', 'Trenggalek', '2006-07-14', 'Guru', 'dedel@gmail.com', 'Bima Sakti', 'dedel', '1683090783_80047162_469858087243150_5661188546762073575_n.jpg', '2023-05-03 05:13:03', '2023-05-27 06:39:49', NULL),
(8, 'Murid', '02002020', '20230602081152', 'Malang', '2005-12-14', 'Siswa', 'akuadalahmurid@gmail.com', 'Bumi', 'Murid', '1685693512_245120390_119303917164216_5848657362388498672_n.jpg', '2023-06-02 08:11:52', '2023-06-02 08:11:52', NULL),
(10, 'SMK NAGA', '09090909', '20230802131933', 'Jakarta', '2000-08-17', 'Admin', 'smknaga@gmail.com', 'Rt 5, Rw 2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta, 10110', 'Admin SMK NAGA', '1690982373_logo_naga.jpg', '2023-08-02 13:19:33', '2023-08-02 13:20:17', NULL),
(12, 'Wulan', '9090999', '20230803020957', 'Trenggalek', '2023-08-03', 'Guru', 'wulan@gmail.com', 'Trengalek', 'Wulan', '1691028597_347830670_937100900967224_4290347692540079221_n.jpg', '2023-08-03 02:09:57', '2023-08-03 02:09:57', NULL),
(18, 'Rafly Nur Ihvandi', '07070707', '20230803042921', 'Trenggalek', '2005-12-14', 'Siswa', 'raflyfidela@gmail.com', 'Rt 10, Rw 04, Desa Sidomulyo, Kec Pule, Kab Trenggalek, Indonesia', 'Rafly Nur Ihvandi', '1691036961_foto 3x4 RaflyNurIhvandi.png', '2023-08-03 04:29:21', '2023-08-03 04:29:21', NULL),
(21, 'Reza', '09090909', '20230820144250', 'Trenggalek', '2000-07-20', 'Guru', 'reza01@gmail.com', 'Tanggaran, Desa Pule, Kabupaten Trenggalek, Jawa Timur, Indonesia', 'Reza', '1692542571_IMG-20221107-WA0027.jpg', '2023-08-20 14:42:51', '2023-08-20 14:42:51', NULL),
(22, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sindu', NULL, '2023-08-23 02:10:33', '2023-08-23 02:10:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_admin`
--

CREATE TABLE `profile_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_anggota` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(25) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `alamat` longtext,
  `npsn` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_admin`
--

INSERT INTO `profile_admin` (`id`, `nama`, `no_anggota`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `email`, `alamat`, `npsn`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Rafly Nur Ihvandi', '20230503042803', 'Trenggalek', '2005-12-14', '082121212', 'rafliamad620@gmail.com', 'Rt 10, Rw 04, Desa Sidomulyo, Kec Pule, Kab Trenggalek, Jawa Timur, Indonesia', '1234567', 'sekolah', '2023-05-09 02:25:38', '2023-08-02 02:09:50', NULL),
(5, 'SMK NAGA', '20230802131933', 'Jakarta', '2000-08-17', '082290098008', 'smknaga@gmail.com', 'Rt 5, Rw 2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta, 10110', '10293884756', 'Admin SMK NAGA', '2023-08-02 13:38:10', '2023-08-03 02:25:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_guru`
--

CREATE TABLE `profile_guru` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(300) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `alamat` longtext,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `umur` int(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `keahlian` varchar(300) DEFAULT NULL,
  `deskripsi` longtext,
  `user` varchar(100) DEFAULT NULL,
  `nama_sekolah` varchar(500) DEFAULT NULL,
  `npsn` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_guru`
--

INSERT INTO `profile_guru` (`id`, `no_anggota`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `email`, `umur`, `genre`, `keahlian`, `deskripsi`, `user`, `nama_sekolah`, `npsn`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20230503042803', 'Reva Fidela', 'Rt 10, Rw 04, Desa Sidomulyo, Kec Pule, kab Trenggalek, Jawa Timur, Indonesia', 'Trenggalek', '2006-07-14', '08212121212', 'dedel@gmail.com', 17, 'Perempuan', 'Teater', 'Seperti kucing yang kalem, tetapi selalu memikat hati kamu', 'dedel', 'SMKN 2 Trenggalek', '1234567', 'BELUM DITERIMA', '2023-06-02 01:50:42', '2023-07-31 12:12:01', NULL),
(2, '20230803020957', 'Wulan', 'Trenggalek', 'Trenggalek', '2023-08-03', '08323434627', 'wulan@gmail.com', 17, 'Perempuan', 'Coding', 'Saya bisa Coidng', 'Wulan', 'SMK NAGA', '10293884756', 'DITERIMA', '2023-08-03 02:13:14', '2023-08-03 02:25:47', NULL),
(4, '20230820144250', 'Reza', 'Tanggaran, Desa Pule, Kabupaten Trenggalek, Jawa Timur, Indonesia', 'Trenggalek', '2000-07-21', '0854266253736', 'reza01@gmail.com', 24, 'Laki-Laki', 'Syber Scurity', 'Saya adalah seorang Syber Scurity yang sangat handal dalam masalah keamanan sebuah situs.', 'Reza', 'SMK NAGA', '10293884756', 'DITERIMA', '2023-08-20 15:01:22', '2023-08-20 15:10:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_siswa`
--

CREATE TABLE `profile_siswa` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(300) DEFAULT NULL,
  `nama_siswa` varchar(300) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nisn` varchar(100) DEFAULT NULL,
  `user` varchar(300) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `umur` int(10) DEFAULT NULL,
  `genre` varchar(25) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `deskripsi` longtext,
  `alamat` longtext,
  `npsn` varchar(100) DEFAULT NULL,
  `nama_sekolah` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_siswa`
--

INSERT INTO `profile_siswa` (`id`, `no_anggota`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `user`, `no_hp`, `email`, `umur`, `genre`, `status`, `deskripsi`, `alamat`, `npsn`, `nama_sekolah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '20230602081152', 'Reva Fidela', 'Trenggalek', '2006-07-14', '202020', 'Murid', '08212121212', 'akuadalahmurid@gmail.com', 17, 'Perempuan', NULL, 'kucing kalem', 'bumi', NULL, NULL, '2023-06-03 07:10:55', '2023-06-03 07:10:55', NULL),
(7, '20230803042921', 'Rafly Nur Ihvandi', 'Trenggalek', '2005-12-14', '07070707', 'Rafly Nur Ihvandi', '08323434627', 'raflyfidela@gmail.com', 17, 'Laki-laki', NULL, 'Aku sangat ingin masuk di sekolah SMK NAGA, sekolah ini adalah sekolah impianku', 'Rt 10, Rw 04, Desa Sidomulyo, Kec Pule, Kab Trenggalek, Jawa Timur, Indonesia', NULL, NULL, '2023-08-03 04:45:26', '2023-08-03 04:45:26', NULL),
(8, '20230820144250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-20 14:42:51', '2023-08-20 14:42:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_guru`
--

CREATE TABLE `status_guru` (
  `id` int(11) NOT NULL,
  `no_status` varchar(100) DEFAULT NULL,
  `no_anggota` varchar(1000) DEFAULT NULL,
  `status_guru` varchar(100) DEFAULT NULL,
  `alasan` longtext,
  `user` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_guru`
--

INSERT INTO `status_guru` (`id`, `no_status`, `no_anggota`, `status_guru`, `alasan`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'ST20230531080456', '20230503042803', 'DIBATALKAN', 'aku batalkan', 'dedel', '2023-05-31 08:04:56', '2023-05-31 08:49:29', NULL),
(8, 'ST20230531085227', '20230503042803', 'DIBATALKAN', 'saya batalkan', 'dedel', '2023-05-31 08:52:27', '2023-05-31 09:10:01', NULL),
(9, 'ST20230531091319', '20230503042803', 'DIBATALKAN', 'saya batalkan karena terlalu lama tidak dikonfirmasi', 'dedel', '2023-05-31 09:13:19', '2023-05-31 09:13:49', NULL),
(10, 'ST20230602015041', '20230503042803', 'DITERIMA', '', 'dedel', '2023-06-02 01:50:42', '2023-06-02 03:14:55', NULL),
(11, 'ST20230803021314', '20230803020957', 'BELUM DITERIMA', NULL, 'Wulan', '2023-08-03 02:13:15', '2023-08-03 02:13:15', NULL),
(12, 'ST20230820150122', '20230820144250', 'BELUM DITERIMA', NULL, 'Reza', '2023-08-20 15:01:23', '2023-08-20 15:01:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `nama` varchar(1000) DEFAULT NULL,
  `kode_team` varchar(1000) DEFAULT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `gambar` varchar(10000) DEFAULT NULL,
  `twitter` varchar(1000) DEFAULT NULL,
  `facebook` varchar(1000) DEFAULT NULL,
  `instagram` varchar(1000) DEFAULT NULL,
  `whatsapp` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `nama`, `kode_team`, `deskripsi`, `gambar`, `twitter`, `facebook`, `instagram`, `whatsapp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rafly Nur Ihvandi', '20230731124916', 'Saya adalah ketua dari Developer website ini. Saya berterimakasih karena sudah mempercayai website kami untuk aktivasi pendaftaran sekolah mulai dari pendaftaran Sekolah, Guru, Siswa. Dan kami sanget berterimakasih kepada semua orang yang sudah mensuport kami mulai dari pembuatan serta pengembangan website ini, semoga semua bisa menjadikan kesuksesan bagi siapapun.', '1690807756_foto 3x4 RaflyNurIhvandi.png', '#', 'https://www.facebook.com/rafly.nurihvandi.1?mibextid=ZbWKwL', 'https://www.instagram.com/raflynurihvandi/', 'https://wa.me/qr/EAEYJE7VO6FLA1', '2023-04-12 08:04:51', '2023-07-31 12:49:16', NULL),
(2, 'Reza Dwi Nurcahyo', '20230731125323', 'Saya adalah anggota Developer dari pembuatan website ini. Terimakasih untuk semua partisipasi yang kalian berikan untuk kami, karena tanpa kalian website ini bukan apa-apa. Saya ucapkan lagi Terimakasih Banyak.', '1690808003_foto 3x4 reza.png', '#', 'https://www.facebook.com/reza.d.nurcahyo.3?mibextid=ZbWKwL', 'https://www.instagram.com/rezadwinurcahyo/', 'https://wa.me/qr/EAEYJE7VO6FLA1', '2023-07-31 12:37:18', '2023-07-31 12:53:23', NULL),
(3, 'Zahwa Oktafiela Rasyid', '20230731125808', 'Saya adalah anggota Developer website ini. Terimakasih sudah bergabung bersama kami, dengan bergabungnya anda sama dengan anda sudah membantu kami untuk mensukseskan website ini, Terimakasih.', '1690808288_foto 3x4 ZahwaOktafielaRasyid.png', '#', 'https://www.facebook.com/zahwa.o.rasyid?mibextid=ZbWKwL', 'https://www.instagram.com/kella_fox/', 'https://wa.me/qr/EAEYJE7VO6FLA1', '2023-07-31 12:58:08', '2023-07-31 12:58:08', NULL),
(4, 'Putri Riyatun Zulkiana', '20230731130233', 'Saya adalah anggota Developer website ini. Terimakaih banyak atas partisipasinya untuk pengembangan website ini, dan semoga semua bisa berjalan dengan lancar, Terimakasih.', '1690808553_WhatsApp Image 2022-08-30 at 09.36.50.jpeg', '#', 'https://www.facebook.com/ptrzlkna.ptrzlkna?mibextid=ZbWKwL', 'https://instagram.com/zzia.xna?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D', 'https://wa.me/qr/EAEYJE7VO6FLA1', '2023-07-31 13:02:33', '2023-07-31 13:02:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'sekolah', 'sekolah01@gmail.com', NULL, '$2y$10$vFfzYIhBS3bGQ0FNesz9ZeM67jqDlm3zqxgb9B3k.0PR7MeykXtDK', 'N1VVG7u3n7y3dytEsNuPMeLaL4T2HCxSYjnC3SZN6gKTSq8kEtkCLuRZ0ijp', '2023-05-01 21:23:00', '2023-05-01 21:23:00'),
(6, 'Rafly', 'rafliamad620@gmail.com', NULL, '$2y$10$257OOhLpkQjSa08l8/KJI.JcXsDEhogVMIty8kx0Mw2R9qxgHf.E2', 'ljDh2NW6rR4I7U9K0X0zFu56tl1ZqxM05tuph4F3QOGTA19I3Mw1kL2WDRkF', '2023-05-02 20:27:28', '2023-05-02 20:27:28'),
(7, 'dedel', 'dedel@gmail.com', NULL, '$2y$10$lopvK8NmsMTr.E19zyh2TuR/IxGcwiawC0qMSx8BHHVt6jDye4epG', '6gCZqEu2Z84r7RTJjHaqv4PG4zpDbs1FgO53gXquN9jbWWevUsVLPULeTyu6', '2023-05-02 22:12:24', '2023-05-02 22:12:24'),
(8, 'tes', 'tes@gmail.com', NULL, '$2y$10$.0AqiEF9/g0oplxpMNDRdevHobjEgDVc7YMxVeBCvId7Tnnd0XHAm', NULL, '2023-05-10 02:06:33', '2023-05-10 02:06:33'),
(9, 'Murid', 'akuadalahmurid@gmail.com', NULL, '$2y$10$rK4k9A5jIcRozjUYBLZmOO7z6x2SmxUOBdGKzgl7N2oRnvlGJv8vW', 'MgOizyBVOh7OzydgSCEnsVmMqJ1pd36LCqSso5lpd9iTaX3L2UU3S6uziFqo', '2023-06-02 01:00:43', '2023-06-02 01:00:43'),
(10, 'Admin SMK NAGA', 'smknaga@gmail.com', NULL, '$2y$10$KaKxc.RWoLXrzekpbdO4EOgMLzrZW/5DY5vHZCWVP94ZJaxgqBNx6', 'w88v7kyKgOuXTyJiiZGL19AFbamnYWK3PLim1PdBq2WYCssXqlK0qx2O3Ese', '2023-08-01 19:06:38', '2023-08-01 19:06:38'),
(11, 'Wulan', 'wulan@gmail.com', NULL, '$2y$10$RrmcjuBI1Lpj3yeCkFDbfOsLJN6MfeY7RgxfFx5Wysa8QXsEykhe.', 'GvjpSZ2I8iftQZKdqIfPZmfarPtRIw0ioSmH1ba9t9uuE0IyZEMG4lp0RE0M', '2023-08-02 19:08:05', '2023-08-02 19:08:05'),
(14, 'Rafly Nur Ihvandi', 'raflyfidela@gmail.com', NULL, '$2y$10$SdOTdOlRiJ7dnNuD2dO.nOBZom5NkfNmHs2KYa5R3EOGQNaC4GLQS', 'SSoYkCHXGHwvtM2GIZc9LmFGDtgZLgMqo8biEEahIGmRjJw1ROpR6mbKhNTF', '2023-08-02 21:01:59', '2023-08-02 21:01:59'),
(16, 'Reza', 'reza01@gmail.com', NULL, '$2y$10$kWFZwreBoL4CMrUBI46xQOK57KKt0VuAU6hnOXXfDjB.oN1Zm.jn2', 'klVUOREYYxOYtbaGy0gSDvMZ4Wsyu6FQezgFNgG7rISIED1tIOyRzQAUF8f8', '2023-08-20 07:26:16', '2023-08-20 07:26:16'),
(17, 'Sindu', 'sindu@gmail.com', NULL, '$2y$10$OJXoRR4nA3XgfUGmn3oR4.JxykutTZAlHU4c2Q9mV64U54D9.5EZ6', NULL, '2023-08-22 18:49:33', '2023-08-22 18:49:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akreditasi`
--
ALTER TABLE `akreditasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alamat_siswa`
--
ALTER TABLE `alamat_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alamat_wali_siswa`
--
ALTER TABLE `alamat_wali_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berkas_pendaftaran_siswa`
--
ALTER TABLE `berkas_pendaftaran_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_guru`
--
ALTER TABLE `cv_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_pembagian_siswa`
--
ALTER TABLE `daftar_pembagian_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_sekolah`
--
ALTER TABLE `daftar_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_siswa`
--
ALTER TABLE `daftar_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_wali_siswa`
--
ALTER TABLE `daftar_wali_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entertiment_guru`
--
ALTER TABLE `entertiment_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas_tambahan`
--
ALTER TABLE `fasilitas_tambahan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `file_siswa`
--
ALTER TABLE `file_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foter1`
--
ALTER TABLE `foter1`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `fotersekolah`
--
ALTER TABLE `fotersekolah`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `foto_profile_admin`
--
ALTER TABLE `foto_profile_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_profile_guru`
--
ALTER TABLE `foto_profile_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar_fasilitas`
--
ALTER TABLE `gambar_fasilitas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `gambar_profile_daftar_sekolah`
--
ALTER TABLE `gambar_profile_daftar_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grub_daftar_sekolah`
--
ALTER TABLE `grub_daftar_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grub_status`
--
ALTER TABLE `grub_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iconsekolah`
--
ALTER TABLE `iconsekolah`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pas_foto_guru`
--
ALTER TABLE `pas_foto_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pas_foto_siswa`
--
ALTER TABLE `pas_foto_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_admin`
--
ALTER TABLE `profile_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_guru`
--
ALTER TABLE `profile_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_siswa`
--
ALTER TABLE `profile_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_guru`
--
ALTER TABLE `status_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `akreditasi`
--
ALTER TABLE `akreditasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `alamat_siswa`
--
ALTER TABLE `alamat_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `alamat_wali_siswa`
--
ALTER TABLE `alamat_wali_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `berkas_pendaftaran_siswa`
--
ALTER TABLE `berkas_pendaftaran_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cv_guru`
--
ALTER TABLE `cv_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `daftar_pembagian_siswa`
--
ALTER TABLE `daftar_pembagian_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_sekolah`
--
ALTER TABLE `daftar_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftar_siswa`
--
ALTER TABLE `daftar_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `daftar_wali_siswa`
--
ALTER TABLE `daftar_wali_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `entertiment_guru`
--
ALTER TABLE `entertiment_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas_tambahan`
--
ALTER TABLE `fasilitas_tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `file_siswa`
--
ALTER TABLE `file_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foter1`
--
ALTER TABLE `foter1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fotersekolah`
--
ALTER TABLE `fotersekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foto_profile_admin`
--
ALTER TABLE `foto_profile_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foto_profile_guru`
--
ALTER TABLE `foto_profile_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar_fasilitas`
--
ALTER TABLE `gambar_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gambar_profile_daftar_sekolah`
--
ALTER TABLE `gambar_profile_daftar_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grub_daftar_sekolah`
--
ALTER TABLE `grub_daftar_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grub_status`
--
ALTER TABLE `grub_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `iconsekolah`
--
ALTER TABLE `iconsekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pas_foto_guru`
--
ALTER TABLE `pas_foto_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pas_foto_siswa`
--
ALTER TABLE `pas_foto_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `profile_admin`
--
ALTER TABLE `profile_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile_guru`
--
ALTER TABLE `profile_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_siswa`
--
ALTER TABLE `profile_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_guru`
--
ALTER TABLE `status_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
