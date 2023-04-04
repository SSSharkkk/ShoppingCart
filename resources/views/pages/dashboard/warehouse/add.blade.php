@extends('home')
@section('form-layout')
<h4 class="link-success">Thêm Kho Hàng</h4>

 <form action="{{route('warehouse.store')}}" method="POST" id="form" enctype="multipart/form-data"> 
  {{ csrf_field() }}
 <!-- diary -->
 <div>
  <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
  <input type="hidden" name="name" id="name_user" value="{{Auth::user()->name}}" >
  <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa Thêm 1 Kho hàng .">
</div>
<!-- diary -->
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Tên Kho Hàng</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="slug" name="product_name" onkeyup="ChangeToSlug()">
      </div>
    </div>
    

      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Số Lượng Sản Phẩm</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="product_quantity" name="product_quantity">
        </div>
      </div>


    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Mô Tả Kho Hàng</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="product_desc" name="product_desc">
      </div>
    </div>

    
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Kích Hoạt</label>
      <div class="col-sm-10">
        <select class="form-select" aria-label="Default select example" id="product_status" name="product_status">
          <option value="1">Kích Hoạt</option>
          <option value="2">Không Kích Hoạt</option>
        </select>
      </div>
    </div>


    <div class="text-center">
      <button type="submit" id="submit" class="btn btn-primary">Thêm</button>
      <a href="{{route('warehouse.index')}}" class="btn btn-success">Danh Sách</a>
    </div>
  </form>

<script>
$('#form').on('click','#submit', function() {
  var name = $('#category_name').val()
  var desc  = $('#category_desc').val()
  var status = $('#category_status').val()

  $.ajax({
    url: '/add-danh-muc',
    method : 'get',
    
    data : {
       category_name : name,
       category_desc : desc,
       category_status : status,
    }
  })
})
</script>


<script type="text/javascript">
 
  function ChangeToSlug()
      {

          var slug;
       
          //Lấy text từ thẻ input title 
          slug = document.getElementById("slug").value;
          slug = slug.toLowerCase();
          //Đổi ký tự có dấu thành không dấu
              slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
              slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
              slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
              slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
              slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
              slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
              slug = slug.replace(/đ/gi, 'd');
              //Xóa các ký tự đặt biệt
              slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
              //Đổi khoảng trắng thành ký tự gạch ngang
              slug = slug.replace(/ /gi, "-");
              //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
              //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
              slug = slug.replace(/\-\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-/gi, '-');
              slug = slug.replace(/\-\-/gi, '-');
              //Xóa các ký tự gạch ngang ở đầu và cuối
              slug = '@' + slug + '@';
              slug = slug.replace(/\@\-|\-\@|\@/gi, '');
              //In slug ra textbox có id “slug”
          document.getElementById('convert_slug').value = slug;
      }

  </script>
@endsection