<?php

namespace App\Service\ResponseGenerator;

use Symfony\Component\HttpFoundation\Response;

class ResponseGenerator
{
    public static function notFoundResponse(string $message): array
    {
        return [
            'status' => Response::HTTP_NOT_FOUND,
            'message' => $message
        ];
    }

    public static function responseWithData(string $type,array $data): array{
        return [
            'status' => Response::HTTP_OK,
            $type => $data
        ];
    }
}
