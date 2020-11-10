@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pages/7inch.css') }}">
@endsection

@section('content')

<section>
	<form action="7-inch/tao-don-hoantat/{{$id}}/hoantat" id="form_submit" method="POST">
	 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	 	<input type="hidden" name="payment_method_id" value="10">
        <input type="hidden" name="package_no" value="1">

	 	@if( isset($data['step2']) )
	 	<input type="hidden" name="s_name" value="{{ $data['step2']['s_name'] }}">
        <input type="hidden" name="s_phone" value="{{ $data['step2']['s_phone'] }}">
        <input type="hidden" name="s_address" value="{{ $data['step2']['s_address'] }}">
        <input type="hidden" name="chon_tinh_noigui" value="{{ $data['step2']['chon_tinh_noigui'] }}">
        <input type="hidden" name="chon_quan_noigui" value="{{ $data['step2']['chon_quan_noigui'] }}">
        <input type="hidden" name="chon_phuong_noigui" value="{{ $data['step2']['chon_phuong_noigui'] }}">
        <!-- id tinh quan phuong data step2 -->
        <input type="hidden" name="s_province_id" value="{{ $data['step2']['s_province_id'] }}">
        <input type="hidden" name="s_district_id" value="{{ $data['step2']['s_district_id'] }}">
        <input type="hidden" name="s_ward_id" value="{{ $data['step2']['s_ward_id'] }}">
        @endif

        @if( isset($data['step3']) )
        <input type="hidden" name="r_name" value="{{ $data['step3']['r_name'] }}">
        <input type="hidden" name="r_phone" value="{{ $data['step3']['r_phone'] }}">
        <input type="hidden" name="r_address" value="{{ $data['step3']['r_address'] }}">
        <input type="hidden" name="chon_tinh_noinhan" value="{{ $data['step3']['chon_tinh_noinhan'] }}">
        <input type="hidden" name="chon_quan_noinhan" value="{{ $data['step3']['chon_quan_noinhan'] }}">
        <input type="hidden" name="chon_phuong_noinhan" value="{{ $data['step3']['chon_phuong_noinhan'] }}">
        <!-- id tinh quan phuong data step3 -->
        <input type="hidden" name="r_province_id" value="{{ $data['step3']['r_province_id'] }}">
        <input type="hidden" name="r_district_id" value="{{ $data['step3']['r_district_id'] }}">
        <input type="hidden" name="r_ward_id" value="{{ $data['step3']['r_ward_id'] }}">
	    @endif


		<div class="row all_div">
			<div class="left_taodon col-lg-7">
				<div class="row">
					<div class="loaidichvu col-6 col-lg-6 mt-5">
						<div class="row">

							<div class="input_hidden_choose">
		    					<input type="hidden" name="service_id" value="">
			    			</div>
			    			<div class="service_string_hidden"></div>
			    			<div class="input_hidden_KL"></div>
			    			<div class="input_amt"></div>
			    			<div class="input_hidden_Hanghoa"></div>

							<h1 class="title_taodon col-12">Loại dịch vụ</h1>
							<div class="service_id mt-4 col-12" onclick="change(1)" id="choose-1" value="Tiêu chuẩn" service="2">
								<div class="row">
									<div class="col-7">
		    							<h1>Tiêu chuẩn</h1>
		    							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			    					</div>
			    					<div class="col-5 img_dichvu" >
			    						<img class="img" src="{{asset('images/NTX - Icon/Large 512x512/Basic.png')}}" alt="">
			    					</div>
								</div>
		    				</div>
		    				<div class="service_id mt-4 col-12" onclick="change(2)" id="choose-2" value="Nhanh" service="1">
								<div class="row">
									<div class="col-7">
		    							<h1>Nhanh</h1>
		    							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			    					</div>
			    					<div class="col-5 img_dichvu" >
			    						<img class="img" src="{{asset('images/NTX - Icon/Large 512x512/Fast.png')}}" alt="">
			    					</div>
								</div>
		    				</div>
		    				<div class="service_id mt-4 col-12" onclick="change(3)" id="choose-3" value="Hẹn giờ" service="3">
								<div class="row">
									<div class="col-7">
		    							<h1>Hẹn giờ</h1>
		    							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			    					</div>
			    					<div class="col-5 img_dichvu" >
			    						<img class="img" src="{{asset('images/NTX - Icon/Large 512x512/Time set.png')}}" alt="">
			    					</div>
								</div>
		    				</div>
						</div>
					</div>

					<div class="khoiluong col-6 col-lg-6 mt-5">
						<div class="row">
							<h1 class="title_taodon col-12">Khối lượng</h1>
							<div class="weight mt-4 col-12" onclick="KL(1)" id="KL-1" data-value="2">
								<div class="row">
									<div class="col-12">
		    							<h1>0 - 3kg</h1>
		    							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		    							<h3>Chỉ từ <span>20.000</span> vnđ</h3>
			    					</div>
								</div>
		    				</div>
		    				<div class="weight mt-4 col-12" onclick="KL(2)" id="KL-2" data-value="4">
								<div class="row">
									<div class="col-12">
		    							<h1>3 - 5kg</h1>
		    							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		    							<h3>Chỉ từ <span>25.000</span> vnđ</h3>
			    					</div>
								</div>
		    				</div>
		    				<div class="weight mt-4 col-12" onclick="KL(3)" id="KL-3" data-value="6">
								<div class="row">
									<div class="col-12">
		    							<h1>Trên 5kg</h1>
		    							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		    							<h3>Chỉ từ <span>30.000</span> vnđ</h3>
			    					</div>
								</div>
		    				</div>
						</div>
					</div>
				</div>
			</div>

			<div  class="right_taodon col-lg-5">
				<div class="mt-5 row">
					<h1 class="title_taodon col-12">Tiền thu hộ</h1>
					<div class="input_tienthu mt-4">
						<div id="form_tienthu">
						    <p class="mb-1">
						        <div class="form_amount">
						            @if( isset($data['step1']['amount']) )
						            <input id="amount" class="form-control" name="amount" type="text" maxlength="15" placeholder="Tiền thu hộ" value="{{ $data['step1']['amount'] }}" />
						            @else
						            <input id="amount" class="form-control" name="amount" type="text" maxlength="15" placeholder="Tiền thu hộ" value=""/>
						            @endif
						            <div class="currency">
						            	<span >vnđ</span>
						            </div>
						        </div>
						    </p>
						</div>
					</div>
				</div>
				<div class="mt-2 row">
					<h1 class="title_loaihanghoa col-12 mb-0">Loại hàng hóa</h1>
				</div>
				<div class="row">
					<div class="loaiHH col-lg-12 p-0">
	    				<ul>
	    					<li class="chon_HH" onclick="HangHoa(1)" id="HH-1" li-hanghoa-id="li_id_1" tenhanghoa="Thực phẩm">Thực phẩm</li>
	    					<li class="chon_HH" onclick="HangHoa(2)" id="HH-2" li-hanghoa-id="li_id_2" tenhanghoa="Quà tặng">Quà tặng</li>
	    					<li class="chon_HH" onclick="HangHoa(3)" id="HH-3" li-hanghoa-id="li_id_3" tenhanghoa="Hoa">Hoa</li>
	    					<li class="chon_HH" onclick="HangHoa(4)" id="HH-4" li-hanghoa-id="li_id_4" tenhanghoa="Điện tử">Điện tử</li>
	    					<li class="chon_HH" onclick="HangHoa(5)" id="HH-5" li-hanghoa-id="li_id_5" tenhanghoa="Bánh ngọt">Bánh ngọt</li>
	    				</ul>
	    			</div>
				</div>
				<div class="khac">
					<input type="text" 
						name="cargo_content" 
						placeholder="Khác" 
						id="HH_khac"
						@if( isset($data['step1']['cargo_content']) )
						value="{{ $data['step1']['cargo_content'] }}" 
						@endif
					>
					<span class="error"><i></i></span>
				</div>
				<div class="s_time_POS" >
                    <h3 class="time_ship mt-2 mt-3">{{ trans('messages.time_ship_to') }}</h3>
                    <div class="row thoigian_POS mt-2">
                        <div class="col-lg-4 col-12 mt-2 p-0 ngay_giao_nhan">
                            <label for="">{{ trans('messages.day') }}:</label>
                            <select id="ngay_giao_noigui" onchange="next_date()" name="ngay_giao_noigui"
                                    class="w-75 ngay_giao_noigui">
                            </select>
                        </div>
                        <div class="col-lg-4 mt-2 p-0">
                            <label class="hours" for="">{{ trans('messages.hour') }}:</label>
                            <select name="gio_giao_noigui" class="w-75 h-100 gio_giao_noigui">

                            </select>
                        </div>
                        <div class="col-lg-4 mt-2 p-0">
                            <label class="minute" for="">{{ trans('messages.minute') }}:</label>
                            <select id="seconds" name="phut_giao_noigui" class="w-75 h-100 phut_giao_noigui">
                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                    </div>
                </div>
			</div>
		</div>

	</form>
	<div class="fixed-bottom button-footer">
        <div class="row">
            <div class="col-6">
                <button onclick="back_step()" class="w-100 btn-pre"><img src="{{asset('images/NTX - Icon/Small 50x50/Blue Arrow 3.1.png')}}" alt="">Quay lại</button>
            </div>
            <div class="col-6">
                <button onclick="submit(event)" class="w-100 text-white btn-next">
                	<span>Tiếp tục</span>
                	<img class="img_next_button" src="{{asset('images/NTX - Icon/Small 50x50/White Arrow 3.2.png')}}" alt="">
                </button>
            </div>
        </div>
    </div>
