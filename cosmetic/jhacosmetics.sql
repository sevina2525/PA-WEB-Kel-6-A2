-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2022 pada 16.28
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jhacosmetics`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `admin_telp`, `admin_email`, `admin_address`, `password`) VALUES
(1, 'Jihan Hafizah Ariyani', 'adminjihan', '081255599526', 'jihanhafizahariyani63@gmail.com', 'Jl.Durian 3 Berau', '$2y$10$TcfXxwLj2s2lpVpnusMPIebcxfH28FdwG5fX08eNjDW9mkOZQGqX2'),
(8, 'Sevina Afi Amalia', 'vina', '082158002695', 'svnamalia@gmail.com', 'Pramuka', '$2y$10$3zyA/zQT06WJRYLY2Egn/eVYzVKLI6XRfL.UDTEoqeQ4qi7IiGImG'),
(9, 'Sevina Afi Amalia', 'sevina', '082158002695', 'svnamalia@gmail.com', 'Pramuka', '$2y$10$l3u8N.C45hRSEH3Cad.0yOnXnC9K.qtuGCKKq17HGl1fjb.gumsiK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_product` int(11) NOT NULL,
  `kode_product` char(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Lotions'),
(2, 'Mascara'),
(4, 'Lipstick'),
(12, 'Powder');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(15, 4, 'Pink Lipstick', 87000, '<p> Ingridients <p>', 'images1666972420.jpg', 1, '2022-10-28 15:55:03'),
(16, 1, 'Ladies Lotion', 90000, '<p> Ingridients <p>', 'images1666972575.jpg', 1, '2022-11-06 04:44:02'),
(17, 2, 'Mary Style Mascara', 60000, '<p> Ingridients <p>', 'images1666972637.jpg', 1, '2022-10-28 15:57:17'),
(18, 1, 'Color Sky Cream', 75000, '<p> Ingridients <p>', 'images1666972667.jpg', 1, '2022-11-06 04:43:45'),
(19, 4, 'Black Core Lipstick', 50000, '<p> Ingridients <p>', 'images1666972692.jpg', 1, '2022-11-06 04:43:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
