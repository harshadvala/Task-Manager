<?php

namespace App\Http\Controllers;

use Response;

class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return Response::json($response);
    }

    public function sendError($error, $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        return Response::json($response, $code);
    }
}
