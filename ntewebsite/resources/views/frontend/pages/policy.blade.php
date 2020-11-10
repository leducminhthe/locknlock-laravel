@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/policy.css') }}">
@endsection

@section('content')
	<section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24"> Trang chủ<span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">Chính sách</span>
            </div>
        </div>
    </section>

    <section class="section-policy">
        <div class="container">
      
            <div class="policy-item">
                <img src="https://ntlogistics.vn/tin-tuc/wp-content/uploads/2020/02/Rectangle-244.png" class="img-fluid">
                <p>Chính sách khiếu nại và đền bù</p>
                <a href="{{env('CDN_DEV')}}template/ntx_khieu_nai_den_bu.pdf" target="_blank" class="btn btn-secondary">
                <p>Tải PDF</p>
                </a>
            </div>
            <div class="policy-item">
                <img src="https://ntlogistics.vn/tin-tuc/wp-content/uploads/2020/02/Rectangle-245.png" class="img-fluid">
                <p>Quy trình gửi và nhận hàng</p>
                <a href="{{env('CDN_DEV')}}template/ntx_gui_va_nhan_hang.pdf" target="_blank" class="btn btn-secondary">
                <p>Tải PDF</p>
                </a>
            </div>
            <div class="policy-item">
                <img src="https://ntlogistics.vn/tin-tuc/wp-content/uploads/2020/02/Rectangle-246.png" class="img-fluid">
                <p>Trách nhiệm của các bên</p>
                <a href="{{env('CDN_DEV')}}template/ntx_trach_nhiem_cac_ben.pdf" target="_blank" class="btn btn-secondary">
                <p>Tải PDF</p>
                </a>
            </div>
            <div class="policy-item">
                <img src="https://ntlogistics.vn/tin-tuc/wp-content/uploads/2020/02/Rectangle-247.png" class="img-fluid">
                <p>Các loại hàng hóa cấm gửi</p>
                <a href="{{env('CDN_DEV')}}template/ntx_hang_hoa_cam_gui.pdf" target="_blank" class="btn btn-secondary">
                <p>Tải PDF</p>
                </a>
            </div>
        
        </div>
    </section>
@stop