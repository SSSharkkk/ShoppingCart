@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Danh Sách Bình Luận</h5>
          </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên người bình luận</th>
                <th scope="col">Nơi bình luận</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Kích Hoạt</th>
                <th scope="col">Chỉnh Sửa</th>         
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $comment)
   
              
              <tr>
                <th scope="row"></th>
                <td>{{$comment->name}}</td>
                <td>{{$comment->product_slug}}</td>
                <td>
                  {{$comment->content}}
                  <div class="form-gruop">
                    <form action="{{URL::to('/reply-comment')}}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="reply" value="{{$comment->id}}">
                       <div>
                        <label for="" class="link-info">
                           Phản hồi
                           <br>
                           @php
                               $stt = 1;
                           @endphp
                           @foreach ($reply as $item=>$rep)
                               @if ($rep->reply == $comment->id)
                                 {{$stt++}} :  {{$rep->content}} <br>
                               @else
                                   
                               @endif
                           @endforeach
                        </label>
                        <input type="text" class="form-control" name="content">
                       </div>
                       <button class="btn btn-success">Phản hồi</button>
                    </form>
                  </div>
                </td>
                <td >
                  <select class="status form-control" name="status" id="{{$comment->id}}">
                      @if ($comment->status == 2)
                      <option value="2">Không Kích Hoạt</option>
                      <option value="1">Kích Hoạt</option>
                      @else
                      <option value="1">Kích Hoạt</option>
                      <option value="2">Không Kích Hoạt</option>   
                      @endif
                      
                  </select>
              </td>
              <form action="{{URL::to('/delete-comment/'.$comment->id)}}" method="get">
                {{ csrf_field() }}
<!-- diary -->
    <div>
      <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
      <input type="hidden" name="name" id="name" value="{{Auth::user()->name}}" >
      <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa xóa 1 bình luận  .">
    </div>
 <!-- diary -->
                <td>
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
                  url:"{{url('/update-status-comment')}}",
                  method:"GET",
                  data:{status:status, id:id},
                  success:function() {
                    swal("Thay đổi trạng thái thành công!", "cảm ơn bạn!", "success");
                  }
              })
          })  
     </script>

@endsection