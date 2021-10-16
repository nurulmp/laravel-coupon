@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/cart_responsive.css">
@include('front-partial.collaps_nav')                   
      	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
					 <div class="card-header">
                		<h3 class="card-title text-center">Blling Adress</h3>
              		</div>
					
					<form action="">
						<div class="card-body">
							<div class="row">
			                    <div class="form-group col-lg-6">
			                      <label for="exampleInputEmail1">Customer Name <span class="text-danger">*</span> </label>
			                      <input type="text" class="form-control" name="name"   required="">
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="exampleInputPassword1">Customer Phone <span class="text-danger">*</span> </label>
			                      <input type="text" class="form-control"  name="code"  >
			                    </div>
                 			 </div>

                 			 <div class="row">
			                    <div class="form-group col-lg-6">
			                      <label for="exampleInputEmail1">Country <span class="text-danger">*</span> </label>
			                      <input type="text" class="form-control" name="name"   required="">
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="exampleInputPassword1">Shopping Adress <span class="text-danger">*</span> </label>
			                      <input type="text" class="form-control"  name="code"  >
			                    </div>
                 			 </div>

                 			 <div class="row">
			                    <div class="form-group col-lg-6">
			                      <label for="exampleInputEmail1">Email address<span class="text-danger">*</span> </label>
			                      <input type="text" class="form-control" name="name"   required="">
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="exampleInputPassword1">Zipcode<span class="text-danger">*</span> </label>
			                      <input type="text" class="form-control"  name="code"  >
			                    </div>
                 			 </div>

                 			 <div class="row">
			                    <div class="form-group col-lg-6">
			                      <label for="exampleInputEmail1">Extra Address<span class="text-danger">*</span> </label>
			                      <input type="text" class="form-control" name="name"  required="">
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="exampleInputPassword1">Extra Phone<span class="text-danger">*</span> </label>
			                      <input type="text" class="form-control"  name="code"  >
			                    </div>
                 			 </div>
                 			<div class="row">
                 				<div class="col-lg-4">
	                 				 <div class="form-group">
		                 			 	<label for="">Paypal</label>
		                 			 	<input type="radio" name="payment_type" checked="">
	                 			  	</div>
                 				 </div>
                 			 	<div class="col-lg-4">
	                 				 <div class="form-group">
		                 			 	<label for="">Paypal</label>
		                 			 	<input type="radio" name="payment_type" checked="">
	                 			  	</div>
                 				 </div>
                 				 <div class="col-lg-4">
	                 				 <div class="form-group">
		                 			 	<label for="">Paypal</label>
		                 			 	<input type="radio" name="payment_type" checked="">
	                 			  	</div>
                 				 </div>
                 			</div>
						</div>
						<div class="form-group pl-2">
							<button class="btn btn-info" type="submit">Order Place</button>
						</div>
					</form>
				</div>
			</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="pl-4 pt-2">
							<p style="color:black">Subtotal:<span style="float: right; padding-right: 10px;">{{ Cart::subtotal() }}{{ $setting->currency }}</span> </p>
							{{-- apply coupoo --}}
							@if(Session::has('coupon'))
								<p style="color:black">
								 Cupon:({{ Session::get('coupon')['name'] }} )
								 <a class="text-danger" href="{{ route('coupon.remove') }}">X</a><span style="float: right; padding-right: 10px;">{{ Session::get('coupon')['discount'] }}{{ $setting->currency }}</span>
							    </p>
							@else
							@endif

							<p style="color:black">Tax:<span style="float: right; padding-right: 10px;">00.00{{ $setting->currency }}</span></p>

							<p style="color:black">Shiping:<span style="float: right; padding-right: 10px;">00.00{{ $setting->currency }}</span>
							</p>
							@if(Session::has('coupon'))
								<p style="color:black"><b>Total: <span style="float: right; padding-right: 10px;">{{ Session::get('coupon')['after_discount'] }}{{ $setting->currency }}</span></b>
								</p>
							@else
								<p style="color:black"><b>Total: <span style="float: right; padding-right: 10px;">{{ Cart::total() }}{{ $setting->currency }}</span></b>
								</p>
								
							@endif
						</div>
						<hr>
						@if(!Session::has('coupon'))
						<form action="{{ route('apply.coupon') }}" method="post">
							@csrf
							<div class="p-4">
								<div class="form-group">
									<input type="text" class="form-control"  name="coupon" placeholder="coupon code" autocomplete="off" >
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-info">Apply Cupon</button>
								</div>
							</div>
						</form>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	
 @endsection
