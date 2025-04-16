@extends('admin/login/layout')

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Ganti Password</h3>
  </div>
  <form action="{{ route('akun.proses_edit') }}" method="post">
    @csrf
    <div class="card-body">
      {{-- Username (readonly) --}}
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" 
               value="{{ $user->username }}" readonly>
      </div>

      {{-- Password Lama --}}
      <div class="form-group">
        <label>Password Lama</label>
        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" required>
        @error('old_password')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      {{-- Password Baru --}}
      <div class="form-group">
        <label>Password Baru</label>
        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
        @error('new_password')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      {{-- Konfirmasi Password Baru --}}
      <div class="form-group">
        <label>Konfirmasi Password Baru</label>
        <input type="password" name="new_password_confirmation" class="form-control" required>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-success">Simpan Perubahan</button>
      <a href="{{ url('admin/dasbor') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection
