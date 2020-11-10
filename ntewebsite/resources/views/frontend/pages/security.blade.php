@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
@endsection
@section('content')
    <section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24">{{ trans('messages.home') }} <span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">{{ trans('messages.title_page_security') }}</span>
            </div>
        </div>
    </section>
    <section class="w-100 mt-3 introduce mt-md-5">
        <div class="container" >
            <div class="row">
                <div class="col-12 col-lg-12" style="border-bottom: 1px solid black;padding: 0px;">
                    <h1 class="text-center title-header">{{ trans('messages.title_page_security') }}</h1>
                    @foreach( config('constants.security') as $key => $security)
                        <div class="row collapsible">
                            <div class="col-1">
                                <div class="numberCircle"><span class="stt">{{ ++$key }}</span></div></div>
                            <div class="col-11 align-self-center">{{ $security['title'] }}</div>
                        </div>
                        @if( isset($security['data']) && !empty($security['data']))
                            <div class="content">
                                <div class="content-total">
                                    @foreach($security['data'] as $values)
                                        <p class="style-3">{{ $values['title'] }}</p>
                                        @if( isset($values['data']) && !empty($values['data']) )
                                            @foreach($values['data'] as $v)
                                                <p class="pl-5 pr-5 ml-2 mb-2">{{ $v }}</p>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;
        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>

@stop
