@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/info_member.css') }}">
@endsection

@section('content')
	<section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24"> Trang chủ<span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">Nhân sự</span>
                <span class="text-white font-size-24 mr-1 ml-1">/</span>
                <span class="text-white font-size-24 font-weight-bold"> {{$member['member_name']}}</span>
            </div>
        </div>
    </section>
	
	<section class="section-info-member">
        <div class="container">
            <div class="row">
                <div class="info-member-role">
                    <img src="{{$member['member_img']}}">
                    <div class="member-name">{{$member['member_name']}}</div>
                    <div class="member-role">{{$member['member_role']}}</div>
                </div>
                <div class="info-member-des">
                    <div class="member-des">{{$member['member_des']}}</div>
                </div>
            </div>
        </div>
    </section>

	<section style="background-image: url('{{ asset('/images/Frame 38.jpg')}}');" class="w-100 mt-2 dichvu">
	   <div class="container position-relative">
	        <div class="NT-giaohang">
	            <h2>Nhất Tín Express</h2>
	            <h1>Hơn cả 1 dịch vụ</h1>
	            <div class=" mt-3 vandon" style="">
	                <a class="" href="tao-van-don">Tạo vận đơn <img style="padding: 5px 0px;" src="{{ asset('/images/arrow.png')}}" alt=""></a>
	            </div>
	        </div>
	    </div> 
	</section>
@stop