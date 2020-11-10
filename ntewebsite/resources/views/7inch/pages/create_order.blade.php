@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/7inch_choose_option.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/7inch.css') }}">
@endsection
@section('content')
    <header>
        <div class="d-flex align-items-center justify-content-center header">
            <img src="{{ asset('images/desktop/logo.png') }}" alt="">
        </div>
    </header>
    <section class="choose-option">
        <div class="row justify-content-around">
            <div OnClick=" location.href='7-inch/tao-don-1/1'" class="col-5 text-white option option-left">
                <img class="img img-moto" src="{{ asset('images/xe-may-7in.png') }}" alt="">
                <div class="option-title option-create">
                    <h1 class="right-h1">{{ trans('messages.moto') }}</h1>
                    <p class="mt-3 right-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                </div>
            </div>
            <div OnClick=" location.href='7-inch/tao-don-1/2'" class="col-5 text-white option option-right">
                <img class="img img-oto" src="{{ asset('images/xe-van-7in.png') }}" alt="">
                <div class="option-title option-create">
                    <h1>{{ trans('messages.oto')  }}</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                </div>
            </div>
        </div>
        <div class="fixed-bottom button-footer">
        <div class="row">
            <div class="col-12 p-0">
                <button OnClick=" location.href='7-inch/chon-chuc-nang'" class="w-100 btn-pre">
                    <img src="{{asset('images/NTX - Icon/Small 50x50/Blue Arrow 3.1.png')}}" alt="">Quay lại
                </button>
            </div>
        </div>
    </div>
    </section>
@endsection
