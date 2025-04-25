@include('layout.head')
@include('layout.header')
@if(count($banner) > 0)
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="margin-top: 90px;">
    <div class="carousel-indicators">
        @foreach($banner as $index => $item)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner carousel-inner-utama">
        @foreach($banner as $index => $item)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('admin/upload/banner/' . $item->gambar) }}" class="d-block w-100" alt="{{ $item->judul }}">
            </div>
        @endforeach
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
@endif

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
@foreach ($youtube as $video)
<section class="home content-section mt-5" id="Penyambungan">
    <div class="container mt-3 d-flex mb-5">
        <div class="row col-md-12 menu-penyambungan">
        <div class="row col-md-6">
            <h2 style="margin-bottom: 0;">{{ $video->judul }}</h2>
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
                        <img src="{{ asset('admin/upload/buletin/' . $buletin->gambar) }}" alt="{{ $buletin->judul }}">
                        <div class="news-textterusbekembang">
                            <h3>{{ $buletin->judul }}</h3>
                            <h5>{{ $buletin->unit->nama }}</h5>
                            <h5 class="text-justify">{{ Str::limit(strip_tags($buletin->isi), 30) }}</h5>
                            <a class="nav-link-active lihat-detailbuletin" href="{{ route('buletin.detail', $buletin->id_buletin) }}">
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
                    <a href="{{ route('berita.detail', $item->id_berita) }}" class="berita-title" style="font-weight: bold;">
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


@include('layout.footer')
