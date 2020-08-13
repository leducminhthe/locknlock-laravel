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
                    <th width="20%">#</th>
                    <th width="30%">Name</th>
                    <th width="30%">cate1_Name</th>
                    <th width="20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($category_2 as $key => $cate_2)
                <tr>
                    <th scope="row">{{$cate_2->id_cate2}}</th>
                    <td>{{$cate_2->ten_cate2}}</td>
                    <td>{{$cate_2->ten}}</td>
                    <td>
                        <button type="submit">
                            <a href="{{URL::to('edit-category-2/'.$cate_2->id_cate2)}}" title="">Edit</a>
                        </button>
                        <button type="submit">
                            <a onclick="return confirm('Are you sure?')" href="{{URL::to('delete-category-2/'.$cate_2->id_cate2)}}" title="">Delete</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop