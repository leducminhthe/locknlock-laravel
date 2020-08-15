<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\category_1;
use App\category_2;
use App\product;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function layout(){
        $menus = category_1::all();
        return view('locknlock.home')->with(compact('menus'));
    }

    public function home(){
    	$sp_best = DB::table('table_product')->where('SP_Best', '>', 0 )->orderby('SP_Best', 'asc')->get();
    	$binhnuoc = DB::table('table_product')->where('cat2_id', '=', 19 )->limit(6)->get();
    	$dungcunauan = DB::table('table_product')->where('cat2_id', '=', 5 )->limit(6)->get();
    	$hanggiadung = DB::table('table_product')->where('cat2_id', '=', 32 )->limit(6)->get();
    	$hopbaoquan = DB::table('table_product')->where('cat2_id', '=', 1 )->limit(6)->get();
    	$binhgiunhiet = DB::table('table_product')->where('cat2_id', '=', 25 )->limit(6)->get();
    	$hopcom = DB::table('table_product')->where('cat2_id', '=', 20 )->limit(6)->get();

    	$menus = category_1::all();

    	return view('locknlock.home')->with(compact('sp_best', 'binhnuoc', 'dungcunauan', 'hanggiadung', 'hopbaoquan', 'binhgiunhiet', 'hopcom', 'menus'));
    }

    public function details($id_product){
        $danhmuccha = DB::table('table_category_1')
        ->join('table_product','id','=','cat1_id')
        ->where('id_product',$id_product)->get();
        $listdanhmuccha = DB::table('table_category_1')->get();

        $images = DB::table('table_product_image')->where('product_id',$id_product)->get();
        $product = DB::table('table_product')->where('id_product',$id_product)->get();
        $menus = category_1::all();
        return view('locknlock.details')->with(compact('menus','product','images','danhmuccha','listdanhmuccha'));
    }

    public function category_1($id){
        $menus = category_1::all();
        $danhmuccha = DB::table('table_category_1')->where('id',$id)->get();
        $listdanhmuccha = DB::table('table_category_1')->get();
        $danhmuc = category_1::all()->where('id',$id);
        return view('locknlock.danhmuc')->with(compact('menus','danhmuc','danhmuccha','listdanhmuccha'));
    }

    public function category_2($id_cate2){
        $menus = category_1::all();
        $danhmuccha = DB::table('table_category_1')
        ->join('table_category_2','id','=','cat1_id')
        ->where('id_cate2',$id_cate2)->get();
        $listdanhmuccha = DB::table('table_category_1')->get();
        $category_2 = category_2::all()->where('id_cate2',$id_cate2);
        return view('locknlock.danhmuccon')->with(compact('menus','category_2','danhmuccha','listdanhmuccha'));
    }
}
