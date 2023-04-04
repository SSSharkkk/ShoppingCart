@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Danh Sách Đơn Hàng</h5>
            <a href="{{URL::to('/them-danh-muc')}}"><h5 class="card-title link-success" style="margin-left:150px;">Thêm Đơn Hàng</h5></a>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Mã Đơn hàng</th>
                <th scope="col">Trạng thái đơn hàng</th>
                <th scope="col">Thanh toán</th>
                <th scope="col">Ngày và giờ đặt hàng</th>
                <th scope="col">Chỉnh Sửa</th>         
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $order)
              <tr>
                <th scope="row"></th>
                {{-- <td>{{$order->category_name}}</td> --}}
                <td>{{$order->order_coder}}</td>
                {{-- <td>{{$order->category_desc}}</td> --}}
                <td class="form-control">
                  <select class="status form-control" name="order_status" id="{{$order->id}}">
                  
                  @if ($order->order_status == 1)
                  <option selected value="5">Đã Hủy</option>
                  <option selected value="4">Thành Công</option>
                  <option selected value="3">Đang Giao</option>
                  <option selected value="2">Chuẩn Bị Hàng</option>
                  <option selected value="1">Đơn Hàng Mới</option>

                  @elseif($order->order_status == 2)

                  <option selected value="5">Đã Hủy</option>
                  <option selected value="3">Đang Giao</option>
                  <option selected value="4">Thành Công</option>
                  <option selected value="1">Đơn Hàng Mới</option>
                  <option selected value="2">Chuẩn Bị Hàng</option>

                  @elseif($order->order_status == 3)

                  <option selected value="5">Đã Hủy</option>
                  <option selected value="4">Thành Công</option>
                  <option selected value="1">Đơn Hàng Mới</option>
                  <option selected value="2">Chuẩn Bị Hàng</option>
                  <option selected value="3">Đang Giao</option>

                  @elseif($order->order_status == 4)

                  <option selected value="5">Đã Hủy</option>
                  <option selected value="1">Đơn Hàng Mới</option>
                  <option selected value="2">Chuẩn Bị Hàng</option>
                  <option selected value="3">Đang Giao</option>
                  <option selected value="4">Thành Công</option>

                  
                  @elseif($order->order_status == 5)

                  <option selected value="1">Đơn Hàng Mới</option>
                  <option selected value="2">Chuẩn Bị Hàng</option>
                  <option selected value="3">Đang Giao</option>
                  <option selected value="4">Thành Công</option>
                  <option selected value="5">Đã Hủy</option>
                      
                  @endif

                
                      
                  </select>
              </td>
              <td >
                <select class="payment_status form-control" name="payment_status" id="{{$order->id}}">
                   @if ($order->payment_status == 1)
                   <option value="1">Đã Thanh Toán</option>
                   <option value="2">Chưa Thanh Toán</option>
                   @else
                   <option value="2">Chưa Thanh Toán</option>
                   <option value="1">Đã Thanh Toán</option>
                   @endif
                </select>
              </td>
              <td>
                {{$order->order_datetime}}
              </td>
              <form action="{{URL::to('/delete-order/'.$order->order_coder)}}" method="get">
 <!-- diary -->
    <div>
      <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
      <input type="hidden" name="name" id="name_user" value="{{Auth::user()->name}}" >
      <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa xóa 1 đơn hàng  .">
    </div>
<!-- diary -->
                <td>
                    <a href="{{URL::to('/chi-tiet-don-hang/'.$order->order_coder)}}" class="btn btn-warning">Xem</a>
                    <button  class="btn btn-danger">Xóa</button>
                </td>
              </tr>
            </form>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
  
        </div>


        <script type="text/javascript">
          $('.status').change(function(){
              var order_status = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-don-hang')}}",
                  method:"GET",
                  data:{order_status:order_status, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
     </script>



<script type="text/javascript">
  $('.payment_status').change(function(){
      var payment_status = $(this).find(':selected').val();
      var id = $(this).attr('id');

      $.ajax({
          url:"{{url('/update-payment')}}",
          method:"GET",
          data:{payment_status:payment_status, id:id},
          success:function() {
            swal("Đổi Phương Thức Thành Công!", "Cảm ơn bạn", "success");
          }
      })
  })  
</script>

@endsection