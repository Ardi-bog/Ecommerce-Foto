<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
 <!-- Css Styles -->
 <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
 <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
 <link rel="stylesheet" href="assets/css/themify-icons.css" type="text/css">
 <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
 <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
 <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
 <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
 <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
 <link rel="stylesheet" href="assets/css/style.css" type="text/css">
 <!-- Js Plugins -->
 <script src="assets/js/jquery-3.3.1.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
 <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/js/jquery.countdown.min.js"></script>
 <script src="assets/js/jquery.nice-select.min.js"></script>
 <script src="assets/js/jquery.zoom.min.js"></script>
 <script src="assets/js/jquery.dd.min.js"></script>
 <script src="assets/js/jquery.slicknav.js"></script>
 <script src="assets/js/owl.carousel.min.js"></script>
 <script src="assets/js/main.js"></script>
</style>
<body>
@include('header')

@yield('content')


<footer class="footer-section">
  <div class="container">
      <div class="row">
          <div class="col-lg-3">
              <div class="footer-left">
                  <div class="footer-logo">
                      <a href="#">FOTOMEDIA</a>
                  </div>
                  <ul>
                      <li>Address: Jl.Lucari Kebonsari, Tumpang, Malang</li>
                      <li>Phone: +6282231375373</li>
                      <li>Email: fotomedia@gmail.com</li>
                  </ul>
                  <div class="footer-social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-instagram"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-lg-2 offset-lg-1">
              <div class="footer-widget">
                  <h5>Information</h5>
                  <ul>
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Checkout</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="#">Serivius</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-2">
              <div class="footer-widget">
                  <h5>My Account</h5>
                  <ul>
                      <li><a href="#">My Account</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="#">Shopping Cart</a></li>
                      <li><a href="#">Shop</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="newslatter-item">
                  <h5>Join Our Newsletter Now</h5>
                  <p>Get E-mail updates about our latest shop and special offers.</p>
                  <form action="#" class="subscribe-form">
                      <input type="text" placeholder="Enter Your Mail" />
                      <button type="button">Subscribe</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <div class="copyright-reserved">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="copyright-text">
                    Copyright &copy;2021 All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://therichpost.com" target="_blank">FOTOMEDIA</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</footer>
</body>
</html>
