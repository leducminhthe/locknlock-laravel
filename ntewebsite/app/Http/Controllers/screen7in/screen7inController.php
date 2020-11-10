<?php

namespace App\Http\Controllers\screen7in;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class screen7inController extends Controller
{
    protected $helper;
    public function __construct(Helpers $helper){
        $this->helper = $helper;
    }

    public function tao_don_1($id){
    	return view('7inch.pages.taodon_step1',['id'=>$id]);
    }
    public function tao_don_2(){
    	return view('7inch.pages.taodon_step2');
    }
    public function tao_don_3(){
    	return view('7inch.pages.taodon_step3');
    }
    public function tao_don_hoantat(){
    	return view('7inch.pages.taodon_hoantat');
    }
    public function thanhtoan(){
        return view('7inch.pages.thanhtoan');
    }
    public function thanhtoan_nganhang(){
        return view('7inch.pages.thanhtoan_thenganhang');
    }
    public function nhap_the(){
        return view('7inch.pages.nhapthe');
    }
    public function hoan_thanh(){
        return view('7inch.pages.pay');
    }

    // post submit

    public function tao_don_1_post(Request $req, $id){
        $data['step2'] = [];
        $data['step2']['s_name'] =  $req->s_name;
        $data['step2']['s_phone'] =  $req->s_phone;
        $data['step2']['s_address'] =  $req->s_address;
        $data['step2']['chon_tinh_noigui'] =  $req->chon_tinh_noigui;
        $data['step2']['chon_quan_noigui'] =  $req->chon_quan_noigui;
        $data['step2']['chon_phuong_noigui'] =  $req->chon_phuong_noigui;
        // id tinh quan phuong
        $data['step2']['s_province_id'] =  $req->s_province_id;
        $data['step2']['s_district_id'] =  $req->s_district_id;
        $data['step2']['s_ward_id'] =  $req->s_ward_id;
        $data['step2']['ngay_giao_noigui'] =  $req->ngay_giao_noigui;
        $data['step2']['gio_giao_noigui'] =  $req->gio_giao_noigui;
        $data['step2']['phut_giao_noigui'] =  $req->phut_giao_noigui;
        return View('7inch.pages.taodon_step2',['data'=>$data],['id'=>$id]);
    }

    public function tao_don_2_post(Request $req, $id){
        $data['step2'] = [];
        $data['step2']['s_name'] =  $req->s_name;
        $data['step2']['s_phone'] =  $req->s_phone;
        $data['step2']['s_address'] =  $req->s_address;
        $data['step2']['chon_tinh_noigui'] =  $req->chon_tinh_noigui;
        $data['step2']['chon_quan_noigui'] =  $req->chon_quan_noigui;
        $data['step2']['chon_phuong_noigui'] =  $req->chon_phuong_noigui;
        $data['step2']['ngay_giao_noigui'] =  $req->ngay_giao_noigui;
        $data['step2']['gio_giao_noigui'] =  $req->gio_giao_noigui;
        $data['step2']['phut_giao_noigui'] =  $req->phut_giao_noigui;
        // id tinh quan phuong
        $data['step2']['s_province_id'] =  $req->s_province_id;
        $data['step2']['s_district_id'] =  $req->s_district_id;
        $data['step2']['s_ward_id'] =  $req->s_ward_id;
        // step 3
        $data['step3'] = [];
        $data['step3']['r_phone'] =  $req->r_phone;
        $data['step3']['r_name'] =  $req->r_name;
        $data['step3']['r_address'] =  $req->r_address;
        $data['step3']['chon_tinh_noinhan'] =  $req->chon_tinh_noinhan;
        $data['step3']['chon_quan_noinhan'] =  $req->chon_quan_noinhan;
        $data['step3']['chon_phuong_noinhan'] =  $req->chon_phuong_noinhan;
        // id tinh quan huyện step3
        $data['step3']['r_province_id'] =  $req->r_province_id;
        $data['step3']['r_district_id'] =  $req->r_district_id;
        $data['step3']['r_ward_id'] =  $req->r_ward_id;
        return View('7inch.pages.taodon_step3',['data'=>$data],['id'=>$id]);
    }

