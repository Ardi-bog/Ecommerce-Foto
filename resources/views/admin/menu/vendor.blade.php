@extends('admin.layout')

@section('content')

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Vendor</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div style="float:right;">
                                <button data-bs-toggle="modal" data-bs-target="#tambahVendor" class="btn btn-primary">Tambah</button>
                            </div>
                            <table class="datatables display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Vendor</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendor as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_vendor }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        @if ($item->like == 0)
                                            <td> Belum Terkonfirmasi </td>   
                                        @else
                                            <td>Sudah Terkonfirmasi</td>
                                        @endif
                                  
                                        <td>
                                            <button style='width:120px;' onclick="editVendor({{ $item->id }})" class="btn btn-primary btn-sm" id="btn-edit{{ $item->id }}">Edit</button>
                                            <form action="{{ url('/admin/vendor/hapus') }}" method="post" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button style='width:120px;' onclick="return confirm('Yakin ingin menghapus vendor?')" type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
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
<div class="modal fade" id="tambahVendor" tabindex="-1" aria-labelledby="tambahVendorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahVendorLabel">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/vendor/tambah') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" id="inputUsername" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="inputNama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="inputNama" name="nama_vendor" required>
                            </div>
                            <div class="form-group">
                                <label for="inputKategori" class="form-label">Kategori</label>
                                <select name="id_kategori" id="inputKategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAlamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="inputAlamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="inputFb" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="inputFb" name="facebook" >
                            </div>
                            <div class="form-group">
                                <label for="inputJenis" class="form-label">Jenis</label>
                                <select name="jenis_vendor" class="form-control" id="inputJenis">
                                    <option value="1">Free</option>
                                    <option value="2">Premium</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="inputAsal" class="form-label">Asal</label>
                                <input type="text" class="form-control" id="inputAsal" name="asal" required>
                            </div>
                            <div class="form-group">
                                <label for="inputHarga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="inputHarga" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="inputTelp" class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" id="inputTelp" name="no_telp" required>
                            </div>
                            <div class="form-group">
                                <label for="inputIg" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="inputIg" name="instagram" >
                            </div>
                            <div class="form-group">
                                <label for="inputFoto" class="form-label">Foto</label>
                                <input type="file" class="form-control" accept="image/jpg,image/jpeg,image/png" id="inputFoto" name="foto" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPaket" class="form-label">Deskripsi</label>
                            <textarea name="paket" class="summernote" id="inputPaket" required></textarea>
                        </div>
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
<div class="modal fade" id="editVendor" tabindex="-1" aria-labelledby="editVendorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVendorLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" action="{{ url('/admin/vendor/edit') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" id="editId" name="id" required>
                            <div class="form-group">
                                <label for="editUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" id="editUsername" disabled>
                            </div>
                            <div class="form-group">
                                <label for="editNama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="editNama" name="nama_vendor" required>
                            </div>
                            <div class="form-group">
                                <label for="editKategori" class="form-label">Kategori</label>
                                <select name="id_kategori" id="editKategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editStatus" class="form-label">Status</label>
                                <select name="status" id="editStatus" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    <option value="0">Belum Terkonfirmasi</option>
                                    <option value="1">Sudah Terkonfirmasi</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editKategori" class="form-label">Kategori</label>
                                <select name="id_kategori" id="editKategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editAlamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="editAlamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="editFb" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="editFb" name="facebook" >
                            </div>
                            <div class="form-group">
                                <label for="editJenis" class="form-label">Jenis</label>
                                <select name="jenis_vendor" class="form-control" id="editJenis">
                                    <option value="1">Free</option>
                                    <option value="2">Premium</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editAsal" class="form-label">Asal</label>
                                <input type="text" class="form-control" id="editAsal" name="asal" required>
                            </div>
                            <div class="form-group">
                                <label for="editHarga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="editHarga" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="editTelp" class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" id="editTelp" name="no_telp" required>
                            </div>
                            <div class="form-group">
                                <label for="editIg" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="editIg" name="instagram" >
                            </div>
                            <div class="form-group">
                                <label for="editFoto" class="form-label">Foto</label>
                                <input type="file" class="form-control" accept="image/jpg,image/jpeg,image/png" id="editFoto" name="foto" >
                                <a href="" id="lihatFoto" target="_blank" class="btn btn-succes">Lihat Foto</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPaket" class="form-label">Deskripsi</label>
                            <textarea name="paket" class="summernote" id="editPaket" required></textarea>
                        </div>
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



<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            tabsize: 2
        });
    });
    function editVendor(id){
        $.ajax({
            url: "{{ url('/admin/vendor/detail') }}/"+id,
            type: 'GET',
            dataType: 'json',
            beforeSend:function () {
                $('#btn-edit'+id).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`).attr('disabled',true);
            },
            success: function(response){
                $('#editUsername').val(response.username);
                $('#editHarga').val(response.harga);
                $('#editAsal').val(response.asal);
                $('#editNama').val(response.nama_vendor);
                $('#editAlamat').val(response.alamat);
                $('#editTelp').val(response.no_telp);
                $('#editFb').val(response.facebook);
                $('#editIg').val(response.instagram);
                $('#editPaket').summernote('code', response.paket);
                $("#editKategori option").removeAttr('selected');
                $(`#editKategori option[value='${response.id_kategori}']`).attr('selected',true);
                $("#editStatus option").removeAttr('selected');
                $(`#editStatus option[value='${response.like}']`).attr('selected',true);
                $("#editJenis option").removeAttr('selected');
                $(`#editJenis option[value='${response.jenis_vendor}']`).attr('selected',true);
                $('#lihatFoto').attr('href', "{{ url('/foto_vendor') }}/"+response.foto);
                $('#editId').val(response.id);
                $('#editVendor').modal('show');
                $('#btn-edit'+id).html('Edit').attr('disabled',false);
            }
        });
    }
</script>
@endsection