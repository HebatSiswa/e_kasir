-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2025 pada 10.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaPCS` double NOT NULL,
  `total` double NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_transaksi`, `id_produk`, `nama_produk`, `jumlah`, `hargaPCS`, `total`, `tanggal`) VALUES
(2, 8, 28, 'Chocholate Macaron', 2, 50000, 100000, '2025-04-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `terakhir_direstok` date NOT NULL,
  `barang_terjual` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `terakhir_direstok`, `barang_terjual`, `deskripsi`, `foto`) VALUES
(2, 'lemon tart', 20000, 28, '2025-04-10', 2, 'lemon taart', 'lemon-tart.jpg'),
(3, 'Macaron matcha', 20000, 20, '0000-00-00', 2, 'Matcha macaroon', 'Macaron matcha-macaron-matcha.jpg'),
(4, 'Brioche Cake', 20000, 20, '0000-00-00', 0, 'cake brioche yang lembut', 'Brioche Cake-brioche.jpg'),
(5, 'Apple cake with vanilla', 20000, 10, '0000-00-00', 0, 'Cake berbentuk apple yang sangat lembut ', 'Apple cake with vanilla-apple-vanilla.jpg'),
(6, 'Caramel Ice cream', 15000, 12, '0000-00-00', 0, 'Ice cream vanilla dengan salted caramel', 'Caramel Ice cream-caramel-ice.jpg'),
(7, 'Chocolate Lava', 5000, 20, '0000-00-00', 0, 'Kue chocolate dengan lava chocholate yang meleleh', 'Chocolate Lava-coklat-lava.jpg'),
(8, 'Macaron caramell', 50000, 20, '0000-00-00', 0, 'macaroon dengan varian rasa caramel', 'Macaron caramell-macaron-caramel.jpg'),
(9, 'Sorndough', 50000, 20, '0000-00-00', 0, 'Kue sorndough yang cocok untuk diet', 'Sorndough-Sorndough-sorndough.jpg'),
(10, 'Raspberry Macaron', 50000, 20, '0000-00-00', 0, 'Macaroon dengan varian rasa raspberry', 'Raspberry Macaron-Raspberry Macaron-raspberry-macaron.jpg'),
(11, 'Croisant', 20000, 10, '0000-00-00', 0, 'Croisant original', 'Croisant-croisant.jpg'),
(12, 'Palmvita', 20000, 10, '0000-00-00', 0, 'Palmvita cake', 'Palmvita-Palmvita-palmvita.jpg'),
(13, 'Cheesecake vanila Caramel', 20000, 10, '0000-00-00', 0, 'Cheesecake dengan eskrim vanila dan sirup salted caramel', 'Cheesecake vanila Caramel-vanila-caramel.jpg'),
(14, 'Banana cake', 150000, 20, '0000-00-00', 0, 'cake dengan topping banana dan caramel', 'Banana cake-banana.jpg'),
(15, 'Bomboloni Tiramisu', 20000, 12, '0000-00-00', 0, 'Bombooloni dengan varian rasa tiramisu', 'Bomboloni Tiramisu-bomboloni.jpg'),
(16, 'Strawberry omelete cake', 20000, 12, '0000-00-00', 0, 'Omelete cake dengan topping cream dan stroberi ', 'Strawberry omelete cake-strawberry-omelet.jpg'),
(17, 'Ceri cake', 20000, 12, '0000-00-00', 0, 'Cake bentuk ceri dengan isian coklat', 'Ceri cake-ceri-cake.jpg'),
(18, 'Pie susu', 20000, 20, '0000-00-00', 0, 'Pie susu ', 'Pie susu-Pie susu-pie.jpg'),
(19, 'Wafle Chocholate', 30000, 10, '0000-00-00', 0, 'Waffle dengan varian rasa chocholate dan topiing chocholate yang melimpah', 'Wafle Chocholate-waffle-chocholate.jpg'),
(20, 'Mocha ', 10000, 10, '0000-00-00', 0, 'kue mocha', 'Mocha -Mocha -mocha.jpg'),
(21, 'Milky bread', 50000, 10, '0000-00-00', 0, 'Roti yang dicampur susu premum menciptakan tekstur yang lembut', 'Milky bread-Milky bread-milky.jpg'),
(22, 'Croisant sandwich', 30000, 20, '0000-00-00', 0, 'Sandwich yang dibalut dengan croisant', 'Croisant sandwich-csandwich.jpg'),
(23, 'Egg muffin', 30000, 20, '0000-00-00', 0, 'Egg  muffin\r\n', 'Egg muffin-egg-muffin.jpg'),
(24, 'Fresh Berry Waffle', 30000, 20, '0000-00-00', 0, 'Wafffle original dengan topping berry yang fresh', 'Fresh Berry Waffle-waffle-fresh-berrie.jpg'),
(25, 'Spons Cake', 20000, 10, '0000-00-00', 0, 'Cake yang lembut seperti awan', 'Spons Cake-kue-bantal.jpg'),
(26, 'Cupcake chocholate', 20000, 18, '0000-00-00', 0, 'Cupcake dengan varian rasa coklat dan topping coklat yang melimpah', 'Cupcake chocholate-chocholate-cupcakes.jpg'),
(28, 'Chocholate Macaron', 50000, 16, '0000-00-00', 0, 'macaron chocholate', 'Chocholate Macaron-Chocholate Macaron.jpg'),
(29, 'Wagy cake chocholate', 50000, 20, '0000-00-00', 0, 'Cake chocholat berlapis ydengan topping chocholate', 'Wagy cake chocholate-Wagy cake chocholate-wagy-chocholate.jpg'),
(30, 'Tiramisu  Roll', 20000, 0, '0000-00-00', 0, 'Roll cak e dengan varian rasa tiramisu', 'Tiramisu  Roll-Tiramisu  Roll-roll-tiramisu.jpg'),
(31, 'Chocholate tart', 20000, 10, '0000-00-00', 0, 'tart chocholate', 'Chocholate tart-chocholate-tart.jpg'),
(32, 'tart lemon', 20000, 20, '0000-00-00', 0, 'tart', 'tart lemon-Lemon tart-lemon-tart.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `hargaPCS` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL,
  `total_kes` double NOT NULL,
  `tanggal` date NOT NULL,
  `uang_cash` double NOT NULL,
  `kembalian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `nama_produk`, `hargaPCS`, `jumlah`, `total`, `total_kes`, `tanggal`, `uang_cash`, `kembalian`) VALUES
(4, 28, 'Chocholate Macaron', 50000, 2, 100000, 100000, '2025-04-22', 100000, 0),
(5, 30, 'Tiramisu  Roll', 20000, 5, 100000, 0, '2025-04-22', 0, 0),
(8, 30, 'Tiramisu  Roll', 20000, 5, 100000, 200000, '2025-04-22', 300000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin12', 'Admin'),
(2, 'kasir', 'kasir12', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