    public function tao_don_3_post(Request $req, $id, $conditions){
        $data['main_fee'] = $req->main_fee;
        $data['cod_fee'] = $req->cod_fee;
        $data['expected_at'] = $req->expected_at;

        $data['step1'] = [];
        $data['step1']['service_id'] =  $req->service_id;
        $data['step1']['dichvu'] =  $req->dichvu;
        $data['step1']['amount'] =  $req->amount;
        $data['step1']['weight'] =  $req->weight;
        $data['step1']['cargo_content_id'] =  $req->cargo_content_id;
        $data['step1']['cargo_content'] =  $req->cargo_content;
        $data['step1']['input_amt'] =  $req->input_amt;

        $data['step2'] = [];
        $data['step2']['s_phone'] =  $req->s_phone;
        $data['step2']['s_name'] =  $req->s_name;
        $data['step2']['s_address'] =  $req->s_address;
        $data['step2']['chon_tinh_noigui'] =  $req->chon_tinh_noigui;
        $data['step2']['chon_quan_noigui'] =  $req->chon_quan_noigui;
        $data['step2']['chon_phuong_noigui'] =  $req->chon_phuong_noigui;

        $data['step2']['ngay_giao_noigui'] =  $req->ngay_giao_noigui;
        $data['step2']['gio_giao_noigui'] =  $req->gio_giao_noigui;
        $data['step2']['phut_giao_noigui'] =  $req->phut_giao_noigui;
        // id tinh quan phuong
        $data['step2']['s_province_id'] =  $req->s_province_id;
        $data['step2']['s_district_id'] =  $req->s_district_id;
        $data['step2']['s_ward_id'] =  $req->s_ward_id;

        $data['step3'] = [];
        $data['step3']['r_phone'] =  $req->r_phone;
        $data['step3']['r_name'] =  $req->r_name;
        $data['step3']['r_address'] =  $req->r_address;
        $data['step3']['chon_tinh_noinhan'] =  $req->chon_tinh_noinhan;
        $data['step3']['chon_quan_noinhan'] =  $req->chon_quan_noinhan;
        $data['step3']['chon_phuong_noinhan'] =  $req->chon_phuong_noinhan;
        // id tinh quan huyện step3
        $data['step3']['r_province_id'] =  $req->r_province_id;
        $data['step3']['r_district_id'] =  $req->r_district_id;
        $data['step3']['r_ward_id'] =  $req->r_ward_id;
        // dd($data);
        if ($conditions === 'nganhang') {
            return view('7inch.pages.thanhtoan_thenganhang',['data'=>$data],['id'=>$id]);
        } elseif ($conditions === 'thanhtoan') {
            return view('7inch.pages.thanhtoan',['data'=>$data],['id'=>$id]);
        } elseif ($conditions === 'nhapthe') {
            return view('7inch.pages.nhapthe')->with(compact('data','id','conditions'));
        } elseif ($conditions === 'nhaptenthe') {
            return view('7inch.pages.nhapthe')->with(compact('data','id','conditions'));
        } else {
            $params=[
                "weight"=> $req->weight,
                "package_no"=> $req->package_no,
                "service_id"=> $req->dichvu,
                "payment_method"=> $req->payment_method_id,
                "sender_province_id"=> $req->s_province_id,
                "sender_district_id"=> $req->s_district_id,
                "receiver_province_id"=> $req->r_province_id,
                "receiver_district_id"=> $req->r_district_id,
                "cod_amt"=> $req->input_amt,
            ];
            // dd($params);
            $result = $this->helper->call_ntl_api_ntx('v1/calc-feeService', $params, 'POST');
            $result = json_decode($result, true);
            // dd($result);
            return View('7inch.pages.taodon_hoantat')->with(compact('data','id','result'));
        }
    }
    // end post submit

    // back step
    public function back_step(Request $req, $id, $step){
        $data['flag'] = $req->flag;
        $data['main_fee'] = $req->main_fee;
        $data['cod_fee'] = $req->cod_fee;
        $data['expected_at'] = $req->expected_at;

        $data['step1'] = [];
        $data['step1']['dichvu'] =  $req->dichvu;
        $data['step1']['service_id'] =  $req->service_id;
        $data['step1']['amount'] =  $req->amount;
        $data['step1']['weight'] =  $req->weight;
        $data['step1']['cargo_content_id'] =  $req->cargo_content_id;
        $data['step1']['cargo_content'] =  $req->cargo_content;

        $data['step2'] = [];
        $data['step2']['s_name'] =  $req->s_name;
        $data['step2']['s_phone'] =  $req->s_phone;
        $data['step2']['s_address'] =  $req->s_address;
        $data['step2']['chon_tinh_noigui'] =  $req->chon_tinh_noigui;
        $data['step2']['chon_quan_noigui'] =  $req->chon_quan_noigui;
        $data['step2']['chon_phuong_noigui'] =  $req->chon_phuong_noigui;
        $data['step2']['ngay_giao_noigui'] =  $req->ngay_giao_noigui;
        $data['step2']['gio_giao_noigui'] =  $req->gio_giao_noigui;
        $data['step2']['phut_giao_noigui'] =  $req->phut_giao_noigui;
        // id tinh quan phuong
        $data['step2']['s_province_id'] =  $req->s_province_id;
        $data['step2']['s_district_id'] =  $req->s_district_id;
        $data['step2']['s_ward_id'] =  $req->s_ward_id;

        $data['step3'] = [];
        $data['step3']['r_phone'] =  $req->r_phone;
        $data['step3']['r_name'] =  $req->r_name;
        $data['step3']['r_address'] =  $req->r_address;
        $data['step3']['chon_tinh_noinhan'] =  $req->chon_tinh_noinhan;
        $data['step3']['chon_quan_noinhan'] =  $req->chon_quan_noinhan;
        $data['step3']['chon_phuong_noinhan'] =  $req->chon_phuong_noinhan;
        // id tỉnh quận huyện step3
        $data['step3']['r_province_id'] =  $req->r_province_id;
        $data['step3']['r_district_id'] =  $req->r_district_id;
        $data['step3']['r_ward_id'] =  $req->r_ward_id;
        if ($step == 1) {
            return view('7inch.pages.taodon_step1',['data'=>$data],['id'=>$id]);
        } elseif ($step == 2) {
            return view('7inch.pages.taodon_step2',['data'=>$data],['id'=>$id]);
        } elseif ($step == 'hoantat') {
            return View('7inch.pages.taodon_hoantat')->with(compact('data','id'));
        } else {
            return view('7inch.pages.taodon_step3',['data'=>$data],['id'=>$id]);
        }
    }

