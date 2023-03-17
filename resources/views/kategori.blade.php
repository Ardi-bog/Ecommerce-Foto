@extends('layout')

@section('content')

@php
    // Ambil id kategori dari URL
    $id = request()->segment(count(request()->segments()));

    // Ambil data kategori dari database berdasarkan id
    $kategori = DB::table('kategori')->where(['id' => $id, 'hapus' => 0])->first();

    // Ambil data vendor dari database yang terkait dengan kategori yang dipilih
    $vendor = DB::table('vendor')->where(['id_kategori' => $id, 'hapus' => 0])->get();
@endphp

<section class="women-banner spad">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3">
              <div class="product-large set-bg" data-setbg="{{asset('/')}}assets/img/women-large.jpg">
                  <h2>{{$kategori->nama_kategori}}</h2>
                  <a href="#">Discover More</a>
              </div>
          </div>
          <div class="col-lg-8 offset-lg-1">
              <div class="filter-control">
                  <ul>
                      <!-- <li class="active">Clothings</li> -->
                      <li class="active">{{$kategori->nama_kategori}}</li>
                    
                  </ul>
              </div>
              <div class="product-slider owl-carousel">
              @foreach ($vendor as $data)
                  <div class="product-item">
                      <div class="pi-pic">
                          <img src="{{ asset('foto_vendor/'.$data->foto) }}" alt="" />
                          <div class="icon">
                              <!-- <i class="icon_heart_alt"></i> -->
                          </div>
                          <ul>
                              <!-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> -->
                              <li class="quick-view"><a href="{{url('/detail/'.$data->id)}}">+ Quick View</a></li>
                              <!-- <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                          </ul>
                      </div>
                      <div class="pi-text">
                          <div class="catagory-name"></div>
                          <a href="#">
                              <h5>{{$data->nama_vendor}}</h5>
                          </a>
                          <div class="product-price">
                          </div>
                      </div>
                  </div>
                  @endforeach
                  
                  
              </div>
          </div>
      </div>
  </div>
</section>

@endsection
