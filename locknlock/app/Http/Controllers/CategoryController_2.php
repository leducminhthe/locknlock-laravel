<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController_2 extends Controller
{
    public function add_category_2(){
    	$category_1 = DB::table('table_category_1')->get();
    	return view('admin.Category_2.add_category_2')->with(compact('category_1'));
    }

    public function save_category_2(Request $req){
    	$data = [];
    	$data['ten_cate2'] = $req->category_2;
    	$data['cat1_id'] = $req->select_cate_1;
    	DB::table('table_category_2')->insert($data);
    	Session::put('message','Insert category_2 success');
    	return Redirect::to('list-category-2');
    }

    public function list_category_2(){
        $category_2 = DB::table('table_category_2')->join('table_category_1', 'table_category_1.id', '=', 'table_category_2.cat1_id')->get();
        return view('admin.Category_2.list_category_2')->with(compact('category_2'));
    }

    public function edit_category_2($category2_id){
    	$category_1 = DB::table('table_category_1')->get();

        $category_2 = DB::table('table_category_2')->where('id_cate2',$category2_id)->get();

        return view('admin.Category_2.edit_category_2')->with(compact('category_2', 'category_1'));
    }

    public function update_category_2(Request $req, $category2_id){
    	$data = [];
    	$data['ten_cate2'] = $req->category_2;
    	$data['cat1_id'] = $req->select_cate_1;
    	DB::table('table_category_2')
    	->where('id_cate2',$category2_id)
    	->update($data);
    	Session::put('message','Update category_2 success');
    	return Redirect::to('list-category-2');
    }

    public function delete_category_2($category2_id){
        $category_2 = DB::table('table_category_2')->where('id_cate2',$category2_id)->delete();
        Session::put('message', 'Delete category success');
        return Redirect::to('list-category-2');
    }
}
