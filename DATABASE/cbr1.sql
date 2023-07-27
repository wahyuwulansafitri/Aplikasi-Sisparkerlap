-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2023 pada 08.06
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbr1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin1`
--

CREATE TABLE `tb_admin1` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_admin1`
--

INSERT INTO `tb_admin1` (`id_admin`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ciri1`
--

CREATE TABLE `tb_ciri1` (
  `id_ciri` int(11) NOT NULL,
  `nama_ciri` text NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_ciri1`
--

INSERT INTO `tb_ciri1` (`id_ciri`, `nama_ciri`, `bobot`) VALUES
(1, 'blue screen of the death', 5),
(2, 'performa laptop lambat saat menjalankan apk / membuka file', 3),
(3, 'laptop hang / sering tidak responsif', 5),
(4, 'muncul pesan kesalahan seperti (disk read error occured, disk boot faillure,not bootable device found)', 5),
(5, 'file rusak / hilang', 3),
(6, 'suhu laptop tinggi / panas berlebihan', 3),
(7, 'laptop hanya bisa hidup sampai logo windows', 3),
(8, 'muncul bunyi-bunyi aneh', 1),
(9, 'penurunan kinerja secara keseluruhan', 3),
(10, 'kegagalan boot saat restart yang sering terjadi', 5),
(11, 'layar membeku, berkedip / tiba-tiba mati', 3),
(12, 'bunyi beep saat booting', 1),
(13, 'mengalami error / kesalahan saat melakukan tugas tertentu', 3),
(14, 'muncul pesan kesalahan seperti (aplikasi tidak merespons / file tidak ditemukan)', 3),
(15, 'laptop sulit booting / tidak dapat booting', 5),
(16, 'start menu tidak dapat dijalankan', 3),
(17, 'prosedur shutdown tidak dapat dijalankan', 3),
(18, 'laptop tidak menyala / tidak ada tanda-tanda kehidupan', 5),
(19, 'suara beep yang berulang saat booting', 3),
(20, 'tidak ada tampilan / tampilan buram,', 5),
(21, 'usb dan port lainnya tidak berfungsi', 3),
(22, 'laptop mati mendadak (bukan karena habis batrai)', 5),
(23, 'kapasitas daya cepat berkurang', 3),
(24, 'pengisian daya lambat', 3),
(25, 'batrai panas saat mengisi daya', 3),
(26, 'batrai bengkak', 5),
(27, 'muncul tanda silang di logo batrai', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis1`
--

CREATE TABLE `tb_jenis1` (
  `id_jenis` varchar(5) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  `detail_jenis` text NOT NULL,
  `solusi_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_jenis1`
--

INSERT INTO `tb_jenis1` (`id_jenis`, `nama_jenis`, `detail_jenis`, `solusi_jenis`) VALUES
('A01', 'Hardisk', 'Berikut adalah beberapa gejala kerusakan Hardisk:\r\nGejalanya meliputi muncul bunyi-bunyi aneh, performa laptop lambat saat menjalankan apk / membuka file, laptop hang / sering tidak responsif, muncul pesan kesalahan seperti (disk read error occured, disk boot faillure, data not bootable device found, disk boot faillure), file rusak / hilang, suhu laptop tinggi / panas berlebihan, dan laptop hanya bisa hidup sampai logo windows.', 'Solusi untuk kerusakan pada hardisk tergantung pada jenis dan tingkat kerusakan yang terjadi. Berikut beberapa solusi umumnya:\r\n\r\n1. Cadangkan data: Simpan data penting pada hardisk eksternal, cloud storage, atau media penyimpanan lainnya.\r\n\r\n2. Periksa kabel dan koneksi: Pastikan kabel SATA atau kabel daya tidak rusak atau lepas. Periksa juga koneksi antara hardisk dan motherboard atau kontroler. Ganti dengan yang baru jika perlu.\r\n\r\n3. Gunakan utilitas perbaikan hardisk: Produsen hardisk sering menyediakan utilitas perbaikan khusus. Unduh dan ikuti petunjuk penggunaan dari situs resmi produsen hardisk.\r\n\r\n4. Gunakan software pemulihan data: Jika hardisk mengalami kerusakan logis dan tidak dapat diakses, gunakan software pemulihan data khusus yang tersedia secara komersial atau gratis.\r\n\r\n5. Perbaikan profesional: Jika tidak memiliki pengetahuan atau keterampilan teknis, atau hardisk mengalami kerusakan mekanis serius, bawa ke pusat perbaikan profesional dengan peralatan dan keahlian yang tepat.\r\n\r\n6. Ganti hardisk: Jika kerusakan parah atau tidak dapat diperbaiki, ganti dengan hardisk baru. Instalasi hardisk baru dan pengaturan ulang sistem operasi diperlukan.\r\n\r\nPerlu dicatat bahwa solusi di atas mungkin tidak selalu berhasil memperbaiki semua jenis kerusakan hardisk, terutama yang disebabkan oleh kerusakan fisik yang serius. Jika data sangat berharga, disarankan untuk menghubungi profesional IT atau pusat perbaikan hardisk yang terpercaya.'),
('A02', 'Ram', 'Berikut adalah beberapa gejala kerusakan RAM: blue screen of the death, penurunan kinerja secara keseluruhan, kegagalan boot saat restart yang sering terjadi, layar membeku, berkedip / tiba-tiba mati, bunyi beep saat booting, mengalami error / kesalahan saat melakukan tugas tertentu', 'Berikut solusi jika menghadapi kerusakan RAM:\r\n\r\n1. Bersihkan konektor RAM: Matikan komputer, lepas modul RAM dengan hati-hati, periksa konektor RAM untuk debu atau kotoran, lalu pasang kembali dengan benar.\r\n\r\n2. Ganti slot RAM: Pindahkan modul RAM ke slot yang berbeda untuk mengidentifikasi masalah dengan slot atau modul RAM.\r\n\r\n3. Periksa kompatibilitas: Pastikan modul RAM kompatibel dengan motherboard dan sistem Anda dengan memeriksa spesifikasi atau panduan motherboard atau situs web produsen.\r\n\r\n4. Hapus debu: Gunakan kaleng udara terkompresi atau penghisap debu untuk membersihkan permukaan modul RAM secara lembut dan hindari sentuhan langsung pada bagian logam.\r\n\r\n5. Gunakan utilitas diagnostik: Gunakan utilitas diagnostik dari produsen RAM untuk mengidentifikasi masalah pada modul RAM.\r\n\r\n6. Ganti modul RAM: Jika masalah tetap berlanjut, pertimbangkan mengganti modul RAM dengan yang baru dan kompatibel.\r\n\r\nPerlu diingat bahwa RAM sensitif dan rentan terhadap kerusakan oleh listrik statis atau kesalahan penanganan. Ikuti petunjuk perawatan dan instalasi dari produsen serta pastikan laptop mati sebelum melakukan perbaikan atau pemeriksaan pada RAM. Jika merasa tidak yakin atau kurang memiliki pengetahuan teknis, sebaiknya minta bantuan dari teknisi atau profesional IT berpengalaman.'),
('A03', 'Sistem Operasi', 'Berikut adalah beberapa gejala kerusakan pada sistem operasi: performa laptop lambat saat menjalankan apk / membuka file, laptop hang / sering tidak responsif, blue screen of the death, muncul pesan kesalahan seperti (aplikasi tidak merespons / file tidak ditemukan), laptop sulit booting / tidak dapat booting, file rusak / hilang, start menu tidak dapat dijalankan, prosedur shutdown tidak dapat dijalankan. ', 'Berikut adalah beberapa solusi umum yang dapat Anda pertimbangkan jika menghadapi kerusakan pada sistem operasi: \r\n1. Restart sistem: Lakukan restart pada komputer atau perangkat Anda untuk menyelesaikan masalah sementara. 2. Perbaiki startup: Gunakan opsi pemulihan bawaan sistem operasi untuk memperbaiki masalah saat booting, 3. Perbaiki file sistem: Gunakan utilitas sistem untuk memperbaiki file sistem yang rusak atau hilang, 4. Instal ulang sistem operasi: Lakukan instal ulang sistem operasi jika masalah tidak dapat diperbaiki, 5. Gunakan utilitas pemulihan sistem: Manfaatkan utilitas pemulihan sistem untuk memperbaiki masalah yang kompleks, 6. Dapatkan bantuan teknis: Cari bantuan dari teknisi atau profesional IT jika perlu.\r\nPenting untuk diingat bahwa setiap masalah pada sistem operasi dapat bervariasi, dan solusi yang tepat tergantung pada sifat dan penyebab masalah tersebut. Selalu penting untuk membuat cadangan data yang penting sebelum melakukan tindakan perbaikan atau pengaturan ulang sistem operasi'),
('A04', 'Motherboard', 'Berikut beberapa kerusakan pada mottherboard: laptop tidak menyala / tidak ada tanda-tanda kehidupan, suara beep yang berulang saat booting, tidak ada tampilan / tampilan buram, usb dan port lainnya tidak berfungsi, laptop mati mendadak (bukan karena habis batrai).', 'Solusi untuk kerusakan motherboard bervariasi tergantung pada jenis dan tingkat kerusakan yang terjadi. Berikut beberapa solusi umum yang dapat dipertimbangkan:\r\n\r\n1. Periksa koneksi dan kabel: Pastikan semua kabel dan konektor motherboard terhubung dengan baik dan tidak rusak.\r\n\r\n2. Periksa tegangan daya: Verifikasi pasokan daya sesuai spesifikasi yang disarankan untuk motherboard.\r\n\r\n3. Reset BIOS/CMOS: Kembalikan pengaturan BIOS/CMOS ke default untuk mengatasi masalah konfigurasi.\r\n\r\n4. Tes dengan komponen yang berfungsi: Gantikan atau uji komponen yang diketahui berfungsi dengan motherboard yang bermasalah.\r\n\r\n5. Bawa ke teknisi profesional: Jika tidak memiliki pengetahuan atau keterampilan teknis, bawa motherboard ke teknisi atau pusat layanan terpercaya.\r\n\r\nPerlu diingat bahwa perbaikan motherboard yang kompleks atau kerusakan yang parah mungkin memerlukan penggantian motherboard yang baru. Jika masih ada garansi, hubungi produsen motherboard untuk mendapatkan bantuan lebih lanjut. Selain itu, penting untuk mencadangkan data penting sebelum melakukan tindakan perbaikan atau penggantian komponen pada motherboard.'),
('A05', 'Batrai', 'Berikut gejala beberapa kerusakan pada batrai: kapasitas daya cepat berkurang, pengisian daya lambat, batrai panas saat mengisi daya, batrai bengkak, muncul tanda silang di logo batrai.', 'Solusi untuk kerusakan pada baterai dapat bergantung pada jenis baterai yang terkena masalah.\r\nBerikut ini adalah beberapa solusi yang umum digunakan: \r\n1. Pengecasan ulang: Cas ulang baterai dengan charger yang sesuai sampai mencapai tingkat daya yang cukup, 2. Ganti baterai: Gantikan baterai yang rusak dengan yang baru, sesuai petunjuk produsen, 3. Perbaikan baterai: Perbaikan baterai sebaiknya dilakukan oleh profesional atau pusat layanan yang tepat, 4. Cek koneksi: Pastikan koneksi baterai tidak longgar atau kotor, (bersihkan jika perlu), 4. Pengaturan penggunaan baterai: Sesuaikan pengaturan perangkat yang mempengaruhi penggunaan baterai untuk memperpanjang masa.\r\nPenting untuk diingat bahwa baterai yang rusak atau sudah mencapai akhir masa pakainya mungkin tidak dapat diperbaiki dan perlu diganti. Selalu pastikan menggunakan baterai yang sesuai dan mengikuti petunjuk produsen untuk perawatan dan penggunaan yang benar.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_klasifikasi1`
--

CREATE TABLE `tb_klasifikasi1` (
  `id_klasifikasi` int(11) NOT NULL,
  `id_jenis` varchar(5) NOT NULL,
  `id_ciri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_klasifikasi1`
--

INSERT INTO `tb_klasifikasi1` (`id_klasifikasi`, `id_jenis`, `id_ciri`) VALUES
(28, 'A01', 1),
(29, 'A01', 2),
(30, 'A01', 3),
(31, 'A01', 4),
(32, 'A01', 5),
(33, 'A01', 6),
(34, 'A01', 7),
(35, 'A01', 8),
(36, 'A02', 1),
(37, 'A02', 9),
(38, 'A02', 10),
(39, 'A02', 11),
(40, 'A02', 12),
(41, 'A02', 13),
(42, 'A03', 2),
(43, 'A03', 3),
(44, 'A03', 1),
(45, 'A03', 14),
(46, 'A03', 15),
(47, 'A03', 5),
(48, 'A03', 16),
(49, 'A03', 17),
(50, 'A04', 18),
(51, 'A04', 19),
(52, 'A04', 20),
(53, 'A04', 21),
(54, 'A04', 22),
(55, 'A05', 23),
(56, 'A05', 24),
(57, 'A05', 25),
(58, 'A05', 26),
(59, 'A05', 27);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin1`
--
ALTER TABLE `tb_admin1`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_ciri1`
--
ALTER TABLE `tb_ciri1`
  ADD PRIMARY KEY (`id_ciri`);

--
-- Indeks untuk tabel `tb_jenis1`
--
ALTER TABLE `tb_jenis1`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_klasifikasi1`
--
ALTER TABLE `tb_klasifikasi1`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_ciri` (`id_ciri`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin1`
--
ALTER TABLE `tb_admin1`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_ciri1`
--
ALTER TABLE `tb_ciri1`
  MODIFY `id_ciri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tb_klasifikasi1`
--
ALTER TABLE `tb_klasifikasi1`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_klasifikasi1`
--
ALTER TABLE `tb_klasifikasi1`
  ADD CONSTRAINT `a` FOREIGN KEY (`id_ciri`) REFERENCES `tb_ciri1` (`id_ciri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `b` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis1` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
