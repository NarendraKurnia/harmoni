<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
    <a href="https://wa.me/6282228353983?text=Halo%20saya%20ingin%20laporan%20eror%20layanan%20di%20website%20Harmoni"
       target="_blank"
       class="nav-link text-success">
        <i class="fab fa-whatsapp"></i> Contact via WhatsApp
    </a>
</li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
          <?php echo Session()->get('nama') ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Menu User</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          <i class="fas fa-sitemap mr-2"></i> {{ $unit->nama ?? 'Unit Tidak Diketahui' }}
          </a>

          <div class="dropdown-divider"></div>
          <a href="{{ route('user.ganti_password') }}" class="dropdown-item">
              <i class="fas fa-key mr-2"></i> Ganti Password
          </a>

          <div class="dropdown-divider"></div>
          <a href="{{ asset('logout') }}" class="dropdown-item dropdown-footer text-danger"><i class="fa fa-sign-out-alt"></i>
          Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="{{ asset('logout') }}" >
          <i class="fa fa-sign-out-alt"></i>Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->