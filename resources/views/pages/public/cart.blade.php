@extends('welcome')
@section('content')
<form action="{{URL::to('/check-out')}}" method="post">
     <!--================Cart Area =================-->
     {{ csrf_field() }}
     <section class="cart_area">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sản Phẩm</th>
                    <th scope="col">Giá Tiền</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng</th>
                    <th scope="col">Tùy Chỉnh</th>
                  </tr>
                </thead>
                <tbody>
            @foreach (Cart::content() as $item => $cart)
                
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img
                        src="{{asset('images/uploads/'.$cart->options->image)}}"
                        alt=""
                        width="100" height="100"
                      />
                    </div>
                    <div class="media-body">
                      <p>{{$cart->name}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>{{number_format($cart->price)}} đ</h5>
                </td>
                <td>
                  <div class="product_count">
                    <form>
                      <meta name="csrf-token" content="{{ csrf_token() }}">
                      <input type="hidden"  class="cart_name_{{$cart->rowId}}" value="{{$cart->name}}">
                      <input type="hidden"  class="cart_rowId" value="{{$cart->rowId}}">
 
                      <input
                        type="text"
                        name="qty"
                        id="sst"
                        maxlength="12"
                        value="{{$cart->qty}}"
                        title="Số Lượng:"
                        class="input-text cart_qty_{{$cart->rowId}}"
                      />
   
                    <input type="hidden"  class="cart_qty_same_{{$cart->rowId}}" value="{{$cart->options->qty_same}}">
                  
     
                    {{-- <input type="hidden" name="cart_qty" value="{{$cart->qty}}"> --}}
                    <button type="button" class="btn btn-success update-cart" data-id_cart="{{$cart->rowId}}">Cập Nhập</button>
                    </form>
                    <button
                      onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                      class="increase items-count"
                      type="button"
    
                    >
                      <i class="lnr lnr-chevron-up"></i>
                    </button>
                    <button
                      onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                      class="reduced items-count"
                      type="button"
                    >
                      <i class="lnr lnr-chevron-down"></i>
                    </button>
                  </div>
                </td>
                <td>
                  @php
                      $subtotal = $cart->price * $cart->qty;
                  @endphp
                    <h5>{{number_format($subtotal)}} đ</h5>
                </td>
                <td>
                  <button type="button" class="btn btn-danger delete-cart" data-id_cart="{{$cart->rowId}}">Xóa</button>
  
                </td>
              </tr>


             {{-- @if (Cart::)
                 
             @endif --}}
          
              @endforeach
              
              
              <tr class="bottom_button">
                <td>
                  
                </td>
                <td></td>
                <td></td>
                <td>
                  {{-- <div class="cupon_text">
                    <input type="text" placeholder="Coupon Code" />
                    <a class="main_btn" href="#">Apply</a>
                    <a class="gray_btn" href="#">Close Coupon</a>
                  </div> --}}
                </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Tổng</h5>
                    </td>
                    <td>
                      <h5>{{Cart::subtotal()}}</h5>
                    </td>
                  </tr>
                  <tr class="shipping_area">
                   @if (isset(Auth::user()->id))
                   {{-- @foreach ($qty as $item=>$quanty) 
                       <h1>{{$quanty->product_quantity}}</h1>
                   @endforeach --}}
                   <td>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Họ và Tên</label>
                        <input type="text" class="form-control" data-validation="length" data-validation-length="min3" data-validation-error-msg="vui lòng nhập tên" name="name" id="inputPassword4" value="{{Auth::user()->name}}" placeholder="Password">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập email" name="email" id="inputEmail4" value="{{Auth::user()->email}}" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Số Điện Thoại</label>
                      <input type="text" data-validation="length" data-validation-length="min8" data-validation-error-msg="vui lòng nhập số điện thoại đầy đủ" class="form-control" name="phone" id="inputAddress" placeholder="0869041145">
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Địa Chỉ</label>
                      <input type="text" class="form-control" data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập địa chỉ" name="address" id="inputAddress2" placeholder="03 Nguyễn Tất Thành / Đà Nẵng...">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputCity">Ghi Chú : </label>
                        <textarea class="form-control" name="note" id="" cols="30" rows="10" placeholder="Yêu cầu hàng gửi nhanh..."></textarea>
                      </div>
                  </td>
                   @else
                   <td>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Họ và Tên</label>
                        <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Hãy điền ít nhất 3 ký tự" class="form-control" name="name" id="inputPassword4"  placeholder="Password">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="email" id="inputEmail4"  placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Số Điện Thoại</label>
                      <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Hãy điền ít nhất 3 ký tự" class="form-control" name="phone" id="inputAddress" placeholder="0869041145">
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Địa Chỉ</label>
                      <input type="text" class="form-control" data-validation="length" data-validation-length="min3" data-validation-error-msg="Hãy điền ít nhất 3 ký tự" name="address" id="inputAddress2" placeholder="03 Nguyễn Tất Thành / Đà Nẵng...">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputCity">Ghi Chú : </label>
                        <textarea class="form-control" name="note" id="" cols="30" rows="10" placeholder="Yêu cầu hàng gửi nhanh..."></textarea>
                      </div>
                  </td>
                   @endif
                    

                    <td></td>
                    <td>
                      <h5>Shipping</h5>
                    </td>
                    <td>
                      <div class="shipping_box">
                        <ul class="list">
                          <li>
                            <a href="#">Flat Rate: $5.00</a>
                          </li>
                          <li>
                            <a href="#">Free Shipping</a>
                          </li>
                          <li>
                            <a href="#">Flat Rate: $10.00</a>
                          </li>
                          <li class="active">
                            <a href="#">Local Delivery: $2.00</a>
                          </li>
                        </ul>
                        <h6>
                          Calculate Shipping
                          <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </h6>
                        <select class="shipping_select">
                          <option value="1">Bangladesh</option>
                          <option value="2">India</option>
                          <option value="4">Pakistan</option>
                        </select>
                        <select class="shipping_select">
                          <option value="1">Select a State</option>
                          <option value="2">Select a State</option>
                          <option value="4">Select a State</option>
                        </select>
                        <input type="text" name="voucher" placeholder="Mã giảm giá" />
                        <a class="gray_btn" href="#">Update Details</a>
                      </div>
                    </td>
                  </tr>
                  <tr class="out_button_area">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <div class="checkout_btn_inner">
                        <a class="gray_btn" href="{{URL::to('/')}}">Tiếp Tục Mua Sắm</a>
                       <button class="main_btn"> Thanh Toán</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </form>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.update-cart').click(function() {
        var _token = $('input[name="_token"]').val();
        var rowId = $(this).data('id_cart');
        var cart_qty = $('.cart_qty_'+rowId).val();
        var cart_qty_same = $('.cart_qty_same_'+rowId).val();
        
          if (parseInt(cart_qty) <= parseInt(cart_qty_same)) {
            $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/update-cart',
            method : 'post',
            data : {
              rowId:rowId,
              cart_qty:cart_qty,
            },
            
            success:function(){
              swal("Cập Nhập Thành Công!", "Cảm ơn quý khách!", "success");
            }
          })
        } else {
          

          swal("Số Lượng  vượt quá mức của chúng tôi!", "Cảm ơn quý khách!", "warning");
          }
        })
      })
      
  
      
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.delete-cart').click(function() {
      var rowId = $(this).data('id_cart');
      
      $.ajax({
        url: '/remove-cart/',
        method: 'get',
        data : {
          rowId:rowId,
        },
        success:function(){
          
          swal("Xóa Thành Công!", "Cảm ơn quý khách!", "success");
        }
        
      })
    })
  })
  
  
</script>
<!--================End Cart Area =================-->
@endsection