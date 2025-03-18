@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <form action="{{ url('admin/prestasi') }}" method="get" accept-charset="utf-8">
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="Keywords..." value="" required>
                <span class="input-group-append">
                    <button type="submit" name="submit" value="Cari" class="btn btn-info btn-flat">
                        <i class="fa fa-search"></i> Cari
                    </button>
                    <a href="{{ url('berita/tambah') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru
                    </a>
                </span>
            </div>
        </form>
    </div>
    
    <div class="col-md-6">
        <nav>
            <ul class="pagination">
                <li class="page-item active">
                    <a href="{{ url('admin/prestasi?page=1') }}" class="page-link pb-2 pt-2">1</a>
                </li>
                <li class="page-item">
                    <a href="{{ url('admin/prestasi?page=2') }}" class="page-link pb-2 pt-2">2</a>
                </li>
            </ul>
        </nav>    
    </div>
</div>

<hr>

<div class="table-responsive mailbox-messages mt-1">        
    <table class="table table-sm table-hover" id="example2">
        <thead>
            <tr class="text-left bg-light">
                <th width="5%" class="text-center">NO</th>
                <th width="10%">Gambar</th>
                <th width="20%">Judul</th>
                <th width="25%">Isi</th>
                <th width="15%">Unit</th>
                <th width="10%">Update</th>
                <th width="5%">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($berita as $item)
            <tr>
                <td class="text-center">{{ $no }}</td>
                </td>
                <td class="text-center">
                    <?php if($item->gambar != "") { ?>
                        <img src="{{ asset('upload/berita/'.$item->gambar) }}" class="img img-fluid img-thumbnail">
                    <?php }else{ echo '<small class="btn btn-sm btn-warning">Tidak ada</small>'; } ?>
                </td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->isi }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->tanggal_update }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ asset('berita/edit/'.$item->id_berita) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ asset('berita/delete/'.$item->id_berita) }}" class="btn btn-danger btn-sm delete-link">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @php $no++; @endphp
            @endforeach
        </tbody>
    </table>
</div>



