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
        <form action="{{ url('buletin') }}" method="get">
        <div class="input-group">
            <input type="text" name="keywords" class="form-control" placeholder="Cari berita..." value="{{ request('keywords') }}">
            <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-flat">
                    <i class="fa fa-search"></i> Cari
                </button>
                <a href="{{ url('buletin/tambah') }}" class="btn btn-success">
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
            <th width="15%">Judul</th>
            <th width="10%">Edisi</th>
            <th width="25%">Isi</th>
            <th width="10%">Unit</th>
            <th width="10%">Link Buletin</th>
            <th width="10%">Update</th>
            <th width="5%">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach($buletin as $buletin)
        <tr>
            <td class="text-center">{{ $no }}</td>
            <td class="text-center">
                @if($buletin->gambar)
                    <img src="{{ asset('upload/buletin/'.$buletin->gambar) }}" class="img img-fluid img-thumbnail" alt="Gambar {{ $buletin->judul }}" style="max-width: 100px;">
                @else
                    <span class="badge badge-warning">Tidak ada</span>
                @endif
            </td>
            <td>{{ $buletin->judul }}</td>
            <td>{{ $buletin->edisi }}</td>
            <td>{{ Str::limit($buletin->isi, 1000) }}</td> {{-- Isi berita dipotong jika terlalu panjang --}}
            <td>{{ $buletin->unit ? $buletin->unit->nama : 'Tidak ada unit' }}</td>
            <td>{{ $buletin->link_buletin }}</td>
            <td>{{ $buletin->tanggal_update ?? '-' }}</td> {{-- Gunakan tanda '-' jika null --}}
            <td>
                <div class="btn-group">
                    <a href="{{ url('buletin/edit/'.$buletin->id_buletin) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target={{"#exampleModal" . $buletin->id_buletin}}>
                    <i class="fa fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id={{"exampleModal" . $buletin->id_buletin}} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    Data Yang di Hapus Tidak Dapat Dikembalikan!!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="{{ route('buletin.delete', $buletin->id_buletin) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus Data</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
                </div>
            </td>
        </tr>
        @php $no++; @endphp
        @endforeach
    </tbody>
</table>
</div>



