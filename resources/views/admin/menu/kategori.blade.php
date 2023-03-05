@extends('admin.layout')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Kategori</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div style="float:right;">
                                <button data-bs-toggle="modal" data-bs-target="#tambahKategori" class="btn btn-primary">Tambah</button>
                            </div>
                            <table class="datatables display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>
                                            <button style='width:120px;' onclick="ediKategori({{ $item->id }})" class="btn btn-primary btn-sm" id="btn-edit{{ $item->id }}">Edit</button>
                                            <form action="{{ url('/admin/kategori/hapus') }}" method="post" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button style='width:120px;' onclick="return confirm('Yakin ingin menghapus kategori?')" type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
<div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategoriLabel">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/kategori/tambah') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="inputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama_kategori" required>
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
<div class="modal fade" id="ediKategori" tabindex="-1" aria-labelledby="ediKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ediKategoriLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" action="{{ url('/admin/kategori/edit') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="editNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editNama" name="nama_kategori" required>
                        <input type="hidden" class="form-control" id="editId" name="id" required>
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
    function ediKategori(id){
        $.ajax({
            url: "{{ url('/admin/kategori/detail') }}/"+id,
            type: 'GET',
            dataType: 'json',
            beforeSend:function () {
                $('#btn-edit'+id).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`).attr('disabled',true);
            },
            success: function(response){
                $('#editNama').val(response.nama_kategori);
                $('#editId').val(response.id);
                $('#ediKategori').modal('show');
                $('#btn-edit'+id).html('Edit').attr('disabled',false);
            }
        });
    }
</script>
@endsection