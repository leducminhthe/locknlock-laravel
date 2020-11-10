@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pages/7inch.css') }}">
@endsection

@section('content')
<section>
	<form action="7-inch/quay-lai/{{$id}}/3" method="POST" id="form_submit">
        {{ csrf_field() }}
        @if( isset($result) )
        <input type="hidden" name="main_fee" value="{{ $result['data']['CtrlPostage'] }}">
        <input type="hidden" name="cod_fee" value="{{ $result['data']['Cod'] }}">
        <input type="hidden" name="expected_at" value="{{ $result['data']['DateExpected'] }}">
        @else
        <input type="hidden" name="main_fee" value="{{ $data['main_fee'] }}">
        <input type="hidden" name="cod_fee" value="{{ $data['cod_fee'] }}">
        <input type="hidden" name="expected_at" value="{{ $data['expected_at'] }}">
        @endif

        <input type="hidden" name="amount" value="{{ $data['step1']['amount'] }}">
        <input type="hidden" name="service_id" value="{{ $data['step1']['service_id'] }}">
        <input type="hidden" name="dichvu" value="{{ $data['step1']['dichvu'] }}">
        <input type="hidden" name="weight" value="{{ $data['step1']['weight'] }}">
        <input type="hidden" name="cargo_content_id" value="{{ $data['step1']['cargo_content_id'] }}">
        <input type="hidden" name="cargo_content" value="{{ $data['step1']['cargo_content'] }}">

        <input type="hidden" name="s_name" value="{{ $data['step2']['s_name'] }}">
        <input type="hidden" name="s_phone" value="{{ $data['step2']['s_phone'] }}">
        <input type="hidden" name="s_address" value="{{ $data['step2']['s_address'] }}">
        <input type="hidden" name="chon_tinh_noigui" value="{{ $data['step2']['chon_tinh_noigui'] }}">
        <input type="hidden" name="chon_quan_noigui" value="{{ $data['step2']['chon_quan_noigui'] }}">
        <input type="hidden" name="chon_phuong_noigui" value="{{ $data['step2']['chon_phuong_noigui'] }}">

        @if( isset($data['step2']['ngay_giao_noigui']) )
        <input type="hidden" name="ngay_giao_noigui" value="{{ $data['step2']['ngay_giao_noigui'] }}">
        <input type="hidden" name="gio_giao_noigui" value="{{ $data['step2']['gio_giao_noigui'] }}">
        <input type="hidden" name="phut_giao_noigui" value="{{ $data['step2']['phut_giao_noigui'] }}">
        @endif

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
        <!-- cờ -->
        <input type="hidden" name="flag" value="1">
    </form>

	<div class="row all_div">
		<div class="left_taodon_HT col-lg-6 mt-3">
			<div class="row">
				<div class="button_nguoigui col-6 p-0">
					<button onclick="change_nguoigui()" type="">Người gửi</button>
				</div>
				<div class="button_nguoinhan col-6 p-0">
					<button onclick="change_nguoinhan()" type="">Người nhận</button>
				</div>
				<div class="col-12 thongtin p-0">
					<div class="row nguoi_gui">
						<div class="col-6 hoten pr-0">
							<div>
								<img src="{{asset('images/NTX - Icon/Small 50x50/Account.png')}}" alt="">
							</div>
							<span>{{ $data['step2']['s_name'] }}</span>
						</div>
						<div class="sdt col-6">
							<div>
								<img src="{{asset('images/NTX - Icon/Small 50x50/Phone Blue.png')}}" alt="">
							</div>
							<span>{{ $data['step2']['s_phone'] }}</span>
						</div>
						<div class="col-12 diachi">
							<div>
								<img src="{{asset('images/NTX - Icon/Small 50x50/Address Blue.png')}}" alt="">
							</div>
							
							<span>
								{{ $data['step2']['s_address'] }}, 
								{{ $data['step2']['chon_phuong_noigui'] }}, 
								{{ $data['step2']['chon_quan_noigui'] }},
								{{ $data['step2']['chon_tinh_noigui'] }}
							</span>
						</div>

						@if($data['step1']['service_id'] === 'Hẹn giờ')
						<div class="col-12 diachi">
							<div>
								<img src="{{asset('images/NTX - Icon/Small 50x50/Time Blue.png')}}" alt="">
							</div>
							<span>
								{{ $data['step2']['ngay_giao_noigui'] }} |
								{{$data['step2']['gio_giao_noigui']}} : 
								{{$data['step2']['phut_giao_noigui']}}
							</span>
						</div>
						@endif

						<div class="col-12 ghichu">
							<h1>Ghi chú:</h1>
							<p></p>
						</div>
					</div>
					<div style="display: none;" class="row nguoi_nhan">
						<div class="col-6 hoten">
							<div>
								<img src="{{asset('images/NTX - Icon/Small 50x50/Account.png')}}" alt="">
							</div>
							<span>{{ $data['step3']['r_name'] }}</span>
						</div>
						<div class="sdt col-6">
							<div>
								<img src="{{asset('images/NTX - Icon/Small 50x50/Phone Blue.png')}}" alt="">
							</div>
							<span>{{ $data['step3']['r_phone'] }}</span>
						</div>
						<div class="col-12 diachi">
							<div>
								<img src="{{asset('images/NTX - Icon/Small 50x50/Address Blue.png')}}" alt="">
							</div>
							
							<span>
								{{ $data['step3']['r_address'] }},
								{{ $data['step3']['chon_phuong_noinhan'] }}, 
								{{ $data['step3']['chon_quan_noinhan'] }},
								{{ $data['step3']['chon_tinh_noinhan'] }}
							</span>
						</div>
						<div class="col-12 ghichu">
							<h1>Ghi chú:</h1>
							<p></p>
						</div>
					</div>
					<div class="fix">
						<button onclick="sua_thongtin()" type="">Sửa</button>
					</div>
				</div>
			</div>
		</div>

		<div class="right_taodon_HT col-lg-6 mt-3">
    		<div class="order-right ">
    			<div class="thongtin row">
    				<div class="col-7 dichvu_KL">
    					@if(isset($data['step1']))
    						@if($data['step1']['service_id'] === 'Hẹn giờ')
	    					<div>
	    						<img src="{{asset('images/NTX - Icon/Large 512x512/Time set.png')}}" alt="">
		    				</div>
		    				@elseif( $data['step1']['service_id'] === 'Nhanh' )
		    				<div>
	    						<img src="{{asset('images/NTX - Icon/Large 512x512/Fast.png')}}" alt="">
		    				</div>
	    					@else
	    					<div>
    							<img src="{{asset('images/NTX - Icon/Large 512x512/Basic.png')}}" alt="">
	    					</div>
	    					@endif
	    				@endif
	    				<div class="ten_dichvu_KL">
	    					<h1>{{$data['step1']['service_id']}}</h1>
	    					@if($data['step1']['weight'] == "2")
	    						<p>0 - 3kg</p>
	    					@elseif($data['step1']['weight'] == "4")
	    						<p>3 - 5kg</p>
	    					@else
	    						<p>Trên 5 kg</p>
	    					@endif
	    				</div>
	    			</div>
	    			<div class="col-5 fix_thongtin">
	    				<button onclick="change_step_1()" type="">Sửa</button>
	    			</div>
	    			<div class="QR">
	    				<center>
                            <img class="w-100" src="{{asset('images/qr-code 1.png')}}" alt="">
                        </center>
	    			</div>
	    			<div class="thongtin_vandon">
	    				<h1>#204956</h1>
	    				<table class="w-100">
	    					<thead>
								<tr>
									<th width="50%"></th>
									<th width="50%"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
		    						<td>Loại vận chuyển:</td>
		    						<td>
		    							<span>
		    								@if($id === '1')
		    									Xe máy
		    								@else
		    									Xe tải
		    								@endif
		    							</span>
		    						</td>
		    					</tr>
		    					<tr>
		    						<td >Loại Hàng hóa:</td>
                                    <td class="carol_content">
                                    	@if( isset($data['step1']['cargo_content_id']))
                                    	{{ $data['step1']['cargo_content_id'] }}
                                    	@else
                                    	{{ $data['step1']['cargo_content'] }}
                                    	@endif
                                    </td>
		    					</tr>
		    					<tr>
		    						<td>Thời gian dự kiến:</td>
		    						<td>
		    							@if( isset( $result) )
		    								{{ $result['data']['DateExpected'] }}
		    							@else
		    								{{ $data['expected_at'] }}
		    							@endif
		    						</td>
		    					</tr>
							</tbody>
	    				</table>
	    			</div>
	    			<div class="chiphi_tienthu col-12">
	    				<table class="w-100">
	    					<thead>
								<tr>
									<th width="50%"></th>
									<th width="50%"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
		    						<td>Phí dịch vụ:</td>
		    						<td id="service_fees">
		    							<span>
		    								@if( isset( $result) )
		    								{{ $result['data']['ControlAmt'] }}
		    								@else
		    								{{ $data['main_fee'] }}
		    								@endif
		    							</span> vnđ
		    						</td>
		    					</tr>
		    					<tr>
		    						<td >Tiền thu hộ (COD):</td>
                                    <td>
                                    	<span style="font-weight: normal;">
                                    		@if(isset($data['step1']['amount']))
                                    			{{$data['step1']['amount']}}
                                    		@else
                                    			0
                                    		@endif
                                    	</span> vnđ
                                    </td>
		    					</tr>
							</tbody>
	    				</table>
	    			</div>
	    		</div>
	    		<div class="khuyenmai_vandon">
	    			<div class="img_khuyenmai">
	    				<img src="{{asset('images/NTX - Icon/Small 50x50/Gift.png')}}">
	    			</div>
	    			<div class="input_khuyenmai">
	    				<input type="text" name="input_khuyenmai" placeholder="Nhập mã khuyến mãi nếu có">
	    			</div>
	    		</div>
    		</div>
		</div>
	</div>
	<div class="fixed-bottom button-footer">
        <div class="row">
            <div class="col-6">
                <button onclick="back_step()" class="btn-pre"><img src="{{asset('images/NTX - Icon/Small 50x50/Blue Arrow 3.1.png')}}" alt="">Quay lại</button>
                <button OnClick=" location.href='7-inch/chon-tao-don'" class="cancel">Hủy đơn</button>
            </div>
            <div class="col-6">
                <button onclick="submit_next()" class="w-100 text-white btn-next">
                	<span>Thanh toán</span>
                	<img class="img_next_button" src="{{asset('images/NTX - Icon/Small 50x50/White Arrow 3.2.png')}}" alt="">
                </button>
            </div>
        </div>
    </div>
