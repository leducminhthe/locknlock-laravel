@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">
        <strong>Horizontal</strong> Form
    </div>
    <div class="card-body card-block">
        @foreach($category_2 as $cate_2)
        <form action="{{URL::to('update-category-2/'. $cate_2->id_cate2)}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-text" class=" form-control-label">Category_2</label></div>
                <div class="col-12 col-md-9">
                    <input type="txt" name="category_2" value="{{ $cate_2->ten_cate2 }}" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                <div class="col-12 col-md-9">
                    <select name="select_cate_1" id="select" class="form-control">
                        @foreach($category_1 as $cate_1)
                            @if($cate_1->id == $cate_2->cat1_id)
                                <option selected value="{{ $cate_1->id }}">{{ $cate_1->ten }}</option>
                            @else
                                <option value="{{ $cate_1->id }}">{{ $cate_1->ten }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
            @endforeach
        </form>
    </div>

</div>

@stop