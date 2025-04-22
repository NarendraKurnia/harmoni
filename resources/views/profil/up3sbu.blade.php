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
	<h2 style="text-align: center; margin-top: 10px;">UID Jawa Timur</h2>
    <div class="profil-up3sbb">
        <img src="{{ asset('umum/images/foto-up3sbb.jpeg') }}" alt="Profil UP3 SBB" class="profil-img">
    </div>
    <!-- Container Utama -->
<div class="row col-md-12 mt-3">
    <!-- Bagian Lokasi -->
    <div class="col-md-6">
        <div class="embed-responsive" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7915.565913688838!2d112.74338922939013!3d-7.265523574153054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9619a5a8977%3A0x5bd004abb3c3a3b2!2sPT%20PLN%20(Persero)%20Unit%20Induk%20Distribusi%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1740451472096!5m2!1sid!2sid" 
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
            <li><i class="fas fa-phone-alt"></i> <strong>Telepon:</strong> (021) 0123456789</li>
            <li><i class="fas fa-envelope"></i> <strong>Email:</strong> <a href="mailto:info@brand.com"> info@brand.com</a></li>
            <li><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> Jl. Brandkami No.123, Jakarta Timur</li>
            <li><i class="fab fa-instagram"></i> <strong>Instagram:</strong> <a href="https://www.instagram.com/brandkami" target="_blank">@brandkami</a></li>
        </ul>
    </div>
</div>
</div>
<!-- Buletin -->
<div class="container-fluid terusberkembang mt-4">
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
                        <img src="{{ asset('admin/upload/buletin/' . $buletin->gambar) }}" alt="{{ $buletin->judul }}">
                        <div class="news-textterusbekembang">
                            <h3>{{ $buletin->judul }}</h3>
                            <h5>{{ $buletin->unit->nama }}</h5>
                            <h5 class="text-justify">{{ Str::limit(strip_tags($buletin->isi), 30) }}</h5>
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
        @foreach($berita as $item)
        <div class="col-md-6 mb-4">
            <div class="card-terkiniu">
                <img src="{{ asset('admin/upload/berita/' . $item->gambar) }}" alt="{{ $item->judul }}" class="img-fluid terkiniu-img">
                <div class="news-terkiniu">
                    <span class="text-primary">{{ \Carbon\Carbon::parse($item->tanggal_update)->translatedFormat('d F Y') }}</span>
                    <a href="{{ route('home') }}" class="berita-title" style="font-weight: bold;">
                        {{ $item->judul }}
                    </a>
                    <p>{{ $item->unit->nama }}</p>
                    <p class="terkiniu-text">{{ Str::limit(strip_tags($item->isi), 150) }}</p>
                </div>
            </div>
        </div>
        @endforeach
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
<div class="container-fluid terusberkembang mt-5" style="margin-bottom: -50px;">
    <h1 class="layanan-online" style="text-align: center; color: #0d667a; margin-top: 10px;">Video</h1>
    <hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">
@foreach ($youtube as $video)
<section class="home content-section mt-5" id="Penyambungan">
    <div class="container mt-3 d-flex mb-5">
        <div class="row col-md-12 menu-penyambungan">
        <div class="row col-md-6">
            <h2 style="margin-bottom: 0;">{{ $video->judul }}</h2>
            <h4 style="margin-top: -50px;">{{ $video->unit->nama }}</h4>
            <h5 style="margin-top: 0;">{!! $video->isi !!}</h5>
        </div>
            <div class="row col-md-6 d-flex" style="margin-left: 30px;">
                <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; width: 100%;">
                    <iframe 
                        src="{{ $video->link_youtube }}" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen 
                        style="position: absolute; top:0; left: 0; width: 100%; height: 100%;">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
</div>


{{-- Tambahkan pagination kalau mau --}}
{{ $youtube->links() }}

@include('layout.footer')