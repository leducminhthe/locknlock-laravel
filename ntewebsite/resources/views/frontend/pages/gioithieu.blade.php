@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
@endsection

@section('content')
<div class="all">
    <section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24">{{ trans('messages.home') }}<span class="mr-1 ml-1"> /</span></a>
                <span class="text-white font-size-24 font-weight-bold">{{ trans('messages.about') }}</span>
            </div>
        </div>
    </section>

    <section class="w-100 mt-3 gioithieu">
        <div class="container" >
        	<div class="row">
	            <div class="col-12 col-sm-6 col-lg-6 left">
	            	<img style="width: 100%" src="{{asset('images/anh37.png')}}" alt="">
	            </div>
	            <div class="col-12 col-sm-6 col-lg-6 right">
                    <img class="img_icon" style="margin: 20px 0px;" src="{{asset('images/icon.png')}}" alt="">
	                <h1 class="title_h1">{{ trans('messages.introduce') }}</h1>
	                <p>{{ trans('messages.content_introduce') }}</p>
	                <p>{{ trans('messages.content_detail') }}</p>
	          </div>
	        </div>
        </div>
    </section>

    <section class="info-ntl mt-md-5">
        <div class="container">
            <div class="row">
            	<div class="anh-gioithieu col-12 align-self-end">
            		<img style="float: right;" src="{{asset('images/Frame 26.jpg')}}" alt="">
            	</div>
            </div>

            <div class="sm-tn" style="">
                <h2>{{ trans('messages.mission') }} <span>"{{ trans('messages.content_mission') }}"</span></h2>
                <p style="margin-bottom: 40px;">{!!html_entity_decode(config('constants.mongmuon'))!!}</p>
                <h3>{{ trans('messages.vision') }}</h3>
                <ul style="list-style-image: url('{{asset('images/circle.png')}}');">
                	<li>{{ trans('messages.content_vision') }}</li>
                </ul>
            </div>
        </div>

    </section>
</div>

@stop
