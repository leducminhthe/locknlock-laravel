@extends('layout')
@section('content')

<form action="{{URL::to('buy')}}" method="post">
	{{ csrf_field() }}
	<div class="checkout row justify-content-around">
	

		<div class="donhang col-5 col-lg-5 col-md-5">
			<?php $contents = Cart::content(); ?>
				@foreach($contents as $content)		
					<table class="tblone">
						<tr class="header_tb">
							<th width="50%">TenSP</th>
							<th width="20%">MaSP</th>
							<th width="20%">Price</th>
							<th width="10%">SL</th>
						</tr>

						<tr class="body_tb">
							<td>{{ $content->name }}</td>
							<td>{{ $content->options->masp }}</td>
							<td>{{ number_format($content->price,0).'VNĐ' }}</td>
							<td>{{ $content->qty }}</td>				
						</tr>
					</table>
			 	@endforeach

					<table class="sub_total" width="60%">
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
								{{ Cart::subtotal().'VNĐ' }}
							</td>
						</tr>
					</table>
					<input type="radio" checked name="pay" value="Thanh toán khi nhận hàng"> Thanh toán khi nhận hàng<br>		
					<input type="radio" name="pay" value="Chuyển khoản ngân hàng"> Chuyển khoản ngân hàng<br>			
					<input type="radio" name="pay" value="VTC pay"> VTC pay<br>	
					<label>Message:</label>
					<div>	
						<textarea class="message_user" name="message"></textarea>
					</div>
					
		</div>

		<div class="nguoimua col-5 col-lg-5 col-md-5">
			<!-- <?php 
			if (isset($_SESSION['user'])) {
			?>
			<table class="tbluser">
				<thead class="thead_user">
					<tr>
						<th colspan="4"><h3>Tài Khoản</h3></th>
					</tr>
				</thead>
				<tbody class="tbody_user">
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><?php echo $_SESSION['user']['Name'] ?></td>					
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $_SESSION['user']['Email'] ?></td>					
					</tr>
					<tr>
						<td>Phone</td>
						<td>:</td>
						<td><?php echo $_SESSION['user']['Phone'] ?></td>					
					</tr>
					<tr>
						<td>Address</td>
						<td>:</td>
						<td><?php echo $_SESSION['user']['Address'] ?></td>					
					</tr>
				</tbody>
			</table>
			<button class="update_profile" type=""><a href="<?php echo link ?>UpdateProfileController" title="">Update Profile</a></button>
			<?php  
			}else{
			?> -->

				<h3>Thông Tin Thanh Toán</h3>
				<div class="form-group">
			    <label class="control-label" >Name:</label>
			    <div>
			      <input type="text" name="name" class="form-control" id="firstname" placeholder="Enter Name" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label" for="email">Email:</label>
			    <div>
			      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label" >PhoneNumber:</label>
			    <div> 
			      <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phonenumber" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label" >Address:</label>
			    <div> 
			      <input type="text" name="address" class="form-control" id="phone" placeholder="Enter address" required>
			    </div>
			  </div>

			<!-- <?php
			}?> -->
		</div>

	</div>
	<input type="submit" name="order" value="Order Now">
</form>

@stop