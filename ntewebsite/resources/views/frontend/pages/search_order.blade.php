@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{asset('css/search_order.css')}}">
@endsection

@section('content')
    <section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24">{{ trans('messages.home') }} <span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">{{ trans('messages.search_order') }}</span>
            </div>
        </div>
    </section>
    <div class="container mb-3">
        <div class="w-100 box-vitri mt-2 pt-4 pb-4 pl-3 pr-3 pl-md-4 pe-md-4">
            <form action="{{ route('client.result') }}" method="get" class="">
                <div class="row py-3 search-form mb-3 mb-md-0 m-auto">
                    <div class="col-md-10 col-9 form-group  search-box">
                        <input type="text" class="form-control" name="q" id="inputAddress"
                               placeholder="Nhập mã vận đơn" style="background: white;" value="">
                        <div class="result result1" id="live_reload_box">
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                    <div class="col-md-2 col-3 form-group mb-3 mb-md-0 group-button">
                        <button type="submit" class="btn btn-secondary form-control btn-search1"
                                style="margin-top: -1px; color: black !important;"
                                disabled>{{ trans('messages.search') }}
                        </button>
                        <button type="submit" class="btn btn-secondary form-control btn-search-mobie" disabled>
                            <img src="{{ asset('images/NTX - Icon/Small 50x50/Search Gray.png') }}" alt="Search">
                        </button>
                    </div>
                </div>
            </form>
            <div class="w-100 text-white">
                {{ trans('messages.suggestions') }}
            </div>
            <div class="w-100 text-white font-size-18 mt-1">
                <p>{{ trans('messages.contact_hotline') }}<a href="tel:{{ config('constants.hotlines') }}"
                                                             class="text-yellow font-weight-bold">{{ config('constants.hotlines') }}</a>
                    hoặc Email:
                    <a href="mailto:{{ config('constants.emails') }}"
                       class="text-yellow font-weight-bold">{{ config('constants.emails') }}</a></p>
            </div>
        </div>
        <div class="mt-2 section-result-order">
            @php
                $flag = false;
                if (!empty($orders) && isset($orders)){
                     foreach ($orders as $order){
                    if( $order['found'] == true){
                        $flag = true;
                        break;
                    }
                }
                }
            @endphp
            @if($flag == true)
                <div class="header-result pr-2">
                    <div class="row">
                        <div class="col-12 pr-0 d-flex justify-content-end filter-left">
                            <button class="btn btn-all-item">{{ trans('messages.total_order')  }}</button>
                            <button class="btn ml-3 btn-item-done">{{ trans('messages.done_order') }}</button>
                            <button class="btn ml-3 btn-item-not-done">{{ trans('messages.unfinished') }}</button>
                        </div>
                        {{--                        <div class="col-12 col-md-6 d-flex justify-content-end align-items-center filter-right">--}}
                        {{--                            <div class="total-order"><span>(Tổng: {{ count($orders['data'] ) }} đơn)</span></div>--}}
                        {{--                            <div class="dropdown">--}}
                        {{--                                <button class="btn ml-3 dropdown-toggle" type="button" id="dropdownMenuButtonCalendar"--}}
                        {{--                                        data-toggle="dropdown" aria-haspopup="true"--}}
                        {{--                                        aria-expanded="false"><a class="mr-1" href="">Lọc</a><img--}}
                        {{--                                        src="{{ asset('images/Frame 55.png') }}" alt=""></button>--}}
                        {{--                                <div class="font-size-16 dropdown-menu" id="dropdown-menu"--}}
                        {{--                                     aria-labelledby="dropdownMenuButtonCalendar">--}}
                        {{--                                    <div id="date-picker-example"--}}
                        {{--                                         class="md-form md-outline p-2 input-with-post-icon datepicker">--}}
                        {{--                                        <input placeholder="Select date" type="date" id="example"--}}
                        {{--                                               class="bg-white form-control">--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="dropdown">--}}
                        {{--                                <button class="btn ml-3 dropdown-toggle" type="button" id="dropdownMenuButton"--}}
                        {{--                                        data-toggle="dropdown" aria-haspopup="true"--}}
                        {{--                                        aria-expanded="false"><a class="mr-1" href="">Xắp xếp</a><img--}}
                        {{--                                        src="{{ asset('images/Frame 56.png') }}" alt=""></button>--}}
                        {{--                                <div class="font-size-16 dropdown-menu" id="dropdown-menu"--}}
                        {{--                                     aria-labelledby="dropdownMenuButton">--}}
                        {{--                                    <a class="border-bottom h-75 dropdown-item" href="#">Mới nhất - Cũ nhất</a>--}}
                        {{--                                    <a class="dropdown-item" href="#">Cũ nhất - Mới nhất</a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="result-order mb-2">
                    @foreach( $orders as $key => $order)
                        @if($order['found'] == true)
                            <div class="item {{$order['current_step_status'] == 'step_3' ? 'item-done':'item-not-done'}}">
                                <div class="row mt-3 ml-3">
                                    <div class="col-12 col-md-5 pt-3 border-right info-order">
                                        <div class="row font-size-13 pt-2">
                                            <div class="col-12 mb-3">
                                                <div class="float-left font-size-24 color-gray">{{ trans('messages.order_id') }}</div>
                                                <div class="float-right font-size-24"><span class="font-weight-bold">{{$order['bill'] ?? ''}}</span></div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="float-left color-gray">{{ trans('messages.type_product') }}</div>
                                                <div class="float-right">{{ $order['product_description'] ?? '' }}</div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="float-left color-gray">{{ trans('messages.service') }}</div>
                                                <div class="float-right">{{ $order['service'] ?? '' }}</div>
                                            </div>
                                            <div class="col-12 mb-3">
{{--                                                {{ dd($order) }}--}}
                                                <div class="float-left color-gray">{{ trans('messages.type_order') }}</div>
                                                <div class="float-right">{{ $order['service_order'] ?? 'Xe máy' }}</div>
                                            </div>
{{--                                            <div class="col-5 col-md-6 info-order-left">--}}
{{--                                                <p class="font-size-24 color-gray">{{ trans('messages.order_id') }}</p>--}}
{{--                                                <p class="color-gray">{{ trans('messages.type_product') }}</p>--}}
{{--                                                <p class="color-gray">{{ trans('messages.service') }}</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-7 col-md-6 info-order-right">--}}
{{--                                                <p><strong class="font-size-24">{{$order['bill'] ?? ''}}</strong></p>--}}
{{--                                                <p>{{ $order['product_description'] ?? '' }}</p>--}}
{{--                                                <p>{{ $order['service'] ?? '' }}</p>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="title-input-email">{{ trans('messages.email_follow') }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-8 input-email">
                                                <input name="email" type="email"
                                                       class="form-control bg-white notify-email"
                                                       placeholder="Nhập email của bạn">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-12 col-md-4 pl-2 button-email">
                                                <button class="btn font-size-12 btn-sendEmail"
                                                        data-bill_code="{{ $order['bill'] }}">{{ trans('messages.done') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7 status-order">
                                        @if(\App\Helpers\isMobile())
                                            <p class="pl-5"><strong
                                                    class="font-size-24">{{ trans('messages.status_order') }}</strong>
                                            </p>
                                            <div class="row">
                                                <div class="col-2 pl-0">
                                                    @if( $order['current_step_status'] == 'step_1' || $order['current_step_status'] == 'step_2' || $order['current_step_status'] == 'step_3')
                                                        <div class="w-100 rounded-circle text-white circle done">
                                                            <img src="{{asset('images/Vector.png')}}" alt="">
                                                        </div>
                                                    @else
                                                        <div class="w-100 rounded-circle text-white circle border">
                                                            <img src="{{asset('images/Vector-blue.png')}}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-10 status-right">
                                                    <p>{{  trans('messages.has_taken') }}</p>
                                                    <p>
                                                        Đ/C: {{ $order['sender_address'] ?? '' .', '.$order['sender_district'] ?? '' .', '.$order['sender_city'] ?? '' }}</p>
                                                </div>
                                            </div>
                                            <div class="space-1 <?php if ($order['current_step_status'] == 'step_2' || $order['current_step_status'] == 'step_3') echo 'done'?>"></div>
                                            <div class="row">
                                                <div class="col-2 pl-0">
                                                    @if( $order['current_step_status'] == 'step_2' || $order['current_step_status'] == 'step_3')
                                                        <div class="w-100 rounded-circle text-white circle done">
                                                            <img src="{{asset('images/Vector.png')}}" alt="">
                                                        </div>
                                                    @else
                                                        <div class="w-100 rounded-circle text-white circle border">
                                                            <img src="{{asset('images/Vector-blue.png')}}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-10 status-right">
                                                    <p>{{ trans('messages.has_taken') }}</p>
                                                    <p>
                                                        Đ/C: {{ $order['receiver_address'].', '.$order['receiver_district'].', '.$order['receiver_city'] }}</p>
                                                </div>
                                            </div>
                                            <div
                                                class="space-2 <?php if ($order['current_step_status'] == 'step_3') echo 'done'?>"></div>
                                            <div class="row">
                                                <div class="col-2 pl-0">
                                                    @if( $order['current_step_status'] == 'step_3')
                                                        <div class="w-100 rounded-circle text-white circle done">
                                                            <img src="{{asset('images/Vector.png')}}" alt="">
                                                        </div>
                                                    @else
                                                        <div class="w-100 rounded-circle text-white circle border">
                                                            <img src="{{asset('images/Vector-blue.png')}}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-10 status-right">
                                                    <p>{{ trans('messages.done') }}</p>
                                                    <img src="{{ asset('images/package 1.png') }}" alt="Hoàn tất">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="d-flex bd-highlight pl-1 ml-5 mb-3 time-send">
                                                <div class="bd-highlight mr-auto">
                                                    <span>{{ trans('messages.intend_time') }}</span>
                                                </div>
                                                @php
                                                    $send_date = new DateTime(date_format(date_create(str_replace('/','-',substr($order['send_date'],0,10))),"Y/m/d H:i:s"));
                                                    $date_expected = new DateTime(date_format(date_create(str_replace('/','-',substr($order['date_expected'],0,10))),"Y/m/d H:i:s"));
                                                    $sub_date = $date_expected->diff($send_date)->format('%d');
                                                @endphp
                                                <div class="bd-highlight days"><span>{{ $sub_date }} ngày</span></div>
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                <a href="{{ route('client.order_detail',['id' => $order['bill']]) }}"
                                                   class="mt-5 view-more">{{ trans('messages.view_detail') }}</a>
                                            </div>
                                        @else
                                            <p class="title-status-order"><strong
                                                    class="font-size-24 font-weight-bold">{{ trans('messages.status_order') }}</strong>
                                            </p>
                                            <div class="row d-flex justify-content-center row-circle">
                                                <div class="col-1">
                                                    @if( $order['current_step_status'] == 'step_1' || $order['current_step_status'] == 'step_2' || $order['current_step_status'] == 'step_3')
                                                        <div class="w-100 text-white rounded-circle circle done">
                                                            <img src="{{asset('images/Vector.png')}}" alt=""></div>
                                                    @else
                                                        <div class="w-100 text-white rounded-circle circle border-done">
                                                            <img src="{{asset('images/Vector-blue.png')}}" alt=""></div>
                                                    @endif
                                                </div>
                                                <div class="col-3 center-line">
                                                    <hr class="font-weight-bold <?php if ($order['current_step_status'] == 'step_2' || $order['current_step_status'] == 'step_3') echo 'done'?>">
                                                </div>
                                                <div class="col-1">
                                                    @if( $order['current_step_status'] == 'step_2' || $order['current_step_status'] == 'step_3')
                                                        <div class="w-100 text-white rounded-circle circle done">
                                                            <img src="{{asset('images/Vector.png')}}" alt=""></div>
                                                    @else
                                                        <div class="w-100 text-white rounded-circle circle border">
                                                            <img src="{{asset('images/Vector-blue.png')}}" alt=""></div>
                                                    @endif
                                                </div>
                                                <div class="col-3 center-line">
                                                    <hr class="font-weight-bold <?php if ($order['current_step_status'] == 'step_3') echo 'done'?>">
                                                </div>
                                                <div class="col-1 align-self-start">
                                                    @if($order['current_step_status'] == 'step_3')
                                                        <div class="w-100 text-white rounded-circle circle done">
                                                            <img src="{{asset('images/Vector.png')}}" alt=""></div>
                                                    @else
                                                        <div class="w-100 text-white rounded-circle circle border">
                                                            <img src="{{asset('images/Vector-blue.png')}}" alt=""></div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row pl-5 d-flex justify-content-center">
                                                <div class="col-4 mt-4 get-order">
                                                    <p>{{ trans('messages.has_taken') }}</p>
                                                    <p>
                                                        Đ/C: {{ $order['sender_address'].', '.$order['sender_district'].', '.$order['sender_city'] }}</p>
                                                </div>
                                                <div class="col-5 mt-4 delivery-order">
                                                    <p>{{ trans('messages.delivered') }}</p>
                                                    <p>
                                                        Đ/C: {{ $order['receiver_address'].', '.$order['receiver_district'].', '.$order['receiver_city'] }}</p>
                                                </div>
                                                <div class="col-3 pl-4 mt-4 done-order">
                                                    <p>{{  trans('messages.done') }}</p>
                                                    <img class="ml-1" src="{{ asset('images/package 1.png') }}" alt="">
                                                </div>
                                            </div>
                                            <hr class="w-75 border-dashed">
                                            <div class="pl-5 row footer-status-order">
                                                <div class="col-5 mt-4">
                                                    <p class="ml-3 font-size-16 color-gray">{{ trans('messages.intend_time') }}</p>
                                                </div>
{{--                                                <div class="col-4 mt-4">--}}
{{--                                                </div>--}}
                                                <div class="col-6 mt-4 text-right right-footer-order">
                                                    @php
                                                        $send_date = new DateTime(date_format(date_create(str_replace('/','-',substr($order['send_date'],0,10))),"Y/m/d H:i:s"));
                                                        $date_expected = new DateTime(date_format(date_create(str_replace('/','-',substr($order['date_expected'],0,10))),"Y/m/d H:i:s"));
                                                        $sub_date = $date_expected->diff($send_date)->format('%d');
                                                    @endphp
                                                    <p class="font-size-16 font-weight-bold take-day">{{ $sub_date == '0' ? 'Trong' : $sub_date }}
                                                        ngày </p>
                                                    <p class=""><a
                                                            href="{{ route('client.order_detail',['id' => $order['bill']]) }}"
                                                            class="mt-5 view-more">{{ trans('messages.view_detail') }}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
        @if(empty($orders) && isset($orders))
            <div class="mt-2 section-result-order">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 pt-3 pb-3 text-center">
                        <img src="{{ asset('images/not-found-order.png') }}" alt="">
                    </div>
                    <div class="col-12 pb-3 text-center">
                        <span>{{ trans('messages.not_fount_order') }}</span>
                    </div>
                </div>
            </div>
        @endif
        <div class="modal fade" id="modal-sendmail" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Thông báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-12 text-center notify-send-mail"></div>
                            <div class="col-12 text-center content-send-mail"></div>
                            <div class="col-12 text-center">
                                <img class="image-notify" width="400px" src="{{ asset('images/mail/hoan-tat.png') }}"
                                     alt="">
                            </div>
                        </div>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/pages/search.js') }}"></script>

    <script>
        $('.notify-email').on('keypress', function (e) {
            $(this).parent().find('.invalid-feedback').hide();
        })
        $('.btn-sendEmail').on('click', function (e) {
            let email = $(this).parents('.row').find('input').val();
            let bill_code = $(this).data("bill_code");
            $.ajax({
                method: 'GET',
                url: '/gui-mail',
                data: {
                    email: email,
                    bill_code: bill_code
                },
                success: res => {
                    if (res.status == 201) {
                        $(this).parents('.row').find('.invalid-feedback').text(res.messages.email).show();
                        return false;
                    }
                    if (res.success === true) {
                        $('.notify-send-mail').text('Vui lòng xem email để biết chi tiết');
                        $('.content-send-mail').text(res.messages);
                        $('.image-notify').attr('src', 'images/mail/hoan-tat.png')
                        $('#modal-sendmail').modal('show');
                    } else {
                        $('.notify-send-mail').text('Gửi mail thất bại, vui lòng kiểm tra lại !!!');
                        $('.content-send-mail').text(res.messages);
                        $('.image-notify').attr('src', 'images/mail/that-bai.png')
                        $('#modal-sendmail').modal('show');

                    }

                },
                error: err => {
                    $('.notify-send-mail').text('Gửi mail thất bại, vui lòng kiểm tra lại');
                    $('.content-send-mail').text(err.messages);
                    $('#modal-sendmail').modal('show');
                }
            })
        });
        $('.btn-all-item').on('click', function () {
            $(this).css('background', 'rgb(35, 102, 177)').css('color','#FFFFFF');
            $('.btn-item-done').css('background', '#FFFFFF').css('color','#000000');
            $('.btn-item-not-done').css('background', '#FFFFFF').css('color','#000000');

            $('.item').show();
        });
        $('.btn-item-done').on('click', function () {

            $('.item').hide();
            $(this).css('background', 'rgb(35, 102, 177)').css('color','#FFFFFF');
            $('.btn-all-item').css('background', '#FFFFFF').css('color','#000000');

            $('.btn-item-not-done').css('background', '#FFFFFF').css('color','#000000');
            $('.item-done:even').css('background','#FFFFFF');
            $('.item-done:odd').css('background','rgba(9,12,152,0.02)');

            $('.item-done').show();
        });
        $('.btn-item-not-done').on('click', function () {
            $(this).css('background', 'rgb(35, 102, 177)').css('color','#FFFFFF');
            $('.btn-all-item').css('background', '#FFFFFF').css('color','#000000');
            $('.btn-item-done').css('background', '#FFFFFF').css('color','#000000');

            $('.item-not-done:even').css('background','#FFFFFF');
            $('.item-not-done:odd').css('background','rgba(9,12,152,0.02)');

            $('.item-not-done').show();
            $('.item-done').hide();
        });
    </script>
@endsection
