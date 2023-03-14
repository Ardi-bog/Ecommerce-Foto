@extends('vendor.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="page-description d-flex align-items-center">
            <div class="page-description-content flex-grow-1">
                <h1>Detail</h1>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ url('/vendor/ubahDetail') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <legend>Vendor</legend>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group mb-2">
                                    <label class="mb-2" for="password">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{  $vendor->nama_vendor }}" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-2" for="password">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="{{ $vendor->alamat }}" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-2" for="password">Harga</label>
                                    <input type="text" class="form-control" name="harga" value="{{ $vendor->harga }}" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-2" for="password">Deskripsi</label>
                                    <textarea class="form-control summernote" name="deskripsi" required>{{   $vendor->paket }}</textarea>
                                </div>  
                                <div class="form-group mb-2">
                                    <label class="mb-2" for="password">Kategori</label>
                                    <select name="id_kategori" id="inputKategori" class="form-control" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $vendor->id_kategori ? 'selected' : ''  }}>{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-2" for="password">Asal</label>
                                    <input type="text" class="form-control" name="asal" value="{{  $vendor->asal }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="mb-2">Foto</label>
                                <input type="file" name="foto" class="form-control" accept="image/jpg,image/jpeg,image/png">
                                <span style="color:red;">Note : Ukuran file max 1Mb</span>
                                <br>
                                @if($vendor->foto != null)
                                    <img src="{{ asset('foto_vendor/'.$vendor->foto) }}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('/foto_vendor/no-image.jpeg') }}" class="img-fluid" alt="">
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Social Media</legend>
                        <hr>
                        <div class="form-group mb-2">
                            <label class="mb-2" for="password">Whatsapp</label>
                            <input type="text" class="form-control" name="no_telp" value="{{  $vendor->no_telp }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2" for="password">Facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{  $vendor->facebook }}">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-2" for="password">Instagram</label>
                            <input type="text" class="form-control" name="instagram" value="{{  $vendor->instagram }}">
                        </div>
                    </fieldset>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <fieldset>
                    <legend>
                        Slider
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSlider" style="float:right;">Tambah Slider</button>
                    </legend>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Slider</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($slider) == 0)
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada slider</td>
                            </tr>
                            @endif

                            @foreach ($slider as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <button class="btn btn-success" onclick="lihatSlider('{{ $item->slider }}')">{{ $item->slider }}</button>
                                </td>
                                <td>
                                    <form action="{{ url('vendor/hapusSlider') }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus slider ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="tambahSlider"  style="z-index:99999999 !important;margin-top:150px;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form action="{{ url('/vendor/uploadSlider') }}" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        @csrf
                        <label for="">Slider</label>
                        <input type="file" class="form-control" name="slider" accept="image/jpg,image/jpeg,image/png" required>
                        <span style="color:red;">Note : Ukuran file max 1Mb</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSlider"  style="z-index:99999999 !important;margin-top:150px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" alt="" id="slider-modal" class='img-fluid'> 
            </div>
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
function lihatSlider(slider){
    $('#slider-modal').attr('src', '{{ asset('foto_vendor/slider') }}/'+slider);
    $('#modalSlider').modal('show');
}
</script>

@endsection