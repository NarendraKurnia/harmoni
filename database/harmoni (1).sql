-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Apr 2025 pada 07.38
-- Versi server: 5.7.24
-- Versi PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harmoni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `link_reset` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id_banner`, `gambar`, `judul`, `link_reset`, `tanggal_update`) VALUES
(2, 'banner-4-1745569504.jpg', 'Penambahan Arus Listrik1', NULL, '2025-04-25 07:51:52'),
(3, 'banner-2-1745987800.jpg', 'Banner 2', NULL, '2025-04-30 04:36:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `unit_id` varchar(255) NOT NULL,
  `isi` mediumtext NOT NULL,
  `link_reset` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `gambar`, `judul`, `unit_id`, `isi`, `link_reset`, `tanggal_update`, `views`) VALUES
(1, 'beritasbb4-1744689803.jpg', 'Bulan K3 Nasional, PLN Wujudkan Zero Accident dengan Meningkatkan Budaya Keselamatan Kerja', '1', '<p>Peringati Bulan Kesehatan dan Keselamatan Kerja (K3) Nasional 2024, PT PLN (Persero) Unit Induk Distribusi (UID) Jawa Timur berkomitmen untuk meningkatkan budaya keselamatan kerja. Hal ini guna mewujudkan nihil <strong>kecelakaan kerja</strong>...</p>', '', '2025-04-29 04:35:55', 2),
(2, 'beritasbb5-1744689790.jpg', 'PIKK PLN Surabaya Barat Tingkatkan Ketrampilan Desain Dalam Berdayakan Perempuan', '1', '<p>Dalam rangka memperingati Hari Ulang Tahun (HUT) ke-25 Persatuan Istri Karyawan dan Karyawati (PIKK) PLN serta Hari Ibu, PIKK PLN Surabaya Barat menggelar pelatihan desain grafis menggunakan Canva. Acara ini dihadiri oleh anggota PIKK dari Seluruh Unit Pelaksana di Unit Induk Distribusi (UID) Jawa Timur melalui zoom di kantor UP3 Surabaya Barat, pada Minggu (22/12)...</p>', NULL, '2025-04-29 04:02:26', 2),
(3, 'beritasbb6-1744689739.jpg', 'Sosialisasi dan edukasi pada pelajar dan masyarakat sebagai wujud komitmen korporasi dalam meningkatkan keselamatan ketenagalistrikan', '1', '<p>SURABAYA, beritalima.com | Bulan Kesehatan dan Keselamatan Kerja (K3) Nasional 2024 pada 12 Januari hingga 12 Februari diperingati PT PLN (Persero) Unit Induk Distribusi (UID) Jawa Timur dengan menggelar sosialisasi dan edukasi pada pelajar dan masyarakat sebagai wujud komitmen korporasi dalam meningkatkan keselamatan ketenagalistrikan.</p>\r\n<p>Sosialisasi ini digelar di beberapa sekolah, komunitas sosial, dan warga serta perangkat desa. Salah satunya melalui Program PLN Goes To School di Sekolah Dasar Islam Terpadu (SDIT) Nurul Fikri Sukodono Sidoarjo dan Sekolah Menengah Atas Negeri (SMAN) 1 Talun Kediri pada Selasa (23/1/2024).</p>\r\n<p>Selain di 2 sekolah tersebut, sebelumnya juga diselenggarakan di Sekolah Menengah Kejuruan Negeri (SMKN) 1 Sukorejo Pasuruan pada Senin (22/1/2024). Sedangkan pemberian sosialisasi pada masyarakat dilakukan kepada Komunitas Civic Auto Society (Civas) Jombang pada Sabtu (20/1/2024), dan pada warga serta Forum Koordinasi Pimpinan Kecamatan (Forkopimcam) Guluk-Guluk, Sumenep, Kamis (11/1/2024).</p>\r\n<p>Di SDIT Nurul Fikri Sukodono Sidoarjo, PLN memberikan sosialisasi pada 165 murid kelas 1 dan 2 serta guru dan staff pengajar tentang pengenalan apa itu listrik, sistem tenaga listrik hingga bahaya listrik dan potensi risiko yang mungkin timbul akibat penggunaan listrik yang tidak aman serta pengenalan fitur PLN Mobile.</p>\r\n<p>Melalui pemahaman yang mendalam, para siswa juga dibagikan tentang langkah-langkah keselamatan sederhana yang dapat mereka terapkan dalam kehidupan sehari-hari.</p>\r\n<p>Kepala Sekolah SMK Negeri 1 Sukorejo, Nisful Laily, mengapresiasi PLN yang telah mengadakan kegiatan yang sangat bermanfaat bagi siswa maupun dewan guru.</p>\r\n<p>&ldquo;Kami sangat berterimakasih pada PLN telah datang untuk mengedukasi siswa di sekolah kami. Sangat penting bagi pelajar untuk mendapatkan pengetahuan ketenagalistrikan ini di kehidupan sehari-hari, serta menyebarkan informasi tersebut pada orang tua maupun teman-teman di lingkungan sekitarnya,&rdquo; tambah Nisful.</p>\r\n<div class=\"code-block code-block-11\">&nbsp;</div>', NULL, '2025-04-29 00:50:37', 4),
(4, 'img-20241205-wa0004-1745824438.jpg', 'PLN Siap Pasok Listrik Andal Selama Natal dan Tahun Baru di Jawa Timur', '2', '<p><strong>Surabaya (beritajatim.com) &ndash;</strong> PT PLN (Persero) Unit Induk Distribusi Jawa Timur memastikan pasokan listrik tetap andal selama perayaan Natal 2024 dan Tahun Baru 2025. Targetnya mengamankan pasokan listrik di lokasi-lokasi vital seperti gereja, pusat perbelanjaan, rumah sakit, dan objek wisata.</p>\r\n<p>General Manager PLN UID Jawa Timur, Ahmad Mustaqir, mengaku akan menurunkan 5 ribu personel PLN untuk siaga memantau dan mengatasi potensi gangguan pada jaringan listrik, saat memimpin apel siaga kelistrikan di Surabaya, Rabu (4/12/2024).</p>\r\n<p>&ldquo;Kami telah melakukan berbagai persiapan untuk memastikan pasokan listrik tetap stabil selama Nataru. Tim kami dilengkapi dengan peralatan yang memadai dan siap siaga 24 jam,&rdquo; ujar Ahmad.</p>\r\n<p>Untuk memastikan kelancaran pasokan listrik selama Natal dan Tahun Baru, PLN telah melakukan sejumlah persiapan, antara lain:</p>\r\n<p>Peningkatan Kapasitas: PLN telah meningkatkan kapasitas pembangkit dan transmisi untuk memenuhi peningkatan permintaan listrik selama periode Nataru.<br>Pemeliharaan Jaringan: Tim teknisi PLN telah melakukan pemeliharaan rutin pada jaringan distribusi untuk mencegah terjadinya gangguan.<br>Penambahan Unit Gardu Induk: Beberapa gardu induk baru telah dibangun untuk meningkatkan keandalan pasokan listrik di wilayah-wilayah yang mengalami pertumbuhan beban.<br>Siaga 24 Jam: Seluruh petugas PLN baik di lapangan maupun di pusat kendali disiagakan selama 24 jam untuk memantau kondisi jaringan dan siap merespon setiap gangguan yang terjadi.&nbsp;</p>\r\n<p>Selain melakukan berbagai upaya teknis, PLN juga mengimbau masyarakat untuk ikut berperan aktif dalam menjaga keandalan pasokan listrik dengan cara: mematikan peralatan listrik yang tidak digunakan. Menggunakan peralatan listrik yang hemat energi. Serta memanfaatkan cahaya matahari secara maksimal.&nbsp;</p>\r\n<p>Dengan berbagai persiapan yang telah dilakukan, PLN optimistis dapat memberikan pelayanan terbaik kepada masyarakat selama perayaan Natal dan Tahun Baru.[<strong>rea</strong>]</p>', NULL, '2025-04-28 00:15:43', NULL),
(5, 'img-20241204-wa0018-1745824714.jpg', 'Ahmad Mustaqir GM PLN UID Jatim, Tinjau Kesiapan Alat K3 Sambut Natal 2024 & Tahun Baru 2025', '11', '<p><strong>Surabaya, IPers</strong>&nbsp;- 4 Desember 2024 &ndash; Menyambut perayaan Natal 2024 dan Tahun Baru 2025, PT PLN (Persero) Unit Induk Distribusi (UID) Jawa Timur memastikan kesiapan alat keselamatan kerja (K3) untuk menjaga kelancaran operasional serta keselamatan petugas di lapangan.</p>\r\n<p>Ahmad Mustaqir, General Manager PLN UID Jawa Timur, memimpin langsung pengecekan peralatan keselamatan kerja di PLN Unit Layanan Pelanggan (ULP) Krian pada Rabu (4/12). Kegiatan ini bertujuan memastikan peralatan dalam kondisi optimal guna menghadapi peningkatan beban kerja selama periode liburan.</p>\r\n<p>&ldquo;Kami ingin memastikan seluruh alat keselamatan kerja berada dalam kondisi prima dan siap digunakan kapan saja. Keselamatan petugas adalah prioritas utama kami,&rdquo; ujar Ahmad dalam kesempatan tersebut.</p>\r\n<p>Pengecekan ini melibatkan tim teknis PLN ULP Krian yang mempresentasikan berbagai peralatan keselamatan, seperti helm, sarung tangan, sepatu safety, hingga perangkat pendukung lainnya. Ahmad juga memberikan arahan terkait pentingnya penerapan standar operasional prosedur (SOP) K3 untuk meminimalkan risiko kerja di lapangan.</p>\r\n<p>&ldquo;Perayaan Natal dan Tahun Baru adalah momen penting. Kami tidak hanya memastikan suplai listrik tetap aman dan stabil, tetapi juga menjaga keselamatan petugas kami yang bekerja di lapangan,&rdquo; tambahnya.</p>\r\n<p>Selain memastikan kesiapan alat K3, Ahmad menekankan komitmen PLN UID Jatim dalam menjaga kualitas pelayanan kepada masyarakat selama libur akhir tahun. Ia mengimbau masyarakat untuk melaporkan potensi gangguan listrik melalui layanan resmi PLN agar permasalahan dapat segera ditangani.</p>\r\n<p>\"Kami berkomitmen menjaga keselamatan kerja petugas serta memastikan masyarakat menikmati suplai listrik tanpa gangguan selama Natal dan Tahun Baru,\" pungkas Ahmad.</p>\r\n<p>Kegiatan ini merupakan bagian dari program rutin PLN untuk meningkatkan layanan kepada masyarakat sekaligus menjaga keamanan dan kenyamanan seluruh pihak selama periode liburan. Dengan langkah ini, PLN UID Jatim menunjukkan komitmennya dalam memberikan pelayanan terbaik dan memastikan operasional berjalan lancar di momen-momen krusial. (Dex)&nbsp;&nbsp;</p>', NULL, '2025-04-28 00:18:47', NULL),
(6, '1900-img-20241128-185912-1745825029.jpg', 'PLN Sukses Kawal Pasokan Listrik Pilkada Jatim', '11', '<p>SURABAYA, kabarbisnis.com: PT PLN (Persero) Unit Induk Distribusi (UID) Jawa Timur sukses kawal pasokan listrik di Pemilihan Umum Kepala Daerah (Pilkada) Jawa Timur.</p>\r\n<p>General Manager PLN UID Jawa Timur, Ahmad Mustaqir mengatakan ribuan personel PLN berhasil mengamankan listrik di lokasi siaga Pilkada yakni KPUD Tingkat Provinsi, Bawaslu Provinsi, 39 KPUD Tingkat Kabupaten/Kota, 666 Panitia Pemilihan Kecamatan dan 44 Gudang Logistik KPU.</p>\r\n<p>\"Kami terus mengupayakan pasokan listrik andal mulai dari masa kampanye pada 25 September - 23 November 2024, masa pemungutan suara pada 27 November 2024 dan masa rekapitulasi hasil perhitungan suara pada 27 November - 16 Desember 2024. Kami terus melakukan pengecekan berkala untuk memitigasi risiko yang mungkin terjadi,\" kata Ahmad.</p>\r\n<p>Dalam kesempatan peninjauan lapangan pada Rabu (27/11/2024), Ahmad memastikan selama agenda Pilkada 2024 sampai dengan proses penghitungan suara pasokan listrik aman dan handal. Pengamanan pasokan listrik dengan sistem 3 lapis yang bersumber dari listrik PLN, UPS PLN, dan genset serta daya mampu yang cukup menjadi wujud tanggung jawab PLN dalam mendukung agenda Nasional Pilkada 2024.</p>\r\n<p>\"Personel dilengkapi dengan peralatan pendukung siaga diantaranya 207 Unit Gardu Bergerak (UGB), 355 Motor Unit Layanan Cepat, 23 Uninterruptible Power Supply (UPS), 67 Unit Genset Mobile, 14 Unit UKB, 15 Unit Crane dan 16 Unit Skylift,\" imbuh Ahmad.</p>\r\n<p>PLN dan KPU juga terus berkoordinasi untuk memantau dan memastikan keandalan pasokan listrik hingga tahap perhitungan suara selesai.</p>\r\n<p>Apresiasi atas kesigapan personel PLN disampaikan oleh Bawaslu Kota Malang. Kedepannya ia berharap hingga masa perhitungan pasokan listrik tetap andal.</p>\r\n<p>\"Terimakasih kepada PLN yang selama ini telah mendukung proses demokrasi dan dan pengawasan pemilihan serentak yang ada di Kota Malang, kami mengucapkan terimakasih banyak, matursuwun,\" ungkap Perwakilan Bawaslu Kota Malang, Ika.<strong class=\"c-blue\">kbc</strong><strong class=\"c-green\">6</strong></p>', NULL, '2025-04-28 07:23:49', NULL),
(7, 'img20241119wa0011-1745825249.jpg', 'Peringati Hari Pahlawan, PLN Gelar Pemerikasaan Kesehatan Gratis Kepada Veteran', '4', '<p>SurabayaPagi, Surabaya - Peringati Hari Pahlawan 2024, PT PLN (Persero) Unit Induk Distribusi (UID) Jawa Timur menggelar kegiatan sosial berupa penyerahan bantuan sembako kepada para veteran di Surabaya dan Madiun.&nbsp;</p>\r\n<p>Di Surabaya, acara digelar di PLN Unit Pelaksana Pelayanan Pelanggan (UP3) Surabaya Selatan dan PLN UP3 Surabaya Utara dihadiri oleh veteran yang berasal dari Kecamatan Gubeng dan Kecamatan Krembangan Kota Surabaya.&nbsp;</p>\r\n<p>Sementara di PLN UP3 Surabaya Utara bersama YBM PLN menyelenggarakan kegiatan santunan kemanusiaan bagi para veteran dan dhuafa dengan tema \"Bersatu dalam Semangat Pahlawan, Membangun Kepedulian Sosial\".</p>\r\n<p>Acara yang berlangsung di PLN ULP Perak ini dihadiri oleh Manager UP3 Surabaya Utara, Zamzami, yang juga merupakan pembina YBM PLN UP3 Surabaya Utara; Manager ULP Perak, Andryani Kumalasari; Ketua YBM PLN UP3 Surabaya Utara, Moch. Yanu Umar Wahyudi; serta Danramil Krembangan, Mayor Infantri Slamet Priyadi.</p>\r\n<p>Pada kegiatan tersebut, bantuan yang diserahkan meliputi paket sembako kepada empat pejuang veteran, alat tulis sekolah untuk mendukung pendidikan, serta gerobak cahaya sebagai bantuan ekonomi bagi para dhuafa.&nbsp;</p>\r\n<p>Acara ini juga dimeriahkan dengan penampilan seni musik angklung dari seniman lokal, menambah suasana hangat dan kekeluargaan.</p>\r\n<p>Salah satu veteran, Subadijo, didampingi oleh rekan-rekannya mengungkapkan kebahagiaannya atas perhatian dan penghargaan dari PLN.&nbsp;</p>\r\n<p>\"Kami sangat berterima kasih atas undangan dan bantuan ini. Bentuk perhatian seperti ini memberikan semangat baru bagi kami para veteran,\" ungkap Subadijo.</p>\r\n<p>Di PLN UP3 Madiun, peringatan Hari Pahlawan berfokus pada bantuan kemanusiaan dan kesehatan. Kegiatan ini meliputi penyerahan bantuan sosial kepada keluarga pensiunan PLN yang membutuhkan di wilayah Madiun dan sekitarnya, serta penyelenggaraan medical check-up gratis bagi fakir miskin di wilayah Magetan, pada Selasa (12/11/2024).</p>\r\n<p>Penyerahan bantuan sosial diberikan kepada sejumlah keluarga pensiunan yang mengalami kesulitan ekonomi, termasuk beberapa di antaranya menderita penyakit stroke. Bantuan yang diberikan berupa kebutuhan pokok serta bantuan finansial untuk meringankan beban biaya pengobatan.&nbsp;&nbsp;</p>\r\n<p>Selain itu, YBM PLN UP3 Madiun juga mengadakan kegiatan pemeriksaan kesehatan gratis bagi masyarakat yang kurang mampu di wilayah Magetan.</p>\r\n<p>Menurut Manager PLN UP3 Madiun Suhandopo, kegiatan ini merupakan bentuk kepedulian dan rasa terima kasih kepada para pahlawan, baik yang telah berjasa kepada perusahaan maupun kepada masyarakat secara umum.&nbsp;</p>\r\n<p>&ldquo;Kami ingin menunjukkan bahwa semangat kepahlawanan tidak hanya berhenti pada peringatan, tetapi harus diwujudkan melalui aksi nyata. Melalui bantuan sosial ini, kami berharap bisa sedikit meringankan beban keluarga pensiunan yang membutuhkan. Sedangkan dengan medical check-up gratis, kami ingin membantu masyarakat untuk lebih peduli terhadap kesehatan mereka,&rdquo; ujar Suhandopo.</p>\r\n<p>Di PLN UP3 Surabaya Barat bersama Yayasan Baitul Maal (YBM) dan Persatuan Istri Karyawan dan Karyawati (PIKK) menggelar acara santunan yang ditujukan kepada para pengemudi Shejek, layanan ojek online khusus wanita. Kegiatan ini diadakan bersamaan dengan acara pengajian rutin, menciptakan suasana penuh kebersamaan dan apresiasi.</p>\r\n<p>Pengemudi Shejek dipilih sebagai penerima santunan karena dianggap sebagai \"pahlawan wanita dalam keluarga.\" Dalam keseharian, mereka berperan penting sebagai tulang punggung keluarga, mengorbankan waktu dan tenaga untuk memenuhi kebutuhan hidup.&nbsp;</p>\r\n<p>Melalui program ini, PLN bersama YBM dan PIKK ingin memberikan apresiasi kepada mereka yang menjadi contoh nyata semangat kepahlawanan dalam kehidupan modern.</p>\r\n<p>General Manager PLN UID Jawa Timur, Ahmad Mustaqir menyampaikan kegiatan ini merupakan wujud kepedulian sosial PLN terhadap masyarakat yang membutuhkan, khususnya para veteran yang telah berjasa bagi bangsa, masyarakat tidak mampu sekitar kantor maupun ojek wanita.</p>\r\n<p>Ia juga menegaskan bahwa PLN selalu terbuka untuk memberikan layanan dan informasi terkait ketenagalistrikan bagi masyarakat.&nbsp;</p>\r\n<p>\"Kami berharap, melalui kegiatan ini, semangat kepahlawanan dan kepedulian sosial dapat terus terjaga, serta mampu memberikan manfaat yang berkelanjutan bagi masyarakat,\" imbuhnya. Byb</p>', NULL, '2025-04-29 00:48:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buletins`
--

