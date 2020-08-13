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
                    <th width="60%">Name</th>
                    <th width="20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($category_1 as $key => $cate_1)
                <tr>
                    <th scope="row">{{$cate_1->id}}</th>
                    <td>{{$cate_1->ten}}</td>
                    <td>
                        <button type="submit">
                            <a href="{{URL::to('edit-category-1/'.$cate_1->id)}}" title="">Edit</a>
                        </button>
                        <button type="submit">
                            <a onclick="return confirm('Are you sure?')" href="{{URL::to('delete-category-1/'.$cate_1->id)}}" title="">Delete</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop