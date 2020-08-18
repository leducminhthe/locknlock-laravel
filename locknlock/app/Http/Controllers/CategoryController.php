<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\category_1;
use Illuminate\Support\Facades\Redirect;

session_start();

class CategoryController extends Controller
{
    public function add_category(){
    	return view('admin.Category.add_category');
    }

    public function save_category_1(Request $req){
    	$data = [];
    	$data['ten'] = $req->category_1;
    	DB::table('table_category_1')->insert($data);
    	Session::put('message', 'Add category success');
    	return Redirect::to('admin/category1/list-category-1');
    }

    public function list_category_1(){
        $category_1 = category_1::all();
        return view('admin.Category.list_category_1')->with(compact('category_1'));
    }

    public function edit_category_1($category1_id){
        $category_1 = DB::table('table_category_1')->where('id',$category1_id)->get();
        return view('admin.Category.edit_category_1')->with(compact('category_1'));
    }

    public function update_category_1(Request $req, $category1_id){
        $data = [];
        $data['ten'] = $req->category_1;
        DB::table('table_category_1')->where('id',$category1_id)->update($data);
        Session::put('message', 'Update category success');
        return Redirect::to('admin/category1/list-category-1');
    }

    public function delete_category_1($category1_id){
        $category_1 = DB::table('table_category_1')->where('id',$category1_id)->delete();
        Session::put('message', 'Delete category success');
        return Redirect::to('admin/category1/list-category-1');
    }
}
