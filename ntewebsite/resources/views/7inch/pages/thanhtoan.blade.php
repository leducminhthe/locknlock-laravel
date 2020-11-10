@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pages/7inch.css') }}">
@endsection

@section('content')
  <form action="7-inch/quay-lai/{{$id}}/hoantat" method="POST" id="form_submit">
    {{ csrf_field() }}
    <input type="hidden" name="main_fee" value="{{ $data['main_fee'] }}">
    <input type="hidden" name="cod_fee" value="{{ $data['cod_fee'] }}">
    <input type="hidden" name="expected_at" value="{{ $data['expected_at'] }}">

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
  </form>

	<div class="row">
		<div class="left_thanhtoan col-lg-6 mt-5">
	       <div class="thanhtoan_tructiep row">
               <div class="img_thanhtoan_tructiep col-4">
                   <img src="{{ asset('images/money.png')}}">
               </div>
               <div class="title_tructiep col-8">
                   <h1>Thanh toán trực tiếp</h1>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
               </div>
           </div>
           <div class="thanhtoan_tructiep momo row mt-4">
               <div class="img_thanhtoan_tructiep col-4">
                   <img src="{{ asset('images/logo-momo.png')}}">
               </div>
               <div class="title_tructiep col-8">
                   <h1>Thanh toán Momo</h1>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
               </div>
           </div>
		</div>

		<div class="right_thanhtoan col-lg-6 mt-5">
            <div OnClick="thanhtoan_nganhang()" class="chuyenkhoan the_ngan_hang row">
               <div class="img_thanhtoan_tructiep col-4">
                   <img src="{{ asset('images/credit-card.png')}}">
               </div>
               <div class="title_tructiep col-8">
                   <h1>Chuyển khoản ngân hàng</h1>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
               </div>
           </div>
           <div class="chuyenkhoan zalopay row mt-4">
               <div class="img_thanhtoan_tructiep col-4">
                   <img src="{{ asset('images/logo 1.png')}}">
               </div>
               <div class="title_tructiep col-8">
                   <h1>Thanh toán Zalo Pay</h1>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
               </div>
           </div>
		</div>
	</div>
    <div class="fixed-bottom button-footer">
        <div class="row">
            <div class="col-12 p-0">
                <button onclick="back_step()" class="w-100 btn-pre"><img src="{{asset('images/NTX - Icon/Small 50x50/Blue Arrow 3.1.png')}}" alt="">Quay lại</button>
            </div>
        </div>
    </div>


@endsection
@section('script')
<script>  
  function back_step(){
    $('#form_submit').submit();
  };
  function thanhtoan_nganhang(){
    var id = <?php echo $id ?>;
    $('#form_submit').attr('action', "7-inch/tao-don-hoantat/"+id+"/nganhang").submit();
  }
</script>
@endsection