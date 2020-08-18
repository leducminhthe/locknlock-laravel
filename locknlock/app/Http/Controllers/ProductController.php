<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    public function add_product(){
    	$cate1 = DB::table('table_category_1')->get();
    	$cate2 = DB::table('table_category_2')->get();
    	return view('admin.Product.add_product')->with(compact('cate1', 'cate2'));
    }

    public function save_product(Request $req){
    	$data = [];
    	$data['ten_product'] = $req->name;
    	$data['gia'] = $req->price;
    	$data['photo'] = $req->photo;
    	$data['chitietsanpham'] = $req->chitiet;
    	$data['thongtinsanpham'] = $req->thongtin;
    	$data['SP_Best'] = $req->sp_best;
    	$data['masp'] = $req->masp;
    	$data['cat1_id'] = $req->cat1;
    	$data['cat2_id'] = $req->cat2;
    	$data['online'] = $req->online;

        //upload file
        // if ($req->hasFile('photo')) {
        //     $file = $req->file('photo');

        //     $duoi_file = $file->getClientOriginalExtension();
        //     if ($duoi_file != 'jqg' && $duoi_file != 'png' && $duoi_file != 'jpeg') {
        //         return Redirect::to('admin/product/list-product')->with('loi','image not right'); 
        //     }

        //     $name = $file->getClientOriginalName();
        //     $hinh = Str::random(4).'_'.$name;
        //     while (file_exists("upload".$hinh)) {
        //         $hinh = Str::random(4)."_".$name;
        //     }
        //     $file->move('upload',$hinh);
        //     $data['photo'] = $hinh;
        // }else{
        //     $data['photo'] = '';
        // }

    	DB::table('table_product')->insert($data);
    	Session::put('message', 'Add product successs');
    	return Redirect::to('admin/product/list-product');
    }

    public function list_product(){
    	$product = DB::table('table_product')
    	->join('table_category_1', 'table_category_1.id', '=', 'table_product.cat1_id')
    	->join('table_category_2', 'table_category_2.id_cate2', '=', 'table_product.cat2_id')
    	->paginate(25);
    	return view('admin.Product.list_product')->with(compact('product'));
    }

    public function edit_product($product_id){
    	$product = DB::table('table_product')->where('id_product',$product_id)->get();
    	$cate1 = DB::table('table_category_1')->get();
    	$cate2 = DB::table('table_category_2')->get();
    	return view('admin.Product.edit_product')->with(compact('product','cate1','cate2'));
    }

    public function update_product(Request $req, $product_id){
    	$data = [];
    	$data['ten_product'] = $req->name;
    	$data['gia'] = $req->price;
    	$data['photo'] = $req->photo;
    	$data['chitietsanpham'] = $req->chitiet;
    	$data['thongtinsanpham'] = $req->thongtin;
    	$data['SP_Best'] = $req->sp_best;
    	$data['masp'] = $req->masp;
    	$data['cat1_id'] = $req->cat1;
    	$data['cat2_id'] = $req->cat2;
    	$data['online'] = $req->online;

    	DB::table('table_product')->where('id_product', $product_id)->update($data);
    	Session::put('message', 'Update product successs');
    	return Redirect::to('admin/product/list-product');
    }

    public function delete_product($product_id){
        $delete = product::find($product_id);
        $delete->delete();
        return Redirect::to('admin/product/list-product');
    }
}