CREATE TABLE `buletins` (
  `id_buletin` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `unit_id` varchar(255) NOT NULL,
  `isi` mediumtext NOT NULL,
  `edisi` varchar(255) NOT NULL,
  `link_buletin` varchar(255) NOT NULL,
  `link_reset` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `buletins`
--

INSERT INTO `buletins` (`id_buletin`, `gambar`, `judul`, `unit_id`, `isi`, `edisi`, `link_buletin`, `link_reset`, `tanggal_update`, `views`) VALUES
(1, 'buletin3-1744687642.png', 'Tess', '7', '<p>aaaaaaaaaaaaaaaaaa</p>', 'Edisi I', 'http', NULL, '2025-04-29 00:50:45', 1),
(4, 'buletin1-1744687688.png', 'Buletin 1', '4', '<p><strong>oke</strong></p>', 'edisii', 'http://buletin.id', NULL, '2025-04-15 03:28:08', 0),
(5, 'buletin2-1744687702.png', 'Buletin 3', '18', '<p>buletin</p>', 'Edisi 3', 'http://buletin.id', NULL, '2025-04-15 03:28:22', 0),
(6, 'buletin1-1744687998.png', 'Buletin 4', '15', '<p>Buletin</p>', 'Edisi 4', 'http://buletin.id', NULL, '2025-04-15 03:33:18', 0),
(7, 'buletin2-1744688069.png', 'Buletin 5', '4', '<p>Buletin</p>', 'Edisi 5', 'http://buletin.id', NULL, '2025-04-28 19:20:58', 2),
(8, 'desain-tanpa-judul-18-1745471644.png', 'Peringatan Bulan K3 Nasional Tahun 2025', '4', '<p style=\"text-align: center;\"><strong>Semangat Pagi...</strong></p>\r\n<p style=\"text-align: justify;\">Keselamatan dan kesehatan kerja adalah aspek yang tidak pernah bisa diabaikan dalam setiap kegiatan operasional kita. Sebagai perusahaan yang bergerak di sektor energi, PLN memiliki tanggung jawab besar untuk memastikan setiap pegawai, mitra kerja dan masyarakat yang terlibat dalam aktivtas kita terlindungi dari potensi bahaya. Bulan K3 Nasional menjadi momentum yang tepat untuk mengingatkan kita semua akan pentingnya budaya keselamatan yang harus terus kita terapkan dalam setiap lini pekerjaan.</p>\r\n<p style=\"text-align: justify;\">Dalam rangkaian peringatan Bulan K3 Nasional yang diperingati 12 Januari hingga 12 Februari 2025, PLN UP3 Surabaya Barat masih mengusung sejumlah agenda kegiatan K3L untuk menjadi highlight di Fokus Utama Karib bulan Februari ini. Salah satu kegiatan yang patut mendapat perhatian adalah agenda donor darah serta medical check up yang dilaksanakan bagi pegawai dan tenaga alih daya di lingkungan PLN UP3 Surabaya Barat. Tidak hanya itu, dilaksanakan juga simulasi tanggap darurat yang sebagai sebuah langkah antisipatif kesiapsiagaan seluruh komponen perusahaan dalam menghadapi resiko kerja khususnya kondisi force majour.</p>\r\n<p style=\"text-align: justify;\">Dalam Karib bulan ini, rubrik Aksi SBB memuat cukup padat agenda PLN UP3 Surabaya Barat. Diawali dengan kunjungan manajemen PLN UP3 Surabaya Barat ke sejumlah pelanggan prioritas, pengoperasian pelanggan tegangan menengah, agenda seleksi karya inovasi serta diskusi perihal pemberian bantuan kelistrikan berupa pompanisasi bagi Kelompok Tani Makmur di Karang Pilang. Kunjungan stakeholder juga menjadi agenda rutin PLN, dalam rangka memperkuat sinergi antar instansi. Kali ini audiensi dilakukan kepada Kodim 0830 serta Polrestabes Surabaya.</p>\r\n<p style=\"text-align: justify;\">Bulan ini, PLN UP3 Surabaya Barat juga menggelar agenda internal yakni Rapat Kerja Triwulan I tahun 2025 yang ditujukan sebagai forum diskusi untuk merumuskan dan menetapkan strategi pencapaian kinerja sekaligus menjadi ajang evaluasi. Selain itu, agenda membangun kebersamaan dan kekompakan tim juga digelar melalui acara Employee Gathering yang dilaksanakan di Dusun Semilir, Semarang dengan mengusung tema \"Riding Together, Growing Stronger. Membangun budaya perusahaan yang positif menjadi langkah awal perusahaan dalam menciptakan kebahagiaan untuk meraih kinerja juara.</p>\r\n<p style=\"text-align: justify;\">Rubrik Sosok edisi kali ini akan mengulik sepak terjang salah seorang pegawai yang menjadi motor penggerak dan pengawal penerapan K3L dan keamanan di PLN UP3 Surabaya Barat. Tak lupa, beragam info lainnya juga akan tersaji apik dalam rubrik Pojok Unit, Kabar YBM, Info SDM, Birth Of The Month, Serba Serbi serta Bidikan Lensa.&nbsp;</p>', 'Edisi II - Februari 2025', 'https://online.fliphtml5.com/lbwzt/qmyx/', NULL, '2025-04-28 19:05:53', 3),
(9, 'screenshot-2025-04-29-094627-1745895765.png', 'SULTAN DESEMBER', '3', '<p>Hai, pembaca Sultan! Alhamdulillah puji syukur, Buletin Surabaya Selatan Stories atau SULTAN Stories edisi Desember 2024 sudah terbit! Dalam buletin ini, kami mencoba mengulas semua kegiatan dan perkembangan di PLN UP3 Surabaya Selatan, serta seputar informasi yang akan menambah wawasan.</p>\r\n<p>Terima kasih kepada seluruh pihak yang telah berkenan andil untuk mensukseskan pembuatan buletin sehingga buletin edisi Desember 2024 dapal terbit dan sampai ke PLN\'ers. Harapannya, Buletin SULTAN Stories dapat menjadi media komunikasi antar bidang dan pegawai.</p>\r\n<p>Kami juga berharap Buletin SULTAN Stories menjadi media informasi yang ditunggu-tunggu oleh PLN\'ers dimanapun kaliana berada. Mungkin masih ada kekurangan dan kesalahan dari penulisan buletin ini. Maka dari itu, kritik dan saran yang membangun sangat kami harapkan untuk membenahi kekurangan dan kesalahan sehingga menjadikannya lebih baik.</p>\r\n<p>Salam hangat, Editor\'s SULTAN Stories</p>', 'DESEMBER 2024', 'https://online.fliphtml5.com/naotl/sgpi/', NULL, '2025-04-29 21:28:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `id_unit` int(111) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`id_unit`, `nama`) VALUES
(1, 'UID Jatim'),
(2, 'UP3 Surabaya Utara'),
(3, 'UP3 Surabaya Selatan'),
(4, 'UP3 Surabaya Barat'),
(5, 'UP3 Mojokerto'),
(6, 'UP3 Gresik'),
(7, 'UP3 Madura'),
(8, 'UP3 Banyuwangi'),
(9, 'UP2D'),
(10, 'UP3 Malang'),
(11, 'UP3 Sidoarjo'),
(12, 'UP3 Madiun'),
(13, 'UP3 Pasuruan'),
(14, 'UP3 Bojonegoro'),
(15, 'UP3 Kediri'),
(16, 'UP3 Ponorogo'),
(17, 'UP3 Situbondo'),
(18, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `unit_id` varchar(255) NOT NULL,
  `link_reset` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `unit_id`, `link_reset`, `tanggal_update`) VALUES
(1, 'Narendra', 'narendrakurnia18@gmail.com', 'rendra', '48965b6388a34f47ea8283ae0958904444becf93', '18', NULL, '2025-04-11 03:46:44'),
(3, 'Lidyya', 'Lidya@gmail.com', 'lidya', 'b28b8324f024022e360f01c2c8151b6c792089c3', '4', NULL, '2025-04-12 09:36:46'),
(4, 'useruid', 'uid@gmail.com', 'uidjatim', '63ced67ed26a78bf2d98b723912c4ea85ffe8eef', '1', NULL, '2025-04-14 17:42:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `youtube`
--

CREATE TABLE `youtube` (
  `id_youtube` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `unit_id` varchar(255) NOT NULL,
  `isi` mediumtext NOT NULL,
  `link_youtube` varchar(255) NOT NULL,
  `link_reset` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `youtube`
--

INSERT INTO `youtube` (`id_youtube`, `judul`, `unit_id`, `isi`, `link_youtube`, `link_reset`, `tanggal_update`) VALUES
(1, 'youtube', '18', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, ad? Quaerat quibusdam illum, perferendis maiores eum, mollitia ratione assumenda odit nobis quidem quo repudiandae, rem earum et ipsa quod. Veniam?</p>', 'https://www.youtube.com/embed/pEbeJRsXvI4?si=UlMi0ud-5Fy5HX9v', '', '2025-04-16 07:35:03'),
(2, 'youtube', '1', '<p>tes</p>', 'https://www.youtube.com/embed/pEbeJRsXvI4?si=UlMi0ud-5Fy5HX9v', NULL, '2025-04-28 07:12:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `buletins`
--
ALTER TABLE `buletins`
  ADD PRIMARY KEY (`id_buletin`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `youtube`
--
ALTER TABLE `youtube`
  ADD PRIMARY KEY (`id_youtube`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `buletins`
--
ALTER TABLE `buletins`
  MODIFY `id_buletin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `id_unit` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `youtube`
--
ALTER TABLE `youtube`
  MODIFY `id_youtube` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
