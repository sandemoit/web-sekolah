-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2024 at 11:19 PM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smanklue_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cookie` varchar(100) NOT NULL,
  `level` varchar(40) DEFAULT NULL,
  `photo_profile` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `cookie`, `level`, `photo_profile`, `email`, `nama`) VALUES
(1, 'admin', '$2y$10$mHlZ9AFZ/iacrdP3eTzh/ussYDNARlOk13sg3JpLT3a3Ob.p2RKWu', 'jVVei3128F6bfusLMDAJrdm2gHFoNlkOP4Mr5OvYWsmBjq6Wh8tGcQyaZSUpEBQT', 'admin', '58a65bcb757e557b7f641dc01e486bb1.png', NULL, 'Brilliant'),
(12, 'heruadmin', '$2y$10$mKtVSyEdL7DwafTTSe2aA.gX8D8bMhQ5/29/SqNDbhRUkgW9af/hS', '', 'admin', 'default.png', NULL, 'Heru'),
(13, 'operator', '$2y$10$YmOuYtvdOp4TFmb7vFSPUunmtdu6uJVwzZnWbory9AZ6jhB3FGOl6', '', 'operator', 'default.png', NULL, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `view_count` int(11) DEFAULT 0,
  `excerpt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `user`, `judul`, `slug`, `isi`, `waktu`, `foto`, `view_count`, `excerpt`) VALUES
(4, 1, 'Voluptate quam vel b', 'voluptate-quam-vel-b-2', '<p>Selama bertahun-tahun, manusia telah menciptakan berbagai karya seni yang terinspirasi oleh keindahan alam dan budaya dunia. Karya seni wisata adalah hasil ekspresi kreatif yang berfungsi sebagai medium untuk mengabadikan pengalaman perjalanan, menciptakan kesan mendalam, dan membagikan keindahan dunia kepada orang lain. Dalam materi ini, kita akan menjelajahi berbagai jenis karya seni wisata dan mengapa mereka begitu penting dalam dunia perjalanan.</p><p>Selama bertahun-tahun, manusia telah menciptakan berbagai karya seni yang terinspirasi oleh keindahan alam dan budaya dunia. Karya seni wisata adalah hasil ekspresi kreatif yang berfungsi sebagai medium untuk mengabadikan pengalaman perjalanan, menciptakan kesan mendalam, dan membagikan keindahan dunia kepada orang lain. Dalam materi ini, kita akan menjelajahi berbagai jenis karya seni wisata dan mengapa mereka begitu penting dalam dunia perjalanan.<br></p>', '2023-09-20 10:05:00', 'a10d4e41dc20140387244b68236bd67b.png', 50, 'Selama bertahun-tahun, manusia telah menciptakan berbagai karya seni yang terinspirasi oleh keindahan alam dan budaya dunia. Karya seni wisata adalah hasil ekspresi kreatif yang berfungsi sebagai medium untuk mengabadikan pengalaman perjalanan, menciptakan kesan mendalam, dan membagikan keindahan dunia kepada orang lain. Dalam materi ini, kita akan menjelajahi berbagai jenis karya seni wisata dan mengapa mereka begitu penting dalam dunia perjalanan.'),
(5, 1, 'KARYA WISATA', 'karya-wisata-2', '<p>Selama bertahun-tahun, manusia telah menciptakan berbagai karya seni yang terinspirasi oleh keindahan alam dan budaya dunia. Karya seni wisata adalah hasil ekspresi kreatif yang berfungsi sebagai medium untuk mengabadikan pengalaman perjalanan, menciptakan kesan mendalam, dan membagikan keindahan dunia kepada orang lain. Dalam materi ini, kita akan menjelajahi berbagai jenis karya seni wisata dan mengapa mereka begitu penting dalam dunia perjalanan.</p><p>Selama bertahun-tahun, manusia telah menciptakan berbagai karya seni yang terinspirasi oleh keindahan alam dan budaya dunia. Karya seni wisata adalah hasil ekspresi kreatif yang berfungsi sebagai medium untuk mengabadikan pengalaman perjalanan, menciptakan kesan mendalam, dan membagikan keindahan dunia kepada orang lain. Dalam materi ini, kita akan menjelajahi berbagai jenis karya seni wisata dan mengapa mereka begitu penting dalam dunia perjalanan.<br></p>', '2023-09-20 10:04:41', 'f850c70f40b93007f88563d3b7333e4f.jpg', 33, 'Selama bertahun-tahun, manusia telah menciptakan berbagai karya seni yang terinspirasi oleh keindahan alam dan budaya dunia. Karya seni wisata adalah hasil ekspresi kreatif yang berfungsi sebagai medium untuk mengabadikan pengalaman perjalanan, menciptakan kesan mendalam, dan membagikan keindahan dunia kepada orang lain. Dalam materi ini, kita akan menjelajahi berbagai jenis karya seni wisata dan mengapa mereka begitu penting dalam dunia perjalanan.'),
(6, 1, 'SMAN 2 KLUET UTARA SIAP MELAKSANAKAN DINUL ISLAM 18 MARET 2024 ', 'sman-2-kluet-utara-siap', '<p>*Dinul Islam dalam Pendidikan: Membangun Kecerdasan Spiritual dan Moral*</p><p>Pendidikan dalam Islam tidak hanya mencakup aspek akademis, tetapi juga mendalam ke dalam pembentukan karakter dan moral individu. Konsep dinul Islam dalam pendidikan mengintegrasikan nilai-nilai agama Islam ke dalam kurikulum dan praktik pendidikan, dengan tujuan menghasilkan generasi yang cerdas secara spiritual, moral, dan intelektual.</p><p>### Integritas Akademis dan Keilmuan:</p><p>Dalam dinul Islam, penting untuk memastikan bahwa pendidikan memberikan dasar yang kokoh dalam ilmu pengetahuan dan keilmuan. Islam mendorong pencarian ilmu yang mendalam dan kritis, serta mempromosikan penelitian dan inovasi dalam berbagai bidang. Ilmu pengetahuan dipandang sebagai sarana untuk memahami kebesaran Allah dan memperluas pemahaman tentang ciptaan-Nya.</p><p>### Pembentukan Karakter dan Moral:</p><p>Salah satu tujuan utama pendidikan dalam Islam adalah pembentukan karakter yang kuat dan moralitas yang tinggi. Pendidikan tidak hanya tentang mengajarkan siswa apa yang harus dipikirkan, tetapi juga bagaimana cara berperilaku dengan benar dalam kehidupan sehari-hari. Islam mengajarkan nilai-nilai seperti kejujuran, keadilan, kasih sayang, kesabaran, dan kerendahan hati, yang semuanya diterapkan dalam lingkungan pendidikan.</p><p>### Pengembangan Kecerdasan Spiritual:</p><p>Dinul Islam dalam pendidikan bertujuan untuk mengembangkan kecerdasan spiritual siswa. Ini mencakup pengajaran tentang ibadah, doa, puasa, dan lain-lain, serta memfasilitasi lingkungan yang mendukung pertumbuhan spiritual melalui kegiatan-kegiatan seperti dzikir, tausiyah, dan diskusi agama. Kecerdasan spiritual memungkinkan siswa untuk memperkuat hubungan mereka dengan Allah dan meningkatkan kesadaran akan tujuan hidup mereka.</p><p>### Integrasi Ajaran Agama dalam Kurikulum:</p><p>Dinul Islam dalam pendidikan juga melibatkan integrasi ajaran agama dalam kurikulum. Hal ini dapat dilakukan melalui pelajaran agama yang terstruktur, seperti studi Al-Quran, hadis, sejarah Islam, dan akidah. Selain itu, nilai-nilai agama Islam juga diperkuat melalui penyertaan mereka dalam setiap mata pelajaran, seperti sains, matematika, bahasa, dan seni, dengan menunjukkan bagaimana prinsip-prinsip Islam relevan dalam kehidupan sehari-hari.</p><p>### Kesimpulan:</p><p>Dinul Islam dalam pendidikan tidak hanya menekankan pengetahuan akademis, tetapi juga pembentukan karakter, pengembangan kecerdasan spiritual, dan integrasi nilai-nilai agama Islam dalam kurikulum. Melalui pendekatan ini, pendidikan Islam bertujuan untuk menciptakan individu yang cerdas secara spiritual, moral, dan intelektual, siap untuk menghadapi tantangan dunia modern dengan keyakinan dan keberanian.</p>', '2024-03-16 15:57:49', '42d628b72b136173aa4793c3dcf406ee.jpeg', 33, '*Dinul Islam dalam Pendidikan: Membangun Kecerdasan Spiritual dan Moral*');

-- --------------------------------------------------------

--
-- Table structure for table `denah`
--

