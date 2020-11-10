@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/7inch_pay.css') }}">
@endsection
@section('content')
    @if($result['success'] == true)
        <section class="section-pay pt-2">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-12 text-center">Tạo đơn hàng hoàn tất</div>
                <div class="col-12 text-center">Cám ơn bạn đã tạo vận đơn trên</div>
                <div class="col-12 text-center">Nhất Tín Express</div>
                <div class="col-12 text-center">
                    <img src="{{ asset('images/Frame-thank-you.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="fixed-bottom button-footer">
            <div class="row">
                <div class="col-6">
                    <button class="w-100 btn-pre"><img src="{{asset('images/in-bill-7in.png')}}" alt="">In bill vận đơn</button>
                </div>
                <div class="col-6">
                    <button OnClick=" location.href='7-inch/chon-chuc-nang'" class="w-100 text-white btn-next"><img src="{{asset('images/hop-qua-7in.png')}}" alt="">Trở về trang chủ</button>
                </div>
            </div>
        </div>
    </section>
    @else
        <section class="section-pay pt-2">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-12 text-center">Không thể hoàn thành thanh toán</div>
                <div class="col-12 text-center small-text">Đảm bảo rằng bạn đã nhập đúng thông tin thẻ thanh toán.</div>
                <div class="col-12 text-center small-text">Vui lòng nhập lại hoặc lựa chọn hình thức thanh toán khác.</div>
                <div class="col-12 text-center">
                    <img class="cannot-pay" width="722px" height="618px" src="{{ asset('images/hop-qua-pay-7in.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="fixed-bottom button-footer">
            <div class="row">
                <div class="col-12">
                    <button class="w-100 text-white btn-next"><img class="cannot-icon-pay" src="{{asset('images/icon-pay-7in.png')}}" alt="">Thanh toán lại</button>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
