@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/7inch_result.css') }}">
@endsection
@section('content')
    <section class="result-order">
       <div class="container">
            @if(isset($data) && !empty($data))
               @foreach($data['orders']['data'] as $key => $item)
                   <div class="item item-{{ $key }}">
                       <h1 class="text-right">Mã đơn: {{$item['bill']}}</h1>
                       <div class="result-order-header">
                           <div class="header-left">
                               <div class="QR-CODE">
                                   <img src="{{ asset('images/qr-code 1.png') }}" alt="">
                               </div>
                               <div class="pt-3 border-right info-service">
                                   <div class="row pt-2">
                                       <div class="col-12 mb-4">Phí dịch vụ</div>
                                       <div class="col-12 mb-4"><span class="money">230.945</span> vnđ</div>
                                       <div class="col-12 mb-4">Tiền thu hộ (COD)</div>
                                       <div class="col-12 mb-4"><span class="money">23.000</span> vnđ <span class="bg-info">{{ $item['billstatus_desc'] }}</span></div>
                                   </div>
                               </div>
                           </div>
                           <div class="pt-2 header-right">
                               <div class="align-self-center d-flex bd-highlight about-right">
                                   <div class="mr-auto p-2 bd-highlight">
                                       <p>Loại dịch vụ</p>
                                       <p>Người thanh toán</p>
                                       <p>Thời gian hoàn trình dự kiến:</p>
                                   </div>
                                   @php
                                       $send_date = new DateTime(date_format(date_create(str_replace('/','-',substr($item['send_date'],0,10))),"Y/m/d H:i:s"));
                                       $date_expected = new DateTime(date_format(date_create(str_replace('/','-',substr($item['date_expected'],0,10))),"Y/m/d H:i:s"));
                                       $sub_date = $date_expected->diff($send_date)->format('%d');
                                   @endphp
                                   <div class="mr-auto p-2 bd-highlight text-right">
                                       <p>{{ $item['service'] }}</p>
                                       <p>{{ $item['payment_method_name'] }}</p>
                                       <p>{{$sub_date.' Ngày'  }}</p>
                                   </div>
                                   <div class="p-2 bd-highlight text-right">
                                       <img src="{{ asset('images/xe-may-7in.png') }}" alt="">
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="mt-2 result-order-content">
                           <div class="row">
                               <div class="align-self-center pl-2 content-left">
                                   {{--                       <div class="border-bottom p-2">--}}
                                   {{--                           <div class="row">--}}
                                   {{--                               <div class="col-2">--}}
                                   {{--                                   <img src="http://ntl-express.tui/images/product.png" width="60px" height="60px" alt="LỊCH">--}}
                                   {{--                               </div>--}}
                                   {{--                               <div class="col-10">--}}
                                   {{--                                   <span class="name-product">LỊCH</span>--}}
                                   {{--                               </div>--}}
                                   {{--                           </div>--}}
                                   {{--                       </div>--}}
                                   <div class="border-bottom p-2 address-to">
                                       <p>Nơi gửi:</p>
                                       <img class="mr-4" width="35px" height="35px" src="http://ntl-express.tui/images/NTX - Icon/Small 50x50/Phone Blue.png" alt="Phone">
                                       <span>{{ empty($item['sender_contact_tel']) ? '0373638358' : $item['sender_contact_tel'] }}</span><br>
                                       <img class="mr-4" width="35px" height="35px" src="http://ntl-express.tui/images/NTX - Icon/Small 50x50/Address Blue.png" alt="Địa chỉ"><span>
                            {{ $item['sender_address'].', '.$item['sender_district'].', '.$item['sender_city']  }}</span><br>
                                       <img class="mr-4" width="35px" height="35px" src="http://ntl-express.tui/images/NTX - Icon/Small 50x50/Time Blue.png" alt="Địa Chỉ"><span>
                            Hôm nay - Từ 02:30 đến 04:30</span>
                                   </div>
                                   <div class="p-2 address-form">
                                       <p>Nơi nhận:</p>
                                       <img class="mr-4" width="35px" height="35px" src="http://ntl-express.tui/images/NTX - Icon/Small 50x50/Phone Blue.png" alt="Phone"><span>
                            {{ empty($item['receiver_contact_tel']) ? '0373638358' : $item['receiver_contact_tel'] }}
                        </span><br>
                                       <img class="mr-4" width="35px" height="35px" src="http://ntl-express.tui/images/NTX - Icon/Small 50x50/Address Blue.png" alt="Địa Chỉ"><span>
                             {{ $item['receiver_address'].', '.$item['receiver_district'].', '.$item['receiver_city']  }}</span><br>
                                       <img class="mr-4" width="35px" height="35px" src="http://ntl-express.tui/images/NTX - Icon/Small 50x50/Time Blue.png" alt="Địa Chỉ"><span>
                            Hôm nay - Từ 02:30 đến 04:30</span>
                                   </div>
                               </div>
                               <div class="align-self-center content-right">
                                   <div class="status-order">
                                       <p class="pl-5 pt-3 mb-4"><strong class="title-statius">Tình trạng vận đơn</strong></p>
                                       <div class="row row-circle">
                                           <div class="col-1">
                                               @if($item['current_step_status'] == 'step_1' || $item['current_step_status'] == 'step_2' || $item['current_step_status'] == 'step_3' )
                                                   <div class="w-100 text-white rounded-circle circle done"><img src="http://ntl-express.tui/images/Vector.png" alt=""></div>
                                               @else
                                                   <div class="w-100 text-white rounded-circle circle border"><img src="http://ntl-express.tui/images/Vector.png" alt=""></div>
                                               @endif
                                           </div>
                                           <div class="col-3 center-line">
                                               @if($item['current_step_status'] == 'step_2' || $item['current_step_status'] == 'step_3' )
                                                   <hr class="font-weight-bold done">
                                               @else
                                                   <hr class="font-weight-bold">
                                               @endif
                                           </div>
                                           <div class="col-1">
                                               @if( $item['current_step_status'] == 'step_2' || $item['current_step_status'] == 'step_3' )
                                                   <div class="w-100 text-white rounded-circle circle done"><img src="http://ntl-express.tui/images/Vector.png" alt=""></div>
                                               @else
                                                   <div class="w-100 text-white rounded-circle circle border"><img src="http://ntl-express.tui/images/Vector.png" alt=""></div>
                                               @endif
                                           </div>
                                           <div class="col-3 center-line">
                                               @if($item['current_step_status'] == 'step_3' )
                                                   <hr class="font-weight-bold done">
                                               @else
                                                   <hr class="font-weight-bold">
                                               @endif
                                           </div>
                                           <div class="col-1">
                                               @if( $item['current_step_status'] == 'step_3' )
                                                   <div class="w-100 text-white rounded-circle circle done"><img src="http://ntl-express.tui/images/Vector.png" alt=""></div>
                                               @else
                                                   <div class="w-100 text-white rounded-circle circle border"><img src="http://ntl-express.tui/images/Vector.png" alt=""></div>
                                               @endif
                                           </div>
                                       </div>
                                       <div class="pl-3 row step-now">
                                           <div class="col-4 mt-2 pl-4 status-now">
                                               <p>Đã lấy hàng</p>
                                           </div>
                                           <div class="col-4 mt-2 status-now">
                                               <p>Đang giao hàng</p>
                                           </div>
                                           <div class="col-3 mt-2 ml-3 status-now">
                                               <p>Hoàn tât</p>
                                           </div>
                                       </div>
                                       <div class="pl-5 mt-1 row">
                                           <div class="col-11 p-2 text-justify content-title">
                                               <table class="table">
                                                   <thead>
                                                   <tr>
                                                       <th class="pl-0 border-0" scope="col">Số TT</th>
                                                       <th class="border-0" scope="col">Thời gian</th>
                                                       <th class="text-right pr-0  border-0" scope="col">Hoạt động</th>
                                                   </tr>
                                                   </thead>
                                                   <tbody>
                                                   @foreach($item['histories'] as $key => $value)
                                                       <tr>
                                                           <td style="width:10%;" scope="row">{{ ++$key }}</td>
                                                           <td style="width:35%;">{{ $value['loc_time'] }}</td>
                                                           <td class="text-right pr-0" style="width:50%;">{{ $value['operation'] }}</td>
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
               @endforeach
           <div class="fixed-bottom button-footer">
               <div class="row">
                   <div class="col-6">
                       <a href="/7-inch/chon-chuc-nang"> <button class="w-100  text-white btn-home">
                               <img src="{{asset('images/icon-home-7in.png')}}" alt="">Trang chủ</button></a>
                   </div>
                   <div class="col-6">
                       <button class="text-white btn-pre">Trước</button>
                       <button class="bg-white number-page"><span class="p-2 current-page">1</span> <span class="p-2">/</span>
                          <span class="p-2 text-secondary total-pages">{{ count($data['orders']['data']) }}</span></button>
                       <button class="text-white btn-next">Sau</button>
                   </div>
               </div>
           </div>
       </div>
       @endif
    </section>
    <script>
        checkPreNextDisables();
        $('.item').hide();
        $('.item-0').show();

        $('.btn-next').on('click', function () {
            let currentPage = parseFloat($('.current-page').text());
            let totalPages = parseFloat($('.total-pages').text());

            if (currentPage < totalPages) {
                currentPage = currentPage + 1;
                $('.item').hide();
                $('.item-'+ --currentPage).show();
                $('.current-page').html(++currentPage)
                $('.btn-pre').prop('disabled',false);
            } else  {
                $(this).prop('disabled',true)
            }
        });
        $('.btn-pre').on('click', function (){
            let currentPage = parseFloat($('.current-page').text());
            let totalPages = parseFloat($('.total-pages').text());

            if (currentPage <= totalPages && currentPage > 1) {
                currentPage = currentPage - 1;
                $('.item').hide();
                $('.item-'+ --currentPage).show();
                $('.current-page').html(++currentPage)
                $('.btn-next').prop('disabled',false);
            } else {
                $(this).prop('disabled', true)
            }
        });
        function checkPreNextDisables(){
            let currentPage = parseFloat($('.current-page').text());
            let totalPages = parseFloat($('.total-pages').text());
            if (currentPage === 1){
                $('.btn-pre').prop('disabled', true)
            } else
            if (currentPage === totalPages){
                $('.btn-next').prop('disabled', true)
            }
        }
    </script>
@endsection
