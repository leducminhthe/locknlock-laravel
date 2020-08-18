<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\category_2;
use Illuminate\Support\Facades\Redirect;
session_start();

class AjaxController extends Controller
{
    public function get_cat2($cat1_id){
        $cate2 = category_2::where('cat1_id',$cat1_id)->get();

        foreach ($cate2 as $key => $cat2) { 
            echo '<option value="'.$cat2->id_cate2.'">'.$cat2->ten_cate2.'</option>';
        } 
    }
}
