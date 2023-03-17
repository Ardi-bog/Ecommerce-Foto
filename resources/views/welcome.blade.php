@extends('layout')

@section('content')

@php
    $kategori = DB::table('kategori')->where(['hapus' => 0])->get();
    $vendor = DB::table('vendor')->where(['hapus' => 0])->get();
    $premium = DB::table('vendor')->where(['jenis_vendor' => 2])->get();
@endphp

<section class="hero-section">
    <div class="hero-items owl-carousel">
    @foreach ($premium as $prm)
        <div class="single-hero-items set-bg" data-setbg="{{ asset('foto_vendor/'.$prm->foto) }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>{{$prm -> username }}</span>
                        <h1 style="color:white;">{{$prm -> nama_vendor}}</h1>
                        <a href="#" class="primary-btn">Lihat</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2 style="font-size: 20px;">Premium <span style="font-size: 25px;">Vendor</span></h2>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</section>

@endsection
