@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/7inch_choose_option.css') }}">
@endsection
@section('content')
    <header>
        <div class="d-flex align-items-center justify-content-center header">
            <img src="{{ asset('images/desktop/logo.png') }}" alt="">
        </div>
    </header>
    <section class="choose-option">
        <div class="row justify-content-around">
            <div class="col-5 text-white option option-left">
                <a href="{{ route('seven.choose_create_order') }}">
                    <img src="{{ asset('images/box-angle.png') }}" alt="">
                    <div class="option-title">
                        <h1 class="text-white">Tạo vận đơn</h1>
                        <p class="mt-3 text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </a>
            </div>
            <div class="col-5 text-white option option-right">
                <a href="{{ route('seven.search_order') }}">
                    <img src="{{ asset('images/images-tra-cuu-7in.png') }}" alt="">
                    <div class="option-title">
                        <h1 class="text-white">Tra cứu vận đơn</h1>
                        <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