CREATE TABLE `denah` (
  `id` int(11) NOT NULL,
  `denah` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denah`
--

INSERT INTO `denah` (`id`, `denah`) VALUES
(1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.0021926483446!2d97.31116297415886!3d3.0940747968815447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303a58f49db866c7%3A0x8570176b37c4cbd4!2sSMA%20Negeri%202%20Kluet%20Utara!5e0!3m2!1sid!2sid!4v1710390524150!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `denahbangunan`
--

CREATE TABLE `denahbangunan` (
  `id` int(11) NOT NULL,
  `denahbangunan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denahbangunan`
--

INSERT INTO `denahbangunan` (`id`, `denahbangunan`) VALUES
(1, 'c3e4340ebf80ace04ed18f7fe980ad06.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id`, `judul`, `foto`, `desc`, `slug`) VALUES
(7, 'PASKIBRA', '0f80d1186de3ce88935fc89be5b001ef.jpg', '<p>Pasukan Pengibar Bendera</p>', 'paskibra'),
(8, 'PRAMUKA', '968212afbac6a153fb4526c2a6682134.png', 'Praja Muda Pramuka', 'pramuka'),
(9, 'OSIS', '3de1c4ad95eb092083f415817369e3f8.jpg', '<p>Organisasi Intra Sekolah</p>', 'osis'),
(12, 'PERTANIAN', 'f9b1023ca451ffabf717f5ca8a22e9e1.png', 'Petani adalah garda terdepan dalam ketahanan pangan di indonesia, oleh karena itu anak muda jangan gengsi menjadi petani millenial.', 'pertanian'),
(13, 'Engglish Club', '2630a82592f952f90472a3c9521a1113.jpg', 'Meningkatkan kualitas siswa dalam berbahasa inggris <i>(improve student reading,speaking and writing engish)</i>', 'engglish-club'),
(14, 'OLAHRAGA', '6ff471f6eeabd52e0cdadee33237b30d.jpg', '<p>Siswa dapat menyalurkan minat dan bakat dalam bidang olahraga</p>', 'olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `file`, `keterangan`) VALUES
(4, 'ff08039a484549c4c2615ac23ccdeba9.pdf', 'Pengumuman aktif belajar mengajar tahun ajaran 2023/2024');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `foto`, `judul`, `waktu`, `user`) VALUES
(7, '206aedac03748bc34e548c58279aca44.jpeg', 'FOTO P5', '2024-03-14 16:34:48', '1'),
(8, '8581d141478854c7dcf5e04ff5fa3eda.jpeg', 'LOMBA 17 AGUSTUS', '2024-03-14 16:35:11', '1'),
(9, '2f3a9d5871c5b82a4dc18f801eb045b8.jpeg', 'FOTO P5', '2024-03-14 16:35:24', '1'),
(10, 'ae134b94d72fd24aef50975484e07317.jpeg', 'FOTO KEPALA SEKOLAH', '2024-03-14 16:35:54', '1'),
(11, 'fa8d7f2861d90efcd004ac49a226c18d.jpeg', 'FOTO ', '2024-03-14 16:36:13', '1');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `app_name` varchar(150) NOT NULL,
  `nama_sekolah` varchar(150) NOT NULL,
  `host_mail` varchar(50) NOT NULL,
  `port_mail` varchar(10) NOT NULL,
  `crypto_smtp` varchar(20) NOT NULL,
  `account_gmail` varchar(50) NOT NULL,
  `pass_gmail` varchar(50) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `breadcumb` varchar(100) DEFAULT NULL,
  `map` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `app_name`, `nama_sekolah`, `host_mail`, `port_mail`, `crypto_smtp`, `account_gmail`, `pass_gmail`, `whatsapp`, `logo`, `alamat`, `instagram`, `facebook`, `twitter`, `youtube`, `jurusan`, `breadcumb`, `map`) VALUES
