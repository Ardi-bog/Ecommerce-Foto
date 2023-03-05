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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahVendorLabel">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/vendor/tambah') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
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
                        <label for="inputTelp" class="form-label">No Telp</label>
                        <input type="text" class="form-control" id="inputTelp" name="no_telp" required>
                    </div>
                    <div class="form-group">
                        <label for="inputFoto" class="form-label">Foto</label>
                        <input type="file" class="form-control" accept="image/jpg,image/jpeg,image/png" id="inputFoto" name="foto" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPaket" class="form-label">Paket</label>
                        <textarea name="paket" class="summernote" id="inputPaket" required></textarea>

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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVendorLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" action="{{ url('/admin/vendor/edit') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="editNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editNama" name="nama_vendor" required>
                        <input type="hidden" class="form-control" id="editId" name="id" required>
                    </div>

                    <div class="form-group">
                        <label for="editKategori" class="form-label">Kategori</label>
                        <select id="editKategori"  name="id_kategori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="editAlamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="inputTelp" class="form-label">No Telp</label>
                        <input type="text" class="form-control" id="editTelp" name="no_telp" required>
                    </div>
                    <div class="form-group">
                        <label for="inputFoto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="editFoto" name="foto">
                        <a href="" id="lihatFoto" target="_blank" class="btn btn-succes">Lihat Foto</a>

                    </div>
                    <div class="form-group">
                        <label for="inputPaket" class="form-label">Paket</label>
                        <textarea name="paket" id="editPaket" required></textarea>
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
                $('#editNama').val(response.nama_vendor);
                $('#editAlamat').val(response.alamat);
                $('#editTelp').val(response.no_telp);
                $('#editPaket').summernote('code', response.paket);
                $("#editKategori option").removeAttr('selected');
                $(`#editKategori option[value='${response.id_kategori}']`).attr('selected',true);
                $('#lihatFoto').attr('href', "{{ url('/foto_vendor') }}/"+response.foto);
                $('#editId').val(response.id);
                $('#editVendor').modal('show');
                $('#btn-edit'+id).html('Edit').attr('disabled',false);
            }
        });
    }
</script>
@endsection