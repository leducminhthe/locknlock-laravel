@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pages/7inch.css') }}">
@endsection

@section('content')
<form action="7-inch/tao-don-hoantat/{{$id}}/thanhtoan" method="POST" id="form_submit">
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
<section>
	<div class="row all_div">
        <div class="img_nganhang ">
            <img src="{{asset('images/nganhang.png')}}" alt="">
        </div>
	</div>
	<div class="fixed-bottom button-footer">
        <div class="row">
            <div class="col-6">
                <button OnClick="back_step()" class="btn-pre"><img src="{{asset('images/NTX - Icon/Small 50x50/Blue Arrow 3.1.png')}}" alt="">Quay lại</button>
                <button onclick="cancel()" class="cancel">Hủy</button>
            </div>
            <div class="col-6">
                <button onclick="next_step()" class="w-100 text-white btn-next">
                    Tiếp tục
                    <img class="img_next_button" src="{{asset('images/NTX - Icon/Small 50x50/White Arrow 3.2.png')}}" alt="">
                </button>
            </div>
        </div>
    </div>
</section>



@endsection
@section('script')
<script>
    function back_step(){
        $('#form_submit').submit();
    };
    function cancel(){
        var id = <?php echo $id ?>;
        $('#form_submit').attr('action', "7-inch/tao-don-hoantat/" + id + "/thanhtoan").submit();
    };
    function next_step(){
        var id = <?php echo $id ?>;
        $('#form_submit').attr('action', "7-inch/tao-don-hoantat/" + id + "/nhapthe").submit();
    };
</script>
@endsection