(1, 'Sistem Informasi Sekolah', 'SMAN2 Kluet Utara', 'mail.zhafranhashif.com', '465', 'ssl', 'sman2kluetutaraacehselatan07@gmail.com', 'pmb2023', '082350965301', '7e425d4634730be9aaf8ac738dcdb39d.png', 'Jl. Dhatuk Chindee Desa Pasie Kuala Ba\'u Kode Pos 23771', 'https://instagram.com', 'https://facebook.com', 'https://twitter.com', 'https://www.youtube.com/@smanegeri2kluetutara740', 'ya', 'daa7394b93bb655656a57b61d9a8a100.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nbm` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `alumni` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `nbm`, `pendidikan`, `alumni`, `jabatan`, `foto`) VALUES
(1, 'Yetet Suryati, S.Pd', NULL, 'S1 Bimbingan Konseling', 'STKIP', 'Kepala Sekolah SMP', 'c65cd01e0fbe1be4b59b0e36b6cd455c.jpg'),
(5, 'Khairunnisya', NULL, 'Bahasa Indonesia', 'UNILA', 'Guru ', '106db8ca626a2ca5d2c9f75df27530ea.png'),
(6, 'Purwaningsih, S.Pd', NULL, 'Bahasa Inggris', 'Universitas Lampung', 'Guru Mapel', '914b07a61d3b42f241b5e2bff15d2da9.png'),
(7, 'Fariska, S.Pd', NULL, 'Pendidikan Jasmani dan Kesehatan', 'Universitas Lampung', 'Wakil kepala sekolah', '2effdfa05d81b869fcc1fef1bc5154bc.png'),
(8, 'SALMAN AL FARISI, S.Pd', NULL, 'Pendidikan Matematika', 'Universitas Syiah Kuala ', 'Guru Mapel Matematika', 'd4d6d6d244fa0fe18ce0bc25579648d6.jpeg'),
(9, 'ALMADANI, S.Pd', NULL, 'PENDIDIKAN TEKNOLOGI INFORMASI', 'UIN AR-RANIRY BANDA ACEH', 'Guru Mapel INFORMATIKA', 'df235ec15e76a3a3751e309e321039df.jpeg'),
(10, 'CUT IZAFAMIHARDI, S.Pd', NULL, 'Pancasila dan Kewarganegaraan', 'Universitas Syiah Kuala ', 'Guru Mapel Pkn', '6db11cb1831cc54f3b9c6e5a4d52392c.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `industri`
--

CREATE TABLE `industri` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industri`
--

INSERT INTO `industri` (`id`, `judul`, `foto`, `slug`) VALUES
(18, 'TVRI', '30224b6e8ff565cc7752acfe3bad48c0.png', 'tvri'),
(19, 'Trans 7', 'a4493652fd049bc5210bbcce14bb9607.jpeg', 'trans-7'),
(20, 'Sharp', '249413fbf7333b9b8b0a2a916728cd9a.png', 'sharp');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `judul`, `foto`, `desc`, `slug`) VALUES
(18, 'IPA', '376d5c088d018829c6db7c72b0667b96.png', '<p>ILMU PENGETAHUAN ALAM</p>', 'ipa'),
(19, 'IPS', 'aefd0ae1033f4698c158657d676c17de.png', 'ILMU PENGETAHUAN SOSIAL', 'ips');

-- --------------------------------------------------------

--
-- Table structure for table `keutamaan`
--

CREATE TABLE `keutamaan` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keutamaan`
--

INSERT INTO `keutamaan` (`id`, `judul`, `foto`, `desc`, `slug`) VALUES
(18, 'Pendidikan', 'bc641fcaeb4541b07603affd934b7aa5.png', '<p>Memiliki pendidikan yang unggul dalam segala aspek</p>', 'pendidikan'),
(19, 'Fasilitas', '032f0991d0e35eab40395b57f8dc02ec.png', '<p>Memiliki layanan fasilitas terbaik</p>', 'fasilitas'),
(20, 'Biaya Terjangkau', '689375d7dc6da56907f0229db6b10742.png', 'Memiliki biaya yang terjangkau', 'biaya-terjangkau');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subjek` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `subjek`, `pesan`, `waktu`) VALUES
(1, 'pak muh', 'muh@gmail.com', 'pesan', 'pesan pesan', '2023-05-05 00:52:33'),
(3, 'Andrew Huffman', 'jyfinokem@mailinator.com', 'Excepteur enim asper', 'Velit consequat Qua', '2023-05-07 00:06:59'),
(4, 'Vivian Peck', 'hyfiwytij@mailinator.com', 'Ipsam vitae vel quae', 'Delectus ullam exce', '2023-05-07 00:09:12'),
(5, 'Gillian Rich', 'pajegucoqi@mailinator.com', 'Sed ipsam fuga Veli', 'Necessitatibus sed a', '2023-05-07 00:09:57'),
(6, 'Gareth Ellison', 'syducu@mailinator.com', 'Et laboriosam qui u', 'Odit culpa laborios', '2023-05-07 00:11:25'),
(7, 'Curran Shelton', 'davo@mailinator.com', 'Culpa et laborum E', 'Fuga Delectus odit', '2023-05-07 00:12:48'),
(8, 'Ramona Mcgee', 'ryveheziwy@mailinator.com', 'Elit nobis reiciend', 'Ut explicabo Accusa', '2023-05-07 00:14:33'),
(10, 'Adena Burnett', 'kaxo@mailinator.com', 'Sunt quis nobis null', 'Rerum quidem quos sa', '2024-03-04 00:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `profil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `profil`) VALUES
(1, '<p class=\"has-background has-large-font-size has-very-light-gray-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding: 1.25em 2.375em; background-color: rgb(238, 238, 238); color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: var(--wp--preset--font-size--large)  !important;\"><strong>SEJARAH BERDIRINYA SMAN 2 KLUET UTARA TAHUN 2007</strong></p><p class=\"has-background has-text-align-center has-very-light-gray-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; text-align: center; padding: 1.25em 2.375em; background-color: rgb(238, 238, 238); color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\">SMAN 2 KLUET UTARA&nbsp;</p><div class=\"is-layout-flow wp-block-group\" style=\"color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\"><div class=\"wp-block-group__inner-container\"><figure class=\"wp-block-table is-style-regular\" style=\"margin-bottom: 0px; overflow-x: auto;\"><table style=\"border-spacing: 0px; max-width: 100%; background-color: transparent; width: 1140px;\"><tbody><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"><strong>SUSUNAN PENGURUS SMP TAHUN 2008</strong></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"></td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Kepala Sekolah</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Dharma Aprin Abdals, S.Pd</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Wakil Kepsek</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Sumaidi, S.Pd&nbsp;<br></td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Waka Kurikulum</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Herman, S.Pd</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Bendahara</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Ika Asnita, S.Pd</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"><br></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"><br></td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">&nbsp;</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"><br></td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">&nbsp;</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"><br></td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">&nbsp;</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"><br></td></tr></tbody></table></figure></div></div><p class=\"has-background has-text-align-center has-very-light-gray-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; text-align: center; padding: 1.25em 2.375em; background-color: rgb(238, 238, 238); color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\">Awal Berdirinya bangunan pada tahun 2009, dan diresmikan pada bulan juli tahun 2010 berakhir masa jabatan pak dharma pada&nbsp; 2011 akhir.</p><figure class=\"wp-block-table\" style=\"margin-bottom: 0px; overflow-x: auto; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\"><table style=\"border-spacing: 0px; max-width: 100%; background-color: transparent; width: 1140px;\"><tbody><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"><strong>SUSUNAN PENGURUS SMP NEGERI 4 KEDONDONG TAHUN 2011</strong></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"></td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Kepala Sekolah</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Ririn Riana Sari,S.Pd</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Wakil Kepala Sekolah</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Sumaidi, S.Pd</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Waka Kurikulum</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Ika Asnita, S.Pd</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"><span style=\"background-color: rgba(234, 234, 234, 0.25);\">Bendahara</span><br></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Heni Ismaini, S.Pd</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"><br></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"><br></td></tr></tbody></table></figure><p class=\"has-background has-text-align-center has-very-light-gray-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; text-align: center; padding: 1.25em 2.375em; background-color: rgb(238, 238, 238); color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\">Pada Tahun 2012 awal ibu ririn menjabat selaku kepala sekolah menggantikan pak dharma yang sebelumnya menjabat sebagai kepsek, dan berakhir pada tahun 2014.</p><figure class=\"wp-block-table\" style=\"margin-bottom: 0px; overflow-x: auto; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\"><table style=\"border-spacing: 0px; max-width: 100%; background-color: transparent; width: 1140px;\"><tbody><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">&nbsp;<strong>SUSUNAN PENGURUS SMP NEGERI 24 PESAWARAN</strong></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"></td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Kepala Sekolah</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Raden Moh Sayyid</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">&nbsp;</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Abdul Syukur Thoyyib</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">&nbsp;</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Anwar Sultan Rajo Alam</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Pengawas</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Drs. H. Azmi Kusairi, M.Ag</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">&nbsp;</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\"></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">H. Arif Kemas, LC</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Ketua</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Dra. Hj. Halimah Syukur</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Sekretaris</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Dr. H. Arsyad Sobby Kesuma, LC, M.Ag</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Bendahara</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Drs. H. Syamsun Adnany, LC</td></tr></tbody></table></figure><p class=\"has-background has-text-align-center has-very-light-gray-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; text-align: center; padding: 1.25em 2.375em; background-color: rgb(238, 238, 238); color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\">Selanjutnya sebagai sebuah dinamika dalam roda organisasi dengan harapan bisa berkembang dan dapat menyesuaikan diri terhadap perkembangan zaman, hingga pada tanggal 6 September 2016 melalui Notaris Sulistyo Sri Rahayu, S.H., M.Kn. sebagai salah satu notaris di Kabupaten Pesawaran menerbitkan perubahan struktur kepengurusan YPDPL sebagai berikut:</p><figure class=\"wp-block-table\" style=\"margin-bottom: 0px; overflow-x: auto; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\"><table style=\"border-spacing: 0px; max-width: 100%; background-color: transparent; width: 1140px;\"><tbody><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"><strong>SUSUNAN PENGURUS TAHUN 2016</strong></td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\"></td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Pembina</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Nurma Syukur</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Pengawas</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Iskandar Syukur</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Ketua</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Halimah Syukur</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Sekretaris</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s;\">Dr. H. Arsyad Sobby Kesuma</td></tr><tr><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Bendahara</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">:</td><td style=\"padding: 10px 15px; border-top: none; border-right-width: 1px; border-right-color: initial; border-bottom: 1px dashed rgb(234, 234, 234); border-left-width: 1px; border-left-color: initial; border-image: initial; transition: all 0.2s ease 0s; background-color: rgba(234, 234, 234, 0.25);\">Zulhakki Himawan</td></tr></tbody></table></figure><p class=\"has-background has-text-align-center has-very-light-gray-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; text-align: center; padding: 1.25em 2.375em; background-color: rgb(238, 238, 238); color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\">Pada tanggal 20 April 2019 melalui Notaris Didik Maryono, S.H., M.H., M.Kn yang berlokasi di Kab. Lampung Selatan dengan beberapa perubahan isi Akta Notaris kepengurusan Yayasan sama dengan kepengurusan pada tahun 2016.</p><p class=\"has-background has-text-align-center has-very-light-gray-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; text-align: center; padding: 1.25em 2.375em; background-color: rgb(238, 238, 238); color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\">Sebagai suatu sumbangsih bagi masyarakat dalam memajukan kehidupan berbangsa dan bernegara melalui jalur pendidikan tinggi, YPDPL merasa peran serta masyarakat dalam layanan pendidikan tinggi khususnya di kabupaten Pesawaran belum ada, maka pada tahun 2020 untuk pertama kalinya YPDPL mendirikan institusi perguruan tinggi pertama di kabupaten Pesawaran yang diberi nama Institut Teknologi dan Bisnis Diniyyah Lampung (INSTIDLA).</p><p style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\"><strong>Hingga saat ini YPDPL telah menyelenggarakan beberapa satuan Pendidikan, sebagai berikut:</strong></p><p class=\"has-text-color has-background has-very-dark-gray-color has-pale-cyan-blue-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding: 1.25em 2.375em; color: rgb(49, 49, 49); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px; background-color: var(--wp--preset--color--pale-cyan-blue)  !important;\"><strong>Perguruan Diniyyah Putri Lampung</strong></p><p class=\"has-text-color has-background has-very-dark-gray-color has-pale-cyan-blue-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding: 1.25em 2.375em; color: rgb(49, 49, 49); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px; background-color: var(--wp--preset--color--pale-cyan-blue)  !important;\"><strong>DMP/MTs dan KMI/MA Diniyyah Putri Lampung</strong><br><strong>(Sistem Pondok Pesantren)</strong></p><p class=\"has-text-color has-background has-very-dark-gray-color has-pale-cyan-blue-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding: 1.25em 2.375em; color: rgb(49, 49, 49); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px; background-color: var(--wp--preset--color--pale-cyan-blue)  !important;\"><strong>MI Diniyyah Putri Lampung</strong></p><p class=\"has-text-color has-background has-very-dark-gray-color has-pale-cyan-blue-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding: 1.25em 2.375em; color: rgb(49, 49, 49); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px; background-color: var(--wp--preset--color--pale-cyan-blue)  !important;\"><strong>PAUD AL-Wardah Diniyyah Putri Lampung</strong><br><strong>(TPA, KOBER dan RA)</strong></p><p class=\"has-text-color has-background has-very-dark-gray-color has-pale-cyan-blue-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding: 1.25em 2.375em; color: rgb(49, 49, 49); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px; background-color: var(--wp--preset--color--pale-cyan-blue)  !important;\"><strong>SD IT AL-Mahdhuri Desa Pasar Krui,</strong><br><strong>Kec. Pesisir Tengah, Kab. Pesisir Barat, Lampung</strong></p><p class=\"has-text-color has-background has-very-dark-gray-color has-pale-cyan-blue-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding: 1.25em 2.375em; color: rgb(49, 49, 49); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px; background-color: var(--wp--preset--color--pale-cyan-blue)  !important;\"><strong>Pondok Pesantren Al-Farabi (SMP IT dan SMA IT)</strong><br><strong>Desa Halangan Ratu, Kec.Negeri Katon, Pesawaran, Lampung</strong></p><p class=\"has-text-color has-background has-very-dark-gray-color has-pale-cyan-blue-background-color\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding: 1.25em 2.375em; color: rgb(49, 49, 49); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px; background-color: var(--wp--preset--color--pale-cyan-blue)  !important;\"><strong>Institut Teknologi dan Bisnis Diniyyah Lampung (INSTIDLA) Desa Negeri Sakti, Kec. Gedong Tataan, Pesawaran, Lampung</strong></p><div class=\"wp-block-image\" style=\"color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\"></div><div class=\"wp-block-image\" style=\"color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13px;\"><img src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAYGBgYHBgcICAcKCwoLCg8ODAwODxYQERAREBYiFRkVFRkVIh4kHhweJB42KiYmKjY+NDI0PkxERExfWl98fKcBBgYGBgcGBwgIBwoLCgsKDw4MDA4PFhAREBEQFiIVGRUVGRUiHiQeHB4kHjYqJiYqNj40MjQ+TERETF9aX3x8p//CABEIBQADVQMBIgACEQEDEQH/xAAxAAEBAAMBAQEAAAAAAAAAAAAAAQIDBAUGBwEBAQEBAQAAAAAAAAAAAAAAAAECAwT/2gAMAwEAAhADEAAAAvaFyAAoBAAAAAAAAAAAAAAAKAACAoEVUAAAACRYAAAAAAARQlgAAAAAAAlgAAAABmoiiKAgAAAAAAAAAAAKCAFlVKIAAEBQAEqosAgKABEoiwAAAAAAAgAAAAAAAIsCiKWKIJNgJQCggAAKACAAACqlliKIolBKAUBKIoiwAAAASiACgAAAEoSkgAAAAEoiiFIoiwAAAAAABQTMQAAAFAAAACxFAAAAKAAAAAAABFgAAAlEUQAUAAACAJYAAAAAAAAJYAAAAAAAAZiAAAAUAVJQSqACAAUEBQAAAAAAAEsAAAAAEAogoAAEASwKIAAAAAABKIoiiFIAUgAAM1kAAABVQUAAAASgBQQAAAAAAAAABFgAAAAAllAAAAgAAEWKCAAAAAAAAAAAJRFEEbJRFEUEoAFoIAACgAABAAAAAAAAAACUQAAAAAEAAFAgKAAlEAAACAAAAAAQAFABAbBAAEoABaAAAAAAAEAAAAAAAAAAARYAAAAAAJRBQAAAAEURRFiAAAAAAAAAJRABGwKAACAAAoAAAAAAAAAAAAAAAAACUQAAAAAAVAAAAAAAgCWAAAAAAAAAAAAGYlABAAAAUAAAAAAAAAAAAAAAAAABAAAAAACgEsAAAAAQACLAAAAAAAAAAADMSgABYEAAoAAAAAAAAAAAAAAAAAAAEWAAAAAEVUWAAAAIACgCIAAAAAAAAAABmJQAAQAAFAAACggAAAAAAAAAAAAAABLAAAAAALAUCKIAAEAASiKIogAAAAAAAAM1RAAoIACgAAAAAAACiAKRYKCUQApFgAAAACRYoAAAUCAAqWAAIAAAAAAlEAAAAAAABnZZUoiiLAAAAAAKCACiLBRAUAAAAAQqCwAAAAEsAAAQFCgAEsAAQAAAAAABAAAAAAAA2CUABBAAAAAUCyiAoJQAAAAAAASwAAAAAASiKIAECgUAISrIpYAAAEAAAiiLAAAAAAADYIBRBZUiwAAWFAAqCgAAAAAAAAASwsAAAAAAAQAAAAAABABKsAFBAAAAAIoiiAAAAA2CEoBQRLKCAFi2xYASgKACAAAAAAAAAIogAAAAEsAAAAAAAsASiKEsAAAAAAAAEsAAAANggAFBIKCAFlUAAKAACAAoAIAAAAAAiwAAAASiKIAEABQAQFCwAFgAQAAAAACLAAAADYIAAAhSAAoUKAAAACAAoAIAAAAAASwAAAAAASwAAAAAAACwAFgQUiiAAAAiiUAAIozEAAAAqWAFFABAUAAEBQAQAAAAAAAlgAAAAAACQKAAAAAAFgAAAAhYAKCAAAAoIBmIAAAAAixaKCAoAIAAAAAAAAAAAAAASiAAAABEpYogAAAAAQKABQAQACLAAAFABAMxAAKAAAFABAAUEAAAAAAAAAAAAAACAAAAAAACWAAAAAAAAAWAAAAAQAAAAGYlAAAAACggAKCAAAAAAAAAAAAAAAAIAAAAAABLAAAAAAAALAAAAAEsAAAAAMxKAAAAFABAAAAAAAAAAAAAAAAAAACURYAAAAARRFEAAAAAAFgAAAAEWAolgURYAZiUAAAAAAAAAAAAAAAAAAAAAAAABKEogAAAAAAEsQAFAAABAAAAAAoAAABKIDKkoAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAlEAAAAACAAAAAABQAAAgBmJQAAAAAAAAAAAAAAAAAAAAAAAAAAImJmAAAAAAAAQBAUAAEAAAAACgABCoAMxKAAAAAAAAAAAAAAAAAAAAAAAAAABhlRAAAAAAAJYAAgKACAAAAAAAAABQEUVUoAAAAAAAAAAAAAAAAAAAAAAAAAACAAAAAAAlgUQAIAAAAAAAAAAAAFAAZCUAAAAAAAAAAAAAAAAAAAAAAAAAAACLAAAAAACUSKWBALLFBAAAAAAAAAAAArISgAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAEWIAAAAAAAAAAAAAAFZCUAAAAAAAAAAAAAAAAAAAAAAYGYAAAIAAAAAAAAAAESiKIogAAAAoAAIAAAAySqAAAAAAAAAAAAAAAAAAAAACAoAAAEoJYAAAAAAgAAAAAgAAAAFAAFRF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AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAH//xAAC/9oADAMBAAIAAwAAACH332EMMMMMMs//AP8A/wD/AP8A/vvrwgsPPCAAdfffTQQQcVfffTSQQVffffTcccQwwwxy3/8A/wD/AP8A3/8AqC++/uKCQ0+8IBR199BBBBB99999BBB1xww/DjBDHP8Aff8A/wD/AMa8840wgkstvrggkvvPCAAEEfTRQQUcecdffQQQQQAQww3/AH3333vMMMMIIIIIIIILb74JLL7zwAAEFX333kEEEFX3213200E8/wD/APvu40QQwwgwgggggggglvvrignsvLDAQVcfffTSQQUccefefffd/wD/AP8ATQQQQQggAgsvrnrjiggtvvrgglPPLCQQQdPffeQYQQQQQQUcf088ywwAQQQABDAnvvvvvvvogkvvvjggvvvPYAAEPPPPXQQQQQffQQfQww4wwAAACMNPDvvvvvvvvqggtvvviggkvPPCAAMMNfdbSTQQQQUffwgggww0jjjjnvvvvvvvvvvvigkvvvggggPPPPKAAQVffffbQQQQQQQfrvzwwwvvvvvvvvvvvvvvvvvignvvogggAFPPPAAQQdffffYQQQQQQfvvoQw1vvvvvvvvvvvvvvvvvqggtvrjggsNPPPAQQABffffYQQQQQQfvvvzx/vvvvPvvvvvvvvvvvvqgglvvviggQAMPPPfQUccffTQQQTTQc//AL//AO++++++++6e62iS+62++CCD2++iABBAU8999BBBBR99951999qSy2+++++8++y2jCCCCCCGOe++KCW++/CAAAU8999tBBBBd9999999CCCf/wD/AP8A++S+CiCCCCCCCW++++yCSy+rBAACRw8889JBBx19999999DCGr3/AP7vvjgggggggggglnvvvvgghvvvigggwxXfPbQQQQccfffffQ0wg1f/AOxoJIAAIIIIIIIIILL74oIJb777IIIEFHFX3000kEEFX3330MMIP3/+oIIAAAIIAAIIYoIILb764JLL7/8AqCDCBBA89999BBB19999DDDD7/8AwgAAAAAhrDLjnvggglvvvqgglvvvvqgggQQPecffaQcYQQcQwwwwlvgAAgAAAnPPvvvvjiglvvvqggg/vvvvuggQQQQRXfLTTTQAQQwwwww9gAgAAglvvvvvvvvqgggkrjigg0svvvvjgwQQAAQQdfffPDTR4wggggAAggBjvvvvvvvvvvigghvvriggglvvvvvriggQQQQQfffffQggggggAgjHvvvvvvvvvvvvviggvvjjggglvvvvvvqgQQQQQVfffffSgggggDDnvvvvvvvvvvvvvvvvqgktvvjigssvvvvrjgQQQQQdeVcdfQggsgktvvvvvvvvvvvvvvvvjjgkkvvvvvggl/8A7777+8sMMMEEEEFH2IIIIIIIIrb7777777777777444IL77774IJL77777/8sMMMMEEEEX0IIIIJKIIJb7777777777777774oLLbL744IIIb/777+88sMMEEEU30IIIIIIYJ77777777777777776qILL77774IJb7/AO+//wD/AOsMMMMMEHHIIILIY4b777777777777777776IJ777644JbL7/8A/wD/AP8A/vPDDDDBBBCCCCCCC++++++++++++++++++++KC2+++6iCjy/wD1v/8A/wDPDDDH/PDBCCCCCCO+++++++++++++++++++6CO++++6CCCC3/AP8A/wD/AP8A+88v/wD/AKwQggggggjvvvvvvPPvvvvvvvnPPggvvvvvvugggg088/8A/wD/ADTTf/8A88MoIIIIIJb7777zzz77777zz3zz4IKJb7764IMMMMMMf/8A/wD/AH13Pf8A/PqCCCCCCe+++88888++8888+888CC++++6iCCDDDDLX/wD/AP8A999f/wD/AP8AeqCCCCCCe++88888888888884AACe++++6CCDDDDDDb/AP8A/wD9/wD/AO//APuOCCCCCC2888888888888888oACe+++++6CCCDDHPf/wD/AP8A/wD/AP8A/wD/AP8A+uOCCCAAMc8888888++8888oAAC+++++6iCCDDDDDz//AP8A/wD/AM9//wD/AP8AvoggggEMMNPPPPPPPPPPOIAABPONvgggggggwwww0/8A/wD/AP8A+sPP/wD/APvvogggAAABPPPPPPPPPLDAAHPPKPvgggggwwwwww08/wD/AP8A/wDsf/8A/wD/AL744oAAABDTzzzzzzzzzCABzzzzzKIIIMMMMMMMMM9+9/8A/wD+/wD/AP8A/wD7774wgAAABDzz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7zNJDHf/AMa8840zgkMNPkvokvvCNPLEETeKTbUcWcZQQcRTfXAX/wD+MFX333vMMcN6a5777wwDS4L57L7wDzwEFX0EEWEEEFX2kGEFHH3PMc977uNEF8/7/wC+u+++88AU6AQ0ueyscwJBV5tNNxlNNRhxpNZNNNnP/wD/AE0EE0X77z744BKJLLTzyQgBD6pTyhDX02nT330X130kEEEFHH9PPMsMQ0FHzzjD6IIIIIIIBzxjywLK4L76gFzyhDzzwGH330EH30EH0/8APnD88sc0MIAyCCCCe+oAU8g0+uK2+CS8IA0sI8w1NJR1wJJBBR9/+++//wD7ssssogkgrnvvvoBANKkvvqvvsgPPAAFPPbVfXfTEPfeAAQQQkg8//wD4IIIII77777777zzwDQp74pz64ABSwgDz20nX33GF30AQ00EIYp3/APqCCCGOOG++++++88sAWuC2OQwuKw08IA998oF985hd5AQhBBOCOH77CCCG8+++++++++888gU+iW+oC2uBAAw8ABB9Zww9NwsIMwRNz/8Av7wglrnvvvvunutokvutqAvrg9vinvDQQFPOTSfSQQUfPABCAAQakstvovvvvPvstowggggghjnLgtilvvg/vOAFPPfaUfKYQHPDAAAQQAggn+9/3/vkvgogggnghilPvKgjvEsPl/eDDkcPPLDdPCMNPPIBAQQAwhq4/wD+7744IL4b57IJ4JRzyoIL6ob6oLb76MMV3ylH32yzjAxz20z9MINX/wDsaCSoc6+++6++OOIw8C2+qW+qCO++BBRxVhBxx195hV9998DDCL9//qCCIEwW+88++628+I0+OauSy6DDW+vOJBA8hBJB9tB19998zDXr7/8AxgHPPLPukMEsogvPKFvvqlvKlvvjilvvuQQPecbQVbcJTTcX/wD/APCW+Ac+c88+gAGKCCCy2oW++KW8CD888ACG+pJBBBFdsZxxx899/wD/AOsMPZT7zz76oIb76oIIJbywJLrKYIFDDwIILL800wg0kGUkEADHHstaoIYTz77zrJK577644oADTwwb4pDTzyhb777wJLb732kEEH333336p5445z77CIIY57777764wADTwjwrLLzypb7577IJb332kEFHz3303b7777zDKIJ7b77777zzz7ygABTxDQoLDQbLL6oAJLK00EEU3ThXHX0JLYzy4oIIIJb77777zzz64LDDx5L74IADyhf/AO++iDT3/wD/AP0kEEFH2I77z7777Yo777777zzz7744zDDoL774gDyxL77zzz8Pf/8A/wD4QQQRPQkvvvrnvvqstvvvvvPPPPPPPPANKPIDBCMPAghv/vvj2897zwQQRTTQhvvvPuvoghPvvvvvPPPPPvPKFHLEPvsAAPAlvP8A7y0MMNf/APvPfNJxyC28M6y6CAMM88++88888+88oAeqc+uIQwsey+//AP8A8MMNPP8A/f8A/bQQgnvPPvggEMPPPPPvvvPPPPPPAANANPOABHIo8P8A9b//APDz/wD/APsPPsEIbb7z7IIAATzzzzzzzzzzzzzwATwTzwgASw4ILf8A/wD/AMMMNPPcf+tc0IIbzz77IAABzz77zzzzzzzyYIDyBzzwwgAa4YY9PPO888PHHFf+vP8AKC++888oAAAw+++88888++/6CA8ggU8wwQ8jDDDDDH//AP6zQZc97w86gktvPPIAAABvvvvvPPvvvvAggvCPPKgBHPLjwxwy1/8A/wDrBB9f/wD/AM96oADzzzyAAR77777777777oIb74Bz6IIAT77/APTjDDb/AP7ywV/45/fbjgkhPPPCAggv/wD7777777KIJb6BzzyoIAT776MMc9//AD7jDT37zX5x8sMA88++yiCC3/8A/vuMMogglvugOPOAgBHPvv68ww8//wCsMMM8sMP03zyAATz6448sNf8A/wD/AIII8MZ7OMf64iDzzz775MMMMNP/AP8A/wA8Nf8APz9/888gU8++/wD+w8484w84w0svg3//AJIAD7777/8A/rBDDTz/AP8A+sMfsMX33zzwwxb/AP8A7ywwwQwwwwwzmgn/APsJYxz7qMNPPMEEEM9+988sMcMPf3zzzzw4tPPPO8MEE9+89/8Azz//AM5CltuA4w3wwxzyQw08/wD/AP7DX/DTz973999vPPLz2+O8++//ALzz3+4eMAFIBf7ywzw88wQwyxz/APsMM4oMEHEMNX3/AP8A/wD+8rL7z76LNb7vOfAXzKwr/wD/AP34zw06UQ09/wD/APPS+uLHBNDDBBzyy2+f+SyiiCCe6iPDk4/O+n4DvDD/AP8AsEE088Md/wDjDD++vDB8d9dxBACiCS3+ONdMe+O/7rNW8YkmXf8A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');

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id` int(11) NOT NULL,
  `sambutan` text DEFAULT NULL,
  `foto_kepsek` varchar(100) DEFAULT NULL,
  `excerpt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sambutan`
--

INSERT INTO `sambutan` (`id`, `sambutan`, `foto_kepsek`, `excerpt`) VALUES
(1, '<p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span style=\"color: rgb(54, 54, 53); font-family: Arial, sans-serif;\">اَلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَا تُهُ</span><br style=\"transition: all 0.3s ease-out 0s; color: rgb(54, 54, 53); font-family: Arial, sans-serif;\"><br></p><p style=\"box-sizing: inherit; font-size: 17px; color: rgb(45, 45, 45); line-height: 1.8; font-family: Lora, serif;\">Puji syukur kami panjatkan ke hadirat Tuhan Yang Maha Esa atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat yang tulus tanpa memandang imbalan apapun akan menghasilkan mahakarya yang agung untuk bekal kita dan generasi setelah kita. Pendidikan adalah harga mati untuk menjadi pondasi bangsa dan negara dalam menghadapi perkembangan zaman.</p><p style=\"box-sizing: inherit; font-size: 17px; color: rgb(45, 45, 45); line-height: 1.8; font-family: Lora, serif;\">Hal ini seiring dengan penguasaan teknologi untuk dimanfaatkan sebaik mungkin, sehingga menciptakan iklim kondusif dalam ranah keilmuan. Dengan konsep yang kontekstual dan efektif, kami mengejewantahkan nilai-nilai pendidikan yang tertuang dalam visi misi SMAN 2 KLUET UTARA, sebagai panduan hukum dalam menjabarkan tujuan hakiki pendidikan.</p><p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span style=\"color: rgb(106, 106, 106); font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px;\"><br></span><br></p><p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span style=\"color: rgb(54, 54, 53); font-family: Arial, sans-serif;\">وَعَلَيْكُمُ السَّلاَمُ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ</span><br></p>', '57d61d5ac1d94bec0a148e45881af3d9.jpg', 'Kami Menyambut baik terbitnya Website Sekolah yang baru , dengan harapan dipublikasinya website ini sekolah berharap : Peningkatan layanan pendidikan kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat.');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `kelas`, `jumlah`) VALUES
(1, 'XII', '45'),
(4, 'XI', '46'),
(5, 'X', '65');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `button_capt` varchar(100) DEFAULT NULL,
  `button_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `foto`, `keterangan`, `button_capt`, `button_link`) VALUES
