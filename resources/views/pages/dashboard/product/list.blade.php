@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Danh Sách Sản Phẩm</h5>
            <a href="{{route('product.create')}}"><h5 class="card-title link-success" style="margin-left:150px;">Thêm Sản Phẩm</h5></a>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Tên URL</th>
                <th scope="col">Giá Sản Phẩm</th>
                <th scope="col">Mô Tả Sản Phẩm</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Danh Mục</th>
                <th scope="col">Kích Hoạt</th>
                <th scope="col">Chỉnh Sửa</th>         
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $pro)
              <tr>
                <th scope="row"></th>
                <td>{{$pro->product_name}}</td>
                <td>{{$pro->product_slug}}</td>
                <td>{{number_format($pro->product_price)}}đ</td>

                <td>{{$pro->product_desc}}</td>
                <td><img src="{{asset('images/uploads/'.$pro->product_images)}}" width="100" height="100" alt=""></td>
              
                <td>
                    <select class="category form-control" name="category_id" id="{{$pro->id}}">
                       @foreach ($category as $item => $cate)
                       @if ($cate->id == $pro->category_id)
                       <option selected value="{{$cate->id}}">{{$cate->category_name}}</option>
                       @else
                       <option  value="{{$cate->id}}">{{$cate->category_name}}</option>   
                       @endif
                       @endforeach
                    </select>
                </td>

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
              <form action="{{route('product.destroy',$pro->id)}}" method="post">
                @csrf
                @method('delete')
   <!-- diary -->
    <div>
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
        <input type="hidden" name="name" id="name" value="{{Auth::user()->name}}" >
        <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa xóa 1 Sản phẩm  .">
    </div>
   <!-- diary -->
                <td>
                    <a href="{{route('product.edit',$pro->id)}}" class="btn btn-warning">Sửa</a>
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
                var product_status = $(this).find(':selected').val();
                var id = $(this).attr('id');

                $.ajax({
                    url:"/update-status-up",
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
          url:"{{url('/update-category-product')}}",
          method:"GET",
          data:{category_id:category_id, id:id},
          success:function() {
            swal("Đổi Danh Mục Thành Công!", "Cảm ơn bạn", "success");
          }
      })
  })  
</script>


@endsection