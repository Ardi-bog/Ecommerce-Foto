@extends('layout')

@section('content')

@php
    $kategori = DB::table('kategori')->where(['hapus' => 0])->get();
    $vendor = DB::table('vendor')->where(['hapus' => 0])->get();

@endphp
<section class="hero-section">
  <div class="hero-items owl-carousel">
      <div class="single-hero-items set-bg" data-setbg="assets/img/hero-1.jpg">
          <div class="container">
              <div class="row">
                  <div class="col-lg-5">
                      <span>Bag,kids</span>
                      <h1>Black friday</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                          incididunt ut labore et dolore</p>
                      <a href="#" class="primary-btn">Shop Now</a>
                  </div>
              </div>
              <div class="off-card">
                  <h2>Sale <span>50%</span></h2>
              </div>
          </div>
      </div>
      <div class="single-hero-items set-bg" data-setbg="assets/img/hero-2.jpg">
          <div class="container">
              <div class="row">
                  <div class="col-lg-5">
                      <span>Bag,kids</span>
                      <h1>Black friday</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                          incididunt ut labore et dolore</p>
                      <a href="#" class="primary-btn">Shop Now</a>
                  </div>
              </div>
              <div class="off-card">
                  <h2>Sale <span>50%</span></h2>
              </div>
          </div>
      </div>
  </div>
</section>
<section class="women-banner spad">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3">
              <div class="product-large set-bg" data-setbg="assets/img/women-large.jpg">
                  <h2>Kategori</h2>
                  <a href="#">Discover More</a>
              </div>
          </div>
          <div class="col-lg-8 offset-lg-1">
              <div class="filter-control">
                  <ul>
                    @foreach ($kategori as $item)
                      <!-- <li class="active">Clothings</li> -->
                      <li class="active">{{$item->nama_kategori}}</li>
                    @endforeach
                  </ul>
              </div>
              <div class="product-slider owl-carousel">
              @foreach ($vendor as $data)
                  <div class="product-item">
                      <div class="pi-pic">
                          <img src="{{ asset('foto_vendor/'.$data->foto) }}" alt="" />
                          <div class="icon">
                              <i class="icon_heart_alt"></i>
                          </div>
                          <ul>
                              <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                              <li class="quick-view"><a href="#">+ Quick View</a></li>
                              <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
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