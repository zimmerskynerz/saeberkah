-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2020 pada 04.16
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saeberkah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(3) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nama_lengkap` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `telepon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `email`, `telepon`) VALUES
('A01', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Sales', 'salesadmin@gmail.com', '081231231234'),
('A03', 'Dita', 'd41d8cd98f00b204e9800998ecf8427e', 'Dita', 'dita@gmail.com', '08999988776655'),
('A04', 'admin12', '9d127228d15be02d35d734084e571731', 'ADMIN 12', 'admin12@gmail.com', '0394839839893');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` text DEFAULT NULL,
  `jenis_barang` text DEFAULT NULL,
  `ukuran_barang` text DEFAULT NULL,
  `berat_barang` text DEFAULT NULL,
  `ket_barang` text DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `gambar_barang` text DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `jenis_barang`, `ukuran_barang`, `berat_barang`, `ket_barang`, `harga_barang`, `gambar_barang`, `stok_barang`) VALUES
('B0001', 'Gantungan Kunci', 'K01', '2 cm x 3 cm', '2', 'terbuat dari kayu', 10000, 'e813c43b870198ed74b2237e17a200b9.jpg', 5),
('B0003', 'Makanan Enak', 'K02', '5 cm x 2 cm x 1 cm', '1', 'makanan enak banget', 5000, 'product-3.jpg', 2),
('B0004', 'Ukiran Baju', 'K02', '12cm X 23cm X 23cm', '1', '21211', 12222, '8fff2b7408177eb5778b49a020a52b30.jpg', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pemesanan`
--

CREATE TABLE `tb_detail_pemesanan` (
  `id_pemesanan` varchar(15) DEFAULT NULL,
  `id_barang` varchar(5) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pemesanan`
--

INSERT INTO `tb_detail_pemesanan` (`id_pemesanan`, `id_barang`, `jumlah_beli`, `total_harga`) VALUES
('20200829P0001', 'B0002', 2, 50000),
('20200829P0001', 'B0001', 3, 30000),
('20200830P0201', 'B0003', 11, 60000),
('20201113P0201', 'B0002', 1, 25000),
('20201113P0202', 'B0002', 1, 25000),
('20201114P0202', 'B0003', 1, 5000),
('20201116P0202', 'B0003', 1, 5000),
('20201116P0202', 'B0003', 1, 5000),
('20201116P0202', 'B0003', 1, 5000),
('20201116P0202', 'B0002', 1, 25000),
('20201116P0202', 'B0003', 1, 5000),
('20201120P0202', 'B0003', 1, 5000),
('20201125P0202', 'B0003', 1, 5000),
('20201207P0202', 'B0004', 2, 24444),
('20201216P0202', 'B0003', 1, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(3) NOT NULL,
  `nama_kategori` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
('K01', 'Cinderamata'),
('K02', 'Set Kursi'),
('K03', 'Set Meja Makan'),
('K04', 'Set Tempat TIdur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konfirmasi`
--

CREATE TABLE `tb_konfirmasi` (
  `id_konfirmasi` int(5) NOT NULL,
  `id_pemesanan` varchar(15) DEFAULT NULL,
  `id_pelanggan` varchar(5) DEFAULT NULL,
  `nama_bank` text DEFAULT NULL,
  `nomor_rekening` text DEFAULT NULL,
  `atas_nama` text DEFAULT NULL,
  `bukti_pembayaran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_konfirmasi`
--

INSERT INTO `tb_konfirmasi` (`id_konfirmasi`, `id_pemesanan`, `id_pelanggan`, `nama_bank`, `nomor_rekening`, `atas_nama`, `bukti_pembayaran`) VALUES
(1, '20201207P0202', 'U0008', 'BCA', '092839839', 'Muhammad Yusuf Aji Wijaya', '5d983690239d4262b2ffa981309b4f22.jpg'),
(2, '20201216P0202', 'U0008', 'BCA', '031928738', 'Muhammad Yusuf Aji Wijaya', 'fc62219856ae30116f9c0a523b9197a5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(5) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nama_lengkap` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `telepon` text DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `username`, `password`, `nama_lengkap`, `email`, `telepon`, `alamat`) VALUES
('A03', 'tyas', '28badde8929fc4f9e5243ae28975475c', 'nama', 'email@gmail.com', '08888888888', 'semarang'),
('U0004', 'puji', '4ba2c6eb5a0045c66a09a12be73e822a', 'Tri Puji', 'puji@gmail.com', '081326002385', 'Kendal'),
('U0005', 'maulidya', '827ccb0eea8a706c4c34a16891f84e7b', 'Maulidya', 'maulidyar9@gmail.com', '085713566277', 'Jepara'),
('U0006', 'Dea', '827ccb0eea8a706c4c34a16891f84e7b', 'Dea', 'dea@gmail.com', '085731665772', 'Jepara'),
('U0007', 'lala', '827ccb0eea8a706c4c34a16891f84e7b', 'lala widy', 'lalawidy@gmail.com', '081222333444', 'jepara'),
('U0008', 'ajiw100', '9d127228d15be02d35d734084e571731', 'Aji Wijaya', 'ajiw100@gmail.com', '0895411547434', 'kudus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` varchar(15) NOT NULL,
  `id_pelanggan` varchar(5) DEFAULT NULL,
  `nama_penerima` text DEFAULT NULL,
  `telepon_penerima` text DEFAULT NULL,
  `alamat_tujuan` text DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `berat_total` text DEFAULT NULL,
  `ekspedisi` text DEFAULT NULL,
  `no_resi` text DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `sub_bayar` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `tgl_konfirmasi` datetime DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_pelanggan`, `nama_penerima`, `telepon_penerima`, `alamat_tujuan`, `kode_pos`, `berat_total`, `ekspedisi`, `no_resi`, `ongkir`, `sub_bayar`, `total_bayar`, `status`, `tgl_pesan`, `tgl_bayar`, `tgl_konfirmasi`, `tgl_terima`) VALUES
('20200829P0001', 'U0004', 'Tri Puji', '081326002385', 'Simbang RT 04 RW 05 Bebengan, Boja', 51381, '0.7', 'jne', 'NO0001283477JNE344', 15000, 80000, 95000, 'Diterima', '2020-08-29 00:00:00', '2020-08-29 20:08:34', NULL, '2020-08-30 08:08:23'),
('20200830P0201', 'U0004', 'Tri Puji', '081326002385', 'Simbang', 51381, '0.05', 'tiki', NULL, 15000, 60000, 75000, 'Konfirmasi', '2020-08-30 01:08:07', NULL, NULL, NULL),
('20201113P0201', 'U0005', 'Maulidya', '085713566277', 'Daren', 54323, '0.5', 'jne', 'TIO01283477JNE344 ', 14000, 25000, 39000, 'Dikirim', '2020-11-13 18:11:37', '2020-11-13 18:11:16', '2020-12-04 00:00:00', NULL),
('20201113P0202', 'U0006', 'Dea', '085731665772', 'Daren', 59433, '0.5', 'jne', NULL, 14000, 25000, 39000, 'Konfirmasi', '2020-11-13 22:11:58', '2020-11-13 22:11:48', NULL, NULL),
('20201114P0202', 'U0007', 'lala widy', '081222333444', 'daren, rt 03, rw 01', 54322, '0.05', 'jne', NULL, 14000, 5000, 19000, 'Konfirmasi', '2020-11-14 21:11:34', '2020-11-14 22:11:44', NULL, NULL),
('20201116P0202', 'U0007', 'lala widy', '081222333444', 'Daren', 52334, '0.05', 'jne', NULL, 10000, 5000, 15000, 'Konfirmasi', '2020-11-16 15:11:38', '2020-11-16 15:11:14', NULL, NULL),
('20201120P0202', 'U0006', 'Dea', '085731665772', 'daren', 54332, '0.05', 'pos', NULL, 14000, 5000, 19000, 'Diterima', '2020-11-20 20:11:53', '2020-11-20 00:00:00', '2020-11-20 00:00:00', NULL),
('20201125P0202', 'U0006', 'Dea', '085731665772', 'Daren', 54332, '0.05', 'tiki', NULL, 6000, 5000, 11000, 'Diterima', '2020-11-25 21:11:05', '2020-11-25 00:00:00', '2020-11-25 00:00:00', NULL),
('20201207P0202', 'U0008', 'Aji Wijaya', '08112904711', 'Kudus', 78988, '1000', 'jne', '120928hh7387j', 36000, 24444, 60444, 'Diterima', '2020-12-07 00:00:00', '2020-12-07 00:00:00', '2020-12-08 00:00:00', '2020-12-08 00:00:00'),
('20201216P0202', 'U0008', 'Aji Wijaya', '0895411547434', 'Kudus', 59382, '1000', 'tiki', '2309283738HJK', 73000, 5000, 78000, 'Diterima', '2020-12-16 00:00:00', '2020-12-16 00:00:00', '2020-12-16 00:00:00', '2020-12-16 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trolly`
--

CREATE TABLE `tb_trolly` (
  `id_trolly` int(11) NOT NULL,
  `id_pelanggan` varchar(5) DEFAULT NULL,
  `id_barang` varchar(5) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trolly`
--

INSERT INTO `tb_trolly` (`id_trolly`, `id_pelanggan`, `id_barang`, `jumlah`, `total_harga`) VALUES
(11, 'U0006', 'B0001', 1, 10000),
(12, '', 'B0004', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `tb_trolly`
--
ALTER TABLE `tb_trolly`
  ADD PRIMARY KEY (`id_trolly`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
  MODIFY `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_trolly`
--
ALTER TABLE `tb_trolly`
  MODIFY `id_trolly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
