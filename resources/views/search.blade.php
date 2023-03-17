@extends('layout')

@section('content')

<section class="women-banner spad">
  <div class="container-fluid">
      <div class="row">
            <div class="col-lg-12 ">
                <div class="filter-control">
                    <ul>
                        <!-- <li class="active">Clothings</li> -->
                        <li class="active">Pencarian</li>
                        
                    </ul>
                </div>
                @if(count($vendor) == 0)
                    <center>Vendor Tidak Ditemukan</center>
                @else
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
                @endif
            </div>
      </div>
  </div>
</section>

@endsection
