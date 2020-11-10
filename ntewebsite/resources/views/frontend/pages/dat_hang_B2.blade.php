@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
@endsection

@section('content')
    <div class="all">
        <section class="section-banner-area">
            <div class="align-self-center container">
                <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                    <a href="" class="text-white font-size-24">{{ trans('messages.home') }}<span
                            class="mr-1 ml-1">/</span></a>
                    <span
                        class="text-white font-size-24 font-weight-bold">{{ trans('messages.title_page_create_order') }}</span>
                </div>
            </div>
        </section>

        <section class="w-100 mt-3 pb-4">
            <div class="container p-0">
            <form action="tao-van-don-step-3/{{$id}}" method="post" id="form_end">
            {{ csrf_field() }}
                <div class="row">
                    <div class="order-left col-lg-8 p-3">
                        <!-- data step2 -->
                            @if(isset($data['step2']))
                                <input type="hidden" name="s_phone" value="{{ $data['step2']['s_phone'] }}">
                                <input type="hidden" name="s_name" value="{{ $data['step2']['s_name'] }}">
                                <input type="hidden" name="s_address" value="{{ $data['step2']['s_address'] }}">
                                <input type="hidden" name="chon_tinh_noigui" value="{{ $data['step2']['chon_tinh_noigui'] }}">
                                <input type="hidden" name="chon_quan_noigui" value="{{ $data['step2']['chon_quan_noigui'] }}">
                                <input type="hidden" name="chon_phuong_noigui" value="{{ $data['step2']['chon_phuong_noigui'] }}">
                            @endif
                        <!-- id tinh quan phuong data step2 -->
                            <input type="hidden" name="s_province_id" value="{{ $data['step2']['s_province_id'] }}">
                            <input type="hidden" name="s_district_id" value="{{ $data['step2']['s_district_id'] }}">
                            <input type="hidden" name="s_ward_id" value="{{ $data['step2']['s_ward_id'] }}">

                            <div class="container steps pt-2">
                                <ul class="progressbar">
                                    <li class="active"></li>
                                    <li class="active"></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>

                            <h1 class="mt-2">{{ trans('messages.take_customer') }}</h1>
                            <div class="KV_hidden">
                                <!-- tỉnh thành -->
                                <div id="chon_tinh">
                                    @if(isset($data['step3']['chon_tinh_noinhan']))
                                        <input type="hidden" name="chon_tinh_noinhan"
                                               value="{{ $data['step3']['chon_tinh_noinhan'] }}">
                                    @else
                                        <input type="hidden" id="chon_tinh_noinhan" name="chon_tinh_noinhan" value="">
                                    @endif
                                </div>
                                <div id="chon_tinh_id">
                                    @if(isset($data['step3']['r_province_id']))
                                        <input type="hidden" name="r_province_id" value="{{ $data['step3']['r_province_id'] }}">
                                    @endif
                                </div>
                                <!-- quận huyện -->
                                <div id="chon_quan">
                                    @if(isset($data['step3']['chon_quan_noinhan']))
                                        <input type="hidden" name="chon_quan_noinhan" value="{{ $data['step3']['chon_quan_noinhan'] }}">
                                    @else
                                        <input type="hidden" id="chon_quan_noinhan" name="chon_quan_noinhan" value="">
                                    @endif
                                </div>
                                <div id="chon_quan_id">
                                    @if(isset($data['step3']['r_district_id']))
                                        <input type="hidden" name="r_district_id" value="{{ $data['step3']['r_district_id'] }}">
                                    @endif
                                </div>
                                <!-- phường xã -->
                                <div id="chon_phuong">
                                    @if(isset($data['step3']['chon_phuong_noinhan']))
                                        <input type="hidden" name="chon_phuong_noinhan" value="{{ $data['step3']['chon_phuong_noinhan'] }}">
                                    @else
                                        <input type="hidden" id="chon_phuong_noinhan" name="chon_phuong_noinhan" value="">
                                    @endif
                                </div>
                                <div id="chon_phuong_id">
                                    @if(isset($data['step3']['r_ward_id']))
                                        <input type="hidden" name="r_ward_id" value="{{ $data['step3']['r_ward_id'] }}">
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-6 p-0 mb-3">
                                    <div class="input_name mr-1">
                                        <input class="w-100 form-control phone" type="text" id="r_name"
                                               name="r_name" placeholder="Họ tên người nhận"
                                               @if(isset($data['step3']['r_name']))
                                               value="{{$data['step3']['r_name']}}"
                                            @endif
                                        >
                                        <span class="error-r_name error"><i></i></span>
                                    </div>
                                </div>

                                <div class="col-lg-6 p-0">
                                    <div class="input_phone ml-1 mb-3">
                                        <input class="w-100 form-control phone" type="text" name="r_phone"  id="r_phone" 
                                               placeholder="Nhập số điện thoại"
                                               @if(isset($data['step3']['r_phone']))
                                               value="{{$data['step3']['r_phone']}}"
                                            @endif>
                                        <span class="error-r_phone error"></span>
                                    </div>
                                </div>

                                <div class="chon_KV col-lg-12 mt-1 p-1">
                                    <ul id="chon_ten_tinh">
                                        @if(isset($data['step3']))
                                            <li>{{ $data['step3']['chon_tinh_noinhan'] }}</li>
                                            <li>{{ $data['step3']['chon_quan_noinhan'] }}</li>
                                            <li>{{ $data['step3']['chon_phuong_noinhan'] }}</li>
                                        @else
                                            <p class="pt-1 pb-1 m-0 pl-2 p_KV">Khu vực</p>
                                        @endif
                                    </ul>
                                    <div class="delete">
                                        <span style="color: #0280C7;" class="delete_KV" onclick="delete_all()"><u>Xóa tất cả</u></span>
                                        <span onclick="delete_all()" class="icon_recycle">
                                        <img src="{{asset('images/recycle-bin.png')}}" alt="">
                                    </span>
                                    </div>
                                </div>
                                <div class="error_tinh_quan_phuong" style="display: flex;">
                                    <p class="error-chon_tinh_noinhan error pl-0"></p>
                                    <p class="error-chon_quan_noinhan error pl-3"></p>
                                    <p class="error-chon_phuong_noinhan error pl-3"></p>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="mycheckbox">
                                    <input type="checkbox" id="myCheck" onclick="cung_khu_vuc()">
                                    <label for="myCheck">{{ trans('messages.same_area') }}</label>
                                </div>
                            </div>

                            <div class="row mt-2 Khu-vuc">
                                <div class="col-lg-12 KV p-0">
                                    <ul class="TP">
                                        <li onclick="tinhthanh(50, 'Hồ Chí Minh')" id="50">TP.HCM</li>
                                        <li onclick="tinhthanh(29, 'Hà Nội')" id="29">Hà Nội</li>
                                        <li onclick="tinhthanh(43, 'Đà Nẵng')" id="43">Đà Nẵng</li>
                                    </ul>
                                    </ul>
                                </div>

                                <div class="KVK col-lg-12 p-0">
                                    <h4 class="khu_vuc_khac"><span>{{ trans('messages.other_area') }}</span></h4>
                                    <h4 class="quan_huyen" style="display: none;">
                                        <span>{{ trans('messages.district') }}</span></h4>
                                    <h4 class="phuong" style="display: none;"><span>{{ trans('messages.ward') }}</span>
                                    </h4>

                                    <ul class="tinh_quan_huyen">
                                        <li onclick="chon_ten_KV(event, A);" class="filter-alpha" id="A">A</li>
                                        <li onclick="chon_ten_KV(event, B);" class="filter-alpha" id="B">B</li>
                                        <li onclick="chon_ten_KV(event, C);" class="filter-alpha" id="C">C</li>
                                        <li onclick="chon_ten_KV(event, Đ);" class="filter-alpha" id="Đ">Đ</li>
                                        <li onclick="chon_ten_KV(event, G);" class="filter-alpha" id="G">G</li>
                                        <li onclick="chon_ten_KV(event, H);" class="filter-alpha" id="H">H</li>
                                        <li onclick="chon_ten_KV(event, K);" class="filter-alpha" id="K">K</li>
                                        <li onclick="chon_ten_KV(event, L);" class="filter-alpha" id="L">L</li>
                                        <li onclick="chon_ten_KV(event, N);" class="filter-alpha" id="N">N</li>
                                        <li onclick="chon_ten_KV(event, P);" class="filter-alpha" id="P">P</li>
                                        <li onclick="chon_ten_KV(event, Q);" class="filter-alpha" id="Q">Q</li>
                                        <li onclick="chon_ten_KV(event, S);" class="filter-alpha" id="S">S</li>
                                        <li onclick="chon_ten_KV(event, T);" class="filter-alpha" id="T">T</li>
                                        <li onclick="chon_ten_KV(event, V);" class="filter-alpha" id="V">V</li>
                                        <li onclick="chon_ten_KV(event, Y);" class="filter-alpha" id="Y">Y</li>
                                    </ul>
                                </div>

                                <div class="col-lg-12 ten-KV mt-2 p-0">
                                    <ul class="province-by-alpha">

                                    </ul>
                                </div>
                            </div>

                            <div class="mt-2 row note">
                                <div class="col-lg-12 p-0">
                                    <input class="w-100 form-control" type="text" name="r_address"
                                           placeholder="Địa chỉ"
                                           @if(isset($data['step3']['r_address']))
                                           value="{{$data['step3']['r_address']}}"
                                        @endif>
                                    <span class="error-r_address error"></span>
                                </div>
                            </div>

                            <div class="next mt-3">
                                <button class="back_step">{{ trans('messages.back') }}</button>
                                |
                                <button onclick="next_step(event)"
                                        class="next_step">{{ trans('messages.next') }}</button>
                            </div>

                            <div class="button_next_mobile fixed-bottom row">
                                <div class="information">Thông tin đơn hàng</div>
                                <div class="back_step">
                                    <center><span class="icon-White-Arrow-31"></span></center>
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
                                        <td>_</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('messages.type_product') }}:</td>
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
                                    <li><span>0</span>vnđ</li>
                                </ul>
                            </div>
                            <div class="khuyenmai mt-2 col-lg-12 col-12 mt-2 mb-2">
                                <div class="row">
                                    <div style="display: flex;" class="col-8 p-0">
                                    <span class="currency pr-0">
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
                                        <button class="btn_voucher" type="">{{ trans('messages.apply') }}</button>
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
        $(window).on('load', function () {
            $('html,body').animate({scrollTop: 135}, 400);
            $('.btn_voucher').attr('disabled', true);
            data_isset();
        });
        // scroll thông tin đơn hàng
        $('.information').click(function(){ 
            $('html, body').animate({
                scrollTop: $(".note").offset().top
            }, 400);
        });

        // chọn tên tỉnh thành theo chữ cái
        var data;
        $.ajax({
            url: 'https://bwsdev.ntlogistics.vn/v1/province',
            method: 'GET',
            success: res => {
                data = res;
                let size = res.data.length;
                for (let i = 0; i < size; i++) {
                }
            }
        })

        function chon_ten_KV(e, id) {
            var KV = document.getElementsByClassName("filter-alpha");
            for (var i = 0; i < KV.length; i++) {
                $(".filter-alpha").css('color', '#959595');
                $(".filter-alpha").css('font-weight', 'normal');
            }
            var getKV = id;
            $(getKV).css('color', '#00428D');
            $(getKV).css('font-weight', 'bold');
            let key = e.currentTarget.id;
            getProvinceByAlpha(key)
        }

        function getProvinceByAlpha(key) {
            let size = data.data.length
            $('.province-by-alpha').empty()
            for (let i = 0; i < size; i++) {
                if (data.data[i].province_name[0] == key) {
                    $('.province-by-alpha').append('<li onclick="tinhthanh(' + data.data[i].id + ', \'' +
                        (data.data[i].province_name) + '\')" id=' + data.data[i].id + '>' + data.data[i].province_name + '</li>')
                }
            }
        }

        // chọn tỉnh thành
        function tinhthanh(id, tinh) {
            $('.error-chon_tinh_noinhan').css('display', 'none');
            $('.mycheckbox').hide();

            var chon_ten_tinhthanh = '<input type="hidden" id="chon_tinh_noinhan" id="tinh_' + id + '" name="chon_tinh_noinhan" value="' + tinh + '">';
            var id_ten_tinhthanh = '<input type="hidden" name="r_province_id" value="' + id + '">';
            document.getElementById('chon_tinh').innerHTML = chon_ten_tinhthanh;
            document.getElementById('chon_tinh_id').innerHTML = id_ten_tinhthanh;

            var ten_tinh = "<li id=" + id + " class='li_tinh_thanh'><span onclick='xoa_tinh(" + id + ")'>x</span>" + tinh + "</li>";
            document.getElementById('chon_ten_tinh').innerHTML = ten_tinh;
            if (ten_tinh) {
                $.ajax({
                    method: 'POST',
                    url: './api/getDistrict',
                    data: {
                        province_id: id
                    },
                    success: function (res) {
                        console.log(res);
                        let size = res.data.length
                        $('.province-by-alpha').empty();
                        $('.tinh_quan_huyen').empty();
                        $('.KV').empty();
                        $('.khu_vuc_khac').css("display", "none");
                        $('.quan_huyen').css("display", "block");
                        for (let i = 0; i < size; i++) {
                            // if ( res.data[i].province_id == id){
                            $('.province-by-alpha').append('<li onclick="quan(' + res.data[i].id + ',\'' + (res.data[i].district_name) + '\')" id=' + res.data[i].id + '>' + res.data[i].district_name + '</li>')
                            // }
                        }
                    }
                });
            }
        }

        // chọn quận huyện
        function quan(id, quan) {
            $('.error-chon_quan_noinhan').css('display', 'none');

            var chon_ten_quan = '<input type="hidden" id="chon_quan_noinhan" id="quan_' + id + '" name="chon_quan_noinhan" value="' + quan + '">';
            var id_ten_quan = '<input type="hidden" name="r_district_id" value="' + id + '">';
            document.getElementById('chon_quan').innerHTML = chon_ten_quan;
            document.getElementById('chon_quan_id').innerHTML = id_ten_quan;

            var ten_quan = "<li id=" + id + " class='li_quan_huyen' ><span onclick='xoa_quan(" + id + ")'>x</span>" + quan + "</li>";
            document.getElementById('chon_ten_tinh').innerHTML += ten_quan;
            if (ten_quan) {
                $.ajax({
                    method: 'POST',
                    url: './api/getWard',
                    data: {
                        district_id: id
                    },
                    success: function (res) {
                        console.log(res);
                        let size = res.data.length
                        $('.province-by-alpha').empty();
                        $('.tinh_quan_huyen').empty();
                        $('.KV').empty();
                        $('.khu_vuc_khac').css("display", "none");
                        $('.quan_huyen').css("display", "none");
                        $('.phuong').css("display", "block");
                        for (let i = 0; i < size; i++) {
                            // if ( res.data[i].district_id == id){
                            $('.province-by-alpha').append('<li onclick="huyen(' + res.data[i].id + ',\'' + (res.data[i].ward_name) + '\')" id=' + res.data[i].id + '>' + res.data[i].ward_name + '</li>')
                            // }
                        }
                    }
                });
            }
        }

        // chọn phường xã
        function huyen(id, huyen) {
            $('.error-chon_phuong_noinhan').css('display', 'none');

            var chon_ten_phuong = '<input type="hidden" id="chon_phuong_noinhan" id="phuong_' + id + '" name="chon_phuong_noinhan" value="' + huyen + '">';
            var id_ten_phuong = '<input type="hidden" name="r_ward_id" value="' + id + '">';
            document.getElementById('chon_phuong').innerHTML = chon_ten_phuong;
            document.getElementById('chon_phuong_id').innerHTML = id_ten_phuong;

            var ten_huyen = "<li id=" + id + " class='li_phuong_xa' ><span onclick='delete_ward(" + id + ")'>x</span>" + huyen + "</li>";
            document.getElementById('chon_ten_tinh').innerHTML += ten_huyen;
            $('.Khu-vuc').empty();
        }

        // xóa tất cả tỉnh quận phường
        function delete_all() {
            $('.mycheckbox').show();
            $("#myCheck").prop('checked', false);
            cung_khu_vuc();
            $('.error_tinh_quan_phuong').css('display','none');

            let arr = ['A', 'B', 'C', 'Đ', 'G', 'H', 'K', 'L', 'N', 'P', 'Q', 'S', 'T', 'V', 'Y'];
            let li = '';

            let html = `<div class="col-lg-12 KV p-0">
                        <ul class="TP">
                            <li onclick="tinhthanh(50, 'Hồ Chí Minh')" id="50">TP.HCM</li>
                            <li onclick="tinhthanh(29, 'Hà Nội')" id="29">Hà Nội</li>
                            <li onclick="tinhthanh(43, 'Đà Nẵng')" id="43">Đà Nẵng</li></ul>
                    </div>`;
            for (let item in arr) {
                li += ` <li onclick="chon_ten_KV(event, ${arr[item]});" class="filter-alpha" onclick="clickAlpha()" id="${arr[item]}">${arr[item]}</li>`
            }
            html += `<div class="KVK col-lg-12 p-0">
                    <h4 class="khu_vuc_khac"><span>Khu vực khác</span></h4>
                    <h4 class="quan_huyen" style="display: none;"><span>Quân/Huyện</span></h4>
                    <h4 class="phuong" style="display: none;"><span>Phường/Xã</span></h4>
                    <ul class="tinh_quan_huyen">
                       ${li}
                    </ul>
                </div>`;
            html += `<div class="col-lg-12 ten-KV mt-2 p-0"><ul class="province-by-alpha"></ul></div>`;
            $('#chon_ten_tinh').empty();
            $('.Khu-vuc').empty().append(html);
            $('#chon_ten_tinh').empty().append(`<p class="pt-1 pb-1 m-0 pl-2 p_KV">Khu vực</p>`);
        }

        // xóa tỉnh
        function xoa_tinh(id) {
            var element_getid = document.getElementById(id);
            document.getElementById('chon_ten_tinh').removeChild(element_getid);
            delete_all();
        }

        // xóa quận
        function xoa_quan(id) {
            $('#chon_quan').empty().html('<input type="hidden" id="chon_quan_noinhan" name="chon_quan_noinhan" value="">');
            $('#chon_phuong').empty().html('<input type="hidden" id="chon_phuong_noinhan" name="chon_phuong_noinhan" value="">');
            $('.li_phuong_xa').remove();

            var element_input_quan = document.getElementById("quan_" + id + "");
            if (element_input_quan) {
                document.getElementById('chon_quan').removeChild(element_input_quan);
            }

            var element_getId = document.getElementById(id);
            var id_province = $('#chon_ten_tinh').find('li:eq(0)').attr('id');
            document.getElementById('chon_ten_tinh').removeChild(element_getId);
            $.ajax({
                method: 'POST',
                url: './api/getDistrict',
                data: {
                    province_id: id_province
                },
                success: res => {
                    let size = res.data.length
                    let content = '';
                    let html = `<div class="col-lg-12 KV p-0"></div>`;
                    html += `<div class="KVK col-lg-12 p-0">
                            <h4 class="khu_vuc_khac" style="display: none;"><span>Khu vực khác</span></h4>
                            <h4 class="quan_huyen" style="display: block;"><span>Quân/Huyện</span></h4>
                            <h4 class="phuong" style="display: none;"><span>Phường/Xã</span></h4>
                            <ul class="tinh_quan_huyen"></ul>
                        </div>`;
                    for (let i = 0; i < size; i++) {
                        content += `<li onclick="quan(${res.data[i].id},'${res.data[i].district_name}')" id="${res.data[i].id}">${res.data[i].district_name}</li>`
                    }
                    html += `<div class="col-lg-12 ten-KV mt-2 p-0">
                            <ul class="province-by-alpha">
                              ${content}
                            </ul>
                        </div>`
                    $('.Khu-vuc').empty().append(html);
                }
            })
        }

        // xóa phường xã
        function delete_ward(id) {
            $('#chon_phuong').empty().html('<input type="hidden" id="chon_phuong_noinhan" name="chon_phuong_noinhan" value="">');

            var element_input_phuong = document.getElementById("phuong_" + id + "");
            if (element_input_phuong) {
                document.getElementById('chon_phuong').removeChild(element_input_phuong);
            }

            var element_getId = document.getElementById(id);
            var id_district = $('#chon_ten_tinh').find('li:eq(1)').attr('id');
            document.getElementById('chon_ten_tinh').removeChild(element_getId);
            $.ajax({
                method: 'POST',
                url: './api/getWard',
                data: {
                    district_id: id_district
                },
                success: res => {
                    let size = res.data.length
                    let content = '';
                    let html = `<div class="col-lg-12 KV p-0"></div>`;
                    html += `<div class="KVK col-lg-12 p-0">
                            <h4 class="khu_vuc_khac" style="display: none;"><span>Khu vực khác</span></h4>
                            <h4 class="quan_huyen" style="display: none;"><span>Quân/Huyện</span></h4>
                            <h4 class="phuong" style="display: block;"><span>Phường/Xã</span></h4>
                            <ul class="tinh_quan_huyen"></ul>
                        </div>`;
                    for (let i = 0; i < size; i++) {
                        content += `<li onclick="huyen(${res.data[i].id},'${res.data[i].ward_name}')" id="${res.data[i].id}">${res.data[i].ward_name}</li>`
                    }
                    html += `<div class="col-lg-12 ten-KV mt-2 p-0">
                            <ul class="province-by-alpha">
                              ${content}
                            </ul>
                        </div>`
                    $('.Khu-vuc').empty().append(html);
                }
            })
        }

        // chọn cùng khu vực step 2
        function cung_khu_vuc() {
            var checkBox = document.getElementById("myCheck");
            if (checkBox.checked == true) {
                var chon_tinh_cung_noi_gui = "<?php echo $data['step2']['chon_tinh_noigui'] ?>";
                var chon_quan_cung_noi_gui = "<?php echo $data['step2']['chon_quan_noigui'] ?>";
                var chon_phuong_cung_noi_gui = "<?php echo $data['step2']['chon_phuong_noigui'] ?>";
                // id tinh quan phuong cùng nơi gửi
                var id_tinh_cung_noi_gui = "<?php echo $data['step2']['s_province_id'] ?>";
                var id_quan_cung_noi_gui = "<?php echo $data['step2']['s_district_id'] ?>";
                var id_phuong_cung_noi_gui = "<?php echo $data['step2']['s_ward_id'] ?>";

                var html = `<li  class="cung_noigui">
                        ` + chon_tinh_cung_noi_gui + `
                    </li>
                    <li  class="cung_noigui">
                        ` + chon_quan_cung_noi_gui + `
                    </li>
                    <li  class="cung_noigui">
                        ` + chon_phuong_cung_noi_gui + `
                    </li>`;

                $('#chon_ten_tinh').html(html);
                $('.error_tinh_quan_phuong').css('display', 'none');
                $('.cung_noigui').css('display', 'block');
                $('.p_KV').css('display', 'none');
                $('.TP').css('display', 'none');
                $('.KVK').css('display', 'none');
                $('.ten_KV').css('display', 'none');
                $('#chon_tinh').html('<input type="hidden" id="chon_tinh_noinhan" name="chon_tinh_noinhan" value="' + chon_tinh_cung_noi_gui + '">');
                $('#chon_quan').html('<input type="hidden" id="chon_quan_noinhan" name="chon_quan_noinhan" value="' + chon_quan_cung_noi_gui + '">');
                $('#chon_phuong').html('<input type="hidden" id="chon_phuong_noinhan" name="chon_phuong_noinhan" value="' + chon_phuong_cung_noi_gui + '">');
                // input tỉnh quận phường cùng nơi gửi
                $('#chon_tinh_id').html('<input type="hidden" name="r_province_id" value="' + id_tinh_cung_noi_gui + '">')
                $('#chon_quan_id').html('<input type="hidden" name="r_district_id" value="' + id_quan_cung_noi_gui + '">')
                $('#chon_phuong_id').html('<input type="hidden" name="r_ward_id" value="' + id_phuong_cung_noi_gui + '">')

            } else {
                $('#chon_ten_tinh').html('<p class="pt-1 pb-1 m-0 pl-2 p_KV">Khu vực</p>');
                $('.error_tinh_quan_phuong').css('display', 'flex');
                $('.cung_noigui').css('display', 'none');
                $('.p_KV').css('display', 'block');
                $('.TP').css('display', 'block');
                $('.KVK').css('display', 'block');
                $('.ten_KV').css('display', 'block');
                $('#chon_tinh').empty().html('<input type="hidden" id="chon_tinh_noinhan" name="chon_tinh_noinhan" value="">')
                $('#chon_quan').empty().html('<input type="hidden" id="chon_quan_noinhan" name="chon_quan_noinhan" value="">')
                $('#chon_phuong').empty().html('<input type="hidden" id="chon_phuong_noinhan" name="chon_phuong_noinhan" value="">')
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
                $('.noigui').children(".time_delivery").css('color', 'black');
            }
            var data3 = <?php if (isset($data['step3']['r_phone'])) {
                echo $data['step3']['r_phone'];
            } else {
                echo 'null';
            }  ?>;
            if (data3 !== null) {
                $('.noinhan').children(".phone").css('color', 'black');
                $('.noinhan').children(".local").css('color', 'black');
                $('.noinhan').children(".time_delivery").css('color', 'black');
            }
        }

    </script>
    <script type="text/javascript">
        // kiểm tra validate
        function next_step(event) {
            var form = $('#form_end');
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('check_step2') }}",
                method: 'POST',
                data: form.serialize(),
                dataType: 'JSON',
                cache: false,
                processData: false,
                success: res => {
                    if (res.status == '201') {
                        if (typeof res.message !== 'undefined') {
                            $('.error_tinh_quan_phuong').css('display','flex');
                            if (typeof res.message.r_name !== 'undefined') {
                                $('#form_end').addClass('was-validated');
                                $('input[name="r_name"]').prop('required', true);
                                $('.error-r_name').text(res.message.r_name[0]).css('display', 'block');
                            }
                            if (typeof res.message.r_phone !== 'undefined') {
                                $('#form_end').addClass('was-validated ');
                                $('input[name="r_phone"]').prop('required', true);
                                $('.error-r_phone').text(res.message.r_phone[0]).css('display', 'block');
                            }
                            if (typeof res.message.r_address !== 'undefined') {
                                $('#form_end').addClass('was-validated');
                                $('input[name="r_address"]').prop('required', true);
                                $('.error-r_address').text(res.message.r_address[0]).css('display', 'block');
                            }
                            if (typeof res.message.chon_tinh_noinhan !== 'undefined') {
                                $('input[name="chon_tinh_noinhan"]').prop('required', true);
                                $('.error-chon_tinh_noinhan').text(res.message.chon_tinh_noinhan[0]).css('display', 'block');
                            }
                            if (typeof res.message.chon_quan_noinhan !== 'undefined') {
                                $('input[name="chon_quan_noinhan"]').prop('required', true);
                                $('.error-chon_quan_noinhan').text(res.message.chon_quan_noinhan[0]).css('display', 'block');
                            }
                            if (typeof res.message.chon_phuong_noinhan !== 'undefined') {
                                $('input[name="chon_phuong_noinhan"]').prop('required', true);
                                $('.error-chon_phuong_noinhan').text(res.message.chon_phuong_noinhan[0]).css('display', 'block');
                            }
                        }
                    } else {
                        // alert('succes');
                        redirect();
                    }
                }
            })
        };

        function redirect() {
            document.getElementById("form_end").submit();
        }

        // quay trở lại step cũ
        $(".back_step").on("click", function () {
            var id = <?php echo $id ?>;
            $('#form_end').attr('action', "quaylai-tao-van-don/" + id + "/1").submit();
        });

        $('.form-control').on('focus', function () {
            $(this).parent().find('.error').css('display', 'none');
        });
    </script>
@stop
