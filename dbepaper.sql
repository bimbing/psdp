-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2015 at 12:59 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbepaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `rb_halaman`
--

CREATE TABLE IF NOT EXISTS `rb_halaman` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `rb_halaman`
--

INSERT INTO `rb_halaman` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(46, 'Informasi Terbaru Tentang E-paper Singgalang', 'informasi-terbaru-tentang-epaper-singgalang', 'Konten berita Tunggul.com ditulis secara tajam, singkat, padat, dan dinamis sebagai respons terhadap tuntutan masyarakat yang semakin efisien dalam membaca berita. Selain itu konsep portal berita online juga semakin menjadi pilihan masyarakat karena sifatnya yang up-to-date dan melaporkan kejadian peristiwa secara instant pada saat itu juga sehingga masyarakat tidak perlu menunggu sampai esok harinya untuk membaca berita yang terjadi.\r\n\r\nTunggul.com resmi diluncurkan (Commercial Launch) sebagai portal berita pada 1 Maret 2007) dan merupakan cikal-bakal bisnis online pertama milik PT Php MU Tbk, sebuah perusahan media terintegrasi yang terbesar di Indonesia dan di Asia Tenggara. PHPMU juga memiliki dan mengelola bisnis media TV (RCTI, MNC TV, Global TV), media cetak (Koran Seputar Indonesia, Tabloid Genie, Tabloid Mom & Kiddie, majalah HighEnd, dan Trust), media radio (SINDO, Trijaya FM, ARH Global, Radio Dangdut Indonesia, V Radio), serta sejumlah bisnis media lainnya.\r\n\r\nSampai dengan bulan Oktober 2008, Tunggul.com mendapatkan peringkat ke 24 dari Top 100 website terpopuler di Indonesia (Sumber: Alexa.com), peringkat ini terus naik yang disebabkan semakin banyak pengunjung situs yang mengakses Tunggul.com setiap harinya. Selain itu, jumlah pengguna internet yang mencapai 25 juta (Sumber: data APJII per 2005) diperkirakan untuk terus tumbuh dengan signifikan dalam beberapa tahun ke depan.\r\n\r\nSampai dengan bulan Oktober 2008, Tunggul.com mendapatkan peringkat ke 24 dari Top 100 website terpopuler di Indonesia (Sumber: Alexa.com), peringkat ini terus naik yang disebabkan semakin banyak pengunjung situs yang mengakses Tunggul.com setiap harinya. Selain itu, jumlah pengguna internet yang mencapai 25 juta (Sumber: data APJII per 2005) diperkirakan untuk terus tumbuh dengan signifikan dalam beberapa tahun ke depan.', '2014-04-07', '', 'admin', 140, '13:10:57', 'Senin'),
(48, 'Cara Berlangganan E-paper Singgalang', 'cara-berlangganan-epaper-singgalang', 'Tunggul.com merupakan portal online berita dan hiburan yang berfokus pada pembaca Indonesia baik yang berada di tanah air maupun yang tinggal di luar negeri. Berita Tunggul.com diupdate selama 24 jam dan mendapatkan kunjungan lebih dari 190 juta pageviews setiap bulannya (Sumber: Google Analytics).\r\n\r\nTunggul.com memiliki beragam konten dari berita umum, politik, peristiwa, internasional, ekonomi, lifestyle, selebriti, sports, bola, auto, teknologi, dan lainya. Tunggul juga merupakan salah satu portal pertama yang memberikan inovasi konten video dan mobile (handphone). Para pembaca kami adalah profesional, karyawan kantor, pengusaha, politisi, pelajar, dan ibu rumah tangga.\r\n\r\nTunggul.com memiliki beragam konten dari berita umum, politik, peristiwa, internasional, ekonomi, lifestyle, selebriti, sports, bola, auto, teknologi, dan lainya. Tunggul juga merupakan salah satu portal pertama yang memberikan inovasi konten video dan mobile (handphone). Para pembaca kami adalah profesional, karyawan kantor, pengusaha, politisi, pelajar, dan ibu rumah tangga.\r\n\r\nTunggul.com memiliki beragam konten dari berita umum, politik, peristiwa, internasional, ekonomi, lifestyle, selebriti, sports, bola, auto, teknologi, dan lainya. Tunggul juga merupakan salah satu portal pertama yang memberikan inovasi konten video dan mobile (handphone). Para pembaca kami adalah profesional, karyawan kantor, pengusaha, politisi, pelajar, dan ibu rumah tangga.\r\n\r\nTunggul.com memiliki beragam konten dari berita umum, politik, peristiwa, internasional, ekonomi, lifestyle, selebriti, sports, bola, auto, teknologi, dan lainya. Tunggul juga merupakan salah satu portal pertama yang memberikan inovasi konten video dan mobile (handphone). Para pembaca kami adalah profesional, karyawan kantor, pengusaha, politisi, pelajar, dan ibu rumah tangga.', '2014-04-07', '', 'admin', 233, '13:32:28', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `rb_hubungi`
--

CREATE TABLE IF NOT EXISTS `rb_hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `website` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `rb_hubungi`
--

INSERT INTO `rb_hubungi` (`id_hubungi`, `nama`, `email`, `website`, `pesan`, `tanggal`, `jam`, `dibaca`) VALUES
(34, 'Landung Trilaksono', 'landungtrilaksono@gmail.com', 'Nomer kontak jurusan akuntansi', 'Maaf saya mau hubungi jurusan akuntansi di nomer berapa ya? Terima kasih', '2013-10-16', '00:00:00', 'Y'),
(35, 'Yusri Renor', 'aciafifah@gmail.com', 'pertanyaan', 'bagaimana cara mengunduh nomor ujian fak. pertanian', '2014-01-19', '00:00:00', 'Y'),
(42, 'Robby Prihandaya', 'robby.prihandaya@gmail.com', 'www.phpmu.com', 'Saya mau berlangganan e-paper singgalang, bagaimana caranya ?', '2015-03-31', '06:14:18', 'N'),
(41, 'Robby Prihandaya', 'robby.prihandaya@gmail.com', 'www.phpmu.com', 'Saya mau berlangganan e-paper singgalang, bagaimana caranya ?', '2015-03-31', '06:13:05', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `rb_konfirmasi`
--

CREATE TABLE IF NOT EXISTS `rb_konfirmasi` (
  `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT,
  `id_orders_detail` int(5) NOT NULL,
  `pemegang_rek` varchar(255) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `cara_bayar` varchar(100) NOT NULL,
  `rekening` int(5) NOT NULL,
  `total_transfer` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `tanggal_bayar` varchar(100) NOT NULL,
  `tanggal_konfirmasi` datetime NOT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rb_konfirmasi`
--

INSERT INTO `rb_konfirmasi` (`id_konfirmasi`, `id_orders_detail`, `pemegang_rek`, `no_rekening`, `cara_bayar`, `rekening`, `total_transfer`, `pesan`, `bukti_bayar`, `tanggal_bayar`, `tanggal_konfirmasi`) VALUES
(3, 6, 'Robby Prihandaya', '3511887071', 'Transfer', 2, 'Rp 2003', 'saya sudah bayar, silahkan di cek,.', 'picture001.jpg', '2015-04-05', '2015-04-05 09:09:28'),
(4, 11, 'Vicky Armitha', '4616787721', 'Transfer', 2, 'Rp 15000', 'Saya sudah bayar, mohon di cek pemayaran dari saya, Terima kasih,..', 'buktipicture001.jpg', '2015-04-15', '2015-04-15 12:51:31'),
(5, 12, 'Robby Prihandaya', '3511887071', 'Transfer', 1, 'Rp 15000', 'saya sudah bayar,..', 'buktipicweweture001.jpg', '2015-04-05', '2015-04-15 14:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `rb_members`
--

CREATE TABLE IF NOT EXISTS `rb_members` (
  `id_members` int(5) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `login_total` int(11) NOT NULL,
  `login_terakhir` datetime NOT NULL,
  `level` enum('Members','Admin') NOT NULL DEFAULT 'Members',
  PRIMARY KEY (`id_members`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rb_members`
--

INSERT INTO `rb_members` (`id_members`, `nama_lengkap`, `email`, `no_telpon`, `alamat_lengkap`, `tanggal_daftar`, `login_total`, `login_terakhir`, `level`) VALUES
(1, 'Robby Prihandaya', 'robby.prihandaya@gmail.com', '081011526301', 'Tunggul Hitam, Padang', '2015-03-31 08:38:23', 47, '2015-04-15 14:48:54', 'Admin'),
(2, 'Dewi Safitri', 'dewi.safitri@gmail.com', '082173054501', 'Siteba, Padang', '2015-03-31 09:36:06', 1, '2015-03-31 09:47:41', 'Admin'),
(3, 'Udin Sedunia', 'udin.sedunia@gmail.com', '081267771300', 'Lubuk Begalung, Padang', '2015-04-02 10:43:09', 2, '2015-04-14 18:08:22', 'Members'),
(6, 'Faradika', 'faradika@gmail.com', '081267771388', 'Lubuak Minturun.', '2015-04-04 14:57:38', 2, '2015-04-05 02:43:15', 'Members'),
(7, 'Randy Komara Yudha', 'randy.komara@gmail.com', '081267771309', 'Tiaka, Payakumbuh.', '2015-04-04 15:10:43', 4, '2015-04-14 18:00:56', 'Members'),
(8, 'Randy Komara Yudha', 'randy.komara@gmail.com', '1212121212112', 'sdasdas dasd asd asd asd asdasdasda dasdadas', '2015-04-08 07:07:04', 4, '2015-04-14 09:40:02', 'Members'),
(9, 'Vicky Armita', 'vicky.armita@gmail.com', '081267341211', 'Tunggul Hitam, Padang', '2015-04-15 12:49:49', 0, '2015-04-15 12:51:53', 'Members'),
(10, 'Amaik Sutarman', 'amaik.sutarman@gmail.com', '081267771367', 'Lubuk Begalung, padang, Sumatra Barat', '2015-04-15 14:37:47', 1, '2015-04-15 14:44:14', 'Members');

-- --------------------------------------------------------

--
-- Table structure for table `rb_messages`
--

CREATE TABLE IF NOT EXISTS `rb_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `room` varchar(22) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(40) NOT NULL,
  `stat` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1826 ;

--
-- Dumping data for table `rb_messages`
--

INSERT INTO `rb_messages` (`id`, `user`, `message`, `room`, `date_time`, `ip_address`, `stat`) VALUES
(1822, '1', '', '6-1', '2015-04-05 06:09:16', '::1', 1),
(1823, '1', 'etererer', '6-1', '2015-04-05 06:14:26', '::1', 1),
(1824, '10', 'halooo admin, saya sudah membayar,..', '1-10', '2015-04-15 12:39:28', '::1', 0),
(1825, '1', 'oke mas, saya cek dulu,..', '10-1', '2015-04-15 12:40:22', '::1', 0),
(1818, '6', 'testing lagi,.', '1-6', '2015-04-05 00:37:35', '::1', 0),
(1819, '1', 'Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, keutamaan menjadi premium member : anda bisa mendapatkan', '6-1', '2015-04-05 00:39:15', '::1', 0),
(1820, '6', 'Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya,...', '1-6', '2015-04-05 00:39:34', '::1', 0),
(1821, '1', 'oke lah bob,.', '6-1', '2015-04-05 00:42:55', '::1', 0),
(1812, '1', 'oke mas bro, akan kita proses secepatnya,..', '7-1', '2015-04-04 18:23:48', '::1', 0),
(1813, '7', 'Haloo admin singgalang, bisa bantu saya?', '1-7', '2015-04-04 18:39:13', '::1', 0),
(1814, '7', 'terima kasih mas robby,..', '1-7', '2015-04-04 18:39:34', '::1', 0),
(1815, '7', 'Hai Admin cantik, Apa kabar ?', '2-7', '2015-04-04 18:57:04', '::1', 1),
(1816, '1', 'oke bob, silahkan,...', '6-1', '2015-04-05 00:35:24', '::1', 0),
(1817, '6', 'oke robi, mokasih yo,..', '1-6', '2015-04-05 00:36:16', '::1', 0),
(1801, '1', 'Haloooo Selamat bergabung, Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, \nkeutamaan menjadi premium member : anda bisa mendapatkan semua file atau program apapun di www.phpmu.com semuanya \ntanpa terkecuali secara gratis, atau tanpa perlu donasi lagi, hubungi saya di 081267771344 untuk mengaktifkan account anda. Terima Kasih,...', '2-1', '2015-01-16 23:32:39', '36.68.36.103', 0),
(1802, '2', 'Haloooo Selamat bergabung, Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, \nkeutamaan menjadi premium member : anda bisa mendapatkan semua file atau program apapun di www.phpmu.com semuanya \ntanpa terkecuali secara gratis, atau tanpa perlu donasi lagi, hubungi saya di 081267771344 untuk mengaktifkan account anda. Terima Kasih,...', '1-2', '2015-01-16 23:33:12', '36.68.36.103', 0),
(1803, '1', 'ini serius kagak nipu kan uda? saya mau program AHP', '2-1', '2015-01-16 16:37:47', '36.76.224.125', 0),
(1804, '3', 'Haloooo Selamat bergabung, Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, \nkeutamaan menjadi premium member : anda bisa mendapatkan semua file atau program apapun di www.phpmu.com semuanya \ntanpa terkecuali secara gratis, atau tanpa perlu donasi lagi, hubungi saya di 081267771344 untuk mengaktifkan account anda. Terima Kasih,...', '1-3', '2015-01-16 23:51:26', '36.68.36.103', 0),
(1805, '1', 'Haloooo Selamat bergabung, Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, \nkeutamaan menjadi premium member : anda bisa mendapatkan semua file atau program apapun di www.phpmu.com semuanya \ntanpa terkecuali secara gratis, atau tanpa perlu donasi lagi, hubungi saya di 081267771344 untuk mengaktifkan account anda. Terima Kasih,...', '3-1', '2015-01-17 00:22:14', '36.68.36.103', 0),
(1806, '1', 'Haloooo Selamat bergabung, Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, \nkeutamaan menjadi premium member : anda bisa mendapatkan semua file atau program apapun di www.phpmu.com semuanya \ntanpa terkecuali secara gratis, atau tanpa perlu donasi lagi, hubungi saya di 081267771344 untuk mengaktifkan account anda. Terima Kasih,...', '6-1', '2015-01-17 00:31:56', '36.68.36.103', 0),
(1807, '6', 'login dan password swarakalibata apa ya', '1-6', '2015-01-16 17:58:17', '36.76.51.224', 0),
(1808, '1', 'Iya mas, harus donasi,..', '6-1', '2015-02-01 18:12:28', '::1', 0),
(1809, '7', 'Haloooo Selamat bergabung, Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, \r\nkeutamaan menjadi premium member : anda bisa mendapatkan semua file atau program apapun di www.phpmu.com semuanya \r\ntanpa terkecuali secara gratis, atau tanpa perlu donasi lagi, hubungi saya di 081267771344 untuk mengaktifkan account anda. Terima Kasih,...', '1-7', '2015-02-01 18:56:49', '36.68.36.103', 0),
(1810, '1', 'Haloooo Selamat bergabung, Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, \r\nkeutamaan menjadi premium member : anda bisa mendapatkan semua file atau program apapun di www.phpmu.com semuanya \r\ntanpa terkecuali secara gratis, atau tanpa perlu donasi lagi, hubungi saya di 081267771344 untuk mengaktifkan account anda. Terima Kasih,...', '7-1', '2015-02-01 18:59:14', '36.68.36.103', 0),
(1811, '6', 'Haloooo Selamat bergabung, Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, \r\nkeutamaan menjadi premium member : anda bisa mendapatkan semua file atau program apapun di www.phpmu.com semuanya \r\ntanpa terkecuali secara gratis, atau tanpa perlu donasi lagi, hubungi saya di 081267771344 untuk mengaktifkan account anda. Terima Kasih,...', '1-6', '2015-03-27 22:12:37', '36.68.36.103', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rb_orders`
--

CREATE TABLE IF NOT EXISTS `rb_orders` (
  `id_orders` int(5) NOT NULL AUTO_INCREMENT,
  `id_members` int(5) NOT NULL,
  `tanggal_batas` datetime NOT NULL,
  PRIMARY KEY (`id_orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rb_orders`
--

INSERT INTO `rb_orders` (`id_orders`, `id_members`, `tanggal_batas`) VALUES
(1, 1, '2015-06-12 00:00:00'),
(2, 3, '2015-06-07 00:00:00'),
(5, 2, '2015-07-07 00:00:00'),
(8, 6, '2015-05-11 15:06:31'),
(9, 7, '2015-06-03 00:00:00'),
(10, 8, '2015-04-08 00:00:00'),
(11, 9, '2015-04-22 00:00:00'),
(12, 10, '2015-04-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rb_orders_detail`
--

CREATE TABLE IF NOT EXISTS `rb_orders_detail` (
  `id_orders_detail` int(5) NOT NULL AUTO_INCREMENT,
  `id_orders` int(5) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `tanggal_orders` datetime NOT NULL,
  `tanggal_aktif` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('Ya','Tidak','Konfirmasi') NOT NULL DEFAULT 'Tidak',
  `admin` int(5) NOT NULL,
  PRIMARY KEY (`id_orders_detail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `rb_orders_detail`
--

INSERT INTO `rb_orders_detail` (`id_orders_detail`, `id_orders`, `id_paket`, `tanggal_orders`, `tanggal_aktif`, `keterangan`, `status`, `admin`) VALUES
(1, 5, 3, '2015-04-04 02:11:00', '2015-04-05 04:58:15', 'Tolong dibantu ya,..', 'Ya', 1),
(2, 2, 3, '2015-03-31 08:38:23', '2015-04-05 04:53:56', 'Orderan Pertama kali,..', 'Tidak', 0),
(3, 1, 2, '2015-03-31 07:24:05', '2015-04-01 00:00:00', 'Bagaimana cara tranferya,..', 'Tidak', 0),
(4, 1, 2, '2015-04-02 10:43:09', '2015-04-04 12:31:04', 'Tolong di aktifkan paket saya,..', 'Ya', 0),
(5, 1, 2, '2015-04-04 14:42:35', '2015-04-05 04:52:50', 'Mohon dibantu untuk perpanjang paket langganan saya,..', 'Ya', 0),
(6, 1, 1, '2015-04-04 14:50:48', '2015-04-04 16:17:43', 'Tolong di aktifkan secepatnya,...', 'Konfirmasi', 0),
(7, 8, 2, '2015-04-04 14:57:38', '2015-04-04 15:06:31', 'Pertama Kali Pesan,..', 'Ya', 0),
(8, 9, 3, '2015-04-04 00:00:00', '2015-04-04 15:42:27', 'Pertama Kali Pesan,..', 'Ya', 0),
(9, 8, 3, '2015-04-05 02:40:02', '2015-04-05 04:53:46', 'saya mau tambah paket lagi, nanti saya bayar,..', 'Tidak', 0),
(10, 10, 1, '2015-04-08 07:07:04', '0000-00-00 00:00:00', 'Pertama Kali Pesan,..', 'Tidak', 0),
(11, 11, 2, '2015-04-15 12:49:49', '2015-04-15 12:52:33', 'Pertama Kali Pesan,..', 'Ya', 1),
(12, 12, 2, '2015-04-15 14:37:47', '2015-04-15 14:41:05', 'Pertama Kali Pesan,..', 'Ya', 1),
(13, 12, 3, '2015-04-15 14:42:47', '0000-00-00 00:00:00', 'saya pesan yang 30 hari,..', 'Tidak', 0),
(14, 1, 3, '2015-05-13 12:00:16', '2015-05-13 12:00:33', 'saya pesan lagi,...', 'Ya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rb_paket`
--

CREATE TABLE IF NOT EXISTS `rb_paket` (
  `id_paket` int(5) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(150) NOT NULL,
  `lama` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rb_paket`
--

INSERT INTO `rb_paket` (`id_paket`, `nama_paket`, `lama`, `harga`) VALUES
(1, 'Paket Harian', 1, 2000),
(2, 'Paket Mingguan', 7, 15000),
(3, 'Paket Bulanan', 30, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `rb_produk`
--

CREATE TABLE IF NOT EXISTS `rb_produk` (
  `id_produk` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `cover` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` time NOT NULL,
  `hits` int(3) NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rb_produk`
--

INSERT INTO `rb_produk` (`id_produk`, `judul`, `nama_file`, `cover`, `keterangan`, `tgl_posting`, `jam`, `hits`, `aktif`) VALUES
(1, 'SABTU, 28 MARET 2014', 'ebook1.pdf', '3-maret.jpg', 'Harian Singgalang Edisi SABTU, 28 MARET 2015', '2015-03-29', '16:51:04', 24, 'Y'),
(2, 'JUMAT, 27 AGUSTUS 2014', 'search-engine-optimization-starter-guide.pdf', '3-MARET-2015.jpg', 'Harian Singgalang Edisi JUMAT, 27 MARET 2015', '2015-03-29', '14:07:00', 22, 'Y'),
(3, 'KAMIS, 26 DESEMBER 2014', 'Absen_Mahasiswa.pdf', '4-maret-2015.jpg', 'Harian Umum Singgalang Edisi KAMIS, 26 MARET 2015', '2015-03-29', '16:51:04', 19, 'Y'),
(4, 'RABU, 25 FEBRUARI 2015', 'forward_backward.pdf', '9-MARET-2015.jpg', 'Harian Singgalang Edisi RABU, 25 MARET 2015', '2015-03-29', '12:56:00', 19, 'Y'),
(5, 'SELASA, 24 MARET 2015', 'Hukum_Lingkungan_1.pdf', '18-jan.jpg', 'Harian Umum Singgalang Edisi SELASA, 24 MARET 2015', '2015-03-29', '16:51:04', 22, 'Y'),
(6, 'SENIN, 23 APRIL 2015', 'Kartu_Ujian_Dewi.pdf', '28-FEBRUARI-2015.jpg', 'Harian Umum Singgalang Edisi SENIN, 23 MARET 2015', '2015-03-29', '08:45:00', 27, 'Y'),
(7, 'SABTU, 15 APRIL 2015', 'ebook1.pdf', 'RABU-25-MARET-2015.jpg', 'Harian Singgalang Edisi SABTU, 15 APRIL 2015', '2015-03-29', '16:51:04', 24, 'Y'),
(8, 'JUMAT, 16 APRIL 2015', 'search-engine-optimization-starter-guide.pdf', 'RABU-18-MARET-2015.jpg', 'Harian Singgalang Edisi JUMAT, 16 APRIL 2015', '2015-03-29', '14:07:00', 22, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `rb_statistik`
--

CREATE TABLE IF NOT EXISTS `rb_statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_statistik`
--

INSERT INTO `rb_statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('::1', '2015-04-05', 283, '1428219047'),
('::1', '2015-04-07', 21, '1428377377'),
('::1', '2015-04-08', 243, '1428470926'),
('::1', '2015-04-10', 6, '1428673843'),
('::1', '2015-04-14', 376, '1429028572'),
('127.0.0.1', '2015-04-14', 1, '1429027135'),
('::1', '2015-04-15', 223, '1429102134'),
('::1', '2015-04-16', 3, '1429166019'),
('::1', '2015-05-13', 43, '1431511376'),
('::1', '2015-05-15', 1, '1431651283');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
