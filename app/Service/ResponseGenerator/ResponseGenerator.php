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

    public static function badResponse(): array
    {
        return[
            'status' => 200,
            'message' => 'User Registration Successful',
        ];
    }

    public static function sendSuccessResponse(string $message): array
    {
        return [
            'status' => 200,
            'message' => 'User Registration Successful',
        ];
    }
}
