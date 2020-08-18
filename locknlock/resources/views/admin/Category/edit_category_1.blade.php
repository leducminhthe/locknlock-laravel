@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">
        <strong>Horizontal</strong> Form
    </div>
    <div class="card-body card-block">
        <?php 
            $message = Session::get('message');
            if ($message) {
                echo '<span>'. $message .'</span>';
                Session::put('message', null);
            }
         ?>
        @foreach($category_1 as $key => $cate_1)
        <form action="{{URL::to('admin/category1/update-category-1/'.$cate_1->id )}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-text" class=" form-control-label">Category</label></div>
                <div class="col-12 col-md-9">
                    <input type="txt" name="category_1" class="form-control" value="{{ $cate_1->ten }}" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>
            </div>
        </form>
        @endforeach
    </div>

</div>

@stop