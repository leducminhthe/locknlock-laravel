<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\category_1;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
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
}
