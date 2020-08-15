@extends('layout')
@section('content')

<?php 
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>

<ul class="nav nav-pills navDetail">
  <li class="nav-item iconHome">
    <a class="nav-link" href="{{URL::to('locknlock')}}"><img src="public/locknlock/images/home.png" alt=""></a>
  </li>

  @foreach($danhmuccha as $danhmuccha)
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ $danhmuccha->ten }}</a>
    <div class="dropdown-menu">

    @foreach($listdanhmuccha as $list)
      <a class="dropdown-item" href="{{URL::to('category-1/'. $list->id)}}">{{ $list->ten }}</a>
    @endforeach

    </div>
  </li>
  @endforeach

</ul>

<p class="thuonghieu">LOCK&LOCK</p>
<div class="fb-like" data-href="<?php echo $actual_link ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>

@foreach($product as $product_detail)
<div class="pageCommunity row">
  <div class="TenMaSP col-8 col-lg-8 col-md-8">
    <h3>{{ $product_detail->ten_product }}</h3>
    <p>{{ $product_detail->masp }}</p>
  </div>
  <ul class="reviewSP col-4 col-lg-4 col-md-4">
    <li class="review">
      <strong class="tit">Phản hồi trực tiếp</strong>
      <p class="average"><img src="http://www.locknlock.vn/data/base/imgs/icon/star_00n.png" alt="별점 0"></p>
    </li>
    <li class="choice">
        <strong class="tit">Nổi bật</strong>
        <p class="average select">
          <img src="public/locknlock/images/heart.png" alt="">
          1
        </p>
    </li>
    <li class="back">
      <a href="{{URL::to('locknlock')}}" title=""><img src="public/locknlock/images/logout.png" alt=""></a>
    </li>
  </ul>
</div>

<div class="detailBox row">

  <div class="another_image col-7 col-lg-7 col-md-7">

    <ul id="vertical">
      @foreach($images as $product_image)
      <li data-thumb="{{ $product_image->photo }}">
          <img src="{{ $product_image->photo }}" alt=""> 
      </li>
      @endforeach
    </ul>

  </div>

  <div class="DetailSP col-5 col-lg-5 col-md-5">
    <form action="{{URL::to('shoppingcart')}}" method="POST">
      {{csrf_field()}}
      <ul class="thongbao">
        <li>

        @if( $product_detail->online == 0 )
          <p class="soldOut"><span>Tạm thời hết hàng</span></p>
        @else
           <p class="soldOut"><span>Còn hàng</span></p>
        @endif

          </li>
        <li><p class="online"><span>Chuyên dùng trực tuyến</span></p></li>
      </ul>
      <table class="price_SP">
          <tr>
            <td class="td1">Giá bán</td>
            <td class="td2">{{ number_format($product_detail->gia, 0) }}VNĐ</td>
          </tr>
      </table>
      <img src="http://www.locknlock.vn/data/base/button/btn_zzim.png" alt="Nổi bật">
      <div class="add_SP">
        <input type="hidden" name="AnhSP" value="{{ $product_detail->photo }}">
        <input type="hidden" name="Price" value="{{ $product_detail->gia }}">
        <input type="hidden" name="TenSP" value="{{ $product_detail->ten_product }}">
        <input type="hidden" name="spId" value="{{ $product_detail->id_product }}">
        <input type="hidden" name="masp" value="{{ $product_detail->masp }}">
        <input type="number" class="buyfield" name="quantity" value="1" min="1" />
        <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
      </div>
    </form>
  </div>
</div>

<div class="thongtin_sp">
  <h4>Thông Tin Sản Phẩm</h4>
  {!! $product_detail->chitietsanpham !!}  
  {!! $product_detail->thongtinsanpham !!}  
</div>

@endforeach

<div class="fb-comments" data-href="<?php echo $actual_link ?>" data-numposts="20" data-width=""></div> 

<div class="danhsach row"></div>
  <div id="xemthem">
    
  </div>

  <script >
  // const thumbs = document.querySelector(".thumb-img").children;

  //    function changeImage(event){
  //       document.querySelector(".pro-img").src=event.children[0].src
        
  //       for(let i=0; i<thumbs.length;i++){
  //         thumbs[i].classList.remove("active");
  //       }
  //       event.classList.add("active");
  //    }
    $(document).ready(function() {
      $('#vertical').lightSlider({
        gallery:true,
        item:1,
        slideMargin: 0,
        vertical:true,
        verticalHeight:400,
        vThumbWidth:150,
        thumbItem:4,
        thumbMargin:10,

      });  
    });
  </script>

@stop






