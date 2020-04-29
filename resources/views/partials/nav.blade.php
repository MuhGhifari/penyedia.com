<!-- Header Section Begin -->
  <header class="header">
    
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="header__logo">
            <a href="{{ route('home') }}" style="font-family: 'Cairo', sans-serif; font-size: 2em; text-decoration: none; color: black;">Penyedia.com</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="header__menu">
            <ul>
              <li class="{{ Request::routeIs('home*') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
              <li class="{{ Request::routeIs('shop*') ? 'active' : '' }}"><a href="{{ route('shop.index') }}">Shop</a></li>
              <!-- <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                  <li><a href="./shop-details.html">Shop Details</a></li>
                  <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                  <li><a href="./checkout.html">Check Out</a></li>
                  <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
              </li> -->
              <li class="#"><a href="./blog.html">About Us</a></li>
              <li class="#"><a href="./contact.html">Contact</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3 col-md-3 pt-3">
          <div class="header__top__right">
            <div class="header__top__right__social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
              <a href="#"><i class="fa fa-pinterest-p"></i></a>
            </div>
            @if(Route::has('login'))
              @auth
              <div class="header__top__right__language">
                <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
              </div>
              @else
              <div class="header__top__right__auth">
                <a href="{{ route('login') }}"> Login</a>
              </div>
                @if(Route::has('register'))
                 |
                <div class="header__top__right__auth">
                  <a href="{{ route('register') }}"> Register</a>
                </div>  
                @endif
              @endauth
            @endif
          </div>
        </div>
      </div>
      <div class="humberger__open">
        <i class="fa fa-bars"></i>
      </div>
    </div>
  </header>
  <!-- Header Section End -->