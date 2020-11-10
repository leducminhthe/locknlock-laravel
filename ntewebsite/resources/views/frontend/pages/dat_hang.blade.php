@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
@endsection

@section('content')
<div class="all">
    <section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24">{{ trans('messages.home') }}<span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">{{ trans('messages.title_page_create_order') }}</span>
            </div>
        </div>
    </section>

    <section class="w-100 mt-3 pb-4">
    	<div class="container p-0">
    		<div class="row">
	    		<div class="order-left col-lg-8">
                    <div class="row">
                    	<div class="container steps pt-2">
						    <ul class="progressbar">
						        <li class=""></li>
						        <li></li>
						        <li></li>
						        <li></li>
						  	</ul>
						</div>
                    	<div class="col-lg-6 col-12 p-0">
                    		<div class="xemay row m-2">
                    			<div class="col-lg-7 col-7">
                    				<h3 style="font-size: 18px;">{{ trans('messages.ship_by_moto') }}</h3>
                    				<p>- {{ trans('messages.info_product_by_moto_one') }}</p>
                    				<p>- {{ trans('messages.info_product_by_moto_two') }}</p>
                    				<p>- {{ trans('messages.info_product_by_moto_three') }}</p>
                    				<div>
                    					<!-- <a class="d-block overflow-hidden" href="tao-van-don-step-1/1">{{ trans('messages.next') }}</a> -->
                    					<button id="moto" class="tieptuc" onclick="moto()">{{ trans('messages.next') }}</button>
                    				</div>
                    			</div>
                    			<div class="col-lg-5 col-5 mt-3 anh_vandon">
                    				<center style="margin: 0px auto;"><img class="w-100 h-50" src="{{asset('images/2.png')}}" alt=""></center>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="col-lg-6 col-12 p-0">
                    		<div class="oto row m-2">
                    			<div class="col-lg-7 col-7">
                    				<h3 style="font-size: 18px;">{{ trans('messages.ship_by_oto') }}</h3>
                    				<p>- {{ trans('messages.info_product_by_oto_one') }}</p>
                    				<p>- {{ trans('messages.info_product_by_oto_two') }}</p>
                    				<p>- {{ trans('messages.info_product_by_oto_three') }}</p>
                    				<div>
                    					<button id="oto" class="tieptuc" onclick="oto()">{{ trans('messages.next') }}</button>
                    				</div>
                    			</div>
                    			<div class="col-lg-5 col-5 mt-3 anh_vandon">
                    				<center style="margin: 0px auto;"><img class="w-100 h-50" src="{{asset('images/1.png')}}" alt=""></center>
                    			</div>
                    		</div>
                    	</div>
                    </div>
	    		</div>

	    		<div class="order-right col-lg-4">
	    			<div class="thongtin">
	    				<div class="noigui row">
		    				<h1 class="col-12 pr-0 pl-0">{{ trans('messages.info_order') }}</h1>
		    				<h3 class="col-12 pr-0 pl-0">{{ trans('messages.send_customer') }}:</h3>
		    				<div class="phone col-7 p-0" style="display: flex;">
		    					<div>
		    						<span class="icon-Account font-size-20">
		    							<span class="path1"></span><span class="path2"></span><span class="path3"></span>
		    						</span>
		    					</div>
                                <div class="ml-1">{{ trans('messages.not_info') }}</div>
                            </div>
		    				<div class="phone col-5 p-0">
		    					<div>
		    						<span class="icon-Phone-Blue font-size-20">
		    							<span class="path1"></span><span class="path2"></span>
		    						</span>
		    					</div>
		    					<div class="ml-1">{{ trans('messages.not_info') }}</div>
		    				</div>
		    				<div class="local">
		    					<div>
		    						<span class="icon-Address-Blue font-size-20">
		    							<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
		    						</span>
		    					</div>
		    					<div class="ml-1">{{ trans('messages.not_info') }}</div>
		    				</div>
	    				</div>
		    			<div class="noinhan row">
		    				<h3 class="col-12 pr-0 pl-0">{{ trans('messages.take_customer') }}:</h3>
		    				<div class="phone col-7 p-0" style="display: flex;">
		    					<div>
		    						<span class="icon-Account font-size-20">
		    							<span class="path1"></span><span class="path2"></span><span class="path3"></span>
		    						</span>
		    					</div>
                                <div class="ml-1">{{ trans('messages.not_info') }}</div>
                            </div>
		    				<div class="phone col-5 p-0">
		    					<div>
		    						<span class="icon-Phone-Blue font-size-20">
		    							<span class="path1"></span><span class="path2"></span>
		    						</span>
		    					</div>
		    					<div class="ml-1">{{ trans('messages.not_info') }}</div>
		    				</div>
		    				<div class="local">
		    					<div>
		    						<span class="icon-Address-Blue font-size-20">
		    							<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
		    						</span>
		    					</div>
		    					<div class="ml-1">{{ trans('messages.not_info') }}</div>
		    				</div>
		    			</div>
		    		</div>

	    			<div class="donhang mt-2 mb-2 row">
	    				<div class="col-3 col-lg-3 pl-0 qr_code">
	    					<center>
                            	<img class="w-100" src="{{asset('images/qr-code 1.png')}}" alt="">
                        	</center>
	    				</div>
	    				<div class="col-lg-9 col-9 p-0">
		    				<table class="w-100">
		    					<thead>
									<tr>
										<th width="65%"></th>
										<th width="35%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
			    						<td>{{ trans('messages.order_id') }}:</td>
			    						<td><span>_</span></td>
			    					</tr>
			    					<tr>
			    						<td >{{ trans('messages.type_service') }}:</td>
			    						<td>_</td>
			    					</tr>
			    					<tr>
			    						<td >{{ trans('messages.type_product') }}:</td>
			    						<td>_</td>
			    					</tr>
			    					<tr>
			    						<td>{{ trans('messages.intend_time') }}:</td>
			    						<td>_</td>
			    					</tr>
								</tbody>
		    				</table>
		    			</div>
	    			</div>

	    			<div class="row dichvu_thanhtoan">
	    				<div class="QR col-lg-5 col-5">
	    					<center class='mt-4'>
	    						<span class="icon-Dot"></span>
	    					</center>
	    				</div>
	    				<div class="thanhtoan col-lg-7 col-7">
	    					<ul>
	    						<li>{{ trans('messages.fee_service') }}</li>
	    						<li><span>0</span>vnđ</li>
	    						<li>{{ trans('messages.cod') }}</li>
	    						<li><span>0</span>vnđ</li>
	    					</ul>
	    				</div>
	    				<form class="w-100" action="" method="post" id="form_submit">
	    				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    				<div class="khuyenmai mt-2 col-lg-12 col-12 mt-2 mb-2">
	    					<div class="row">
	    						<div style="display: flex;" class="col-8 p-0">
		    						<span class="currency pr-0">
		    							<span class="icon-Sale"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span></span>
		    						</span>
		    						<input id="voucher" class="w-100 form-control" type="text" name="voucher" placeholder="Nhập mã khuyến mãi nếu có">
		    					</div>
		    					<div class="col-4 apdung pr-0">
		    						<button class="btn_voucher" type="">{{ trans('messages.apply') }}</button>
		    					</div>
	    					</div>
	    				</div>
	    				</form>
	    			</div>
	    		</div>
    		</div>
    	</div>
    </section>
</div>
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('html,body').animate({ scrollTop: 135 }, 400);

        $('.btn_voucher').attr('disabled', true);
    });
    function moto(){
    	$('#form_submit').attr('action', "tao-van-don-step-1/1").submit();
    }
     function oto(){
    	$('#form_submit').attr('action', "tao-van-don-step-1/2").submit();
    }
</script>
@stop
