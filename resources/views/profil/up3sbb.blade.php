@include('layout.head')
@include('layout.header')
<div id="carouselExampleCaptions" class="carousel slide" style="margin-top: 90px;">
    <h1 class="layanan-online mt-3" style="text-align: center; color: #0d667a;">Manfaatkan Layanan Online</h1>
    <hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">
    <!-- menu -->
    <div class="container mt-5 d-flex">
    <div class="row col-md-12 menuu-manfaat-layanan">
        <div class="card card-layanan col-md-4">
            <a href="#Buletin" class="btn btn-link text-decoration-none">
                <h1>Buletin</h1>
            </a>
        </div>
        <div class="card card-layanan col-md-4">
            <a href="#Berita" class="btn btn-link text-decoration-none">
                <h1>Berita</h1>
            </a>
        </div>
        <div class="card card-layanan col-md-4">
            <a href="#Video" class="btn btn-link text-decoration-none" target="_blank">
                <h1>Video</h1>
            </a>
        </div>
    </div>
</div>
<div class="container">
	<h2 style="text-align: center; margin-top: 10px;">UP3 Surabaya Barat</h2>
    <div class="profil-up3sbb">
        <img src="{{ asset('umum/images/foto-up3sbb.jpeg') }}" alt="Profil UP3 SBB" class="profil-img">
    </div>
    <!-- Container Utama -->
<div class="row col-md-12 mt-3">
    <!-- Bagian Lokasi -->
    <div class="col-md-6">
        <div class="embed-responsive" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.992685093071!2d112.69251707476137!3d-7.354714992654184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e34bd11f7f6f%3A0x8158b9a5b5db33!2sPT.%20PLN%20(Persero)%20UP3%20Surabaya%20Barat!5e0!3m2!1sid!2sid!4v1738824735895!5m2!1sid!2sid" 
                width="100%" height="100%" 
                style="border: 0; position: absolute; top: 0; left: 0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>
    <!-- Bagian Informasi Kontak -->
    <div class="col-md-6">
        <h3 class="mt-4">Informasi Kontak</h3>
        <ul class="list-unstyled contact-info">
            <li><i class="fas fa-phone-alt"></i> <strong>Telepon:</strong>  (021) 0123456789</li>
            <li><i class="fas fa-envelope"></i> <strong>Email:</strong> <a href="mailto:info@brand.com"> plnup3sbb@gmail.com</a></li>
            <li><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong>  Jl. Taman Bar. No.48, Taman, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur</li>
            <li><i class="fab fa-instagram"></i> <strong>Instagram:</strong> <a href="https://www.instagram.com/brandkami" target="_blank"> @plnup3surabayabarat</a></li>
        </ul>
    </div>
</div>
</div>

<!-- Buletin -->
<div class="container-fluid terusberkembang mt-1" id="Buletin">
    <h1 class="layanan-online" style="text-align: center; color: #0d667a; margin-top: 5px;">Buletin</h1>
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
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/buletin1.png') }}" alt="Berita PLN">
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <h5 class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque qui corporis sit ipsa numquam nulla debitis esse, voluptate vel porro ratione, necessitatibus? Sunt ut facere nihil veniam impedit repudiandae. Ad!</h5>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/buletin2.png') }}" alt="Berita PLN">
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <h5 class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque qui corporis sit ipsa numquam nulla debitis esse, voluptate vel porro ratione, necessitatibus? Sunt ut facere nihil veniam impedit repudiandae. Ad!</h5>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/buletin3.png') }}" alt="Berita PLN">
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <h5 class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque qui corporis sit ipsa numquam nulla debitis esse, voluptate vel porro ratione, necessitatibus? Sunt ut facere nihil veniam impedit repudiandae. Ad!</h5>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Berita PLN">
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <h5 class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque qui corporis sit ipsa numquam nulla debitis esse, voluptate vel porro ratione, necessitatibus? Sunt ut facere nihil veniam impedit repudiandae. Ad!</h5>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Berita PLN">
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <h5 class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque qui corporis sit ipsa numquam nulla debitis esse, voluptate vel porro ratione, necessitatibus? Sunt ut facere nihil veniam impedit repudiandae. Ad!</h5>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Berita PLN">
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <h5 class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque qui corporis sit ipsa numquam nulla debitis esse, voluptate vel porro ratione, necessitatibus? Sunt ut facere nihil veniam impedit repudiandae. Ad!</h5>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slide 2 -->
            <!-- <div class="carousel-item">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Berita PLN" >
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Berita PLN" >
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Berita PLN" >
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Berita PLN" >
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Berita PLN" >
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="news-cardterusbekembang">
                                <img src="{{ asset('umum/images/icon-terusberkembang.jpg') }}" alt="Berita PLN" >
                                <div class="news-textterusbekembang">
                                    <h3>Tingkatkan Keandalan Listrik Sulut dan Gorontalo, PLN Operasikan SUTT Sepanjang 80,59 Kms</h3>
                                    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('buletin.index') }}" title="">
				                        Lihat Detail<i class="bi bi-arrow-right-short"></i>
				                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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
