@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{asset('css/thank_you.css')}}">
@endsection
@section('content')
    <section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24">{{ trans('messages.home') }}<span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">{{ trans('messages.title_page_create_order') }}</span>
            </div>
        </div>
    </section>
    <section class="thanh_toan_van_don">
    	 <form action="thanh-cong/{{$id}}" method="POST" id="form_end">
            {{ csrf_field() }}
            <!-- không thay đổi -->
            <input type="hidden" name="user_id" value="0">
            <input type="hidden" name="payment_method_id" value="10">
            <input type="hidden" name="payment_method" value="10">
            <input type="hidden" name="package_no" value="1">
            <input type="hidden" name="main_fee" value="53400">
            <input type="hidden" name="cod_fee" value="19640">
            <input type="hidden" name="utm_source" value="Website">
            <input type="hidden" name="s_post_area" value="6">
            <input type="hidden" name="queue_name" value="CreateBillNTXNoAuth">

            @if( $data['step1']['cod_amount'] )
            <input type="hidden" name="cod_amount" value="{{ $data['step1']['cod_amount'] }}">
            @else
            <input type="hidden" name="cod_amount" value="0">
            @endif

            <!-- id dịch vụ -->
            @if( $data['step1']['service_id'] === 'Hẹn giờ')
            <input type="hidden" name="dichvu" value="3">
            @elseif( $data['step1']['service_id'] === 'Tiêu chuẩn' )
            <input type="hidden" name="dichvu" value="1">
            @elseif( $data['step1']['service_id'] === 'Nhanh' )
            <input type="hidden" name="dichvu" value="2">
            @endif
            <!-- id Khối lượng -->
            @if( $data['step1']['weight'] === '0-3kg')
            <input type="hidden" name="khoiluong" value="2">
            @elseif( $data['step1']['weight'] === '3-5kg' )
            <input type="hidden" name="khoiluong" value="4">
            @elseif( $data['step1']['weight'] === '>5kg' )
            <input type="hidden" name="khoiluong" value="6">
            @endif
            <!-- id Hàng hóa -->
            @if( $data['step1']['cargo_content_id'] === 'Thực phẩm')
            <input type="hidden" name="hanghoa" value="1">
            @elseif(  $data['step1']['cargo_content_id'] === 'Quà tặng' )
            <input type="hidden" name="hanghoa" value="2">
            @elseif(  $data['step1']['cargo_content_id'] === 'Hoa' )
            <input type="hidden" name="hanghoa" value="3">
            @elseif(  $data['step1']['cargo_content_id'] === 'Điện tử' )
            <input type="hidden" name="hanghoa" value="4">
            @elseif(  $data['step1']['cargo_content_id'] === 'Bánh ngọt' )
            <input type="hidden" name="hanghoa" value="5">
            @elseif(  $data['step1']['cargo_content_id'] === 'Khác' )
            <input type="hidden" name="hanghoa" value="6">
            @endif
            <!-- step1 -->
            <input type="hidden" name="service_id" value="{{ $data['step1']['service_id'] }}">
            <input type="hidden" name="weight" value="{{ $data['step1']['weight'] }}">
            <input type="hidden" name="cargo_content_id" value="{{ $data['step1']['cargo_content_id'] }}">
            <!-- step2 -->
            <input type="hidden" name="s_name" value="{{ $data['step2']['s_name'] }}">
            <input type="hidden" name="s_phone" value="{{ $data['step2']['s_phone'] }}">
            <input type="hidden" name="s_address" value="{{ $data['step2']['s_address'] }}">
            <input type="hidden" name="chon_tinh_noigui" value="{{ $data['step2']['chon_tinh_noigui'] }}">
            <input type="hidden" name="chon_quan_noigui" value="{{ $data['step2']['chon_quan_noigui'] }}">
            <input type="hidden" name="chon_phuong_noigui" value="{{ $data['step2']['chon_phuong_noigui'] }}">
            <!-- hẹn giờ step2 -->
            @if( isset($data['step2']['ngay_giao_noigui']) )
            <input type="hidden" name="ngay_giao_noigui" value="{{ $data['step2']['ngay_giao_noigui'] }}">
            <input type="hidden" name="gio_giao_noigui" value="{{ $data['step2']['gio_giao_noigui'] }}">
            <input type="hidden" name="phut_giao_noigui" value="{{ $data['step2']['phut_giao_noigui'] }}">
            @endif
            <!-- step3 -->
            <input type="hidden" name="r_name" value="{{ $data['step3']['r_name'] }}">
            <input type="hidden" name="r_phone" value="{{ $data['step3']['r_phone'] }}">
            <input type="hidden" name="r_address" value="{{ $data['step3']['r_address'] }}">
            <input type="hidden" name="chon_tinh_noinhan" value="{{ $data['step3']['chon_tinh_noinhan'] }}">
            <input type="hidden" name="chon_quan_noinhan" value="{{ $data['step3']['chon_quan_noinhan'] }}">
            <input type="hidden" name="chon_phuong_noinhan" value="{{ $data['step3']['chon_phuong_noinhan'] }}">
            <!-- hẹn giờ step3 -->
            @if( isset($data['step3']['ngay_giao_noinhan']) )
            <input type="hidden" name="ngay_giao_noinhan" value="{{ $data['step3']['ngay_giao_noinhan'] }}">
            <input type="hidden" name="gio_giao_noinhan" value="{{ $data['step3']['gio_giao_noinhan'] }}">
            <input type="hidden" name="phut_giao_noinhan" value="{{ $data['step3']['phut_giao_noinhan'] }}">
            @endif
            <!-- id tinh quan phuong data step2 -->
            <input type="hidden" name="s_province_id" value="{{ $data['step2']['s_province_id'] }}">
            <input type="hidden" name="s_district_id" value="{{ $data['step2']['s_district_id'] }}">
            <input type="hidden" name="s_ward_id" value="{{ $data['step2']['s_ward_id'] }}">
            <!-- id tinh quan phuong data step3 -->
            <input type="hidden" name="r_province_id" value="{{ $data['step3']['r_province_id'] }}">
            <input type="hidden" name="r_district_id" value="{{ $data['step3']['r_district_id'] }}">
            <input type="hidden" name="r_ward_id" value="{{ $data['step3']['r_ward_id'] }}">
            <input type="hidden" name="note" value="{{ $data['note'] }}">
        </form>
    	<div class="container mt-3 mb-3">
    		<div class="row">
    			<div class="title mt-2">
    				<h1 class="col-12">Thanh toán</h1>
    			</div>
    			<div class="check col-12">
    				<div class="row nguoidung_thanhtoan pt-2 pb-4">
                        <div class="nguoigui_thanhtoan col-6">
                            <div>
                                <input type="radio" id="color-1" name="color" value="color-1" checked>
                                <label for="color-1">
                                  <span>
                                    <img src="{{ asset('images/NTX - Icon/Vector.png') }}" alt="" />
                                  </span>
                                    {{ trans('messages.sender_pay_now') }}
                                </label>
                            </div>
                        </div>
                        <div class="nguoinhan_thanhtoan col-6">
                            <div>
                                <input type="radio" id="color-2" name="color" value="color-2">
                                <label for="color-2">
                                  <span>
                                    <img src="{{ asset('images/NTX - Icon/Vector.png') }}" alt="" />
                                  </span>
                                    {{ trans('messages.take_pay_now') }}
                                </label>
                            </div>
                        </div>
    				</div>
    			</div>
    			<div class="hinhthuc_thanhtoan col-12">
    				<div id="accordion" class="mt-3 mb-3">
					  <div class="card mb-2">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					      	<img src="{{ asset('images/NTX - Icon/money.png') }}" alt="">
					        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					        	{{ trans('messages.pay_online') }}
					        </button>
					      </h5>
					    </div>

					    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					      <div class="card-body">
					      	<div class="row all">
					      		<div class="chuyenkhoan col-12">
					      			<img src="{{ asset('images/NTX - Icon/card.png') }}" alt="">
					      			<span>{{ trans('messages.pay_bank') }}</span>
					      		</div>
					      		<div class="hinh_thuc col-12 p-0">
					      			<div class="chon_nganhang pt-3">
					      				<img src="{{ asset('images/NTX - Icon/museum.png') }}" alt="">
					      				<input class="w-100" type="text" name="name_account" placeholder="Ngân hàng BIDV">
					      			</div>
					      			<div class="img_nganhang">
					      				<center>
					      					<img src="{{ asset('images/NTX - Icon/nganhang.png') }}" alt="">
					      				</center>
					      			</div>
					      			<div class="account pb-3">
					      				<img src="{{ asset('images/NTX - Icon/Small 50x50/Account.png') }}" alt="">
					      				<input class="w-100" type="text" name="name_account" placeholder="Nhập họ tên">
					      			</div>
					      			<div class="so_tai_khoan pb-3">
					      				<img src="{{ asset('images/NTX - Icon/Small 50x50/BankCard.png') }}" alt="">
					      				<input class="w-100" type="text" name="name_account" placeholder="Nhập tài khoản thẻ">
					      			</div>
					      		</div>
					      	</div>
					      </div>
					    </div>
					  </div>
					  <div class="card mb-2">
					    <div class="card-header" id="headingTwo">
					      <h5 class="mb-0">
					      	<img src="{{ asset('images/NTX - Icon/momo.png') }}" alt="">
					        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					        	{{ trans('messages.pay_momo') }}
					        </button>
					      </h5>
					    </div>
					    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					      <div class="card-body">
					        1
					      </div>
					    </div>
					  </div>
					  <div class="card">
					    <div class="card-header" id="headingThree">
					      <h5 class="mb-0">
					      	<img src="{{ asset('images/NTX - Icon/zalopay.png') }}" alt="">
					        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					        	{{ trans('messages.pay_zalo') }}
					        </button>
					      </h5>
					    </div>
					    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
					      <div class="card-body">
					        2
					      </div>
					    </div>
					  </div>
					</div>
    			</div>
    		</div>
    		<div class="back_finish row">
    			<div class="col-12 mb-4">
    				<div class="button">
		    			<button onclick="back_step()" class="back_step">{{ trans('messages.back') }}</button>
						<span>|</span>
						<button onclick="next_step()" class="next_step">{{ trans('messages.hoantat') }}</button>
		    		</div>
    			</div>
			</div>
    	</div>
    </section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('html,body').animate({ scrollTop: 145 }, 400);
    });
    function back_step(){
    	var id = <?php echo $id ?>;
        $('#form_end').submit();
    }

    function next_step(){
        $('#form_end').attr('action', "cam-on").submit();
    }
</script>
@stop
