@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">
        <strong>Basic Form</strong> Elements
    </div>
    <div class="card-body card-block">
        <form action="{{URL::to('save-product')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Product</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">TenSP</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="TenSP" class="form-control"><small class="form-text text-muted">This is name</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mã SP</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="masp" placeholder="Enter MaSP" class="form-control"><small class="help-block form-text">Please enter MaSP</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Cate1</label></div>
                <div class="col-12 col-md-9">
                    <select name="cat1" id="select" class="form-control">
                        @foreach($cate1 as $cat1)
                        <option value="{{$cat1->id}}">{{$cat1->ten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Cate2</label></div>
                <div class="col-12 col-md-9">
                    <select name="cat2" id="select" class="form-control">
                        @foreach($cate2 as $cat2)
                        <option value="{{$cat2->id_cate2}}">{{$cat2->ten_cate2}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="price" placeholder="Price" class="form-control"><small class="help-block form-text">Please enter price</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">SP_Best</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="sp_best" placeholder="SP_Best" class="form-control"><small class="help-block form-text">Please enter SP_Best</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Chi tiet</label></div>
                <div class="col-12 col-md-9"><textarea name="chitiet" rows="9" placeholder="Content..." class="form-control" id="ckeditor1"></textarea></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Thong tin</label></div>
                <div class="col-12 col-md-9"><textarea name="thongtin" id="ckeditor2" rows="9" placeholder="Content..." class="form-control"></textarea></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Active</label></div>
                <div class="col-12 col-md-9">
                    <select name="online" id="select" class="form-control">
                        <option value="0">Tạm thời hết hàng</option>
                        <option value="1">Còn hàng</option>

                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">photo</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="photo" placeholder="link photo" class="form-control"></div>
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