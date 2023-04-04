@extends('welcome')
@section('content')
<!--================Home Banner Area =================-->
@foreach ($details as $item => $pro)
<form action="{{URL::to('/add-cart')}}" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="cart_id" value="{{$pro->id}}">
	<input type="hidden" name="cart_name" value="{{$pro->product_name}}">
	<input type="hidden" name="cart_price" value="{{$pro->product_price}}">
	<input type="hidden" name="cart_qty" value="1">
	@if (Auth::check())
	<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
	@else
	<input type="hidden" name="user_id" value="">
	@endif
	<input type="hidden" name="cart_image" value="{{$pro->product_images}}">

	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
		  <div class="container">
			<div
			  class="banner_content d-md-flex justify-content-between align-items-center"
			>
			  <div class="mb-3 mb-md-0">
				<h2>{{$pro->product_name}}</h2>
				<p>Đây là sản phẩm tốt nhất từ chúng tôi</p>
			  </div>
			  <div class="page_link">
				<a href="index.html">Trang Chủ</a>
				<a href="single-product.html">{{$pro->product_name}}</a>
			  </div>
			</div>
		  </div>
		</div>
	  </section>
	  <!--================End Home Banner Area =================-->
	
	  <!--================Single Product Area =================-->
	  <div class="product_image_area">
		<div class="container">
		  <div class="row s_product_inner">
			<div class="col-lg-6">
			  <div class="s_product_img">
				<div
				  id="carouselExampleIndicators"
				  class="carousel slide"
				  data-ride="carousel"
				>
				  <ol class="carousel-indicators">
					<li
					  data-target="#carouselExampleIndicators"
					  data-slide-to="0"
					  class="active"
					>
					  <img
						src="{{asset('images/uploads/'.$pro->product_images)}}"
						alt="" 
						width="65" height="65"
					  />
					</li>
					<li
					  data-target="#carouselExampleIndicators"
					  data-slide-to="1"
					>
					  <img
						src="{{asset('images/uploads/'.$pro->product_images)}}"
						alt=""
						width="65" height="65"
					  />
					</li>
					<li
					  data-target="#carouselExampleIndicators"
					  data-slide-to="2"
					>
					  <img
						src="{{asset('images/uploads/'.$pro->product_images)}}"
						alt=""
						width="65" height="65"
					  />
					</li>
				  </ol>
				  <div class="carousel-inner">
					<div class="carousel-item active">
					  <img
						class="d-block w-100"
						src="{{asset('images/uploads/'.$pro->product_images)}} "
						alt="First slide"
						
					  />
					</div>
					<div class="carousel-item">
					  <img
						class="d-block w-100"
						src="{{asset('images/uploads/'.$pro->product_images)}} "
						alt="Second slide"
						
					  />
					</div>
					<div class="carousel-item">
					  <img
						class="d-block w-100"
						src="{{asset('images/uploads/'.$pro->product_images)}} "
						alt="Third slide"
						
					  />
					</div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-5 offset-lg-1">
			  <div class="s_product_text" id="cart">
				<h3>{{$pro->product_name}}</h3>
				<h2>{{number_format($pro->product_price)}} đ</h2>
				<ul class="list">
				  <li>
					<a class="active" href="#">
					  <span>Danh Mục</span> : {{$pro->category->category_name}}</a
					>
				  </li>
				  <li>
					<a href="#"> <span>Số Lượng</span> : Còn hàng</a>
				  </li>
				</ul>
				<p>
				  {{$pro->product_desc}}
				</p>
				<div class="product_count">
				  <input
					type="hidden"
					name="cart_quantity"
					id="sst"
					maxlength="12"
					value="1"
					title="Quantity:"
					class="input-text qty"
				  />
				  <button
					onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
					class="increase items-count"
					type="button"
				  >
					<i class="lnr lnr-chevron-up"></i>
				  </button>
				  <button
					onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
					class="reduced items-count"
					type="button"
				  >
					<i class="lnr lnr-chevron-down"></i>
				  </button>
				</div>
				<div class="card_area">
				  <button class="btn btn-danger add-to-cart">Thêm vào giỏ hàng</button>
				  <a class="icon_btn" href="#">
					<i class="lnr lnr lnr-diamond"></i>
				  </a>
				  <a class="icon_btn" href="#">
					<i class="lnr lnr lnr-heart"></i>
				  </a>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <!--================End Single Product Area =================-->
	</form>
	  <!--================Product Description Area =================-->
	  <section class="product_description_area">
		<div class="container">
		  <ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
			  <a
				class="nav-link"
				id="home-tab"
				data-toggle="tab"
				href="#home"
				role="tab"
				aria-controls="home"
				aria-selected="true"
				>Mô Tả</a
			  >
			</li>
			<li class="nav-item">
			  <a
				class="nav-link"
				id="profile-tab"
				data-toggle="tab"
				href="#profile"
				role="tab"
				aria-controls="profile"
				aria-selected="false"
				>Chi tiết của sản phẩm</a
			  >
			</li>
			<li class="nav-item">
			  <a
				class="nav-link"
				id="contact-tab"
				data-toggle="tab"
				href="#contact"
				role="tab"
				aria-controls="contact"
				aria-selected="false"
				>Bình luận</a
			  >
			</li>
			<li class="nav-item">
			  <a
				class="nav-link active"
				id="review-tab"
				data-toggle="tab"
				href="#review"
				role="tab"
				aria-controls="review"
				aria-selected="false"
				>Đánh giá</a
			  >
			</li>
		  </ul>
		  <div class="tab-content" id="myTabContent">
			<div
			  class="tab-pane fade"
			  id="home"
			  role="tabpanel"
			  aria-labelledby="home-tab"
			>
			  <p>
				{{$pro->product_desc}}
			  </p>
			</div>
			<div
			  class="tab-pane fade"
			  id="profile"
			  role="tabpanel"
			  aria-labelledby="profile-tab"
			>
			  <div class="table-responsive">
				<table class="table">
				  <tbody>
					<tr>
					  <td>
						<h5>Width</h5>
					  </td>
					  <td>
						<h5>128mm</h5>
					  </td>
					</tr>
					<tr>
					  <td>
						<h5>Height</h5>
					  </td>
					  <td>
						<h5>508mm</h5>
					  </td>
					</tr>
					<tr>
					  <td>
						<h5>Depth</h5>
					  </td>
					  <td>
						<h5>85mm</h5>
					  </td>
					</tr>
					<tr>
					  <td>
						<h5>Weight</h5>
					  </td>
					  <td>
						<h5>52gm</h5>
					  </td>
					</tr>
					<tr>
					  <td>
						<h5>Quality checking</h5>
					  </td>
					  <td>
						<h5>yes</h5>
					  </td>
					</tr>
					<tr>
					  <td>
						<h5>Freshness Duration</h5>
					  </td>
					  <td>
						<h5>03days</h5>
					  </td>
					</tr>
					<tr>
					  <td>
						<h5>When packeting</h5>
					  </td>
					  <td>
						<h5>Without touch of hand</h5>
					  </td>
					</tr>
					<tr>
					  <td>
						<h5>Each Box contains</h5>
					  </td>
					  <td>
						<h5>60pcs</h5>
					  </td>
					</tr>
				  </tbody>
				</table>
			  </div>
			</div>
			<div
			  class="tab-pane fade"
			  id="contact"
			  role="tabpanel"
			  aria-labelledby="contact-tab"
			>
			  <div class="row">
				<div class="col-lg-6">
				  <div class="comment_list">
				
	
					@foreach ($comment_show as $item=>$com)
					<div class="review_item">
						<div class="media">
						  <div class="d-flex">
							<img
							  src="{{asset('images/uploads/user.webp')}}"
							  alt=""
							  width="50" height="50"
							/>
						  </div>
						  <div class="media-body">
							<h4>{{$com->name}}</h4>
							<h5>{{$com->created_at}}</h5>
							<a class="reply_btn" href="#">Phản hồi</a>
						  </div>
						</div>
						<p>
							{{$com->content}}
						</p>
					  </div>
					  @foreach ($comment_reply as $item=>$reply)
					  @if ($reply->reply == $com->id)
					  <div class="review_item reply">
						<div class="media">
						  <div class="d-flex">
							<img
							  src="{{asset('images/uploads/admin.jpg')}}"
							  alt=""
							  width="50" height="50"
							/>
						  </div>
						  <div class="media-body">
							<h4>Phản hồi của người bán</h4>
							<h5>{{$reply->created_at}}</h5>
						  </div>
						</div>
						<p>
						   {{$reply->content}}
						</p>
					  </div>
					  @endif
					  @endforeach
					@if (Auth::check())
					@if (Auth::user()->id == $com->user_id)
					<a href="{{URL::to('/delete-public-comment/'.$com->id)}}" class="icons"   style="color: red">
					  <ion-icon name="trash-outline">

					  </ion-icon>
					</a>
					<a  data-url="{{'/update-comment/'.$com->id}}" class="update-comment"  data-bs-toggle="modal" data-bs-target="#exampleModal">
					  <ion-icon name="create-outline"></ion-icon>
					</a>
					@else
						
					@endif
					@else
						
					@endif
					@endforeach


					<!-- Button trigger modal -->


  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa bình luận</h1>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body" id="form-commnent">
		   <form action="" method="get" data-dismiss="modal">
			  <div class="form-group" id="show">
				<label for="">Nội dung</label>
				
                   <input type="text" id="content">			
			  </div>
		   </form>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
		  <button type="button" class="btn btn-primary">Lưu</button>
		</div>
	  </div>
	</div>
  </div>





				  </div>
				</div>
				<div class="col-lg-6">
				  <div class="review_box">
					<h4>Post a comment</h4>
			   @if (Auth::check())
			   <form
			   class="row contact_form"
			   action="{{URL::to('/post-comment')}}"
			   method="post"
			   id="contactForm"
			   novalidate="novalidate"
			 >

			 {{ csrf_field() }}

			 <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="hidden"
					 class="form-control"
					 name="user_id"
					 id="id"
					 placeholder="Họ và tên "
					 value="{{Auth::user()->id}}"
				 
				   />
				 </div>
			   </div>

			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="hidden"
					 class="form-control"
					 name="product_id"
					 placeholder="Họ và tên "
					 value="{{$pro->id}}"
				 
				   />
				 </div>
			   </div>

			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="hidden"
					 class="form-control"
					 name="status"
					 value="2"
				   />
				 </div>
			   </div>

			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="hidden"
					 class="form-control"
					 name="product_slug"
					 placeholder="Họ và tên "
					 value="{{$pro->product_slug}}"
				   />
				 </div>
			   </div>

			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="text"
					 class="form-control"
					 id="name"
					 name="name"
					 placeholder="Họ và tên "
					 value="{{Auth::user()->name}}"
					 data-validation="length" 
					 data-validation-length="min3" 
					 data-validation-error-msg="Vui lòng nhập họ và tên"
				   />
				 </div>
			   </div>
			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="email"
					 class="form-control"
					 id="email"
					 name="email"
					 placeholder="Email"
					 value="{{Auth::user()->email}}"
					 data-validation="length" 
					 data-validation-length="min3" 
					 data-validation-error-msg="Vui lòng nhập email"
				   />
				 </div>
			   </div>
			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="text"
					 class="form-control"
					 id="phone"
					 name="phone"
					 placeholder="Số điện thoại"
					 data-validation="length" 
					 data-validation-length="min3" 
					 data-validation-error-msg="Vui lòng nhập số điện thoại"
				   />
				 </div>
			   </div>
			   <div class="col-md-12">
				 <div class="form-group">
				   <textarea
					 class="form-control"
					 name="content"
					 id="content"
					 rows="3"
					 placeholder="Nội dung"
					 data-validation="length" 
					 data-validation-length="min3" 
					 data-validation-error-msg="Vui lòng nhập nội dung"
				   ></textarea>
				 </div>
			   </div>
			   <div class="col-md-12 text-right">
				 <button
				   type="submit"
				   value="submit"
				   class="btn submit_btn btn-success comment"
				 >
				   Bình luận
				 </button>
			   </div>
			 </form>

			   @else
			   <form
			   class="row contact_form"
			   action="{{URL::to('/post-comment')}}"
			   method="post"
			   id="contactForm"
			   novalidate="novalidate"
			 >

			 {{ csrf_field() }}

			 <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="hidden"
					 class="form-control"
					 name="user_id"
					 id="id"
					 placeholder="Họ và tên "
					 value="an"
				 
				   />
				 </div>
			   </div>

			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="hidden"
					 class="form-control"
					 name="product_id"
					 placeholder="Họ và tên "
					 value="{{$pro->id}}"
				 
				   />
				 </div>
			   </div>

			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="hidden"
					 class="form-control"
					 name="status"
					 value="2"
				   />
				 </div>
			   </div>

			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="hidden"
					 class="form-control"
					 name="product_slug"
					 placeholder="Họ và tên "
					 value="{{$pro->product_slug}}"
				   />
				 </div>
			   </div>

			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="text"
					 class="form-control"
					 id="name"
					 name="name"
					 placeholder="Họ và tên "
					 value=""
					 data-validation="length" 
					 data-validation-length="min3" 
					 data-validation-error-msg="Vui lòng nhập họ và tên"
				   />
				 </div>
			   </div>
			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="email"
					 class="form-control"
					 id="email"
					 name="email"
					 placeholder="Email"
					 value=""
					 data-validation="length" 
					 data-validation-length="min3" 
					 data-validation-error-msg="Vui lòng nhập email"
				   />
				 </div>
			   </div>
			   <div class="col-md-12">
				 <div class="form-group">
				   <input
					 type="text"
					 class="form-control"
					 id="phone"
					 name="phone"
					 placeholder="Số điện thoại"
					 data-validation="length" 
					 data-validation-length="min3" 
					 data-validation-error-msg="Vui lòng nhập số điện thoại"
				   />
				 </div>
			   </div>
			   <div class="col-md-12">
				 <div class="form-group">
				   <textarea
					 class="form-control"
					 name="content"
					 id="content"
					 rows="3"
					 placeholder="Nội dung"
					 data-validation="length" 
					 data-validation-length="min3" 
					 data-validation-error-msg="Vui lòng nhập nội dung"
				   ></textarea>
				 </div>
			   </div>
			   <div class="col-md-12 text-right">
				 <button
				   type="submit"
				   value="submit"
				   class="btn submit_btn btn-success comment"
				 >
				   Bình luận
				 </button>
			   </div>
			 </form>
			   @endif
				  </div>
				</div>
			  </div>
			</div>
			<div
			  class="tab-pane fade show active"
			  id="review"
			  role="tabpanel"
			  aria-labelledby="review-tab"
			>
			  <div class="row">
				<div class="col-lg-6">
				  <div class="row total_rate">
					<div class="col-6">
					  <div class="box_total">
						<h5>Overall</h5>
						<h4>4.0</h4>
						<h6>(03 Reviews)</h6>
					  </div>
					</div>
					<div class="col-6">
					  <div class="rating_list">
						<h3>Based on 3 Reviews</h3>
						<ul class="list">
						  <li>
							<a href="#"
							  >5 Star
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i> 01</a
							>
						  </li>
						  <li>
							<a href="#"
							  >4 Star
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i> 01</a
							>
						  </li>
						  <li>
							<a href="#"
							  >3 Star
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i> 01</a
							>
						  </li>
						  <li>
							<a href="#"
							  >2 Star
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i> 01</a
							>
						  </li>
						  <li>
							<a href="#"
							  >1 Star
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i> 01</a
							>
						  </li>
						</ul>
					  </div>
					</div>
				  </div>
				  <div class="review_list">
					<div class="review_item">
					  <div class="media">
						<div class="d-flex">
						  <img
							src="img/product/single-product/review-1.png"
							alt=""
						  />
						</div>
						<div class="media-body">
						  <h4>Blake Ruiz</h4>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						</div>
					  </div>
					  <p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						sed do eiusmod tempor incididunt ut labore et dolore magna
						aliqua. Ut enim ad minim veniam, quis nostrud exercitation
						ullamco laboris nisi ut aliquip ex ea commodo
					  </p>
					</div>
					<div class="review_item">
					  <div class="media">
						<div class="d-flex">
						  <img
							src="img/product/single-product/review-2.png"
							alt=""
						  />
						</div>
						<div class="media-body">
						  <h4>Blake Ruiz</h4>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						</div>
					  </div>
					  <p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						sed do eiusmod tempor incididunt ut labore et dolore magna
						aliqua. Ut enim ad minim veniam, quis nostrud exercitation
						ullamco laboris nisi ut aliquip ex ea commodo
					  </p>
					</div>
					<div class="review_item">
					  <div class="media">
						<div class="d-flex">
						  <img
							src="img/product/single-product/review-3.png"
							alt=""
						  />
						</div>
						<div class="media-body">
						  <h4>Blake Ruiz</h4>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						</div>
					  </div>
					  <p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						sed do eiusmod tempor incididunt ut labore et dolore magna
						aliqua. Ut enim ad minim veniam, quis nostrud exercitation
						ullamco laboris nisi ut aliquip ex ea commodo
					  </p>
					</div>
				  </div>
				</div>
				<div class="col-lg-6">
				  <div class="review_box">
					<h4>Add a Review</h4>
					<p>Your Rating:</p>
					<ul class="list">
					  <li>
						<a href="#">
						  <i class="fa fa-star"></i>
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-star"></i>
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-star"></i>
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-star"></i>
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-star"></i>
						</a>
					  </li>
					</ul>
					<p>Outstanding</p>
					<form
					  class="row contact_form"
					  action="contact_process.php"
					  method="post"
					  id="contactForm"
					  novalidate="novalidate"
					>
					  <div class="col-md-12">
						<div class="form-group">
						  <input
							type="text"
							class="form-control"
							id="name"
							name="name"
							placeholder="Your Full name"
						  />
						</div>
					  </div>
					  <div class="col-md-12">
						<div class="form-group">
						  <input
							type="email"
							class="form-control"
							id="email"
							name="email"
							placeholder="Email Address"
						  />
						</div>
					  </div>
					  <div class="col-md-12">
						<div class="form-group">
						  <input
							type="text"
							class="form-control"
							id="number"
							name="number"
							placeholder="Phone Number"
						  />
						</div>
					  </div>
					  <div class="col-md-12">
						<div class="form-group">
						  <textarea
							class="form-control"
							name="message"
							id="message"
							rows="1"
							placeholder="Review"
						  ></textarea>
						</div>
					  </div>
					  <div class="col-md-12 text-right">
						<button
						  type="submit"
						  value="submit"
						  class="btn submit_btn"
						>
						  Submit Now
						</button>
					  </div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </section>

	  <script>
		$('.comment').click(function(){
			var name = $('#name').val();
			var email= $('#email').val();
			var content = $('#content').val();
			var phone = $('#phone').val();
			var id = $('#id').val();

			if (name == '' || email == '' || content == '' || phone == '') {

			} else if(id == 'an') {
				swal("Vui lòng đăng nhập trước khi bình luận!", "Chuyên đến trang đăng nhập trong giây lát...!", "warning");

			} else {
				swal("Cảm ơn bạn đã bình luận!", "Bình luận của bạn sẽ xuất hiện sau ít phút!", "success");
			}
			
		})
	  </script>
	  <script>
		$(document).ready(function () {
			$('.update-comment').click(function(e){
				var url = $(this).attr('data-url');
				$('#form-commemt').modal('show');
				
				e.preventDefault();
				$.ajax({
					type: 'get',
					url:url,
					success: function(response){
						$('#content').val(response.data.content);
					}
				})
			})
		})
	  </script>
  <!--================End Product Description Area =================-->
@endforeach
@endsection