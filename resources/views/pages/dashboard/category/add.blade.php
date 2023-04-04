@extends('home')
@section('form-layout')
<h4 class="link-success">Thêm Danh Mục</h4>

 <form action="{{route('category.store')}}" id="form" method="POST" > 
  {{ csrf_field() }}
    <!-- diary -->
    <div>
      <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
      <input type="hidden" name="name" id="name_user" value="{{Auth::user()->name}}" >
      <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa Thêm 1 danh mục  .">
    </div>
    <!-- diary -->
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Tên Danh Mục</label>
      <div class="col-sm-10">
        <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="vui lòng nhập tên danh mục" class="form-control" id="category_name" name="category_name" onkeyup="ChangeToSlug()">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Tên Danh Mục (SLUG)</label>
      <div class="col-sm-10">
        <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="vui lòng nhập tên danh mục" class="form-control" id="category_slug" name="category_slug">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Mô Tả Danh Mục</label>
      <div class="col-sm-10">
        <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập mô tả danh mục" class="form-control" id="category_desc" name="category_desc">
      </div>
    </div>
    
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Kích Hoạt</label>
      <div class="col-sm-10">
        <select class="form-select"  aria-label="Default select example" id="category_status" name="category_status">
          <option value="1">Kích Hoạt</option>
          <option value="2">Không Kích Hoạt</option>
        </select>
      </div>
    </div>

    <div class="text-center">
      <button type="submit" id="submit" class="btn btn-primary">Thêm</button>
      <a href="{{route('category.index')}}" class="btn btn-success">Danh Sách</a>
    </div>
  </form>



<script type="text/javascript">
 
  function ChangeToSlug()
      {

          var slug;
       
          //Lấy text từ thẻ input title 
          slug = document.getElementById("category_name").value;
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
          document.getElementById('category_slug').value = slug;
      }

  </script>
@endsection