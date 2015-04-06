-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2014 at 11:44 PM
-- Server version: 5.0.70
-- PHP Version: 5.2.10-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elibrary3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(300) NOT NULL,
  `lama_peminjaman` tinyint(10) NOT NULL default '3',
  `denda_terlambat` int(30) default NULL,
  `ddc_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `lama_peminjaman`, `denda_terlambat`, `ddc_id`, `location_id`, `keterangan`, `created`, `modified`) VALUES
(2, 'Fiksi', 3, 2000, 5, 4, 'asd', '2010-12-03 02:48:54', '2011-03-21 02:16:34'),
(31, 'Biografis', 3, NULL, 0, 0, 'Biografi', '2011-01-11 19:25:55', '2014-04-28 21:45:29'),
(33, 'ini kategori', 3, NULL, 0, 0, 'Ini detail saja', '2014-04-28 15:19:11', '2014-04-28 21:45:37'),
(46, 'Ini Kategori Baru', 3, NULL, 0, 0, 'Ini keterangan', '2014-04-28 21:43:28', '2014-04-28 21:43:28'),
(48, 'Tambah ', 3, NULL, 0, 0, 'Tambah', '2014-04-28 21:52:51', '2014-04-28 21:52:51'),
(47, 'Ini nama kategori', 3, NULL, 0, 0, 'ini ketergang', '2014-04-28 21:45:50', '2014-04-28 21:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL auto_increment,
  `content` text NOT NULL,
  `user_id` int(15) NOT NULL,
  `status` smallint(2) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `status`, `created`, `updated`) VALUES
(1, 'bukunya ga ada pak', 1, 0, '2014-04-28 00:00:00', '2014-04-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ddcs`
--

CREATE TABLE IF NOT EXISTS `ddcs` (
  `id` int(11) NOT NULL auto_increment,
  `kode_ddc` varchar(222) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ddcs`
--

INSERT INTO `ddcs` (`id`, `kode_ddc`, `keterangan`, `created`, `modified`) VALUES
(4, '001', 'Sejarah', '2011-02-09 19:03:24', '2011-02-09 19:03:24'),
(5, '45665', 'Ilmiah', '2011-03-21 02:13:28', '2011-03-21 02:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE IF NOT EXISTS `ebooks` (
  `id` int(11) NOT NULL auto_increment,
  `kelas` int(11) default NULL,
  `matapelajaran` int(11) default NULL,
  `author` int(11) NOT NULL,
  `category_id` int(11) default NULL,
  `title` varchar(100) NOT NULL,
  `penerbit` varchar(200) default NULL,
  `pengarang` varchar(200) default NULL,
  `produksi` varchar(200) default NULL,
  `sutradara` varchar(200) default NULL,
  `jumlahhalaman` int(10) default NULL,
  `tahun` year(4) default NULL,
  `details` text,
  `cover` varchar(300) default NULL,
  `type` smallint(1) default NULL,
  `favorite` smallint(2) default NULL,
  `file` varchar(100) NOT NULL,
  `dir` varchar(255) default NULL,
  `mimetype` varchar(255) default NULL,
  `filesize` int(11) default NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `kelas`, `matapelajaran`, `author`, `category_id`, `title`, `penerbit`, `pengarang`, `produksi`, `sutradara`, `jumlahhalaman`, `tahun`, `details`, `cover`, `type`, `favorite`, `file`, `dir`, `mimetype`, `filesize`, `created`, `modified`) VALUES
(40, NULL, NULL, 1, 1, 'Ilmu Pengetahuan Alam Terpadu', 'Pusat Perbukuan Depdiknas', 'Setya Nurachmandani dan Tim', NULL, NULL, 100, 2011, 'Ilmu Pengetahuan Alam', 'img/cover.png', 1, NULL, 'Ilmu-Pengetahuan-Alam-(Terpadu).pdf', 'files/ebooks', 'application/pdf', 1209236, '2014-04-02 21:04:54', '2014-04-02 21:04:54'),
(41, NULL, NULL, 1, 1, 'Ilmu Pengetahuan Sosial', 'Pusat Perbukuan Depdiknas', 'Herlan Firmansyah', NULL, NULL, 100, 2011, 'Ilmu Pengetahuan Sosial', 'img/ips.png', 1, 1, 'Ilmu-Pengetahuan-Sosial-2.pdf', 'files/ebooks', 'application/pdf', 1209236, '2014-04-02 21:04:54', '2014-04-02 21:04:54'),
(42, NULL, NULL, 1, 1, 'Jelajah Cakrawala Sosial', 'Pusat Perbukuan Depdiknas', 'Nurhad dan Tim', NULL, NULL, 100, 2011, 'Jelajah Cakrawala Sosial', 'img/jelajah.png', 1, NULL, 'Jelajah-Cakrawala-Sosial.pdf', 'files/ebooks', 'application/pdf', 1209236, '2014-04-02 21:04:54', '2014-04-02 21:04:54'),
(43, NULL, NULL, 1, 1, 'Pendidikan Jasmani Olahraga dan Kesehatan', 'Pusat Perbukuan Depdiknas', 'Aan Sunjata Wisahati dan Tim', NULL, NULL, 100, 2011, 'Pendidikan Jasmani Olahraga dan Kesehatan', 'img/penjas.png', 1, 1, 'Pendidikan-Jasmani-Olahraga-dan-Kesehatan-3.pdf', 'files/ebooks', 'application/pdf', 1209236, '2014-04-02 21:04:54', '2014-04-02 21:04:54'),
(44, NULL, NULL, 1, 1, 'Pendidikan Kewarganegaraan', 'Pusat Perbukuan Depdiknas', 'Sugiyono dan Tim', NULL, NULL, 100, 2011, 'Pendidikan Kewarganegaraan', 'img/pkn.png', 1, NULL, 'Pendidikan-Kewarganegaraan.pdf', 'files/ebooks', 'application/pdf', 1209236, '2014-04-02 21:04:54', '2014-04-02 21:04:54'),
(45, NULL, NULL, 1, 1, 'Penunjang Belajar Matematika', 'Pusat Perbukuan Depdiknas', 'Dame Rosida Manik', NULL, NULL, 100, 2011, 'Penunjang Belajar Matematika', 'img/mtk.png', 1, NULL, 'Penunjang-Belajar-Matematika.pdf', 'files/ebooks', 'application/pdf', 1209236, '2014-04-02 21:04:54', '2014-04-02 21:04:54'),
(83, NULL, NULL, 1, 2, 'Non kemendiknass', 'ini', 'ini ', NULL, NULL, 100, 0000, 'dsf', 'img/2014-04-11-004853IPA.png', 1, NULL, 'Ilmu_Pengetahuan_Alam.pdf', 'files/ebooks', 'application/pdf', 8235690, '2014-04-11 00:40:29', '2014-04-13 05:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL auto_increment,
  `lokasi` varchar(211) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `lokasi`, `keterangan`, `created`, `modified`) VALUES
(4, 'Rak 1', 'Bawah', '2011-02-09 19:14:46', '2011-02-09 19:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL auto_increment,
  `scope` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(15) NOT NULL,
  `file` varchar(255) NOT NULL,
  `dir` varchar(255) NOT NULL,
  `mimetype` varchar(255) NOT NULL,
  `filesize` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `expiration_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `scope`, `title`, `content`, `user_id`, `file`, `dir`, `mimetype`, `filesize`, `created`, `expiration_date`) VALUES
