<!Doctype html>
<html lang='vn'><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="{{ asset('images/desktop/logo.png') }}"  />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

    <title>Nhất Tín Express</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    <!--     <script src="vendor/jquery.validate.min.js"></script>
     -->    <meta name="title" content="Nhất Tín Express" />
    @foreach( config('constants.meta') as $key => $meta_name )
        <title>{{  $meta_name['meta_title'] }}</title>
        <meta name="keywords" content="{{  $meta_name['meta_keyword'] }}" />
        <meta name="description" content="{{  $meta_name['meta_des'] }}" />
        <meta property="og:title" content="{{  $meta_name['meta_title'] }}" />
        <meta property="og:description" content="{{  $meta_name['meta_des'] }}" />
    @endforeach

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:image" content="https://cdn.ntlogistics.vn/images/logo4x.png" />
    <meta property="og:site_name" content="" />
    <meta property="og:type" content="article" />
    <meta name="robots" content="NOINDEX,NOFOLLOW"/>
    <link rel="canonical" href="{{ Request::fullUrl() }}" />
    <base href="{{asset('')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap_home.css') }}" />
    @yield('css')
    <link href="{{ asset('css/main_home.css') }}?v={{config('constants.ver_style')}}" rel="stylesheet" type="text/css" />

<!-- <script type="text/javascript" src="{{ asset('vendor/jquery-1.9.1.min.js') }}"></script> -->

    @include('frontend.layouts.script_header')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('vendor/select2.min.css') }}" rel="stylesheet" type="text/css">

<!--     <link href="{{ asset('css/demo-files/style.css') }}" rel="stylesheet" type="text/css">
 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @yield('css')
</head>
<body class="template-index">

<div id="PageContainer" class="w-100 float-left position-relative is-moved-by-drawer">
    @yield('content')
</div>
<!-- <script src="vendor/popper.min.js?v={{config('constants.ver_style')}}"></script>
<script src="vendor/bootstrap.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script src="vendor/select2.full.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="vendor/jquery.lazyload.min.js"></script> -->

<script src="vendor/fastclick.min.js" type="text/javascript"></script>
<script src="vendor/timber.js" type="text/javascript"></script>
<script src="vendor/main_home.min.js?v={{config('constants.ver_style')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@yield('script')
</body>
</html>
