@include('layout.head')
@include('layout.header')
<div class="container" style="margin-top: 100px;">
    <h2 style=" margin-top: 10px;">Peringatan Bulan K3 Nasional</h2>
    <h4 style="font-size: 1em;">UP3 Surabaya Barat</h4>
    <h5 style="font-size: 1em;">Edisi I - Januari 2025</h5>
    <hr>
    <div class="berita-up3sbb">
        <img src="{{ asset('umum/images/buletin1.png') }}" alt="Profil UP3 SBB" class="profil-img">
    </div>
    <!-- Container Utama -->
    <div class="row col-md-12 isi-buletin mt-3">
    <h4 style="font-size: 1.3em;">Dalam upaya menciptakan lingkungan kerja yang aman dan bebas dari pelecehan seksual, PT PLN (Persero) mengadakan kampanye bertajuk "Four Ethics Against Sexual Harassment". Kampanye ini bertujuan untuk meningkatkan kesadaran seluruh pegawai mengenai pentingnya menjaga etika dalam berinteraksi serta melaporkan setiap tindakan pelecehan yang terjadi.</h4>
    <h4 style="font-size: 1.3em;">Melalui flyer yang disebarkan di berbagai kanal komunikasi, PLN menegaskan bahwa pelecehan seksual adalah tindakan yang melanggar hak asasi manusia. Oleh karena itu, perusahaan mendorong setiap individu untuk tidak diam dan segera melaporkan segala bentuk pelecehan agar dapat ditindaklanjuti sesuai dengan aturan yang berlaku.</h4>
    <h4 style="font-size: 1.3em;">Kampanye ini sejalan dengan komitmen PLN dalam menciptakan tempat kerja yang aman, nyaman, dan profesional bagi seluruh pegawai. Dengan adanya edukasi dan sosialisasi ini, diharapkan budaya kerja yang lebih sehat dan menghormati hak setiap individu dapat terwujud.</h4>
    <h4 style="font-size: 1.3em;">Untuk informasi lebih lanjut, masyarakat dapat mengunjungi situs resmi PLN di www.pln.co.id atau mengikuti akun resmi PLN UP3 Surabaya Barat di @plnup3surabayabarat.</h4>
    <div class="container d-flex justify-content-center align-items-center" style="height: auto;">
                <div class="card mb-3 mt-5 d-flex align-items-center text-center" style="max-width: 400px; width: 100%;">
                    <div class="card mb-3 mt-4 luar">
                        <img src="{{ asset('umum/images/buletin1.png') }}" class="card-img-top" alt="Berita PLN" 
                        style="width: 200px; height: auto;">
                    </div>
                    <div class="card-body">
                        <p class="card-title">Peringatan Bulan K3 Nasional </p>
                        <hr style="border: 1px solid black;">
                        <hr style="border: 1px solid black mt-5;">
                        <div class="detail">
                            <i class="bi bi-arrow-right-short"></i> 
                            <a href="https://online.fliphtml5.com/lbwzt/mlrx/" target="_blank" style="text-decoration: none">Lihat Buletin</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <a class="nav-link-active lihat-detailbuletin" aria-current="page" href="{{ route('home') }}" title=""><i class="bi bi-arrow-left"></i>
    Kembali
    </a>
</div>
@include('layout.footer')