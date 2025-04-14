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
	<input type="file" name="gambar" class="form-control" placeholder="Upload Foto" value="{{ old('gambar') }}" required>
	</div>
</div>

<div class="form-group row">
    <label class="col-md-3">Unit</label>
    <div class="col-md-6">
        @if(session('unit_id') == 18)
            <select name="unit_id" class="form-control" required>
                <option value="" disabled selected>Pilih Unit</option>
                @foreach ($units as $unit)
                    <option value="{{ $unit->id_unit }}">{{ $unit->nama }}</option>
                @endforeach
            </select>
        @else
            @foreach ($units as $unit)
                <input type="hidden" name="unit_id" value="{{ $unit->id_unit }}">
                <input type="text" class="form-control" value="{{ $unit->nama }}" readonly>
            @endforeach
        @endif
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