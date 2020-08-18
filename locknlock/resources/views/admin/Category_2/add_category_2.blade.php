@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">
        <strong>Horizontal</strong> Form
    </div>
    <div class="card-body card-block">
        <form action="{{URL::to('admin/category2/save-category-2')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-text" class=" form-control-label">Category_2</label></div>
                <div class="col-12 col-md-9">
                    <input type="txt" name="category_2" placeholder="Enter Category_2..." class="form-control" required>
                    <span class="help-block">enter category_2</span></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                <div class="col-12 col-md-9">
                    <select name="select_cate_1" id="select" class="form-control">
                        @foreach($category_1 as $cate_1 )
                            <option value="{{ $cate_1->id }}">{{ $cate_1->ten }}</option>
                        @endforeach
                    </select>
                </div>
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