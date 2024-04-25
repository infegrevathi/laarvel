      <header class="header-area transparent-bar section-padding-1">
        <div class="container-fluid fixed-top" style="background-color:#fff;">
          <div class="header-large-device">
            <div class="header-top header-top-ptb-1 border-bottom-1">
              <div class="row">
                <div class="col-xl-5 col-lg-5">
                  <div class="header-offer-wrap">
                    {{-- <i class="icon-screen-smartphone"></i><a href="tel:+917092957279" >+91 7092957279</a></li> --}}
                  
                  </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                  <div class="header-top-right">
                    <div class="same-style-wrap">
                      <div class="same-style same-style-border track-order">
                        <a href="">Track Your Order</a>
                      </div>
                    </div>
                    <div class="social-style-1 social-style-1-mrg">
                      <a  href="" target="_blank">
                        <i class="icon-social-twitter"></i>
                      </a>
                      <a href="" target="_blank">
                        <i class="icon-social-facebook"></i>
                      </a>
                      <a  href="" target="_blank"> 
                        <i class="icon-social-instagram"></i>
                      </a>
                      <a href="" target="_blank">
                        <i class="icon-social-youtube"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="header-bottom">
              <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2">
                  <div class="logo">
                    <a href="/">
                      <img src="{{ asset('frontend/assets/images/logo/logo.png')}}" alt="logo">
                    </a>
                  </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                  <div class="main-menu main-menu-padding-1 main-menu-lh-1">
                    <nav>
                      <ul>
                        <li>
                          <a href="/">Home</a>
                        </li>
                        <li>
                          <a href="">Shop</a>
                        </li>
                    
                        <li><a>Categories</a>
                          <ul class="sub-menu-style">
                            
                          </ul>
                      </li>
                        <li>
                          <a href="">Nithitex's Offers</a>
                        </li>
                        <li>
                          <a href="">Be a Reseller</a>
                        </li>
                        <li>
                          <a href="">About us</a>
                        </li>
                        <li>
                          <a href="">Contact us</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-3">
                  <div class="header-action header-action-flex header-action-mrg-right">
                    <div class="same-style-2 header-search-1">
                      <a class="search-toggle" >
                        <i class="icon-magnifier s-open"></i>
                        <i class="icon_close s-close"></i>
                      </a>
                      <div class="search-wrap-1">
                        <form action="" method="GET">
                          @csrf
                          <input placeholder="Search products…" type="text" id="search" name="search" autocomplete="off">
                          <button type="submit" class="button-search">
                            <i class="icon-magnifier"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                    <div class="same-style-2">
                      @auth
                      <a href="{{route('dashboard')}}">
                        <i class="icon-user"></i>
                      </a>
                      @else
                      <a href="{{route('login')}}">
                        <i class="icon-user"></i>
                      </a>
                      @endauth
                    </div>
                    {{-- @php 
                    $wishlist = App\Models\wishlist::where('user_id',auth()->user()->id)->get()->count();
                    @endphp  --}}
                    <div class="same-style-2">
                      {{-- @auth --}}
                      <a href="">
                        <i class="icon-heart"></i>
                        <span class="pro-count red" id="wishlist_count" value=""></span>
                      </a>
                      {{-- @else --}}
                      {{-- <a href="{{route('login')}}">
                        <i class="icon-heart"></i>
                        <span class="pro-count red" id="wishlist_count" value=""></span>
                      </a> --}}
                      {{-- @endauth --}}
                    </div>
                    <div class="same-style-2 header-cart">
                      <a class="cart-active">
                        <i class="icon-basket-loaded"></i>
                        <span class="pro-count red" id="cartQty" value=""></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="header-small-device small-device-ptb-1">
            <div class="row align-items-center">
              <div class="col-5">
                <div class="mobile-logo">
                  <a>
                    <img alt="" src="{{ asset('frontend/assets/images/logo/logo.png')}}">
                  </a>
                </div>
              </div>
              <div class="col-7">
                <div class="header-action header-action-flex">
                  <div class="same-style-2">
                    <a>
                      <i class="icon-user"></i>
                    </a>
                  </div>
                  <div class="same-style-2">
                    <a>
                      <i class="icon-heart"></i>
                      <span class="pro-count red">03</span>
                    </a>
                  </div>
                  <div class="same-style-2 header-cart">
                    <a class="cart-active">
                      <i class="icon-basket-loaded"></i>
                      <span class="pro-count red">02</span>
                    </a>
                  </div>
                  <div class="same-style-2 main-menu-icon">
                    <a class="mobile-header-button-active">
                      <i class="icon-menu"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- mini cart start -->
      <div class="sidebar-cart-active">
        <div class="sidebar-cart-all">
          <a class="cart-close">
            <i class="icon_close"></i>
          </a>
          <div class="cart-content">
            <h3>Shopping Cart</h3>
            <ul>
              <div id="miniCart">

              </div>
             
              
            </ul>
            <div class="cart-total">
              <h4>Subtotal: ₹<span id="cartSubTotal"></span>
              </h4>
            </div>
            <div class="cart-checkout-btn">
              <a class="btn-hover cart-btn-style" href="">view cart</a>
              <a class="no-mrg btn-hover cart-btn-style" href="">checkout</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Mobile menu start -->
      <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="clickalbe-sidebar-wrap">
          <a class="sidebar-close">
            <i class="icon_close"></i>
          </a>
          <div class="mobile-header-content-area">
            <div class="header-offer-wrap mobile-header-padding-border-4">
              <p>
                <i class="icon-paper-plane"></i> FREE SHIPPING for all orders over <span>₹ 2000</span>
              </p>
            </div>
            <div class="mobile-search mobile-header-padding-border-1">
              <form class="search-form" action="#">
                <input type="text" placeholder="Search here…">
                <button class="button-search">
                  <i class="icon-magnifier"></i>
                </button>
              </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-padding-border-2">
              <!-- mobile menu start -->
              <nav>
                <ul class="mobile-menu">
                  <li class="menu-item-has-children">
                    <a>Home</a>
                  </li>
                  <li class="menu-item-has-children ">
                    <a href="shop.html">shop</a>
                  </li>
                  <li><a>Categories</a>
                    <ul class="sub-menu-style">
                        <li><a href="shop.html">Kottanji Cotton</a></li>
                        <li><a href="shop.html">Bridal Saree</a></li>
                        <li><a href="shop.html">Wedding Saree</a></li>
                        <li><a href="shop.html">High Quality</a></li>
                        <li><a href="shop.html">Most Collection</a></li>
                        <li><a href="shop.html">Festival Collection</a></li>
                        <li><a href="shop.html">Less than 549</a></li>
                        <li><a href="shop.html">Less than 999</a></li>
                    </ul>
                </li>
                  <li>
                    <a href="about-us.html">About us</a>
                  </li>
                  <li>
                    <a href="contact.html">Contact us</a>
                  </li>
                </ul>
              </nav>
              <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-padding-border-3">
              <div class="single-mobile-header-info">
                <a href="">
                  <i class="lastudioicon-pin-3-2"></i> Track Your Order </a>
              </div>
            </div>
            <div class="mobile-contact-info mobile-header-padding-border-4">
              <ul>
                <li>
                  <i class="icon-phone "></i>  +91 7092957279
                </li>
                <li>
                  <i class="icon-envelope-open "></i> nithitexsaree@gmail.com
                </li>
                <li>
                  <i class="icon-home"></i> 41/11.2, Gurunahar swami kovil street,
                  Nearby Saravana Balaji Hospital, Elampillai, Tamil Nadu - 637 502.
                </li>
              </ul>
            </div>
            <div class="mobile-social-icon">
              <a class="facebook" >
                <i class="icon-social-facebook"></i>
              </a>
              <a class="twitter" >
                <i class="icon-social-twitter"></i>
              </a>
              <a class="instagram" >
                <i class="icon-social-instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>