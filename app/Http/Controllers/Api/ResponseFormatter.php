<?php

namespace App\Http\Controllers\Api;

class ResponseFormatter
{
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'message' => null
        ],

        'data' => null

    ];

    public static function success($data, $message)
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['message']);
    }

    public static function error($data, $message, $code = 400)
    {
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['meta']['status'] = 'error';
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['message']);
    }
}
