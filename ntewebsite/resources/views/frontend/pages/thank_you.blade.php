@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{asset('css/thank_you.css')}}">
@endsection
@section('content')
    <section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24"> Trang chủ<span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">Đặt giao hàng ngay</span>
            </div>
        </div>
    </section>
    <div class="container mt-2 mb-3 p-0">
    @if($result['success'] == true)
        @if($res_phone['success'] == false)
            <div class="mb-2 section-thank-you">
            <div class="row d-flex justify-content-center">
                <div class="content-left mr-0">
                    <div class="row">
                        <div class="col-12" style="background: white;border-radius: 10px;">
                            <div class="row d-flex pt-5 text-center justify-content-center">
                                <h1>Cám ơn bạn đã tạo vận đơn trên Nhất Tín Express</h1>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="{{ asset('images/Frame-thank-you.png') }}" alt="">
                                </div>
                                <div class="col-12 d-flex text-center justify-content-center notify-customer">
                                    <p class="font-size-18 pb-2">Đăng nhập để tra cứu vận đơn</p>
                                </div>
                                <div class="col-12 mb-3 button_login">
                                    <center>
                                        <button >
                                            <!-- <a class="d-block overflow-hidden" href="{{ route('client.login') }}" title="">Đăng nhập</a> -->
                                            <a class="d-block overflow-hidden" href="{{ env('ONLINE_URL') }}login" title="">Đăng nhập</a>
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @else
            <div class="mb-2 section-thank-you">
                <div class="row d-flex justify-content-center">
                    <div class="content-left mr-0">
                        <div class="row text-center mt-3">
                            <div class="col-12 d-flex justify-content-center">
                                <p class="tk p-2">Cám ơn bạn đã tạo vận đơn trên Nhất Tín Express.</p>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <p>Bạn chưa có tài khoản trên <span class="text-blue">Nhất Tín Express.</span></p>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <p class="w-75 account"> Chúng tôi đã tạo cho bạn tài khoản và gửi thông tin tài khoản tới số điện thoại <span class="text-green">{{ $params['s_phone']}}</span></p>
                            </div>
                            <!-- <div class="col-12 d-flex justify-content-center">
                                <p>Bạn chưa nhận được tin nhắn.
                                    <span class="send-sms" id="time">29</span>
                                    <span style="display: none" class="send-sms" id="send" onclick="Timer()">Gửi lai</span>
                                </p>
                            </div> -->
                        </div>
                        <div class="row pb-3 mt-2">
                            <div class="col-12 d-flex justify-content-center">
                                <img class="w-65 img_account" src="{{ asset('images/account.png') }}" alt="">
                            </div>
                                <div class="col-12 mb-2 d-flex justify-content-center">
                                    <p class="w-75 text-center pb-2">Vui lòng lòng đăng nhập để đổi mật khẩu tại đây</p>
                                </div>
                                <div class="col-12 pb-4 d-flex justify-content-center">
                                    <button class="btn change-pass" style="background: #00428D;">
                                        <a class="d-block overflow-hidden text-white" href="{{ env('ONLINE_URL') }}forgot-password?phone={{ $params['s_phone']}}" title="">Đổi mật khẩu</a>
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @else
        {{ $result['message'] }}
    @endif
@endsection

@section('script')
<script>
    window.onload = function () {
        var fiveMinutes = 5 ,
            display = document.querySelector('#time');
            startTimer();
    };

    function Timer(){
        $('#send').css('display','none');
        $('#time').css('display','inline-block');
        let enable = true;
        startTimer()
    }

    function startTimer() {
        let enable = true;
        let total = 29;//
        setInterval(() => {
          if (enable) {
            if (total > 0) {
              total--;
              $('#time').html(total);
            } else {
              enable = false;
              $('#send').css('display','inline-block');
              $('#time').css('display','none');
            }
          }
        }, 1000);
    }

    $(document).ready(function() {
        $("#back_step").on("click", function(){
            $('#form_end').submit();
        });
    });

</script>
@stop