</section>



@endsection
@section('script')
<script>
	 $(document).ready(function() {
        service_fees()
    });
	function change_nguoigui(){
		$('.nguoi_nhan').hide();
		$('.nguoi_gui').show();
		$('.button_nguoinhan button').css('background','#C4C4C4');
		$('.button_nguoigui button').css('background','#00428D');
	}
	function change_nguoinhan(){
		$('.nguoi_nhan').css('display','flex');
		$('.nguoi_gui').css('display','none');
		$('.button_nguoinhan button').css('background','#00428D');
		$('.button_nguoigui button').css('background','#C4C4C4');
	}
	function sua_thongtin(){
		var id = <?php echo $id ?>;
		if($('.nguoi_nhan').css('display') === 'none')
		{
			$('#form_submit').attr('action', "7-inch/quay-lai/"+id+"/1").submit();
		}else{
			$('#form_submit').attr('action', "7-inch/quay-lai/"+id+"/2").submit();
		}
	}

	function back_step(){
		var id = <?php echo $id ?>;
        $('#form_submit').attr('action', "7-inch/quay-lai/"+id+"/3").submit();
    };

    function submit_next(){
    	var id = <?php echo $id ?>;
		$('#form_submit').attr('action', "7-inch/tao-don-hoantat/"+id+"/thanhtoan").submit();
    }

    function change_step_1(){
    	var id = <?php echo $id ?>;
    	$('#form_submit').attr('action', "7-inch/quay-lai/"+id+"/3").submit();
    }
    function service_fees(){
        var service_fees = $('#service_fees span').html();
        var format_service_fees =  new Intl.NumberFormat("en-US").format(service_fees);
        $('#service_fees span').html(format_service_fees);
    }
</script>
@endsection