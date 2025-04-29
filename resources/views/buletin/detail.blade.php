@include('layout.head')
@include('layout.header')
<div class="container" style="margin-top: 100px;">
    <h2 style=" margin-top: 10px;">{{ $buletin->judul }}</h2>
    <h4 style="font-size: 1em;">{{ $buletin->unit->nama }}</h4>
    <h5 style="font-size: 1em;">{{ $buletin->edisi }}</h5>
    <div class="d-flex justify-content-between align-items-center" style="font-size: 1em;">
                <h5 class="mb-0">{{ \Carbon\Carbon::parse($buletin->tanggal_update)->translatedFormat('d F Y') }}</h5>
                <div class="d-flex align-items-center">
                    <i class="bi bi-eye me-1"></i>
                    <span>{{ $buletin->views }}</span>
                </div>
    </div>
    <hr>
    <div class="berita-up3sbb">
    <img src="{{ asset('admin/upload/buletin/' . $buletin->gambar) }}" alt="{{ $buletin->judul }}" class="profil-img" style="width: 400px; height: auto;">
    </div>
    <!-- Container Utama -->
    <div class="row col-md-12 isi-buletin mt-3">
    <h4 style="font-size: 1.3em;">{!! $buletin->isi !!}</h4>
    <div class="container d-flex justify-content-center align-items-center" style="height: auto;">
                <div class="card mb-3 mt-5 d-flex align-items-center text-center" style="max-width: 400px; width: 100%;">
                    <div class="card mb-3 mt-4 luar">
                        <img src="{{ asset('admin/upload/buletin/' . $buletin->gambar) }}" class="card-img-top" alt="{{ $buletin->judul }}" 
                        style="width: 200px; height: auto;">
                    </div>
                    <div class="card-body">
                        <p class="card-title">{{ $buletin->judul }}</p>
                        <hr style="border: 1px solid black;">
                        <hr style="border: 1px solid black mt-5;">
                        <div class="detail">
                            <i class="bi bi-arrow-right-short"></i> 
                            <a href="{{ $buletin->link_buletin }}" target="_blank" style="text-decoration: none">Lihat Buletin</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ url()->previous() }}" title=""><i class="bi bi-arrow-left"></i>
    Kembali
    </a>
</div>
@include('layout.footer')