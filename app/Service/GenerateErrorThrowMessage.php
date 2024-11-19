<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class GenerateErrorThrowMessage
{
    public static function execute($validator)
    {
        $response = response()->json([
        'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        'error' => $validator->errors(),
    ]);

        throw new HttpResponseException($response);
    }
}
