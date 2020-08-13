<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\adminModel;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function login(){
    	return view("admin.login");
    }

    public function show_dashbroad(){
    	return view('admin.dashboard');
    }

    public function logout(){
        Session::put('message',null);
        return Redirect::to('login');
    }

    public function dashboard(Request $req){
    	$admin_email = $req->email;
    	$admin_password = md5($req->password);
    	$result = adminModel::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
    	if ($result) {
    		return Redirect::to('dashboard');
    	} else {
    		Session::put('message','Pass or Email wrong');
    		return Redirect::to('login');
    	}
    }
}
