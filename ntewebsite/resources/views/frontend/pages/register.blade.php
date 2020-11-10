@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection
@section('content')
    <section class="section-register">
        <div class="container">
            <div class="text-center w-100">
                <h1 class="text-white text-uppercase title-login">{{ trans('messages.register') }}</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card bg-white car-register">
                    <div class="card-body">
                        <form id="form-register">
                            <div class="input-group form-group">
                                <input type="text" class="bg-white form-control" name="phone_number" placeholder="{{ trans('messages.phone_number') }}">
                                <div class="invalid-feedback err-phone"></div>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group show_hide_password" id="show_hide_password">
                                    <input type="password" class="bg-white form-control password-field" value="{{ old('phone_number') }}" id="password" name="password" placeholder="{{ trans('messages.password') }}">
                                    <div class="input-group-addon">
                                        <img src="{{ asset('images/NTX - Icon/Small 50x50/Eye.png') }}" class="show-hide-eyes-password" alt="Show pass">
                                    </div>
                                    <div class="invalid-feedback err-pass"></div>
                                </div>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group show_hide_password">
                                    <input type="password" class="bg-white form-control password-field" value="{{ old('confirm_password') }}" id="confirm_password" name="confirm_password" placeholder="{{ trans('messages.re_password') }}">
                                    <div class="input-group-addon">
                                        <img src="{{ asset('images/NTX - Icon/Small 50x50/Eye.png') }}" class="show-hide-eyes-confirm-password" alt="Show pass">
                                    </div>
                                    <div class="invalid-feedback err-pass"></div>
                                </div>
                            </div>
                            <div class="form-group mt-2 w-100">
                                <input type="submit" value="{{ trans('messages.register') }}" class="btn text-uppercase register_btn">
                            </div>
                            <div class="row text-justify text-center w-100">
                            <span class="content-rule">{{ trans('messages.note_user') }} <strong class="text-black">Nhất Tín</strong></span>
                            </div>
                            <hr>
                            <div class="row align-items-center">
                                <span class="title-form">{{ trans('messages.account_not_exits') }}</span>
                            </div>
                            <div class="form-group mt-2 w-100">
                                <a class="btn text-uppercase text-white re_login_btn" href="{{ route('client.login') }}">{{ trans('messages.login') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/pages/register.js') }}"></script>
@endsection
