@extends('home')
@section('form-layout')
<h4 class="link-success">Thêm mã giảm giá</h4>

 @foreach ($voucher as $item=> $vou)
 <form action="{{route('voucher.update',$vou->id)}}" id="form" method="POST" > 
     @csrf
     @method('put')
      <!-- diary -->
      <div>
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
        <input type="hidden" name="name" id="name_user" value="{{Auth::user()->name}}" >
        <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa sửa 1 một mã giảm giá .">
      </div>
      <!-- diary -->
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên mã giảm giá</label>
        <div class="col-sm-10">
          <input type="text" value="{{$vou->name}}" data-validation="length" data-validation-length="min3" data-validation-error-msg="vui lòng nhập tên " class="form-control" id="category_name" name="name" onkeyup="ChangeToSlug()">
        </div>
      </div>
  
  
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Mã giảm giá</label>
        <div class="col-sm-10">
          <input type="text" value="{{$vou->coder}}" data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập mã" class="form-control" id="category_desc" name="coder">
        </div>
      </div>
  
 
  
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Số tiền cần giảm</label>
        <div class="col-sm-10">
          <input type="text" value="{{$vou->value}}" data-validation="length" data-validation-length="min1" data-validation-error-msg="vui lòng nhập giá tiền" class="form-control" id="category_name" name="value">
        </div>
      </div>

  
      <div class="text-center">
        <button type="submit" id="submit" class="btn btn-primary">Sửa</button>
        <a href="{{URL::to('/ma-giam-gia')}}" class="btn btn-success">Danh Sách</a>
      </div>
    </form>
  
 @endforeach


@endsection