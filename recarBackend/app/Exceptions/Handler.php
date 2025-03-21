<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\MessageBag;
use Throwable;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
            $messageBag = new MessageBag();
            $messageBag->add('server', 'У вас нет необходимых разрешений');

            return response()->json([
                'error' => $messageBag,
                'status'  => false,
            ]);
        });
    }

//    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
//    {
//        if ($e->response) {
//            return $e->response;
//        }
//
//        $response = [
//            'status' => false,
//            'error' => $e->validator->errors()->getMessages()
//        ];
//
//        return response()->json($response, 422);
//    }
}
