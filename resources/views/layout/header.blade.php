<nav class="navbar navbar-expand-lg navbar-light navbar-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" style="margin-left: 30px;"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tentangkami.index') }}">Tentang Kami</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                        Profil
                    </a>
                    <div class="dropdown-menu p-4">
                        <div class="row">
                            <p class="dropdown-header" style="text-align: center;">PROFIL</p>
                            <!-- Kolom 1 -->
                            <div class="col-md-3">
                                <a class="dropdown-item" href="{{ route('profil.uid') }}">UID Jatim</a>
                                <a class="dropdown-item" href="{{ route('profil.up3sbu') }}">UP3 Surabaya Utara</a>
                                <a class="dropdown-item" href="{{ route('profil.up3sbs') }}">UP3 Surabaya Selatan</a>
                                <a class="dropdown-item" href="{{ route('profil.up3sbb') }}">UP3 Surabaya Barat</a>
                            </div>
                            <!-- Kolom 2 -->
                            <div class="col-md-3">
                                <a class="dropdown-item" href="#">UP3 Mojokerto</a>
                                <a class="dropdown-item" href="#">UP3 Gresik</a>
                                <a class="dropdown-item" href="#">UP3 Madura</a>
                                <a class="dropdown-item" href="#">UP3 Banyuwangi</a>
                            </div>
                            <!-- Kolom 3 -->
                            <div class="col-md-3">
                                <a class="dropdown-item" href="#">UP2D</a>
                                <a class="dropdown-item" href="#">UP3 Malang</a>
                                <a class="dropdown-item" href="#">UP3 Sidoarjo</a>
                                <a class="dropdown-item" href="#">UP3 Madiun</a>
                            </div>
                            <!-- Kolom 4 -->
                            <div class="col-md-3">
                                <a class="dropdown-item" href="#">UP3 Pasuruan</a>
                                <a class="dropdown-item" href="#">UP3 Bojonegoro</a>
                                <a class="dropdown-item" href="#">UP3 Kediri</a>
                                <a class="dropdown-item" href="#">UP3 Ponorogo</a>
                                <a class="dropdown-item" href="#">UP3 Situbondo</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form class="navbar-left" role="search" method="get" action="http://web.pln.co.id//search">
                        <div class="container row">
                            <div class="form-group col-md-10 colsm-10 col-xs-10">
                                <input type="text" name="q" class="form-control" placeholder="Cari...">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2" style="margin-left: -15px;">
                                <button type="submit" class="btn btn-default">
                                <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <div class="pln-logo ms-3">
            <img src="{{ asset('umum/images/ICON-PLN.png') }}" alt="PLN Logo">
        </div>
    </div>
</nav>

