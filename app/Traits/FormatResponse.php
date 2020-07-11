<?php


namespace App\Traits;


use Illuminate\Http\JsonResponse;


trait FormatResponse
{

    /**
     * format error messages
     * @param $status
     * @param $message
     * @param null $data
     * @return JsonResponse
     */
    protected function errorResponse($status, $message, $data = null)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'errors' => $data,
        ], $status);
    }


    /**
     * format success messages
     * @param $status int status code
     * @param $message  string call message
     * @param null $data data sent by the api call
     * @return JsonResponse
     */
    protected function respondWith($status, $message, $data = null)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

}
