<p class="text-right">
	<a href="{{ asset('user') }}" class="btn btn-outline-info btn-sm">
		<i class="fa fa-arrow-left"></i> Kembali
	</a>
</p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ asset('user/proses-edit') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}

<input type="hidden" name="id_user"	value="{{ $user->id_user }}">
                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Nama lengkap</label>
                    <div class="col-md-9">
                        <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="{{ $user->nama }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Email</label>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" required>
                    </div>
                </div>              

                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Username</label>
                    <div class="col-md-9">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->username }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Password</label>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" >
						<small class="text-danger">Biarkan kosong jika tidak ingin mengganti password. Password minimal 6 dan maksimal 32 karakter</small>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Level Hak Akses</label>
                    <div class="col-md-9">
                        <select name="akses_level" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="UID Jatim" <?php if($user->akses_level=='UID Jatim'){ echo 'selected'; } ?>>UID Jatim</option>
							<option value="UP3 SBU" <?php if($user->akses_level=='UP3 SBU'){ echo 'selected'; } ?>>UP3 SBU</option>
                            <option value="UP3 SBS" <?php if($user->akses_level=='UP3 SBS'){ echo 'selected'; } ?>>UP3 SBS</option>
                            <option value="UP3 SBB" <?php if($user->akses_level=='UP3 SBB'){ echo 'selected'; } ?>>UP3 SBB</option>
                            <option value="UP3 Mojokerto" <?php if($user->akses_level=='UP3 Mojokerto'){ echo 'selected'; } ?>>UP3 Mojokerto</option>
                            <option value="UP3 Gresik" <?php if($user->akses_level=='UP3 Gresik'){ echo 'selected'; } ?>>UP3 Gresik</option>
                            <option value="UP3 Madura" <?php if($user->akses_level=='UP3 Madura'){ echo 'selected'; } ?>>UP3 Madura</option>
                            <option value="UP3 Banyuwangi" <?php if($user->akses_level=='UP3 Banyuwangi'){ echo 'selected'; } ?>>UP3 Banyuwangi</option>
                            <option value="UP2D" <?php if($user->akses_level=='UP2D'){ echo 'selected'; } ?>>UP2D</option>
                            <option value="UP3 Malang" <?php if($user->akses_level=='UP3 Malang'){ echo 'selected'; } ?>>UP3 Malang</option>
                            <option value="UP3 Sidoarjo" <?php if($user->akses_level=='UP3 Sidoarjo'){ echo 'selected'; } ?>>UP3 Sidoarjo</option>
                            <option value="UP3 Madiun" <?php if($user->akses_level=='UP3 Madiun'){ echo 'selected'; } ?>>UP3 Madiun</option>
                            <option value="UP3 Pasuruan" <?php if($user->akses_level=='UP3 Pasuruan'){ echo 'selected'; } ?>>UP3 Pasuruan</option>
                            <option value="UP3 Bojonegoro" <?php if($user->akses_level=='UP3 Bojonegoro'){ echo 'selected'; } ?>>UP3 Bojonegoro</option>
                            <option value="UP3 Kediri" <?php if($user->akses_level=='UP3 Kediri'){ echo 'selected'; } ?>>UP3 Kediri</option>
                            <option value="UP3 Ponorogo" <?php if($user->akses_level=='UP3 Ponorogo'){ echo 'selected'; } ?>>UP3 Ponorogo</option>
                            <option value="UP3 Situbondo" <?php if($user->akses_level=='UP3 Situbondo'){ echo 'selected'; } ?>>UP3 Situbondo</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label text-right"></label>
                    <div class="col-md-9">
                        <div class="form-group pull-right btn-group">
							<button class="btn btn-success" type="submit" name="submit" value="submit">
								<i class="fa fa-save"></i>Simpan Data User
							</button>
                            <input type="reset" name="reset" class="btn btn-danger " value="Reset">

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                </form>