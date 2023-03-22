@extends('layout')
@php
$id = request()->segment(count(request()->segments()));
$vendor = DB::table('vendor')->where(['id' => $id, 'hapus' => 0])->first();
@endphp
@section('content')
<div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center"style="margin-top:10px;">{{$vendor->nama_vendor}}</h2>
              </div>
            </div>
          </div>

        </div>
        
        <div class="row mb-5">
          <div class="col-md-7">
            <img src="{{ asset('foto_vendor/'.$vendor->foto) }}" alt="Images" class="img-fluid">
          </div>
          <div class="col-md-4 ml-auto">
            <p>{{$vendor->paket}}</p>  
           <a href="{{url('/porto/'.$vendor->id)}}" class="primary-btn">Lihat Portofolio</a>
          </div>
          <div class="col-md-4 ml-auto">
           <a href="https://facebook.com/{{$vendor->facebook}}"><i class="fa fa-facebook"></i></a>
           <a href="https://instagram.com/{{$vendor->instagram}}"style="margin-left:-20px;"><i class="fa fa-instagram"></i></a>
          </div>
        </div>


        
      </div>
    </div>
    <div class="footer py-4">
      <div class="container-fluid text-center">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          <!-- Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a> -->
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>    
  </div>
  @endsection
