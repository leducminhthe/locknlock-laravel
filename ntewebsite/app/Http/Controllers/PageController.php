<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use Session;
use DateTime;
use Illuminate\Support\Facades\Validator;


class PageController extends Controller{
    private $client;
    private $helper;
    private $api_search = 'v1/search-from-es?q=';
    public function __construct(){
        $this->client = new Client();
        $this->helper = new Helpers();

    }
    public function login_ajax(Request $request){

        $validation = Validator::make($request->all(),[
            'phone_number' => 'required|regex:/[0-9]{10}/',
//            'password' => 'required|min:8',
        ],[
            'phone_number.required' => 'Số điện thoại không được rỗng',
            'phone_number.regex' => 'Số điện thoại không đúng định dạng',
            'password.required' => 'Mật khẩu không được rỗng',
//            'password.min' => 'Mật khẩu tối thiểu 8 ký tự',
        ]);
        if ($validation->passes()){
            $params = [
                'username' => $request->phone_number,
                'password' => $request->password
            ];
            try {
                $result = $this->helper->call_ntl_api('v1/sign-inPhone', $params, 'POST');
                $result = json_decode($result, true);
                if( $result['success'] == true){
                    return response()->json([
                        'message' => 'Đăng nhập thành công',
                        'status' => 200
                    ]);
                }else {
                    return response()->json([
                        'message' => 'Đăng nhập thất bại',
                        'status' => 419
                    ]);
                }
            } catch (Exception $e) {
                return [
                    'success' => false,
                    'data' => [],
                    'message' => $e->getMessage() . " - Line:" . $e->getLine()
                ];
            }
            return response()->json([
                'message' => 'Successful',
                'status' => '200',
            ]);
        }else{
            $error = $validation->errors();
            return response()->json([
                'message' => $error,
                'status' => '201',
            ]);
        }
    }
    public function register_ajax(Request $request){
        $validation = Validator::make($request->all(),[
            'phone_number' => 'required|regex:/[0-9]{10}/',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ],[
            'phone_number.required' => 'Số điện thoại không được rỗng',
            'phone_number.regex' => 'Số điện thoại không đúng định dạng',
            'password.required' => 'Mật khẩu không được trống',
            'password.min' => 'Mật khẩu tối thiểu 8 ký tự',
            'confirm_password.same' => 'Không trùng khớp mật khẩu',
            'confirm_password.required' => 'Mật khẩu không được trống',
        ]);
        if( $validation->passes()){
            return response()->json([
                'message' => 'Successful',
                'status' => '200',
            ]);
        }else {
            $error = $validation->errors();
            return response()->json([
                'message' => $error,
                'status' => '201',
            ]);
        }
    }
    public function change_password_ajax(Request $request){
        $validation = Validator::make($request->all(),[
            'old_pass' => 'required',
            'new_pass' => 'required|min:8',
            'confirm_pass' => 'required|same:new_pass'
        ],[
            'old_pass.required' => 'Mật khẩu không được rỗng',
            'new_pass.required' => 'Mật khẩu mới không được trống',
            'new_pass.min' => 'Mật khẩu tối thiểu 8 ký tự',
            'confirm_pass.same' => 'Không trùng khớp mật khẩu',
            'confirm_pass.required' => 'Mật khẩu không được trống',
        ]);
        if( $validation->passes()){

        }else {
            $error = $validation->errors();
            return response()->json([
                'message' => $error,
                'status' => '201',
            ]);
        }
    }
    public function show_page_login(){
        return view('frontend.pages.login');
    }

    public function register_email(Request $request) {
        $validation = Validator::make($request->all(),[
            'email' => 'required|email'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng'
        ]);
        if( $validation->passes()){
            try {
                $params = $request->all();
                $response = $this->helper->call_ntl_api_ntx('v1/send-email-footer', $params, 'POST');
                $response = json_decode($response,true);
                if ($response['success'] == true){
                    return response()->json([
                        'success' => true,
                        'messages' => 'Gửi mail thành công'
                    ]);
                }
                return response()->json([
                    'success' => false,
                    'messages' => $response['message']
                ]);
            } catch (\Exception $e){
                Log::error('Messages: '.$e->getMessage(). ' Line:'.$e->getLine());
            }
        }else {
            $error = $validation->errors();
            return response()->json([
                'messages' => $error,
                'status' => '201',
            ]);
        }
    }
    public function mail_apply(Request $request){

        $validation = Validator::make($request->all(),[
            'email' => 'required|email'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng'
        ]);
        if( $validation->passes()){
            try {
                $params = $request->all();
                $response = $this->helper->call_ntl_api('v1/web-send-email',$params,'POST');
                $response = json_decode($response,true);
                if ($response['success'] == true){
                    return response()->json([
                        'success' => true,
                        'messages' => 'Gửi mail thành công'
                    ]);
                }
                return response()->json([
                    'success' => false,
                    'messages' => $response['message']
                ]);
            } catch (\Exception $e){
                Log::error('Messages: '.$e->getMessage(). ' Line:'.$e->getLine());
            }
        }else {
            $error = $validation->errors();
            return response()->json([
                'messages' => $error,
                'status' => '201',
            ]);
        }
    }
    public function show_page_register(){
        return view('frontend.pages.register');
    }
    public function show_page_info_account(){
        return view('frontend.pages.info_account');
    }
    public function show_page_otp(){
        return view('frontend.pages.otp');
    }
    // Lấy vận đơn
    public function result(Request $request){
        try {
            $param = $request->all();
            $response = $this->helper->call_ntl_api_search('v1/search-from-es',$param,'GET');
            $result = json_decode($response, true);
            $data = [];
            if($result['success'] == true){
                $data['orders'] = $result['data'];
            }
            return view('frontend.pages.search_order', $data);

        }catch (\Exception $error){
            Log::error('Messages '.$error->getMessage(). ' Line'.$error->getLine());
        }
    }
    public function show_page_search_order(){
        return view('frontend.pages.search_order');
    }
    public function show_page_question(){
        return view('frontend.pages.questions');
    }
    public function show_page_security(){
        return view('frontend.pages.security');
    }
    public function show_page_order_detail( $id ){
        try {
            $url = env('API_URL_SEARCH').'v1/search-from-es?q=';
            $response = $this->client->request('GET', $url.$id);
            if($response->getStatusCode() == 200){
                $result = json_decode($response->getBody()->getContents(),true);
                $data['orders'] = $result;
            }else {
                return redirect()->back();
            }
            return view('frontend.pages.order_detail',$data);
        }catch (\Exception $e){
            Log::error('Messages '. $e->getMessage(). ' Line'. $e->getLine());
        }
    }
    public function show_page_thank_you(){
        return view('frontend.pages.thank_you');
    }
    public function changeLanguage( $language ) {
        \Session::put('lang', $language);
        return redirect()->back();
    }
}
