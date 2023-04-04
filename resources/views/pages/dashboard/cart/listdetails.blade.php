@extends('home')
@section('form-layout')
     
        



        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Thông Tin Người Đặt</h5>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên người đặt</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ghi chú</th>  
              </tr>
            </thead>
            <tbody>
              @foreach ($list_info as $item => $order)
              <tr>
                <th scope="row"></th>

                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->note}}</td>

              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
        </div>


        <form action="{{URL::to('/update-cart-qty-warehouse')}}"  method="post">
        <div class="card-body">
            <div style="display:flex">
              <h5 class="card-title">Danh Sách Sản Phẩm</h5>
          </div>
            <!-- Table with stripped rows -->
            <table class="table table-striped">


              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên</th>
                  <th scope="col">Giá</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Hình Ảnh</th>
                </tr>
              </thead>

                {{ csrf_field() }}
              <tbody>
                @php
                 $total = 0;   
                @endphp
                @foreach ($list as $item => $order)
                <input type="hidden" name="order_coder" value="{{$order->order_coder}}">
        
                    
                @php
                    $total += ($order->product->product_price * $order->qty);
                @endphp

         
                <tr>
                  <th scope="row"></th>
                 
                  <td>{{$order->product->product_name}}</td>
                  <td>{{number_format($order->product->product_price)}} đ</td>
                  <td>{{$order->qty}}</td>
                  <td><img src="{{asset('/images/uploads/'.$order->product->product_images)}}" width="100" height="100" alt=""></td>  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        <p>Mã giảm giá : {{$order->voucher->coder}} -> Số tiền được giảm : {{$order->voucher->value}}</p>
        @if ($order->voucher->percent == 1)
        <p>Tổng Tiền Đơn Hàng : {{number_format($total - ($order->voucher->value))}}  đ</p>
        @elseif($order->voucher->percent == 2)
        @php
            $percent = ($total * $order->voucher->value )/100
        @endphp

        <p>Tổng Tiền Đơn Hàng : {{number_format($total - $percent)}} đ</p>
        @endif
        <a href="{{URL::to('/don-hang')}}" class="btn btn-info">Quay Lại</a>
        <button  class="btn btn-danger update-order" data-order="{{$order->id}}">Hủy Đơn</button>
        <a href="{{URL::to('order/export/'.$order->order_coder)}}" class="btn btn-success">Xuất file</a>


       </form>
            <!-- End Table with stripped rows -->
            <script type="text/javascript">
              $(document).ready(function(){
                $('.update-order').click(function() {
                var _token = $('input[name="_token"]').val();
                for(var = i, i < 3, i++)
                var id = $(this).data('order');
                // var cart_qty = $('.cart_qty_'+rowId).val();
                // var cart_qty_same = $('.cart_qty_same_'+rowId).val();
                
                alert(id);
        
                })
              })
              
          
              
        </script>

@endsection