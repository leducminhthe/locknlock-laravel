@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
@endsection

@section('content')
<div class="all">
    <section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24"> {{ trans('messages.home') }}<span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">{{ trans('messages.title_page_create_order') }}</span>
            </div>
        </div>
    </section>

    <section class="w-100 mt-3 pb-4">
    	<div class="container p-0">
    		<form action="thanh-cong/{{$id}}" id="form_submit" method="POST">
    		<div class="row">
	    		<div class="order-left col-lg-8 p-3">
	    				<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="payment_method" value="10">
            			<input type="hidden" name="package_no" value="1">

	    				<input type="hidden" name="s_name" value="{{ $data['step2']['s_name'] }}">
                        <input type="hidden" name="s_phone" value="{{ $data['step2']['s_phone'] }}">
                        <input type="hidden" name="s_address" value="{{ $data['step2']['s_address'] }}">
                        <input type="hidden" name="chon_tinh_noigui" value="{{ $data['step2']['chon_tinh_noigui'] }}">
                        <input type="hidden" name="chon_quan_noigui" value="{{ $data['step2']['chon_quan_noigui'] }}">
                        <input type="hidden" name="chon_phuong_noigui" value="{{ $data['step2']['chon_phuong_noigui'] }}">
                        <!-- step3 -->
                        <input type="hidden" name="r_name" value="{{ $data['step3']['r_name'] }}">
                        <input type="hidden" name="r_phone" value="{{ $data['step3']['r_phone'] }}">
                        <input type="hidden" name="r_address" value="{{ $data['step3']['r_address'] }}">
                        <input type="hidden" name="chon_tinh_noinhan" value="{{ $data['step3']['chon_tinh_noinhan'] }}">
                        <input type="hidden" name="chon_quan_noinhan" value="{{ $data['step3']['chon_quan_noinhan'] }}">
                        <input type="hidden" name="chon_phuong_noinhan" value="{{ $data['step3']['chon_phuong_noinhan'] }}">

                        <!-- id tinh quan phuong data step2 -->
                        <input type="hidden" name="s_province_id" value="{{ $data['step2']['s_province_id'] }}">
                        <input type="hidden" name="s_district_id" value="{{ $data['step2']['s_district_id'] }}">
                        <input type="hidden" name="s_ward_id" value="{{ $data['step2']['s_ward_id'] }}">
                        <!-- id tinh quan phuong data step3 -->
                        <input type="hidden" name="r_province_id" value="{{ $data['step3']['r_province_id'] }}">
                        <input type="hidden" name="r_district_id" value="{{ $data['step3']['r_district_id'] }}">
                        <input type="hidden" name="r_ward_id" value="{{ $data['step3']['r_ward_id'] }}">

		    			<div class="container steps pt-2">
						    <ul class="progressbar">
						        <li class="active"></li>
						        <li class="active"></li>
						        <li class="active"></li>
						        <li></li>
						  	</ul>
						</div>
		    			<h1 class="mt-2">{{ trans('messages.type_service') }}</h1>
		    			<div class="input_hidden_choose">
		    				@if( isset($data['step1']['service_id']) )
		    					<input type="hidden" name="service_id" value="{{ $data['step1']['service_id'] }}">
		    				@endif
		    			</div>
						<div class="service_string_hidden"></div>
		    			<div class="input_hidden_KL"></div>
		    			<div class="input_hidden_KL_id"></div>
		    			<div class="input_amt"></div>

		    			<div id="input_hidden_Hanghoa">
		    				@if( isset($data['step1']['cargo_content']) )
		    					<input type="hidden" name="cargo_content" value="{{ $data['step1']['cargo_content'] }}">
		    				@endif
		    			</div>

		    			<div class="row mt-2">
		    				<div class="col-lg-4 pl-0 chon_dichvu">
		    					<div class="choose" onclick="change(1)" id="choose-1" value="Tiêu chuẩn" service="2">
		    						<img class="img" src="{{asset('images/NTX - Icon/Small 50x50/Basic.png')}}" alt=""><span>Tiêu chuẩn</span>
		    					</div>
		    				</div>
		    				<div class="col-lg-4 p-0 chon_dichvu">
								<div class="choose" onclick="change(2)" id="choose-2" value="Nhanh" service="1">
		    						<img class="img" src="{{asset('images/NTX - Icon/Small 50x50/Fast.png')}}" alt=""> <span>Nhanh</span>
		    					</div>
		    				</div>
		    				<div class="col-lg-4 pr-0 chon_dichvu">
		    					<div class="choose" onclick="change(3)" id="choose-3" value="Hẹn giờ" service="3">
		    						<img class="img" src="{{asset('images/NTX - Icon/Small 50x50/Time set.png')}}" alt=""> <span class="p-0">Hẹn giờ</span>
		    					</div>
		    				</div>
		    			</div>

		    			<div class="row mt-3">
		    				<div class="col-lg-8 col-12 p-0">
		    					<p class="mb-2 title">{{ trans('messages.weight') }}:</p>
		    					<ul class="KL">
		    						<li class="KL_HH" onclick="KL(1)" id="KL-1" data-value="2">
		    							<p>0 - 3kg</p>
		    						</li>
		    						<li class="KL_HH" onclick="KL(2)" id="KL-2" data-value="4">
		    							<p>3 - 5kg</p>
		    						</li>
		    						<li class="KL_HH" onclick="KL(3)" id="KL-3" data-value="6">
		    							<p> > 5kg</p>
		    						</li>
		    					</ul>
		    					<div class="input_KL">
		    						<input 
										type="text" 
										name="weight" 
										class="KL_Khac form-control" 
										placeholder="Hãy nhập khối lượng"
										@if(isset($data['step1']['weight']))
                                    		value="{{$data['step1']['weight']}}"
                                		@endif
									/>
									<span class="error_weight error"><i></i></span>
		    					</div>
		    				</div>
		    				
		    				<div class="col-lg-4 col-12 tienthu p-0">
		    					<div id="form">
								    <p class="mb-1">
								        <label class="mb-0 title" for="amount">{{ trans('messages.cod_amount') }}:</label>
								        <div class="flex form_amount">
								        	@if( isset($data['step1']['cod_amount']) )
								            <input id="amount" class="form-control" name="cod_amount" type="text" maxlength="8" max='20000000' placeholder="Tiền thu hộ" value="{{ $data['step1']['cod_amount'] }}" />
								            @else
								            <input id="amount" class="form-control" name="cod_amount" type="text" maxlength="8" max='20000000' placeholder="Tiền thu hộ" value=""/>
								            @endif
								            <div class="currency">
								            	<span >vnđ</span>
								            </div>

								        </div>
								    </p>
								</div>

		    				</div>
		    			</div>

		    			<div class="thanh_toan_B4 col-12 p-0 mt-3">	
		    				<h3 class=" mb-0">{{ trans('messages.method') }}:</h3>
                            <div class="row nguoidung_thanhtoan pt-2 ">
                                <div class="nguoigui_thanhtoan col-6 p-0">
                                    <div>
                                        <input type="radio" id="color-1" class="radio_1" name="payment_method_id" value="10" checked>
                                        <label for="color-1">
                                          <span>
                                            <img src="{{ asset('images/NTX - Icon/Vector.png') }}" alt="" />
                                          </span>
                                          Người gửi thanh toán ngay
                                        </label>
                                    </div>
                                </div>
                                <div class="nguoinhan_thanhtoan col-6 p-0">
                                    <div>
                                        <input type="radio" id="color-2" class="radio_2" name="payment_method_id" value="20">
                                        <label for="color-2">
                                          <span>
                                            <img src="{{ asset('images/NTX - Icon/Vector.png') }}" alt="" />
                                          </span>
                                          Người nhận thanh toán ngay
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

		    			<div class="mt-1 row">
		    				<div class="col-lg-12 p-0">
		    					<p class="mb-1 title">{{ trans('messages.type_product') }}:</p>
		    				</div>			    			
		    			</div>

		    			<div class="row">
		    				<div class="loaiHH col-lg-12 p-0">
			    				<ul class="mt-2">
			    					<li class="chon_HH" onclick="HangHoa(1)" id="HH-1" li-hanghoa-id="li_id_1" tenhanghoa="Thực phẩm">Thực phẩm</li>
			    					<li class="chon_HH" onclick="HangHoa(2)" id="HH-2" li-hanghoa-id="li_id_2" tenhanghoa="Quà tặng">Quà tặng</li>
			    					<li class="chon_HH" onclick="HangHoa(3)" id="HH-3" li-hanghoa-id="li_id_3" tenhanghoa="Hoa">Hoa</li>
			    					<li class="chon_HH" onclick="HangHoa(4)" id="HH-4" li-hanghoa-id="li_id_4" tenhanghoa="Điện tử">Điện tử</li>
			    					<li class="chon_HH" onclick="HangHoa(5)" id="HH-5" li-hanghoa-id="li_id_5" tenhanghoa="Bánh ngọt">Bánh ngọt</li>
			    					<li class="chon_HH" onclick="HangHoa(6)" id="HH-6" li-hanghoa-id="li_id_6" tenhanghoa="Khác">Khác...</li>
			    				</ul>
			    			</div>
		    			</div>
		    			<div class="HH_khac col-12 p-0 mt-3">
			    			<input 
				    			class="w-100 form-control" 
				    			type="text" 
								id="cargo_content"
				    			name="cargo_content" 
				    			placeholder="Khác"  
				    			@if(isset($data['step1']['cargo_content']))
                                    value="{{$data['step1']['cargo_content']}}"
                                @endif
                            >	
                            <span class="error error_HH"><i></i></span>	    					
		    			</div>

		    			<div class="s_time" style="display:none;">
	                        <h3 class="mt-2 font-size-18 mt-3">{{ trans('messages.time_ship_to') }}</h3>
	                        <div class="row thoigian mt-2">
	                            <div class="col-lg-4 col-12 mt-2 p-0 ngay_giao_nhan">
	                                <label for="">{{ trans('messages.day') }}:</label>
	                                <select id="ngay_giao_noigui" onchange="next_date()" name="ngay_giao_noigui"
	                                        class="w-75 h-100 ngay_giao_noigui">
	                                </select>
	                            </div>
	                            <div class="col-lg-4 mt-2 pr-0">
	                                <label for="">{{ trans('messages.hour') }}:</label>
	                                <select name="gio_giao_noigui" class="w-75 h-100 gio_giao_noigui">

	                                </select>
	                            </div>
	                            <div class="col-lg-4 mt-2 pr-0">
	                                <label for="">{{ trans('messages.minute') }}:</label>
	                                <select id="seconds" name="phut_giao_noigui" class="w-75 h-100 phut_giao_noigui">
	                                    <option value="00">00</option>
	                                    <option value="15">15</option>
	                                    <option value="30">30</option>
	                                    <option value="45">45</option>
	                                </select>
	                            </div>
	                        </div>
                        </div>


		    			<div class="next mt-3 mb-3">
		    				<button class="back_step">{{ trans('messages.back') }}</button>|
		    				<button onclick="next_step(event)" >{{ trans('messages.next') }}</button>
		    			</div>

		    			<div class="button_next_mobile fixed-bottom row">
                            <div class="information">Thông tin đơn hàng</div>
                            <div class="back_step">
                                <center>
                                	<span class="icon-White-Arrow-31"></span>
                                </center>
                            </div>
                            <div class="next_step">
                                <center>
                                    <span class="icon-White-Arrow-32 " onclick="next_step(event)"></span>
                                </center>
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

	                            @if(isset($data['step2']['s_name']))
	                                <div class="ml-2">{{$data['step2']['s_name']}}</div>
	                            @else
	                                <div class="ml-2">{{ trans('messages.not_info') }}</div>
	                            @endif
                                </div>
                            <div class="phone col-5 p-0">
                                <div>
                                    <span class="icon-Phone-Blue font-size-20">
                                        <span class="path1"></span><span class="path2"></span>
                                    </span>
                                </div>
                                @if(isset($data['step2']['s_phone']))
                                    <div class="ml-2">{{$data['step2']['s_phone']}}</div>
                                @else
                                    <div class="ml-2">{{ trans('messages.not_info') }}</div>
                                @endif
                            </div>
                            <div class="local">
                                <div>
                                    <span class="icon-Address-Blue font-size-20">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                @if(isset($data['step2']['s_address']))
                                    <div class="ml-2">{{$data['step2']['s_address']}}
                                        , {{$data['step2']['chon_phuong_noigui']}}
                                        , {{$data['step2']['chon_quan_noigui']}} , {{
                                    $data['step2']['chon_tinh_noigui']
                                }}</div>
                                @else
                                    <div class="ml-2">{{ trans('messages.not_info') }}</div>
                                @endif
                            </div>
                            <div class="time_delivery col-12 p-0" style="display: none;">
						        <div>
						            <span class="icon-Time-Blue font-size-20">
										<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span>
						            </span>
						        </div>
								@if( isset($data['step2']['ngay_giao_noigui']) )
                                    <div class="ml-2">{{ $data['step2']['ngay_giao_noigui'] }} |
                                        {{ $data['step2']['gio_giao_noigui'] }} :
                                        {{ $data['step2']['phut_giao_noigui'] }}
                                    </div>
                                @else
                                    <div class="ml-2">{{ trans('messages.not_info') }}</div>
                                @endif
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

                                @if(isset($data['step3']['r_name']))
                                    <div class="ml-2">{{$data['step3']['r_name']}}</div>
                                @else
                                    <div class="ml-2">{{ trans('messages.not_info') }}</div>
                                @endif
                            </div>
                            <div class="phone col-5 p-0">
                                <div>
                                    <span class="icon-Phone-Blue font-size-20">
                                        <span class="path1"></span><span class="path2"></span>
                                    </span>
                                </div>
                                @if(isset($data['step3']['r_phone']))
                                    <div class="ml-2">{{$data['step3']['r_phone']}}</div>
                                @else
                                    <div class="ml-2">{{ trans('messages.not_info') }}</div>
                                @endif
                            </div>
                            <div class="local">
                                <div>
                                    <span class="icon-Address-Blue font-size-20">
                                        <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                    </span>
                                </div>
                                @if(isset($data['step3']['r_address']))
                                    <div class="ml-2">{{$data['step3']['r_address']}}
                                        , {{$data['step3']['chon_phuong_noinhan']}}
                                        , {{$data['step3']['chon_quan_noinhan']}}
                                        , {{$data['step3']['chon_tinh_noinhan']}}</div>
                                @else
                                    <div class="ml-2">{{ trans('messages.not_info') }}</div>
                                @endif
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
			    						<td>{{ trans('messages.type_service') }}:</td>
			    						@if( isset($data['step1']['service_id']) )
                                            <td>{{ $data['step1']['service_id'] }}</td>
                                        @else
                                            <td>_</td>
                                        @endif
			    					</tr>
			    					<tr>
			    						<td>{{ trans('messages.type_product') }}:</td>
                                       	@if( isset($data['step1']['cargo_content']) )
                                            <td class="cargo">{{ $data['step1']['cargo_content'] }}</td>
                                        @else
                                            <td>_</td>
                                        @endif
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
	    					@if( $id == 1 )
	    					<center>
	    						<img src="{{asset('images/NTX - Icon/Medium 150x150/Moto.png')}}" alt="">
	    					</center>
	    					<span>{{ trans('messages.moto') }}</span>
	    					@else
	    					<center>
	    						<img src="{{asset('images/NTX - Icon/Medium 150x150/Oto.png')}}" alt="">
	    					</center>
	    					<span>{{ trans('messages.oto') }}</span>
	    					@endif
	    				</div>
	    				<div class="thanhtoan col-lg-7 col-7">
	    					<ul>
	    						<li>{{ trans('messages.fee_service') }}</li>
	    						<li><span>0</span>vnđ</li>
	    						<li>{{ trans('messages.cod') }}</li>
	    						@if( isset($data['step1']['cod_amount']) )
	    						<li><span>{{ $data['step1']['cod_amount'] }}</span>vnđ</li>
	    						@else
	    						<li><span>0</span>vnđ</li>
	    						@endif
	    					</ul>
	    				</div>
	    				<div class="khuyenmai mt-2 col-lg-12 col-12 mt-2 mb-2">
	    					<div class="row">
	    						<div style="display: flex;" class="col-8 p-0">
		    						<span class="currency pr-0">
		    							<span class="icon-Sale"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span></span>
		    						</span>
		    						@if( isset($data['voucher']) )
                                    <input class="w-100 form-control" type="text" name="voucher" value="{{ $data['voucher'] }}">
                                    @else
                                    <input class="w-100 form-control" type="text" name="voucher" placeholder="Nhập mã khuyến mãi nếu có">
                                    @endif
		    					</div>
		    					<div class="col-4 apdung pr-0">
		    						<button class="btn_voucher" type="button">{{ trans('messages.apply') }}</button>
		    					</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
    		</div>

    		</form>
    	</div>
    </section>
