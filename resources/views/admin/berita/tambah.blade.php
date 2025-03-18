<p class="text-right">
	<a href="{{ asset('berita') }}" class="btn btn-outline-info btn-sm">
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
<form action="{{ asset('berita/proses-tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="csrf_test_name" value="155e3af88478230f860a934020e9214a">

<div class="form-group row">
	<label class="col-md-3">Judul Berita</label>
	<div class="col-md-9">
		<input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
	</div>
</div>

<div class="form-group row">
    <label class="col-md-3">Isi Proyek</label>
    <div class="col-md-9">
        <textarea id="editor" name="isi" required>{{ old('isi') }}</textarea>
    </div>
</div>

<div class="form-group row">
	<label class="col-md-3">Upload Foto Berita</label>
	<div class="col-md-6">
	<input type="file" name="gambar" class="form-control" placeholder="Upload Foto" value="{{ old('gambar') }}">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Unit</label>
	<div class="col-md-6">
		<select name="unit" class="form-control select2">
						<option value="UID Jatim">
				UID Jatim			</option>
						<option value="UP3 Surabaya Utara">
				UP3 SBU			</option>
						<option value="UP3 Surabaya Selatan">
				UP3 SBS			</option>
						<option value="UP3 Surabaya Barat">
				UP3 SBB			</option>
						<option value="UP3 Mojokerto">
				UP3 Mojokerto	
								</option>
						<option value="UP3 Gresik">
				UP3 Gresik			
								</option>
						<option value="UP3 Madura">
				UP3 Madura			
								</option>
						<option value="UP3 Banyuwangi">
				UP3 Banyuwangi			
								</option>
						<option value="UP2D">
				UP2D			
								</option>
						<option value="UP3 Malang">
				UP3 Malang			
								</option>
						<option value="UP3 Sidoarjo">
				UP3 Sidoarjo			
								</option>
						<option value="UP3 Madiun">
				UP3 Madiun			
								</option>
						<option value="UP3 Pasuruan">
				UP3 Pasuruan			
								</option>
						<option value="UP3 Bojonegoro">
				UP3 Bojonegoro			
								</option>
						<option value="UP3 Kediri">
				UP3 Kediri			
								</option>
						<option value="UP3 Ponorogo">
				UP3 Ponorogo			
								</option>
						<option value="UP3 Situbondo">
				UP3 Situbondo			
								</option>
					</select>
		<small class="text-secondary">Kategori</small>
	</div>
</div>

<div class="form-group row">
                    <label class="col-md-3 control-label text-right"></label>
                    <div class="col-md-9">
                        <div class="form-group pull-right btn-group">
							<button class="btn btn-success" type="submit" name="submit" value="submit">
								<i class="fa fa-save"></i>Simpan Data Berita
							</button>
                            <input type="reset" name="reset" class="btn btn-danger " value="Reset">

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>