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

<!-- PENYAMBUNGAN -->
@foreach ($youtube as $video)
<div class="home content-section mt-5" id="Video">
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
</div>
@endforeach


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

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
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

@include('layout.footer')
