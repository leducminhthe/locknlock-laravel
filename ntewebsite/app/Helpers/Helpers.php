<?php

namespace App\Helpers;

use App\Libraries\Crypt\Crypt;
use PHPMailer\PHPMailer\PHPMailer;
use phpseclib\Crypt\RSA;

use Log;
use Excel;
use DB;

use App\Models\User;
use App\Models\Bill;
use App\Models\Partner;

use QrCode;

class Helpers
{

    public function __construct()
    {
    }

    public function genQrCode($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('GEN_QR_CODE') . $apiUrl;

        $headers = [
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return [
            'query_full' => $full_api,
            'response' => $result
        ];
    }

    public function countBill($type, $time, $bill_status_id, $partner_id)
    {
        if ($partner_id != null) {
            $childPartner = Partner::select('id')
                ->where('parent_partner_id', '=', $partner_id)
                ->get()->toArray();

            $listChildIds = [$partner_id];
            if (count($childPartner) > 0) {
                foreach ($childPartner as $child) {
                    $listChildIds[] = $child['id'];
                }
            }

            $partner_id = $listChildIds;
        }
        // echo "<pre>"; print_r($partner_id); die;

        if ($type == 1) { // year
            // $count_all = Bill::whereYear('created_at', $time)->count();
            if ($partner_id != null) {
                $count = Bill::where('bill_status_id', $bill_status_id)
                    ->whereIn('partner_id', $partner_id)
                    ->whereYear('created_at', $time)
                    ->count();
            } else {
                $count = Bill::where('bill_status_id', $bill_status_id)
                    ->whereYear('created_at', $time)
                    ->count();
            }
        }

        if ($type == 2) { // month
            $time = explode('-', $time);
            // $count_all = Bill::whereYear('created_at', $time['0'])
            //             ->whereMonth('created_at', $time['1'])
            //             ->count();

            if ($partner_id != null) {
                $count = Bill::where('bill_status_id', $bill_status_id)
                    ->whereIn('partner_id', $partner_id)
                    ->whereYear('created_at', $time['0'])
                    ->whereMonth('created_at', $time['1'])
                    ->count();
            } else {
                $count = Bill::where('bill_status_id', $bill_status_id)
                    ->whereYear('created_at', $time['0'])
                    ->whereMonth('created_at', $time['1'])
                    ->count();
            }
        }

        if ($type == 3) { // day
            $time = explode('-', $time);
            // $count_all = Bill::whereYear('created_at', $time['0'])
            //             ->whereMonth('created_at', $time['1'])
            //             ->whereDay('created_at', $time['2'])
            //             ->count();

            if ($partner_id != null) {
                $count = Bill::where('bill_status_id', $bill_status_id)
                    ->whereIn('partner_id', $partner_id)
                    ->whereYear('created_at', $time['0'])
                    ->whereMonth('created_at', $time['1'])
                    ->whereDay('created_at', $time['2'])
                    ->count();
            } else {
                $count = Bill::where('bill_status_id', $bill_status_id)
                    ->whereYear('created_at', $time['0'])
                    ->whereMonth('created_at', $time['1'])
                    ->whereDay('created_at', $time['2'])
                    ->count();
            }
        }

        return $count;
    }

    public function roundUp($value, $increment = 10000)
    {
        return (int)($increment * ceil($value / $increment));
    }

    public function generateCode($prefix, $length_s = 4, $length_n = 4)
    {
        return $prefix . $this->genAutoUniqNumber($length_n) . $this->genAutoUniqString($length_s);
    }

    function roundDown($value)
    {
        return (int)floor($value * 100) / 100;
    }

    public function php_pmt($rate = 0, $nper = 0, $pv = 0, $fv = 0, $type = 0)
    {
        if ($rate > 0) {
            return (-$fv - $pv * pow(1 + $rate, $nper)) / (1 + $rate * $type) / ((pow(1 + $rate, $nper) - 1) / $rate);
        } else {
            return (-$pv - $fv) / $nper;
        }
    }

    public function parseHtmlDom($merchant_name, $html)
    {
        $rs = [
            'product_price' => 0,
            'product_name' => ''
        ];

        $product_name = '';
        $product_price = 0;

        switch ($merchant_name) {
            case 'lazada.vn':
                $price = $html->find('#module_product_price_1 .pdp-product-price .pdp-price', 0)->innertext;
                $product_price = (float)str_replace('.', '', $price);

                $title = $html->find('#module_product_title_1 .pdp-product-title', 0)->innertext;
                $title = explode('/>', $title);
                $product_name = $title[1];
                break;
            case 'tiki.vn':
                $price = $html->find('#span-price', 0)->innertext;
                $product_price = (float)str_replace('.', '', $price);

                $title = $html->find('#product-name', 0)->innertext;
                $title = explode('</span>', $title);
                $product_name = trim($title[1]);
                break;
            case 'phongvu.vn':

                break;
            case 'shopee.vn':

                break;
        }

        $rs['product_price'] = $product_price;
        $rs['product_name'] = $product_name;

        return $rs;
    }

    public function token()
    {
        $uuid = "";
        mt_srand((float)microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(1000, 9999), true)));
        $hyphen = chr(45); // "-"
        $uuid = substr($charid, 0, 8)
            . substr($charid, 8, 4)
            . substr($charid, 12, 4)
            . substr($charid, 16, 4)
            . substr($charid, 20, 12);
        return strtolower($uuid);
    }

    public function get_browser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version = "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
            $bname = 'InternetExplorer';
            $ub = "MSIE";
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'MozillaFirefox';
            $ub = "Firefox";
        } elseif (preg_match('/Chrome/i', $u_agent)) {
            $bname = 'GoogleChrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i', $u_agent)) {
            $bname = 'AppleSafari';
            $ub = "Safari";
        } elseif (preg_match('/Opera/i', $u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = $matches['version'][1];
            }
        } else {
            $version = $matches['version'][0];
        }

        // check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }

        return array(
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern
        );
    }

    public function _url_text($string, $ext = '.html')
    {
        // remove all characters that aren"t a-z, 0-9, dash, underscore or space
        $string = strip_tags(str_replace('&nbsp;', ' ', $string));
        $string = str_replace('&quot;', '', $string);

        //$string = $func($string);
        //$string = $this->_utf8_to_ascii($string);

        $NOT_acceptable_characters_regex = '#[^-a-zA-Z0-9_ ]#';
        $string = preg_replace($NOT_acceptable_characters_regex, '', $string);
        // remove all leading and trailing spaces
        $string = trim($string);

        // change all dashes, underscores and spaces to dashes
        $string = preg_replace('#[-_]+#', '-', $string);
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('#[-]+#', '-', $string);

        return strtolower($string . $ext);
    }

    public function _utf8_to_ascii($str)
    {
        $chars = array(
            'a' => array('ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ă', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ă'),
            'e' => array('ế', 'ề', 'ể', 'ễ', 'ệ', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê'),
            'i' => array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị'),
            'o' => array('ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'Ố', 'Ồ', 'Ổ', 'Ô', 'Ộ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ơ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ơ'),
            'u' => array('ứ', 'ừ', 'ử', 'ử', 'ữ', 'ự', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư'),
            'y' => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'),
            'd' => array('đ', 'Đ'),
        );
        foreach ($chars as $key => $arr) {
            $str = str_replace($arr, $key, $str);
        }
        return $str;
    }

    public function is_base64_encoded($string)
    {
        $string = explode(',', $string);

        if (isset($string[1]) && base64_decode($string[1], true)) {
            return true;
        } else {
            return false;
        }
    }

    public static function _mk_dirs($strPath)
    {
        if (is_dir($strPath)) {
            return true;
        }

        $pStrPath = dirname($strPath);
        if (!self::_mk_dirs($pStrPath)) {
            return false;
        }

        $return = mkdir($strPath);
        @chmod($strPath, 0777);
        return $return;
    }

    public static function uploadFile($file, $destination)
    {
        $extension = array("pdf", "doc", "docx", 'xls', 'xlsx');
        $file_extension = $file->getClientOriginalExtension();
        $file_name = $file->getClientOriginalName();
        $filename_no_extension = preg_replace("/\.[^.]+$/", "", $file_name);

        if (!in_array(mb_strtolower($file_extension), $extension)) {
            return null;
        }

        $new_file_name = md5(time() . $filename_no_extension) . '.' . $file_extension;

        $destination = 'uploads/' . $destination;
        $path = $file->move(env('CDN_UPLOAD') . $destination, $new_file_name);

        return $destination . '/' . $new_file_name;
    }

    public function uploadBase64($b64_image, $file_path)
    {
        $full_path = env('MEDIA_UPLOAD') . $file_path;
        @mkdir($full_path, 0777, true);
        $file_name = md5(time()) . '.png';
        $path = $full_path . '/' . $file_name;
        copy($b64_image, $path);

        return $file_path . '/' . $file_name;
    }

    public function uploadImage($file, $destination)
    {
        $extension = array('png', 'jpg', 'jpeg');
        $file_extension = $file->getClientOriginalExtension();
        $file_name = $file->getClientOriginalName();
        $filename_no_extension = preg_replace("/\.[^.]+$/", "", $file_name);

        if (!in_array(mb_strtolower($file_extension), $extension)) {
            return null;
        }

        $new_file_name = md5(time() . $filename_no_extension) . '.' . $file_extension;
        $file->move(env('MEDIA_UPLOAD') . $destination, $new_file_name);

        return $destination . '/' . $new_file_name;
    }

    public function genAutoUniqString($length = 4)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtoupper($randomString);
    }

    public function genAutoUniqNumber($length = 4)
    {
        $a = '';
        for ($i = 0; $i < $length; $i++) {
            $a .= mt_rand(0, 9);
        }
        return $a;
    }

    public function generateUID()
    {
        $uuid = "";
        mt_srand((float)microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(1000, 9999), true)));
        $hyphen = chr(45); // "-"
        $uuid = substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        return strtoupper($uuid);
    }

    public function isValidEmail($email)
    {
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        $rs = preg_match($pattern, $email);

        if ($rs)
            return true;

        return false;
    }

    public function isPhone($mobile)
    {
        return preg_match('/^[0-9]{10}+$/', $mobile);
    }

    public function generateSalt($length = 10)
    {
        $length = $length > 10 ? 10 : $length;

        $salt = '';

        for ($i = 0; $i < $length; $i++) {
            $salt .= chr(rand(33, 126));
        }

        return $salt;
    }

    public function generateSeriesPeriod($period, $payment_monthly, $loan_amount, $contract_date)
    {
        // $contract_date = date('Y-m-'.$contract_date);

        $rate = $this->calcRate($period, $payment_monthly, $loan_amount);
        $h4 = $loan_amount * $rate;

        $arr_lich_thanh_toan = [];
        $g5temp = 0;
        $h5temp = 0;
        for ($i = 1; $i <= $period; $i++) {
            if ($g5temp == 0) {
                $value = ($loan_amount + $h4) - $payment_monthly;
                $g5temp = $value;
                $value_temmp = $value * $rate;
                $h5temp = $value_temmp;
            } else {
                $value = ($g5temp + $h5temp) - $payment_monthly;
                $g5temp = $value;
                $value_temmp = $value * $rate;
                $h5temp = $value_temmp;
            }

            if ($value < 0)
                $value = 0;

            $arr_temp = [];
            $arr_temp = [
                'period_key' => sprintf("%'02d", $i),
                'payment_monthly' => $payment_monthly,
                'payment_period_status' => 0,
                'remaining_principal_amount' => round($value),
                'rate_amount' => round($h5temp),
                'reduce_original_amount' => $payment_monthly - round($h5temp),
                'payment_date' => date('d-m-Y', strtotime("+{$i} month", strtotime($contract_date))),
            ];

            $arr_lich_thanh_toan[] = $arr_temp;
        }
        return $arr_lich_thanh_toan;
    }

    public function calcRate($period, $vlrparc, $vp, $guess = 0.25)
    {
        $maxit = 100;
        $precision = 14;
        $guess = round($guess, $precision);
        for ($i = 0; $i < $maxit; $i++) {
            $divdnd = $vlrparc - ($vlrparc * (pow(1 + $guess, -$period))) - ($vp * $guess);
            $divisor = $period * $vlrparc * pow(1 + $guess, (-$period - 1)) - $vp;
            $newguess = $guess - ($divdnd / $divisor);
            $newguess = round($newguess, $precision);
            if ($newguess == $guess) {
                return $newguess;
            } else {
                $guess = $newguess;
            }
        }
        return $guess;
    }

    public function generatePass($password, $salt)
    {
        $_pass = '';

        if (empty($salt)) {
            $_pass = md5($password);
        } else {
            $_pass = md5(md5($password) . md5($salt));
        }

        return $_pass;
    }

    public function sendMessageNotiOneSignal($resource_name, $content, $fields)
    {
        $host = env('ONESIGNAL_URL');
        $key = env('ONESIGNAL_KEY');
        $apiUrl = $host . $resource_name;

        $headers = [
            'Content-Type: application/json',
            'Authorization: Basic ' . $key
        ];

        $ch = curl_init();

        $fields = json_encode($fields);
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_rmq_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('RMQ_URL') . $apiUrl;

        $headers = [
            'Content-Type: application/json',
            'Authorization: hyyAWcxr2Y7GsxcUmQsFkc86JvqzbuTGjvDeEkKuLmBVb4bwcR4VrPHy85CNdQJtgBxJm8'
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        $ssl_verify = true;
        if (env('APP_ENV') == 'local') {
            $ssl_verify = false;
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $ssl_verify);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        // Log::info(var_export(json_encode($result),true));
        return $result;
    }

    public function call_web_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('WEB_URL') . $apiUrl;

        $headers = [
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return [
            'query_full' => $full_api,
            'response' => $result
        ];
    }

    public function call_ntl_integration_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('ERP_NTL_INTER_URL') . $apiUrl;

        $token_generate = '';

        if ($params['ClientKey'] == 'mobileapp') {
            $token_generate = 'wY7JaAYtAqW3EjRt';
        }

        if ($params['ClientKey'] == 'api') {
            $token_generate = 'a7jauzHLvDY7DpCb';
        }

        if ($params['ClientKey'] == 'viettel') {
            $token_generate = 'rYFFHXjLxrVcCRG2';
        }

        $json_params = json_encode($params);
        $headers = [
            'Content-Type: application/json',
            'Authorization: ' . md5($params['ClientKey'] . $token_generate . $json_params)
        ];

//        echo "<pre>";
//        print_r(md5($params['ClientKey'] . $token_generate . $json_params));
//        die;

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_promo_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('PROMO_URL') . $apiUrl;

        $headers = [
            'Content-Type: application/json',
            'Authorization: d5955a756c41c7113429f68816eaab01'
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_avy_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('AVY_URL') . $apiUrl;

//        echo $full_api;
//        die;
        $headers = [
            'Content-Type: application/json',
            'NTL-API-KEY: e2Xjhn7FBz6T7x5cQyiRH9bT'
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }


    public function call_erp_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('ERP_API_URL') . $apiUrl;

        $headers = [
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_es_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('ES_URL') . $apiUrl;

        $headers = [
            'Content-Type: application/json',
            'Authorization: ' . env('TOKEN_SEARCH')
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_zalo_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('ZALO_SERVER') . $apiUrl;

        $headers = [
            'Content-Type: application/json'
        ];

        $params['access_token'] = env('ZALO_ACCESS_TOKEN');
        $ch = curl_init();
        if ($method == 'POST') {
            $full_api .= '?' . http_build_query(['access_token' => $params['access_token']]);
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_cdn($params = [], $method = 'POST')
    {
        $full_api = env('CDN_URL') . 'upload.php';

        $headers = [
            'Content-Type: application/json',
            'Authorization: FzQScmQ7LXswQdH6KtcgTTJUBguYK4'
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_sms($params = [], $method = 'POST')
    {
        $full_api = env('SMS_URL');

        $headers = [
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_sys_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('SYS_API_URL') . $apiUrl;
        $headers = [
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_caresoft_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('TICKET_CARESOFT_API') . $apiUrl;

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . env('ACCESS_TOKEN')
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function filterDate(&$from_date, &$to_date)
    {
        if (!empty($from_date) && !empty($to_date)) {
            $from_date = date('Y-m-d 00:00:00', strtotime($from_date));
            $to_date = date('Y-m-d 23:59:59', strtotime($to_date));
        } else if (!empty($from_date)) {
            $from_date = date('Y-m-d 00:00:00', strtotime($from_date));
            $to_date = date('Y-m-d H:i:s');
        } else if (!empty($to_date)) {
            $from_date = date("Y-m-d 00:00:00", strtotime(" -7 days"));
            $to_date = date('Y-m-d 23:59:59', strtotime($to_date));
        }
    }

    public function readNumber12Digits($number)
    {
        $dictionnaryNumbers = [
            0 => "không",
            1 => "một",
            2 => "hai",
            3 => "ba",
            4 => "bốn",
            5 => "năm",
            6 => "sáu",
            7 => "bẩy",
            8 => "tám",
            9 => "chín",
        ];

        $dictionnaryUnits = [
            0 => "tỷ",
            1 => "triệu",
            2 => "nghìn",
            3 => "đồng",
        ];

        $number = strval($number);
        $number = str_pad($number, 12, 0, STR_PAD_LEFT);
        $arrNumber = str_split($number, 3);
        foreach ($arrNumber as $key => $value) {
            if ($value != "000") {
                $index = $key;
                break;
            }
        }

        foreach ($arrNumber as $key => $value) {
            if ($key >= $index) {
                $readFull = true;
                if ($key >= $index) $readFull = false;

                $result[$key] = $this->readNumber3Digits($value, $readFull) . " " . $dictionnaryUnits[$key];;
            }
        }

        $result = implode(" ", $result);
        $result = $this->formatString($result);
        $result = str_replace("triệu nghìn đồng", "triệu đồng", $result);
        $result = str_replace("tỷ triệu đồng", "tỷ đồng", $result);
        return $result;
    }

    private function readNumber3Digits($number, $readFull = true)
    {
        $dictionnaryNumbers = [
            0 => "không",
            1 => "một",
            2 => "hai",
            3 => "ba",
            4 => "bốn",
            5 => "năm",
            6 => "sáu",
            7 => "bẩy",
            8 => "tám",
            9 => "chín",
        ];

        // 01 - LẤY CHỮ SỐ HÀNG TRĂM, HÀNG CHỤC, HÀNG ĐƠN VỊ
        $number = strval($number);
        $number = str_pad($number, 3, 0, STR_PAD_LEFT);
        $digit_0 = substr($number, 2, 1);
        $digit_00 = substr($number, 1, 1);
        $digit_000 = substr($number, 0, 1);
        // 02 - HÀNG TRĂM
        $str_000 = $dictionnaryNumbers[$digit_000] . " trăm ";

        // 03 - HÀNG CHỤC
        $str_00 = $dictionnaryNumbers[$digit_00] . " mươi ";

        if ($digit_00 == 0) $str_00 = " linh ";

        if ($digit_00 == 1) $str_00 = " mười ";
        // 04 - HÀNG ĐƠN VỊ

        $str_0 = $dictionnaryNumbers[$digit_0];
        if ($digit_00 > 1 && $digit_0 == 1) $str_0 = " mốt ";

        if ($digit_00 > 0 && $digit_0 == 5) $str_0 = " lăm ";

        if ($digit_00 == 0 && $digit_0 == 0) {
            $str_0 = "";
            $str_00 = "";
        }

        if ($digit_0 == 0) {
            $str_0 = "";
        }

        if ($readFull == false) {
            if ($digit_000 == 0) $str_000 = "";
            if ($digit_000 == 0 && $digit_00 == 0) $str_00 = "";
        }
        $result = $str_000 . $str_00 . $str_0;

        return $result;
    }

    public function formatString($str, $type = null)
    {
        // Dua tat ca cac ky tu ve dang chu thuong
        $str = strtolower($str);

        // Loai bo khoang trang dau va cuoi chuoi
        $str = trim($str);

        // Loai bo khoang trang du thua giua cac tu

        $array = explode(" ", $str);
        foreach ($array as $key => $value) {
            if (trim($value) == null) {
                unset($array[$key]);
                continue;
            }
            // Xu ly cho danh tu
            if ($type == "danh-tu") {
                $array[$key] = ucfirst($value);
            }
        }

        $result = implode(" ", $array);

        // Chuyen ky tu dau tien thanh chu hoa
        $result = ucfirst($result);

        return $result;
    }

    public function generateSlug($str)
    {
        $to_vn = $this->convertVnToEn($str);
        return strtolower(str_replace(" ", "-", preg_replace('~[\\\\/:*?"<>|.]~', ' ', $to_vn)));
    }

    public function convertVnToEn($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return $str;
    }

    public function uhashPassword($raw_pass, $salt)
    {
        return md5($raw_pass . htmlspecialchars_decode($salt));
    }

    public function encryptIt($q)
    {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded = bin2hex(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return ($qEncoded);
    }

    public function decryptIt($q)
    {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), pack("H*", $q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return ($qDecoded);
    }


    public function sendNotification($message, $user_id)
    {
        $content = array(
            "en" => $message
        );

        $app_id = env('ONESIGNAL_APP_ID');
        $auth_key = env('ONESIGNAL_REST_API_KEY');

        $fields = array(
            'app_id' => '7a6f1200-3d3c-46f7-bbde-4ef81ec657c6',
            'tags' => array(array("key" => "userId", "relation" => " =", "value" => $user_id)),
            'contents' => $content
        );

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic NDYwMmMwZGQtYzNiYS00ZjY4LWIxNDgtYTAxMDY4MDlkYWJk'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function getFullLink($url)
    {
        $longURL = get_headers($url, 7);

        if (!empty($longURL['Location'])) {
            $url_pure = explode("?", $longURL['Location']);
            return $url_pure[0];
        } else {
            return $url;
        }
    }

    function generate_salted_password($password, $salt)
    {
        $_pass = '';

        if (empty($salt)) {
            $_pass = md5($password);
        } else {
            $_pass = md5(md5($password) . md5($salt));
        }

        return $_pass;
    }

    function generate_salt($length = 10)
    {
        $length = $length > 10 ? 10 : $length;

        $salt = '';

        for ($i = 0; $i < $length; $i++) {
            $salt .= chr(rand(33, 126));
        }

        return $salt;
    }

    public function crawlData($type = 'viettelPost', $billCode)
    {

        $url = 'https://old.viettelpost.com.vn/Tracking?KEY=' . $billCode;

        switch ($type) {
            case 'viettelPost':
                $url = 'https://old.viettelpost.com.vn/Tracking?KEY=' . $billCode;
                break;
            case 'EMS':
                $url = 'https://www.trackingmore.com/vietnam-post-tracking.html?number=' . $billCode;
                break;
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /*
         * XXX: This is not a "fix" for your problem, this is a work-around.  You
         * should fix your local CAs
         */
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        /* Set a browser UA so that we aren't told to update */
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36');

        $res = curl_exec($ch);

        if ($res === false) {
            die('error: ' . curl_error($ch));
        }

        curl_close($ch);

        $d = new \DOMDocument();
        @$d->loadHTML($res);

        $x = new \DOMXPath($d);

        return $x;
    }

    public function parseDataHTML($type_bill, $crawl, $url = '')
    {
        $rs = [
            'result_bill' => ''
        ];


        switch ($type_bill) {
            case 'viettelPost':
                $json_bill = $crawl->query("//span[@id = 'dnn_ctr507_Main_ViewKQ_RepeaterView_Label5_0']");

                if ($json_bill->length > 0) {
                    $parse_data = $json_bill->item(0)->textContent;
                    $rs['result_bill'] = $parse_data;
                } else if ($json_bill->length == 0) {
                    $d = new \DOMDocument();
                    @$d->loadHTMLFile($url);
                    $xpath = new \DOMXPath($d);

                    $json_product_name = $xpath->query("//span[@class = 'pdp-mod-product-badge-title']");

                    if ($json_product_name->length > 0) {
                        $product_name = preg_replace(['(\s+)u', '(^\s|\s$)u'], [' ', ''], utf8_decode($json_product_name->item(0)->textContent));
                    }

                    $json_product_price = $xpath->query("//script[@type = 'application/ld+json']");

                    if ($json_product_price->length > 0) {
                        $parse_data = json_decode(utf8_decode($json_product_price->item(0)->textContent), true);
                        $product_price = $parse_data['offers']['price'];
                    }
                }
                break;
            case 'EMS':
                $rs['result_bill'] = "Không thể lấy dữ liệu";
                //                $json_bill = $crawl->query("//ul[@id = 'select_courier']");
                //
                //                if ($json_bill->length > 0) {
                //
                //
                //                } else if ($json_bill->length == 0) {
                //                    $d = new \DOMDocument();
                //                    @$d->loadHTMLFile($url);
                //                    $xpath = new \DOMXPath($d);
                //
                //                    $json_product_name = $xpath->query("//span[@class = 'pdp-mod-product-badge-title']");
                //
                //                    if ($json_product_name->length > 0) {
                //                        $product_name = preg_replace(['(\s+)u', '(^\s|\s$)u'], [' ', ''], utf8_decode($json_product_name->item(0)->textContent));
                //                    }
                //
                //                    $json_product_price = $xpath->query("//script[@type = 'application/ld+json']");
                //
                //                    if ($json_product_price->length > 0) {
                //                        $parse_data = json_decode(utf8_decode($json_product_price->item(0)->textContent), true);
                //                        $product_price = $parse_data['offers']['price'];
                //                    }
                //
                //                }

                break;
        }
        return $rs;
    }

    public function generateErpStatusName($status_code, $lang)
    {
        $status_name = '';
        $current_step = '';

        $group_one = ["AIS", "BPU", "KCB", "LPC"];
        $group_two = ["DIT", "EOD", "HEB", "JIB", "CIW", "GBV", "QIU", "FUD", "NRT"];
        $group_three = ["FBC", "ICB", "MRC"];

        if (in_array($status_code, $group_one)) {
            if ($status_code == 'AIS' || $status_code == 'BPU' || $status_code == 'KCB') {
                $status_name = 'Chờ lấy hàng';
                if (!empty($lang) && $lang == 'en')
                    $status_name = 'Waiting for goods';
            } else {
                $status_name = 'Đã lấy hàng';
                if (!empty($lang) && $lang == 'en')
                    $status_name = 'Picked up';
            }
            $current_step = 'step_1';
        } else if (in_array($status_code, $group_two)) {
            $status_name = 'Đang vận chuyển';

            if (!empty($lang) && $lang == 'en')
                $status_name = 'On the way';
            $current_step = 'step_2';
        } else if (in_array($status_code, $group_three)) {
            $status_name = 'Đã giao hàng';

            if (!empty($lang) && $lang == 'en')
                $status_name = 'Delivered';

            $current_step = 'step_3';
        }

        return [$status_name, $current_step];
    }

    public function generateErpPayName($paycode, $lang)
    {
        $pay_name = '';

        switch ($paycode) {
            case 'NGTTN':
                $pay_name = 'Người Gửi Thanh Toán Ngay';
                if (!empty($lang) && $lang == 'en')
                    $pay_name = 'Prompt payment by sender';
                break;
            case 'NGTTS':
                $pay_name = 'Người Gửi Thanh Toán Sau';
                if (!empty($lang) && $lang == 'en')
                    $pay_name = 'Deferred payment by sender';
                break;
            case 'NNTTN':
                $pay_name = 'Người Nhận Thanh Toán Ngay';
                if (!empty($lang) && $lang == 'en')
                    $pay_name = 'Prompt payment by receiver';
                break;
            case 'NNTTS':
                $pay_name = 'Người Nhận Thanh Toán Sau';
                if (!empty($lang) && $lang == 'en')
                    $pay_name = 'Deferred payment by receiver';
                break;
        }
        return $pay_name;
    }

    public function generateErpServiceName($service_name, $lang)
    {
        $service = '';

        switch ($service_name) {
            case 'CPN':
                $service = $service_name;
                if (!empty($lang) && $lang == 'en')
                    $service = 'Express';
                break;
            case 'Đường bộ':
                $service = $service_name;
                if (!empty($lang) && $lang == 'en')
                    $service = 'Road';
                break;
            case 'MES':
                $service = $service_name;
                if (!empty($lang) && $lang == 'en')
                    $service = 'Economy';
                break;
            case 'Hỏa tốc':
                $service = $service_name;
                if (!empty($lang) && $lang == 'en')
                    $service = 'Premium';
                break;
        }
        return $service;
    }

    public function menu_cp_parent_partner()
    {
        $menu = [
            [
                'id' => '1005',
                'title' => 'Quản lý tài khoản lẻ',
                'icon' => 'people-outline',
                'path' => '/customer/partner-child',
                'init_param' => '',
                'level' => 1,
                'parent_id' => 0,
            ]
        ];

        return $menu;
    }

    public function menu_staff_partner($type)
    {
        if ($type != 'staff') {
            return [];
        }

        $menu = [
            [
                'id' => '2000',
                'title' => 'Tạo đơn thu hộ',
                'icon' => 'monitor-outline',
                'path' => '/manager/create-order-payment',
                'init_param' => '',
                'level' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => '2001',
                'title' => 'Quản lý đơn thu',
                'icon' => 'smartphone-outline',
                'path' => '',
                'init_param' => '',
                'level' => 1,
                'parent_id' => 0,
            ],
            //            [
            //                'id' => '1001',
            //                'title' => 'Chờ thu hộ',
            //                'icon' => 'file-outline',
            //                'path' => '/manager/payment-bill-new',
            //                'init_param' => '{"status":2,"bill_type":2}',
            //                'level' => 2,
            //                'parent_id' => 1000,
            //            ],
            // [
            //     'id' => '1002',
            //     'title' => 'Chờ xác nhận',
            //     'icon' => 'clock-outline',
            //     'path' => '/manager/payment-bill-waiting',
            //     'init_param' => '',
            //     'level' => 2,
            //     'parent_id' => 1000,
            // ],
            //            [
            //                'id' => '2002',
            //                'title' => 'Chưa hoàn thành',
            //                'icon' => 'layout-outline',
            //                'path' => '/manager/payment-bill-new-post',
            //                'init_param' => '{"status":1,"bill_type":3}',
            //                'level' => 2,
            //                'parent_id' => 2001,
            //            ],
            [
                'id' => '2003',
                'title' => 'Hoàn thành',
                'icon' => 'layout-outline',
                'path' => '/manager/payment-bill-completed-post',
                'init_param' => '{"status":4,"bill_type":3}',
                'level' => 2,
                'parent_id' => 2001,
            ],
            [
                'id' => '2004',
                'title' => 'Hủy',
                'icon' => 'close-square-outline',
                'path' => '/manager/payment-bill-canceled-post',
                'init_param' => '{"status":6,"bill_type":3}',
                'level' => 2,
                'parent_id' => 2001,
            ],
        ];

        //        if ($type == "manager") {
        //            array_unshift($menu, [
        //                'id' => '1005',
        //                'title' => 'Quản lý tài khoản lẻ',
        //                'icon' => 'people-outline',
        //                'path' => '/customer/partner-child',
        //                'init_param' => '',
        //                'level' => 1,
        //                'parent_id' => 0,
        //            ]);
        //        }

        //        if ($type == "user") {
        //            array_unshift($menu, [
        //                'id' => '1006',
        //                'title' => 'Tạo vận đơn thu hộ',
        //                'icon' => 'monitor-outline',
        //                'path' => '/manager/create-order-shop',
        //                'init_param' => '',
        //                'level' => 1,
        //                'parent_id' => 0,
        //            ]);
        //        }

        return $menu;
    }

    public function menu_collected_partner($type)
    {
        $menu = [
            [
                'id' => '1006',
                'title' => 'Đối soát COD vận đơn thu hộ',
                'icon' => 'pie-chart-outline',
                'path' => '/payment-cod-statistic',
                'init_param' => '',
                'level' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => '1000',
                'title' => 'Quản lý vận đơn thu hộ',
                'icon' => 'smartphone-outline',
                'path' => '',
                'init_param' => '',
                'level' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => '1001',
                'title' => 'Chờ thu hộ',
                'icon' => 'file-outline',
                'path' => '/manager/payment-bill-new',
                'init_param' => '{"status":2,"bill_type":2}',
                'level' => 2,
                'parent_id' => 1000,
            ],
            // [
            //     'id' => '1002',
            //     'title' => 'Chờ xác nhận',
            //     'icon' => 'clock-outline',
            //     'path' => '/manager/payment-bill-waiting',
            //     'init_param' => '',
            //     'level' => 2,
            //     'parent_id' => 1000,
            // ],
            [
                'id' => '1003',
                'title' => 'Hoàn thành',
                'icon' => 'layout-outline',
                'path' => '/manager/payment-bill-completed',
                'init_param' => '{"status":4,"bill_type":2}',
                'level' => 2,
                'parent_id' => 1000,
            ],
            [
                'id' => '1004',
                'title' => 'Hủy',
                'icon' => 'close-square-outline',
                'path' => '/manager/payment-bill-canceled',
                'init_param' => '{"status":6,"bill_type":2}',
                'level' => 2,
                'parent_id' => 1000,
            ],
        ];

        //        if ($type == "manager") {
        //            array_unshift($menu, [
        //                'id' => '1005',
        //                'title' => 'Quản lý tài khoản lẻ',
        //                'icon' => 'people-outline',
        //                'path' => '/customer/partner-child',
        //                'init_param' => '',
        //                'level' => 1,
        //                'parent_id' => 0,
        //            ]);
        //        }

        if ($type == "user") {
            array_unshift($menu, [
                'id' => '1006',
                'title' => 'Tạo vận đơn thu hộ',
                'icon' => 'monitor-outline',
                'path' => '/manager/create-order-shop',
                'init_param' => '',
                'level' => 1,
                'parent_id' => 0,
            ]);
        }

        return $menu;
    }

    public function menu_staff_admin()
    {
        $menu = [
            [
                'id' => '1993',
                'title' => 'Tạo nhân viên thu hộ',
                'icon' => 'plus-outline',
                'path' => '/customer/create-staff-payment',
                'init_param' => '',
                'level' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => '1994',
                'title' => 'Quản lý NV Thu hộ',
                'icon' => 'people-outline',
                'path' => '/customer/manager-staff',
                'init_param' => '',
                'level' => 1,
                'parent_id' => 0,
            ]
        ];

        return $menu;
    }

    /* GENERATE RSA FROM TEST*/
    function showLocaltion()
    {
        $location = file_get_contents(base_path('public/location/local.json'));
        return $location;
        //        $rsa = new RSA();
        //        $rsa->loadKey($privateKey);
        //        $rsa->setHash("sha256");
        //        $signature = $rsa->sign($plainData);

        //        $signature_encoding = mb_convert_encoding($signature, "UTF-8");
        //        $encoded_sign = base64_encode($signature_encoding);

        //        echo "<pre>";
        //        print_r($encoded_sign);
        //        die;

        //        if (openssl_sign($plainData, $signature, $privateKey)) {
        //            echo "<pre>";
        //            print_r(base64_encode($signature));
        //            die;
        //            return ['success' => true, 'encrypt' => base64_encode($signature)];
        //        } else {
        //            return ['success' => false, 'encrypt' => ''];
        //        }


        //        $crypt = openssl_public_encrypt($plainData,$cryptReturn,$publicKey);
        //        return $cryptReturn;
        //        if($crypt == 1){
        //            return ['success' => true,'data'=>$cryptReturn];
        //            return ['success' => true,'data'=>$cryptReturn];
        //        }else{
        //            return ['success' => false,'data'=>''];
        //        }
        //
        //        $rsa = new RSA();
        //        $rsa->loadKey($publicKey);
        //        $encryptText = $rsa->encrypt($plainData);
        //        return base64_encode($encryptText);
    }

    public function call_ntl_api($apiUrl, $params = [], $method = 'POST')
    {
        $full_api = env('API_URL') . $apiUrl;

        $headers = [
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        if ($method == 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method == 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
    }

    public function call_ntl_api_ntx($apiUrl, $params = [], $method = 'POST'){
        $full_api = env('API_URL_EXPRESS') . $apiUrl;

        $headers = [
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        if ($method === 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method === 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // CURLOPT_SSL_VERIFYPEER phải cho false vì đã đưa data lên api ktra ko cần thiết phải ktra nữa
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
        //dd($result);
    }
    public function call_ntl_api_search($apiUrl, $params = [], $method = 'POST'){
        $full_api = env('API_URL_SEARCH') . $apiUrl;
        $headers = [
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        if ($method === 'POST') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else if ($method === 'PUT') {
            $params = json_encode($params);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $full_api .= '?' . http_build_query($params);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // CURLOPT_SSL_VERIFYPEER phải cho false vì đã đưa data lên api ktra ko cần thiết phải ktra nữa
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_URL, $full_api);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        return $result;
        //dd($result);
    }

}
