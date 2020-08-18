@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">
        <strong class="card-title">Basic Table</strong>
    </div>
    <div class="card-body">
        <?php 
            $message = Session::get('message');
            if ($message) {
                echo '<span>'. $message .'</span>';
                Session::put('message', null);
            }
         ?>
        <table class="table">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="30%">Name</th>
                    <th width="10%">MaSP</th>
                    <th width="10%">cate1_Name</th>
                    <th width="10%">cate2_Name</th>
                    <th width="10%">Photo</th>
                    <th width="10%">Active</th>                    
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $key => $sp)
                <tr>
                    <th scope="row">{{ $sp->id_product }}</th>
                    <td>{{ $sp->ten_product }}</td>
                    <td>{{ $sp->masp }}</td>
                    <td>{{ $sp->ten }}</td>
                    <td>{{ $sp->ten_cate2 }}</td>
                    <td>
                        <img src="{{ $sp->photo }}" alt="">
                    </td>
                        @if( $sp->online  == 0 )
                            <td>Hết hàng</td>
                        @else
                            <td>Còn hàng</td>
                        @endif
                    <td>
                        <button type="submit">
                            <a href="{{URL::to('admin/product/edit-product/'.$sp->id_product)}}" title="">Edit</a>
                        </button>
                        <button type="submit">
                            <a onclick="return confirm('Are you sure?')" href="{{URL::to('admin/product/delete-product/'.$sp->id_product)}}" title="">Delete</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    {{ $product ->links() }}
@stop