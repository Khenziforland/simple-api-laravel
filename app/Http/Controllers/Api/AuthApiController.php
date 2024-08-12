<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Validations\Api\AuthApiValidation;
use App\Services\Api\AuthApiService;

class AuthApiController extends Controller
{
    /**
     ** Validation instance.
     *
     * @var AuthApiValidation
     */
    protected $authApiValidation;

    /**
     ** Service instance.
     *
     * @var AuthApiService
     */
    protected $authApiService;

    /**
     ** Constructor.
     *
     * @param AuthApiValidation $authApiValidation
     * @param AuthApiService $authApiService
     */
    public function __construct(AuthApiValidation $authApiValidation, AuthApiService $authApiService)
    {
        $this->authApiValidation = $authApiValidation;
        $this->authApiService = $authApiService;
    }

    /**
     ** Register.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $validation = $this->authApiValidation->register($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->authApiService->register($request);

        return $this->formatResponse($result);
    }

    /**
     ** Login.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $validation = $this->authApiValidation->login($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->authApiService->login($request);

        return $this->formatResponse($result);
    }

    /**
     ** Logout.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $validation = $this->authApiValidation->logout($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->authApiService->logout($request);

        return $this->formatResponse($result);
    }
}
