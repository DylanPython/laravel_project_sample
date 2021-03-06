<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Throwable;

class BadRequestException extends Exception
{
    public function __construct(string $message = "", int $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(Request $request)
    {
        $response = [
            'ret' => $this->code,
            'data' => new \stdClass(),
            'msg' => $this->message
        ];
        return response()->json($response);
    }
}
