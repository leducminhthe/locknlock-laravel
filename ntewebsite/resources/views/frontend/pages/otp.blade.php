@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{asset('css/otp.css')}}">
@endsection
@section('content')
    <section class="section-otp">
        <div class="container">
            <div class="text-center w-100">
                <h1 class="text-white title-header">OTP</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card bg-white card-otp">
                    <div class="card-body">
                        <form>
                            <div class="input-group justify-content-center form-group">
                                <img src="{{ asset('images/Group-otp.png') }}" alt="OTP">
                            </div>
                            <div class="input-group form-group text-center">
                                <p class="mb-md-0">{{ trans('messages.header_otp') }}</p>
                                <span class="phone">0373638358</span>
                            </div>
                            <div class="input-group pl-1 form-group">
                                <div class="col-2">
                                    <input type="text" class="input-number text-center"
                                           type="number"
                                           maxlength="1"
                                    >
                                </div>
                                <div class="col-2">
                                    <input type="text" class="input-number text-center"
                                           type="number"
                                           maxlength="1"
                                    >
                                </div>
                                <div class="col-2">
                                    <input type="text" class="input-number text-center"
                                           type="number"
                                           maxlength="1"
                                    >
                                </div>
                                <div class="col-2">
                                    <input type="text" class="input-number text-center"
                                           type="number"
                                           maxlength="1"
                                    >
                                </div>
                                <div class="col-2">
                                    <input type="text" class="input-number text-center"
                                           type="number"
                                           maxlength="1"
                                    >
                                </div>
                                <div class="col-2">
                                    <input type="text" class="input-number text-center"
                                           type="number"
                                           maxlength="1"
                                    >
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-center" hidden>
                                <img class="mr-1" width="10px" src="{{ asset('images/NTX - Icon/Small 50x50/Warning.png') }}" alt=""><span class="text-danger title-form">{{ trans('messages.warning_otp') }}</span>
                            </div>
                            <div class="form-group mt-2 w-100">
                                <a href="/" class="btn text-uppercase submit_otp_btn">{{ trans('messages.done') }}</a>
                                {{--                                <input type="submit" value="{{ trans('messages.done') }}" class="btn submit_otp_btn">--}}
                            </div>
                            <div class="row align-items-center justify-content-center">
                                <span class="title-form title-check">{{ trans('messages.otp_exits') }}</span>
                            </div>
                            <div class="row text-justify text-center justify-content-center mt-2 w-100">
                                <span class="ml-4 otp-return">{{ trans('messages.send_again') }}(30s)</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/pages/otp.js') }}"></script>
@endsection
