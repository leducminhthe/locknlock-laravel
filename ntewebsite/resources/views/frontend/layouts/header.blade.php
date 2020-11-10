@php
    $segment =  Request::segment(1);
@endphp
<header class="w-100 wp-header text-white pt-2 pb-2 pt-lg-0 pb-lg-0 sticky-top">
    <div class="lienhe">
        <div class="container">
            <ul>
                <li>
                    <p><img src="{{ asset('images/phone.png') }}" alt="">Hotline: {!!html_entity_decode(config('constants.hotline'))!!}</p>
                </li>
                <li>
                    <p><img src="{{ asset('images/email1.png') }}" alt="">Email: {!!html_entity_decode(config('constants.email'))!!}</p>
                </li>
                <li>
                    <p><img src="{{ asset('images/clock1.png') }}" alt="">{{ trans('messages.gio') }}:
                        <span class="time_work">7:00 - 20:00</span>
                    </p>
                </li>
                <li style="display: none;">
                    <p>Ngôn ngữ:
                        <a href="{!! route('user.change-language', ['vi']) !!}" title=""><img src="{{ asset('images/vietnam.png') }}" alt=""></a>
                        <a href="{!! route('user.change-language', ['en']) !!}" title=""><img src="{{ asset('images/england.png') }}" alt=""></a>
                    </p>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-2 col-sm-4 col-4">
                <a href="" title="home"><img class="img-fulid" src="{{ asset('images/NTX - Icon/logo.png') }}" alt="home" /></a>
            </div>
            <div class="col-lg-5 col-sm-8 d-none d-lg-block pr-0">
                <nav id="site-navigation" class="main-navigation">
                    <ul id="main-menu" class="menu justify-content-end">

                        <li class="nav-item dropdown menu-item-has-children">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown">
                              {{ trans('messages.Dichvu') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="giao-hang-chuan"><img src="{{asset('images/box.png')}}" alt="">{{ trans('messages.giaohangtieuchuan') }}</a>
                              <a class="dropdown-item" href="giao-hang-nhanh"><img src="{{asset('images/delivery1.png')}}" alt="">{{ trans('messages.giaohangnhanh') }}</a>
                              <a class="dropdown-item" href="giao-hang-hen-gio"><img src="{{asset('images/stopwatch1.png')}}" alt="">{{ trans('messages.giaohanghengio') }}</a>
                            </div>
                        </li>

                        <li onclick="javascript:location.href='tra-cuu-van-don'" class="menu-item-has-children pl-3 pr-3">
                            <a class="d-block overflow-hidden" href="{{ route('client.search_order') }}" title="">{{ trans('messages.Tracuu') }}</a>
                        </li>

                        <li class="nav-item dropdown menu-item-has-children hotro">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown">
                              {{ trans('messages.Hotro') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="dieu-khoan">{{ trans('messages.dieukhoan') }}</a>
                              <a class="dropdown-item" href="{{ route('client.security') }}">{{ trans('messages.baomat') }}</a>
{{--                              <a class="dropdown-item" href="{{ route('client.questions') }}">{{ trans('messages.cauhoi') }}</a>--}}
                            </div>
                        </li>

                    </ul>
                </nav>
            </div>

            <div class="col-lg-5 col-sm-2 d-none d-lg-block text-right">
                <a class="taovandon" href="tao-van-don">{{ trans('messages.taovandon') }}</a>
                @if(true)
                    <a style="padding: 10px 20px;" class="dangnhap" href="https://onlinedev.ntx.com.vn/login">{{ trans('messages.dangnhap') }}</a>
                @else
                    <a style="padding: 10px 20px;" class="dangnhap" href="{{ route('client.register') }}">{{ trans('messages.dangky') }}</a>
                @endif
            </div>

            <ul class="col-lg-0 col-sm-8 col-8 text-right d-lg-none">
                <li class="d-inline-block">
                    <button type="button" class="js-drawer-open-left icon-menu d-inline-block border-0 text-center text-white" aria-controls="NavDrawer" aria-expanded="false">
                        <svg style="color: white" class="bi bi-justify border rounded" width="1.6em" height="1.6em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                fill-rule="evenodd"
                                d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
                            />
                        </svg>
                    </button>
                </li>
            </ul>
        </div>
    </div>

</header>
