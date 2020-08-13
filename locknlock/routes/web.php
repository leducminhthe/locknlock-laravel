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

Route::get('/', function () {
    return view('welcome');
});

//admin
Route::get("/login", "AdminController@login");
Route::get("/dashboard", "AdminController@show_dashbroad");
Route::post("/admin-dashboard", "AdminController@dashboard");
Route::get('logout','AdminController@logout');

//Category
Route::get('add-category', 'CategoryController@add_category');
Route::get('list-category-1', 'CategoryController@list_category_1');
Route::post('save-category-1', 'CategoryController@save_category_1');
Route::get('edit-category-1/{category1_id}', 'CategoryController@edit_category_1');
Route::post('update-category-1/{category1_id}', 'CategoryController@update_category_1');
Route::get('delete-category-1/{category1_id}', 'CategoryController@delete_category_1');

//Category_2
Route::get('add-category-2', 'CategoryController_2@add_category_2');
Route::post('save-category-2', 'CategoryController_2@save_category_2');
Route::get('list-category-2', 'CategoryController_2@list_category_2');
Route::get('edit-category-2/{category2_id}', 'CategoryController_2@edit_category_2');
Route::post('update-category-2/{category2_id}', 'CategoryController_2@update_category_2');
Route::get('delete-category-2/{category2_id}', 'CategoryController_2@delete_category_2');

//Product
Route::get('add-product', 'ProductController@add_product');
Route::post('save-product', 'ProductController@save_product');
Route::get('list-product', 'ProductController@list_product');
Route::get('edit-product/{product_id}', 'ProductController@edit_product');
Route::post('update-product/{product_id}', 'ProductController@update_product');
//end admin

Route::get('layout', 'HomeController@home');


