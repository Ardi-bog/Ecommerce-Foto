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
                @endif
            </div>
      </div>
  </div>
</section>

@endsection
