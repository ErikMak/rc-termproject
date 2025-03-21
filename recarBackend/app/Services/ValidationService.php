<?php

namespace App\Services;


use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class ValidationService
{
    protected function validateValue(string $fieldName, $value, string $rules, array $messages): void
    {
        $validator = Validator::make([$fieldName => $value], [
            $fieldName => $rules,
        ], $messages);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]));
        }
    }
}
