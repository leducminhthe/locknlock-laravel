<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <base href="{{asset('')}}" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href='public/locknlock/css/owl.theme.default.min.css'>
    <link rel="stylesheet" type="text/css" href='public/locknlock/css/owl.carousel.min.css'>
    <link rel="stylesheet" type="text/css" href='public/locknlock/css/website_css.css'>
    <link type="text/css" rel="stylesheet" href="public/locknlock/css/lightslider.css" />                  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container">

      <div class="header">

        <?php 
          if (isset($_SESSION['user'])) {

            $email = $_SESSION['user']['Email'];
            $name = $_SESSION['user']['Name'];

            ?>
              <div class="btn-group account">
                <marquee  scrollamount="10"><h3>chào mừng <?php echo $name;?> đến với chúng tôi</h3></marquee>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $email;?>
                </button>
                <div class="dropdown-menu dropdown-menu-right option">
                  <button class="dropdown-item" type="button"><a href="LogoutController">Logout</a></button>
                  <button class="dropdown-item" type="button"><a href="UpdateProfileController" >My Page</a></button>
                  <button class="dropdown-item" type="button">
                    <a href="LienHeController" >Chăm sóc khánh hàng</a>
                  </button>
                </div>
              </div>

             
            <?php
          }else{
            ?>
              <div class="member row justify-content-end">
                <ul class="col-12 col-md-12 col-lg-12">
                  <li><a href="LoginController" >Đăng nhập</a></li>
                  <li><a href="RegisterController" >Gia nhập thảnh viên</a></li>
                  <li><a href="" >My Page</a></li>
                  <li><a href="LienHeController" >Chăm sóc khánh hàng</a></li>                  
                </ul>
              </div>
            <?php
          } 
        ?>

        <div class="login row">
          <ul class="cart_left col-4 col-md-4 col-lg-4">
            <li>
              <a href="" ><img src="http://www.locknlock.vn/data/base/imgs/global/top_icon_event.png" alt="Sự kiện"></a>
            </li>
             <li>
              <a href="" ><img src="http://www.locknlock.vn/data/base/imgs/global/top_icon_coupon.png" alt="Membership/Coupon"></a>
            </li>
          </ul>

          <h1 class="logo col-4 col-md-4 col-lg-4">
            <a href="{{URL::to('locknlock')}}" >
              <img src="http://www.locknlock.vn/data/base/banner/hd2_logo_4.gif">       
            </a>
         </h1>

          <ul class="cart_right col-4 col-md-4 col-lg-4">
            <li>
              <a href="{{URL::to('show-cart')}}" ><img src="http://www.locknlock.vn/data/base/imgs/global/top_icon_cart.png" alt="Giỏ hàng">
              <?php
                $cart = Cart::count();
                  if (isset($cart)){
                    echo $cart;
                  }else{
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                  }
              ?>
            </a>
            </li>
            <li>
              <a href="" ><img src="http://www.locknlock.vn/data/base/imgs/global/top_icon_wish.png" alt="Sản phẩm nổi bật"></a>
            </li>
            <li>
              <a href="CheckOrderController" ><img src="http://www.locknlock.vn/data/base/imgs/global/top_icon_truck.png" alt="Kiểm tra đơn hàng"></a>
            </li>
          </ul>
        </div>

        <div class="menu">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown menu-area">
                    <a class="nav-link dropdown-toggle" href="#" id="mega-one" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      DANH MỤC SẢN PHẨM
                    </a>
                    <div class="dropdown-menu mega-area"  aria-labelledby="mega-one">
                      <div class="row">
                      
                      @foreach($menus as $menucha)
                      @if( count($menucha->cate2) > 0 )
                        <div class="col-sm-6 col-lg-3">
                          <a href="{{URL::to('category-1/'. $menucha->id)}}" >
                            <h5>{{ $menucha->ten }}</h5>
                          </a>
                            @foreach($menucha->cate2 as $menucon)
                              <a class="dropdown-item" href="{{URL::to('category-2/'.$menucon->id_cate2)}}">{{ $menucon->ten_cate2 }}</a>
                            @endforeach
                        </div>
                      @endif
                      @endforeach

                      </div>
                    </div>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="SP_BanChayController">SẢN PHẨM BÁN CHẠY</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">SẢN PHẨM MỚI</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">KHUYẾN MÃI HOT</a>
                </li>
                
              </ul>
             <form class="form-inline my-2 my-lg-0" action="SearchController" method="get">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-secondary my-2 my-sm-0" name="submit" type="submit">
                  <img src="public/locknlock/images/search.png" >
                </button>
              </form>
            </div>
          </nav>
        </div>
      </div>

    @yield('content')

      <div class="footer">
        <div class="footer_top">
          <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Giới thiệu về công ty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Điều khoản</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Chính sách xử lý thông tin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Từ chối thư rác</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Chăm sóc khách hàng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sơ đồ</a>
          </li>
          <li class="nav-item_top">
            <button  id="totop"><img src="http://www.locknlock.vn/data/base/imgs/global/btnTop.png"></button>
          </li>
          </ul>
        </div>  
        <div class="footer_bottom row">
          <div class="footer_img col-2 col-md-2 col-lg-2" >
            <a href=""><img src="http://www.locknlock.vn/data/base/banner/footerLogo.png" style=""></a>
          </div>
          <div class="addressBox col-8 col-md-8 col-lg-8">
            <ul class="address">
              <li>CÔNG TY TNHH LOCK&amp;LOCK HCM</li>
              <li>
                Giấy CNĐKDN : 0309921077 –Ngày cấp :17/03/2010  ,  được sửa đổi lần thứ 08 ngày : 16/11/2015 
                được sửa đổi lần thứ
              </li>
              <li>Cơ quan cấp : Phòng Đăng ký kinh doanh – Sở kế hoạch và Đầu tư TP.HCM</li>
              <li>Địa chỉ đăng ký kinh doanh : 27487 77 Hoàng Văn Thái. Phường Tân Phú , Quận 7, TP HCM</li>
            </ul>
          </div>
          <div class="marklayer col-2 col-md-2 col-lg-2">
            <a href="">
              <img src="http://www.locknlock.vn/data/base/imgs/global/Thongbao.png" alt="">
            </a>
          </div>     
        </div>
      </div>

    </div>
    <button onclick="topFunction()" id="myBtn">
      <img src="public/locknlock/images/upload.png" alt="">
    </button>
    <button onclick="scrollWin()" id="todown" style="position:fixed;">
      <img src="public/locknlock/images/dow.png" alt="">
    </button>

  <script>
    $('#totop').click(function(){ 
      $('html,body').animate({ scrollTop: 0 }, 400);
      return false; 
    });
    //Get the button
    var mybutton = document.getElementById("myBtn");
    var buttondown = document.getElementById("todown");

    // When the user scrolls down 400px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        mybutton.style.display = "block";
        buttondown.style.display = "block";
      } else {
        mybutton.style.display = "none";
        buttondown.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.documentElement.scrollTop = 0;
    }
    function scrollWin() {
      $('html,body').animate({scrollTop: document.body.scrollHeight},"fast");
    }
  </script>

    <script src="public/locknlock/js/lightslider.js"></script>
    <script src='public/locknlock/js/owl.carousel.min.js'></script>
    <script src='public/locknlock/js/website_js.js'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>