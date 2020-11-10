<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class SevenInchController extends Controller{

    private $client;
    private $helper;
    private $api_search = 'v1/search-from-es?q=';
    public function __construct(){
        $this->client = new Client();
        $this->helper = new Helpers();
    }
    public function show_page_choose_option() {
        return view('7inch.pages.choose_option');
    }
    public function show_page_create_order() {
        return view('7inch.pages.create_order');
    }
    public function show_page_search_order(){
        return view('7inch.pages.search_order');
    }
    public function show_page_result_order(){
        return view('7inch.pages.result_order');
    }
    public function show_page_pay_order(){
        return view('7inch.pages.pay');
    }
    public function result(Request $request){
        $response = $this->client->request('GET', env('API_URL_SEARCH').$this->api_search.$request->q);
        $data = [];
        if($response->getStatusCode() == 200 ){
            $result = json_decode($response->getBody()->getContents(),true);
            if($result['success'] == true){
                $data['orders'] = $result;
//                dd($data);
                if ($data['orders']['data'][0]['found'] == false){
                    return view('7inch.pages.result_order', $data);
                }
            }
        }else {
            return \redirect()->back();
        }

//        $data = $this->paginate($data['orders']['data']);
        return view('7inch.pages.result_order', ['data'=>$data]);
    }

//    public function paginate($items, $perPage = 1, $page = null, $options = [])
//    {
//        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
//        $items = $items instanceof Collection ? $items : Collection::make($items);
//        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
//    }
 }
