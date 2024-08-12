<?php

namespace App\Traits;


trait FormatResponse
{
    /**
     ** Format response.
     *
     * @param $request
     * @return  JsonResponse
     */
    public function formatResponse(object $request)
    {
        $statusCode = 200;

        $result = [
            'status' => $request->status,
            'message' => $request->message,
        ];

        if (!$request->status) {
            $statusCode = 422;
        }

        if (isset($request->data)) {
            $result['data'] = $request->data;
        }

        if (isset($request->pagination)) {
            $result['pagination'] = $request->pagination;
        }

        if (isset($request->token)) {
            $result['token'] = $request->token;
        }

        if (isset($request->error)) {
            $result['error'] = $request->error;
        }

        if (isset($request->errorField)) {
            $result['error_field'] = $request->errorField;
        }

        return response()->json($result, $statusCode);
    }
}
