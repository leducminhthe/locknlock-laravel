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

Route::get('/', ['uses' => 'Frontend\HomeController@index']);
Route::get('/trangchu', ['uses' => 'Frontend\HomeController@index']);
Route::get('/gioi-thieu', ['uses' => 'Frontend\HomeController@gioithieu']);
Route::get('giao-hang-chuan', ['uses' => 'Frontend\HomeController@giaohangchuan']);
Route::get('giao-hang-nhanh', ['uses' => 'Frontend\HomeController@giaohangnhanh']);
Route::get('giao-hang-hen-gio', ['uses' => 'Frontend\HomeController@giaohanghengio']);
Route::get('dieu-khoan', ['uses' => 'Frontend\HomeController@dieukhoan']);

//vận đơn
Route::get('tao-van-don', ['uses' => 'Frontend\OrderController@order']);
Route::get('tao-van-don-step-1/{loai}', ['uses' => 'Frontend\OrderController@order_B1']);
Route::get('tao-van-don-step-2', ['uses' => 'Frontend\OrderController@order_B2']);
Route::get('tao-van-don-step-3', ['uses' => 'Frontend\OrderController@order_B3']);
Route::get('thanh-toan-van-don', ['uses' => 'Frontend\OrderController@thanh_toan']);

//submit form
Route::post('tao-van-don-step-1/{loai}', ['uses' => 'Frontend\OrderController@step_post']);
Route::post('tao-van-don-step-2/{loai}', ['uses' => 'Frontend\OrderController@step_1_post']);
Route::post('tao-van-don-step-3/{loai}', ['uses' => 'Frontend\OrderController@step_2_post'])->name('step3');
Route::post('thanh-cong/{loai}', ['uses' => 'Frontend\OrderController@step_3_post']);
Route::post('thanh-toan-van-don/{loai}', ['uses' => 'Frontend\OrderController@thanh_toan_post']);
Route::post('cam-on', ['uses' => 'Frontend\OrderController@tao_don']);

//ktra
Route::post('check-step-1','Frontend\OrderController@checkStep1')->name('check_step1');
Route::post('check-step-2','Frontend\OrderController@checkStep2')->name('check_step2');
Route::post('check-step-3','Frontend\OrderController@checkStep3')->name('check_step3');

//Quay lại
Route::post('quaylai-tao-van-don/{loai}/{step}', ['uses' => 'Frontend\OrderController@back_step']);

Route::get('paginate', 'PaginationController@index');

Route::get('/dang-nhap', 'PageController@show_page_login')->name('client.login');
Route::get('/gui-mail', 'PageController@mail_apply')->name('client.send_mail');
Route::post('/kiem-tra-dang-nhap','PageController@login_ajax')->name('client.check_login');
Route::post('/thay-doi-mat-khau','PageController@change_password_ajax')->name('client.change_pass');
Route::post('/kiem-tra-dang-ky','PageController@register_ajax')->name('client.check_register');
Route::get('/dang-ky', 'PageController@show_page_register')->name('client.register');
Route::get('/otp', 'PageController@show_page_otp')->name('client.otp');
Route::get('/dang-ky-email', 'PageController@register_email')->name('client.register_email');
Route::get('/thong-tin-tai-khoan', 'PageController@show_page_info_account')->name('client.info_account');
Route::get('/tra-cuu', 'PageController@result')->name('client.result');
Route::get('/tra-cuu-van-don', 'PageController@show_page_search_order')->name('client.search_order');
Route::get('/cau-hoi-thuong-gap', 'PageController@show_page_question')->name('client.questions');
Route::get('/chinh-sach-bao-mat', 'PageController@show_page_security')->name('client.security');
Route::get('/van-don-chi-tiet/{id}', 'PageController@show_page_order_detail')->name('client.order_detail');
Route::get('/cam-on', 'PageController@show_page_thank_you')->name('client.thank_you');
Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'PageController@changeLanguage')
        ->name('user.change-language');
});

Route::group(['prefix' => '7-inch'], function () {
    Route::get('chon-chuc-nang', 'SevenInchController@show_page_choose_option')->name('seven.choose_option');
    Route::get('chon-tao-don', 'SevenInchController@show_page_create_order')->name('seven.choose_create_order');
    Route::get('tra-cuu-van-don', 'SevenInchController@show_page_search_order')->name('seven.search_order');
    Route::get('tra-cuu', 'SevenInchController@result')->name('seven.search_result');
    Route::get('ket-qua-tra-cuu', 'SevenInchController@show_page_result_order')->name('seven.result_order');
    Route::get('thanh-toan', 'SevenInchController@show_page_pay_order')->name('seven.pay_order');
    Route::get('chon-chuc-nang', function ()    {
        return view('7inch.pages.choose_option');
    });
    //tạo đơn 7in
    Route::get('tao-don-1/{loai}', 'screen7in\screen7inController@tao_don_1');
    Route::get('tao-don-2', 'screen7in\screen7inController@tao_don_2');
    Route::get('tao-don-3', 'screen7in\screen7inController@tao_don_3');
    Route::get('tao-don-hoantat', 'screen7in\screen7inController@tao_don_hoantat');
    Route::get('thanhtoan', 'screen7in\screen7inController@thanhtoan');
    Route::get('thanhtoan_nganhang', 'screen7in\screen7inController@thanhtoan_nganhang');
    Route::get('nhap-the', 'screen7in\screen7inController@nhap_the');
    Route::get('hoan-thanh', 'screen7in\screen7inController@hoan_thanh');

//submit post tạo đơn 7in
    Route::post('tao-don-2/{loai}', 'screen7in\screen7inController@tao_don_1_post');
    Route::post('tao-don-3/{loai}', 'screen7in\screen7inController@tao_don_2_post');
    Route::post('tao-don-hoantat/{loai}/{hinhthuc}', 'screen7in\screen7inController@tao_don_3_post');
    Route::post('tao-don-thanhcong', 'screen7in\screen7inController@tao_don_thanhcong');

//quay lại step cũ 7in
    Route::post('quay-lai/{loai}/{step}', 'screen7in\screen7inController@back_step');

//check validate tạo đơn 7in
    Route::post('check-tao-don-step-1','screen7in\screen7inController@check_Step1')->name('validate_step1');
    Route::post('check-tao-don-step-2','screen7in\screen7inController@check_Step2')->name('validate_step2');
    Route::post('check-tao-don-step-3','screen7in\screen7inController@check_Step3')->name('validate_step3');
});

//Giá trị cốt lõi
Route::get('/trach-nhiem', ['uses' => 'Frontend\HomeController@trachnhiem']);
Route::get('/trung-thuc', ['uses' => 'Frontend\HomeController@trungthuc']);
Route::get('/chien-dau', ['uses' => 'Frontend\HomeController@chiendau']);

//Nhân sự
Route::get('/nhan-su-chung-toi',['uses' => 'Frontend\HomeController@nhansu']);
Route::get('/nhan-su-chung-toi/{any}',['uses' => 'Frontend\HomeController@info_member']);

//Chính sách
Route::get('/quy-dinh-va-chinh-sach',['uses'=>'Frontend\HomeController@policy']);