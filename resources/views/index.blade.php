
@include('layout.head')
@include('layout.header')
   <div id="carouselExampleCaptions" class="carousel slide" style="margin-top: 90px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner carousel-inner-utama">
                <div class="carousel-item active">
                <img src="{{ asset('umum/images/banner-2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('umum/images/banner-1.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('umum/images/banner-3.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>PT.PLN (PERSERO) Melindungi data pelanggan</p>
                    </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('umum/images/banner-4.jpg') }}" class="d-block w-100" alt="...">>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- /slider -->
    <h1 class="layanan-online mt-3" style="text-align: center; color: #0d667a;">Manfaatkan Layanan Online</h1>
    <hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">
    <!-- menu -->
    <div class="container mt-5 d-flex">
    <div class="row col-md-12 menuu-manfaat-layanan">
        <div class="card card-layanan col-md-4">
            <button class="toggle-content" data-target="Penyambungan">
                <h1>Video Profile</h1>
            </button>
        </div>
        <div class="card card-layanan col-md-4">
            <button class="toggle-content" data-target="Perubahandaya">
                <h1>Buletin</h1>
            </button>
        </div>
        <div class="card card-layanan col-md-4">
            <button class="toggle-content" data-target="Perubahansementara">
                <h1>Berita</h1>
            </button>
        </div>
    </div>
</div>

<!-- PENYAMBUNGAN -->
<section class="home content-section" id="Penyambungan">
    <div class="container mt-3 d-flex mb-5">
        <div class="row col-md-12 menu-penyambungan">
            <div class="row col-md-6 mt-3">
                <h3>Video Profile</h3>
                <h5 class="mt-3">Video Profile antar unit pelaksana wilayah UID Jawa Timur</h5>
                <div class="menu-penyambungan-detail" style="margin-top: 50px;">
                    <a class="nav-link-active" aria-current="page" href="#" title="">
                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            </div>
            <div class="row col-md-6 d-flex" style="margin-left: 30px;">
                <video width="100%" controls>
                    <source src="video.mp4" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
        </div>
    </div>
</section>

<!-- Perubahan Daya -->
<section class="home content-section" id="Perubahandaya" style="display: none;">
    <div class="container mt-3 d-flex mb-5">
        <div class="row col-md-12 menu-penyambungan">
            <div class="row col-md-6 mt-3">
                <h3>Perubahan Daya</h3>
                <h5 class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
                <div class="menu-penyambungan-detail" style="margin-top: 50px;">
                    <a class="nav-link-active" aria-current="page" href="#" title="">
                        Lihat Detail <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            </div>
            <div class="row col-md-6" style="margin-left: 30px;">
                <video width="100%" controls>
                    <source src="video.mp4" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
        </div>
    </div>
</section>

<!-- Perubahan Sementara -->
<section class="home content-section" id="Perubahansementara" style="display: none;">
    <div class="container mt-3 d-flex mb-5">
        <div class="row col-md-12 menu-penyambungan">
            <div class="row col-md-6 mt-3">
                <h3>Penyambungan Sementara</h3>
                <h5 class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
                <div class="menu-penyambungan-detail" style="margin-top: 50px;">
                    <a class="nav-link-active" aria-current="page" href="#" title="">
                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            </div>
            <div class="row col-md-6" style="margin-left: 30px;">
                <video width="100%" controls>
                    <source src="video.mp4" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
        </div>
    </div>
</section>
<!-- Buletin -->
<div class="container-fluid terusberkembang">
    <h1 class="layanan-online" style="text-align: center; color: #0d667a; margin-top: 10px;">Buletin Terkini</h1>
    <hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">
    <!-- Bootstrap Carousel -->
    <div id="newsCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
        <!-- Navigasi Titik -->
        <div class="carousel-indicators carousel-indicators-2">
            <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="1"></button>
        </div>
        <!-- isi konten slide 1 -->
        <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="container mt-4">
            <div class="row">
                @foreach($buletins as $buletin)
                <div class="col-md-4 mb-4">
                    <div class="news-cardterusbekembang">
                        <img src="{{ asset('storage/' . $buletin->gambar) }}" alt="{{ $buletin->judul }}">
                        <div class="news-textterusbekembang">
                            <h3>{{ $buletin->judul }}</h3>
                            <h5 class="text-justify">{{ Str::limit(strip_tags($buletin->isi), 100) }}</h5>
                            <a class="nav-link-active lihat-detailbuletin" href="{{ route('home') }}">
                                Lihat Detail <i class="bi bi-arrow-right-short"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
            <!-- navigasi carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        </div>
    </div>
