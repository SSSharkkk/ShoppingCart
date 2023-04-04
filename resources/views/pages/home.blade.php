@extends('welcome')
@section('content')

<!--================Home Banner Area =================-->
<section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-12">
            <p class="sub text-uppercase">men Collection</p>
            <h3><span>Show</span> Your <br />Personal <span>Style</span></h3>
            <h4>Fowl saw dry which a above together place.</h4>
            <a class="main_btn mt-40" href="#">View Collection</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!-- Start feature Area -->
  <section class="feature-area section_gap_bottom_custom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-money"></i>
              <h3>Money back gurantee</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-truck"></i>
              <h3>Free Delivery</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-support"></i>
              <h3>Alway support</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-blockchain"></i>
              <h3>Secure payment</h3>
            </a>
            <p>Shall open divide a one</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End feature Area -->

  <!--================ Feature Product Area =================-->
  <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Sản Phẩm Mới</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>
 <div class="row">
 @foreach ($product as $item=>$pro)
 <div class="col-lg-4 col-md-6">
   <div class="single-product">
     <div class="product-img">
       @if (isset(Auth::user()->id))
       <form>
        <meta name="csrf-token" content="{{ csrf_token() }}">
       <input type="hidden" name="user_id" class="user_id"  value="{{Auth::user()->id}}">
       <input type="hidden" name="cart_id" class="cart_id_{{$pro->id}}" value="{{$pro->id}}">
       <input type="hidden" name="cart_image" class="cart_image_{{$pro->id}}" value="{{$pro->product_images}}">
       <input type="hidden" name="cart_name" class="cart_name_{{$pro->id}}" value="{{$pro->product_name}}">
       <input type="hidden" name="cart_price" class="cart_price_{{$pro->id}}" value="{{$pro->product_price}}">
       <input type="hidden" class="cart_qty_{{$pro->id}}"  value="1" >
       <input type="hidden" class="cart_qty_same_{{$pro->id}}" value="{{$pro->warehouse->product_quantity}}">
       <input type="hidden" class="cart_warehouse_{{$pro->id}}" value="{{$pro->warehouse->id}}">

       <img class="img-fluid w-100" src="{{asset('images/uploads/'.$pro->product_images)}}"  alt="" />
       <div class="p_icon">
         <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_slug)}}">
           <i class="ti-eye"></i>
         </a>
         <a href="#">
           <i class="ti-heart"></i>
         </a>
      
           <button type="button"  class="add-to-cart" name="add-to-cart"  data-id_cart="{{$pro->id}}"><i class="ti-shopping-cart"></i></button>
       
       </div>
     </div>
     <div class="product-btm">
       <a href="#" class="d-block">
         <h4>{{$pro->product_name}}</h4>
       </a>
       <div class="mt-3">
         <span class="mr-4">{{number_format($pro->product_price)}} đ</span>
         <del>{{number_format($pro->product_price)}} đ</del>
       </div>
     </form>
       @else
       <form action="" method="post">
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <input type="hidden" name="user_id" class="user_id"  value="1">
       <input type="hidden" name="cart_id" class="cart_id_{{$pro->id}}" value="{{$pro->id}}">
       <input type="hidden" name="cart_image" class="cart_image_{{$pro->id}}" value="{{$pro->warehouse->product_images}}">
       <input type="hidden" name="cart_name" class="cart_name_{{$pro->id}}" value="{{$pro->product_name}}">
       <input type="hidden" name="cart_price" class="cart_price_{{$pro->id}}" value="{{$pro->product_price}}">
       <input type="hidden"  class="cart_quantity" class="cart_qty_{{$pro->id}}" value="1" >
       <input type="hidden" class="cart_qty_same_{{$pro->id}}" value="{{$pro->warehouse->product_quantity}}">
       <input type="hidden" class="cart_warehouse_{{$pro->id}}" value="{{$pro->warehouse->id}}">


       <img class="img-fluid w-100" src="{{asset('images/uploads/'.$pro->product_images)}}"  alt="" />
       <div class="p_icon">
         <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_slug)}}">
           <i class="ti-eye"></i>
         </a>
         <a href="#">
           <i class="ti-heart"></i>
         </a>
      
           <button type="button"  class="add-to-cart" name="add-to-cart" data-id_cart="{{$pro->id}}" ><i class="ti-shopping-cart"></i></button>
       
       </div>
     </div>
     <div class="product-btm">
       <a href="#" class="d-block">
         <h4>{{$pro->product_name}}</h4>
       </a>
       <div class="mt-3">
         <span class="mr-4">{{number_format($pro->product_price)}} đ</span>
         <del>{{number_format($pro->product_price)}} đ</del>
       </div>
     </form>
       @endif
      </div>
    </div>
  </div>
 @endforeach
 
      </div>
    </div>
  </section>
  <!--================ End Feature Product Area =================-->

  <!--================ Offer Area =================-->
  <section class="offer_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="offset-lg-4 col-lg-6 text-center">
          <div class="offer_content">
            <h3 class="text-uppercase mb-40">all men’s collection</h3>
            <h2 class="text-uppercase">50% off</h2>
            <a href="#" class="main_btn mb-20 mt-5">Discover Now</a>
            <p>Limited Time Offer</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Offer Area =================-->

  <!--================ New Product Area =================-->
  <section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>new products</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="new_product">
            <h5 class="text-uppercase">collection of 2019</h5>
            <h3 class="text-uppercase">Men’s summer t-shirt</h3>
            <div class="product-img">
              <img class="img-fluid" src="{{asset('front-end/image/new-product1.png')}}" alt="" />
            </div>
            <h4>$120.70</h4>
            <a href="#" class="main_btn">Add to cart</a>
          </div>
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="{{asset('front-end/image/n1.jpg')}}" alt="" />
                  <div class="p_icon">
                    <a href="#">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-heart"></i>
                    </a>
                    <a href="#">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>Nike latest sneaker</h4>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">$25.00</span>
                    <del>$35.00</del>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="{{asset('front-end/image/n2.jpg')}}" alt="" />
                  <div class="p_icon">
                    <a href="#">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-heart"></i>
                    </a>
                    <a href="#">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>Men’s denim jeans</h4>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">$25.00</span>
                    <del>$35.00</del>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="{{asset('front-end/image/n3.jpg')}}" alt="" />
                  <div class="p_icon">
                    <a href="#">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-heart"></i>
                    </a>
                    <a href="#">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>quartz hand watch</h4>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">$25.00</span>
                    <del>$35.00</del>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="{{asset('front-end/image/n4.jpg')}}" alt="" />
                  <div class="p_icon">
                    <a href="#">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="#">
                      <i class="ti-heart"></i>
                    </a>
                    <a href="#">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>adidas sport shoe</h4>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">$25.00</span>
                    <del>$35.00</del>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End New Product Area =================-->

  <!--================ Inspired Product Area =================-->
  <section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Inspired products</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="{{asset('front-end/image/i1.jpg')}}" alt="" />
              <div class="p_icon">
                <a href="#">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>Latest men’s sneaker</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$25.00</span>
                <del>$35.00</del>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="{{asset('front-end/image/i2.jpg')}}" alt="" />
              <div class="p_icon">
                <a href="#">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>Latest men’s sneaker</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$25.00</span>
                <del>$35.00</del>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="{{asset('front-end/image/i3.jpg')}}" alt="" />
              <div class="p_icon">
                <a href="#">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>Latest men’s sneaker</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$25.00</span>
                <del>$35.00</del>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="{{asset('front-end/image/i4.jpg')}}" alt="" />
              <div class="p_icon">
                <a href="#">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>Latest men’s sneaker</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$25.00</span>
                <del>$35.00</del>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="{{asset('front-end/image/i5.jpg')}}" alt="" />
              <div class="p_icon">
                <a href="#">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>Latest men’s sneaker</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$25.00</span>
                <del>$35.00</del>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="{{asset('front-end/image/i6.jpg')}}" alt="" />
              <div class="p_icon">
                <a href="#">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>Latest men’s sneaker</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$25.00</span>
                <del>$35.00</del>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="{{asset('front-end/image/i7.jpg')}}" alt="" />
              <div class="p_icon">
                <a href="#">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>Latest men’s sneaker</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$25.00</span>
                <del>$35.00</del>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="{{asset('front-end/image/i8.jpg')}}" alt="" />
              <div class="p_icon">
                <a href="#">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>Latest men’s sneaker</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$25.00</span>
                <del>$35.00</del>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Inspired Product Area =================-->

  <!--================ Start Blog Area =================-->
  <section class="blog-area section-gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>latest blog</span></h2>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="single-blog">
            <div class="thumb">
              <img class="img-fluid" src="{{asset('front-end/image/b1.jpg')}}" alt="">
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
                <a href="#">By Admin</a>
                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
              </div>
              <a class="d-block" href="single-blog.html">
                <h4>Ford clever bed stops your sleeping
                  partner hogging the whole</h4>
              </a>
              <div class="text-wrap">
                <p>
                  Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                  Forth.
                </p>
              </div>
              <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6">
          <div class="single-blog">
            <div class="thumb">
              <img class="img-fluid" src="{{asset('front-end/image/b2.jpg')}}" alt="">
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
                <a href="#">By Admin</a>
                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
              </div>
              <a class="d-block" href="single-blog.html">
                <h4>Ford clever bed stops your sleeping
                  partner hogging the whole</h4>
              </a>
              <div class="text-wrap">
                <p>
                  Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                  Forth.
                </p>
              </div>
              <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single-blog">
            <div class="thumb">
              <img class="img-fluid" src="{{asset('front-end/image/b3.jpg')}}" alt="">
            </div>
            <div class="short_details">
              <div class="meta-top d-flex">
                <a href="#">By Admin</a>
                <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
              </div>
              <a class="d-block" href="single-blog.html">
                <h4>Ford clever bed stops your sleeping
                  partner hogging the whole</h4>
              </a>
              <div class="text-wrap">
                <p>
                  Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
                  Forth.
                </p>
              </div>
              <a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Blog Area =================-->
  <script type="text/javascript">
    $(document).ready(function() {
      $('.add-to-cart').click(function(){
        var cart_id = $(this).data('id_cart');
        var user_id = $('.user_id').val();
        var cart_name = $('.cart_name_' + cart_id).val();
        var cart_price = $('.cart_price_' + cart_id).val();
        var cart_qty = $('.cart_qty_' + cart_id).val();
        var cart_qty_same = $('.cart_qty_same_' + cart_id).val();
        var cart_image = $('.cart_image_' + cart_id).val();
        var cart_warehouse = $('.cart_warehouse_' + cart_id).val();

        $.ajax({
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/add-cart',
          method: 'post',
          data: {
            cart_id:cart_id,
            user_id:user_id,
            cart_name:cart_name,
            cart_price:cart_price,
            cart_qty:cart_qty,
            cart_image:cart_image,
            cart_qty_same:cart_qty_same,
            cart_warehouse:cart_warehouse,
          },
          success:function() {
            swal("Mua Hàng Thành Công!", "Đã Thêm Vào Giỏ Hàng!", "success");
          }
        }) 

        
       
      })
    })
  </script>
@endsection