(6, 'b6f45478b94f90d6cb53f872efba8e1e.jpeg', 'Portal Informasi Sekolah Digital', 'Daftar Segera', 'https://facebook.com'),
(7, '778dc467df77024a8e4909a8aec7a6bb.jpeg', 'Bergabunglah Bersama Kami', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `id` int(11) NOT NULL,
  `struktur` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`id`, `struktur`) VALUES
(1, '<section class=\"elementor-section elementor-top-section elementor-element elementor-element-d12fbe4 elementor-section-boxed elementor-section-height-default elementor-section-height-default\" data-id=\"d12fbe4\" data-element_type=\"section\" style=\"--flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; flex-basis: var(--flex-basis); flex-grow: var(--flex-grow); flex-shrink: var(--flex-shrink); order: var(--order); align-self: var(--align-self); position: relative; --swiper-theme-color:#000; --swiper-navigation-size:44px; --swiper-pagination-bullet-size:6px; --swiper-pagination-bullet-horizontal-gap:6px; --widgets-spacing:20px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(247, 247, 247);\"><div class=\"elementor-container elementor-column-gap-default\" style=\"margin: 0px auto; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; display: flex; position: relative; max-width: 1140px;\"><div class=\"elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5964b97\" data-id=\"5964b97\" data-element_type=\"column\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; flex-basis: var(--flex-basis); flex-grow: var(--flex-grow); flex-shrink: var(--flex-shrink); order: var(--order); align-self: var(--align-self); position: relative; min-height: 1px; display: flex; --swiper-theme-color:#000; --swiper-navigation-size:44px; --swiper-pagination-bullet-size:6px; --swiper-pagination-bullet-horizontal-gap:6px; --widgets-spacing:20px; width: 702.656px;\"><div class=\"elementor-widget-wrap elementor-element-populated\" style=\"margin: 0px; padding: 10px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; position: relative; width: 702.656px; flex-wrap: wrap; align-content: flex-start; display: flex;\"><div class=\"elementor-element elementor-element-7e4ce3a animated-slow elementor-widget elementor-widget-image animated fadeIn\" data-id=\"7e4ce3a\" data-element_type=\"widget\" data-settings=\"{}\" data-widget_type=\"image.default\" style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; flex-basis: var(--flex-basis); flex-grow: var(--flex-grow); flex-shrink: var(--flex-shrink); order: var(--order); align-self: var(--align-self); flex-direction: var(--flex-direction); flex-wrap: var(--flex-wrap); justify-content: var(--justify-content); align-items: var(--align-items); align-content: var(--align-content); gap: var(--gap); position: relative; --swiper-theme-color:#000; --swiper-navigation-size:44px; --swiper-pagination-bullet-size:6px; --swiper-pagination-bullet-horizontal-gap:6px; animation-duration: 2s; text-align: center; animation-name: fadeIn; --widgets-spacing:20px; width: 682.656px;\"><div class=\"elementor-widget-container\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; transition: background 0.3s,border 0.3s,border-radius 0.3s,box-shadow 0.3s,transform var(--e-transform-transition-duration,0.4s);\"><a href=\"https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-1.png\" data-elementor-open-lightbox=\"yes\" data-elementor-lightbox-title=\"STRUKTUR ORGANISASI SEKOLAH\" data-elementor-lightbox-description=\"STRUKTUR ORGANISASI SEKOLAH\n\" data-e-action-hash=\"#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6ODMxLCJ1cmwiOiJodHRwczpcL1wvc21wbjFwbGVtYWhhbi5zY2guaWRcL3dwLWNvbnRlbnRcL3VwbG9hZHNcLzIwMjFcLzAzXC9zdHJ1a3R1ci0xLnBuZyJ9\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; box-shadow: none; display: inline-block; color: rgb(102, 102, 119);\"><img decoding=\"async\" width=\"1000\" height=\"869\" src=\"https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-1.png\" class=\"attachment-full size-full wp-image-831\" alt=\"STRUKTUR ORGANISASI SEKOLAH\" loading=\"lazy\" srcset=\"https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-1.png 1000w, https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-1-300x261.png 300w, https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-1-768x667.png 768w\" sizes=\"(max-width: 1000px) 100vw, 1000px\" style=\"height: auto; max-width: 100%; margin: 0px; padding: 0px; border: none; outline: 0px; background: transparent; border-radius: 0px; box-shadow: none; display: inline-block;\"></a></div></div><div class=\"elementor-element elementor-element-b1fe037 animated-slow elementor-widget elementor-widget-image animated fadeIn\" data-id=\"b1fe037\" data-element_type=\"widget\" data-settings=\"{&quot;_animation&quot;:&quot;fadeIn&quot;}\" data-widget_type=\"image.default\" style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; flex-basis: var(--flex-basis); flex-grow: var(--flex-grow); flex-shrink: var(--flex-shrink); order: var(--order); align-self: var(--align-self); flex-direction: var(--flex-direction); flex-wrap: var(--flex-wrap); justify-content: var(--justify-content); align-items: var(--align-items); align-content: var(--align-content); gap: var(--gap); position: relative; --swiper-theme-color:#000; --swiper-navigation-size:44px; --swiper-pagination-bullet-size:6px; --swiper-pagination-bullet-horizontal-gap:6px; animation-duration: 2s; text-align: center; animation-name: fadeIn; --widgets-spacing:20px; width: 682.656px;\"><div class=\"elementor-widget-container\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; transition: background 0.3s,border 0.3s,border-radius 0.3s,box-shadow 0.3s,transform var(--e-transform-transition-duration,0.4s);\"><a href=\"https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-2.png\" data-elementor-open-lightbox=\"yes\" data-elementor-lightbox-title=\"STRUKTUR ORGANISASI SEKOLAH\" data-e-action-hash=\"#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6ODMyLCJ1cmwiOiJodHRwczpcL1wvc21wbjFwbGVtYWhhbi5zY2guaWRcL3dwLWNvbnRlbnRcL3VwbG9hZHNcLzIwMjFcLzAzXC9zdHJ1a3R1ci0yLnBuZyJ9\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; box-shadow: none; display: inline-block; color: rgb(102, 102, 119);\"><img decoding=\"async\" width=\"1000\" height=\"652\" src=\"https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-2.png\" class=\"attachment-full size-full wp-image-832\" alt=\"STRUKTUR ORGANISASI SEKOLAH\" loading=\"lazy\" srcset=\"https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-2.png 1000w, https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-2-300x196.png 300w, https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-2-768x501.png 768w\" sizes=\"(max-width: 1000px) 100vw, 1000px\" style=\"height: auto; max-width: 100%; margin: 0px; padding: 0px; border: none; outline: 0px; background: transparent; border-radius: 0px; box-shadow: none; display: inline-block;\"></a></div></div><div class=\"elementor-element elementor-element-fdf696d animated-slow elementor-widget elementor-widget-image animated fadeIn\" data-id=\"fdf696d\" data-element_type=\"widget\" data-settings=\"{&quot;_animation&quot;:&quot;fadeIn&quot;}\" data-widget_type=\"image.default\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; flex-basis: var(--flex-basis); flex-grow: var(--flex-grow); flex-shrink: var(--flex-shrink); order: var(--order); align-self: var(--align-self); flex-direction: var(--flex-direction); flex-wrap: var(--flex-wrap); justify-content: var(--justify-content); align-items: var(--align-items); align-content: var(--align-content); gap: var(--gap); position: relative; --swiper-theme-color:#000; --swiper-navigation-size:44px; --swiper-pagination-bullet-size:6px; --swiper-pagination-bullet-horizontal-gap:6px; animation-duration: 2s; text-align: center; animation-name: fadeIn; --widgets-spacing:20px; width: 682.656px;\"><div class=\"elementor-widget-container\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; transition: background 0.3s,border 0.3s,border-radius 0.3s,box-shadow 0.3s,transform var(--e-transform-transition-duration,0.4s);\"><a href=\"https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-3.png\" data-elementor-open-lightbox=\"yes\" data-elementor-lightbox-title=\"STRUKTUR ORGANISASI SEKOLAH\" data-elementor-lightbox-description=\"STRUKTUR ORGANISASI SEKOLAH\n\" data-e-action-hash=\"#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6ODMwLCJ1cmwiOiJodHRwczpcL1wvc21wbjFwbGVtYWhhbi5zY2guaWRcL3dwLWNvbnRlbnRcL3VwbG9hZHNcLzIwMjFcLzAzXC9zdHJ1a3R1ci0zLnBuZyJ9\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; box-shadow: none; display: inline-block; color: rgb(102, 102, 119);\"><img decoding=\"async\" width=\"1000\" height=\"652\" src=\"https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-3.png\" class=\"attachment-full size-full wp-image-830\" alt=\"STRUKTUR ORGANISASI SEKOLAH\" loading=\"lazy\" srcset=\"https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-3.png 1000w, https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-3-300x196.png 300w, https://smpn1plemahan.sch.id/wp-content/uploads/2021/03/struktur-3-768x501.png 768w\" sizes=\"(max-width: 1000px) 100vw, 1000px\" style=\"height: auto; max-width: 100%; margin: 0px; padding: 0px; border: none; outline: 0px; background: transparent; border-radius: 0px; box-shadow: none; display: inline-block;\"></a></div></div></div></div></div></section><section class=\"elementor-section elementor-top-section elementor-element elementor-element-ad935c4 elementor-section-boxed elementor-section-height-default elementor-section-height-default\" data-id=\"ad935c4\" data-element_type=\"section\" style=\"--flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; flex-basis: var(--flex-basis); flex-grow: var(--flex-grow); flex-shrink: var(--flex-shrink); order: var(--order); align-self: var(--align-self); position: relative; --swiper-theme-color:#000; --swiper-navigation-size:44px; --swiper-pagination-bullet-size:6px; --swiper-pagination-bullet-horizontal-gap:6px; --widgets-spacing:20px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(247, 247, 247);\"><div class=\"elementor-container elementor-column-gap-default\" style=\"margin: 0px auto; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; display: flex; position: relative; max-width: 1140px;\"><div class=\"elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-49dd657\" data-id=\"49dd657\" data-element_type=\"column\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; flex-basis: var(--flex-basis); flex-grow: var(--flex-grow); flex-shrink: var(--flex-shrink); order: var(--order); align-self: var(--align-self); position: relative; min-height: 1px; display: flex; --swiper-theme-color:#000; --swiper-navigation-size:44px; --swiper-pagination-bullet-size:6px; --swiper-pagination-bullet-horizontal-gap:6px; --widgets-spacing:20px; width: 702.656px;\"><div class=\"elementor-widget-wrap elementor-element-populated\" style=\"margin: 0px; padding: 10px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; position: relative; width: 702.656px; flex-wrap: wrap; align-content: flex-start; display: flex;\"><div class=\"elementor-element elementor-element-57374e3 elementor-headline--style-highlight elementor-widget elementor-widget-animated-headline\" data-id=\"57374e3\" data-element_type=\"widget\" data-settings=\"{&quot;highlighted_text&quot;:&quot;Tugas Pokok&quot;,&quot;headline_style&quot;:&quot;highlight&quot;,&quot;marker&quot;:&quot;circle&quot;,&quot;loop&quot;:&quot;yes&quot;,&quot;highlight_animation_duration&quot;:1200,&quot;highlight_iteration_delay&quot;:8000}\" data-widget_type=\"animated-headline.default\" style=\"margin: 0px 0px 20px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; flex-basis: var(--flex-basis); flex-grow: var(--flex-grow); flex-shrink: var(--flex-shrink); order: var(--order); align-self: var(--align-self); flex-direction: var(--flex-direction); flex-wrap: var(--flex-wrap); justify-content: var(--justify-content); align-items: var(--align-items); align-content: var(--align-content); gap: var(--gap); position: relative; --swiper-theme-color:#000; --swiper-navigation-size:44px; --swiper-pagination-bullet-size:6px; --swiper-pagination-bullet-horizontal-gap:6px; --widgets-spacing:20px; --dynamic-text-color:var( --e-global-color-secondary ); width: 682.656px; --iteration-count:infinite; --animation-duration:1200ms;\"><div class=\"elementor-widget-container\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; transition: background 0.3s,border 0.3s,border-radius 0.3s,box-shadow 0.3s,transform var(--e-transform-transition-duration,0.4s);\"><h3 class=\"elementor-headline e-animated\" style=\"margin: 15px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 20px; vertical-align: baseline; background: transparent; line-height: 1.2; font-family: var( --e-global-typography-primary-font-family ), Sans-serif; font-weight: var( --e-global-typography-primary-font-weight ); text-align: center;\"><span style=\"color: rgb(51, 51, 51);\"><span class=\"elementor-headline-plain-text elementor-headline-text-wrapper\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: transparent; z-index: 1; position: relative; color: var( --e-global-color-secondary );\">Struktur Organisasi Sekolah, Bagian-Bagian dan</span>&nbsp;</span><font color=\"#aebcb9\">Tugas Pokkok</font><span class=\"elementor-headline-dynamic-wrapper elementor-headline-text-wrapper\" style=\"color: rgb(51, 51, 51); margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: transparent; display: inline-block; position: relative; overflow: visible; text-align: inherit;\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 500 150\" preserveAspectRatio=\"none\"><path d=\"M325,18C228.7-8.3,118.5,8.3,78,21C22.4,38.4,4.6,54.6,5.6,77.6c1.4,32.4,52.2,54,142.6,63.7 c66.2,7.1,212.2,7.5,273.5-8.3c64.4-16.6,104.3-57.6,33.8-98.2C386.7-4.9,179.4-1.4,126.3,20.7\"></path></svg></span></h3></div></div><div class=\"elementor-element elementor-element-03ce025 elementor-widget elementor-widget-text-editor\" data-id=\"03ce025\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\" style=\"color: var( --e-global-color-text ); margin: 0px 0px 20px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; flex-basis: var(--flex-basis); flex-grow: var(--flex-grow); flex-shrink: var(--flex-shrink); order: var(--order); align-self: var(--align-self); flex-direction: var(--flex-direction); flex-wrap: var(--flex-wrap); justify-content: var(--justify-content); align-items: var(--align-items); align-content: var(--align-content); gap: var(--gap); position: relative; --swiper-theme-color:#000; --swiper-navigation-size:44px; --swiper-pagination-bullet-size:6px; --swiper-pagination-bullet-horizontal-gap:6px; --widgets-spacing:20px; font-family: var( --e-global-typography-text-font-family ), Sans-serif; font-weight: var( --e-global-typography-text-font-weight ); width: 682.656px;\"><div class=\"elementor-widget-container\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; transition: background 0.3s,border 0.3s,border-radius 0.3s,box-shadow 0.3s,transform var(--e-transform-transition-duration,0.4s);\"><p style=\"margin: 10px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\"><strong style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">Sekolah mempunyai fungsi pengelolaan penyelenggaraan pendidikan. Rincian tugasnya adalah:</strong></p><ol style=\"margin: 15px 0px; padding: 0px 0px 0px 35px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; list-style-position: initial; list-style-image: initial;\"><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; vertical-align: baseline; background: transparent;\">Mengumpulkan, mengolah data dan informasi, menginventarisasi permasalahan serta melaksanakan pemecahan permasalahan yang berkaitan dengan pengelolaan sekolah;</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; vertical-align: baseline; background: transparent;\">Merencanakan, melaksanakan, mengendalikan, mengevaluasi, dan melaporkan kegiatan sekolah;</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; vertical-align: baseline; background: transparent;\">Menyiapkan bahan kebijakan, bimbingan dan pembinaan serta petunjuk teknis sesuai dengan bidang tugasnya;</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; vertical-align: baseline; background: transparent;\">Menyelenggarakan proses pembelajaran sesuai dengan ketentuan yang berlaku;</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; vertical-align: baseline; background: transparent;\">Melaksanakan evaluasi hasil belajar peserta didik;</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; vertical-align: baseline; background: transparent;\">Menyediakan sarana dan prasarana pembelajaran;</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; vertical-align: baseline; background: transparent;\">Melaksanakan ketatausahaan dan rumah tangga sekolah;</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; vertical-align: baseline; background: transparent;\">Melaksanakan analisis dan pengembangan kinerja sekolah;</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; vertical-align: baseline; background: transparent;\">Melaksanakan tugas lain yang diberikan Kepala Dinas.</li></ol></div></div></div></div></div></section><p></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `kegiatan_id` int(11) NOT NULL,
  `kegiatan_user` int(11) DEFAULT NULL,
  `kegiatan_judul` varchar(100) DEFAULT NULL,
  `kegiatan_slug` varchar(100) DEFAULT NULL,
  `kegiatan_isi` text DEFAULT NULL,
  `kegiatan_waktu` date DEFAULT NULL,
  `kegiatan_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`kegiatan_id`, `kegiatan_user`, `kegiatan_judul`, `kegiatan_slug`, `kegiatan_isi`, `kegiatan_waktu`, `kegiatan_foto`) VALUES
(51, 50, 'santunan anak yatim bersama ketua masjid fatimah zahro', 'santunan-anak-yatim-bersama-ketua-2', '<p>lojerbvklklbvklrvrklvblkv</p>', '2022-03-09', 'd1ac4b49585d3c2e0c3e8ef561549e8b.jpeg'),
(52, 50, 'pengajian & Sholat eid fitri', 'pengajian-sholat-eid-fitri-2', '<p>sholat&nbsp; eid + pengajian\"</p><p>bvkejrjqke;jnqrbklnktnbltlrkblrkbr</p><p>bkjrtnlktwrbkrngwbkljtnbpwkb;twbnkrtnbnrgj</p>', '2022-05-02', '9509ba0848aac5e5720905f15bf35090.jpeg'),
(53, 50, 'poto bersama ustadz ', 'poto-bersama-ustadz-2', '<p>Tabligh akbar&nbsp;</p><p>vjnrwkhntkbtnwitohniotntjnbthgkregibhrgu ricthritvirbvtoirt9ut9wtuiortirehveolbvlighwi;w;g;wgb;bg;wighlwglwrkvjgvwghlkrwg</p><p>rvgiewon</p><p><br></p>', '2022-01-21', '5983c57849883ce1953a715df76b7e30.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rencanakegiatan`
--

CREATE TABLE `tbl_rencanakegiatan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `nama_kegiatan` varchar(200) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rencanakegiatan`
--

INSERT INTO `tbl_rencanakegiatan` (`id`, `tanggal`, `tanggal_selesai`, `nama_kegiatan`, `keterangan`) VALUES
(8, '2023-08-17', '2023-08-17', 'Upacara Kemerdekaan', 'Upacara Bendera'),
(9, '2023-08-14', '2023-08-16', 'Lomba Hari Kemerdekaan', 'Diikuti semua siswa');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `foto`, `desc`, `slug`) VALUES
(21, 'CUT IZA FAMIHARDI', '7c1f95dc906bd5cddfe33979839b156f.jpeg', 'Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.', 'cut-iza-famihardi'),
(22, 'SALMAN AL FARISI', '4ba088f8a0ba85d98f7fcc9aa203c13a.jpeg', 'Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.', 'salman-al-farisi'),
(23, 'ALMADANI', '340e977a08fe3d7c44ff93555a09f9a8.jpeg', 'Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.', 'almadani');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `user` varchar(10) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `url`, `judul`, `desc`, `waktu`, `user`, `slug`) VALUES
(5, '<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/8zezZw15MF8?si=GsYTvuB2b0j8ic6K\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'TARI KREASI_Aniyanti_SMAN 2 KLUET UTARA_Kab Aceh Selatan_Aceh', 'Tari Kreasi Dalam Acara FL2SN Yang Di ikuti Anak Kami Aniyanti', '2024-03-14 11:56:04', '1', 'tari-kreasi_aniyanti_sman-2-kluet-utara_kab'),
(6, '<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/ijCUUZXYaSs?si=6r3Uy_Th8mvfsOWn\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'Memperingati Hari Guru Nasional SMA NEGERI 2 KLUET UTARA', '<p>Memperingati Hari Guru Nasional SMA NEGERI 2 KLUET UTARA<br></p>', '2024-03-14 12:04:01', '1', 'memperingati-hari-guru-nasional-sma'),
(7, '<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/T1vYAGMIMgw?si=qxM6GkbtCA9UP9ZY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'KRIYA_Lusi Narosa_SMAN 2 KLUET UTARA _KABUPATEN ACEH SELATAN_ACEH', '<h1 class=\"style-scope ytd-watch-metadata\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; word-break: break-word; font-family: Roboto, Arial, sans-serif; font-size: 2rem; line-height: 2.8rem; font-weight: 700; overflow: hidden; max-height: 5.6rem; -webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical; text-overflow: ellipsis; color: rgb(15, 15, 15);\"><yt-formatted-string force-default-style=\"\" class=\"style-scope ytd-watch-metadata\">KRIYA_Lusi Narosa_SMAN 2 KLUET UTARA _KABUPATEN ACEH SELATAN_ACEH</yt-formatted-string></h1>', '2024-03-14 16:51:51', '1', 'kriya_lusi-narosa_sman-2-kluet-utara'),
(8, '<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/bcEm4GvaUU4?si=DtPifNzmsYSbgMq-\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'HUT RI ke-78 KLuet Utara | Aksi PASKIBRA | 17 Agustus 2023', '<h1 class=\"style-scope ytd-watch-metadata\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; word-break: break-word; font-family: Roboto, Arial, sans-serif; font-size: 2rem; line-height: 2.8rem; font-weight: 700; overflow: hidden; max-height: 5.6rem; -webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical; text-overflow: ellipsis; color: rgb(15, 15, 15);\"><yt-formatted-string force-default-style=\"\" class=\"style-scope ytd-watch-metadata\">HUT RI ke-78 KLuet Utara | Aksi PASKIBRA | 17 Agustus 2023</yt-formatted-string></h1>', '2024-03-14 16:54:31', '1', 'hut-ri-ke-78-kluet-utara');

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` int(11) NOT NULL,
  `visi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visi`
--

INSERT INTO `visi` (`id`, `visi`) VALUES
(1, '<p style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\"><b>&nbsp;Misi Sekolah</b></p><p style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\">Misi sekolah adalah pernyataan yang merinci tindakan konkret yang akan diambil oleh sekolah untuk mencapai visinya.</p><p style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\">Ini adalah rencana kerja yang mencakup prinsip-prinsip Kurikulum Merdeka, seperti pendekatan berpusat pada siswa, pengembangan karakter, integrasi teknologi, dan kemitraan dengan komunitas.</p><ol><li style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\">Visi Sekolah SMAN 2 KLUET UTARA : Unggul Dalam Mutu dan Prestasi, Dilandasi Iman Dan Taqwa.</li><li style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\">Misi : 1. Meningkatkan Penguasaan Pengetahuan Intelektual Siswa Melalui Pengembangan Ilmu Pengetahuan Untuk Menghadapi&nbsp; &nbsp; &nbsp; Tantangan Kedepan.</li><li style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\">2.Meningkatkan Keterampilan Siswa Dalam Mengimplemantasikan Ilmu Pengetahuan, Teknologi, Olahraga, dan Seni Budaya.</li><li style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\">3.Mengambangkan Pribadi Siswa Yang Disiplin, Teliti, Tekun, Mandiri, Kreatif, Dan Berani Menghadapi Tantangan.</li><li style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\">4.Mengambangkan Pribadi Siswa Yang Mampu Menempatkan Dasar Keyakinan Terhadap Tuhan Yang Maha Esa, Sebagai Dasar Semua Perilaku.</li><li style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\">5.Menumbuhkembangkan Disiplin, Mental Dan Rohani Melalui Ajaran Agama Islam.</li><li style=\"margin: 17px 0px; color: rgb(20, 20, 43); font-family: Poppins, serif; font-size: 16px; letter-spacing: 0.1px;\">6.Menciptakan Sekolah Sebagai Wawasan Wiata Mandala.</li></ol>');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `visit_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `visit_time`) VALUES
(4, '::1', '2023-09-19 20:57:52'),
(5, '::1', '2023-09-20 08:30:04'),
(6, '::1', '2023-09-30 16:55:13'),
(7, '::1', '2023-10-03 17:05:24'),
(8, '::1', '2023-10-05 10:01:59'),
(9, '::1', '2023-10-06 00:59:48'),
(10, '::1', '2023-10-14 12:36:45'),
(11, '::1', '2023-10-24 10:18:18'),
(12, '::1', '2023-11-27 09:21:59'),
(13, '::1', '2023-11-29 19:01:59'),
(14, '::1', '2023-11-30 00:29:27'),
(15, '::1', '2024-02-28 09:48:33'),
(16, '::1', '2024-02-29 00:04:14'),
(17, '::1', '2024-03-01 21:27:38'),
(18, '::1', '2024-03-03 11:24:08'),
(19, '::1', '2024-03-04 00:08:20'),
(20, '140.213.136.188', '2024-03-13 23:58:13'),
(21, '140.213.136.188', '2024-03-14 00:00:30'),
(22, '114.122.11.13', '2024-03-14 00:05:49'),
(23, '162.243.4.24', '2024-03-14 00:05:55'),
(24, '114.122.9.177', '2024-03-14 00:10:21'),
(25, '104.164.173.144', '2024-03-14 00:10:53'),
(26, '104.164.173.83', '2024-03-14 00:10:58'),
(27, '114.122.9.173', '2024-03-14 00:11:41'),
(28, '114.122.11.17', '2024-03-14 00:21:02'),
(29, '5.164.29.116', '2024-03-14 00:44:58'),
(30, '114.122.4.109', '2024-03-14 01:12:01'),
(31, '205.169.39.96', '2024-03-14 01:13:52'),
(32, '205.169.39.114', '2024-03-14 01:14:28'),
(33, '196.240.190.90', '2024-03-14 01:18:04'),
(34, '135.148.100.196', '2024-03-14 02:20:24'),
(35, '104.166.80.2', '2024-03-14 02:32:54'),
(36, '104.166.80.6', '2024-03-14 02:33:17'),
(37, '54.247.57.72', '2024-03-14 02:39:23'),
(38, '133.242.174.119', '2024-03-14 03:01:49'),
(39, '146.70.184.28', '2024-03-14 05:52:01'),
(40, '185.204.1.225', '2024-03-14 05:52:03'),
(41, '67.205.164.144', '2024-03-14 07:51:19'),
(42, '47.242.224.70', '2024-03-14 10:00:30'),
(43, '114.122.7.104', '2024-03-14 10:45:26'),
(44, '114.122.7.104', '2024-03-14 10:45:26'),
(45, '114.122.8.51', '2024-03-14 10:51:40'),
(46, '114.122.6.145', '2024-03-14 10:54:55'),
(47, '114.122.7.255', '2024-03-14 11:10:35'),
(48, '104.164.173.32', '2024-03-14 12:26:33'),
(49, '104.164.173.33', '2024-03-14 12:26:37'),
(50, '154.28.229.59', '2024-03-14 12:27:36'),
(51, '104.164.173.11', '2024-03-14 12:27:41'),
(52, '171.244.43.14', '2024-03-14 12:43:03'),
(53, '114.122.4.151', '2024-03-14 12:49:14'),
(54, '114.122.11.23', '2024-03-14 12:50:57'),
(55, '47.88.94.28', '2024-03-14 14:28:36'),
(56, '47.251.13.32', '2024-03-14 14:28:36'),
(57, '114.122.8.52', '2024-03-14 15:39:47'),
(58, '194.163.181.182', '2024-03-14 16:02:00'),
(59, '36.82.96.51', '2024-03-14 17:59:14'),
(60, '114.122.9.27', '2024-03-14 18:40:41'),
(61, '114.122.9.14', '2024-03-14 19:05:41'),
(62, '36.77.92.150', '2024-03-14 19:19:32'),
(63, '114.122.23.217', '2024-03-14 22:51:40'),
(64, '104.166.80.192', '2024-03-15 02:34:55'),
(65, '104.166.80.17', '2024-03-15 02:36:09'),
(66, '104.166.80.241', '2024-03-15 03:48:46'),
(67, '104.166.80.151', '2024-03-15 03:58:56'),
(68, '183.129.153.157', '2024-03-15 05:54:44'),
(69, '87.236.176.48', '2024-03-15 06:07:35'),
(70, '104.143.252.76', '2024-03-15 06:27:19'),
(71, '45.134.184.206', '2024-03-15 06:27:21'),
(72, '35.203.252.230', '2024-03-15 06:28:57'),
(73, '35.203.252.207', '2024-03-15 06:29:13'),
(74, '35.203.241.73', '2024-03-15 06:29:25'),
(75, '199.45.154.18', '2024-03-15 09:20:54'),
(76, '5.164.29.116', '2024-03-15 09:22:10'),
(77, '199.45.155.16', '2024-03-15 09:58:44'),
(78, '199.45.155.32', '2024-03-15 10:28:35'),
(79, '147.78.103.90', '2024-03-15 11:12:32'),
(80, '114.122.15.62', '2024-03-15 12:54:29'),
(81, '114.122.14.174', '2024-03-15 15:56:52'),
(82, '114.122.15.222', '2024-03-15 16:45:31'),
(83, '114.122.21.232', '2024-03-15 17:47:38'),
(84, '157.230.1.131', '2024-03-16 01:49:12'),
(85, '104.166.80.62', '2024-03-16 02:36:25'),
(86, '104.166.80.32', '2024-03-16 02:36:31'),
(87, '103.102.228.228', '2024-03-16 07:52:52'),
(88, '147.78.103.90', '2024-03-16 08:37:15'),
(89, '159.223.239.95', '2024-03-16 09:10:58'),
(90, '114.122.4.186', '2024-03-16 14:37:10'),
(91, '114.122.7.255', '2024-03-16 15:10:53'),
(92, '52.167.144.174', '2024-03-16 15:27:03'),
(93, '114.122.7.85', '2024-03-16 15:58:07'),
(94, '34.195.25.237', '2024-03-16 15:58:27'),
(95, '114.122.20.229', '2024-03-16 16:00:37'),
(96, '114.122.8.36', '2024-03-16 16:01:36'),
(97, '114.122.13.249', '2024-03-16 16:02:46'),
(98, '114.122.12.233', '2024-03-16 16:04:48'),
(99, '182.3.7.83', '2024-03-16 16:24:23'),
(100, '114.122.15.2', '2024-03-16 16:24:47'),
(101, '140.213.19.142', '2024-03-16 16:28:44'),
(102, '114.122.15.152', '2024-03-16 16:32:53'),
(103, '114.122.4.128', '2024-03-16 16:40:55'),
(104, '36.85.109.207', '2024-03-16 16:47:18'),
(105, '182.3.9.186', '2024-03-16 16:51:51'),
(106, '36.85.109.93', '2024-03-16 16:57:31'),
(107, '114.122.20.209', '2024-03-16 17:12:23'),
(108, '114.122.10.223', '2024-03-16 17:13:30'),
(109, '114.122.23.47', '2024-03-16 17:16:06'),
(110, '114.122.23.119', '2024-03-16 17:33:44'),
(111, '36.82.98.147', '2024-03-16 17:36:40'),
(112, '36.82.97.41', '2024-03-16 18:03:32'),
(113, '43.240.224.110', '2024-03-16 18:42:55'),
(114, '182.3.7.248', '2024-03-16 19:12:16'),
(115, '114.122.20.238', '2024-03-16 20:21:13'),
(116, '110.50.81.199', '2024-03-16 20:21:54'),
(117, '103.179.248.159', '2024-03-17 00:13:56'),
(118, '103.179.248.159', '2024-03-17 00:13:56'),
(119, '114.122.7.255', '2024-03-17 00:53:08'),
(120, '54.36.148.190', '2024-03-17 01:56:58'),
(121, '104.166.80.36', '2024-03-17 02:27:45'),
(122, '104.166.80.211', '2024-03-17 02:28:16'),
(123, '54.36.148.238', '2024-03-17 03:26:26'),
(124, '54.36.148.37', '2024-03-17 03:43:35'),
(125, '54.36.148.98', '2024-03-17 04:03:07'),
(126, '54.36.149.62', '2024-03-17 04:22:14'),
(127, '114.122.4.99', '2024-03-17 04:36:51'),
(128, '54.36.148.138', '2024-03-17 04:41:19'),
(129, '54.36.148.186', '2024-03-17 05:00:10'),
(130, '54.36.148.15', '2024-03-17 05:22:41'),
(131, '54.36.148.89', '2024-03-17 05:40:19'),
(132, '54.36.148.135', '2024-03-17 05:41:21'),
(133, '54.36.148.57', '2024-03-17 05:42:07'),
(134, '54.36.149.8', '2024-03-17 05:42:43'),
(135, '54.36.148.182', '2024-03-17 05:43:10'),
(136, '114.122.21.220', '2024-03-17 05:57:09'),
(137, '54.36.148.51', '2024-03-17 06:29:19'),
(138, '54.36.149.67', '2024-03-17 07:20:15'),
(139, '54.36.148.44', '2024-03-17 08:08:36'),
(140, '114.122.4.193', '2024-03-17 11:57:30'),
(141, '44.211.31.252', '2024-03-17 14:14:41'),
(142, '3.236.222.46', '2024-03-17 14:48:27'),
(143, '114.122.5.55', '2024-03-17 21:20:31'),
(144, '104.166.80.166', '2024-03-18 02:21:55'),
(145, '104.166.80.158', '2024-03-18 02:22:05'),
(146, '143.110.247.247', '2024-03-18 04:12:40'),
(147, '178.62.71.191', '2024-03-18 09:13:13'),
(148, '164.92.77.216', '2024-03-18 12:46:12'),
(149, '40.77.167.38', '2024-03-18 12:58:39'),
(150, '156.146.46.229', '2024-03-18 17:35:39'),
(151, '52.167.144.191', '2024-03-18 22:41:55'),
(152, '104.166.80.66', '2024-03-19 02:27:11'),
(153, '104.166.80.77', '2024-03-19 02:29:33'),
(154, '66.249.68.35', '2024-03-19 03:46:36'),
(155, '66.249.71.193', '2024-03-19 03:47:45'),
(156, '66.249.68.37', '2024-03-19 03:47:46'),
(157, '114.122.12.67', '2024-03-19 12:27:19'),
(158, '114.122.7.130', '2024-03-19 12:42:57'),
(159, '162.142.125.220', '2024-03-19 15:15:41'),
(160, '199.45.155.34', '2024-03-19 15:33:45'),
(161, '40.77.167.14', '2024-03-19 15:45:18'),
(162, '199.45.154.64', '2024-03-19 15:48:09'),
(163, '167.94.138.51', '2024-03-19 15:53:55'),
(164, '52.149.22.81', '2024-03-19 16:12:31'),
(165, '52.167.144.181', '2024-03-19 19:42:11'),
(166, '202.74.40.142', '2024-03-19 22:09:39'),
(167, '27.115.124.109', '2024-03-19 22:16:59'),
(168, '40.77.167.68', '2024-03-19 23:09:41'),
(169, '104.166.80.38', '2024-03-20 01:44:35'),
(170, '104.166.80.209', '2024-03-20 01:46:49'),
(171, '104.166.80.252', '2024-03-20 14:46:35'),
(172, '104.166.80.192', '2024-03-20 14:46:36'),
(173, '85.208.96.210', '2024-03-20 18:06:56'),
(174, '182.3.6.194', '2024-03-20 20:03:07'),
(175, '52.167.144.209', '2024-03-20 20:08:02'),
(176, '36.65.40.214', '2024-03-20 23:16:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD KEY `id` (`id`);

--
-- Indexes for table `denah`
--
ALTER TABLE `denah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `denahbangunan`
--
ALTER TABLE `denahbangunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industri`
--
ALTER TABLE `industri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keutamaan`
--
ALTER TABLE `keutamaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`kegiatan_id`);

--
-- Indexes for table `tbl_rencanakegiatan`
--
ALTER TABLE `tbl_rencanakegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `denah`
--
ALTER TABLE `denah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `denahbangunan`
--
ALTER TABLE `denahbangunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `industri`
--
ALTER TABLE `industri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `keutamaan`
--
ALTER TABLE `keutamaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `kegiatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_rencanakegiatan`
--
ALTER TABLE `tbl_rencanakegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
