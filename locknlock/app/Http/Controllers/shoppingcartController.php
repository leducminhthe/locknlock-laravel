<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\category_1;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();

class shoppingcartController extends Controller
{
    public function shoppingcart(Request $req){

        Cart::add([
        	'id' => $req->spId, 
        	'name' => $req->TenSP, 
        	'qty' => $req->quantity, 
        	'price' => $req->Price, 
        	'weight' => 550, 
        	'options' => ['image' => $req->AnhSP,'masp' => $req->masp],
        ]);

        return Redirect::to('show-cart');
    }

    public function show_cart(){
    	$menus = category_1::all();
    	return view('locknlock.shoppingcart')->with(compact('menus'));
    }

    public function delete_cart($rowId){
    	Cart::remove($rowId);
    	return Redirect::to('show-cart');
    }

    public function update_cart(Request $req, $rowId){
    	$qty = $req->quantity;
    	Cart::update($rowId,$qty);
    	return Redirect::to('show-cart');
    }

    public function delete_all(){
    	Cart::destroy();
    	return Redirect::to('show-cart');
    }

    public function checkout(){
        $menus = category_1::all();
        return view('locknlock.checkout')->with(compact('menus'));
    }

    public function buy(Request $req){
        $contents = Cart::content();
        $subtotal = Cart::subtotal();
        $data = [];
        foreach ($contents as $value) {
            $data['Name'] = $req->name;
            $data['Address'] = $req->address;
            $data['Email'] = $req->email;
            $data['Phone'] = $req->phone;
            $data['Message'] = $req->message;
            $data['Grandtotal'] = $subtotal;
            $data['TenSP'] = $value->name;
            $data['MaSP'] = $masp = $value->options->masp;
            $data['SL'] = $value->qty;
            $data['Subtotal'] = $subtotal;
            $data['Phuongthuc'] = $req->pay;
            DB::table('donhang')->insert($data);
        }

        $menus = category_1::all();
        Session::put('message','buy success');
        return Redirect::to('delete-cart-all');
    }
}
