@include('layout.head')
@include('layout.header')
<div class="container" style="margin-top: 100px;">
<h2 style=" margin-top: 10px;">{{ $berita->judul }}</h2>
<h5 style="font-size: 1em;">{{ $berita->unit->nama }}</h5>
<div class="d-flex justify-content-between align-items-center" style="font-size: 1em;">
    <h5 class="mb-0">{{ \Carbon\Carbon::parse($berita->tanggal_update)->translatedFormat('d F Y') }}</h5>
    <div class="d-flex align-items-center">
    <i class="bi bi-eye me-1"></i>
    <span>{{ $berita->views }}</span>
</div>

</div>

<hr>
<div class="berita-up3sbb">
    <img src="{{ asset('admin/upload/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="profil-img">
</div>
<div class="row col-md-12 isi-buletin mt-3">
<h4 style="font-size: 1.1em;">{!! $berita->isi !!}</h4>

</div>
<a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ url()->previous() }}">
    <i class="bi bi-arrow-left"></i> Kembali
</a>


</div>
@include('layout.footer')