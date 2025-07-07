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
            <a href="#Video" class="btn btn-link text-decoration-none">
                <h1>Video</h1>
            </a>
        </div>
    </div>
</div>
<div class="container">
	<h2 style="text-align: center; margin-top: 10px;">UP3 Bojonegoro</h2>
    <div class="profil-up3sbb">
        <img src="{{ asset('umum/images/foto-up3sbb.jpeg') }}" alt="Profil UP3 SBB" class="profil-img">
    </div>
    <!-- Container Utama -->
<div class="row col-md-12 mt-3">
    <!-- Bagian Lokasi -->
    <div class="col-md-6">
        <div class="embed-responsive" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.7679900311873!2d111.8884286747594!3d-7.1528025928516294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7781d4a2bb8443%3A0xa4f1dbe3bee17dbb!2sPLN%20UP3%20BOJONEGORO!5e0!3m2!1sid!2sid!4v1745911292986!5m2!1sid!2sid" 
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
<!-- BULETIN -->
<div class="container-fluid terusberkembang" id="Buletin">
    <h1 class="layanan-online" style="text-align: center; color: #0d667a; margin-top: 10px;">Buletin Terkini</h1>
    <hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">

    @php
        $buletinChunks = $allBuletin->chunk(6);
    @endphp

    <div id="buletinCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
        
        <!-- Titik Navigasi -->
        <div class="carousel-indicators carousel-indicators-2">
            @foreach($buletinChunks as $index => $chunk)
                <button type="button" data-bs-target="#buletinCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        <!-- Isi Carousel -->
        <div class="carousel-inner">
            @foreach($buletinChunks as $index => $chunk)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="container mt-4">
                        <div class="row">
                            @foreach($chunk as $buletin)
                                <div class="col-md-4 mb-4"> <!-- 3 kolom ke samping (12/4 = 3) -->
                                    <div class="news-cardterusbekembang h-100 d-flex flex-column">
                                        <img src="{{ asset('admin/upload/buletin/' . $buletin->gambar) }}" alt="{{ $buletin->judul }}" class="img-fluid">
                                        <div class="news-textterusbekembang flex-grow-1 d-flex flex-column justify-content-between">
                                            <div>
                                                <h3>{{ $buletin->judul }}</h3>
                                                <h5>{{ $buletin->unit->nama }}</h5>
                                                <p>{{ Str::limit(strip_tags($buletin->isi), 50) }}</p>
                                            </div>
                                            <a class="nav-link-active lihat-detailbuletin mt-3" href="{{ route('buletin.detail', $buletin->id_buletin) }}" style="width:160px;">
                                                Lihat Detail <i class="bi bi-arrow-right-short"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> 
                    </div> 
                </div> 
            @endforeach
        </div>

        <!-- Tombol Panah -->
        <button class="carousel-control-prev" type="button" data-bs-target="#buletinCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-warning"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#buletinCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-warning"></span>
        </button>

    </div>
</div>


<!-- Berita Terkini -->
<h1 class="layanan-online" style="text-align: center; color: #0d667a; margin-top: 10px;" id="Berita">Berita Terkini</h1>
<hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">
@php
  $chunks = $allBerita->chunk(6);
@endphp

<div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-indicators carousel-indicators-2">
    @foreach($chunks as $i => $chunk)
      <button type="button"
              data-bs-target="#carouselExample"
              data-bs-slide-to="{{ $i }}"
              class="{{ $i===0?'active':'' }}"
              aria-current="{{ $i===0?'true':'false' }}"
              aria-label="Slide {{ $i+1 }}"
              style="background-color:#0d667a;"></button>
    @endforeach
  </div>

  <div class="carousel-inner">
    @foreach($chunks as $i => $chunk)
      <div class="carousel-item {{ $i===0?'active':'' }}">
        <div class="container mt-4">
          <div class="row">
            @foreach($chunk as $item)
              <div class="col-md-6 mb-4">
                <!-- kartu berita -->
                <div class="card-terkiniu">
                  <img src="{{ asset('admin/upload/berita/'.$item->gambar) }}"
                       alt="{{ $item->judul }}" class="img-fluid terkiniu-img">
                  <div class="news-terkiniu">
                    <span class="text-primary">
                      {{ \Carbon\Carbon::parse($item->tanggal_update)->translatedFormat('d F Y') }}
                    </span>
                    <a href="{{ route('berita.detail', $item->id_berita) }}"
                       class="berita-title" style="font-weight:bold;">
                      {{ $item->judul }}
                    </a>
                    <p>{{ $item->unit->nama }}</p>
                    <p class="terkiniu-text">
                      {{ Str::limit(strip_tags($item->isi),150) }}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Controls --}}
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-dark"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-dark"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Video -->
<div class="container-fluid terusberkembang" style="margin-bottom: -50px;" id="Video">
    <h1 class="layanan-online" style="text-align: center; color: #0d667a; margin-top: 10px;">Video</h1>
    <hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">

    <div id="carouselVideo" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($youtube as $key => $video)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="container mt-3 d-flex justify-content-center align-items-center flex-column mb-5">
                        <div class="row col-md-8 text-center">
                            <h2 style="margin-bottom: 10px;">{{ $video->judul }}</h2>
                            <h5 style="margin-top: 0;">{{ $video->unit->nama }}</h5>
                            <p>{!! $video->isi !!}</p>
                        </div>
                        <div class="row col-md-8">
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
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselVideo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-warning"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselVideo" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-warning"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <!-- Indicators -->
        <div class="carousel-indicators mt-3">
            @foreach ($youtube as $key => $video)
                <button type="button" data-bs-target="#carouselVideo" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key+1 }}"></button>
            @endforeach
        </div>
    </div>
</div>



@include('layout.footer')