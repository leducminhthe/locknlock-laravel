<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
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

    	DB::table('table_product')->insert($data);
    	Session::put('message', 'Add product successs');
    	return Redirect::to('list-product');
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
    	return Redirect::to('list-product');
    }
}
