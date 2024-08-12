<?php

namespace App\Validations\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Helpers\MessageHelper;

class AuthApiValidation
{
    /**
     ** Register validation.
     *
     * @param $request
     * @return object
     */
    public function register($request)
    {
        $status = true;
        $message = MessageHelper::registerSuccess();

        $schema = [
            'email' => [
                'required',
                Rule::unique('users', 'email'),
            ],

            'password' => [
                'required',
                'confirmed',
            ],

            'password_confirmation' => [
                'required',
            ],
        ];

        $errorMessage = [
            'email.required' => 'Email tidak boleh kosong !',
            'email.unique' => 'Email sudah digunakan !',

            'password.required' => 'Password tidak boleh kosong !',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password !',

            'password_confirmation.required' => 'Konfirmasi password tidak boleh kosong !',
        ];

        $data = [
            'email' => strtolower($request->email),
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Login validation.
     *
     * @param $request
     * @return object
     */
    public function login($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'email' => [
                'required',
                Rule::exists('users', 'email'),
            ],

            'password' => [
                'required',
            ],
        ];

        $errorMessage = [
            'email.required' => 'Email tidak boleh kosong !',
            'email.exists' => 'Email tidak ditemukan !',

            'password.required' => 'Password tidak boleh kosong !',
        ];

        $data = [
            'email' => strtolower($request->email),
            'password' => $request->password,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Logout validation.
     *
     * @param $request
     * @return object
     */
    public function logout($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