    //Ktra B2,B3
    public function check_Step1(Request $request){
        $validation = Validator::make($request->all(),[
            's_phone' => ['required','regex:/(09|03|07|08|05)+([0-9]{8})/','max:11'],
            's_name' => ['required','regex:/[a-zA-Z]/'],
            's_address' => 'required',
            'chon_tinh_noigui' => 'required',
            'chon_quan_noigui' => 'required',
            'chon_phuong_noigui' => 'required',
        ],[
            's_phone.regex' => 'Số điện thoại không đúng định dạng',
            's_phone.max' => 'Số điện thoại không đúng định dạng',
            's_phone.required' => 'Số điện thoại không được rỗng',
            's_phone.min' => 'Số điện thoại cần 10 số',
            's_name.required' => 'Hãy nhập tên',
            's_name.regex' => 'Hãy nhập đúng tên',
            's_address.required' => 'Hãy nhập địa chỉ',
            'chon_tinh_noigui.required' => 'Hãy chọn Tỉnh',
            'chon_quan_noigui.required' => 'Hãy chọn Quận/Huyện',
            'chon_phuong_noigui.required' => 'Hãy chọn Phường/Xã',
        ]);
        if ($validation->passes()){
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

    public function check_Step2(Request $request){
        $validation = Validator::make($request->all(),[
            'r_phone' => ['required','regex:/(09|03|07|08|05)+([0-9]{8})/','max:11'],
            'r_name' => ['required','regex:/[a-zA-Z]/'],
            'r_address' => 'required',
            'chon_tinh_noinhan' => 'required',
            'chon_quan_noinhan' => 'required',
            'chon_phuong_noinhan' => 'required',
        ],[
            'r_phone.regex' => 'Số điện thoại không đúng định dạng',
            'r_phone.max' => 'Số điện thoại không đúng định dạng',
            'r_phone.required' => 'Số điện thoại không được rỗng',
            'r_phone.min' => 'Số điện thoại cần 10 số',
            'r_name.required' => 'Hãy nhập tên',
            'r_name.regex' => 'Hãy nhập đúng tên',
            'r_address.required' => 'Hãy nhập địa chỉ',
            'chon_tinh_noinhan.required' => 'Hãy chọn Tỉnh',
            'chon_quan_noinhan.required' => 'Hãy chọn Quận/Huyện',
            'chon_phuong_noinhan.required' => 'Hãy chọn Phường/Xã',
        ]);
        if ($validation->passes()){
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
    public function check_Step3(Request $request){
        $validation = Validator::make($request->all(),[
            'cargo_content' => 'regex:/[a-zA-Z0-9]/',
        ],[
            'cargo_content.regex' => 'Vui lòng nhập đúng',

        ]);
        if ($validation->passes()){
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
    //kết thúc Ktra B2,B3

    // tạo dơn
    public function tao_don_thanhcong(Request $request){
        try {
            // $params = $request->all();
            $params = [
                "user_id" => $request->user_id,
                "cod_amount" => $request->amount, 
                "payment_method_id" => $request->payment_method_id,
                "main_fee" => $request->main_fee,
                "cod_fee" => $request->cod_fee,
                "package_no" => $request->package_no,
                "weight" => $request->weight,
                "service_id" => $request->dichvu,
                "cargo_content_id" => $request->hanghoa,
                "cargo_content" => $request->cargo_content,
                "note" => $request->note,
                "s_name" => $request->s_name,
                "s_phone" => $request->s_phone,
                "s_address" => $request->s_address,
                "s_post_area" => $request->s_post_area,
                "s_province_id" => $request->s_province_id,
                "s_district_id" => $request->s_district_id,
                "s_ward_id" => $request->s_ward_id,
                "r_name" => $request->r_name,
                "r_phone" => $request->r_phone,
                "r_address" => $request->r_address,
                "r_province_id" => $request->r_province_id,
                "r_district_id" => $request->r_district_id,
                "r_ward_id" => $request->r_ward_id,
                "transport_by_id"=> $request->transport_by_id,
                "utm_source" => $request->utm_source,
                "queue_name" => $request->queue_name,
                "s_desired_at" => $request->s_desired_at,
                "expected_at" => $request->expected_at,
            ];
            // dd($params);

            $result = $this->helper->call_ntl_api_ntx('v1/push-RMQBill', $params, 'POST');
            $result = json_decode($result, true);
            return view('7inch.pages.pay')->with(compact('result','params'));

        } catch (Exception $e) {
            return [
                'success' => false,
                'data' => [],
                'message' => $e->getMessage() . " - Line:" . $e->getLine()
            ];
        }
    }
}