</div>
@stop

@section('script')
<script>
	$(window).on('load', function() {
		$('html,body').animate({ scrollTop: 135 }, 400);
		$('.btn_voucher').attr('disabled', true);
		$('.HH_khac').hide();
		old_service();
		loadDefaultChoosenKL();
		loadDefaultChoosenHH();
		loadDefaultChoosenService();
		data_isset();
		get_time();
		next_date();
		var seconds = "<?php if ( isset($data['step2']['phut_giao_noigui'])) {
    							echo $data['step2']['phut_giao_noigui'];
    						} else {
    							echo 00;
    						} ?>";
    	$('#seconds option[value='+seconds+']').attr('selected','selected');
	});
	// scroll thông tin đơn hàng
    $('.information').click(function(){ 
    	if ( $('.s_time').css('display') == 'block' ) {
    		$('html,body').animate({ scrollTop: 1150 }, 400);
    	} else {
        	$('html,body').animate({ scrollTop: 920 }, 400);
        }
    });

	function loadDefaultChoosenService() {
    	var service_id = "<?php if ( isset($data['step1']['service_id'])) {
    							echo $data['step1']['service_id'];
    						} else {
    							echo 'null';
    						} ?>";
	    if (service_id !== 'null' ) {
	    	var buttons = document.getElementsByClassName("choose");
	    	for(i = 1; i <= buttons.length; i++){
	    		var btndId = "choose-" + i;
                if (document.getElementById(btndId).getAttribute('value') === service_id) {
                	document.getElementById(btndId).style.background = '#2366B1';
                	document.getElementById(btndId).style.border = '1px solid #C8C8C8';
                	document.getElementById(btndId).style.color = 'white';
                	document.getElementById(btndId).style.filter = 'unset';
                	$('.input_hidden_choose').html('<input type="hidden" name="service_id" value="'+service_id+'">');
                	if (service_id === 'Hẹn giờ') {
			    		$('.time_delivery').css('display','flex');
			    		$('.s_time').css('display','block');
			    		$('.noigui').children(".time_delivery").css('color', 'black');
			    	}else{
			    		$('.time_delivery').css('display','none');
			    		$('.s_time').css('display','none');
			    	}
                	break;
                }
	    	}
	    } else {
	       document.getElementById('choose-1').style.border = '1px solid #C8C8C8';
	       document.getElementById('choose-1').style.color = 'white';
	       document.getElementById('choose-1').style.background = '#2366B1';
    	   document.getElementById('choose-1').style.filter = 'unset';
           $('.input_hidden_choose').html('<input type="hidden" name="service_id" value="Tiêu chuẩn">');
           $('.service_string_hidden').html('<input type="hidden" name="dichvu" value="2">');
           $('.ngay_giao_noigui').attr('disabled',true); 
    	   $('.gio_giao_noigui').attr('disabled',true); 
     	   $('.phut_giao_noigui').attr('disabled',true);
	    }
    }

    function loadDefaultChoosenKL(){
    	var weight = "<?php if ( isset($data['step1']['weight'])) {
    						echo $data['step1']['weight'];
						} else {
    						echo 'null';
						} ?>";
		console.log(weight)
    	if (weight !== 'null') {
	    	var KL_HH = document.getElementsByClassName("KL_HH");
	    	for(i = 1; i <= KL_HH.length; i++){
	    		var getKL = "KL-" + i;
                if (document.getElementById(getKL).getAttribute('data-value') === weight) {
                	document.getElementById(getKL).style.background = '#00428D';
					document.getElementById(getKL).style.color = 'white';
					$('#KL-3').css('background','#EBEBEB')
					$('#KL-3').css('color','#959595')
					$('.input_hidden_KL').html('<input type="hidden" name="weight" value="'+weight+'">');
					$('.KL_Khac').val('');
					$('.KL_Khac').attr('disabled', true);
                	break;
                } else {
					$('#KL-3').css('background','#00428D')
					$('#KL-3').css('color','white')
					$('.KL_Khac').attr('disabled', false);
				}
	    	}
	    } else {
	       	document.getElementById('KL-1').style.background = '#00428D';
    		document.getElementById('KL-1').style.color = 'white';
			$('.input_hidden_KL').html('<input type="hidden" name="weight" value="2">');
			$('.KL_Khac').attr('disabled', true);
	    }
    }

    function loadDefaultChoosenHH() {
    	var cargo_content = "<?php if ( isset($data['step1']['cargo_content'])) {
    							echo $data['step1']['cargo_content'];
    						} else {
    							echo 'null';
    						} ?>";
    	console.log(cargo_content)
	    if (cargo_content !== 'null' ) {
	    	var chon_HH = document.getElementsByClassName("chon_HH");
	    	for(i = 1; i <= chon_HH.length; i++){
	    		var getHH = "HH-" + i;
                if (document.getElementById(getHH).getAttribute('tenhanghoa') === cargo_content) {
                	$('.HH_khac').hide();
    				document.getElementById('HH-6').style.background = '#EBEBEB';
      				document.getElementById('HH-6').style.color = '#959595';
                	document.getElementById(getHH).style.background = '#00428D';
    				document.getElementById(getHH).style.color = 'white';
					$('#input_hidden_Hanghoa').html('<input type="hidden" name="cargo_content" value="'+cargo_content+'">');
					$('#cargo_content').val('');
					$('#cargo_content').attr('disabled',true);
                	break;
                } else {
					$('.HH_khac').show();
					$('#cargo_content').attr('disabled',false);
                	document.getElementById('HH-6').style.background = '#00428D';
      				document.getElementById('HH-6').style.color = 'white';
                }
	    	}
	    } else {
			$('#cargo_content').attr('disabled',true);
	       	document.getElementById('HH-1').style.background = '#00428D';
      		document.getElementById('HH-1').style.color = 'white';
	  		$('#input_hidden_Hanghoa').html('<input type="hidden" name="cargo_content" value="Thực phẩm">');
	    }
    }
	// chọn dịch vụ
	function change(a) {
    	var buttons = document.getElementsByClassName("choose");
    	for (var i=1; i <= buttons.length; i++) {
    		var btndId = "choose-" + i;
    		document.getElementById(btndId).style.border = '1px solid #C8C8C8';
    		document.getElementById(btndId).style.background = 'white';
    		document.getElementById(btndId).style.color = '#8E8E8E';
            document.getElementById(btndId).style.filter = 'grayscale(100%)';
    	}
    	var btndId = "choose-" + a;
    	document.getElementById(btndId).style.border = '1px solid #C8C8C8';
    	document.getElementById(btndId).style.background = '#2366B1';
    	document.getElementById(btndId).style.color = 'white';
    	document.getElementById(btndId).style.filter = 'unset';
    	var value = document.getElementById(btndId).getAttribute('value');
		var service = document.getElementById(btndId).getAttribute('service');
    	$('.input_hidden_choose').html('<input type="hidden" name="service_id" value="'+value+'">');
    	$('.service_string_hidden').html('<input type="hidden" name="dichvu" value="'+service+'">');
    	if (value === 'Hẹn giờ') {
    		$('.time_delivery').css('display','flex');
    		$('.s_time').css('display','block');
    		$('.ngay_giao_noigui').attr('disabled',false); 
    		$('.gio_giao_noigui').attr('disabled',false); 
    		$('.phut_giao_noigui').attr('disabled',false);
    	} else {
    		$('.time_delivery').css('display','none');
    		$('.s_time').css('display','none');
    		$('.ngay_giao_noigui').attr('disabled',true); 
    		$('.gio_giao_noigui').attr('disabled',true); 
    		$('.phut_giao_noigui').attr('disabled',true);  		
    	}
	}
	// chọn khối lượng
	function KL(b) {
		var KL_HH = document.getElementsByClassName("KL_HH");
    	for(i = 1; i <= KL_HH.length; i++){
    		var getKL = "KL-" + i;
    		var element_get_KL = document.getElementById(getKL);
    		element_get_KL.style.background = '#EBEBEB';
    		element_get_KL.style.color = '#959595';
    	}
    	getKL = "KL-" + b;
    	document.getElementById(getKL).style.background = '#00428D';
    	document.getElementById(getKL).style.color = 'white';
		var result = document.getElementById(getKL).getAttribute('data-value');
		$('.error_weight').css('display','none')
		console.log(result)
		if (result == 6) {
			$('.KL_Khac').attr('disabled',false)
			$('.input_hidden_KL').html('<input type="hidden" name="weight" value="">');
		} else {
			$('.KL_Khac').attr('disabled',true)
			$('.KL_Khac').val("");	
			$('.input_hidden_KL').html('<input type="hidden" name="weight" value="'+result+'">');		
		}
	}
	// chọn hàng hóa
	function HangHoa(c) {
		var chon_HH = document.getElementsByClassName("chon_HH");
    	for(i = 1; i <= chon_HH.length; i++){
    		var getHH = "HH-" + i;
    		var element_get_HH = document.getElementById(getHH);
    		element_get_HH.style.background = '#EBEBEB';
    		element_get_HH.style.color = '#959595';
    	}
    	getHH = "HH-" + c;
    	document.getElementById(getHH).style.background = '#00428D';
    	document.getElementById(getHH).style.color = 'white';

    	var element_get_HH = document.getElementById(getHH);
    	var tenhanghoa = element_get_HH.getAttribute('tenhanghoa');
    	var li_hanghoa_id = element_get_HH.getAttribute('li-hanghoa-id');

    	$('#input_hidden_Hanghoa').html('<input type="hidden" name="cargo_content" id="input_'+getHH+'" value="'+tenhanghoa+'">');
		$('.HH_khac').hide();
		$('#cargo_content').attr('disabled',true);

    	if (tenhanghoa === "Khác") {
			$('#cargo_content').attr('disabled',false);
    		$('.HH_khac').show();
    		$('#input_hidden_Hanghoa').html('<input type="hidden" name="cargo_content" value="">');
    	}
	}
	// quay trở lại step cũ
    $(".back_step").on("click", function () {
        var id = <?php echo $id ?>;
        $('#form_submit').attr('action', "quaylai-tao-van-don/" + id + "/2").submit();
    });
    // old service
    function old_service(){
    	var service = "<?php if ( isset($data['step1']['service_id'])) {
    							echo $data['step1']['service_id'];
    						} else {
    							echo null;
    						} ?>";
    	if (service === 'Hẹn giờ') {
    		$('.service_string_hidden').html('<input type="hidden" name="dichvu" value="3">');
    	} else if (service === 'Nhanh') {
    		$('.service_string_hidden').html('<input type="hidden" name="dichvu" value="1">');
    	} else if (service === 'Tiêu chuẩn') {
    		$('.service_string_hidden').html('<input type="hidden" name="dichvu" value="2">');
    	} 
    }
    // kiểm tra data tồn tại
    function data_isset() {
        var data2 = <?php if (isset($data['step2'])) {
            echo $data['step2']['s_phone'];
        } else {
            echo 'null';
        }  ?>;
        if (data2 !== null) {
            $('.noigui').children(".phone").css('color', 'black');
            $('.noigui').children(".local").css('color', 'black');
        }
        var data3 = <?php if (isset($data['step3']['r_phone'])) {
            echo $data['step3']['r_phone'];
        } else {
            echo 'null';
        }  ?>;
        if (data3 !== null) {
            $('.noinhan').children(".phone").css('color', 'black');
            $('.noinhan').children(".local").css('color', 'black');
        }
    }
    // lấy ngày
    function get_time() {
        var today = new Date();
        var hours = today.getHours();
        var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        var date_1 = (today.getDate() + 1) + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        var date_2 = (today.getDate() + 2) + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        var date_3 = (today.getDate() + 3) + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();

        var get_day_old = '<?php if (isset($data['step2']['ngay_giao_noigui'])) {
                                echo $data['step2']['ngay_giao_noigui'];
                            } else {
                                echo 'null';
                            }  ?>';

        if (hours < 19) {
            if (get_day_old == date_2) {
                var option_date = `<option value="` + date + `">` + date + `</option>
                                   <option value="` + date_1 + `">` + date_1 + `</option>
                                   <option selected value="` + date_2 + `">` + date_2 + `</option> `;
            }else if (get_day_old == date_1) {
                var option_date = `<option value="` + date + `">` + date + `</option>
                                   <option selected value="` + date_1 + `">` + date_1 + `</option>
                                   <option value="` + date_2 + `">` + date_2 + `</option> `;
            }else{
                var option_date = `<option selected value="` + date + `">` + date + `</option>
                                   <option value="` + date_1 + `">` + date_1 + `</option>
                                   <option value="` + date_2 + `">` + date_2 + `</option> `;
            }
            $('.ngay_giao_noigui').html(option_date);
        } else {
            if (get_day_old == date_2) {
                var option_date = `<option value="` + date_1 + `">` + date_1 + `</option>
                                   <option selected value="` + date_2 + `">` + date_2 + `</option>
                                   <option value="` + date_3 + `">` + date_3 + `</option> `;
            }else if (get_day_old == date_3) {
                var option_date = `<option value="` + date_1 + `">` + date_1 + `</option>
                                   <option value="` + date_2 + `">` + date_2 + `</option>
                                   <option selected value="` + date_3 + `">` + date_3 + `</option> `;
            }else{
                var option_date = `<option selected value="` + date_1 + `">` + date_1 + `</option>
                                   <option value="` + date_2 + `">` + date_2 + `</option>
                                   <option value="` + date_3 + `">` + date_3 + `</option> `;
            }
            $('.ngay_giao_noigui').html(option_date);
        }
    }
    // lấy giờ phút
    function next_date() {
        var today = new Date();
        var hours = today.getHours();
        var option = '';
        var today_format = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        var get_date_selected = $('.ngay_giao_noigui').val();
        console.log(get_date_selected);

        var get_time_old = '<?php if (isset($data['step2']['gio_giao_noigui'])) {
                                echo $data['step2']['gio_giao_noigui'];
                            } else {
                                echo 'null';
                            }  ?>';

        if (get_date_selected !== today_format || hours < 7) {
        	var time = ["7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18","19"];

            for (var i = 0; i < time.length; i++) {
            	if (get_time_old == time[i]) {
            		option += `<option selected value="` + time[i] + `">` + time[i] + `</option>`;
            	} else {
            		option += `<option value="` + time[i] + `">` + time[i] + `</option>`;
            	}
            }
        } else {
            if (hours <= 18) {
                for (var i = (hours+1); i <= 19; i++) {
                	if(get_time_old == i) {
                		option += `<option selected value="` + i + `">` + i  + `</option>`;
                	} else {
                    	option += `<option value="` + i  + `">` + i  + `</option>`;
                	}
                }
            } else {
                option = `<option value="` + hours + `">` + hours  + `</option>`
            }
        }
        $('.gio_giao_noigui').html(option);
    }
	// tiền thu hộ
	(function($, undefined) {
    $(function() {
        var $form = $( "#form" );
        var $input = $form.find( "input" );
        $input.on( "keyup", function( event ) {
            var $this = $( this );
            // Get the value.
            var input = $this.val();
            var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt( input, 10 ) : 0;

            $this.val( function() {
                return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
            } );
        } );

    });
})(jQuery);
</script>
<script type="text/javascript">
    //kiểm tra validate
    function next_step(event){
    	if ( $('.HH_khac').is(":hidden") && $('.KL_Khac').is(':disabled') ) {
			check_amount();
    	} else {
    		ajax_validate();
    	}
    };
	function ajax_validate(){
		var form = $('#form_submit');
		event.preventDefault();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{ route('check_step3') }}", 
			method: 'POST',
			data: form.serialize(),
			dataType: 'JSON',
			success: res => {
				if ( res.status == '201' ){
					if(typeof res.message !== 'undefined' ){
						if (typeof res.message.cargo_content !== 'undefined'){
							$('#form_submit').addClass('was-validated');
							$('input[name="cargo_content"]').prop('required',true);
							$('.error_HH').text(res.message.cargo_content[0]).css('display','block');
						}
						if (typeof res.message.weight !== 'undefined'){
							$('#form_submit').addClass('was-validated');
							$('.input_KL input[name="weight"]').prop('required',true);
							$('.error_weight').text(res.message.weight[0]).css('display','block');
						}
					}
				} else {
					check_amount();
				}
			}
		})
	}

    $('.form-control').on('focus', function (){
        $(this).parent().find('.error').css('display','none');
    });

    function check_amount(){
    	var amount = $('input[name="cod_amount"]').val();
        var input = amount.replace(/,/g, '');
        $('.input_amt').html('<input type="hidden" name="input_amt" value="'+input+'">');
    	$('#form_submit').submit();
    }
</script>
@stop
