@extends('layout')
@section('content')

<nav class="nav nav_GioHang">
  <a class="nav-link" href="{{URL::to('locknlock')}}"><img src="public/locknlock/images/home.png" alt=""></a>
  <a class="nav-link" href="#">Giỏ Hàng</a>
</nav>

<div class="orderLocation row">
	<h2 class="col-2 col-lg-2 col-md-2">Giỏ Hàng</h2>
	<p class="col-4 col-lg-4 col-md-4">Thời gian lưu của giỏ hàng là  30 ngày. Sản phẩm quá 30 ngày sẽ được tự động xóa khỏi danh sách.</p>
	<div class="col-2 col-lg-2 col-md-2">
		<img src="public/locknlock/images/cart.png" alt="">
		<strong>Step 01</strong>
		<p>Giỏ Hàng</p>
	</div>
	<div class="col-2 col-lg-2 col-md-2">
		<img src="public/locknlock/images/pay.png" alt="">
		<strong>Step 02</strong>
		<p>Đặt hàng thanh toán</p>
	</div>
	<div class="col-2 col-lg-2 col-md-2">
		<img src="public/locknlock/images/order.png" alt="">
		<strong>Step 03</strong>
		<p>Hoàn tất đặt hàng</p>
	</div>
</div>
		<?php 
            $message = Session::get('message');
            if ($message) {
                echo "<script>alert('buy success')</script>";
                Session::put('message', null);
            }
         ?>

	<?php $contents = Cart::content(); ?>

	@if( count($contents) > 0 )

	@foreach($contents as $content)
		<table class="tblone">
			<tr class="header_tb">
				<th width="20%">TenSP</th>
				<th width="15%">MaSP</th>
				<th width="15%">Price</th>
				<th width="20%">SL</th>
				<th width="25%">Image</th>
				<th width="5%">Action</th>
			</tr>

			<tr class="body_tb">
				<td>{{ $content->name }}</td>
				<td>{{ $content->options->masp }}</td>
				<td>{{ number_format($content->price,0).'VNĐ' }}</td>
				<td>
					<form action="{{ URL::to('update-cart/'.$content->rowId )}}" method="post">
						{{csrf_field()}}
						<input style="width: 80px;" type="number" name="quantity" min="1" value="{{ $content->qty }}"/>
						<input type="submit" name="submit" value="Update"/>
					</form>
				</td>
				<td class="td_image"><img src="{{ $content->options->image }}" alt=""></td>
				<td><a href="{{URL::to('delete-cart/'.$content->rowId )}}" >Delete</a></td>
			</tr>
		</table>
	@endforeach

		<button type="">
			<a href="{{URL::to('delete-cart-all')}}" title="">Delete All</a>
		</button>

		<table class="sub_total" width="40%">
			<tr>
				<th>Giá Tiền: </th>
				<td>
					{{ Cart::subtotal().'VNĐ' }}
				</td>
			</tr>
			<tr>
				<th>VAT: </th>
				<td>0%</td>
			</tr>
			<tr>
				<th>Tổng Tiền:</th>
				<td>
					{{ Cart::subtotal() .'VNĐ' }}
				</td>
			</tr>
		</table>

		<div class="shopping row">
			<div class="shopleft col-6 col-md-6 col-lg-6">
				<a href="{{URL::to('locknlock')}}"><img src="public/locknlock/images/shop.png" alt="" /></a>
			</div>
			<div class="shopright col-6 col-md-6 col-lg-6">
				<a href="{{ URL::to('checkout') }}"><img src="public/locknlock/images/check.png" alt="" /></a>
			</div>
		</div>

	@else
		<h3>Your cart empty ! Please Shopping</h3>
	@endif

@stop

