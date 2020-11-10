@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('content')
    <section class="section-login">
        <div class="container">
            <div class="text-center w-100">
                <h1 class="text-white text-uppercase title-login">{{ trans('messages.login') }}</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card card-login">
                    <div class="card-body">
                        <form id="form-login">
                            <div class="input-group form-group">
                                <input type="text" value="{{ old('phone_number') }}" class="bg-white form-control"
                                       name="phone_number"
                                       onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                       placeholder="{{ trans('messages.phone_number') }}">
                                <div class="invalid-feedback err-phone"></div>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="bg-white form-control"
                                           value="{{ old('phone_number') }}" id="password-field" name="password"
                                           placeholder="{{ trans('messages.password') }}">
                                    <div class="input-group-addon">
                                        <img src="{{ asset('images/NTX - Icon/Small 50x50/Eye.png') }}"
                                             id="show-hide-eyes" alt="Show pass">
                                    </div>
                                    <div class="invalid-feedback err-pass"></div>
                                </div>
                            </div>
                            <div class="row align-items-right container-forgot">
                                <div class="col-12">
                                    <a href="{{ route('client.otp') }}"
                                       class="forgot-pass float-right">{{ trans('messages.forget') }}</a>
                                </div>
                            </div>
                            <div class="form-group mt-2 w-100">
                                <input type="submit" value="{{ trans('messages.login') }}"
                                       class="btn text-uppercase login_btn">
                            </div>
                            <hr>
                            <div class="row align-items-center">
                                <span class="account-exit">{{ trans('messages.account_exits') }}</span>
                            </div>
                            <div class="form-group mt-2 w-100">
                                <a href="{{ route('client.register') }}">
                                    <input type="button" value="{{ trans('messages.create_account') }}"
                                           class="btn text-uppercase text-white create_btn">
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
        <script src="{{ asset('js/pages/login.js') }}"></script>
@endsection
