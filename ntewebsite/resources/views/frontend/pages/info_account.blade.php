@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{asset('css/info-account.css')}}">
@endsection
@section('content')
    @include('frontend.partials.banner_area')
    <section class="section-account">
        <div class="container">
            <div class="text-center mt-4 w-100">
                <h1 class="title-header">{{ trans('messages.info_account') }}</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card card-info">
                    <div class="card-body">
                        <form>
                            <div class="input-group justify-content-center form-group">
                                <img src="{{ asset('images/user.jpg') }}" alt="">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend mr-2">
                                    <img src="{{ asset('images/NTX - Icon/Small 50x50/Account.png') }}" alt="">
                                </div>
                                <input type="text" class="bg-white form-control" placeholder="Đỗ Minh Châu">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend mr-2">
                                    <img src="{{ asset('images/NTX - Icon/Small 50x50/Account.png') }}" alt="">
                                </div>
                                <input type="number" class="bg-white format-phone form-control" placeholder="025-092-896">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend mr-2">
                                    <img src="{{ asset('images/NTX - Icon/Small 50x50/Mail Blue.png') }}" alt="">
                                </div>
                                <input type="email" class="bg-white form-control" placeholder="1995dominhchau@gmail.com">
                            </div>
                            <div class="row align-items-center remember">
                                <input class="mr-2 " type="radio"><span>{{ trans('messages.receive_notification') }}</span>
                            </div>
                            <div class="form-group mt-2 w-100 d-flex justify-content-end">
                                <input type="submit" value="{{ trans('messages.save') }}" class="btn save_btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 w-100">
                <h1 class="title-header"> {{ trans('messages.change_pass') }}</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card card-change-pass">
                    <div class="card-body">
                        <form id="form-change-pass">
                            <div class="input-group form-group">
                                <div class="input-group-prepend mr-2">
                                    <img src="{{ asset('images/NTX - Icon/Small 50x50/Pass.png') }}" alt="">
                                </div>
                                <input type="password" name="old_pass" class="form-control bg-white" placeholder="{{ trans('messages.old_pass') }}">
                                <div class="invalid-feedback pl-5 err-old-pass"></div>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend mr-2">
                                    <img src="{{ asset('images/NTX - Icon/Small 50x50/Pass.png') }}" alt="">
                                </div>
                                <input type="password" name="new_pass" class="form-control bg-white" placeholder="{{ trans('messages.new_pass') }}">
                                <div class="invalid-feedback pl-5 err-new-pass"></div>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend mr-2">
                                    <img src="{{ asset('images/NTX - Icon/Small 50x50/Pass.png') }}" alt="">
                                </div>
                                <input type="password" name="confirm_pass" class="form-control bg-white" placeholder="{{ trans('messages.re_new_pass') }}">
                                <div class="invalid-feedback pl-5 err-confirm-new-pass"></div>
                            </div>
                            <div class="form-group mt-2 w-100 d-flex justify-content-end">
                                <input type="submit" value="{{ trans('messages.change_pass') }}" class="btn mt-4 btn-change-pass">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function (){
            $('#form-change-pass').on('submit', function (event){
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('client.change_pass') }}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: res => {
                        if ( res.status == '201' ){
                            if(typeof res.message !== 'undefined' ){
                                if (typeof res.message.old_pass !== 'undefined'){
                                    $('.err-old-pass').text(res.message.old_pass[0]).css('display','block');
                                }
                                if ( typeof res.message.new_pass !== 'undefined'){
                                    $('.err-new-pass').text(res.message.new_pass[0]).css('display','block');
                                }
                                if ( typeof res.message.confirm_pass !== 'undefined'){
                                    $('.err-confirm-new-pass').text(res.message.confirm_pass[0]).css('display','block');
                                }
                            }
                        }
                    }
                })
            });
        });
        $('.form-control').on('focus', function (){
            $(this).parent().find('.invalid-feedback').css('display','none');
        });
        $('.format-phone').on('keypress', function (){

        });
        function formatNumber(n) {
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, "-")
        }
    </script>
@endsection