</section>



@endsection
@section('script')
<script>
	$(window).on('load', function() {
		$('.ngay_giao_noigui').attr('disabled',true); 
    	$('.gio_giao_noigui').attr('disabled',true); 
    	$('.phut_giao_noigui').attr('disabled',true);
		$('.s_time_POS').hide();
		old_service();
		loadDefaultChoosenKL();
		loadDefaultChoosenHH();
		loadDefaultChoosenService();
		cargo_content_iseet();
		get_time();
		next_date();
		var seconds = "<?php if ( isset($data['step2']['phut_giao_noigui'])) {
    							echo $data['step2']['phut_giao_noigui'];
    						} else {
    							echo '00';
    						} ?>";
    	$('#seconds option[value='+seconds+']').attr('selected','selected');
    	
	});

	function back_step(){
        var id = <?php echo $id ?>;
        $('#form_submit').attr('action', "7-inch/quay-lai/"+id+"/2").submit();
    };
    //ktra loại hàng hóa khác
    function cargo_content_iseet(){
    	var cargo_content_iseet = "<?php if ( isset($data['step1']['cargo_content'])) {
    						echo $data['step1']['cargo_content'];
    					} else {
    						echo 'null';
    					} ?>";
    	if (cargo_content_iseet !== 'null') {
    		$('.chon_HH').css({
	    		'background': '',
	    		'color': ''
	    	});
    	}
    }

	function loadDefaultChoosenService() {
    	var service_id = "<?php if ( isset($data['step1']['service_id'])) {
    							echo $data['step1']['service_id'];
    						} else {
    							echo 'null';
    						} ?>";
    	if (service_id === 'Hẹn giờ') {
    		$('.s_time_POS').show();
    		$('.chon_HH').css({
    			'line-height': '60px',
    			'height': '64px'
    		});
    		$('.ngay_giao_noigui').attr('disabled',false); 
    		$('.gio_giao_noigui').attr('disabled',false); 
    		$('.phut_giao_noigui').attr('disabled',false);
    	}
	    if (service_id !== 'null' ) {
	    	var buttons = document.getElementsByClassName("service_id");
	    	for(i = 1; i <= buttons.length; i++){
	    		var btndId = "choose-" + i;
                if (document.getElementById(btndId).getAttribute('value') === service_id) {
                	document.getElementById(btndId).style.background = '#2366B1';
                	document.getElementById(btndId).style.border = '1px solid #C8C8C8';
                	document.getElementById(btndId).style.color = 'white';
                	$('#'+ btndId).find(".img_dichvu").css("filter", "unset");
                	$('.input_hidden_choose').html('<input type="hidden" name="service_id" value="'+service_id+'">');
                	break;
                }
	    	}
	    } else {
	       document.getElementById('choose-1').style.border = '1px solid #C8C8C8';
	       document.getElementById('choose-1').style.color = 'white';
	       document.getElementById('choose-1').style.background = '#2366B1';
	       $('#choose-1').find(".img_dichvu").css("filter", "unset");
           $('.input_hidden_choose').html('<input type="hidden" name="service_id" value="Tiêu chuẩn">');
           $('.service_string_hidden').html('<input type="hidden" name="dichvu" value="2">');
	    }
    }

    function loadDefaultChoosenKL(){
    	var weight = "<?php if ( isset($data['step1']['weight'])) {
    						echo $data['step1']['weight'];
    					} else {
    						echo 'null';
    					} ?>";
    	if (weight !== 'null') {
	    	var KL_HH = document.getElementsByClassName("weight");
	    	for(i = 1; i <= KL_HH.length; i++){
	    		var getKL = "KL-" + i;
                if (document.getElementById(getKL).getAttribute('data-value') === weight) {
                	document.getElementById(getKL).style.background = '#2366B1';
    				document.getElementById(getKL).style.color = 'white';
    				$('#'+ getKL).find("span").css("color", "yellow");
                	$('.input_hidden_KL').html('<input type="hidden" name="weight" value="'+weight+'">');
                	break;
                }
	    	}
	    } else {
	       	document.getElementById('KL-1').style.background = '#2366B1';
    		document.getElementById('KL-1').style.color = 'white';
    		$('#KL-1').find("span").css("color", "yellow");
    		$('.input_hidden_KL').html('<input type="hidden" name="weight" value="2">');
	    }
    }

    function loadDefaultChoosenHH() {
    	var cargo_content_id = "<?php if ( isset($data['step1']['cargo_content_id'])) {
    							echo $data['step1']['cargo_content_id'];
    						} else {
    							echo 'null';
    						} ?>";
	    if (cargo_content_id !== 'null' ) {
	    	var chon_HH = document.getElementsByClassName("chon_HH");
	    	for(i = 1; i <= chon_HH.length; i++){
	    		var getHH = "HH-" + i;
                if (document.getElementById(getHH).getAttribute('tenhanghoa') === cargo_content_id) {
                	document.getElementById(getHH).style.background = '#00428D';
    				document.getElementById(getHH).style.color = 'white';
                	$('.input_hidden_Hanghoa').html('<input type="hidden" name="cargo_content_id" value="'+cargo_content_id+'">');
                	break;
                }
	    	}
	    } else {
	       	document.getElementById('HH-1').style.background = '#00428D';
      		document.getElementById('HH-1').style.color = 'white';
	  		$('.input_hidden_Hanghoa').html('<input type="hidden" name="cargo_content_id" value="Thực phẩm">');
	    }
    }
	
	// chọn dịch vụ
	function change(a) {
    	var buttons = document.getElementsByClassName("service_id");
    	for(i = 1; i <= buttons.length; i++){
    		var btndId = "choose-" + i;
    		document.getElementById(btndId).style.border = '1px solid #C8C8C8';
    		document.getElementById(btndId).style.background = 'white';
    		document.getElementById(btndId).style.color = '#00428D';
    		$('#' + btndId).find(".img_dichvu").css("filter", "grayscale(100%)");
    	}
    	var btndId = "choose-" + a;
    	document.getElementById(btndId).style.border = '1px solid #C8C8C8';
    	document.getElementById(btndId).style.background = '#2366B1';
    	document.getElementById(btndId).style.color = 'white';
    	$('#' + btndId).find(".img_dichvu").css("filter", "unset");
    	var value = document.getElementById(btndId).getAttribute('value');
    	var service = document.getElementById(btndId).getAttribute('service');
    	console.log(value);
    	$('.input_hidden_choose').html('<input type="hidden" name="service_id" value="'+value+'">');
    	$('.service_string_hidden').html('<input type="hidden" name="dichvu" value="'+service+'">');
    	if (value === 'Hẹn giờ') {
    		$('.s_time_POS').show();
    		$('.ngay_giao_noigui').attr('disabled',false); 
    		$('.gio_giao_noigui').attr('disabled',false); 
    		$('.phut_giao_noigui').attr('disabled',false);
    		$('.chon_HH').css({
    			'line-height': '60px',
    			'height': '64px'
    		});
    	} else {
    		$('.ngay_giao_noigui').attr('disabled',true); 
    		$('.gio_giao_noigui').attr('disabled',true); 
    		$('.phut_giao_noigui').attr('disabled',true);
    		$('.s_time_POS').hide();
    		$('.chon_HH').css({
    			'line-height': '85px',
    			'height': '94px'
    		});
    	}
	}
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
	// chọn khối lượng
	function KL(b) {
		var KL_HH = document.getElementsByClassName("weight");
    	for(i = 1; i <= KL_HH.length; i++){
    		var getKL = "KL-" + i;
    		var element_get_KL = document.getElementById(getKL);
    		element_get_KL.style.background = 'white';
    		element_get_KL.style.color = '#00428D';
    		$('#' + getKL).find("span").css("color", "#00428D");
    	}
    	getKL = "KL-" + b;
    	document.getElementById(getKL).style.background = '#2366B1';
    	document.getElementById(getKL).style.color = 'white';
    	$('#' + getKL).find("span").css("color", "yellow");
		var result = document.getElementById(getKL).getAttribute('data-value');
		$('.input_hidden_KL').html('<input type="hidden" name="weight" value="'+result+'">');
	}
	// chọn hàng hóa
	function HangHoa(c) {
		var chon_HH = document.getElementsByClassName("chon_HH");
    	for(i = 1; i <= chon_HH.length; i++){
    		var getHH = "HH-" + i;
    		var element_get_HH = document.getElementById(getHH);
    		element_get_HH.style.background = 'white';
    		element_get_HH.style.color = '#757575';
    	}
    	getHH = "HH-" + c;
    	document.getElementById(getHH).style.background = '#00428D';
    	document.getElementById(getHH).style.color = 'white';
    	var element_get_HH = document.getElementById(getHH);
    	var tenhanghoa = element_get_HH.getAttribute('tenhanghoa');
    	$('.input_hidden_Hanghoa').html('<input type="hidden" name="cargo_content_id" id="input_'+getHH+'" value="'+tenhanghoa+'">');
    	$('#HH_khac').val('');  
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
                for (var i = (hours+1); i <= 18; i++) {
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
        
        var $form = $( "#form_tienthu" );
        var $input = $form.find( "input" );

        $input.on( "keyup", function( event ) {
            // When user select text in the document, also abort.
            var selection = window.getSelection().toString();
            if ( selection !== '' ) {
                return;
            }
            // When the arrow keys are pressed, abort.
            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                return;
            }
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
    $("#HH_khac").blur(function(){
    	var str = $("#HH_khac").val();
    	if ( str !== "") {
    		$('.chon_HH').css({
	    		'background': '',
	    		'color': ''
	    	});
    	}
    })
    //kiểm tra validate
    function submit(event){
    	var str = $("#HH_khac").val();
        if ( str == "") {
		    check_amount();
		} else {
    		var form = $('#form_submit');
	        event.preventDefault();
	        $.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
	        $.ajax({
	            url: "{{ route('validate_step3') }}", 
	            method: 'POST',
	            data: form.serialize(),
	            dataType: 'JSON',
	            success: res => {
	                if ( res.status == '201' ){
	                    if(typeof res.message !== 'undefined' ){
	                        $('.error').css('display','flex');
	                        if (typeof res.message.cargo_content !== 'undefined'){
	                            $('.error').text(res.message.cargo_content[0]).css('display','block');
	                        }
	                    }
	                } else {
	                	$('.input_hidden_Hanghoa').html('<input type="hidden" name="cargo_content" value="'+str+'">');
	                   	check_amount();
	                }
	            }
	        })
		}		
    };
    $('.form-control').on('focus', function (){
        $(this).parent().find('.error').css('display','none');
    });

    function check_amount(){
    	var amount = $('input[name="amount"]').val();
        var input = amount.replace(/,/g, '');
        $('.input_amt').html('<input type="hidden" name="input_amt" value="'+input+'">');
    	$('#form_submit').submit();
    }
</script>
@endsection