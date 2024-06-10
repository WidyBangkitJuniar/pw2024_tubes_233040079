-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2024 at 05:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040079`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Art Karakter'),
(2, 'Art Muka'),
(3, 'Art View');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `kategori_id` int NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ketersediaan` enum('Habis','Tersedia') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Tersedia',
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `foto`, `detail`, `nama`, `ketersediaan`, `harga`) VALUES
(1, 1, 'xwCAgEH4UK6KAKhZdrtm.jpg', '                                                                             Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br> \r\nLukisan ini menggambarkan karakter The Flash. The Flash mengenakan kostumnya yang khas berwarna merah dan kuning, dengan logo petir di dadanya, dan ekspresinya penuh tekad dan fokus.\r\n\r\n                                                                                ', 'The Flash Art', 'Tersedia', 230000),
(2, 2, 'ngJk22rk1UkwcjkdHmYl.jpg', 'Tahun : 2024 <br>\nMedia : Cat minyak diatas kanvas <br>\nUkuran : 40x50 cm <br>\nKondisi : Baru <br>\n<br>\nDeskripsi : <br>\nLukisan ini menggambarkan orang yang sedang merokok.\n\n', 'Muka 1 Art', 'Tersedia', 145000),
(3, 3, 'Njp5brlUwScJNbgJsmyF.jpg', 'Tahun : 2024 <br>\nMedia : Cat minyak diatas kanvas <br>\nUkuran : 40x50 cm <br>\nKondisi : Baru <br>\n<br>\nDeskripsi : <br>\nLukisan ini menggambarkan pemandangan bukit dan pesawahan yang berada di kampung dareah.\n\n', 'Pemandangan 1 Art', 'Tersedia', 300000),
(4, 1, 'YzJx8H0jol5BqBcIN6G8.jpg', 'Tahun : 2024 <br>\nMedia : Cat minyak diatas kanvas <br>\nUkuran : 40x50 cm <br>\nKondisi : Baru <br>\n<br>\nDeskripsi : <br>\nLukisan ini menggambarkan karakter adventure time yang sedang berada di luar angkasa.\n\n\n', 'Adventure Time Art', 'Tersedia', 210000),
(5, 2, 'O6NgnmEL5Ez9BIMHFRr4.jpg', 'Tahun : 2024 <br>\nMedia : Cat minyak diatas kanvas <br>\nUkuran : 40x50 cm <br>\nKondisi : Baru <br>\n<br>\nDeskripsi : <br>\nLukisan ini menggambarkan muka orang dengan ekspresi yang konyol.\n\n', 'Muka 2 Art', 'Tersedia', 99000),
(6, 1, '8JPaud5Trx7ZROhA7oyR.jpg', 'Tahun : 2024 <br>\nMedia : Cat minyak diatas kanvas <br>\nUkuran : 40x50 cm <br>\nKondisi : Baru <br>\n<br>\nDeskripsi : <br>\nLukisan ini menggambarkan karakter Superman. Superman mengenakan kostumnya yang khas berwarna biru dan merah, dengan jubah merah berkibar tertiup angin. Wajahnya penuh dengan tekad dan kebanggaan. Ekspresi Superman penuh tekad dan kebanggaan untuk melindungi Bumi.\n\n\n\n', 'Superman Art', 'Tersedia', 199000),
(7, 3, 'xxoYuC90LUtJ5iXHYBct.jpg', 'Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br>\r\nLukisan ini menggambarkan pemandangan di sebuah pedesaan.\r\n\r\n\r\n', 'Pemandangan 2 Art', 'Tersedia', 88000),
(8, 1, '0yhOh9UkwLSW35hviDfn.jpg', 'Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br>\r\nLukisan ini menggambarkan karakter Jerry yang seperti Mafia.\r\n\r\n\r\n', 'Jerry Art', 'Tersedia', 233000),
(9, 1, 'RhVEHRvmUOb7nxLfha59.jpg', 'Tahun : 2024 <br>\nMedia : Cat minyak diatas kanvas <br>\nUkuran : 40x50 cm <br>\nKondisi : Baru <br>\n<br>\nDeskripsi : <br>\nLukisan ini menggambarkan karakter Batman. Batman mengenakan kostumnya yang khas berwarna hitam, dengan jubah berkibar tertiup angin. Wajahnya tertutup topeng, dan matanya hitam dengan tekad yang tajam. Ekspresi Batman penuh tekad dan siap untuk melindungi kota dari kejahatan.\n\n\n', 'Batman Art', 'Tersedia', 155000),
(10, 3, 'tnyqa0SvQOhX1qVXOeWq.jpg', 'Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br>\r\nLukisan ini menggambarkan pemandangan bebukitan dan sungai yang berada di tepi jalan.\r\n\r\n', 'Pemandangan 3 Art', 'Tersedia', 550000),
(11, 1, 'svjASw7yysIMCF2mZRJJ.jpg', 'Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br>\r\nLukisan ini menggambarkan karakter Squidward yang merasa kegelisahan dengan adanya Spongebob dan Patrick\r\n\r\n', 'Squidward Art', 'Tersedia', 77000),
(12, 3, 'buecQRLP7Kw6LMn8jFpL.jpg', '                                                                                                Tahun : 2024 &lt;br&gt;\r\nMedia : Cat minyak diatas kanvas &lt;br&gt;\r\nUkuran : 40x50 cm &lt;br&gt;\r\nKondisi : Baru &lt;br&gt;\r\n&lt;br&gt;\r\nDeskripsi : &lt;br&gt;\r\nLukisan ini menggambarkan pemandangan gunung es dari kejauhan yang sangat indah.\r\n\r\n                                                                                ', 'Pemandangan 4 Art', 'Tersedia', 147000),
(13, 1, 'q1gIp3lR07sB2ML9vAbV.jpg', 'Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br>\r\nLukisan ini menggambarkan karakter Hulk. Kulitnya berwarna hijau cerah dan rambutnya berwarna hitam kusut. Ekspresi Hulk penuh amarah dan siap untuk menghancurkan apapun yang ada di depannya.\r\n\r\n', 'Hulk Art', 'Tersedia', 120000),
(14, 2, 'O3bmRl1dsZ533bIt3CxY.jpg', 'Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br>\r\nLukisan ini menggambarkan muka dengan frekuensi gelombang yang ada di telinganya.\r\n', 'Muka 3 Art', 'Tersedia', 78000),
(15, 1, '0j0jVREJkNJqF4LdKoPB.jpg', 'Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br>\r\nLukisan ini menggambarkan karakter Tom & Jerry yang sedang akrab dan berpose elegant.\r\n', 'Tom &amp; Jerry Art', 'Tersedia', 411000),
(16, 1, 'd5Yg6BdSG6tQ0FWr7nLD.jpg', 'Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br>\r\nLukisan ini menggambarkan karakter Captain America. Captain America mengenakan kostumnya yang khas berwarna biru, merah, dan putih, dengan perisai vibraniumnya yang ikonik di tangan. Wajahnya penuh dengan tekad dan keberanian, siap untuk melawan penjahat yang mengancam negaranya. Ekspresi Captain America penuh tekad dan siap untuk menegakkan keadilan.\r\n', 'Captain Amerika', 'Tersedia', 175000),
(17, 2, '8LDYWTfqgBz60sjkdLtT.jpg', 'Tahun : 2024 <br>\r\nMedia : Cat minyak diatas kanvas <br>\r\nUkuran : 40x50 cm <br>\r\nKondisi : Baru <br>\r\n<br>\r\nDeskripsi : <br>\r\nLukisan ini menggambarkan muka yang ditutupi oleh kain di bagian matanya..', 'Muka 4 Art', 'Tersedia', 333000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'artshop', '$2y$10$sqHISNdRUoW5VfNN8Ue9XevgKsnwCAkps4ooP.sHF4NSSLDbjS2cG', 'admin'),
(2, 'user', '$2y$10$sqHISNdRUoW5VfNN8Ue9XevgKsnwCAkps4ooP.sHF4NSSLDbjS2cG', 'user'),
(6, 'Abcd', '$2y$10$tqwd3caXOFrAIsf7f4HsnOLcL9iQEqxfj0CpJlkn4Lk5RMfUcCbye', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
