<?php

namespace App\Http\Traits;

trait ApiResponseTrait
{
    private function apiResponse($code = 200, $message = null, $errors = null, $data = null)
    {
        $array = [
            'status' => $code,
            'message' => $message
        ];

        if (is_null($errors) && !is_null($data)) {
            $array['data'] = $data;
        } elseif (!is_null($errors) && is_null($data)) {
            $array['errors'] = $errors;
        } else {
            $array['errors'] = $errors;
            $array['data'] = $data;
        }
        return response($array, 200);
    }
}
