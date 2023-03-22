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
                        <a href="{{url('/detail/'.$prm->id)}}" class="primary-btn">Lihat</a>
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
<section class="women-banner spad">
  <div class="filter-control">
    <ul>
      <li class="active">All Vendor</li>
    </ul>
  </div>
  <div class="container-fluid">
    <div class="row">
      @foreach ($vendor as $data)
        <div class="col-lg-4">
          <div class="card p-3" style="height: 400px; display: flex; flex-direction: column; justify-content: space-between;">
            <div style="height: 150px; overflow: hidden;">
              <img src="{{ asset('foto_vendor/'.$data->foto) }}" style="object-fit: cover; height: 100%;width:100%;">
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
              <span>{{$data->nama_vendor}}</span>
              <div class="colors">
              </div>
            </div>
            <p>{{ substr($data->paket, 0, 100) }}{{ strlen($data->paket) > 100 ? "..." : "" }}</p>
            <p>{{$data->alamat}}</p>
            <p><b>Rp.{{$data->harga}}</b></p>
            <a href="{{url('/detail/'.$data->id)}}" class="primary-btn"style="text-align:center;">Lihat</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