<!-- Berita -->
<h1 class="layanan-online" id="Berita"style="text-align: center; color: #0d667a; margin-top: 10px;">Berita</h1>
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
                <a href="{{ route('berita.index') }}" target="_blank" class="berita-title">
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
                <a href="{{ route('berita.index') }}" target="_blank" class="berita-title">
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
                <a href="{{ route('berita.index') }}" target="_blank" class="berita-title">
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
                <a href="{{ route('berita.index') }}" target="_blank" class="berita-title">
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
                <a href="{{ route('berita.index') }}" target="_blank" class="berita-title">
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
                <a href="{{ route('berita.index') }}" target="_blank" class="berita-title">
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
                <a href="{{ route('berita.index') }}" target="_blank" class="berita-title">
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
                <a href="{{ route('berita.index') }}" target="_blank" class="berita-title">
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
                <a href="{{ route('berita.index') }}" target="_blank" class="berita-title">
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
<!-- Video -->
<section class="home content-section terusberkembang mt-5" id="Video">
    <div class="container mt-3 d-flex flex-column gap-4">
        <div class="row col-md-12 menu-penyambungan">
            <!-- Judul -->
            <h1 class="layanan-online text-center" id="Berita" style="color: #0d667a; margin-bottom: 30px;">Video</h1>

            <!-- Video 1 -->
            <div class="row col-md-6 mt-5"> <!-- Tambahkan mt-5 di sini -->
                <h3>Khitan Masal</h3>
                <h5 class="mt-3">Khitan Masal yang dilaksanakan pada tanggal 22 Desember 2024</h5>
            </div>
            <div class="row col-md-6 d-flex mt-5" style="margin-left: 30px;"> <!-- Tambahkan mt-5 di sini -->
                <video width="100%" controls>
                    <source src="{{ asset('umum/video/TVSrikandi.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
            <!-- Video 2 -->
            <div class="row col-md-6 mt-3"> <!-- Tambahkan mt-5 di sini -->
                <h3>Srikandi PLN Peduli terhadap stunting</h3>
                <h5 class="mt-3">YBM & Srikandi PLN gelar aksi peduli kesehatan bagi anak stunting dan gizi buruk di kecamatan Menganti</h5>
            </div>
            <div class="row col-md-6 d-flex mt-3" style="margin-left: 30px;"> <!-- Tambahkan mt-5 di sini -->
                <video width="100%" controls>
                    <source src="{{ asset('umum/video/sunatmasal.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
            <!-- Video 3 -->
            <div class="row col-md-6 mt-3"> <!-- Tambahkan mt-5 di sini -->
                <h3>Video Profile</h3>
                <h5 class="mt-3">Video Profile antar unit pelaksana wilayah UID Jawa Timur</h5>
            </div>
            <div class="row col-md-6 d-flex mt-3" style="margin-left: 30px;"> <!-- Tambahkan mt-5 di sini -->
                <video width="100%" controls>
                    <source src="{{ asset('umum/video/.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
            <!-- Video 4 -->
            <div class="row col-md-6 mt-3"> <!-- Tambahkan mt-5 di sini -->
                <h3>Video Profile</h3>
                <h5 class="mt-3">Video Profile antar unit pelaksana wilayah UID Jawa Timur</h5>
            </div>
            <div class="row col-md-6 d-flex mt-3" style="margin-left: 30px;"> <!-- Tambahkan mt-5 di sini -->
                <video width="100%" controls>
                    <source src="{{ asset('umum/video/.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
        </div>
        </div>
    </div>
</section>
@include('layout.footer')