<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="{{asset('front-end/image/favicon.png')}}" type="image/png" />
  <title>SharkShop</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('front-end/css/bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/themify-icons.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/flaticon.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/simpleLightbox.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/nice-select.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/jquery-ui.css')}}" />
  <!-- main css -->
  <link rel="stylesheet" href="{{asset('front-end/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('front-end/css/responsive.css')}}" />


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
  body a{
     text-decoration: none;
  }
</style>
<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="top_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Phone: +01 256 25 235</p>
              <p>email: admin@eiser.com</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="cart.html">
                    gift card
                  </a>
                </li>
                <li>
                  <a href="tracking.html">
                    track order
                  </a>
                </li>
                <li>
                  <a href="contact.html">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{URL::to('/')}}">
            <img src="{{asset('front-end/image/logo.png')}}" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{URL::to('/')}}">Home</a>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Mặt Hàng</a>
                    <ul class="dropdown-menu">
                       @foreach ($category_header as $item => $cate)
                         <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/mat-hang/'.$cate->category_slug)}}">{{$cate->category_name}}</a>
                         </li>
                       @endforeach
                    </ul>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="single-blog.html">Blog Details</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="tracking.html">Tracking</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="elements.html">Elements</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item">
                    <a href="{{URL::to('/gio-hang-cua-ban')}}" class="icons">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{'/gio-hang-cua-ban'}}" class="icons">
                      <i class="ti-shopping-cart">{{Cart::count()}}</i>
                    </a>
                  </li>
                 
                  @if (Auth::check())
                  @if (Auth::user()->admin == 1)
                  <li class="nav-item">
                  <a href="{{URL::to('/dashboard')}}" class="icons" >Admin</a>
                  </li>
                  @else
                  
                  @endif
                  <li class="nav-item">

                  <a class="icons" href="{{ route('logout') }} "
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
                  </a>
                  </li>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
                  </form>
                  @else
                      
                  <li class="nav-item">
                    <a href="{{URL::to('/login')}}" class="icons">
                      <i class="ti-user" aria-hidden="true"></i>
                    </a>
                  </li>
                  @endif
                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="icons">
                      @php
                      $alert = 0;
                      @endphp
                      @foreach ($comment as $item)
                       <input type="hidden" value="{{$alert++}}">
                      @endforeach

                      <i class="ti-bell" aria-hidden="true" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                      {{$alert}}
                      <p>
                      </p>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <!--================Header Menu Area =================-->
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      @foreach ($comment as $item =>$com)
      <a class="link-info" href="{{URL::to('chi-tiet-san-pham/'.$com->product_slug)}}">Bình luận thành công ({{$com->product->product_name}}) </a>
      @endforeach
    </div>
  </div>
  @yield('content')

  <!--================ start footer Area  =================-->
  <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Sản Phẩm TOP</h4>
          <ul>
            <li><a href="#">Managed Website</a></li>
            <li><a href="#">Manage Reputation</a></li>
            <li><a href="#">Power Tools</a></li>
            <li><a href="#">Marketing Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Danh Mục</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Tin Tức</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Địa Chỉ</h4>
          <ul>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Experts</a></li>
            <li><a href="#">Agencies</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
              method="get" class="form-inline">
              <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Your Email Address '" required="" type="email">
              <button class="click-btn btn btn-default">Subscribe</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Shark</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        <div class="col-lg-4 col-md-12 footer-social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-behance"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

  <!-- validation -->
  <script>
     $.validate({

     });
  </script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{asset('front-end/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('front-end/js/popper.js')}}"></script>
  <script src="{{asset('front-end/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('front-end/js/stellar.js')}}"></script>
  <script src="{{asset('front-end/js/simpleLightbox.min.js')}}"></script>
  <script src="{{asset('front-end/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('front-end/js/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('front-end/js/isotope-min.js')}}"></script>
  <script src="{{asset('front-end/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('front-end/js/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('front-end/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('front-end/js/jquery.counterup.js')}}"></script>
  <script src="{{asset('front-end/js/mail-script.js')}}"></script>
  <script src="{{asset('front-end/js/theme.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>