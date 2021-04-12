<?php

namespace App\Http\Controllers\API;

class ResponseFormatter

{

    protected static $response = [
        'meta' => [
            'code'    => 200,
            'status'  => 'success',
            'message' => null
        ],

        'data' => null
    ];

    public static function success ($data = null, $message = null){
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public static function eror ($data = null, $message = null, $code = 400){
        self::$response['meta']['message'] = $message;
        self::$response['meta']['status'] = 'eror';
        self::$response['meta']['code'] = $code;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
?>
