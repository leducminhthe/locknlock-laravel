@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">
        <strong>Horizontal</strong> Form
    </div>
    <div class="card-body card-block">
        <form action="{{URL::to('admin/category1/save-category-1')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-text" class=" form-control-label">Category</label></div>
                <div class="col-12 col-md-9">
                    <input type="txt" name="category_1" placeholder="Enter Category..." class="form-control" required>
                    <span class="help-block">enter category</span></div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </form>
    </div>

</div>

@stop