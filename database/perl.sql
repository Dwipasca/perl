-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2019 pada 06.58
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `id_pengguna` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `kata_sandi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `id_pengguna`, `jabatan`, `nama_pengguna`, `kata_sandi`) VALUES
(2, 'akuncoba2', 'Anggota', '4', '$2y$10$y0cV4pR/qsi1UtNC6Vci8.wEfDXkwn6ufATBDHr77eGXDv4sITKZi'),
(3, 'akuncoba3', 'Anggota', 'Perl5', '$2y$10$BaGberV1w9VPDjzH7Y/XaenLEKdG1xJd7rOWKkuw70RUa5PES8w4m'),
(4, 'akuncoba4', 'Anggota', 'Perl006', '$2y$10$mCn5LChBpzgwz9sBe1KSTejvgtwUPCwhGjnCyvZ0xWTE1u6e1UeGq'),
(5, 'akuncoba5', 'Anggota', 'Perl007', '$2y$10$QhXKz7h9uUSbzSSOfw6iVuqncV9ANRWwnMZNoMQY1OZ.UsmxT3eE2'),
(6, 'akuncoba6', 'Anggota', 'Perl008', '$2y$10$sWg0ePxNqaYDbbs3BDrdae8UBxyg96GhslZjMJQMg0NFeYWP1H5d6'),
(8, 'akuncoba7', 'Anggota', 'Perl009', '$2y$10$pVDUripeb2unIxf69v9WGeBI9qV6f04GMjjxXq0uBIkgafA1X7IaC'),
(9, 'dfgsdf', 'Anggota', 'Perl0010', '$2y$10$NJGD0SCcYhrvn.jW6xbske.5GsKda6dniVuPBOf7FiP5hJ9KDq9Y.'),
(10, 'akuncoba12', 'Anggota', 'Perl0015', '$2y$10$MfF.QQoNtff4Q3beG82Gc.98YjstYtHDgtQFVPnhL8U7EOTjEhKB.'),
(12, '34578345793', 'Pustakawan', 'Perl001', '$2y$10$fuClmlbrl/Tk.fh8XvH1GeW0Jn2g71kDMCHJMY24dNyqy3n.VZIm.'),
(13, 'coba2', 'Pustakawan', 'Perl002', '$2y$10$cYiiWuyB1cBH5WVd/Xo1nOkwbzuLaOu69Zf0/o7XcTtrozX3SyzgO'),
(14, 'coba3', 'Pustakawan', 'Perl003', '$2y$10$OxGPhq8xMZumq0NM4KoHzOWQwVadJxhOe58kkLyScUv.9/r2/58CG'),
(15, 'coba4', 'Pustakawan', 'Perl004', '$2y$10$TjFIh.aU6g3STJ7MAawr0ONHgq.Tj8AzebtqCwo5BlnSYflXB2K2e'),
(16, 'asdfasdfa', 'Pustakawan', 'Perl005', '$2y$10$Fotl0AcQN5lNdScqglIqh.3Fu02EMZfLXFuf6od0Oj71F8gZudsKG'),
(17, 'rjtiworjetoiwrje', 'Pustakawan', 'Pustakawan-005', '$2y$10$rOmetTnx9YmthCegMQYXg.yr2wXc.wVICuacSjcPuM87msumm1fUa'),
(18, 'mencoba', 'Pustakawan', 'Perl-009', '$2y$10$dQkeAWYGyVZ505izjauKWuCQJi5NJsUEbNZibSDhEyr5k5KuNNLTy'),
(19, 'coba', 'Anggota', 'Perl-0010', '$2y$10$2ZF9sGkwTBV.0HW3fcjUo.fDie2nkRWy.igI5Xf9YPP4P0L6bms9y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(12) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `no_identitas`, `nama`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `hp`, `tanggal_pembuatan`) VALUES
(1, 'asdfasd', 'asdfafd', '1996-02-12', 'Perempuan', 'asdfasdfadsfasdfasdf', '235234523452', '2019-06-27 05:55:31'),
(3, '8738941728934', 'bababababa', '1998-01-23', 'Laki-laki', 'Jl. Anoa 1 No. 78c', '082213777029', '2019-06-27 07:34:49'),
(4, 'cobacoba', 'cobacobacoba nama', '1990-02-12', 'Perempuan', 'jl. beruang no 78', '129387192873', '2019-06-27 07:36:14'),
(5, 'akuncoba', 'akuncoba', '1998-01-02', 'Perempuan', 'jl. akuncoba', '2093820238', '2019-06-29 02:59:47'),
(10, 'akuncoba6', 'akuncoba6', '1888-01-02', 'Perempuan', 'jasdkjfhakjsdhfk', '837492873492', '2019-06-27 08:53:06'),
(11, 'akuncoba7', 'alsdfkjhasldkfjha', '1199-01-21', 'Perempuan', 'JL.AKUNCOBA7', '2938472893', '2019-06-27 09:11:03'),
(13, 'tadadadadadaas', 'asdasdfa', '2016-02-01', 'Perempuan', 'adsfasdfadfasdfadsa', '12341234123', '2019-06-27 10:48:47'),
(14, 'asdfasd', 'fadsfasdfasd', '1998-02-01', 'Perempuan', 'fsdafasdfasfa', 'asdf23', '2019-06-27 10:55:02'),
(18, 'akuncoba13', 'akuncoba13', '1995-01-01', 'Laki-laki', 'jl. akuncoba13', '123982901298', '2019-06-28 00:11:04'),
(19, 'mencoba', 'mencoba', '1212-01-02', 'Perempuan', 'mencoba', '0983838', '2019-07-12 03:04:16'),
(20, 'coba', 'coba', '2311-01-02', 'Perempuan', 'asdfjaks', 'skdjfaksdj', '2019-07-12 04:02:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog_buku`
--

