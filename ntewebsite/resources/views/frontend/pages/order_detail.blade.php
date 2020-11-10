@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{asset('css/order_detail.css')}}">
@endsection
@section('content')
    @if(isset($orders) && !empty($orders))
    <section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="/" class="text-white font-size-24">{{ trans('messages.home') }}<span class="mr-1 ml-1">/</span></a>
                <a href="{{ route('client.search_order') }}" class="text-white font-size-24">{{ trans('messages.search')  }}<span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">#{{ $orders['data'][0]['bill'] }}</span>
            </div>
        </div>
    </section>
        <div class="container mb-3">
            <h1 class="mt-4 mb-4 id-order">{{ trans('messages.order_id') }}: #{{ $orders['data'][0]['bill'] }}</h1>
            <div class="mt-2 mb-2 about-order-detail">
                <div class="row">
                    <div class="col-md-2 align-self-center d-flex justify-content-center border-right img-code">
                        <img src="{{ asset('images/qr-code 1.png') }}" width="100px" height="100px" alt="QR-CODE">
                    </div>
                    <div class="col-md-4 align-self-center d-flex bd-highlight border-right fees">
                        <div class="mr-auto pl-2 pr-2 pt-3 bd-highlight">
                            <p class="font-size-14 font-weight-light color-gray">{{ trans('messages.fee_service') }}</p>
                            <span class="font-size-24 font-weight-bold">230.945</span><span> vnđ</span>
                        </div>
                        <div class="mr-auto pl-2 pr-2 pt-3 bd-highlight">
                            <p class="font-size-14 font-weight-light color-gray">{{ trans('messages.collection_fee') }}</p>
                            <span class="font-weight-bold font-size-24">230.945</span><span class="mr-1"> vnđ</span>
                            <span class="bg-info text-white pl-1">@if($orders['data'][0]['current_step_status']== 'step_3')
                                    Đã nhận TT @else Chưa TT @endif </span>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center d-flex bd-highlight about-right">
                        <div class="mr-auto p-2 bd-highlight">
                            <p>{{ trans('messages.type_service') }}</p>
                            <p>{{ trans('messages.customer_pay') }}</p>
                            <p>{{ trans('messages.intend_time') }}:</p>
                        </div>
                        <div class="mr-auto p-2 bd-highlight text-right">
                            <p>{{ $orders['data'][0]['service'] }}</p>
                            <p>{{  $orders['data'][0]['payment_method_name'] }}</p>
                            @php
                                $send_date = new DateTime(date_format(date_create(str_replace('/','-',substr($orders['data'][0]['send_date'],0,10))),"Y/m/d H:i:s"));
                                $date_expected = new DateTime(date_format(date_create(str_replace('/','-',substr($orders['data'][0]['date_expected'],0,10))),"Y/m/d H:i:s"));
                                $sub_date = $date_expected->diff($send_date)->format('%d');
                            @endphp
                            <p>{{ $sub_date }} ngày</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-2 content-order-detail">
                <div class="row">
                    <div class="xs- pl-2 content-left">
                        <div class="border-bottom pt-2 pl-2 pr-2 pb-3">
                            <div class="row">
                                <div class="col-2">
                                    <img src="{{ asset('images/product.png') }}" width="60px" height="60px" alt="{{ $orders['data'][0]['product_description']}}">
                                </div>
                                <div class="col-10">
                                    <span class="name-product">{{ $orders['data'][0]['product_description'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom pt-2 pl-2 pr-2 pb-5">
                            <p>{{ trans('messages.send_customer') }}</p>
                            <img class="mr-2" width="20px" height="20px" src="{{ asset('images/NTX - Icon/Small 50x50/Phone Blue.png') }}"
                                 alt="Phone">
                            <span> {{ !empty($orders['data'][0]['sender_contact_tel'])? $orders['data'][0]['sender_contact_tel'] : '0372823143' }}</span><br>
                            <img class="mr-2" width="20px" height="20px" src="{{ asset('images/NTX - Icon/Small 50x50/Address Blue.png') }}" alt="Địa chỉ"><span>
                            {{ !empty($orders['data'][0]['sender_address'])?$orders['data'][0]['sender_address']:'118/14 Nguyễn Thị Nhỏ, P.15' .', '.$orders['data'][0]['sender_district'].', '.$orders['data'][0]['sender_city']}}</span>
                        </div>
                        <div class="p-2">
                            <p>{{ trans('messages.take_customer') }}</p>
                            <img class="mr-2" width="20px" height="20px" src="{{ asset('images/NTX - Icon/Small 50x50/Phone Blue.png') }}" alt="Phone"><span>
                            {{ isset($orders['data'][0]['receiver_contact_tel'])
                                && !empty($orders['data'][0]['receiver_contact_tel'])
                                ? $orders['data'][0]['receiver_contact_tel'] : "0372823143"}}
                        </span><br>
                            <img class="mr-2" width="20px" height="20px" src="{{ asset('images/NTX - Icon/Small 50x50/Address Blue.png') }}" alt="Địa Chỉ"><span>
                            {{ !empty($orders['data'][0]['receiver_address']) ? $orders['data'][0]['receiver_address']:'12 Lái Thiêu, P.17' .', '.$orders['data'][0]['receiver_district'].', '.$orders['data'][0]['receiver_city']}}</span>
                        </div>
                    </div>
                    <div class="content-right">
                        <div class="status-order">
                            <p class="pl-5 pt-3 mb-4"><strong class="font-size-24">{{ trans('messages.status_order') }}</strong></p>
                            <div class="row row-circle">
                                <div class="col-1 circle-one">
                                    @if( $orders['data'][0]['current_step_status'] == 'step_1' || $orders['data'][0]['current_step_status'] == 'step_2' || $orders['data'][0]['current_step_status'] == 'step_3')
                                        <div class="w-100 text-white rounded-circle circle done"><img
                                                src="{{asset('images/Vector.png')}}" alt=""></div>
                                    @else
                                        <div class="w-100 text-white rounded-circle circle border-done"><img
                                                src="{{asset('images/Vector-blue.png')}}" alt=""></div>
                                    @endif
                                </div>
                                <div class="col-3 center-line">
                                    @if( $orders['data'][0]['current_step_status'] == 'step_2' || $orders['data'][0]['current_step_status'] == 'step_3')
                                        <hr class="font-weight-bold done">
                                    @else
                                        <hr class="font-weight-bold">
                                    @endif
                                </div>
                                <div class="col-1 circle-tow">
                                    @if( $orders['data'][0]['current_step_status'] == 'step_2' || $orders['data'][0]['current_step_status'] == 'step_3')
                                        <div class="w-100 text-white rounded-circle circle done"><img
                                                src="{{asset('images/Vector.png')}}" alt=""></div>
                                    @else
                                        <div class="w-100 text-white rounded-circle circle border-done"><img
                                                src="{{asset('images/Vector-blue.png')}}" alt=""></div>
                                    @endif
                                </div>
                                <div class="col-3 center-line">
                                    @if($orders['data'][0]['current_step_status'] == 'step_3')
                                        <hr class="font-weight-bold done">
                                    @else
                                        <hr class="font-weight-bold">
                                    @endif
                                </div>
                                <div class="col-1 circle-three">
                                    @if( $orders['data'][0]['current_step_status'] == 'step_3')
                                        <div class="w-100 text-white rounded-circle circle done"><img
                                                src="{{asset('images/Vector.png')}}" alt=""></div>
                                    @else
                                        <div class="w-100 text-white rounded-circle circle border-done"><img
                                                src="{{asset('images/Vector-blue.png')}}" alt=""></div>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-3 row step-now">
                                <div class="col-4 mt-2 pl-4 status-now">
                                    <p>{{ trans('messages.has_taken') }}</p>
                                </div>
                                <div class="col-4 mt-2 status-now">
                                    <p>{{ trans('messages.delivered') }}</p>
                                </div>
                                <div class="col-3 mt-2 ml-3 status-now">
                                    <p>{{ trans('messages.done') }}</p>
                                </div>
                            </div>
                            <div class="pl-5 mt-1 row table-history">
                                <div class="col-11 p-2 text-justify" style="height: 260px; overflow: auto">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="pl-2 border-0" scope="col">TT</th>
                                            <th class="border-0" scope="col">Thời gian</th>
                                            <th class="text-right pr-0  border-0" scope="col">Hoạt động</th>
                                        </tr>
                                        </thead>
                                        <tbody >
                                        @foreach(  $orders['data'][0]['histories'] as $key => $content)
                                            <tr>
                                                <td style="width:5%;" scope="row">{{ ++$key }}</td>
                                                <td style="width:35%;">{{ $content['loc_time'] }}</td>
                                                <td class="text-right pr-0" style="width:70%;">{{ $content['operation'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
