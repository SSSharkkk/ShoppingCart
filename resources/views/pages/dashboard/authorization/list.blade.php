@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Danh Sách Danh Mục</h5>
            <a href="{{URL::to('/them-danh-muc')}}"><h5 class="card-title link-success" style="margin-left:150px;">Thêm Danh Mục</h5></a>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Tài Khoản</th>
                <th scope="col">Gmail</th> 
                <th scope="col">Chức Năng</th>
                <th scope="col">Quản lí</th>
                <th scope="col">Chat</th>
                <th scope="col">Admin</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $user)
              <tr>
                  <th scope="row"></th>
                  <th scope="row">{{$user->name}}</th>
                  <th scope="row">{{$user->email}}</th>
                  <th >
                    <select name="functions" id="{{$user->id}}" class="form-control functions">
                        @if ($user->function == 1)
                        <option  value="1">Kích hoạt</option>
                        <option  value="0">Tắt</option>
                        @else
                        <option  value="0">Tắt</option>
                        <option  value="1">Kích hoạt</option>
                        @endif
                    </select>
                  </th>
                  <th >
                    <select name="manager" id="{{$user->id}}"  class="form-control manager">
                        @if ($user->manager == 1)
                        <option  value="1">Kích hoạt</option>
                        <option  value="0">Tắt</option>
                        @else
                        <option  value="0">Tắt</option>
                        <option  value="1">Kích hoạt</option>
                        @endif
                    </select>
                  </th>
                  <th >
                    <select name="chat" id="{{$user->id}}"  class="form-control chat">
                        @if ($user->chat == 1)
                        <option  value="1">Kích hoạt</option>
                        <option  value="0">Tắt</option>
                        @else
                        <option  value="0">Tắt</option>
                        <option  value="1">Kích hoạt</option>
                        @endif
                    </select>
                  </th>
                  <th >
                    <select name="admin" id="{{$user->id}}"  class="form-control admin">
                        @if ($user->admin == 1)
                        <option  value="1">Admin</option>
                        <option  value="0">Khách hàng</option>
                        @else
                        <option  value="0">Khách hàng</option>
                        <option  value="1">Admin</option>
                        @endif
                    </select>
                  </th>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
  
        </div>


<script type="text/javascript">
             $('.functions').change(function(){
              var functions = $(this).find(':selected').val();
              var id = $(this).attr('id');

              $.ajax({
                  url:"{{url('/update-function')}}",
                  method:"get",
                  data:{functions:functions, id:id},
                  success:function() {
                    swal("Cập nhập quản lí chức năng thành công", "Cảm ơn bạn!", "success");
                  }
              })
          })  
</script>

<script type="text/javascript">
    $('.manager').change(function(){
     var manager = $(this).find(':selected').val();
     var id = $(this).attr('id');

     $.ajax({
         url:"{{url('/update-manager')}}",
         method:"get",
         data:{manager:manager, id:id},
         success:function() {
           swal("Cập nhập quản lí thành công", "Cảm ơn bạn!", "success");
         }
     })
 })  
</script>

<script type="text/javascript">
    $('.chat').change(function(){
     var chat = $(this).find(':selected').val();
     var id = $(this).attr('id');

     $.ajax({
         url:"{{url('/update-chat')}}",
         method:"get",
         data:{chat:chat, id:id},
         success:function() {
           swal("Cập nhập quản lí chat thành công", "Cảm ơn bạn!", "success");
         }
     })
 })  
</script>

<script type="text/javascript">
    $('.admin').change(function(){
     var admin = $(this).find(':selected').val();
     var id = $(this).attr('id');

     $.ajax({
         url:"{{url('/update-admin')}}",
         method:"get",
         data:{admin:admin, id:id},
         success:function() {
           swal("Cập nhập chức năng thành công", "Cảm ơn bạn!", "success");
         }
     })
 })  
</script>

@endsection