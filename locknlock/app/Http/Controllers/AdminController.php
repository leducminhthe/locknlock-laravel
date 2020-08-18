<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;
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

        if (Auth::attempt(['email'=>$req->email, 'password'=>$req->password])) {
            return Redirect::to('admin/dashboard');
        }else{
            Session::put('message','Pass or Email wrong');
            return Redirect::to('login');
        }
    }
}
