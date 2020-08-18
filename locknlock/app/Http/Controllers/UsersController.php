<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use Illuminate\Support\Facades\Redirect;
session_start();

class UsersController extends Controller
{
    public function add_users(){
    	return view('admin.Users.add_users');
    }

    public function save_users(Request $req){
    	
    	$this->validate($req, [
    		'username' => 'required|min:3',
    		'email' => 'required|email|unique:tbl_admin,admin_email',
    		'phone' => 'required|min:3|max:32',
    		'password' => 'required|min:3|max:32',
    	],[
    		'name.required' => 'Please enter user',
    		'name.min' => 'User at least 3 characters',
    		'email.required' => 'Please enter your email',
    		'email.unique' => 'Email issets',
    		'phone.required' => 'Please enter your phone',
    		'phone.min' => 'Phone at least 3 characters',
    		'phone.max' => 'Phone at maximum 32 characters',
    		'password.required' => 'Please enter your password',
    		'password.min' => 'Password at least 3 characters',
    		'password.max' => 'Password at maximum 32 characters',
    	]);
        $users = [];
    	$users['name'] = $req->username;
    	$users['email'] = $req->email;
    	$users['password'] = bcrypt($req->password);
    	$users['phone'] = $req->phone;
    	$users['level'] = $req->select_level;

        DB::table('users')->insert($users);

    	Session::put('message', 'Add users success');
    	return Redirect::to('admin/users/add-users');
    }

    public function list_users(){
        $users = User::all();
        return view('admin.Users.list_users')->with(compact('users'));
    }

    public function edit_users($admin_id){
        $users = User::where('id',$admin_id)->get();
        return view('admin.Users.edit_users')->with(compact('users'));
    }

    public function update_users(Request $req, $admin_id){
    	$users = [];
    	$users['name'] = $req->username;
    	$users['phone'] = $req->phone;
    	$users['level'] = $req->select_level;

    	if ( $req->changepass == "on" ) {
    		$users['password'] = bcrypt($req->password);
    	}

    	DB::table('users')->where('id',$admin_id)->update($users);
        Session::put('message', 'Update user success');
        return Redirect::to('admin/users/list-users');
    }

    public function delete_users($admin_id){
        $users = User::where('id',$admin_id)->delete();
        Session::put('message', 'Delete users success');
        return Redirect::to('admin/users/list-users');
    }
}