</div>
<!-- Berita Terkini -->
<h1 class="layanan-online" style="text-align: center; color: #0d667a; margin-top: 10px;">Berita Terkini</h1>
<hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators carousel-indicators-2">
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color: #0d667a;"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2" style="background-color: #0d667a;"></button>
  </div>
  
  <div class="carousel-inner">
    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-6">
            <div class="card-terkiniu">
              <img src="{{ asset('umum/images/beritasbb.jpg') }}" alt="Co-Firing Biomassa" class="img-fluid terkiniu-img">
              <div class="news-terkiniu">
                <span class="text-primary">25 Januari 2024</span>
                <a href="{{ route('home') }}" target="_blank" class="berita-title">
                Bulan K3 Nasional, PLN Wujudkan Zero Accident dengan Meningkatkan Budaya Keselamatan Kerja
				</a>
                <p class="terkiniu-text">Peringati Bulan Kesehatan dan Keselamatan Kerja (K3) Nasional 2024, PT PLN (Persero) Unit Induk Distribusi (UID) Jawa Timur berkomitmen untuk meningkatkan budaya keselamatan kerja. Hal ini guna mewujudkan nihil kecelakaan kerja...</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-terkiniu">
              <img src="{{ asset('umum/images/beritasbb2.jpg') }}" alt="Co-Firing Biomassa" class="img-fluid terkiniu-img">
              <div class="news-terkiniu">
                <span class="text-primary">22 Desember 2024</span>
                <a href="{{ route('home') }}" target="_blank" class="berita-title">
                PIKK PLN Surabaya Barat Tingkatkan Ketrampilan Desain Dalam Berdayakan Perempuan
				</a>
                <p class="terkiniu-text">Dalam rangka memperingati Hari Ulang Tahun (HUT) ke-25 Persatuan Istri Karyawan dan Karyawati (PIKK) PLN serta Hari Ibu, PIKK PLN Surabaya Barat menggelar pelatihan desain grafis menggunakan Canva. Acara ini dihadiri oleh anggota PIKK dari Seluruh Unit Pelaksana di Unit Induk Distribusi (UID) Jawa Timur melalui zoom di kantor UP3 Surabaya Barat, pada Minggu (22/12)...</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-terkiniu">
              <img src="{{ asset('umum/images/beritasbb4.jpg') }}" alt="Co-Firing Biomassa" class="img-fluid terkiniu-img">
              <div class="news-terkiniu">
                <span class="text-primary">20 Desember 2024</span>
                <a href="{{ route('home') }}" target="_blank" class="berita-title">
                GELAR SUNAT MASSAL, PLN GANDENG YBM ISI LIBURAN SEKOLAH “ANAK HEBAT MENJEJAK MANFAAT BERSAMA SUPERHERO
				</a>
                <p class="terkiniu-text">Dalam rangka mengisi liburan sekolah PLN Surabaya Barat kembali menunjukkan komitmennya dalam menjalankan program Social Kemanusiaan dengan menggelar acara sunat massal bagi anak-anak dhuafa dengan tema “Anak Hebat Menjejak Manfaat Bersama Superhero.”</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-terkiniu">
              <img src="{{ asset('umum/images/beritasbb5.jpg') }}" alt="Co-Firing Biomassa" class="img-fluid terkiniu-img">
              <div class="news-terkiniu">
                <span class="text-primary">18 Desember 2024</span>
                <a href="{{ route('home') }}" target="_blank" class="berita-title">
                PLN Surabaya Barat Gelar Apel Pasukan P2TL untuk Tingkatkan Keandalan Layanan
				</a>
                <p class="terkiniu-text">PT PLN (Persero) Unit Pelaksana Pelayanan Pelanggan (UP3) Surabaya Barat menggelar apel pasukan Penertiban Pemakaian Tenaga Listrik (P2TL) di halaman kantornya dengan bertujuan untuk memastikan keandalan pasokan listrik dan mengurangi potensi pelanggaran penggunaan listrik oleh pelanggan...</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-terkiniu">
              <img src="{{ asset('umum/images/beritasbb6.jpg') }}" alt="Co-Firing Biomassa" class="img-fluid terkiniu-img">
              <div class="news-terkiniu">
                <span class="text-primary">30 November 2024</span>
                <a href="{{ route('home') }}" target="_blank" class="berita-title">
                Sambut Nataru, PLN Berbagi Kebahagiaan Sambungkan Listrik Gratis ke Warga Tidak Mampu
				</a>
                <p class="terkiniu-text">Sambut Natal dan Tahun Baru (Nataru), PT PLN (Persero) Unit Induk Distribusi (UID) Jawa Timur berbagi kebahagiaan dengan sambung listrik gratis warga tidak mampu di Jawa Timur. Melalui program bertajuk _Light Up The Dream_ (LUTD), PLN memberikan sambungan listrik gratis kepada 28 warga tidak mampu di Surabaya, Bojonegoro, Banyuwangi, Malang, Kediri, Madura, Situbondo, Gresik, Sidoarjo dan Ponorogo...</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-terkiniu">
              <img src="{{ asset('umum/images/beritasbb9.jpg') }}" alt="Co-Firing Biomassa" class="img-fluid terkiniu-img">
              <div class="news-terkiniu">
                <span class="text-primary">29 November 2024</span>
                <a href="{{ route('home') }}" target="_blank" class="berita-title">
                PLN Sukses Kawal Pasokan Listrik di Pilkada di Jawa Timur
				</a>
                <p class="terkiniu-text">PT PLN (Persero) Unit Induk Distribusi (UID) Jawa Timur sukses kawal pasokan listrik di Pemilihan Umum Kepala Daerah (Pilkada) Serentak di Jawa Timur pada Rabu (27/11/2024).</p>
              </div>
            </div>
          </div>
         </div>
      </div>
    </div>
    <!-- Slide 2 -->
    <div class="carousel-item">
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-6">
            <div class="card-terkiniu">
              <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Co-Firing Biomassa" class="img-fluid terkiniu-img">
              <div class="news-terkiniu">
                <span class="text-primary">Siaran Pers || 01 Feb 2025</span>
                <a href="{{ route('home') }}" target="_blank" class="berita-title">
                Co-Firing Biomassa di PLTU PLN Hasilkan 1,67 Juta MWh Listrik Hijau Sepanjang 2024
				</a>
                <p class="terkiniu-text">Press Release No. 024.PR/STH.01.05/II/2025 Jakarta, 01 Februari 2025 – PT PLN (Persero) sukses mengimplementasikan teknologi substitusi batubara atau co-firing biomassa pada 47 Pembangkit Listrik Tenaga...</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-terkiniu">
              <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Co-Firing Biomassa" class="img-fluid terkiniu-img">
              <div class="news-terkiniu">
                <span class="text-primary">Siaran Pers || 01 Feb 2025</span>
                <a href="{{ route('home') }}" target="_blank" class="berita-title">
                Co-Firing Biomassa di PLTU PLN Hasilkan 1,67 Juta MWh Listrik Hijau Sepanjang 2024
				</a>
                <p class="terkiniu-text">Press Release No. 024.PR/STH.01.05/II/2025 Jakarta, 01 Februari 2025 – PT PLN (Persero) sukses mengimplementasikan teknologi substitusi batubara atau co-firing biomassa pada 47 Pembangkit Listrik Tenaga...</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-terkiniu">
              <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Co-Firing Biomassa" class="img-fluid terkiniu-img">
              <div class="news-terkiniu">
                <span class="text-primary">Siaran Pers || 01 Feb 2025</span>
                <a href="{{ route('home') }}" target="_blank" class="berita-title">
                Co-Firing Biomassa di PLTU PLN Hasilkan 1,67 Juta MWh Listrik Hijau Sepanjang 2024
				</a>
                <p class="terkiniu-text">Press Release No. 024.PR/STH.01.05/II/2025 Jakarta, 01 Februari 2025 – PT PLN (Persero) sukses mengimplementasikan teknologi substitusi batubara atau co-firing biomassa pada 47 Pembangkit Listrik Tenaga...</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Carousel controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


@include('layout.footer')
