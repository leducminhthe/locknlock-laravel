<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\category_1;
use App\category_2;
use App\product;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

session_start();

class HomeController extends Controller
{
    function __construct(){
        $menus = category_1::all();
        view()->share('menus', $menus);

        if ( Auth::check() ) {
            view()->share('customer', Auth::user()->id );
        }
    }


    public function home(){
    	$sp_best = DB::table('table_product')->where('SP_Best', '>', 0 )->orderby('SP_Best', 'asc')->get();
    	$binhnuoc = DB::table('table_product')->where('cat2_id', '=', 19 )->limit(6)->get();
    	$dungcunauan = DB::table('table_product')->where('cat2_id', '=', 5 )->limit(6)->get();
    	$hanggiadung = DB::table('table_product')->where('cat2_id', '=', 32 )->limit(6)->get();
    	$hopbaoquan = DB::table('table_product')->where('cat2_id', '=', 1 )->limit(6)->get();
    	$binhgiunhiet = DB::table('table_product')->where('cat2_id', '=', 25 )->limit(6)->get();
    	$hopcom = DB::table('table_product')->where('cat2_id', '=', 20 )->limit(6)->get();

    	return view('locknlock.home')->with(compact('sp_best', 'binhnuoc', 'dungcunauan', 'hanggiadung', 'hopbaoquan', 'binhgiunhiet', 'hopcom'));
    }

    public function details($id_product){
        $danhmuccha = DB::table('table_category_1')
        ->join('table_product','id','=','cat1_id')
        ->where('id_product',$id_product)->get();
        $listdanhmuccha = DB::table('table_category_1')->get();

        $images = DB::table('table_product_image')->where('product_id',$id_product)->get();
        $product_detail = product::find($id_product);
        $related_product = product::where('cat2_id', $product_detail->cat2_id)->paginate(6);
        return view('locknlock.details')->with(compact('product_detail','images','danhmuccha','listdanhmuccha','related_product'));
    }

    public function category_1($id){
        $danhmuccha = DB::table('table_category_1')->where('id',$id)->get();
        $listdanhmuccha = DB::table('table_category_1')->get();
        $danhmuc = category_1::all()->where('id',$id);
        return view('locknlock.danhmuc')->with(compact('danhmuc','danhmuccha','listdanhmuccha'));
    }

    public function category_2($id_cate2){
        $danhmuccha = DB::table('table_category_1')
        ->join('table_category_2','id','=','cat1_id')
        ->where('id_cate2',$id_cate2)->get();
        $listdanhmuccha = DB::table('table_category_1')->get();
        $category_2 = category_2::find($id_cate2);
        $product = product::where('cat2_id',$id_cate2)->paginate(9);
        return view('locknlock.danhmuccon')->with(compact('category_2','danhmuccha','listdanhmuccha','product'));
    }

    public function login_user(){
        return view('locknlock.login');
    }

    public function login_user_post(Request $req){
        if (Auth::attempt(['email'=>$req->email, 'password'=>$req->password])) {
            return Redirect::to('locknlock');
        }else{
            Session::put('message','Pass or Email wrong');
            return Redirect::to('login-user');
        }
    }

    public function search_post(Request $req){
        $search = $req->search;
        $products = product::where('ten_product','like','%'.$search.'%')
        ->orWhere('masp','like','%'.$search.'%')->take(10)->paginate(5);
        return view('locknlock.search')->with(compact('products','search'));
    }
}
