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
<form action="{{ asset('berita/proses-edit') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}

<input type="hidden" name="id_berita"	value="{{ $berita->id_berita }}">
                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Nama lengkap</label>
                    <div class="col-md-9">
                        <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{ $berita->judul }}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Isi Proyek</label>
                    <div class="col-md-9">
                        <textarea id="editor" name="isi" class="form-control">{!! old('isi', $berita->isi) !!}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Upload Foto Berita</label>
                    <div class="col-sm-9">
                        <input type="file" name="gambar" class="form-control" placeholder="Upload Foto" value="{{ old('gambar') }}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 control-label text-right">Unit</label>
                    <div class="col-md-6">
                        @if(session('unit_id') == 18)
                            <select name="unit_id" class="form-control">
                                <option value="">Pilih Unit</option>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id_unit }}" 
                                        {{ old('unit_id', $berita->unit_id) == $unit->id_unit ? 'selected' : '' }}>
                                        {{ $unit->nama }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            @foreach($units as $unit)
                                <input type="hidden" name="unit_id" value="{{ $unit->id_unit }}">
                                <input type="text" class="form-control" value="{{ $unit->nama }}" readonly>
                            @endforeach
                        @endif
                        <small class="text-secondary">Kategori</small>
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