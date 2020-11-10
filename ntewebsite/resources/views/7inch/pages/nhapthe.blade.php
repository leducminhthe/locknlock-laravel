@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pages/7inch.css') }}">
@endsection

@section('content')
<form action="7-inch/tao-don-hoantat/{{$id}}/nganhang" method="POST" id="form_submit">
    {{ csrf_field() }}
    @if($conditions == "nhaptenthe")
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
        @elseif(  $data['step1']['cargo_content'] )
            <input type="hidden" name="cargo_content" value="{{ $data['step1']['cargo_content'] }}">
        @endif
        <input type="hidden" name="user_id" value="0">
        <input type="hidden" name="payment_method_id" value="10">
        <input type="hidden" name="package_no" value="1">
        <input type="hidden" name="utm_source" value="Website">
        <input type="hidden" name="s_post_area" value="6">
        <input type="hidden" name="queue_name" value="CreateBillNTXNoAuth">
        @if( $id == 1 )
            <!-- xe máy -->
            <input type="hidden" name="transport_by_id" value="20556">
        @else
            <!-- xe tải -->
            <input type="hidden" name="transport_by_id" value="20558">
        @endif
    @else
    <input type="hidden" name="cargo_content_id" value="{{ $data['step1']['cargo_content_id'] }}">
    <input type="hidden" name="cargo_content" value="{{ $data['step1']['cargo_content'] }}">
    @endif
    <input type="hidden" name="main_fee" value="{{ $data['main_fee'] }}">
    <input type="hidden" name="cod_fee" value="{{ $data['cod_fee'] }}">
    <input type="hidden" name="expected_at" value="{{ $data['expected_at'] }}">

    <input type="hidden" name="amount" value="{{ $data['step1']['amount'] }}">
    <input type="hidden" name="service_id" value="{{ $data['step1']['service_id'] }}">
    <input type="hidden" name="dichvu" value="{{ $data['step1']['dichvu'] }}">
    <input type="hidden" name="weight" value="{{ $data['step1']['weight'] }}">
    

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
    <input type="hidden" name="s_desired_at" value="{{ $data['step2']['ngay_giao_noigui']}} {{ $data['step2']['gio_giao_noigui'] }}:{{ $data['step2']['phut_giao_noigui'] }}:00">
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
	<div class="all_div">
        <div class="thong_tin">
            <div class="servied_weight">
                <ul>
                   <li>
                        @if( $id == 1 )
                        <img src="{{asset('images/NTX - Icon/Medium 150x150/Moto.png')}}" alt="">
                        @else
                        <img src="{{asset('images/NTX - Icon/Medium 150x150/Oto.png')}}" alt="">
                        @endif
                   </li> 
                   <li>
                        <h1>{{ $data['step1']['service_id'] }}</h1>
                        @if($data['step1']['weight'] == "2")
                            <p>0 - 3kg</p>
                        @elseif($data['step1']['weight'] == "4")
                            <p>3 - 5kg</p>
                        @else
                            <p>Trên 5 kg</p>
                        @endif
                   </li>
                </ul>
            </div>
            <div class="amount">
                <p>Phí dịch vụ:</p>
                <h1 id="service_fees">
                    <span>{{ $data['main_fee'] }}</span> 
                    vnđ
                </h1>
            </div>
        </div>
        @if($conditions == "nhapthe")
            <div class="title">
                <h1>Nhập mã số thẻ</h1>
            </div>
            <div class="phone_user">
                <div class="nganhang">
                    <img src="{{ asset('images/NTX - Icon/BIDV.png') }}" alt="">
                </div>
                <div class="input_sdt">
                    <input type="text">
                </div>
            </div>
            <div class="thongbao">
                <p>Mã số thẻ là một chuỗi số gồm 16 chữ số  được in nổi trên thẻ ngân hàng của bạn </p>
            </div>
        @else
            <div class="title">
                <h1>Nhập tên chủ thẻ</h1>
            </div>
            <div class="phone_user">
                <div class="nganhang">
                    <img src="{{ asset('images/NTX - Icon/BIDV.png') }}" alt="">
                </div>
                <div class="input_sdt">
                    <input type="text">
                </div>
            </div>
            <div class="thongbao">
                <p>Tên của chủ thẻ được in trên thẻ nằm phía dưới mã thẻ</p>
            </div>
        @endif
	</div>
	<div class="fixed-bottom button-footer">
        <div class="row">
            <div class="col-6">
                @if($conditions == "nhapthe")
                <button onclick="back_step()" class="btn-pre"><img src="{{asset('images/NTX - Icon/Small 50x50/Blue Arrow 3.1.png')}}" alt="">Quay lại</button>
                @else
                <button onclick="nhapthe()" class="btn-pre"><img src="{{asset('images/NTX - Icon/Small 50x50/Blue Arrow 3.1.png')}}" alt="">Quay lại</button>
                @endif
                <button onclick="cancel()" class="cancel">Hủy</button>
            </div>
            <div class="col-6">
                @if($conditions == "nhapthe")
                <button onclick="next_step()" class="w-100 text-white btn-next">
                    Tiếp tục
                    <img class="img_next_button" src="{{asset('images/NTX - Icon/Small 50x50/White Arrow 3.2.png')}}" alt="">
                </button>
                @else
                <button onclick="finish()" class="w-100 text-white btn-next">
                    Tiếp tục
                    <img class="img_next_button" src="{{asset('images/NTX - Icon/Small 50x50/White Arrow 3.2.png')}}" alt="">
                </button>
                @endif
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
    function back_step(){
        $('#form_submit').submit();
    };
    function nhapthe(){
        var id = <?php echo $id ?>;
        $('#form_submit').attr('action', "7-inch/tao-don-hoantat/" + id + "/nhapthe").submit();
    };
    function next_step(){
        var id = <?php echo $id ?>;
        $('#form_submit').attr('action', "7-inch/tao-don-hoantat/" + id + "/nhaptenthe").submit();
    };
    function cancel(){
        var id = <?php echo $id ?>;
        $('#form_submit').attr('action', "7-inch/tao-don-hoantat/" + id + "/thanhtoan").submit();
    };
    function finish(){
        var amount = $('input[name="amount"]').val();
        if (typeof amount !== 'undefined' ) {
            var input = amount.replace(/,/g, '');
            $('input[name="amount"]').val(input);
        }
        $('#form_submit').attr('action', "7-inch/tao-don-thanhcong").submit();
    };
    function service_fees(){
        var service_fees = $('#service_fees span').html();
        var format_service_fees =  new Intl.NumberFormat("en-US").format(service_fees);
        $('#service_fees span').html(format_service_fees);
    }
</script>
@endsection