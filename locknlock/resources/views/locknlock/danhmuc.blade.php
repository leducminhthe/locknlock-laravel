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

  @foreach($danhmuc as $danhmuc)
  @if( count($danhmuc->cate2) > 0 )
    <div class="danhmuc_detail">
      <h4>{{$danhmuc->ten}}</h4>
    </div>
    <ul class="muc_con row">

        @foreach($danhmuc->cate2 as $menucon)
          <li  style="padding: 10px;" class="col-3 col-lg-3 col-md-3">
            <a  style="color: black" href="{{URL::to('category-2/'. $menucon->id_cate2)}}">{{ $menucon->ten_cate2 }}</a>
          </li>
        @endforeach

    </ul>
    @endif
  @endforeach

@stop
