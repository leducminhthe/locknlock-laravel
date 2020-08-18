@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">
        <strong>Basic Form</strong> Elements
    </div>
    <div class="card-body card-block">
        @foreach($product as $key => $sp)
        <form action="{{URL::to('admin/product/update-product/'.$sp->id_product)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Product</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">TenSP</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{ $sp->ten_product }}" class="form-control"><small class="form-text text-muted">This is name</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mã SP</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="masp" value="{{ $sp->masp }}" class="form-control"><small class="help-block form-text">Please enter MaSP</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Cate1</label></div>
                <div class="col-12 col-md-9">
                    <select name="cat1" id="select" class="form-control">
                        @foreach($cate1 as $cat1)
                            @if( $cat1->id == $sp->cat1_id )
                                <option selected value="{{$cat1->id}}">{{$cat1->ten}}</option>
                            @else
                                <option value="{{$cat1->id}}">{{$cat1->ten}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Cate2</label></div>
                <div class="col-12 col-md-9">
                    <select name="cat2" id="select" class="form-control">
                        @foreach($cate2 as $cat2)
                            @if( $cat2->id_cate2 == $sp->cat2_id )
                                <option selected value="{{ $cat2->id_cate2 }}">{{ $cat2->ten_cate2 }}</option>
                            @else
                                <option value="{{ $cat2->id_cate2 }}">{{ $cat2->ten_cate2 }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="price" value="{{ $sp->gia }}" class="form-control"><small class="help-block form-text">Please enter price</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">SP_Best</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="sp_best" value="{{ $sp->SP_Best }}" class="form-control"><small class="help-block form-text">Please enter SP_Best</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Chi tiet</label></div>
                <div class="col-12 col-md-9"><textarea name="chitiet" id="ckeditor1" rows="9" class="form-control">{{ $sp->chitietsanpham }}</textarea></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Thong tin</label></div>
                <div class="col-12 col-md-9">
                    <textarea name="thongtin" id="ckeditor2" rows="9" class="form-control" >{{ $sp->thongtinsanpham }}</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Active</label></div>
                <div class="col-12 col-md-9">
                    <select name="online" id="select" class="form-control">
                        @if( $sp->online == 0 )
                            <option selected value="0">Tạm thời hết hàng</option>
                            <option value="1">Còn hàng</option>
                        @else
                            <option value="0">Tạm thời hết hàng</option>
                            <option selected value="1">Còn hàng</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">photo</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="photo" value="{{ $sp->photo }}" class="form-control"></div>
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
        @endforeach
    </div>
</div>

@stop