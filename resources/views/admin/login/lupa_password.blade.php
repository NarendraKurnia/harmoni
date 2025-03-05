<div class="login-box">
  <div class="login-logo">
    <a href="{{ asset('/') }}"><b>Login</b> Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Lupa password? Masukkan email anda.</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Lupa Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <hr>

      <p class="mb-1 text-center">
        <a href="{{ route('tentangkami.index') }}">Beranda | </a><a href="{{ asset('login') }}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->