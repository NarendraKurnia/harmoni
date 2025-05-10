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
        <form action="{{ url('youtube') }}" method="get">
        <div class="input-group">
            <input type="text" name="keywords" class="form-control" placeholder="Cari berita..." value="{{ request('keywords') }}">
            <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-flat">
                    <i class="fa fa-search"></i> Cari
                </button>
                <a href="{{ url('youtube/tambah') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tambah Baru
                </a>
            </span>
        </div>
    </form>
    </div>
    
    <div class="col-md-6">
    {{ $youtube->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    </div>
</div>

<hr>

<div class="table-responsive mailbox-messages mt-1">        
<table class="table table-sm table-hover" id="example2">
    <thead>
        <tr class="text-left bg-light">
            <th width="5%" class="text-center">NO</th>
            <th width="15%">Judul</th>
            <th width="25%">Isi</th>
            <th width="15%">Unit</th>
            <th width="20%">Link Youtube</th>
            <th width="15%">Update</th>
            <th width="5%">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $no = ($youtube->currentPage() - 1) * $youtube->perPage() + 1; @endphp
        @foreach($youtube as $youtube)
        <tr>
            <td class="text-center">{{ $no }}</td>
            <td>{{ $youtube->judul }}</td>
            <td>{{ Str::limit($youtube->isi, 1000) }}</td> 
            <td>{{ $youtube->unit ? $youtube->unit->nama : 'Tidak ada unit' }}</td>
            <td>{{ $youtube->link_youtube }}</td>
            <td>{{ $youtube->tanggal_update ?? '-' }}</td> 
            <td>
                <div class="btn-group">
                    <a href="{{ url('youtube/edit/'.$youtube->id_youtube) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target={{"#exampleModal" . $youtube->id_youtube}}>
                    <i class="fa fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id={{"exampleModal" . $youtube->id_youtube}} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form action="{{ route('youtube.delete', $youtube->id_youtube) }}" method="POST">
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



