@extends('layout')

@section('content')

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
                  <div class="product-item">
                      <div class="pi-pic">
                          <img src="assets/img/women-1.jpg" alt="" />
                          <div class="sale">Sale</div>
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
                          <div class="catagory-name">Coat</div>
                          <a href="#">
                              <h5>Pure Pineapple</h5>
                          </a>
                          <div class="product-price">
                              $14.00
                              <span>$35.00</span>
                          </div>
                      </div>
                  </div>
                  <div class="product-item">
                      <div class="pi-pic">
                          <img src="assets/img/women-2.jpg" alt="" />
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
                          <div class="catagory-name">Shoes</div>
                          <a href="#">
                              <h5>Guangzhou sweater</h5>
                          </a>
                          <div class="product-price">
                              $13.00
                          </div>
                      </div>
                  </div>
                  <div class="product-item">
                      <div class="pi-pic">
                          <img src="assets/img/women-3.jpg" alt="" />
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
                          <div class="catagory-name">Towel</div>
                          <a href="#">
                              <h5>Pure Pineapple</h5>
                          </a>
                          <div class="product-price">
                              $34.00
                          </div>
                      </div>
                  </div>
                  <div class="product-item">
                      <div class="pi-pic">
                          <img src="assets/img/women-4.jpg" alt="" />
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
                          <div class="catagory-name">Towel</div>
                          <a href="#">
                              <h5>Converse Shoes</h5>
                          </a>
                          <div class="product-price">
                              $34.00
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>



@endsection