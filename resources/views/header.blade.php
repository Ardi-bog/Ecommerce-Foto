
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    fotomedia@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +6282231375373
                </div>
            </div>
            @if(!Auth::guard('user')->check())
            <div class="ht-right">
                <a href="{{ url('/register') }}" class="login-panel" style="border:0 !important;"><i class="fa fa-user"></i>Register</a>
                <a href="{{ url('/login') }}" class="login-panel" style="border:0 !important;"><i class="fa fa-user"></i>Login</a>
            </div>
            @else

            <div class="ht-right">
                <a href="{{ url('/logout') }}" class="login-panel" style="border:0 !important;">Logout</a>
                <a href="#" class="login-panel" style="border:0 !important;"><i class="fa fa-user"></i>{{ Auth::guard('user')->user()->name }}</a>
            </div>
            @endif
        </div>
    </div>
  <div class="container">
      <div class="inner-header">
          <div class="row">
              <div class="col-lg-2 col-md-2">
                  <div class="logo">
                      <a href="#">
                          FOTOMEDIA
                      </a>
                  </div>
              </div>
              <div class="col-lg-7 col-md-7">
                  <div class="advanced-search">
                      <button type="button" class="category-btn">All Categories</button>
                      <div class="input-group">
                          <input type="text" placeholder="What do you need?" />
                          <button type="button"><i class="ti-search"></i></button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="nav-item">
      <div class="container">
          <div class="nav-depart">
              <div class="depart-btn">
                  <i class="ti-menu"></i>
                  <span>All Categories</span>
                  <ul class="depart-hover">
                       @foreach ($kategori as $item)
                      <!-- <li class="active"><a href="#">Wedding</a></li> -->
                      <li><a href="#">{{$item->nama_kategori}}</a></li>
                      @endforeach
                  </ul>
              </div>
          </div>
          <nav class="nav-menu mobile-menu" hidden>
              <ul>
                  <li><a href="/blog">Blog</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">Pages</a>
                      <ul class="dropdown">
                          <li><a href="#">Blog Details</a></li>
                          <li><a href="#">Shopping Cart</a></li>
                          <li><a href="#">Checkout</a></li>
                          <li><a href="#">Faq</a></li>
                          <li><a href="#">Register</a></li>
                          <li><a href="#">Login</a></li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <div id="mobile-menu-wrap"></div>
      </div>
  </div>
    @php
        $link = request()->segment(1);
    @endphp
    @if($link != 'login' && $link != 'register')
    <div class="container">
        <div class="inner-header">
            <div class="row ">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="#">
                            FOTOMEDIA
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">All Categories</button>
                        <div class="input-group">
                            <input type="text" placeholder="What do you need?" />
                            <button type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All Categories</span>
                    <ul class="depart-hover">
                        <li class="active"><a href="#">Wedding</a></li>
                        <li><a href="#">Prewedding</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Portrait</a></li>
                        <li><a href="#">Lanscape</a></li>
                        <li><a href="#">Stage</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Sport</a></li>
                        <li><a href="#">Journalism</a></li>
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu" hidden>
                <ul>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="#">Blog Details</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
    @endif
</header>