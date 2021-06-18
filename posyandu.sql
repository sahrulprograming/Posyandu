-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2021 pada 00.50
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `kd_admin` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `alamat` varchar(258) NOT NULL,
  `no_tlpn` varchar(16) DEFAULT NULL,
  `foto` varchar(250) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`kd_admin`, `nik`, `nama`, `alamat`, `no_tlpn`, `foto`, `email`, `password`) VALUES
(1, '123456789', 'Admin Posyandu', 'Cimone', '0123456', 'topi.png', 'admin@gmail.com', '$2y$10$F59EIg8u6tnjUwVKPV/wLOKA6kXc8iCDSLggam.anYbpX5.UJRnki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `kd_anggota` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `posisi` varchar(65) DEFAULT NULL,
  `alamat` varchar(258) DEFAULT NULL,
  `no_tlpn` varchar(16) DEFAULT NULL,
  `foto` varchar(250) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `no_antrian` int(11) NOT NULL,
  `kd_ortu` int(11) DEFAULT NULL,
  `kd_jadwal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `balita`
--

CREATE TABLE `balita` (
  `kd_balita` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(65) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kd_bidan` int(11) DEFAULT NULL,
  `kd_ortu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `balita`
--

INSERT INTO `balita` (`kd_balita`, `nik`, `nama`, `jenis_kelamin`, `tgl_lahir`, `kd_bidan`, `kd_ortu`) VALUES
(14, '5987654', 'MUHAMMAD SAHRUL SAEFULAH', 'L', '2021-06-04', 6, 19),
(15, '234567890', 'yeshic', 'P', '2021-06-01', 6, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidan`
--

CREATE TABLE `bidan` (
  `kd_bidan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `alamat` varchar(258) NOT NULL,
  `no_tlpn` varchar(16) DEFAULT NULL,
  `foto` varchar(250) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidan`
--

INSERT INTO `bidan` (`kd_bidan`, `nik`, `nama`, `alamat`, `no_tlpn`, `foto`, `email`, `password`) VALUES
(6, '12340', 'tinta Nodanti', 'cimone', '098765456', 'default-P.jpg', 'tinta@gmail.com', '$2y$10$6oSABSoU9AjIoy5PSK3XVexacaI3Q2vCGiqfvZzgBq6Kty2azheMG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `controller_access`
--

CREATE TABLE `controller_access` (
  `role` varchar(45) NOT NULL,
  `controller` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `controller_access`
--

INSERT INTO `controller_access` (`role`, `controller`) VALUES
('Admin', 'admin'),
('User', 'Akun'),
('Bidan', 'admin'),
('anggota', 'Akun'),
('anggota', 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi`
--

CREATE TABLE `imunisasi` (
  `kd_imunisasi` int(11) NOT NULL,
  `jenis_imunisasi` varchar(55) NOT NULL,
  `keterangan` varchar(225) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `kd_balita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` int(11) NOT NULL,
  `kas_PMT` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(45) DEFAULT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `dibuat_pada` date NOT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `kd_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `kas_PMT`, `tanggal`, `tempat`, `jam_mulai`, `jam_selesai`, `dibuat_pada`, `keterangan`, `kd_admin`) VALUES
(15, 50000, '2021-06-19', 'Posyandu Mawar 20', '08:15:00', '18:15:00', '2021-06-18', 'Cek Kesehatan Balita', 1),
(16, 60000, '2021-06-30', 'Posyandu Mawar 20', '08:01:00', '10:01:00', '2021-06-19', 'Cek Kesehatan Balita', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_pmt`
--

CREATE TABLE `kas_pmt` (
  `kd_kas` int(11) NOT NULL,
  `kd_pmt` int(11) DEFAULT NULL,
  `nominal_masuk` int(11) DEFAULT NULL,
  `nominal_keluar` int(11) DEFAULT NULL,
  `keterangan` varchar(258) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kas_pmt`
--

INSERT INTO `kas_pmt` (`kd_kas`, `kd_pmt`, `nominal_masuk`, `nominal_keluar`, `keterangan`) VALUES
(1, 21, 100000, NULL, ''),
(2, 22, 120000, NULL, ''),
(3, NULL, NULL, 100000, ''),
(4, NULL, NULL, 20000, 'coba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kd_kegiatan` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `foto_kegiatan` varchar(250) NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`kd_kegiatan`, `judul`, `foto_kegiatan`, `keterangan`) VALUES
(1, 'Program kesehatan Anak', 'posyandu.jpg', 'Salah satu program utama posyandu adalah menyelenggarakan pemeriksaan bayi dan balita secara rutin. Hal ini penting dilakukan untuk memantau tumbuh kembang anak dan mendeteksi sejak dini bila anak mengalami gangguan tumbuh kembang.\r\n\r\nJenis pelayanan yang diselenggarakan posyandu untuk balita mencakup penimbangan berat badan, pengukuran tinggi badan dan lingkar kepala anak, evaluasi tumbuh kembang, serta penyuluhan dan konseling tumbuh kembang. Hasil pemeriksaan tersebut kemudian dicatat di dalam buku KIA atau KMS.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `kd_kehadiran` int(11) NOT NULL,
  `status` enum('hadir','tidak hadir') NOT NULL,
  `keterangan` varchar(258) DEFAULT NULL,
  `kd_jadwal` int(11) DEFAULT NULL,
  `kd_ortu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu_untuk` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `menu_untuk`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang_tua`
--

CREATE TABLE `orang_tua` (
  `kd_ortu` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `nama` varchar(65) NOT NULL,
  `alamat` varchar(258) NOT NULL,
  `no_tlpn` varchar(16) DEFAULT NULL,
  `foto` varchar(250) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `status` enum('aktif','non aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orang_tua`
--

INSERT INTO `orang_tua` (`kd_ortu`, `nik`, `no_kk`, `nama`, `alamat`, `no_tlpn`, `foto`, `email`, `password`, `status`) VALUES
(19, '4545678', '345678', 'yulia', 'jln yuli', '0987633456', 'default-P.jpg', 'yuli@gmail.com', '$2y$10$GnYRC8.kaxTXg6yEzTCm7.d2PYNnLpRPFKYYiirvtkyTYOTgcFb2K', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penimbangan`
--

CREATE TABLE `penimbangan` (
  `kd_penimbang` int(11) NOT NULL,
  `bb` int(11) NOT NULL,
  `tb` int(11) NOT NULL,
  `keluhan` varchar(500) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `kd_balita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pmt`
--

CREATE TABLE `status_pmt` (
  `kd_pmt` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` enum('lunas','menunggu') NOT NULL,
  `kd_jadwal` int(11) DEFAULT NULL,
  `kd_ortu` int(11) DEFAULT NULL,
  `jml_balita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pmt`
--

INSERT INTO `status_pmt` (`kd_pmt`, `tgl_bayar`, `status_bayar`, `kd_jadwal`, `kd_ortu`, `jml_balita`) VALUES
(21, '2021-06-18', 'lunas', 15, 19, 2),
(22, '2021-06-19', 'lunas', 16, 19, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_menu`
--

INSERT INTO `sub_menu` (`id_sub_menu`, `id_menu`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dasboard', 'admin', 'dripicons-meter', 1),
(2, 1, 'Orang Tua', 'admin/orang_tua', 'fas fa-users', 1),
(3, 1, 'Balita', 'admin/balita', 'fas fa-baby', 1),
(4, 1, 'Bidan', 'admin/bidan', 'fas fa-user-md', 1),
(5, 1, 'PMT', 'admin/pmt', 'fas fa-money-bill-wave-alt', 1),
(6, 1, 'Data Penimbang', 'admin/data_penimbang', 'fas fa-balance-scale', 1),
(7, 1, 'Imunisasi', 'admin/imunisasi', 'fas fa-syringe', 1),
(8, 2, 'Home', 'akun', 'fas fa-home', 1),
(9, 2, 'Jadwal Posyandu', 'akun/jadwal_posyandu', 'far fa-calendar-alt', 1),
(10, 2, 'Balita', 'akun/balita', 'fas fa-baby', 1),
(11, 2, 'Kas PMT', 'akun/pmt', 'fas fa-money-bill-wave-alt', 1),
(12, 3, 'Home', 'akun', 'fas fa-home', 1),
(13, 3, 'Data Orang Tua', 'anggota/orang_tua', 'fas fa-users', 1),
(14, 3, 'Data Balita', 'anggota/balita', 'fas fa-baby', 1),
(15, 3, 'Jadwal Posyandu', 'akun/jadwal_posyandu', 'far fa-calendar-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`kd_anggota`);

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD KEY `antrian_ibfk_1` (`kd_ortu`),
  ADD KEY `antrian_ibfk_2` (`kd_jadwal`);

--
-- Indeks untuk tabel `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`kd_balita`),
  ADD KEY `balita_ibfk_2` (`kd_ortu`),
  ADD KEY `balita_ibfk_1` (`kd_bidan`);

--
-- Indeks untuk tabel `bidan`
--
ALTER TABLE `bidan`
  ADD PRIMARY KEY (`kd_bidan`);

--
-- Indeks untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`kd_imunisasi`),
  ADD KEY `imunisasi_ibfk_1` (`kd_balita`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kd_admin` (`kd_admin`);

--
-- Indeks untuk tabel `kas_pmt`
--
ALTER TABLE `kas_pmt`
  ADD PRIMARY KEY (`kd_kas`),
  ADD KEY `kas_pmt_ibfk_1` (`kd_pmt`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kd_kegiatan`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`kd_kehadiran`),
  ADD KEY `kehadiran_ibfk_1` (`kd_jadwal`),
  ADD KEY `kehadiran_ibfk_2` (`kd_ortu`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`kd_ortu`);

--
-- Indeks untuk tabel `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD PRIMARY KEY (`kd_penimbang`),
  ADD KEY `penimbangan_ibfk_1` (`kd_balita`);

--
-- Indeks untuk tabel `status_pmt`
--
ALTER TABLE `status_pmt`
  ADD PRIMARY KEY (`kd_pmt`),
  ADD KEY `status_pmt_ibfk_1` (`kd_jadwal`),
  ADD KEY `status_pmt_ibfk_2` (`kd_ortu`);

--
-- Indeks untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `kd_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `kd_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `balita`
--
ALTER TABLE `balita`
  MODIFY `kd_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `bidan`
--
ALTER TABLE `bidan`
  MODIFY `kd_bidan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `kd_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kd_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kas_pmt`
--
ALTER TABLE `kas_pmt`
  MODIFY `kd_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kd_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `kd_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `kd_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `penimbangan`
--
ALTER TABLE `penimbangan`
  MODIFY `kd_penimbang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `status_pmt`
--
ALTER TABLE `status_pmt`
  MODIFY `kd_pmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`kd_ortu`) REFERENCES `orang_tua` (`kd_ortu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `antrian_ibfk_2` FOREIGN KEY (`kd_jadwal`) REFERENCES `jadwal` (`kd_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `balita`
--
ALTER TABLE `balita`
  ADD CONSTRAINT `balita_ibfk_1` FOREIGN KEY (`kd_bidan`) REFERENCES `bidan` (`kd_bidan`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `balita_ibfk_2` FOREIGN KEY (`kd_ortu`) REFERENCES `orang_tua` (`kd_ortu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD CONSTRAINT `imunisasi_ibfk_1` FOREIGN KEY (`kd_balita`) REFERENCES `balita` (`kd_balita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`);

--
-- Ketidakleluasaan untuk tabel `kas_pmt`
--
ALTER TABLE `kas_pmt`
  ADD CONSTRAINT `kas_pmt_ibfk_1` FOREIGN KEY (`kd_pmt`) REFERENCES `status_pmt` (`kd_pmt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`kd_jadwal`) REFERENCES `jadwal` (`kd_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`kd_ortu`) REFERENCES `orang_tua` (`kd_ortu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD CONSTRAINT `penimbangan_ibfk_1` FOREIGN KEY (`kd_balita`) REFERENCES `balita` (`kd_balita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `status_pmt`
--
ALTER TABLE `status_pmt`
  ADD CONSTRAINT `status_pmt_ibfk_1` FOREIGN KEY (`kd_jadwal`) REFERENCES `jadwal` (`kd_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_pmt_ibfk_2` FOREIGN KEY (`kd_ortu`) REFERENCES `orang_tua` (`kd_ortu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
