@extends('frontend.layouts.home')
@section('content')
    <div class="all">
    <section style="" class="w-100 position-relative wp-slide">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li id="Indicators" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li id="Indicators" data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li id="Indicators" data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">

            <?php $i=0; foreach ($data['data'] as $banner): ?>
            <?php if ($i==0) {
                $set_ = 'active'; 
            } else {
                $set_ = ''; 
            } ?> 
                <a href="<?php echo $banner['content_url'] ?>" class='carousel-item <?php echo $set_; ?>'>
                    <img src='<?php echo $banner['image_url'] ?>' class='d-block w-100'>
                </a>
            <?php $i++; endforeach ?>

          </div>
        </div>
    </section>

    <section class="w-100 position-relative wp-vitri">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Theo dõi đơn hàng</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="w-100 box-vitri p-3">
                        <form action="{{ route('client.result') }}" method="GET" id="form_search" class="mb-0">
                            <div class="row search-form mb-3 mb-md-0 m-auto">
                                <div class="col-md-10 col-12 form-group  search-box p-0" >
                                    <input type="text" class="form-control" name="q" id="inputAddress" placeholder="Nhập mã vận đơn" style="background: white;font-size: 16px;" value="">
                                    <div class="result result1" id="live_reload_box">
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12 form-group mb-3 mb-md-0 pr-0">
                                    <button style="font-size: 16px;" type="submit" class="btn form-control btn-search1 font-weight-bold" disabled style="margin-top: -1px;">Tra cứu</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('client.result') }}" method="GET" class="mb-0">
                            <div class="search_mobie">
                                <input id="input_search" class="form-control" name="q" type="text" maxlength="15" placeholder="Nhập mã vận đơn" />
                                <button type="submit" class="span_search" disabled>
                                    <img src="{{asset('images/search.png')}}" alt="">
                                </button>
                            </div>
                        </form>
                        <div class="w-100 font-size-18">
                            {{ trans('messages.suggestions') }}
                        </div>
                        <div class="w-100 font-size-18">
                            <p class="mb-0 thacmac">
                                {!!html_entity_decode(config('constants.thacmac'))!!}
                            </p>
                        </div>
                    </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-12 thongtinNT" style="color:#696884;">
                    <h1>{{ trans('messages.why_choose') }} <span style="color: black">{{ trans('messages.name_company') }}?</span></h1>
                    <p class="font-size-18">{{ trans('messages.answer_why_choose') }}</p>
                    <ul class="ml-3 camket font-size-18 pl-1" style="list-style-image: url('{{asset('images/circle.png')}}');">
                        <li>{{ trans('messages.answer_one') }}</li>
                        <li>{{ trans('messages.answer_two') }}</li>
                        <li>{{ trans('messages.answer_three') }}</li>
                    </ul>
                    <div class="row">
                        <div class="col-md-6 col-12 pl-0">
                            <ul class="img">
                                <li><img src="{{asset('images/1077.png')}}" alt=""></li>
                                <li><span>{{ trans('messages.count_local') }}</span> </br> {{ trans('messages.title_local') }} </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-12 pl-0">
                            <ul class="img">
                                <li><img src="{{asset('images/1077(1).png')}}" alt=""></li>
                                <li><span>{{ trans('messages.count_partner') }}</span></br>{{ trans('messages.title_partner') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <img class="w-100" src="{{asset('images/anh31.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="ntexpress w-100 wp-ql mt-3 mt-md-5 position-relative">
        <div class=" row">
            <div class="col-0 col-sm-6 col-lg-6 left"></div>
            <div class="right col-12 col-sm-6 col-lg-6">
                <h3 class="download">{{ trans('messages.title_download_app') }}</h3>
                <p>{{ trans('messages.content_download_app') }}</p>
                <div class="row pt-3 pl-0 img_app">
                    <div class="col-lg-6 col-5 app">
                        <a href="" title="">
                            <center>
                                <img src="{{ asset('/images/NTX - Icon/ios.png')}}" alt="">
                            </center>
                        </a>
                    </div>
                    <div class="col-lg-6 col-5 app">
                        <a href="" title="">
                            <center>
                                <img src="{{ asset('/images/NTX - Icon/android.png')}}" alt="">
                            </center>
                        </a>
                    </div>
                </div>
          </div>

        </div>

    </section>
    <div id="img_appmobile" style="display: none;">
        <img class="w-100" src="{{ asset('/images/mobile/mobile.jpg')}}" alt="">
    </div>

    <section class="w-100 wp-ql mt-3 mt-md-5">
        <div class="container">
            <div class="giaohang">
              <h1 class="mt-2">{{ trans('messages.main_service') }}</h1>
              <div class="row">
                <div class="gh-sieutoc col-12 col-sm-4 col-lg-4">
                    <img class="img_wrong" src="{{asset('images/anh41.png')}}" alt="">
                    <h4>{{ trans('messages.fast_ship') }}</h4>
                    <p>{{ trans('messages.content_fast_ship_one') }} <br> {{ trans('messages.content_fast_ship_tow') }}.</p>
                </div>
                <div class="gh-sieutoc col-12 col-sm-4 col-lg-4">
                    <img src="{{asset('images/anh42.png')}}" alt="">
                    <h4>{{ trans('messages.assurance') }}</h4>
                    <p>{{ trans('messages.content_assurance') }}</p>
                </div>
                <div class="gh-sieutoc col-12 col-sm-4 col-lg-4">
                    <img src="{{asset('images/anh43.png')}}" alt="">
                    <h4>{{ trans('messages.safe') }}</h4>
                    <p>{{ trans('messages.content_safe') }}</p>
                </div>
              </div>
            </div>
        </div>
    </section>

    <section class="w-100 wp-service pt-3 pb-3 pt-md-5 pb-md-5 mt-4 mt-md-5">
        <div class="khachhang" >
            <p class="pt-1">{{ trans('messages.loyal_customer') }}</p>
            <div class="owl-carousel "  id="owl-carousel" >
                <div class="item ">
                    <img src="{{asset('images/Frame34.png')}}" alt="">
                </div>
                <div class="item ">
                    <img src="{{asset('images/Frame35.png')}}" alt="">
                </div>
                <div class="item ">
                    <img src="{{asset('images/Frame36.png')}}" alt="">
                </div>
                <div class="item ">
                    <img src="{{asset('images/Frame38.png')}}" alt="">
                </div>
                <div class="item ">
                    <img src="{{asset('images/Frame39.png')}}" alt="">
                </div>
                <div class="item ">
                    <img src="{{asset('images/Frame40.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
</div>
    <script>
        $(function () {
            $('#inputAddress').on('keyup', function (e) {
                if ($(this).val() !== '') {
                    $('.btn-search1').prop('disabled', false);
                } else if ($(this).val() === '') {
                    $('.btn-search1').prop('disabled', true);
                }
            });
            $('#input_search').on('keyup', function (e){
                if ($(this).val() !== '' ) {
                    $('.span_search').prop('disabled', false);
                } else if ($(this).val() === '')  {
                    $('.span_search').prop('disabled', true);
                }
            })
        })
    </script>
@endsection
@section('script')
    <script src="{{ asset('js/pages/home.js') }}"></script>
    <script>
    // $(".carousel").carousel({
    //     interval: false,
    //     pause: true,
    //     touch:true, 
    // });

    // $( ".carousel .carousel-inner" ).swipe( {
    // swipeLeft: function ( ) {
    //     this.parent( ).carousel( 'next' );
    // },
    // swipeRight: function () {
    //     this.parent( ).carousel( 'prev' );
    // },
    // threshold: 0,
    // excludedElements:"label, button, input, select, textarea, .noSwipe"
    // } );

    // $('.carousel .carousel-inner').on('dragstart', 'a', function () {
    //     return false;
    // });  
    </script>
@endsection
