<div id="NavDrawer" class="drawer drawer--left">
    <div class="drawer__header">
        <div class="drawer__title h3">
            <a class="site-header__logo-link" href="" title=""><img class="img-fluid" src="{{ asset('images/NTX - Icon/logofooter.png') }}" alt="" /></a>
        </div>
        <div class="drawer__close js-drawer-close">
            <button type="button" class="icon-fallback-text border-0 d-inline-block bg-transparent">
                <span class="icon-Close"></span>
                <span class="fallback-text">Đóng menu</span>
            </button>
        </div>
    </div>
    <ul class="mobile-nav">
        <li class="mobile-nav__item  mobile-nav__border">
            <a class="" href="tao-van-don" title="Dịch vụ">Tạo đơn hàng</a>
        </li>
        <li class="mobile-nav__item mobile-nav__border">
            <h4>Dịch vụ</h4>
            <a class="mobile-nav__link" href="giao-hang-chuan" title="Dịch vụ">Giao hàng chuẩn</a>
            <a class="mobile-nav__link" href="giao-hang-nhanh" title="Dịch vụ">Giao hàng nhanh</a>
            <a class="mobile-nav__link" href="giao-hang-hen-gio" title="Dịch vụ">Giao hàng hẹn giờ</a>
        </li>
        <li class="mobile-nav__item mobile-nav__border">
            <a class="" href="{{ route('client.result')}}" title="Tra cứu">Tra cứu</a>
        </li>
        <li class="mobile-nav__item mobile-nav__border">
            <h4>Hỗ trợ</h4>
            <a class="mobile-nav__link" href="dieu-khoan" title="Dịch vụ">Điều khoản sử dụng</a>
            <a class="mobile-nav__link" href="{{ route('client.security') }}" title="Dịch vụ">Chính sách bảo mật</a>
{{--            <a class="mobile-nav__link" href="{{ route('client.questions') }}" title="Dịch vụ">Câu hỏi thường gặp</a>--}}
        </li>
        <li class="mobile-nav__item  mobile-nav__border">
            <a class="" href="{{ env('ONLINE_URL') }}login" title="Dịch vụ">Đăng ký</a>
        </li>
        <li class="mobile-nav__item  mobile-nav__border">
            <a class="" href="{{ env('ONLINE_URL') }}login" title="Dịch vụ">Đăng nhập</a>
        </li>
        <li class="mobile-nav__item  mobile-nav__border">
            <div class="row">
                <p class="col-5 mb-0 pl-0">Ngôn ngữ:<p>
                <div class="col-2">
                    <a href="{!! route('user.change-language', ['vi']) !!}" title="">VN</a>
                </div>
                <div class="col-2">
                    <span>|</span>
                </div>
                <div class="col-2 pl-0">
                    <a href="{!! route('user.change-language', ['en']) !!}" title="">EN</a>
                </div>
            </div>
            <div style="display: flex;">
                <div class="icon_menu_mobile">
                    <span class="icon-Phone"></span>
                </div>
                <span class="ml-2 mr-2">Hotline:</span>
                {!!html_entity_decode(config('constants.hotline'))!!}
            </div>
            <div style="display: flex;">
                <div class="icon_menu_mobile">
                    <span class="icon-Mail"></span>
                </div>
                <span class="ml-2 mr-2">Email:</span>
                {!!html_entity_decode(config('constants.email'))!!}
            </div>
            <div style="display: flex;">
                <div class="icon_menu_mobile">
                    <span class="icon-Clock"></span>
                </div>
                <span class="ml-2 mr-2">Giờ làm việc: 7:00 - 20:00</span>
            </div>
        </li>
    </ul>
</div>

<!-- <div class="devvn_toolbar pt-2 pb-1">
    <ul>
        <li>
            <a href="/" id="devvn_contact_1" class="active" title="Trang chủ">
                <p class="mb-1">
                    <svg class="bi bi-house" width="1.6em" height="1.6em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path  fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                </p>
                <span>NTLOGISTCIS</span>
            </a>
        </li>
        <li>
            <a href="tuyen-dung" id="devvn_contact_3" title="Tìm việc">
                <p class="mb-1">
                    <svg class="bi bi-search" width="1.6em" height="1.6em" viewBox="0 0 16 16" fill="#A6A6A6" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                </p>
                <span>Tìm việc</span>
            </a>
        </li>
        <li>
            <a href="ket-qua-tuyen-dung" id="devvn_contact_2" title="Kết quả">
                <p class="mb-1">
                    <svg class="bi bi-calendar-check" width="1.6em" height="1.6em" viewBox="0 0 16 16" fill="#A6A6A6" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
                        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </p>
                <span>Kết quả</span>
            </a>
        </li>
        <li>
            <a data-toggle="modal" data-target="#applyJobFast" id="devvn_contact_4" title="Liên hệ">
                <p class="mb-1">
                    <svg class="bi bi-headphones" width="1.6em" height="1.6em" viewBox="0 0 16 16" fill="#A6A6A6" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 0 0-5 5v4.5H2V8a6 6 0 1 1 12 0v4.5h-1V8a5 5 0 0 0-5-5z" />
                        <path d="M11 10a1 1 0 0 1 1-1h2v4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3zm-6 0a1 1 0 0 0-1-1H2v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-3z" />
                    </svg>
                </p>
                <span>Ứng tuyển nhanh</span>
            </a>
        </li>
    </ul>
</div> -->
