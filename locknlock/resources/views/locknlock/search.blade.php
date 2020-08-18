@extends('layout')
@section('content')

<nav class="nav nav_GioHang">
  <a class="nav-link" href=""><img src="public/locknlock/images/home.png" alt=""></a>
  <a class="nav-link" href="#">Kết quả kiểm tra</a>
</nav>

	@foreach($products as $product)
    <li class="col-4 col-md-4 col-lg-4">
	    <a href="">
	      <figure>
	        <p class="mainProduct_listImg" ><img src="{{$product->photo}}" alt=""></p>
	        <figcaption>
	          <p class="mainProduct_listTit">{{$product->ten_product}}</p>
	          <p class="mainProduct_listPrice">
	            <span>{{$product->gia}}</span>₫</p>
	        </figcaption>
	      </figure>
	    </a>
  	</li>
  	@endforeach
	{{ $products->links() }}
@endsection

