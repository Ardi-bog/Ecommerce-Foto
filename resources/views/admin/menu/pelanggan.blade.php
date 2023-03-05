@extends('layout')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data User</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div style="float:right;">
                                <button data-bs-toggle="modal" data-bs-target="#tambahPelanggan" class="btn btn-primary">Tambah</button>
                            </div>
                            <table class="datatables display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            @if($item->role_id==1)
                                                Admin
                                            @elseif($item->role_id==2)
                                                Pencatat Meter Air
                                            @elseif($item->role_id==3)
                                                Kasir
                                            @elseif($item->role_id==4)
                                                Pelanggan
                                            @endif
                                        </td>
                                        <td>{{ $item->status == 1 ? 'Aktif' : 'Non Aktif' }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                            <button style='width:120px;' onclick="editPelanggan({{ $item->id }})" class="btn btn-primary btn-sm" id="btn-edit{{ $item->id }}">Edit</button><br><br>
                                            <form action="./pelanggan/nonaktif/{{ $item->id }}" method="post" style="display:inline;">
                                                @csrf
                                                <button style='width:120px;' onclick="return confirm('Yakin ingin menonaktifkan user?')" type="submit" class="btn btn-danger btn-sm">Non Aktifkan</button>
                                            </form>
                                            @else
                                            <form action="./pelanggan/aktif/{{ $item->id }}" method="post" style="display:inline;">
                                                @csrf
                                                <button style='width:120px;' onclick="return confirm('Yakin ingin mengaktifkan user?')" type="submit" class="btn btn-success btn-sm">Aktifkan</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" aria-labelledby="tambahPelangganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelangganLabel">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./pelanggan/tambah" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                      <label for="sel-role">Role</label>
                      <select style="width:100%;" class="form-control" name="role_id" id="sel-role" onchange="roleselect()">
                        <option value="1">Admin</option>
                        <option value="2">Pencatat Meter Air</option>
                        <option value="3">Kasir</option>
                        <option value="4">Pelanggan</option>
                      </select>
                    </div>
                    <div id="wrapper-other">
                        <div class="form-group">
                            <label for="inputPelanggan" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="inputPelanggan" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group" id="wrapper-pelanggan" style="display: none">
                        <label for="inputPelanggan" class="form-label">No Pelanggan</label>
                        <input type="text" class="form-control" id="inputPelanggan" value="{{ $last_id->username+1 }} " disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="inputNoTelp" class="form-label">No Telp</label>
                        <input type="text" class="form-control" id="inputNoTelp" name="no_telp" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="inputAlamat" name="alamat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editPelanggan" tabindex="-1" aria-labelledby="editPelangganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPelangganLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" action="./pelanggan/edit" method="post">
                <div class="modal-body">
                    @csrf
                    <div id="wrapper-modal-edit"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function roleselect() {
        role_id = $('#sel-role').val();
        if (role_id==4) {
            $('#wrapper-pelanggan').fadeIn();
            $('#wrapper-other').fadeOut();
        }else{
            $('#wrapper-other').fadeIn();
            $('#wrapper-pelanggan').fadeOut();
        }
    }
    function roleselectedit() {
        role_id = $('#sel-role-edit').val();
        if (role_id==4) {
            $('#wrapper-pelanggan-edit').fadeIn();
            $('#wrapper-other-edit').fadeOut();
        }else{
            $('#wrapper-other-edit').fadeIn();
            $('#wrapper-pelanggan-edit').fadeOut();
        }
    }
    function editPelanggan(id){
        $.ajax({
            url: './pelanggan/edit/'+id,
            type: 'GET',
            beforeSend:function () {
                $('#btn-edit'+id).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`).attr('disabled',true);
                $('#wrapper-modal-edit').html(`<center><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</center>`);
            },
            success: function(response){
                $('#wrapper-modal-edit').html(response);
                $('#editPelanggan').modal('show');
                $('#btn-edit'+id).html('Edit').attr('disabled',false);
            }
        });
    }
</script>
@endsection