@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Danh Sách Kho Hàng</h5>
            <a href="{{route('warehouse.create')}}"><h5 class="card-title link-success" style="margin-left:150px;">Thêm Kho Hàng</h5></a>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Mô Tả Sản Phẩm</th>
                <th scope="col">Kích Hoạt</th>
                <th scope="col">Chỉnh Sửa</th>         
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $pro)
              <tr>
                <th scope="row"></th>
                <td>{{$pro->product_name}}</td>
                <td>{{$pro->product_quantity}}</td>
                <td>{{$pro->product_desc}}</td>  

                <td >
                  <select class="status form-control" name="product_status" id="{{$pro->id}}">
                      @if ($pro->product_status == 2)
                      <option value="2">Không Kích Hoạt</option>
                      <option value="1">Kích Hoạt</option>
                      @else
                      <option value="1">Kích Hoạt</option>
                      <option value="2">Không Kích Hoạt</option>   
                      @endif
                      
                  </select>
              </td>
              <form action="{{route('warehouse.destroy',$pro->id)}}" method="post">
              @csrf
              @method('delete')
<!-- diary -->
    <div>
      <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
      <input type="hidden" name="name" id="name_user" value="{{Auth::user()->name}}" >
      <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa xóa 1 kho hàng  .">
    </div>
<!-- diary -->
<td>
  <a href="{{route('warehouse.edit',$pro->id)}}" class="btn btn-warning">Sửa</a>
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
                var product_status = $(this).find(':selected').val();
                var id = $(this).attr('id');

                $.ajax({
                    url:"/update-status-warehouse-up",
                    method:"get",
                    data:{product_status:product_status, id:id},
                    success:function() {
                      swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                    }
                })
            })  
</script>


<script type="text/javascript">
  $('.category').change(function(){
      var category_id = $(this).find(':selected').val();
      var id = $(this).attr('id');

      $.ajax({
          url:"{{url('/update-category')}}",
          method:"GET",
          data:{category_id:category_id, id:id},
          success:function() {
              alert('Cập Nhập Danh Mục Thành Công ');
          }
      })
  })  
</script>


@endsection