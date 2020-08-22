<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/login", "AdminController@login");
Route::post("/admin-dashboard", "AdminController@dashboard");
Route::get('/logout','AdminController@logout');

//admin
Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'],function(){

	Route::get("/dashboard", "AdminController@show_dashbroad");

	Route::group(['prefix'=>'category1'],function(){
		//admin/category1/...
		Route::get('add-category', 'CategoryController@add_category');
		Route::get('list-category-1', 'CategoryController@list_category_1');
		Route::post('save-category-1', 'CategoryController@save_category_1');
		Route::get('edit-category-1/{category1_id}', 'CategoryController@edit_category_1');
		Route::post('update-category-1/{category1_id}', 'CategoryController@update_category_1');
		Route::get('delete-category-1/{category1_id}', 'CategoryController@delete_category_1');
	});

	Route::group(['prefix'=>'category2'],function(){
		//admin/category2/...
		Route::get('add-category-2', 'CategoryController_2@add_category_2');
		Route::post('save-category-2', 'CategoryController_2@save_category_2');
		Route::get('list-category-2', 'CategoryController_2@list_category_2');
		Route::get('edit-category-2/{category2_id}', 'CategoryController_2@edit_category_2');
		Route::post('update-category-2/{category2_id}', 'CategoryController_2@update_category_2');
		Route::get('delete-category-2/{category2_id}', 'CategoryController_2@delete_category_2');
	});

	Route::group(['prefix'=>'product'],function(){
		//admin/product/...
		Route::get('add-product', 'ProductController@add_product');
		Route::post('save-product', 'ProductController@save_product');
		Route::get('list-product', 'ProductController@list_product');
		Route::get('edit-product/{product_id}', 'ProductController@edit_product');
		Route::post('update-product/{product_id}', 'ProductController@update_product');
		Route::get('delete-product/{product_id}', 'ProductController@delete_product');
	});

	Route::group(['prefix' => 'ajax'], function(){
		Route::get('cat2/{cat2_id}','AjaxController@get_cat2');
	});

	Route::group(['prefix'=>'users'], function(){
		Route::get('add-users', 'UsersController@add_users');
		Route::post('save-users', 'UsersController@save_users');
		Route::get('list-users', 'UsersController@list_users');
		Route::get('edit-users/{admin_id}', 'UsersController@edit_users');
		Route::post('update-users/{admin_id}', 'UsersController@update_users');
		Route::get('delete-users/{admin_id}', 'UsersController@delete_users');
	});
});
//end admin

//LocknLock
Route::get('locknlock', 'HomeController@home');
Route::get('details-sp/{id_product}', 'HomeController@details');
Route::get('category-1/{id}', 'HomeController@category_1');
Route::get('category-2/{id_cate2}', 'HomeController@category_2');

//shopping cart
Route::post('shoppingcart', 'shoppingcartController@shoppingcart');
Route::get('show-cart', 'shoppingcartController@show_cart');
Route::get('delete-cart/{rowId}', 'shoppingcartController@delete_cart');
Route::post('update-cart/{rowId}', 'shoppingcartController@update_cart');
Route::get('delete-cart-all', 'shoppingcartController@delete_all');

//checkout
Route::get('checkout', 'shoppingcartController@checkout');
Route::post('buy', 'shoppingcartController@buy');

//login 
Route::get('login-user', 'HomeController@login_user');
Route::post('login-user', 'HomeController@login_user_post');

//search
Route::post('search', 'HomeController@search_post');
Route::get('search', 'HomeController@search_post');
Auth::routes();

