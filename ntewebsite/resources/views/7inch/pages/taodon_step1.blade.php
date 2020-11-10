@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pages/7inch.css') }}">
@endsection

@section('content')
    <form action="7-inch/tao-don-2/{{$id}}" method="post" id="form_submit">
        {{ csrf_field() }}
        @if( isset($data['flag']))
        <input type="hidden" name="main_fee" value="{{ $data['main_fee'] }}">
        <input type="hidden" name="cod_fee" value="{{ $data['cod_fee'] }}">
        <input type="hidden" name="expected_at" value="{{ $data['expected_at'] }}">

        <input type="hidden" name="amount" value="{{ $data['step1']['amount'] }}">
        <input type="hidden" name="dichvu" value="{{ $data['step1']['dichvu'] }}">
        <input type="hidden" name="service_id" value="{{ $data['step1']['service_id'] }}">
        <input type="hidden" name="weight" value="{{ $data['step1']['weight'] }}">
        <input type="hidden" name="cargo_content_id" value="{{ $data['step1']['cargo_content_id'] }}">
        <input type="hidden" name="cargo_content" value="{{ $data['step1']['cargo_content'] }}">

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

        <div class="KV_hidden">
            <div id="chon_tinh">
                @if(isset($data['step2']['chon_tinh_noigui']))
                    <input type="hidden" name="chon_tinh_noigui" value="{{ $data['step2']['chon_tinh_noigui'] }}">
                @else
                    <input type="hidden" id="chon_tinh_noigui" name="chon_tinh_noigui" value="">
                @endif
            </div>
            <div id="chon_tinh_id">
                @if(isset($data['step2']['s_province_id']))
                    <input type="hidden" name="s_province_id" value="{{ $data['step2']['s_province_id'] }}">
                @endif
            </div>
            <div id="chon_quan">
                @if(isset($data['step2']['chon_quan_noigui']))
                    <input type="hidden" name="chon_quan_noigui" value="{{ $data['step2']['chon_quan_noigui'] }}">
                @else
                    <input type="hidden" id="chon_quan_noigui" name="chon_quan_noigui" value="">
                @endif
            </div>
            <div id="chon_quan_id">
                @if(isset($data['step2']['s_district_id']))
                    <input type="hidden" name="s_district_id" value="{{ $data['step2']['s_district_id'] }}">
                @endif
            </div>
            <div id="chon_phuong">
                @if(isset($data['step2']['chon_phuong_noigui']))
                    <input type="hidden" name="chon_phuong_noigui" value="{{ $data['step2']['chon_phuong_noigui'] }}">
                @else
                    <input type="hidden" id="chon_phuong_noigui" name="chon_phuong_noigui" value="">
                @endif
            </div>
            <div id="chon_phuong_id">
                @if(isset($data['step2']['s_ward_id']))
                    <input type="hidden" name="s_ward_id" value="{{ $data['step2']['s_ward_id'] }}">
                @endif
            </div>
        </div>

    	<div class="row">
    		<h1 class="title_taodon col-10 mt-2 ml-5 mb-0">Người gửi</h1>
    		<div class="left_taodon_2 col-lg-6">
    			<div class="row mt-1">
    				<div class="col-12 hoten_noigui mt-2">
    					<input class="w-100 form-control phone" type="text" id="s_name" name="s_name" placeholder="Họ tên người gửi" 
                        @if(isset($data['step2']['s_name']))
                        value="{{$data['step2']['s_name']}}"
                        @endif
                        >
                        <span class="error-s_name error"><i></i></span>
    				</div>
    				<div class="col-12 s_phone mt-2">
    					<input class="w-100 form-control phone" type="text" id="sodienthoai_noigui" name="s_phone" placeholder="Nhập số điện thoại" 
                        @if(isset($data['step2']['s_phone']))
                        value="{{ $data['step2']['s_phone'] }}"
                        @endif
                        >
                        <span class="error-s_phone error"><i></i></span>
    				</div>
    			</div>
    		</div>

    		<div  class="right_taodon_2 col-lg-6">
    			<div class="row mt-1">
    				<div class="col-12 khuvuc_noigui mt-2">
    					<ul id="chon_ten_tinh">  
                            @if(isset($data['step2']))
                                <li>{{ $data['step2']['chon_tinh_noigui'] }}</li>
                                <li>{{ $data['step2']['chon_quan_noigui'] }}</li>
                                <li>{{ $data['step2']['chon_phuong_noigui'] }}</li>
                            @else
                                <p class="pt-1 pb-1 m-0 pl-2 p_KV">Khu vực</p>
                            @endif      
                        </ul>
                        <div class="delete">
                            <span class="delete_KV" onclick="delete_all()"><u>{{ trans('messages.delete_all') }}</u></span>
                        </div>
    				</div>
                    
                    <div class="error_tinh_quan_phuong" style="display: flex;">
                        <p class="error-chon_tinh_noigui error pl-0"></p>
                        <p class="error-chon_quan_noigui error pl-3"></p>
                        <p class="error-chon_phuong_noigui error pl-3"></p>
                        <p class="error-check-area error pl-3"></p>
                    </div>
    				<div class="col-lg-12 KV mt-1 p-0">
    					<ul class="TP">
                            <li onclick="tinhthanh(50, 'Hồ Chí Minh')" id="50">TP.HCM</li>
                            <li onclick="tinhthanh(29, 'Hà Nội')" id="29">Hà Nội</li>
                            <li onclick="tinhthanh(43, 'Đà Nẵng')" id="43">Đà Nẵng</li></ul>
    					</ul>
    				</div>
    				<div class="KVK col-lg-12 mt-1 p-0">
    					<h4 class="khu_vuc_khac"><span>Khu vực khác</span></h4>
    					<h4 class="quan_huyen" style="display: none;"><span>Quân/Huyện</span></h4>
    					<h4 class="phuong" style="display: none;"><span>Phường/Xã</span></h4>

    					<ul class="tinh_quan_huyen">
    						<li onclick="chon_ten_KV(event, A);" class="filter-alpha"  id="A">A</li>
                            <li onclick="chon_ten_KV(event, B);" class="filter-alpha"  id="B">B</li>
                            <li onclick="chon_ten_KV(event, C);" class="filter-alpha"  id="C">C</li>
                            <li onclick="chon_ten_KV(event, Đ);" class="filter-alpha"  id="Đ">Đ</li>
                            <li onclick="chon_ten_KV(event, G);" class="filter-alpha"  id="G">G</li>
                            <li onclick="chon_ten_KV(event, H);" class="filter-alpha"  id="H">H</li>
                            <li onclick="chon_ten_KV(event, K);" class="filter-alpha"  id="K">K</li>
                            <li onclick="chon_ten_KV(event, L);" class="filter-alpha"  id="L">L</li>
                            <li onclick="chon_ten_KV(event, N);" class="filter-alpha"  id="N">N</li>
                            <li onclick="chon_ten_KV(event, P);" class="filter-alpha"   id="P">P</li>
                            <li onclick="chon_ten_KV(event, Q);" class="filter-alpha"   id="Q">Q</li>
                            <li onclick="chon_ten_KV(event, S);" class="filter-alpha"   id="S">S</li>
                            <li onclick="chon_ten_KV(event, T);" class="filter-alpha"   id="T">T</li>
                            <li onclick="chon_ten_KV(event, V);" class="filter-alpha"   id="V">V</li>
                            <li onclick="chon_ten_KV(event, Y);" class="filter-alpha"   id="Y">Y</li>
    					</ul>
    				</div>
    				<div class="col-lg-12 ten-KV mt-1 p-0">
    					<ul class="province-by-alpha">

    					</ul>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-lg-12 diachi mt-1 p-0">
    					<input class="w-100 form-control" id="s_address" type="text" name="s_address" placeholder="Địa chỉ"
                        @if(isset($data['step2']['s_address']))
                        value="{{$data['step2']['s_address']}}"
                        @endif>
                        <span class="error-s_address error"></span>
    				</div>
    			</div>
    		</div>
    	</div>
    </form>
    <div class="fixed-bottom button-footer">
        <div class="row">
            <div class="col-6">
                <button OnClick=" location.href='7-inch/chon-tao-don'" class="w-100 btn-pre">
                    <img src="{{asset('images/NTX - Icon/Small 50x50/Blue Arrow 3.1.png')}}" alt="">
                    <span>Quay lại</span>
                </button>
            </div>
            <div class="col-6">
                <button onclick="submit_next(event)" class="w-100 text-white btn-next">
                    <span>Tiếp tục</span>
                    <img class="img_next_button" src="{{asset('images/NTX - Icon/Small 50x50/White Arrow 3.2.png')}}" alt="">
                </button>
            </div>
        </div>
    </div>


