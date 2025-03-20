<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\MessageBag;

class BaseController extends Controller {
    public function sendOK() : JsonResponse {
        $response = [
            'status' => true,
        ];

        return response()->json($response, 200);
    }

    public function sendResponse($data, $msg = '') : JsonResponse {
        $response = [
            'status' => true,
            'data' => $data,
        ];

        if(strlen($msg)) {
            $response['message'] = $msg;
        }

        return response()->json($response, 200);
    }
    public function sendError($msg, $code = 200) : JsonResponse {
        $messageBag = new MessageBag();

        $messageBag->add('server', $msg);

        $response = [
            'status' => false,
            'error' => $messageBag,
        ];

        return response()->json($response, $code);
    }
}
