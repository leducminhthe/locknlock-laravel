<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class HomeController extends Controller
{
    protected $helper;

    public function __construct(Helpers $helper){
        $this->helper = $helper;
    }

    public function index(Request $request)
    {
        $params = [
            "status"=>"A"
        ];
        $banner = $this->helper->call_ntl_api_ntx('v1/banner', $params, 'GET');
        $res_banner = json_decode($banner, true);

        return View('frontend.home.home',['data' => $res_banner]);
    }

    public function gioithieu(){
        return View('frontend.pages.gioithieu');
    }

    public function nhansu(){
        return View('frontend.pages.nhansu');
    }

    public function info_member($url){

        $member;
        foreach( config('constants.member') as $member_list){
            if($url == $member_list['member_url']){
                $member = $member_list;
            }
        }
        return View('frontend.pages.info_member')->with(compact('member'));
    }

    public function policy(){
        return View('frontend.pages.policy');
    }

    public function trachnhiem(){
        return View('frontend.pages.trachnhiem');
    }

    public function trungthuc(){
        return View('frontend.pages.trungthuc');
    }

    public function chiendau(){
        return View('frontend.pages.chiendau');
    }

    public function giaohangchuan(){
        return View('frontend.pages.giaohangchuan');
    }

    public function giaohangnhanh(){
        return View('frontend.pages.giaohangnhanh');
    }

    public function giaohanghengio(){
        return View('frontend.pages.giaohanghengio');
    }

    public function dieukhoan(){
        return View('frontend.pages.dieukhoan');
    }
    public function login(Request $request){

    }

}