(1, 1, 'This is title', 'ini judul baru uut', 1, '', '', '', '', '2014-04-27 02:04:20', '2034-01-01 00:00:00'),
(3, 0, 'Cari si uut', 'Siapa yang menemukan uut akan mendapat potongan denda 90%', 0, '', '', '', '', '2014-04-28 22:22:36', '2014-01-01 00:00:00'),
(6, 0, 'Ini judul', 'Ini adalah judul', 0, '', '', '', '', '2014-04-28 22:30:25', '2014-04-28 22:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `pelajarans`
--

CREATE TABLE IF NOT EXISTS `pelajarans` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pelajarans`
--

INSERT INTO `pelajarans` (`id`, `nama`, `created`, `modified`) VALUES
(1, 'Matematika', '2011-11-26 02:10:08', '2011-11-26 02:10:08'),
(2, 'Fisika', '2011-11-26 02:10:08', '2011-11-26 02:10:08'),
(3, 'Biologi', '2011-11-26 02:10:08', '2011-11-26 02:10:08'),
(4, 'Bahasa Indonesia', '2011-11-26 02:10:08', '2011-11-26 02:10:08'),
(5, 'Bahasa Inggris', '2011-11-26 02:10:08', '2011-11-26 02:10:08'),
(6, 'PPKN', '2011-11-26 02:10:08', '2011-11-26 02:10:08'),
(8, 'Kimia', '2012-06-11 04:57:13', '2012-06-11 04:57:13'),
(9, 'TIK', '2012-06-11 04:57:27', '2012-06-11 04:57:27'),
(10, 'Sosiologi', '2012-06-11 04:57:38', '2012-06-11 04:57:38'),
(11, 'Sejarah', '2012-06-11 04:58:09', '2012-06-11 04:58:09'),
(12, 'Geografi', '2012-06-11 04:58:20', '2012-06-11 04:58:20'),
(13, 'Ekonomi', '2012-06-11 04:58:27', '2012-06-11 04:58:27'),
(14, 'Peta Indonesia Interaktif', '2012-06-11 04:58:44', '2012-06-11 04:58:44'),
(15, 'BSE(Buku Sekolah Elektronik)', '2014-04-03 02:36:45', '2014-04-03 02:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) default NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_member` int(12) NOT NULL,
  `lahir` varchar(225) NOT NULL,
  `telpon` varchar(255) NOT NULL,
  `group` smallint(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `email`, `id_member`, `lahir`, `telpon`, `group`, `created`, `modified`) VALUES
(2, ' juga', 'Putra Rizkhy', 'uut123', 'uut@uut.com', 121212, '01/02/03', '', 0, '2014-04-28 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL auto_increment,
  `kelas` int(11) default NULL,
  `matapelajaran` int(11) default NULL,
  `author` int(11) NOT NULL,
  `category_id` int(11) default NULL,
  `title` varchar(100) NOT NULL,
  `penerbit` varchar(200) default NULL,
  `pengarang` varchar(200) default NULL,
  `produksi` varchar(200) default NULL,
  `sutradara` varchar(200) default NULL,
  `jumlahhalaman` int(10) default NULL,
  `tahun` year(4) default NULL,
  `details` text,
  `cover` varchar(300) default NULL,
  `type` smallint(1) NOT NULL,
  `file` varchar(100) NOT NULL,
  `dir` varchar(255) default NULL,
  `mimetype` varchar(255) default NULL,
  `filesize` int(11) default NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `kelas`, `matapelajaran`, `author`, `category_id`, `title`, `penerbit`, `pengarang`, `produksi`, `sutradara`, `jumlahhalaman`, `tahun`, `details`, `cover`, `type`, `file`, `dir`, `mimetype`, `filesize`, `created`, `modified`) VALUES
(5, NULL, NULL, 1, 7, 'Ini test video yang panjang judulnya ya mungkin	', NULL, NULL, 'ini produksi', 'Ini test video yang panjang judulnya ya mungkin	', NULL, 2011, 'ini resensiyang panjang judulnya ya mungkin	ini resensiyang panjang judulnya ya mungkin	', 'img/2014-04-12-185516film_ss.png', 1, 'Dokumenter_Earth_Hour_Indonesia_20142.mp4', 'files/videos', 'video/mp4', 20469737, '2014-04-12 00:00:00', '2014-04-12 00:00:00'),
(8, NULL, NULL, 1, 7, 'Ini test video', NULL, NULL, 'dsfdsf', 'sdfsdf', NULL, 2010, 'dsfsdf', 'img/2014-04-12-190417Screen_Shot_2014-03-26_at_4.46.47_AM.png', 1, 'Dokumenter_Earth_Hour_Indonesia_20145.mp4', 'files/videos', 'video/mp4', 20469737, '2014-04-12 00:00:00', '2014-04-12 00:00:00'),
(9, NULL, NULL, 1, 7, 'Tambahan lagi ', NULL, NULL, 'ini adalah tambahan', 'Ini adalah tambahan', NULL, 0000, 'ini resensi', 'img/2014-04-12-190907Screen_Shot_2014-03-26_at_4.34.44_AM.png', 1, 'Dokumenter_Earth_Hour_Indonesia_20146.mp4', 'files/videos', 'video/mp4', 20469737, '2014-04-12 00:00:00', '2014-04-13 03:50:39'),
(10, NULL, NULL, 1, 8, 'Ini iptek kita', NULL, NULL, 'sf', 'insaf', NULL, 0000, 'Ini adalah resensi', 'img/2014-04-12-191037Screen_Shot_2014-03-26_at_4.25.56_AM.png', 1, 'Dokumenter_Earth_Hour_Indonesia_20147.mp4', 'files/videos', 'video/mp4', 20469737, '2014-04-12 00:00:00', '2014-04-13 04:18:48'),
(13, NULL, NULL, 1, 7, 'Tambah Lagi Ya', NULL, NULL, 'produksi', 'Ini sutradara', NULL, 2011, 'ini resensi', 'img/2014-04-12-191825Screen_Shot_2014-03-26_at_4.40.18_AM.png', 1, 'Dokumenter_Earth_Hour_Indonesia_201410.mp4', 'files/videos', 'video/mp4', 20469737, '2014-04-12 00:00:00', '2014-04-12 00:00:00');
