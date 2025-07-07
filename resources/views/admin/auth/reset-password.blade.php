<x-app-layout>
  <h2>Masukkan Password Baru</h2>
  @if($errors->any()) <div>{{ $errors->first() }}</div>@endif
  <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}" />
    <input type="email" name="email" value="{{ old('email') }}" readonly />
    <input type="password" name="password" placeholder="Password baru" required />
    <input type="password" name="password_confirmation" placeholder="Konfirmasi password" required />
    <button type="submit">Reset Password</button>
  </form>
</x-app-layout>
