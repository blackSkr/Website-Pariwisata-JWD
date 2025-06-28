-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_wisata
CREATE DATABASE IF NOT EXISTS `db_wisata` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_wisata`;

-- Dumping structure for table db_wisata.detail_paket
CREATE TABLE IF NOT EXISTS `detail_paket` (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `id_paket_wisata` int DEFAULT NULL,
  `id_komponen` int DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_paket_wisata` (`id_paket_wisata`),
  KEY `id_komponen` (`id_komponen`),
  CONSTRAINT `detail_paket_ibfk_1` FOREIGN KEY (`id_paket_wisata`) REFERENCES `paket_wisata_revisi` (`id_paket_wisata`),
  CONSTRAINT `detail_paket_ibfk_2` FOREIGN KEY (`id_komponen`) REFERENCES `komponen_paket` (`id_komponen`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.detail_paket: ~11 rows (approximately)
REPLACE INTO `detail_paket` (`id_detail`, `id_paket_wisata`, `id_komponen`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 2, 1),
	(6, 2, 2),
	(7, 3, 2),
	(8, 3, 4),
	(9, 4, 2),
	(10, 5, 1),
	(11, 6, 4);

-- Dumping structure for table db_wisata.fasilitas
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id_fasilitas` int NOT NULL AUTO_INCREMENT,
  `jenis_fasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('tampil','tidak tampil') DEFAULT NULL,
  PRIMARY KEY (`id_fasilitas`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.fasilitas: ~3 rows (approximately)
REPLACE INTO `fasilitas` (`id_fasilitas`, `jenis_fasilitas`, `deskripsi`, `gambar`, `status`) VALUES
	(1, 'transportasi', 'motor, sepeda, perahu,motor', '../admin-img-uploads/../admin-img-uploads/../admin-img-uploads/aa75f80b3fbea171abec47c24a155c1e.jpg', 'tampil'),
	(2, 'penginapan', 'bed, water heater, kamar mandi dalam, dapur kecil', '../admin-img-uploads/../admin-img-uploads/1a98b8ae23eaabb3d0d18b94a3879903.jpg', 'tampil'),
	(3, 'tempat', 'toilet, warung, gazebo, dapur umum', '../admin-img-uploads/a40346b0386061bb8c3fc8c05abb3ceb.jpg', 'tampil'),
	(13, 'contoh', 'contoh1 TES !???.l', '../admin-img-uploads/../admin-img-uploads/../admin-img-uploads/labuan2525252520cermin.jpg', 'tidak tampil');

-- Dumping structure for table db_wisata.galery
CREATE TABLE IF NOT EXISTS `galery` (
  `id_galery` int NOT NULL AUTO_INCREMENT,
  `nama_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `status` enum('tampil','tidak tampil') DEFAULT NULL,
  PRIMARY KEY (`id_galery`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.galery: ~6 rows (approximately)
REPLACE INTO `galery` (`id_galery`, `nama_gambar`, `gambar`, `deskripsi`, `status`) VALUES
	(1, 'gerbang', '../admin-img-uploads/labuan2525252520cermin.jpg', 'gerbang in', 'tampil'),
	(2, 'snoorkling', '../admin-img-uploads/Biduk-Biduk-e1650418220713.png', 'snoorkling', 'tampil'),
	(4, 'contoh', '../admin-img-uploads/Labuan-Cermin-1.jpg', 'sampan', 'tampil'),
	(5, 'contoh', '../admin-img-uploads/Labuan-cermin-4.jpg', 'sampan', 'tampil'),
	(7, 'contoh3', '../admin-img-uploads/Labuan-cermin-3.jpg', 'sampan3', 'tampil');

-- Dumping structure for table db_wisata.gambar
CREATE TABLE IF NOT EXISTS `gambar` (
  `id_gambar` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `status` enum('1','2\r\n') DEFAULT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.gambar: ~0 rows (approximately)

-- Dumping structure for table db_wisata.history_paket_wisata
CREATE TABLE IF NOT EXISTS `history_paket_wisata` (
  `id_history` int DEFAULT NULL,
  `id_paket_wisata` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.history_paket_wisata: ~0 rows (approximately)

-- Dumping structure for table db_wisata.komponen_paket
CREATE TABLE IF NOT EXISTS `komponen_paket` (
  `id_komponen` int NOT NULL AUTO_INCREMENT,
  `nama_komponen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_komponen`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.komponen_paket: ~4 rows (approximately)
REPLACE INTO `komponen_paket` (`id_komponen`, `nama_komponen`) VALUES
	(1, 'wisata perahu'),
	(2, 'snoorkling'),
	(3, 'penginapan'),
	(4, 'gazebo sunset');

-- Dumping structure for table db_wisata.paket_wisata
CREATE TABLE IF NOT EXISTS `paket_wisata` (
  `id_paket_wisata` int NOT NULL AUTO_INCREMENT,
  `kode_paket` varchar(100) DEFAULT NULL,
  `nama_paket` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `pict` varchar(100) DEFAULT NULL,
  `harga_paket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_paket_wisata`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.paket_wisata: ~10 rows (approximately)
REPLACE INTO `paket_wisata` (`id_paket_wisata`, `kode_paket`, `nama_paket`, `deskripsi`, `pict`, `harga_paket`) VALUES
	(1, '01', 'Private paket', 'tes', NULL, '5000000'),
	(2, '02', 'gathering_paket', 'tes2', NULL, '2500000'),
	(3, '03', 'Bundling', 'tes3', NULL, '3500000'),
	(10, '001', 'satria tes', 'tes satria', '', '100000000'),
	(11, 'ULT', 'Paket Ultimate', 'wisata perahu + snoorkling + penginapan + gazebo sunset', NULL, '1500000'),
	(12, 'BND1', 'Paket Bundling 1', 'wisata perahu + snoorkling', NULL, '700000'),
	(13, 'BND2', 'Paket Bundling 2', 'snoorkling + gazebo sunset', NULL, '500000'),
	(14, 'PLC1', 'Paket Pelancong 1', 'snoorkling', NULL, '300000'),
	(15, 'PLC2', 'Paket Pelancong 2', 'wisata perahu', NULL, '400000'),
	(16, 'PLC3', 'Paket Pelancong 3', 'gazebo sunset', NULL, '350000'),
	(17, 'BND3', 'Bundling 3', 'tes', '', '430000');

-- Dumping structure for table db_wisata.paket_wisata_revisi
CREATE TABLE IF NOT EXISTS `paket_wisata_revisi` (
  `id_paket_wisata` int NOT NULL AUTO_INCREMENT,
  `kode_paket` varchar(50) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi` text,
  `harga_paket` decimal(10,2) DEFAULT NULL,
  `pict` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_paket_wisata`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.paket_wisata_revisi: ~6 rows (approximately)
REPLACE INTO `paket_wisata_revisi` (`id_paket_wisata`, `kode_paket`, `nama_paket`, `deskripsi`, `harga_paket`, `pict`) VALUES
	(1, 'ULT', 'Paket Ultimate', 'wisata perahu + snoorkling + penginapan + gazebo sunset', 1500000.00, '../admin-img-uploads/labuan2525252520cermin.jpg'),
	(2, 'BND1', 'Paket Bundling 1', 'wisata perahu + snoorkling', 700000.00, '../admin-img-uploads/e137232f949d.jpg'),
	(3, 'BND2', 'Paket Bundling 2', 'snoorkling + gazebo sunset', 500000.00, '../admin-img-uploads/Labuan-cermin-3.jpg'),
	(4, 'PLC1', 'Paket Pelancong 1', 'snoorkling', 300000.00, '../admin-img-uploads/Labuan-cermin-3.jpg'),
	(5, 'PLC2', 'Paket Pelancong 2', 'wisata perahu', 400000.00, '../admin-img-uploads/Labuan-Cermin-1.jpg'),
	(6, 'PLC3', 'Paket Pelancong 3', 'gazebo sunset', 350000.00, '../admin-img-uploads/Foto-Danau-Dua-Rasa-Danau-Labuan-Cermin-Biduk-Biduk-Kabupaten-Berau-Kalimantan-Timur-@brinkleydavies.jpg'),
	(8, 'ULT02', 'contoh', 'contoh', 5000000.00, '../admin-img-uploads/Biduk-Biduk-e1650418220713.png');

-- Dumping structure for table db_wisata.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `id_paket_wisata` int DEFAULT NULL,
  `nama_pelanggan` varchar(25) DEFAULT NULL,
  `no_hp` bigint DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pasw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat_pelanggan` varchar(200) DEFAULT NULL,
  `jenis_paket` varchar(50) DEFAULT NULL,
  `jumlah_pelanggan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_cekin` date DEFAULT NULL,
  `tgl_cekout` date DEFAULT NULL,
  `jumlah_hari` varchar(50) DEFAULT NULL,
  `total_harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('Pending','In','Done','Menunggu Pembayaran') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tambahan` varchar(255) DEFAULT NULL,
  `waktu_pemesanan` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.pelanggan: ~4 rows (approximately)
REPLACE INTO `pelanggan` (`id_pelanggan`, `id_paket_wisata`, `nama_pelanggan`, `no_hp`, `email`, `pasw`, `alamat_pelanggan`, `jenis_paket`, `jumlah_pelanggan`, `tgl_cekin`, `tgl_cekout`, `jumlah_hari`, `total_harga`, `status`, `tambahan`, `waktu_pemesanan`) VALUES
	(18, NULL, 'Brilian Satria Pamungkas', 81212121212, 'satria@ex', '$2y$10$PCOQY7GH2NrIZnz7BKF52.90bsVXA82l.Jb9QtFbjdNYk98qPZpOG', 'Samarinda Utara', '2', '12', '2024-07-30', '2024-07-31', '2', '120000000', 'In', NULL, '2024-07-31 13:49:47'),
	(21, NULL, 'Olivia Amira', 82189652008, 'olivia@ex', '$2y$10$4AafcQL9D/CzL8tALYypZeiqsNByvUJ/vA5Uj02Z70uezPgS4IJvG', 'Bandung', '2', '3', '2024-07-31', '2024-08-02', '3', '45000000', 'Pending', NULL, '2024-07-31 13:49:47'),
	(41, NULL, 'bruno', 81212121212, 'bruno@example', '$2y$10$8vcnHaV9hmjd7N2qS/ZMKuUxGL4fxh3embsQFpNhH13NZfdskZ5tC', 'acwcasc', '5000000', '10', '2024-08-02', '2024-08-04', '3', '160500000', 'Done', 'Makanan/Servis Rp.500.000 per orang, Transportasi Rp.200.000 per orang, Penginapan Rp.350.000 per orang', '2024-07-31 14:40:46'),
	(42, NULL, 'rio', 1313123, 'rio@examp', '$2y$10$kIkEHIGWsfkSD80vtlLtoen8YmSnFlJJk6Ey6SDpJ8X5YCmx.AT/2', 'adwasdw', 'ULT', '1', '2024-07-31', '2024-08-05', '6', '904200000', 'Menunggu Pembayaran', 'Makanan/Servis Rp.500.000 per orang, Transportasi Rp.200.000 per orang', '2024-07-31 23:34:05'),
	(44, NULL, 'jwd', 123, 'jwd@examp', '$2y$10$Bqa1Gx8AlkYGNkbmPoMrqufwTeqs/jOeK8ufKnwly6guu6I4hGfVm', 'adwa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-07 20:22:08');

-- Dumping structure for table db_wisata.review
CREATE TABLE IF NOT EXISTS `review` (
  `id_user_review` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `status` enum('aman','kurangaman') DEFAULT NULL,
  PRIMARY KEY (`id_user_review`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.review: ~14 rows (approximately)
REPLACE INTO `review` (`id_user_review`, `email`, `nama`, `komentar`, `status`) VALUES
	(1, 'satria@examp', 'Satria', 'Keren Banget!', 'kurangaman'),
	(2, 'navis@examp', 'Navis in here', 'Bintang 5!', 'aman'),
	(3, 'prado', 'prado\'s', 'Kece Wak', 'aman'),
	(4, 'udin@examp', 'udin', 'tes', 'kurangaman'),
	(5, 'udin@examp', 'udin', 'tes', 'kurangaman'),
	(6, 'prata@examp', 'prata', 'tes2', 'kurangaman'),
	(7, 'pratu@exaxmp', 'pratu', 'tes3', 'kurangaman'),
	(8, 'praja@examp', 'praja', 'tes4', 'kurangaman'),
	(9, 'praja@examp', 'praja', 'tes5', 'kurangaman'),
	(13, 'jwd@examp', 'jwd - satria', 'jwd keren', 'kurangaman'),
	(14, 'jwd@ex', 'JWD', 'JWD KEREN', 'kurangaman'),
	(15, 'nana@examp', 'nana', 'cek cek', 'aman'),
	(16, 'xxx@xx', 'xxx', 'xxx', 'kurangaman'),
	(18, 'prodo999@c', 'prodo', 'tes', 'kurangaman'),
	(19, 'asa@x', 'sa', 'awd', 'kurangaman');

-- Dumping structure for table db_wisata.useradmin
CREATE TABLE IF NOT EXISTS `useradmin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pasw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_wisata.useradmin: ~4 rows (approximately)
REPLACE INTO `useradmin` (`id_admin`, `user`, `pasw`, `email`, `nama_lengkap`) VALUES
	(1, 'admin', 'admin', NULL, NULL),
	(2, 'admin2', 'admin2', NULL, NULL),
	(3, 'admin3', '$2y$10$tcSkfpIilcNr7OUrwjKJEeJZi3m0OMC7tzZmbIb8Z3EZbF49/7CXC', NULL, NULL),
	(12, 'satria', '$2y$10$0Et2jB8.NJIeNkmhYGuzIeu5aqFNy0LqjNxNGtfGd1Tl4/QQouUtu', NULL, 'satriapams');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
