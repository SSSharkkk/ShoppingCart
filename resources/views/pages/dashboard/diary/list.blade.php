@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Nhật Ký Hoạt Động</h5>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nội Dung</th> 
                <th scope="col">Thời gian</th> 
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $diary)
              <tr>
                <th scope="row"></th>
                <td>{{$diary->content}}</td>
                <td>{{$diary->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
  
        </div>


        <script type="text/javascript">
          $('.status').change(function(){
              var category_status = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-up')}}",
                  method:"GET",
                  data:{category_status:category_status, id:id},
                  success:function() {
                      alert('Kích Hoạt Thành Công');
                  }
              })
          })  
     </script>

@endsection