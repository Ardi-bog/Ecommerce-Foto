@extends('layout')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Laporan Bulanan </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form id="formFilter" action="./laporan_bulanan/table" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="inputTahun" class="form-label">Tahun</label>
                                    <select name="tahun" id="inputTahun" class="form-control">
                                        @for($tahun = date('Y');$tahun >= 2021;$tahun--)
                                            <option value="{{ $tahun }}" {{ $tahun == date('Y') ? 'selected' : '' }}>{{ $tahun }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputBulan" class="form-label">Bulan</label>
                                    <select name="bulan" id="inputBulan" class="form-control">
                                        <option value="">Semua Bulan</option>
                                        @for($bulan = 1;$bulan <= 12;$bulan++)
                                            <option value="{{ $bulan }}" >{{ getNamaBulan($bulan) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" id="buttonFilter">Lihat</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="filter-content">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#formFilter").submit(function(e){
        e.preventDefault();
        $("#buttonFilter").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`).attr('disabled',true);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            cache: false,
            success: function(msg){
                $("#buttonFilter").html('Lihat').attr('disabled',false);
                $("#filter-content").html(msg);
            }
        });
    });
</script>
@endsection