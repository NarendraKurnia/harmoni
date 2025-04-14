<div class="callout callout-success">
    Halo. Selamat datang di halaman dasbor
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  
    @foreach($rekapPerUnit as $unit)
    <div class="mb-5">
      <h4 class="text-bold text-primary mb-3">Unit: {{ $unit['unit_nama'] }}</h4>

      <!-- Row untuk 6 bulan terakhir -->
      <div class="row">
        @foreach($unit['rekap'] as $bulan)
        <div class="col-lg-2 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $bulan['point'] }}</h3>
              <p>{{ $bulan['bulan'] }}</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <div class="d-flex justify-content-start small-box-footer">
              <ul class="pl-3 mb-2 ml-2">
                <li>Buletin: {{ $bulan['buletin'] }}</li>
                <li>Berita: {{ $bulan['berita'] }}</li>
                <li>Youtube: -</li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Total poin untuk unit ini -->
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{ $unit['total_point'] }}</h3>
              <p>Total Poin 6 Bulan Terakhir</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <span class="small-box-footer">Total dari Berita & Buletin</span>
          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</section>
