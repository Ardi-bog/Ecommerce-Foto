@extends('layout')
@php
    // Ambil id kategori dari URL
    $id = request()->segment(count(request()->segments()));
    // Ambil data vendor dari database yang terkait dengan kategori yang dipilih
    $vendor = DB::table('vendor_slider')->where(['id_vendor' => $id])->get();
@endphp
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="{{ asset('/') }}assets-porto/css/magnific-popup.css">
  <link rel="stylesheet" href="{{ asset('/') }}assets-porto/css/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset('/') }}assets-porto/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}assets-porto/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="{{ asset('/') }}assets-porto/css/lightgallery.min.css">    

  <link rel="stylesheet" href="{{ asset('/') }}assets-porto/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="{{ asset('/') }}assets-porto/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="{{ asset('/') }}assets-porto/css/swiper.css">

  <link rel="stylesheet" href="{{ asset('/') }}assets-porto/css/aos.css">


</head>
<body>

    <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center"style="margin-top:10px;">Portofolio</h2>
              </div>
            </div>
          </div>

        </div>
        <div class="row" id="lightgallery">
        @foreach ($vendor as $data)
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="{{ asset('foto_vendor/slider/'.$data->slider) }}">
            <a href="#"><img src="{{ asset('foto_vendor/slider/'.$data->slider) }}" alt="IMage" class="img-fluid"></a>
          </div>
          @endforeach
          <!-- <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_2.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam omnis quaerat molestiae, praesentium. Ipsam, reiciendis. Aut molestiae animi earum laudantium.</p>">
            <a href="#"><img src="images/nature_small_2.jpg" alt="IMage" class="img-fluid"></a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_3.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem reiciendis, dolorum illo temporibus culpa eaque dolore rerum quod voluptate doloribus.</p>">
            <a href="#"><img src="images/nature_small_3.jpg" alt="IMage" class="img-fluid"></a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_4.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim perferendis quae iusto omnis praesentium labore tempore eligendi quo corporis sapiente.</p>">
            <a href="#"><img src="images/nature_small_4.jpg" alt="IMage" class="img-fluid"></a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_5.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, voluptatum voluptate tempore aliquam, dolorem distinctio. In quas maiores tenetur sequi.</p>">
            <a href="#"><img src="images/nature_small_5.jpg" alt="IMage" class="img-fluid"></a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_6.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum cum culpa blanditiis illum, voluptatum iusto quisquam mollitia debitis quaerat maiores?</p>">
            <a href="#"><img src="images/nature_small_6.jpg" alt="IMage" class="img-fluid"></a>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_7.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores similique impedit possimus, laboriosam enim at placeat nihil voluptatibus voluptate hic!</p>">
            <a href="#"><img src="images/nature_small_7.jpg" alt="IMage" class="img-fluid"></a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_8.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam vitae sed cum mollitia itaque soluta laboriosam eaque sit ratione, aliquid.</p>">
            <a href="#"><img src="images/nature_small_8.jpg" alt="IMage" class="img-fluid"></a>
          </div> -->
         

        </div>
      </div>
    </div>

    <div class="footer py-4">
      <div class="container-fluid text-center">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>

    

    
    
  </div>

  <script src="{{ asset('/') }}assets-porto/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/jquery-ui.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/popper.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/bootstrap.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/owl.carousel.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/jquery.countdown.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/swiper.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/aos.js"></script>

  <script src="{{ asset('/') }}assets-porto/js/picturefill.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/lightgallery-all.min.js"></script>
  <script src="{{ asset('/') }}assets-porto/js/jquery.mousewheel.min.js"></script>

  <script src="{{ asset('/') }}assets-porto/js/main.js"></script>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>

</body>
</html>
@endsection