@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
@endsection

@section('content')
<div class="all">
    <section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24">{{ trans('messages.home') }} <span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">{{ trans('messages.order_timer') }}</span>
            </div>
        </div>
    </section>

    <section class="w-100 mt-3 gioithieu ">
        <div class="container" >
        	<div class="row">
	            <div class="col-12 col-sm-6 col-lg-6 left">
	            	<img style="width: 100%;" src="{{asset('images/anh37.png')}}" alt="">
	            </div>
	            <div class="col-12 col-sm-6 col-lg-6 right">
                    <img class="img_icon" style="margin: 20px 0px;" src="{{asset('images/icon.png')}}" alt="">
	                <h1 class="title_h1">{{ trans('messages.order_timer') }}</h1>
	                <p>{!!html_entity_decode(config('constants.gioithieu'))!!}</p>
	                <p>{!!html_entity_decode(config('constants.Nhattin'))!!}</p>
	                <p>{!!html_entity_decode(config('constants.thaido'))!!}</p>
	          </div>
	        </div>
        </div>
    </section>

    <section style="background-image: url('{{ asset('/images/Frame 38.jpg')}}');" class="w-100 mt-4 dichvu">
       <div class="container position-relative">
            <div class="NT-giaohang">
                <h2>{{ trans('messages.name_company') }}</h2>
                <h1>{{ trans('messages.than_all_service') }}</h1>
                <div class=" mt-3 vandon" style="">
                    <center>
                    <a class="" href="tao-van-don">{{ trans('messages.create_orders') }} 
                        <img style="padding: 5px 0px;" src="{{ asset('/images/arrow.png')}}" alt="">
                    </a>
                    </center>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
