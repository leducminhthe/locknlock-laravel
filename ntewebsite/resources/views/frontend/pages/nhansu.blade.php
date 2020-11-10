@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/members.css') }}">
@endsection

@section('content')
	<section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24"> Trang chủ<span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">Nhân sự</span>
            </div>
        </div>
    </section>
	
    <section class="section-member">
        <div class="container-fluid position-relative">
            <div class="text-title">Nhân sự</div>
            <div class="row">
                @foreach( config('constants.member') as $key => $member)
                <div class="member">
                    <a href="nhan-su-chung-toi/{{$member['member_url']}}" target="_blank">
                        <img src="{{ $member['member_img']}}">
                        <h4>{{$member['member_name']}}</h4>
                        <p>{{$member['member_role']}}</p>
                    </a>
                </div>
                @endforeach
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