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

    <div class="container mt-2 mb-3 p-0" id="step_4">
        <form action="quaylai-tao-van-don/{{$id}}/3" method="POST" id="form_end">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- không thay đổi -->
            <input type="hidden" name="user_id" value="0">
            <input type="hidden" name="payment_method" value="10">
            <input type="hidden" name="payment_method_id" value="{{$data['payment_method_id']}}">
            <input type="hidden" name="package_no" value="1">
            <input type="hidden" name="main_fee" value="{{ $result['data']['CtrlPostage'] }}">
            <input type="hidden" name="cod_fee" value="{{ $result['data']['Cod'] }}">
            <input type="hidden" name="utm_source" value="Website">
            <input type="hidden" name="s_post_area" value="6">
            <input type="hidden" name="queue_name" value="CreateBillNTXNoAuth">
            <input type="hidden" name="expected_at" value="{{ $result['data']['DateExpected'] }}">
            @if( $data['step1']['service_id'] === 'Hẹn giờ' )
            <input type="hidden" name="s_desired_at" value="{{ $data['step2']['ngay_giao_noigui']}} {{ $data['step2']['gio_giao_noigui'] }}:{{ $data['step2']['phut_giao_noigui'] }}:00">
            @endif
            <!-- loại xe -->
            @if( $id == 1 )
            <!-- xe máy -->
            <input type="hidden" name="transport_by_id" value="20556">
            @else
            <!-- xe tải -->
            <input type="hidden" name="transport_by_id" value="20558">
            @endif
            <!-- thu hộ -->
            <input id="cod_amount" type="hidden" name="cod_amount" value="{{ $data['step1']['cod_amount'] }}">
            <!-- id dịch vụ -->
            <input type="hidden" name="dichvu" value="{{$data['step1']['dichvu']}}"> 

            <!-- step1 -->
            <input type="hidden" name="service_id" value="{{ $data['step1']['service_id'] }}">
            <input type="hidden" name="weight" value="{{ $data['step1']['weight'] }}">
            <input type="hidden" name="cargo_content" value="{{ $data['step1']['cargo_content'] }}">
            <!-- step2 -->
            <input type="hidden" name="s_name" value="{{ $data['step2']['s_name'] }}">
            <input type="hidden" name="s_phone" value="{{ $data['step2']['s_phone'] }}">
            <input type="hidden" name="s_address" value="{{ $data['step2']['s_address'] }}">
            <input type="hidden" name="chon_tinh_noigui" value="{{ $data['step2']['chon_tinh_noigui'] }}">
            <input type="hidden" name="chon_quan_noigui" value="{{ $data['step2']['chon_quan_noigui'] }}">
            <input type="hidden" name="chon_phuong_noigui" value="{{ $data['step2']['chon_phuong_noigui'] }}">
            <!-- hẹn giờ nơi gửi -->
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
            <!-- id tinh quan phuong data step2 -->
            <input type="hidden" name="s_province_id" value="{{ $data['step2']['s_province_id'] }}">
            <input type="hidden" name="s_district_id" value="{{ $data['step2']['s_district_id'] }}">
            <input type="hidden" name="s_ward_id" value="{{ $data['step2']['s_ward_id'] }}">
            <!-- id tinh quan phuong data step3 -->
            <input type="hidden" name="r_province_id" value="{{ $data['step3']['r_province_id'] }}">
            <input type="hidden" name="r_district_id" value="{{ $data['step3']['r_district_id'] }}">
            <input type="hidden" name="r_ward_id" value="{{ $data['step3']['r_ward_id'] }}">

            <div class="row">
                <div class="order-right col-lg-6 mt-2 p-0 left-content">
                    <div class="thongtin">
                        <div class="noigui row pl-3 pt-3 pb-3">
                            <h1 class="mt-2 col-12 p-0">{{ trans('messages.info_order') }}</h1>
                            <h3 class="mt-3 mb-3 col-12 p-0">{{ trans('messages.send_customer') }}:</h3>
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
                                    <div class="ml-2">{{$data['step2']['s_address']}} , {{$data['step2']['chon_phuong_noigui']}} , {{$data['step2']['chon_quan_noigui']}} , {{
                                        $data['step2']['chon_tinh_noigui']
                                    }}</div>
                                @else
                                    <div class="ml-2">{{ trans('messages.not_info') }}</div>
                                @endif
                            </div>
                            @if( $data['step1']['service_id'] == 'Hẹn giờ')
                            <div class="time_delivery col-12 p-0">
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
                            @endif
                        </div>
                        <div class="noinhan row pl-3 pb-3">
                            <h3 class="mt-2 mb-3 col-12 p-0">{{ trans('messages.take_customer') }}:</h3>
                            <div class="phone col-7 p-0" >
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
                                <div class="ml-2">{{$data['step3']['r_address']}} ,
                                    {{$data['step3']['chon_phuong_noinhan']}} , {{$data['step3']['chon_quan_noinhan']}} , {{$data['step3']['chon_tinh_noinhan']}}
                                </div >
                                @else
                                    <div class="ml-2">{{ trans('messages.not_info') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="donhang mt-2 mb-2 row">
                        <div class="col-3 col-lg-2 qr_code p-0">
                            <span>
                                <img class="w-100" src="{{asset('images/qr-code 1.png')}}" alt="">
                            </span>
                        </div>
                        <div class="col-lg-10 col-9 pr-0">
                            <table class="w-100">
                                    <thead>
                                        <tr>
                                            <th width="60%"></th>
                                            <th width="40%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ trans('messages.order_id') }}:</td>
                                            <td><span>_</span></td>
                                        </tr>
                                        <tr>
                                            <td >{{ trans('messages.type_service') }}:</td>
                                            @if( $data['step1']['service_id'] )
                                                <td>{{ $data['step1']['service_id'] }}</td>
                                            @else
                                                <td>_</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td >{{ trans('messages.type_product') }}:</td>
                                            @if( $data['step1']['cargo_content'] )
                                                <td class="cargo">{{ $data['step1']['cargo_content'] }}</td>
                                            @else
                                                <td>_</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>{{ trans('messages.intend_time') }}:</td>
                                            <td>{{ $result['data']['DateExpected'] }}</td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="order-right col-lg-6 mt-2 right-content">
                    <div class="row dichvu_thanhtoan mt-0">
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
                                <li>Phí dịch vụ</li>
                                <li id="service_fees">
                                    <span>{{ $result['data']['ControlAmt'] }}</span>vnđ
                                </li>
                                <li>{{ trans('messages.cod') }}</li>
                                @if( $data['step1']['cod_amount'] )
                                <li id="format_amount">
                                    <span>{{ $data['step1']['cod_amount'] }}</span>vnđ
                                </li>
                                @else
                                <li>
                                    <span>0</span>vnđ
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="ma_khuyenmai mt-2 col-lg-12 col-12 mt-2 mb-2 " style="">
                            <div class="row">
                                <div style="display: flex;" class="col-8 p-0">
                                    <span class="currency">
                                        <span class="icon-Sale">
                                            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span>
                                        </span>
                                    </span>
                                    @if( isset($data['voucher']) )
                                    <input class="w-100 form-control" type="text" name="voucher" value="{{ $data['voucher'] }}">
                                    @else
                                    <input class="w-100 form-control" type="text" name="voucher" placeholder="Nhập mã khuyến mãi nếu có">
                                    @endif
                                </div>
                                <div class="col-4 apdung pr-0">
                                    <button onclick="khuyenmai()" type="button">
                                        {{ trans('messages.apply') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="note_taodon mt-2 col-12">
                            <div class="note ">
                                <textarea class="ghichu" name="note" class="form-control" placeholder="Ghi chú">{{$data['note']}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="back_finish col-12 p-0" >
                        <div class="row">
                            <div class="back_button col-6 pl-0 pr-1">
                                <button class=" w-100" id="back_step" type="submit">
                                    <img style="width: 17px;" class="mr-2 pb-1" src="{{ asset('images/NTX - Icon/Small 50x50/White Arrow 3.1.png') }}" alt="">
                                    <span class="font-size-20">{{ trans('messages.back') }}</span>
                                </button>
                            </div>
                            <div class="finish_button col-6 pr-0 pl-1">
                                <button onclick="submit_form()" class=" w-100">
                                    <img style="width: 21px" class="mr-2" src="{{ asset('images/NTX - Icon/Vector.png') }}" alt="" />
                                    <a class="font-size-20"  title="">
                                        <span>{{ trans('messages.hoantat') }}</span>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="button_next_mobile fixed-bottom row" style="display:none;">
                        <div class="back_step">
                            <center>
                                <span class="icon-White-Arrow-31"></span>
                            </center>
                        </div>
                        <div class="finish" onclick="submit_form()">
                            <img style="width: 21px" class="mr-2" src="{{ asset('images/NTX - Icon/Vector.png') }}" alt="" />
                            <span>Hoàn tất</span>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        service_fees()
        $('html,body').animate({ scrollTop: 130 }, 400);
        $('.noinhan').children(".phone").css('color','black');
        $('.noinhan').children(".local").css('color','black');
        $('.noinhan').children(".time_delivery").css('color','black');
        $('.noigui').children(".phone").css('color','black');
        $('.noigui').children(".local").css('color','black');
        $('.noigui').children(".time_delivery").css('color','black');

        var time_set = '<?php echo $data['step1']['service_id'] ?>';
        if (time_set === 'Hẹn giờ') {
            $('.dichvu_thanhtoan').css('height','417px');
            $('.ghichu').css('height','146px');
        }else{
            $('.dichvu_thanhtoan').css('height','386px');
        }
    });

    // quay trở lại step cũ
    $(".back_step").on("click", function () {
        $('#form_end').submit();
    });

    function submit_form(){
        var amount = $('input[name="cod_amount"]').val();
        if (typeof amount !== 'undefined' ) {
            var input = amount.replace(/,/g, '');
            $('input[name="cod_amount"]').val(input);
        }
        $('#form_end').attr('action', "cam-on").submit();
    }

    function khuyenmai(){
        console.log('khuyenmai');
    }

    function service_fees(){
        var service_fees = $('#service_fees span').html();
        var format_service_fees =  new Intl.NumberFormat("en-US").format(service_fees);
        $('#service_fees span').html(format_service_fees);
    }
</script>
@stop