CREATE TABLE `katalog_buku` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `judul` text NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `tempat_terbit` varchar(50) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `halaman` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `file_cover` text NOT NULL,
  `link_buku` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `katalog_buku`
--

INSERT INTO `katalog_buku` (`id`, `id_kategori`, `isbn`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `tempat_terbit`, `bahasa`, `halaman`, `id_lokasi`, `file_cover`, `link_buku`, `status`) VALUES
(5, 5, 'test', 'test', 'test', 'test', 2018, 'test', 'Indonesia', 33, 1, 'test.jpg', 'https://drive.google.com/file/d/1WKIiwJpn7XdBaYc4FLvUFBp149kuqWnK/view?usp=sharing', 'Tersedia'),
(6, 2, 'Dwi Pasca Nursanti Dwi Pasca Nursanti', 'Dwi Pasca Nursanti Dwi Pasca Nursanti', 'hgjhglukhgkuygyui', 'mhgjhgmjhgmjhgmj', 2019, 'palu', 'Indonesia', 0, 1, 'book_nopic.jpg', 'http://localhost/phpmyadmin/sql.php?server=1&amp;db=perl&amp;table=akun&amp;pos=0', 'Tersedia'),
(7, 6, 'asdfasdf', 'asdfasdfa', 'sdfasdfasdfasdf', 'asdfasdfa', 2018, 'donggala', 'English', 24, 1, 'mass-effect.jpg', 'https://www.dumetschool.com/blog/membuat-effect-hover-image-dengan-css', 'Tersedia'),
(8, 3, 'sdfgsfxcvbxcvbx', 'cvbxcvbxc', 'vbxcvbxcvb', 'xcvbxcvbx', 0, 'xcvbxcvbxcvb', 'Indonesia', 23, 1, 'wallhaven-49031.jpg', 'https://www.dumetschool.com/blog/membuat-effect-hover-image-dengan-css', 'Tersedia'),
(9, 6, 'hjklhjk', 'lhjklhjkl', 'hjklhjkl', 'hjklhjklhj', 0, 'klhjklh', 'Indonesia', 0, 1, 'wallhaven-18637.jpg', 'https://www.dumetschool.com/blog/membuat-effect-hover-image-dengan-css', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(2, 'adventure'),
(3, 'Comedy'),
(4, 'Angst'),
(5, 'Romance'),
(6, 'RPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lokasi`) VALUES
(1, 'Rak A'),
(3, 'Rak B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `tgl_konfirmasi_pengembalian` date DEFAULT NULL,
  `tgl_perpanjangan` date DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_pengembalian`, `tgl_konfirmasi_pengembalian`, `tgl_perpanjangan`, `status`) VALUES
(1, 5, 3, '2019-07-09', '2019-07-09', '2019-07-09', '2019-07-18', 'Sudah dikembalikan'),
(4, 4, 5, '2019-07-09', '2019-07-10', '2019-07-10', '2019-07-12', 'Sudah dikembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(12) DEFAULT NULL,
  `keperluan` varchar(15) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `jam_kunjungan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama`, `hp`, `keperluan`, `tgl_kunjungan`, `jam_kunjungan`) VALUES
('', 'Perl5', NULL, 'Baca Online', '2019-07-12', '05:57:53'),
('', 'Perl5', NULL, 'Baca Online', '2019-07-12', '10:59:11'),
('', 'Perl5', NULL, 'Baca Online', '2019-07-12', '05:59:42'),
('', 'Perl5', NULL, 'Baca Online', '2019-07-12', '12:00:12'),
('', 'Perl-0010', 'skdjfaksdj', 'Baca Online', '2019-07-12', '12:03:14'),
('Perl-0010', 'Perl-0010', 'skdjfaksdj', 'Baca Online', '2019-07-12', '12:06:48'),
('Pengunjung-006', 'mamamia', '098273832', 'Baca Online', '2019-07-12', '12:22:59'),
('Perl-0010', 'Perl-0010', 'skdjfaksdj', 'Baca Online', '2019-07-12', '12:43:23'),
('Perl5', 'Perl5', NULL, 'Baca Online', '2019-07-12', '12:52:33'),
('Perl5', 'Perl5', NULL, 'Baca Online', '2019-07-12', '12:54:10'),
('Perl-0010', 'Perl-0010', 'skdjfaksdj', 'Baca Online', '2019-07-12', '12:57:11'),
('Perl5', 'Perl5', NULL, 'Baca Online', '2019-07-12', '12:58:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pustakawan`
--

CREATE TABLE `pustakawan` (
  `id_pustakawan` int(11) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(12) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pustakawan`
--

INSERT INTO `pustakawan` (`id_pustakawan`, `no_identitas`, `nama`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `hp`, `tanggal_pembuatan`) VALUES
(2, '34578345793', 'coba1', '2019-07-16', 'Laki-laki', 'jl. slametriyadi', '92929292', '2019-07-06 06:49:33'),
(3, 'coba2', 'coba3', '1111-02-02', 'Laki-laki', 'coba2', '2323', '2019-07-06 06:50:25'),
(4, 'coba3', 'coba3`', '1945-01-01', 'Perempuan', 'asdkfja;sdlk', 'coba3', '2019-07-06 07:27:10'),
(5, 'coba4', 'cona4', '1998-02-02', 'Perempuan', 'asdasda', '09876636', '2019-07-06 07:27:43'),
(6, 'asdfasdfa', 'asdfasdfasd', '1994-01-02', 'Perempuan', 'adsfasdfasd', 'asdfasdf', '2019-07-06 07:28:25'),
(7, 'rjtiworjetoiwrje', 'eirjtowreiot', '1997-03-02', 'Perempuan', 'jl. anoa 1 no 78c', '082213777029', '2019-07-07 09:54:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `katalog_buku`
--
ALTER TABLE `katalog_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD PRIMARY KEY (`id_pustakawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `katalog_buku`
--
ALTER TABLE `katalog_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pustakawan`
--
ALTER TABLE `pustakawan`
  MODIFY `id_pustakawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
