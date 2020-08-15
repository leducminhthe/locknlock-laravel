@extends('layout')
@section('content')

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

  @foreach($category_2 as $cate2)
  @if( count($cate2->product) > 0 )
		<div class="danhmuc_detail">
			<h4>{{ $cate2->ten_cate2 }}</h4>
		</div>

      <ul class="row">
        @foreach( $cate2->product as $sp)
          <li class="col-4 col-md-4 col-lg-4">
              <a href="{{URL::to('details-sp/'. $sp->id_product)}}">
                <figure>
                  <p class="mainProduct_listImg" ><img src="{{ $sp->photo }}" alt=""></p>
                  <figcaption>
                    <p class="mainProduct_listTit">{{ $sp->ten_product }}</p>
                    <p class="mainProduct_listPrice">
                      <span>{{ number_format($sp->gia,0) }}</span>₫</p>
                  </figcaption>
                </figure>
              </a>
            </li>
          @endforeach
      </ul>

  @endif
  @endforeach

<div class="danhsach row"></div>
  <div id="xemthem">
    
  </div>

@stop
