<?php

namespace App\Common;

class Common {
    public function __construct() {}

    public function responseToJson($result = false, $code = 200, $message = '', $data) {
        $param = [
            'success' => $result,
            'message' => $message,
            'code' => $code,
            'data' => $data
        ];   
        return response()->json($param, $code)->header('Content-Type', 'application/json');
    }
}

