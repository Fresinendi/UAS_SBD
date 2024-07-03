-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2024 pada 14.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(100) NOT NULL,
  `pelanggan` varchar(15) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` varchar(15) NOT NULL,
  `idperiode` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `idpelatih` varchar(15) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`idcustomer`, `pelanggan`, `nohp`, `alamat`, `idperiode`, `jumlah`, `idpelatih`, `total_harga`) VALUES
(1345, 'Bumblebee', '08976467873', 'Jl.Padi', 'Bulanan', 10, 'PEL1', 1100000.00),
(1346, 'Optimus', '08912457642', 'Jl.Binjai', 'Bulanan', 20, 'NO', 1400000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `idkaryawan` varchar(15) NOT NULL,
  `namakaryawan` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`idkaryawan`, `namakaryawan`) VALUES
('Kar1', 'Tri Mulyani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_karyawan` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_karyawan`, `email`, `password`) VALUES
('KAR1', 'trimulyani@gmail.com', 'projectsbd01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatih`
--

CREATE TABLE `pelatih` (
  `idpelatih` varchar(15) NOT NULL,
  `namapelatih` varchar(15) NOT NULL,
  `idpersonaltrainer` varchar(15) NOT NULL,
  `hargatrainer` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelatih`
--

INSERT INTO `pelatih` (`idpelatih`, `namapelatih`, `idpersonaltrainer`, `hargatrainer`) VALUES
('NO', 'NO', 'A', 0),
('PEL1', 'Mikel', 'C', 40000),
('PEL2', 'Stafford', 'B', 50000),
('PEL3', 'Shaun', 'A', 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `idperiode` varchar(15) NOT NULL,
  `periode` varchar(15) NOT NULL,
  `hargaperiode` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`idperiode`, `periode`, `hargaperiode`) VALUES
('M', 'Bulanan', 70000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personaltrainer`
--

CREATE TABLE `personaltrainer` (
  `idpersonaltrainer` varchar(15) NOT NULL,
  `program` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `personaltrainer`
--

INSERT INTO `personaltrainer` (`idpersonaltrainer`, `program`) VALUES
('A', 'Compulsory'),
('B', 'Competent'),
('C', 'Beginner'),
('NOPEL', 'NO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_invoice` int(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `idcustomer` int(100) NOT NULL,
  `idkaryawan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_invoice`, `tanggal`, `idcustomer`, `idkaryawan`) VALUES
(104, '2024-06-29', 1339, 'Kar1'),
(105, '2024-06-29', 1335, 'Kar1'),
(106, '2024-06-29', 1342, 'Kar1'),
(107, '2024-06-29', 1345, 'Kar1'),
(108, '2024-06-29', 1346, 'Kar1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`idpelatih`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`idperiode`);

--
-- Indeks untuk tabel `personaltrainer`
--
ALTER TABLE `personaltrainer`
  ADD PRIMARY KEY (`idpersonaltrainer`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_invoice`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1347;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_invoice` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
