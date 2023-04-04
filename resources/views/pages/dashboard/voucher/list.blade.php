@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Danh Sách mã giảm giá</h5>
            <a href="{{route('voucher.create')}}"><h5 class="card-title link-success" style="margin-left:150px;">Thêm Mã Giảm Giá</h5></a>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên mã giảm giá</th>
                <th scope="col">Mã giảm giá</th>
                <th scope="col">Số tiền</th>
                <th scope="col">Phương thức</th>
                <th scope="col">Kích Hoạt</th>
                <th scope="col">Chỉnh Sửa</th>         
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $voucher)
   
              
              <tr>
                <th scope="row"></th>
                <td>{{$voucher->name}}</td>
                <td>{{$voucher->coder}}</td>
                @if ($voucher->percent == 2)
                <td>{{number_format($voucher->value)}} %</td>
                @else
                <td>{{number_format($voucher->value)}} đ</td>   
                @endif
                <td >
                  <select class="percent form-control" name="percent" id="{{$voucher->id}}">
                      @if ($voucher->percent == 2)
                      <option value="2">Giảm giá theo phần trăm ( % )</option>
                      <option value="1">Giảm giá theo tiền</option>
                      @else
                      <option value="1">Giảm giá theo tiền</option>
                      <option value="2">Giảm giá theo phần trăm ( % )</option>
                      @endif
                  </select>
              </td>
                <td >
                  <select class="status form-control" name="status" id="{{$voucher->id}}">
                      @if ($voucher->status == 2)
                      <option value="2">Không Kích Hoạt</option>
                      <option value="1">Kích Hoạt</option>
                      @else
                      <option value="1">Kích Hoạt</option>
                      <option value="2">Không Kích Hoạt</option>   
                      @endif
                  </select>
              </td>
              <form action="{{route('voucher.destroy',$voucher->id)}}" method="post">
               @csrf
               @method('delete')
<!-- diary -->
    <div>
      <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
      <input type="hidden" name="name" id="name" value="{{Auth::user()->name}}" >
      <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa xóa 1 mã giảm giá  .">
    </div>
 <!-- diary -->
                <td>
                    <a href="{{route('voucher.edit',$voucher->id)}}" class="btn btn-warning">Sửa</a>
                    <button class="btn btn-danger">Xóa</button>
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
              var status = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-voucher')}}",
                  method:"GET",
                  data:{status:status, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
     </script>


<script type="text/javascript">
  $('.percent').change(function(){
      var percent = $(this).find(':selected').val();
      var id = $(this).attr('id');

      $.ajax({
          url:"{{url('/update-percent')}}",
          method:"GET",
          data:{percent:percent, id:id},
          success:function() {
            swal("Đổi Phương thức Thành Công!", "Cảm ơn bạn", "success");
          }
      })
  })  
</script>

@endsection