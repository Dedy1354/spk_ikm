-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Jun 2017 pada 11.18
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `ID_ANGGOTA` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `NAMA_ANGGOTA` varchar(35) DEFAULT NULL,
  `JENIS_KELAMIN_ANGGOTA` varchar(10) DEFAULT NULL,
  `TANGGAL_LAHIR_ANGGOTA` datetime DEFAULT NULL,
  `ALAMAT_ANGGOTA` varchar(100) DEFAULT NULL,
  `KEWARGANEGARAAN_ANGGOTA` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE IF NOT EXISTS `angsuran` (
  `ID_ANGSURAN` varchar(10) NOT NULL,
  `ID_ANGGOTA` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `LAMA_ANGSURAN` varchar(10) DEFAULT NULL,
  `TANGGAL_ANGSURAN` datetime DEFAULT NULL,
  `JUMLAH_ANGSURAN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inovasi_koperasi`
--

CREATE TABLE IF NOT EXISTS `inovasi_koperasi` (
  `ID_INOVASI_KOPERASI` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `JUMLAH_PRODUK_TERBARU_KOPERASI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE IF NOT EXISTS `jasa` (
  `ID_JASA` int(11) NOT NULL,
  `ID_ANGSURAN` varchar(10) DEFAULT NULL,
  `BESAR_JASA` varchar(15) DEFAULT NULL,
  `TANGGAL_JASA` datetime DEFAULT NULL,
  `JUMLAH_JASA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pinjaman`
--

CREATE TABLE IF NOT EXISTS `kategori_pinjaman` (
  `ID_KAT_PIN` varchar(10) NOT NULL,
  `JENIS_PINJAMAN` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_simpanan`
--

CREATE TABLE IF NOT EXISTS `kategori_simpanan` (
  `ID_KATEGORI` varchar(10) NOT NULL,
  `JENIS_SIMPANAN` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keberadaan_rk_dan_rapbn`
--

CREATE TABLE IF NOT EXISTS `keberadaan_rk_dan_rapbn` (
  `ID_KEBERADAAN_RK_DAN_RAPBN` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `BANYAK_RENCANA_KERJA` tinyint(1) DEFAULT NULL,
  `REALISASI_RENCANA_KERJA` tinyint(1) DEFAULT NULL,
  `RENCANA_PENDAPATAN` varchar(15) DEFAULT NULL,
  `REALISASI_PENDAPATAN` varchar(15) DEFAULT NULL,
  `RENCANA_BELANJA` varchar(15) DEFAULT NULL,
  `REALISASI_BELANJA` varchar(15) DEFAULT NULL,
  `RENCANA_SHU` varchar(15) DEFAULT NULL,
  `REALISASI_SHU` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keberadaan_sistem_informasi`
--

CREATE TABLE IF NOT EXISTS `keberadaan_sistem_informasi` (
  `ID_KEBERADAAN_SISTEM_INFORMASI` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `KEBERADAAN_SISTEM_INFORMASI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kemampuan_bersaing_koperasi`
--

CREATE TABLE IF NOT EXISTS `kemampuan_bersaing_koperasi` (
  `ID_KEMAMPUAN_BERSAING_KOPERASI` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `PESAING_KOPERASI` tinyint(1) DEFAULT NULL,
  `STRATEGI_BERSAING_KOPERASI` tinyint(1) DEFAULT NULL,
  `DISTRIBUSI_PRODUK_DARI_KOPERASI_LAIN` tinyint(1) DEFAULT NULL,
  `PEMILIHAN_PRODUK_KOPERASI` tinyint(1) DEFAULT NULL,
  `KEMUDAHAN_PRODUK_KOPERASI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kemudahan_akses_informasi`
--

CREATE TABLE IF NOT EXISTS `kemudahan_akses_informasi` (
  `ID_KEMUDAHAN_AKSES_INFORMASI` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ANGGOTA` tinyint(1) DEFAULT NULL,
  `PEMBINA` tinyint(1) DEFAULT NULL,
  `REKANAN_KERJA` tinyint(1) DEFAULT NULL,
  `MASYARAKAT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepengawasan_periode`
--

CREATE TABLE IF NOT EXISTS `kepengawasan_periode` (
  `ID_KEPENGAWASAN_PERIODE` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_PENGAWAS` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepengurusan_periode`
--

CREATE TABLE IF NOT EXISTS `kepengurusan_periode` (
  `ID_KEPENGURUSAN_PERIODE` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PENGURUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kepengurusan_periode`
--

INSERT INTO `kepengurusan_periode` (`ID_KEPENGURUSAN_PERIODE`, `ID_PERIODE`, `ID_KOPERASI`, `ID_PENGURUS`) VALUES
('KPG-0001', 'PER-0001', 'KOP-0001', 'PGR-0001'),
('KPG-0002', 'PER-0002', 'KOP-0001', 'PGR-0002'),
('KPG-0003', 'PER-0001', 'KOP-0001', 'PGR-0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketaatan_membayar_pajak`
--

CREATE TABLE IF NOT EXISTS `ketaatan_membayar_pajak` (
  `ID_KETAATAN_MEMBAYAR_PAJAK` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `NPWP_KOPERASI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterkaitan_usaha_koperasi_dengan_anggota`
--

CREATE TABLE IF NOT EXISTS `keterkaitan_usaha_koperasi_dengan_anggota` (
  `ID_KETERKAITAN_USAHA_KOPERASI_DENGAN_ANGGOTA` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `JUMLAH_USAHA_KOPERASI` varchar(5) DEFAULT NULL,
  `JUMLAH_JENIS_USAHA_KESELURUHAN` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja_kepengurusan`
--

CREATE TABLE IF NOT EXISTS `kinerja_kepengurusan` (
  `ID_KINERJA_KEPENGURUSAN` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `JUMLAH_NILAI_KINERJA_KEPENGURUSAN` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komunikasi_bisnis_ke_masyarakat`
--

CREATE TABLE IF NOT EXISTS `komunikasi_bisnis_ke_masyarakat` (
  `ID_KOMUNIKASI_BISNIS_KE_MASYARAKAT` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `JUMLAH_JENIS_INFORMASI_BISNIS_KE_MASYARAKAT` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `koperasi`
--

CREATE TABLE IF NOT EXISTS `koperasi` (
  `ID_KOPERASI` varchar(10) NOT NULL,
  `NAMA_KOPERASI` varchar(35) DEFAULT NULL,
  `ALAMAT_KOPERASI` varchar(100) DEFAULT NULL,
  `BADAN_HUKUM_KOPERASI` varchar(100) DEFAULT NULL,
  `JENIS_KOPERASI` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `koperasi`
--

INSERT INTO `koperasi` (`ID_KOPERASI`, `NAMA_KOPERASI`, `ALAMAT_KOPERASI`, `BADAN_HUKUM_KOPERASI`, `JENIS_KOPERASI`) VALUES
('KOP-0001', 'UTM', 'Telang', 'ss', 'ggg'),
('KOP-0002', 'socah', 'socah', 'ggg', 'hg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_usaha_koperasi`
--

CREATE TABLE IF NOT EXISTS `layanan_usaha_koperasi` (
  `ID_LAYANAN_USAHA_KOPERASI` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `BANYAKNYA_JENIS_USAHA_KOPERASI` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajemen_pengawasan`
--

CREATE TABLE IF NOT EXISTS `manajemen_pengawasan` (
  `ID_MANAJEMEN_PENGAWASAN` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `DILAKUKAN_PENGAWAS` tinyint(1) DEFAULT NULL,
  `HASIL_INDEPENDENT_MENOLAK_MEMBERIKAN_OPINI` tinyint(1) DEFAULT NULL,
  `HASIL_INDEPENDENT_TANPA_PENDAPAT` tinyint(1) DEFAULT NULL,
  `HASIL_INDEPENDENT_WAJAR_DENGAN_CATATAN` tinyint(1) DEFAULT NULL,
  `HASIL_INDEPENDENT_WAJAR_TANPA_SYARAT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_pendidikan_dan_pelatihan_pengurus`
--

CREATE TABLE IF NOT EXISTS `model_pendidikan_dan_pelatihan_pengurus` (
  `ID_MODEL_PENDIDIKAN_DAN_PELATIHAN_PENGURUS` varchar(8) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `PROGRAM_KERJA_KOPERASI` tinyint(1) DEFAULT NULL,
  `REALISASI_PELATIHAN` tinyint(1) DEFAULT NULL,
  `BANYAKNYA_PELATIHAN` varchar(5) DEFAULT NULL,
  `JUMLAH_ANGGOTA_YANG_MENGIKUTI_PELATIHAN` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan_sosial`
--

CREATE TABLE IF NOT EXISTS `pelayanan_sosial` (
  `ID_PELAYANAN_SOSIAL` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `JUMLAH_DANA_PELAYANAN_SOSIAL` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawas`
--

CREATE TABLE IF NOT EXISTS `pengawas` (
  `ID_PENGAWAS` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `NAMA_PENGAWAS` varchar(35) DEFAULT NULL,
  `JENIS_KELAMIN_PENGAWAS` varchar(10) DEFAULT NULL,
  `JABATAN_PENGAWAS` varchar(15) DEFAULT NULL,
  `MASA_BAKTI_PENGAWAS` varchar(10) DEFAULT NULL,
  `PEKERJAAN_PENGAWAS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengawas`
--

INSERT INTO `pengawas` (`ID_PENGAWAS`, `ID_KOPERASI`, `NAMA_PENGAWAS`, `JENIS_KELAMIN_PENGAWAS`, `JABATAN_PENGAWAS`, `MASA_BAKTI_PENGAWAS`, `PEKERJAAN_PENGAWAS`) VALUES
('PGW-0001', 'KOP-0001', 'santii', 'Laki-laki', 'Ketua', '2', 'PNS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `ID_PENGURUS` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `NAMA_PENGURUS` varchar(30) DEFAULT NULL,
  `JENIS_KELAMIN_PENGURUS` varchar(10) DEFAULT NULL,
  `JABATAN_PENGURUS` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`ID_PENGURUS`, `ID_KOPERASI`, `NAMA_PENGURUS`, `JENIS_KELAMIN_PENGURUS`, `JABATAN_PENGURUS`) VALUES
('PGR-0001', 'KOP-0001', 'santii', 'Perempuan', 'Sekretaris'),
('PGR-0002', 'KOP-0001', 'santii', 'Perempuan', 'Ketua'),
('PGR-0003', 'KOP-0001', 'Susi', 'Laki-laki', 'Ketua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_periode`
--

CREATE TABLE IF NOT EXISTS `penilaian_periode` (
  `ID_PENILAIAN_PERIODE` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_TIM_INDEPENDENT` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peningkatan_penyertaan_modal_koperasi`
--

CREATE TABLE IF NOT EXISTS `peningkatan_penyertaan_modal_koperasi` (
  `ID_PENINGKATAN_PENYERTAAN_MODAL_KOPERASI` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `PENYERTAAN_MODAL_KOPERASI_TAHUN_SESUDAH` varchar(15) DEFAULT NULL,
  `PENYERTAAN_MODAL_KOPERASI_TAHUN_SEBELUM` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyerapan_tenaga_kerja`
--

CREATE TABLE IF NOT EXISTS `penyerapan_tenaga_kerja` (
  `ID_PENYERAPAN_TENAGA_KERJA` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `TENAGA_KERJA_TAHUN_SESUDAHNYA` varchar(5) DEFAULT NULL,
  `TENAGA_KERJA_TAHUN_SEBELUMNYA` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE IF NOT EXISTS `periode` (
  `ID_PERIODE` varchar(10) NOT NULL,
  `TAHUN_PERIODE` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`ID_PERIODE`, `TAHUN_PERIODE`) VALUES
('PER-0001', '2017'),
('PER-0002', '2018'),
('PER-0003', '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `ID_PINJAMAN` varchar(10) NOT NULL,
  `ID_ANGGOTA` varchar(10) DEFAULT NULL,
  `ID_KAT_PIN` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `TANGGAL_PINJAMAN` datetime DEFAULT NULL,
  `JUMLAH_PINJAMAN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pola_pengkaderan`
--

CREATE TABLE IF NOT EXISTS `pola_pengkaderan` (
  `ID_POLA_PENGKADERAN` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `POLA_KADERISASI` tinyint(1) DEFAULT NULL,
  `SISTEM_REKRUITMEN_KADER` tinyint(1) DEFAULT NULL,
  `SISTEM_PEMBINAAN_KADER` tinyint(1) DEFAULT NULL,
  `JUMLAH_KADER_PENGURUS` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prosentase_besaran_simpanan_sukarela`
--

CREATE TABLE IF NOT EXISTS `prosentase_besaran_simpanan_sukarela` (
  `ID_PROSENTASE_BESARAN_SIMPANAN_SUKARELA` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `JUMLAH_SIMPANAN_SUKARELA_TAHUN_SESUDAH` varchar(15) DEFAULT NULL,
  `JUMLAH_SIMPANAN_SUKARELA_TAHUN_SEBELUM` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prosentase_pelunasan_simpanan_wajib`
--

CREATE TABLE IF NOT EXISTS `prosentase_pelunasan_simpanan_wajib` (
  `ID_PROSENTASE_PELUNASAN_SIMPANAN_WAJIB` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `BESAR_SIMPANAN_WAJIB_PER_ANGGOTA` varchar(15) DEFAULT NULL,
  `BESAR_SIMPANAN_WAJIB_YANG_TERKUMPUL` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapat_koperasi`
--

CREATE TABLE IF NOT EXISTS `rapat_koperasi` (
  `ID_RAPAT_KOPERASI` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `RAPAT_ANGGOTA_TAHUNAN` tinyint(1) DEFAULT NULL,
  `RAPAT_PENGURUS` tinyint(1) DEFAULT NULL,
  `RAPAT_PENGAWAS` tinyint(1) DEFAULT NULL,
  `RAPAT_GABUNGAN` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rasio_kondisi_operasional_usaha`
--

CREATE TABLE IF NOT EXISTS `rasio_kondisi_operasional_usaha` (
  `ID_MANFAAT_` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `BANYAK_UNIT_USAHA_YANG_MASIH_BERJALAN` tinyint(1) DEFAULT NULL,
  `BANYAK_UNIT_USAHA_KESELURUHAN` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rasio_peningkatan_jumlah_anggota`
--

CREATE TABLE IF NOT EXISTS `rasio_peningkatan_jumlah_anggota` (
  `ID_RASIO_PENINGKATAN_JUMLAH_ANGGOTA` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `JUMLAH_ANGGOTA_TAHUN_SESUDAHNYA` varchar(5) DEFAULT NULL,
  `JUMLAH_ANGGOTA_TAHUN_SEBELUMNYA` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rasio_transaksi_anggota`
--

CREATE TABLE IF NOT EXISTS `rasio_transaksi_anggota` (
  `ID_RASIO_TRANSAKSI_ANGGOTA` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `NILAI_TRANSAKSI_ANGGOTA` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shu`
--

CREATE TABLE IF NOT EXISTS `shu` (
  `ID_SHU` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `PENDAPATAN_JASA` varchar(20) DEFAULT NULL,
  `PENDAPATAN_BARANG` varchar(20) DEFAULT NULL,
  `PENDAPATAN_LAIN_LAIN` varchar(20) DEFAULT NULL,
  `BEBAN_HONOR_KARYAWAN` varchar(20) DEFAULT NULL,
  `BEBAN_ADMINISTRASI_UMUM` varchar(20) DEFAULT NULL,
  `BEBAN_KOPERASI` varchar(20) DEFAULT NULL,
  `BEBAN_PENYUSUTAN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan`
--

CREATE TABLE IF NOT EXISTS `simpanan` (
  `ID_SIMPANAN` varchar(10) NOT NULL,
  `ID_ANGGOTA` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_KATEGORI` varchar(10) DEFAULT NULL,
  `TANGGAL_SIMPANAN` datetime DEFAULT NULL,
  `JUMLAH_SIMPANAN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `strategi_bersaing_koperasi`
--

CREATE TABLE IF NOT EXISTS `strategi_bersaing_koperasi` (
  `ID_STRATEGI_BERSAING_KOPERASI` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `PRODUK_KOPERASI` tinyint(1) DEFAULT NULL,
  `HARGA_PRODUK_KOPERASI` tinyint(1) DEFAULT NULL,
  `KESESUAIAN_PRODUK_KOPERASI` tinyint(1) DEFAULT NULL,
  `FOKUS_PRODUK_KOPERASI` tinyint(1) DEFAULT NULL,
  `KEBUTUHAN_PRODUK_KOPERASI` tinyint(1) DEFAULT NULL,
  `KERJA_SAMA_KOPERASI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_permodalan`
--

CREATE TABLE IF NOT EXISTS `struktur_permodalan` (
  `ID_STRUKTUR_PERMODALAN` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `JUMLAH_MODAL_PINJAMAN` varchar(15) DEFAULT NULL,
  `JUMLAH_MODAL_SENDIRI` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey_kepuasan_anggota`
--

CREATE TABLE IF NOT EXISTS `survey_kepuasan_anggota` (
  `ID_SURVEY_KEPUASAN_ANGGOTA` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `JUMLAH_NILAI_SURVEY_KEPUASAN_ANGGOTA` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tertib_administrasi`
--

CREATE TABLE IF NOT EXISTS `tertib_administrasi` (
  `ID_TERTIB_ADMINISTRASI` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `BUKU_DAFTAR_ANGGOTA` tinyint(1) DEFAULT NULL,
  `BUKU_DAFTAR_SIMPANAN_ANGGOTA` tinyint(1) DEFAULT NULL,
  `BUKU_DAFTAR_PENGURUS` tinyint(1) DEFAULT NULL,
  `BUKU_DAFTAR_PENGAWAS` tinyint(1) DEFAULT NULL,
  `BUKU_NOTULEN_RAPAT_ANGGOTA` tinyint(1) DEFAULT NULL,
  `BUKU_NOTULEN_RAPAT_PENGURUS` tinyint(1) DEFAULT NULL,
  `BUKU_NOTULEN_RAPAT_PENGAWAS` tinyint(1) DEFAULT NULL,
  `BUKU_DAFTAR_INVENTARIS_KOPERASI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_independent`
--

CREATE TABLE IF NOT EXISTS `tim_independent` (
  `ID_TIM_INDEPENDENT` varchar(10) NOT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `NAMA_TIM_INDEPENDENT` varchar(35) DEFAULT NULL,
  `ALAMAT_TIM_INDEPENDENT` varchar(10) DEFAULT NULL,
  `JK_TIM_INDEPENDENT` varchar(10) DEFAULT NULL,
  `JABATAN_TIM_INDEPENDENT` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat_kesehatan_kondisi_keuangan`
--

CREATE TABLE IF NOT EXISTS `tingkat_kesehatan_kondisi_keuangan` (
  `ID_TINGKAT_KESEHATAN_KONDISI_KEUANGAN` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `TOTAL_AKTIVA_LANCAR` varchar(15) DEFAULT NULL,
  `TOTAL_KEWAJIBAN_LANCAR` varchar(15) DEFAULT NULL,
  `TOTAL_AKTIVA` varchar(15) DEFAULT NULL,
  `TOTAL_KEWAJIBAN` varchar(15) DEFAULT NULL,
  `SHU` varchar(15) DEFAULT NULL,
  `PENDAPATAN_TOTAL` varchar(15) DEFAULT NULL,
  `PIUTANG_RATA_RATA` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat_pemanfaatan_layanan_koperasi_oleh_anggota`
--

CREATE TABLE IF NOT EXISTS `tingkat_pemanfaatan_layanan_koperasi_oleh_anggota` (
  `ID_TINGKAT_PEMANFAATAN_LAYANAN_KOPERASI_OLEH_ANGGOTA` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `JUMLAH_ANGGOTA_YANG_DILAYANI_PERHARI` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat_upah_karyawan`
--

CREATE TABLE IF NOT EXISTS `tingkat_upah_karyawan` (
  `ID_TINGKAT_UPAH_KARYAWAN` varchar(10) NOT NULL,
  `ID_PERIODE` varchar(10) DEFAULT NULL,
  `ID_KOPERASI` varchar(10) DEFAULT NULL,
  `JUMLAH_UMR` varchar(5) DEFAULT NULL,
  `JUMLAH_UPAH_KARYAWAN_RATA_RATA` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USERNAME` varchar(10) NOT NULL,
  `PASSWORD` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`ID_ANGGOTA`), ADD KEY `FK_RELATIONSHIP_16` (`ID_PERIODE`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
 ADD PRIMARY KEY (`ID_ANGSURAN`), ADD KEY `FK_RELATIONSHIP_24` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_4` (`ID_ANGGOTA`);

--
-- Indexes for table `inovasi_koperasi`
--
ALTER TABLE `inovasi_koperasi`
 ADD PRIMARY KEY (`ID_INOVASI_KOPERASI`), ADD KEY `FK_RELATIONSHIP_43` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_81` (`ID_PERIODE`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
 ADD PRIMARY KEY (`ID_JASA`), ADD KEY `FK_RELATIONSHIP_5` (`ID_ANGSURAN`);

--
-- Indexes for table `kategori_pinjaman`
--
ALTER TABLE `kategori_pinjaman`
 ADD PRIMARY KEY (`ID_KAT_PIN`);

--
-- Indexes for table `kategori_simpanan`
--
ALTER TABLE `kategori_simpanan`
 ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `keberadaan_rk_dan_rapbn`
--
ALTER TABLE `keberadaan_rk_dan_rapbn`
 ADD PRIMARY KEY (`ID_KEBERADAAN_RK_DAN_RAPBN`), ADD KEY `FK_RELATIONSHIP_25` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_67` (`ID_PERIODE`);

--
-- Indexes for table `keberadaan_sistem_informasi`
--
ALTER TABLE `keberadaan_sistem_informasi`
 ADD PRIMARY KEY (`ID_KEBERADAAN_SISTEM_INFORMASI`), ADD KEY `FK_RELATIONSHIP_29` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_87` (`ID_PERIODE`);

--
-- Indexes for table `kemampuan_bersaing_koperasi`
--
ALTER TABLE `kemampuan_bersaing_koperasi`
 ADD PRIMARY KEY (`ID_KEMAMPUAN_BERSAING_KOPERASI`), ADD KEY `FK_RELATIONSHIP_33` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_90` (`ID_PERIODE`);

--
-- Indexes for table `kemudahan_akses_informasi`
--
ALTER TABLE `kemudahan_akses_informasi`
 ADD PRIMARY KEY (`ID_KEMUDAHAN_AKSES_INFORMASI`), ADD KEY `FK_RELATIONSHIP_30` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_96` (`ID_PERIODE`);

--
-- Indexes for table `kepengawasan_periode`
--
ALTER TABLE `kepengawasan_periode`
 ADD PRIMARY KEY (`ID_KEPENGAWASAN_PERIODE`), ADD KEY `FK_RELATIONSHIP_58` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_59` (`ID_PENGAWAS`), ADD KEY `FK_RELATIONSHIP_61` (`ID_PERIODE`);

--
-- Indexes for table `kepengurusan_periode`
--
ALTER TABLE `kepengurusan_periode`
 ADD PRIMARY KEY (`ID_KEPENGURUSAN_PERIODE`), ADD KEY `FK_RELATIONSHIP_56` (`ID_PENGURUS`), ADD KEY `FK_RELATIONSHIP_57` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_60` (`ID_PERIODE`);

--
-- Indexes for table `ketaatan_membayar_pajak`
--
ALTER TABLE `ketaatan_membayar_pajak`
 ADD PRIMARY KEY (`ID_KETAATAN_MEMBAYAR_PAJAK`), ADD KEY `FK_RELATIONSHIP_40` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_78` (`ID_PERIODE`);

--
-- Indexes for table `keterkaitan_usaha_koperasi_dengan_anggota`
--
ALTER TABLE `keterkaitan_usaha_koperasi_dengan_anggota`
 ADD PRIMARY KEY (`ID_KETERKAITAN_USAHA_KOPERASI_DENGAN_ANGGOTA`), ADD KEY `FK_RELATIONSHIP_35` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_92` (`ID_PERIODE`);

--
-- Indexes for table `kinerja_kepengurusan`
--
ALTER TABLE `kinerja_kepengurusan`
 ADD PRIMARY KEY (`ID_KINERJA_KEPENGURUSAN`), ADD KEY `FK_RELATIONSHIP_15` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_69` (`ID_PERIODE`);

--
-- Indexes for table `komunikasi_bisnis_ke_masyarakat`
--
ALTER TABLE `komunikasi_bisnis_ke_masyarakat`
 ADD PRIMARY KEY (`ID_KOMUNIKASI_BISNIS_KE_MASYARAKAT`), ADD KEY `FK_RELATIONSHIP_39` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_77` (`ID_PERIODE`);

--
-- Indexes for table `koperasi`
--
ALTER TABLE `koperasi`
 ADD PRIMARY KEY (`ID_KOPERASI`);

--
-- Indexes for table `layanan_usaha_koperasi`
--
ALTER TABLE `layanan_usaha_koperasi`
 ADD PRIMARY KEY (`ID_LAYANAN_USAHA_KOPERASI`), ADD KEY `FK_RELATIONSHIP_37` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_75` (`ID_PERIODE`);

--
-- Indexes for table `manajemen_pengawasan`
--
ALTER TABLE `manajemen_pengawasan`
 ADD PRIMARY KEY (`ID_MANAJEMEN_PENGAWASAN`), ADD KEY `FK_RELATIONSHIP_12` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_66` (`ID_PERIODE`);

--
-- Indexes for table `model_pendidikan_dan_pelatihan_pengurus`
--
ALTER TABLE `model_pendidikan_dan_pelatihan_pengurus`
 ADD PRIMARY KEY (`ID_MODEL_PENDIDIKAN_DAN_PELATIHAN_PENGURUS`), ADD KEY `FK_RELATIONSHIP_47` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_85` (`ID_PERIODE`);

--
-- Indexes for table `pelayanan_sosial`
--
ALTER TABLE `pelayanan_sosial`
 ADD PRIMARY KEY (`ID_PELAYANAN_SOSIAL`), ADD KEY `FK_RELATIONSHIP_52` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_76` (`ID_PERIODE`);

--
-- Indexes for table `pengawas`
--
ALTER TABLE `pengawas`
 ADD PRIMARY KEY (`ID_PENGAWAS`), ADD KEY `ID_KOPERASI` (`ID_KOPERASI`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
 ADD PRIMARY KEY (`ID_PENGURUS`), ADD KEY `ID_KOPERASI` (`ID_KOPERASI`);

--
-- Indexes for table `penilaian_periode`
--
ALTER TABLE `penilaian_periode`
 ADD PRIMARY KEY (`ID_PENILAIAN_PERIODE`), ADD KEY `FK_RELATIONSHIP_62` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_63` (`ID_TIM_INDEPENDENT`), ADD KEY `FK_RELATIONSHIP_64` (`ID_PERIODE`);

--
-- Indexes for table `peningkatan_penyertaan_modal_koperasi`
--
ALTER TABLE `peningkatan_penyertaan_modal_koperasi`
 ADD PRIMARY KEY (`ID_PENINGKATAN_PENYERTAAN_MODAL_KOPERASI`), ADD KEY `FK_RELATIONSHIP_50` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_72` (`ID_PERIODE`);

--
-- Indexes for table `penyerapan_tenaga_kerja`
--
ALTER TABLE `penyerapan_tenaga_kerja`
 ADD PRIMARY KEY (`ID_PENYERAPAN_TENAGA_KERJA`), ADD KEY `FK_RELATIONSHIP_41` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_79` (`ID_PERIODE`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
 ADD PRIMARY KEY (`ID_PERIODE`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
 ADD PRIMARY KEY (`ID_PINJAMAN`), ADD KEY `FK_RELATIONSHIP_23` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_27` (`ID_KAT_PIN`), ADD KEY `FK_RELATIONSHIP_3` (`ID_ANGGOTA`);

--
-- Indexes for table `pola_pengkaderan`
--
ALTER TABLE `pola_pengkaderan`
 ADD PRIMARY KEY (`ID_POLA_PENGKADERAN`), ADD KEY `FK_RELATIONSHIP_46` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_84` (`ID_PERIODE`);

--
-- Indexes for table `prosentase_besaran_simpanan_sukarela`
--
ALTER TABLE `prosentase_besaran_simpanan_sukarela`
 ADD PRIMARY KEY (`ID_PROSENTASE_BESARAN_SIMPANAN_SUKARELA`), ADD KEY `FK_RELATIONSHIP_49` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_71` (`ID_PERIODE`);

--
-- Indexes for table `prosentase_pelunasan_simpanan_wajib`
--
ALTER TABLE `prosentase_pelunasan_simpanan_wajib`
 ADD PRIMARY KEY (`ID_PROSENTASE_PELUNASAN_SIMPANAN_WAJIB`), ADD KEY `FK_RELATIONSHIP_48` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_70` (`ID_PERIODE`);

--
-- Indexes for table `rapat_koperasi`
--
ALTER TABLE `rapat_koperasi`
 ADD PRIMARY KEY (`ID_RAPAT_KOPERASI`), ADD KEY `FK_RELATIONSHIP_11` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_65` (`ID_PERIODE`);

--
-- Indexes for table `rasio_kondisi_operasional_usaha`
--
ALTER TABLE `rasio_kondisi_operasional_usaha`
 ADD PRIMARY KEY (`ID_MANFAAT_`), ADD KEY `FK_RELATIONSHIP_14` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_68` (`ID_PERIODE`);

--
-- Indexes for table `rasio_peningkatan_jumlah_anggota`
--
ALTER TABLE `rasio_peningkatan_jumlah_anggota`
 ADD PRIMARY KEY (`ID_RASIO_PENINGKATAN_JUMLAH_ANGGOTA`), ADD KEY `FK_RELATIONSHIP_45` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_83` (`ID_PERIODE`);

--
-- Indexes for table `rasio_transaksi_anggota`
--
ALTER TABLE `rasio_transaksi_anggota`
 ADD PRIMARY KEY (`ID_RASIO_TRANSAKSI_ANGGOTA`), ADD KEY `FK_RELATIONSHIP_44` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_82` (`ID_PERIODE`);

--
-- Indexes for table `shu`
--
ALTER TABLE `shu`
 ADD PRIMARY KEY (`ID_SHU`), ADD KEY `FK_RELATIONSHIP_20` (`ID_PERIODE`), ADD KEY `FK_RELATIONSHIP_6` (`ID_KOPERASI`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
 ADD PRIMARY KEY (`ID_SIMPANAN`), ADD KEY `FK_RELATIONSHIP_21` (`ID_KATEGORI`), ADD KEY `FK_RELATIONSHIP_22` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_26` (`ID_ANGGOTA`);

--
-- Indexes for table `strategi_bersaing_koperasi`
--
ALTER TABLE `strategi_bersaing_koperasi`
 ADD PRIMARY KEY (`ID_STRATEGI_BERSAING_KOPERASI`), ADD KEY `FK_RELATIONSHIP_34` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_91` (`ID_PERIODE`);

--
-- Indexes for table `struktur_permodalan`
--
ALTER TABLE `struktur_permodalan`
 ADD PRIMARY KEY (`ID_STRUKTUR_PERMODALAN`), ADD KEY `FK_RELATIONSHIP_31` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_94` (`ID_PERIODE`);

--
-- Indexes for table `survey_kepuasan_anggota`
--
ALTER TABLE `survey_kepuasan_anggota`
 ADD PRIMARY KEY (`ID_SURVEY_KEPUASAN_ANGGOTA`), ADD KEY `FK_RELATIONSHIP_36` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_74` (`ID_PERIODE`);

--
-- Indexes for table `tertib_administrasi`
--
ALTER TABLE `tertib_administrasi`
 ADD PRIMARY KEY (`ID_TERTIB_ADMINISTRASI`), ADD KEY `FK_RELATIONSHIP_28` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_86` (`ID_PERIODE`);

--
-- Indexes for table `tim_independent`
--
ALTER TABLE `tim_independent`
 ADD PRIMARY KEY (`ID_TIM_INDEPENDENT`), ADD KEY `FK_RELATIONSHIP_55` (`ID_KOPERASI`);

--
-- Indexes for table `tingkat_kesehatan_kondisi_keuangan`
--
ALTER TABLE `tingkat_kesehatan_kondisi_keuangan`
 ADD PRIMARY KEY (`ID_TINGKAT_KESEHATAN_KONDISI_KEUANGAN`), ADD KEY `FK_RELATIONSHIP_32` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_89` (`ID_PERIODE`);

--
-- Indexes for table `tingkat_pemanfaatan_layanan_koperasi_oleh_anggota`
--
ALTER TABLE `tingkat_pemanfaatan_layanan_koperasi_oleh_anggota`
 ADD PRIMARY KEY (`ID_TINGKAT_PEMANFAATAN_LAYANAN_KOPERASI_OLEH_ANGGOTA`), ADD KEY `FK_RELATIONSHIP_51` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_73` (`ID_PERIODE`);

--
-- Indexes for table `tingkat_upah_karyawan`
--
ALTER TABLE `tingkat_upah_karyawan`
 ADD PRIMARY KEY (`ID_TINGKAT_UPAH_KARYAWAN`), ADD KEY `FK_RELATIONSHIP_42` (`ID_KOPERASI`), ADD KEY `FK_RELATIONSHIP_80` (`ID_PERIODE`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`USERNAME`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
ADD CONSTRAINT `FK_RELATIONSHIP_24` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_ANGGOTA`) REFERENCES `anggota` (`ID_ANGGOTA`);

--
-- Ketidakleluasaan untuk tabel `inovasi_koperasi`
--
ALTER TABLE `inovasi_koperasi`
ADD CONSTRAINT `FK_RELATIONSHIP_43` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_81` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `jasa`
--
ALTER TABLE `jasa`
ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_ANGSURAN`) REFERENCES `angsuran` (`ID_ANGSURAN`);

--
-- Ketidakleluasaan untuk tabel `keberadaan_rk_dan_rapbn`
--
ALTER TABLE `keberadaan_rk_dan_rapbn`
ADD CONSTRAINT `FK_RELATIONSHIP_25` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_67` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `keberadaan_sistem_informasi`
--
ALTER TABLE `keberadaan_sistem_informasi`
ADD CONSTRAINT `FK_RELATIONSHIP_29` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_87` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `kemampuan_bersaing_koperasi`
--
ALTER TABLE `kemampuan_bersaing_koperasi`
ADD CONSTRAINT `FK_RELATIONSHIP_33` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_90` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `kemudahan_akses_informasi`
--
ALTER TABLE `kemudahan_akses_informasi`
ADD CONSTRAINT `FK_RELATIONSHIP_30` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_96` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `kepengawasan_periode`
--
ALTER TABLE `kepengawasan_periode`
ADD CONSTRAINT `FK_RELATIONSHIP_58` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_59` FOREIGN KEY (`ID_PENGAWAS`) REFERENCES `pengawas` (`ID_PENGAWAS`),
ADD CONSTRAINT `FK_RELATIONSHIP_61` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `kepengurusan_periode`
--
ALTER TABLE `kepengurusan_periode`
ADD CONSTRAINT `FK_RELATIONSHIP_56` FOREIGN KEY (`ID_PENGURUS`) REFERENCES `pengurus` (`ID_PENGURUS`),
ADD CONSTRAINT `FK_RELATIONSHIP_57` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_60` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `ketaatan_membayar_pajak`
--
ALTER TABLE `ketaatan_membayar_pajak`
ADD CONSTRAINT `FK_RELATIONSHIP_40` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_78` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `keterkaitan_usaha_koperasi_dengan_anggota`
--
ALTER TABLE `keterkaitan_usaha_koperasi_dengan_anggota`
ADD CONSTRAINT `FK_RELATIONSHIP_35` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_92` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `kinerja_kepengurusan`
--
ALTER TABLE `kinerja_kepengurusan`
ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_69` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `komunikasi_bisnis_ke_masyarakat`
--
ALTER TABLE `komunikasi_bisnis_ke_masyarakat`
ADD CONSTRAINT `FK_RELATIONSHIP_39` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_77` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `layanan_usaha_koperasi`
--
ALTER TABLE `layanan_usaha_koperasi`
ADD CONSTRAINT `FK_RELATIONSHIP_37` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_75` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `manajemen_pengawasan`
--
ALTER TABLE `manajemen_pengawasan`
ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_66` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `model_pendidikan_dan_pelatihan_pengurus`
--
ALTER TABLE `model_pendidikan_dan_pelatihan_pengurus`
ADD CONSTRAINT `FK_RELATIONSHIP_47` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_85` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `pelayanan_sosial`
--
ALTER TABLE `pelayanan_sosial`
ADD CONSTRAINT `FK_RELATIONSHIP_52` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_76` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `pengawas`
--
ALTER TABLE `pengawas`
ADD CONSTRAINT `pengawas_ibfk_1` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian_periode`
--
ALTER TABLE `penilaian_periode`
ADD CONSTRAINT `FK_RELATIONSHIP_62` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_63` FOREIGN KEY (`ID_TIM_INDEPENDENT`) REFERENCES `tim_independent` (`ID_TIM_INDEPENDENT`),
ADD CONSTRAINT `FK_RELATIONSHIP_64` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `peningkatan_penyertaan_modal_koperasi`
--
ALTER TABLE `peningkatan_penyertaan_modal_koperasi`
ADD CONSTRAINT `FK_RELATIONSHIP_50` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_72` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `penyerapan_tenaga_kerja`
--
ALTER TABLE `penyerapan_tenaga_kerja`
ADD CONSTRAINT `FK_RELATIONSHIP_41` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_79` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
ADD CONSTRAINT `FK_RELATIONSHIP_23` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_27` FOREIGN KEY (`ID_KAT_PIN`) REFERENCES `kategori_pinjaman` (`ID_KAT_PIN`),
ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_ANGGOTA`) REFERENCES `anggota` (`ID_ANGGOTA`);

--
-- Ketidakleluasaan untuk tabel `pola_pengkaderan`
--
ALTER TABLE `pola_pengkaderan`
ADD CONSTRAINT `FK_RELATIONSHIP_46` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_84` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `prosentase_besaran_simpanan_sukarela`
--
ALTER TABLE `prosentase_besaran_simpanan_sukarela`
ADD CONSTRAINT `FK_RELATIONSHIP_49` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_71` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `prosentase_pelunasan_simpanan_wajib`
--
ALTER TABLE `prosentase_pelunasan_simpanan_wajib`
ADD CONSTRAINT `FK_RELATIONSHIP_48` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_70` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `rapat_koperasi`
--
ALTER TABLE `rapat_koperasi`
ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_65` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `rasio_kondisi_operasional_usaha`
--
ALTER TABLE `rasio_kondisi_operasional_usaha`
ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_68` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `rasio_peningkatan_jumlah_anggota`
--
ALTER TABLE `rasio_peningkatan_jumlah_anggota`
ADD CONSTRAINT `FK_RELATIONSHIP_45` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_83` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `rasio_transaksi_anggota`
--
ALTER TABLE `rasio_transaksi_anggota`
ADD CONSTRAINT `FK_RELATIONSHIP_44` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_82` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `shu`
--
ALTER TABLE `shu`
ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`),
ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`);

--
-- Ketidakleluasaan untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori_simpanan` (`ID_KATEGORI`),
ADD CONSTRAINT `FK_RELATIONSHIP_22` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_26` FOREIGN KEY (`ID_ANGGOTA`) REFERENCES `anggota` (`ID_ANGGOTA`);

--
-- Ketidakleluasaan untuk tabel `strategi_bersaing_koperasi`
--
ALTER TABLE `strategi_bersaing_koperasi`
ADD CONSTRAINT `FK_RELATIONSHIP_34` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_91` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `struktur_permodalan`
--
ALTER TABLE `struktur_permodalan`
ADD CONSTRAINT `FK_RELATIONSHIP_31` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_94` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `survey_kepuasan_anggota`
--
ALTER TABLE `survey_kepuasan_anggota`
ADD CONSTRAINT `FK_RELATIONSHIP_36` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_74` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `tertib_administrasi`
--
ALTER TABLE `tertib_administrasi`
ADD CONSTRAINT `FK_RELATIONSHIP_28` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_86` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `tim_independent`
--
ALTER TABLE `tim_independent`
ADD CONSTRAINT `FK_RELATIONSHIP_55` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`);

--
-- Ketidakleluasaan untuk tabel `tingkat_kesehatan_kondisi_keuangan`
--
ALTER TABLE `tingkat_kesehatan_kondisi_keuangan`
ADD CONSTRAINT `FK_RELATIONSHIP_32` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_89` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `tingkat_pemanfaatan_layanan_koperasi_oleh_anggota`
--
ALTER TABLE `tingkat_pemanfaatan_layanan_koperasi_oleh_anggota`
ADD CONSTRAINT `FK_RELATIONSHIP_51` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_73` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

--
-- Ketidakleluasaan untuk tabel `tingkat_upah_karyawan`
--
ALTER TABLE `tingkat_upah_karyawan`
ADD CONSTRAINT `FK_RELATIONSHIP_42` FOREIGN KEY (`ID_KOPERASI`) REFERENCES `koperasi` (`ID_KOPERASI`),
ADD CONSTRAINT `FK_RELATIONSHIP_80` FOREIGN KEY (`ID_PERIODE`) REFERENCES `periode` (`ID_PERIODE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
