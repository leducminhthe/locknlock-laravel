@extends('layout')
@section('content')

      <div class="main row">
        <div class="main_left col-3 col-lg-3 col-md-3">
          <div id="mainnav">
            <ul>
              
              @foreach($menus as $menucha)
              @if( count($menucha->cate2) > 0 )
              <li><a href="">{{ $menucha->ten }}</a>
                <ul class="sub-menu">
                  <h4>{{ $menucha->ten }}</h4>
                    
                    @foreach($menucha->cate2 as $menucon)
                      <li><a href="">{{ $menucon->ten_cate2 }}</a></li>
                    @endforeach
                </ul>
              </li>
              @endif
              @endforeach

            </ul>
          </div>
        </div>

        <div class="main_right col-9 col-lg-9 col-md-9"> 
          <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
              <li data-target="#demo" data-slide-to="3"></li>
              <li data-target="#demo" data-slide-to="4"></li>
            </ul>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="public/locknlock/images/binh-giu-nhiet-colorful-banner.jpg" alt="Los Angeles" width="1100" height="500">
                <div class="carousel-caption">
                  <h3 style="color: black;">Sản Phẩm Mới</h3>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="public/locknlock/images/900x350.jpg" alt="Chicago" width="1100" height="500">
                <div class="carousel-caption">
                  <h3 style="color: black;">Ngày Hội Lock&Lock</h3>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="public/locknlock/images/member.jpg" alt="New York" width="1100" height="500">
                <div class="carousel-caption">
                  <h3 style="color: black;">ƯU ĐÃI THÀNH VIÊN</h3>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="public/locknlock/images/mayeptraicay.jpg" alt="New York" width="1100" height="500">
                <div class="carousel-caption">
                  <h3 style="color: black;">Sản phẩm bán chạy</h3>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="public/locknlock/images/Untitled-1.jpg" alt="New York" width="1100" height="500">
                <div class="carousel-caption">
                  <h3 style="color: black;">Giảm Giá</h3>
                </div>   
              </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
        </div>
      </div>

      <div class="box">
        <div class="wrap row">
          <div class="col-12 col-md-3 col-lg-3"><h4>SẢN PHẨM BÁN CHẠY</h4></div>
          <div class="col-12 col-md-7 col-lg-7"><p class="btn_more"><a href="" >Xem thêm</a></p></div>
        </div>

        <div class="slide row">
          <div class="col-12 col-lg-12 col-md-12">
            <div class="owl-carousel owl-theme">
          
          @foreach($sp_best as $key => $sp_best)
            <div class="item">
                <a href="">
                  <figure>
                    <p class="mainProduct_listImg"><img src="{{$sp_best->photo}}" alt=""></p>
                    <figcaption>
                      <p class="ranking best_1">BEST <span>{{$sp_best->SP_Best}}</span></p>
                      <p class="mainProduct_listTit">{{$sp_best->ten_product}}</p>
                      <p class="mainProduct_listPrice"> 
                        <span>{{ number_format($sp_best->gia, 0) }}₫</span>
                      </p>
                    </figcaption>
                  </figure>
                </a>
              </div>
          @endforeach

            </div>
          </div>
        </div>
      </div>

      <div class="category">
        <div class="sp" style="text-align: center;">
          <h4>DANH MỤC SẢN PHẨM</h4>
          <span>Bạn có thể xem được sản phẩm đa dạng của LOCK&LOCK</span>
        </div>

        <div class="sp">
          <ul class="list_sp">
              <li class="box_sp">
                <p>
                  BÌNH NƯỚC
                  <span style="float: right;"><a href="" >Xem thêm</a></span>
                </p>               
                <div class="list_box row">
                  <div class="list_box_left col-4 col-md-4 col-lg-4">
                    <a href="">
                      <img src="public/locknlock/images/CA_water_bottle.png" class="img_Box">
                    </a>
                  </div>

                  <div class="list_box_right col-8 col-md-8 col-lg-8">
                    <ul class="row">
                  
                  @foreach($binhnuoc as $key => $binhnuoc )
                     <li class="col-4 col-md-4 col-lg-4">
                        <a href="">
                          <figure>
                            <p class="mainProduct_listImg"><img src="{{ $binhnuoc->photo }}" alt=""></p>
                            <figcaption>
                              <p class="mainProduct_listTit">{{ $binhnuoc->ten_product }}</p>
                              <p class="mainProduct_listPrice">
                                <span>{{ number_format($binhnuoc->gia, 0) }}</span>₫</p>
                            </figcaption>
                          </figure>
                        </a>
                      </li>
                  @endforeach

                    </ul>
                  </div>
                </div>
              </li>
          </ul>
        </div>

        <div class="sp">
          <ul class="list_sp">
              <li class="box_sp">
                <p>
                  DỤNG CỤ NẤU ĂN
                  <span style="float: right;"><a href="" >Xem thêm</a></span>
                </p>
                <div class="list_box row">
                  <div class="list_box_left col-4 col-md-4 col-lg-4">
                    <a href="">
                      <img src="public/locknlock/images/CA_cookware_2.png" class="img_Box">
                    </a>
                  </div>
                  <div class="list_box_right col-8 col-md-8 col-lg-8">
                    <ul class="row">

                    @foreach($dungcunauan as $key => $dungcunauan )
                     <li class="col-4 col-md-4 col-lg-4">
                        <a href="">
                          <figure>
                            <p class="mainProduct_listImg"><img src="{{ $dungcunauan->photo }}" alt=""></p>
                            <figcaption>
                              <p class="mainProduct_listTit">{{ $dungcunauan->ten_product }}</p>
                              <p class="mainProduct_listPrice">
                                <span>{{ number_format($dungcunauan->gia, 0) }}</span>₫</p>
                            </figcaption>
                          </figure>
                        </a>
                      </li>
                    @endforeach   

                    </ul>
                  </div>
                </div>
              </li>
          </ul>
        </div>

        <div class="sp">
          <ul class="list_sp">
              <li class="box_sp">
                <p>
                  HÀNG GIA DỤNG
                  <span style="float: right;"><a href="" >Xem thêm</a></span>
                </p>
                <div class="list_box row">
                  <div class="list_box_left col-4 col-md-4 col-lg-4">
                    <a href="">
                      <img src="public/locknlock/images/CA_appliances_1.png" class="img_Box">
                    </a>
                  </div>
                  <div class="list_box_right col-8 col-md-8 col-lg-8">
                    <ul class="row">

                    @foreach($hanggiadung as $key => $hanggiadung )
                     <li class="col-4 col-md-4 col-lg-4">
                        <a href="">
                          <figure>
                            <p class="mainProduct_listImg"><img src="{{ $hanggiadung->photo }}" alt=""></p>
                            <figcaption>
                              <p class="mainProduct_listTit">{{ $hanggiadung->ten_product }}</p>
                              <p class="mainProduct_listPrice">
                                <span>{{ number_format($hanggiadung->gia, 0) }}</span>₫</p>
                            </figcaption>
                          </figure>
                        </a>
                      </li>
                    @endforeach

                    </ul>
                  </div>
                </div>
              </li>
          </ul>
        </div>

        <div class="sp">
          <ul class="list_sp">
              <li class="box_sp">
                <p>
                  HỘP BẢO QUẢN
                  <span style="float: right;"><a href="" >Xem thêm</a></span>
                </p>
                <div class="list_box row">
                  <div class="list_box_left col-4 col-md-4 col-lg-4">
                    <a href="">
                      <img src="public/locknlock/images/CA_food_storage.png" class="img_Box">
                    </a>
                  </div>
                  <div class="list_box_right col-8 col-md-8 col-lg-8">
                    <ul class="row">

                    @foreach($hopbaoquan as $key => $hopbaoquan )
                     <li class="col-4 col-md-4 col-lg-4">
                        <a href="">
                          <figure>
                            <p class="mainProduct_listImg"><img src="{{ $hopbaoquan->photo }}" alt=""></p>
                            <figcaption>
                              <p class="mainProduct_listTit">{{ $hopbaoquan->ten_product }}</p>
                              <p class="mainProduct_listPrice">
                                <span>{{ number_format($hopbaoquan->gia, 0) }}</span>₫</p>
                            </figcaption>
                          </figure>
                        </a>
                      </li>
                    @endforeach

                    </ul>
                  </div>
                </div>
              </li>
          </ul>
        </div>

        <div class="sp">
          <ul class="list_sp">
              <li class="box_sp">
                <p>
                  BÌNH GIỮ NHIỆT
                  <span style="float: right;"><a href="" >Xem thêm</a></span>
                </p>
                <div class="list_box row">
                  <div class="list_box_left col-4 col-md-4 col-lg-4">
                    <a href="">
                      <img src="public/locknlock/images/CA_vacuum_flask.png" class="img_Box">
                    </a>
                  </div>
                  <div class="list_box_right col-8 col-md-8 col-lg-8">
                    <ul class="row">

                    @foreach($binhgiunhiet as $key => $binhgiunhiet )
                     <li class="col-4 col-md-4 col-lg-4">
                        <a href="">
                          <figure>
                            <p class="mainProduct_listImg"><img src="{{ $binhgiunhiet->photo }}" alt=""></p>
                            <figcaption>
                              <p class="mainProduct_listTit">{{ $binhgiunhiet->ten_product }}</p>
                              <p class="mainProduct_listPrice">
                                <span>{{ number_format($binhgiunhiet->gia, 0) }}</span>₫</p>
                            </figcaption>
                          </figure>
                        </a>
                      </li>
                    @endforeach

                    </ul>
                  </div>
                </div>
              </li>
          </ul>
        </div>

        <div class="sp">
          <ul class="list_sp">
              <li class="box_sp">
                <p>
                  HỘP CƠM
                  <span style="float: right;"><a href="" >Xem thêm</a></span>
                </p>
                <div class="list_box row">
                  <div class="list_box_left col-4 col-md-4 col-lg-4">
                    <a href="">
                      <img src="public/locknlock/images/CA_lunch_box.png" class="img_Box">
                    </a>
                  </div>
                  <div class="list_box_right col-8 col-md-8 col-lg-8">
                    <ul class="row">

                    @foreach($hopcom as $key => $hopcom )
                     <li class="col-4 col-md-4 col-lg-4">
                        <a href="">
                          <figure>
                            <p class="mainProduct_listImg"><img src="{{ $hopcom->photo }}" alt=""></p>
                            <figcaption>
                              <p class="mainProduct_listTit">{{ $hopcom->ten_product }}</p>
                              <p class="mainProduct_listPrice">
                                <span>{{ number_format($hopcom->gia, 0) }}</span>₫</p>
                            </figcaption>
                          </figure>
                        </a>
                      </li>
                    @endforeach

                    </ul>
                  </div>
                </div>
              </li>
          </ul>
        </div>
      </div>
      
      <div class="mainService row">
        <div class="mainService_left col-4 col-md-4 col-lg-4">
          <article class="customer">
            <h4 style="margin-bottom: 0px;">Chăm sóc khách hàng</h4>
            <p class="sdt">028-5413 5756 (488)</p>
            <p>Email : leducminhthe96@gmail.com</p>
            <ul style="margin: 0px;">
              <li>Các ngày trong tuần</li>
              <li>(Thứ Hai ~ Thứ Sáu) 09:00 ~ 18:00</li>
              <li>Thứ Bảy,CN và ngày lễ</li>
            </ul>
          </article>
          <p><img src="http://www.locknlock.vn/data/base/imgs/main/mainService_lSide_banner02.jpg" alt=""></p>
        </div>

        <div class="mainService_center col-4 col-md-4 col-lg-4">
          <img src="http://www.locknlock.vn/html/images/main/mainService_rSide_middle.jpg">
          <article style="margin: 20px;">
            <h4><img src="http://www.locknlock.vn/data/base/imgs/main/mainService_rSide_bottomBottom_tit.png"></h4>
            <ul class="mainService_center_list">
              <li><a href=""  title="Facebook"><img src="public/locknlock/images/facebook (1).png"></a></li>
              <li><a href=""  title="YouTube"><img src="public/locknlock/images/youtube.png"></li>
              <li><a href=""  title="Instagram"><img src="public/locknlock/images/instagram.png"></a></li>
            </ul>
          </article>
        </div>

        <div class="mainService_right col-4 col-md-4 col-lg-4">
          <a href="">
            <img src="http://www.locknlock.vn/data/base/banner/untitled_1.png" width="100%" height="120">
          </a>
          <a href="">
            <img src="http://www.locknlock.vn/data/base/banner/20170101_1.png" alt="#" width="100%" height="120" style="margin: 5px 0px;">
          </a>
          <div class="note">
            <div class="notice">
              <p>
                Notice
                <span style="float: right;"><a href="" >Xem thêm</a></span>
              </p>
            </div>
            <ul class="notice_list">
              <li>
                <p><a href="">CBHQ - BÌNH ĐỰNG NƯỚC LOCKLOCK BẰNG NHỰA PET HAP654</a></p>
              </li>
            </ul>             
          </div>
        </div>
      </div>
@stop