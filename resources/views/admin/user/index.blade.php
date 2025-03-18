@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- <p>
  @include('admin/user/tambah')
</p> -->
<form action="{{ asset('admin/user/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">


  <div class="col-md-12">
    <div class="btn-group"> 
        <a href="{{ asset('user/tambah') }}" style="color: white;">
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah User
        </a>
    </div>
</div>
</div>
<table class="table mt-3 table-sm table-bordered">
<thead>
    <tr class="bg-info">
        <th class="text-center">NO</th>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>USERNAME</th>
        <th>LEVEL</th>
        <th>ACTION</th>
    </tr>
</thead>
<tbody>

    <?php $no=1; foreach($user as $user) { ?>

    <tr>
        <td class="text-center"><?php echo $no ?></td>
        <td><?php echo $user->nama ?></td>
        <td><?php echo $user->email ?></td>
        <td><?php echo $user->username ?></td>
        <td><?php echo $user->akses_level ?></td>
        <td>
            <div class="btn-group">
            <a href="{{ asset('user/edit/'.$user->id_user) }}" 
            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

            <a href="{{ asset('user/delete/'.$user->id_user) }}" 
            class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i>
            </a>
        </div>
        </td>
    </tr>
<?php $no++; } ?>
</table>