@endsection
@section('script')
<script>
    $(window).on('load', function() {
    });

    // chọn tỉnh thành theo chữ cái
	var  data;
    $.ajax({
        url: 'https://bwsdev.ntlogistics.vn/v1/province',
        method: 'GET',
        success: res => {
            data = res;
            let size = res.data.length;
            for (let i = 0; i < size; i++){
            }
        }
    })
    function chon_ten_KV(e, id){
        var KV = document.getElementsByClassName("filter-alpha");
        for (var i = 0; i < KV.length; i++) {
            $(".filter-alpha").css('color','black');
            $(".filter-alpha").css('font-weight','normal');
        }
        var getKV = id;
        $(getKV).css('color','#00428D');
        $(getKV).css('font-weight','bold');
        let key = e.currentTarget.id;
        getProvinceByAlpha(key)
    }
    function getProvinceByAlpha(key){
        let size = data.data.length
        $('.province-by-alpha').empty()
        for (let i = 0; i < size; i++){
            if ( data.data[i].province_name[0] == key){
                $('.province-by-alpha').append('<li onclick="tinhthanh('+data.data[i].id+', \''+
                    (data.data[i].province_name) +'\')" id='+data.data[i].id+'>'+ data.data[i].province_name +'</li>')
            }
        }
    }
    // end chọn tỉnh thành theo chữ cái

    // chọn tỉnh thành
    function tinhthanh(id, tinh){
        $('.error-chon_tinh_noigui').css('display','none');

        var chon_ten_tinhthanh = '<input type="hidden" id="chon_tinh_noigui" id="tinh_'+id+'" name="chon_tinh_noigui" value="'+tinh+'">';
        var id_ten_tinhthanh = '<input type="hidden" id="s_province_id" name="s_province_id" value="'+id+'">';
        document.getElementById('chon_tinh').innerHTML = chon_ten_tinhthanh;
        document.getElementById('chon_tinh_id').innerHTML = id_ten_tinhthanh;
        
        var ten_tinh = "<li id="+id+" class='li_tinh_thanh'><span onclick='xoa_tinh("+id+")'>x</span>" + tinh + "</li>";
        document.getElementById('chon_ten_tinh').innerHTML = ten_tinh;
        if (ten_tinh) {
            $.ajax({
                method: 'POST',
                url: './api/getDistrict',
                data: {
                    province_id: id
                },
                success: function(res) {
                    console.log(res);
                    let size = res.data.length
                    $('.province-by-alpha').empty();
                    $('.tinh_quan_huyen').empty();
                    $('.KV').empty();
                    $('.khu_vuc_khac').css("display", "none");
                    $('.quan_huyen').css("display", "block");
                    for (let i = 0; i < size; i++){
                        // if ( res.data[i].province_id == id){
                            $('.province-by-alpha').append('<li onclick="quan('+res.data[i].id+',\''+ (res.data[i].district_name) +'\')" id='+res.data[i].id+'>'+ res.data[i].district_name +'</li>')
                        // }
                    }
                }
            });
        }
    }

    // chọn quận huyện
    function quan(id, quan){
        $('.error-chon_quan_noigui').css('display','none');

        var chon_ten_quan = '<input type="hidden" id="chon_quan_noigui" id="quan_'+id+'" name="chon_quan_noigui" value="'+quan+'">';
        var id_ten_quan = '<input type="hidden" id="s_district_id" name="s_district_id" value="'+id+'">';
        document.getElementById('chon_quan').innerHTML = chon_ten_quan;
        document.getElementById('chon_quan_id').innerHTML = id_ten_quan;

        var ten_quan = "<li id="+id+" class='li_quan_huyen' ><span onclick='xoa_quan("+id+")'>x</span>" + quan + "</li>";
        document.getElementById('chon_ten_tinh').innerHTML += ten_quan;
        if (ten_quan) {
            $.ajax({
                method: 'POST',
                url: './api/getWard',
                data: {
                    district_id: id
                },
                success: function(res) {
                    console.log(res);
                    let size = res.data.length
                    $('.province-by-alpha').empty();
                    $('.tinh_quan_huyen').empty();
                    $('.KV').empty();
                    $('.khu_vuc_khac').css("display", "none");
                    $('.quan_huyen').css("display", "none");
                    $('.phuong').css("display", "block");
                    for (let i = 0; i < size; i++){
                        // if ( res.data[i].district_id == id){
                            $('.province-by-alpha').append('<li onclick="huyen('+res.data[i].id+',\''+ (res.data[i].ward_name) +'\')" id='+res.data[i].id+'>'+ res.data[i].ward_name +'</li>')
                        // }
                    }
                }
            });
        }
    }

    // chọn phường xã
    function huyen(id, huyen){
        $('.error-chon_phuong_noigui').css('display','none');
        var chon_ten_phuong = '<input type="hidden" id="chon_phuong_noigui" id="phuong_'+id+'" name="chon_phuong_noigui" value="'+huyen+'">';
        var id_ten_phuong = '<input type="hidden" id="s_ward_id" name="s_ward_id" value="'+id+'">';
        document.getElementById('chon_phuong').innerHTML = chon_ten_phuong;
        document.getElementById('chon_phuong_id').innerHTML = id_ten_phuong;

        var ten_huyen = "<li id="+id+" class='li_phuong_xa' ><span onclick='delete_ward("+id+")'>x</span>" + huyen + "</li>";
        document.getElementById('chon_ten_tinh').innerHTML += ten_huyen;
        $('.KV').empty();
        $('.KVK').empty();
        $('.ten-KV').empty();

        var s_province_id = $('#s_province_id').val();
        var s_district_id = $('#s_district_id').val();
        var s_ward_id = $('#s_ward_id').val();
        $.ajax({
            method: 'POST',
            url: './api/checkArea',
            data: {
                s_province_id: s_province_id,
                s_district_id: s_district_id,
                s_ward_id: s_ward_id,
            },
            success: function(res) {
                console.log(res);
                let message = res.message;
                let success = res.success;
                console.log(message);
                if( success == false){
                    $('.error_tinh_quan_phuong').css('display','block');
                    $('.error-check-area').css('display','block');
                    $('.error-check-area').html(message);
                    $(".btn-next").attr("disabled", true);
                }else{
                    $(".btn-next").attr("disabled", false);
                    $('.error-check-area').css('display','none');
                }
            }
        });
    }

    // xóa tất cả tỉnh quận huyện
    function delete_all(){
        $('.error_tinh_quan_phuong').css('display','none');
        $('.error-check-area').css('display','none');
        $(".btn-next").attr("disabled", false);
        
        $('#chon_tinh').empty().html('<input type="hidden" id="chon_tinh_noigui" name="chon_tinh_noigui" value="">');
        $('#chon_quan').empty().html('<input type="hidden" id="chon_quan_noigui" name="chon_quan_noigui" value="">');
        $('#chon_phuong').empty().html('<input type="hidden" id="chon_phuong_noigui" name="chon_phuong_noigui" value="">');

        let arr = ['A','B','C','Đ','G','H','K','L','N','P','Q','S','T','V','Y'];
        let li = '';
        var TP = `<ul class="TP mt-3" >
                    <li onclick="tinhthanh(50, 'Hồ Chí Minh')" id="50">TP.HCM</li>
                    <li onclick="tinhthanh(29, 'Hà Nội')" id="29">Hà Nội</li>
                    <li onclick="tinhthanh(43, 'Đà Nẵng')" id="43">Đà Nẵng</li></ul>
                  </ul>`;
        for (let item in arr){
            li += ` <li onclick="chon_ten_KV(event, ${arr[item]});" class="filter-alpha" onclick="clickAlpha()" id="${arr[item]}">${arr[item]}</li>`
        }
        var html = `<h4 class="khu_vuc_khac"><span>Khu vực khác</span></h4>
                    <h4 class="quan_huyen" style="display: none;"><span>Quân/Huyện</span></h4>
                    <h4 class="phuong" style="display: none;"><span>Phường/Xã</span></h4>
                    <ul class="tinh_quan_huyen">
                       ${li}
                    </ul>`;
        var ten_KV = `<ul class="province-by-alpha"></ul>`;
        $('.KV').html(TP);
        $('.KVK').html(html);        
        $('.ten-KV').html(ten_KV);        
        $('#chon_ten_tinh').empty().append(`<p class="pt-1 pb-1 m-0 pl-2 p_KV">Khu vực</p>`);
    }

    // xóa tỉnh thành
    function xoa_tinh(id){
        var element_getid = document.getElementById(id);
        document.getElementById('chon_ten_tinh').removeChild(element_getid);
        delete_all();
    }

    // xóa quận huyện
    function xoa_quan(id){
        $('#chon_quan').empty().html('<input type="hidden" id="chon_quan_noigui" name="chon_quan_noigui" value="">');
        $('#chon_phuong').empty().html('<input type="hidden" id="chon_phuong_noigui" name="chon_phuong_noigui" value="">');
        $('.li_phuong_xa').remove();

        var element_input_quan = document.getElementById("quan_"+id+"");
        if (element_input_quan) {
            document.getElementById('chon_quan').removeChild(element_input_quan);
        }

        var element_getId = document.getElementById(id);
        var id_province = $('#chon_ten_tinh').find('li:eq(0)').attr('id');
        document.getElementById('chon_ten_tinh').removeChild(element_getId);
        $.ajax({
            // url: 'https://bwsdev.ntlogistics.vn/v1/district?province_id=' + id_province,
            // method: 'GET',
            method: 'POST',
            url: './api/getDistrict',
            data: {
                province_id: id_province
            },
            success: res => {
                let size = res.data.length
                let content ='';
                var html = `<h4 class="khu_vuc_khac" style="display: none;"><span>Khu vực khác</span></h4>
                            <h4 class="quan_huyen" style="display: block;"><span>Quân/Huyện</span></h4>
                            <h4 class="phuong" style="display: none;"><span>Phường/Xã</span></h4>
                            <ul class="tinh_quan_huyen"></ul>`;
                for (let i = 0; i < size; i++){
                  content += `<li onclick="quan(${res.data[i].id},'${res.data[i].district_name}')" id="${res.data[i].id}">${res.data[i].district_name}</li>`
                }
                var KV = `<ul class="province-by-alpha">
                              ${content}
                            </ul>`
                $('.KVK').empty().append(html);
                $('.ten-KV').empty().append(KV);
            }
        })
    }

    // xóa phường xã
    function delete_ward(id){
        $('#chon_phuong').empty().html('<input type="hidden" id="chon_phuong_noigui" name="chon_phuong_noigui" value="">');

        var element_input_phuong = document.getElementById("phuong_"+id+"");
        if (element_input_phuong) {
            document.getElementById('chon_phuong').removeChild(element_input_phuong);
        }

        var element_getId = document.getElementById(id);
        var id_district = $('#chon_ten_tinh').find('li:eq(1)').attr('id');
        document.getElementById('chon_ten_tinh').removeChild(element_getId);
        $.ajax({
            // url: 'https://bwsdev.ntlogistics.vn/v1/ward?district_id='+id_district,
            // method: 'GET',
            method: 'POST',
            url: './api/getWard',
            data: {
                district_id: id_district
            },
            success: res => {
                let size = res.data.length
                let content ='';
                let html = `<h4 class="khu_vuc_khac" style="display: none;"><span>Khu vực khác</span></h4>
                            <h4 class="quan_huyen" style="display: none;"><span>Quân/Huyện</span></h4>
                            <h4 class="phuong" style="display: block;"><span>Phường/Xã</span></h4>
                            <ul class="tinh_quan_huyen"></ul>`;
                for (let i = 0; i < size; i++){
                    content += `<li onclick="huyen(${res.data[i].id},'${res.data[i].ward_name}')" id="${res.data[i].id}">${res.data[i].ward_name}</li>`
                }
                let KV = `<ul class="province-by-alpha">
                              ${content}
                            </ul>`
                $('.KVK').empty().append(html);
                $('.ten-KV').empty().append(KV);
            }
        })
    }

    function submit_next(event){
        var form = $('#form_submit');
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('validate_step1') }}",
            method: 'POST',
            data: form.serialize(),
            dataType: 'JSON',
            success: res => {
                if ( res.status == '201' ){
                    if(typeof res.message !== 'undefined' ){
                        $('.error_tinh_quan_phuong').css('display','flex');
                        if (typeof res.message.s_name !== 'undefined'){
                            $('#form_submit').addClass('was-validated');
                            $('input[name="s_name"]').prop('required',true);
                            $('.error-s_name').text(res.message.s_name[0]).css('display','block');                                 
                        }
                        if (typeof res.message.s_phone !== 'undefined'){
                            $('#form_submit').addClass('was-validated');
                            $('input[name="s_phone"]').prop('required',true);
                            $('.error-s_phone').text(res.message.s_phone[0]).css('display','block');                                 
                        }
                        if ( typeof res.message.s_address !== 'undefined'){
                            $('#form_submit').addClass('was-validated');
                            $('input[name="s_address"]').prop('required',true);
                            $('.error-s_address').text(res.message.s_address[0]).css('display','block'); 
                        }
                        if ( typeof res.message.chon_tinh_noigui !== 'undefined'){
                            $('.error-chon_tinh_noigui').text(res.message.chon_tinh_noigui[0]).css('display','block'); 
                        }
                        if ( typeof res.message.chon_quan_noigui !== 'undefined'){
                            $('.error-chon_quan_noigui').text(res.message.chon_quan_noigui[0]).css('display','block'); 
                        }
                        if ( typeof res.message.chon_phuong_noigui !== 'undefined'){
                            $('.error-chon_phuong_noigui').text(res.message.chon_phuong_noigui[0]).css('display','block'); 
                        }
                    }
                } else {
                    var id = <?php echo $id ?>;
                    var flag = "<?php if ( isset($data['flag'])) {
                                echo $data['flag'];
                            } else {
                                echo '0';
                            } ?>";
                    if (flag == 1) {
                        $('#form_submit').attr('action', "7-inch/quay-lai/"+id+"/hoantat").submit();
                    } else {
                        $('#form_submit').submit();
                    } 
                }
            }
        })   
    }
    $('.form-control').on('focus', function (){
        $(this).parent().find('.error').css('display','none');
    });
</script>
@endsection