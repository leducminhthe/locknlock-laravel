<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helpers;
use Mockery\Exception;

class CommonController extends Controller
{
    protected $helper;

    public function __construct(Helpers $helper)
    {
        $this->helper = $helper;
    }
    // kiểm tra khu vực
    public function checkArea(Request $request)
    {
        try {
            $params = $request->all();
            $result = $this->helper->call_ntl_api_ntx('v1/check-supportArea', $params, 'POST');
            $result = json_decode($result, true);

            return $result;
        } catch (Exception $e) {
            return [
                'success' => false,
                'data' => [],
                'message' => $e->getMessage() . " - Line:" . $e->getLine()
            ];
        }
    }

    public function getDistrict(Request $request)
    {
        try {
            $params = $request->all();

            $result = $this->helper->call_ntl_api('v1/district', $params, 'GET');
            $result = json_decode($result, true);

            return $result;
        } catch (Exception $e) {
            return [
                'success' => false,
                'data' => [],
                'message' => $e->getMessage() . " - Line:" . $e->getLine()
            ];
        }
    }

    public function getWard(Request $request)
    {
        try {
            $params = $request->all();

            $result = $this->helper->call_ntl_api('v1/ward', $params, 'GET');
            $result = json_decode($result, true);

            return $result;
        } catch (Exception $e) {
            return [
                'success' => false,
                'data' => [],
                'message' => $e->getMessage() . " - Line:" . $e->getLine()
            ];
        }
    }

    public function getResults(Request $request)
    {
        try {
            $params = $request->all();

            $result = $this->helper->call_ntl_api('v1/search-from-es?q=', $params, 'POST');
            $result = json_encode($result, true);

            return $result;
        } catch (Exception $e) {
            return [
                'success' => false,
                'data' => [],
                'message' => 'Message: ' . $e->getMessage() . ' -Line:' . $e->getLine()
            ];
        }
    }
}
