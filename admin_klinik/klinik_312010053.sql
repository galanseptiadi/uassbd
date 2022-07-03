-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 06:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_312010053`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_totalUsers` () RETURNS INT(11) UNSIGNED NO SQL RETURN (SELECT COUNT(id_pasien) FROM pasien)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `berobat`
--

CREATE TABLE `berobat` (
  `id_berobat` int(11) NOT NULL,
  `id_pasien` int(5) DEFAULT NULL,
  `id_dokter` int(5) DEFAULT NULL,
  `tgl_berobat` date DEFAULT NULL,
  `keluhan_pasien` varchar(200) DEFAULT NULL,
  `hasil_diagnosa` varchar(200) DEFAULT NULL,
  `penatalaksanaan` enum('Rawat Jalan','Rawat Inap','Rujuk','isolasi','lainnya') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berobat`
--

INSERT INTO `berobat` (`id_berobat`, `id_pasien`, `id_dokter`, `tgl_berobat`, `keluhan_pasien`, `hasil_diagnosa`, `penatalaksanaan`) VALUES
(3331, 1, 1111, '2022-01-12', 'vertigo mual', 'typus', 'Rawat Inap'),
(3332, 2, 1112, '2022-03-13', 'lemes demam', 'covid', 'Rawat Inap'),
(3333, 3, 1113, '2022-03-13', 'lemes demam', 'dbd', 'Rawat Inap'),
(3334, 4, 1114, '2022-03-19', 'sakit kaki', 'diabetes', 'Rujuk'),
(3335, 5, 1115, '2022-06-13', 'sakit perut', 'diare', 'Rawat Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`) VALUES
(1111, 'mirga'),
(1112, 'radit'),
(1113, 'rasta'),
(1114, 'Ika'),
(1115, 'muhammad');

-- --------------------------------------------------------

--
-- Table structure for table `log_obat`
--

CREATE TABLE `log_obat` (
  `id_log` int(100) NOT NULL,
  `id_obat` int(100) NOT NULL,
  `obat_lama` varchar(100) NOT NULL,
  `obat_baru` varchar(100) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_obat`
--

INSERT INTO `log_obat` (`id_log`, `id_obat`, `obat_lama`, `obat_baru`, `waktu`) VALUES
(1, 2225, 'Amoxilin', 'alpara', '2022-06-26'),
(3, 2224, 'promag', 'mylanta', '2022-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`) VALUES
(2221, 'antangin'),
(2222, 'bodrex'),
(2223, 'paracetamol'),
(2224, 'mylanta'),
(2225, 'alpara');

--
-- Triggers `obat`
--
DELIMITER $$
CREATE TRIGGER `update_obat` AFTER UPDATE ON `obat` FOR EACH ROW INSERT INTO log_obat
SET id_obat=OLD.id_obat,
obat_lama=old.nama_obat,
obat_baru=new.nama_obat,
waktu = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama_pasien` varchar(40) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `umur` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(1, 'Galan', 'L', 23),
(2, 'faruk', 'L', 25),
(3, 'Milan', 'P', 21),
(4, 'risa', 'L', 21),
(5, 'Ica', 'P', 22),
(118, 'marta', 'L', 25),
(119, 'kutil', 'L', 7),
(125, 'Velly', 'P', 23);

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL,
  `id_berobat` int(11) DEFAULT NULL,
  `id_obat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep`, `id_berobat`, `id_obat`) VALUES
(4441, 3331, 131),
(4442, 3332, 132),
(4443, 3333, 133),
(4444, 3334, 134),
(4445, 3335, 135);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama_lengkap` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(5551, 'adminklinik1', '1111', 'Galan Septiadi'),
(5552, 'adminklinik1', '2222', 'Irma Rahmawati'),
(5553, 'adminklinik1', '3333', 'Doni Salamanan'),
(5554, 'adminklinik1', '4444', 'Irham Nur'),
(5555, 'adminklinik1', '4445', 'Nuraeni');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(4, 'admin_klinik', 'galanspt9@gmail.com', '2f75ac0ecfb0686d657f60c02589d227', '2022-06-28 17:04:37'),
(5, 'adminklinik1', 'galanspt9@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '2022-07-03 05:46:46');

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewpenyakit`
-- (See below for the actual view)
--
CREATE TABLE `viewpenyakit` (
`id_berobat` int(11)
,`nama_pasien` varchar(40)
,`jenis_kelamin` enum('L','P')
,`umur` int(2)
,`keluhan_pasien` varchar(200)
,`hasil_diagnosa` varchar(200)
,`tgl_berobat` date
,`nama_dokter` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `viewpenyakit`
--
DROP TABLE IF EXISTS `viewpenyakit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewpenyakit`  AS SELECT `a`.`id_berobat` AS `id_berobat`, `b`.`nama_pasien` AS `nama_pasien`, `b`.`jenis_kelamin` AS `jenis_kelamin`, `b`.`umur` AS `umur`, `a`.`keluhan_pasien` AS `keluhan_pasien`, `a`.`hasil_diagnosa` AS `hasil_diagnosa`, `a`.`tgl_berobat` AS `tgl_berobat`, `c`.`nama_dokter` AS `nama_dokter` FROM ((`berobat` `a` join `pasien` `b` on(`a`.`id_pasien` = `b`.`id_pasien`)) join `dokter` `c` on(`a`.`id_dokter` = `c`.`id_dokter`)) WHERE `b`.`jenis_kelamin` = 'L''L'  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `log_obat`
--
ALTER TABLE `log_obat`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_berobat` (`id_berobat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3336;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1119;

--
-- AUTO_INCREMENT for table `log_obat`
--
ALTER TABLE `log_obat`
  MODIFY `id_log` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2230;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4446;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5559;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berobat`
--
ALTER TABLE `berobat`
  ADD CONSTRAINT `id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `id_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
