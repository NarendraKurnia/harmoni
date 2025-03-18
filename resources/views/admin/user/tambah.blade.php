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
<form action="{{ asset('user/proses-tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Nama lengkap</label>
                    <div class="col-md-9">
                        <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="{{ old('nama') }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Email</label>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    </div>
                </div>              

                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Username</label>
                    <div class="col-md-9">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Password</label>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Level Hak Akses</label>
                    <div class="col-md-9">
                        <select name="akses_level" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="UID Jatim">UID Jatim</option>
							<option value="UP3 SBU">UP3 SBU</option>
                            <option value="UP3 SBS">UP3 SBS</option>
                            <option value="UP3 SBB">UP3 SBB</option>
                            <option value="UP3 Mojokerto">UP3 Mojokerto</option>
                            <option value="UP3 Gresik">UP3 Gresik</option>
                            <option value="UP3 Madura">UP3 Madura</option>
                            <option value="UP3 Banyuwangi">UP3 Banyuwangi</option>
                            <option value="UP2D">UP2D</option>
                            <option value="UP3 Malang">UP3 Malang</option>
                            <option value="UP3 Sidoarjo">UP3 Sidoarjo</option>
                            <option value="UP3 Madiun">UP3 Madiun</option>
                            <option value="UP3 Pasuruan">UP3 Pasuruan</option>
                            <option value="UP3 Bojonegoro">UP3 Bojonegoro</option>
                            <option value="UP3 Kediri">UP3 Kediri</option>
                            <option value="UP3 Ponorogo">UP3 Ponorogo</option>
                            <option value="UP3 Situbondo">UP3 Situbondo</option>
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