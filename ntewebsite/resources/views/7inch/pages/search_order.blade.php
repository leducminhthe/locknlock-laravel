@extends('7inch.layouts.master_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/7inch_search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jkeyboard.css') }}">

@endsection
@section('script')
    <script src="{{ asset('js/jkeyboard.js') }}"></script>
    <script>
        $('#keyboard').jkeyboard({
            input: $('#q')
        });
        $('.btn-next').on('click',function (e){
            $('#submit').click();
        })

    </script>
@endsection
@section('content')
    <section class="search-order">
        <div class="query-search">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h1 class="query-search-title">Tra cứu vận đơn</h1>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('seven.search_result') }}" class="form-search">
                            <div class="form-group">
                                <input type="text" class="bg-white form-control" name="q" id="q" placeholder="Nhập mã vận đơn">
                                <input type="submit" id="submit" hidden>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <p>- Nhập tối đa 30 vận đơn, mỗi mã cách nhau dấu phẩy VD: 392773302,968835288</p>
                    </div>
                    <div class="col-12">
                        <p>- Mọi thắc mắc vui lòng liên hệ hotline: <span> 1900 63 6688</span> hoặc Email: <span>nhattin@ntlogistics.vn</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="keyboard" id="keyboard"></div>
        <div class="fixed-bottom button-footer">
            <div class="row">
                <div class="col-6">
                    <a href="{{ url()->previous() }}">
                        <button class="w-100 btn-pre"><img src="{{asset('images/NTX - Icon/Small 50x50/Blue Arrow 3.1.png')}}" alt="">Quay lại</button>
                    </a>
                </div>
                <div class="col-6">
                    <button class="w-100 text-white btn-next">Tiếp tục</button>
                </div>
            </div>
        </div>
    </section>
@endsection
