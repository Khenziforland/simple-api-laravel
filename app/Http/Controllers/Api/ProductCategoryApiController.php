<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Validations\Api\ProductCategoryApiValidation;
use App\Services\Api\ProductCategoryApiService;

class ProductCategoryApiController extends Controller
{
    /**
     ** Validation instance.
     *
     * @var ProductCategoryApiValidation
     */
    protected $productCategoryApiValidation;

    /**
     ** Service instance.
     *
     * @var ProductCategoryApiService
     */
    protected $productCategoryApiService;

    /**
     ** Constructor.
     *
     * @param ProductCategoryApiValidation $productCategoryApiValidation
     * @param ProductCategoryApiService $productCategoryApiService
     * @return void
     */
    public function __construct(ProductCategoryApiValidation $productCategoryApiValidation, ProductCategoryApiService $productCategoryApiService)
    {
        $this->productCategoryApiValidation = $productCategoryApiValidation;
        $this->productCategoryApiService = $productCategoryApiService;
    }

    /**
     ** Index.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $validation = $this->productCategoryApiValidation->index($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->productCategoryApiService->index($request);

        return $this->formatResponse($result);
    }

    /**
     ** Show.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request)
    {
        $request['product_category_id'] = $request->product_category_id;
        $validation = $this->productCategoryApiValidation->show($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->productCategoryApiService->show($request);

        return $this->formatResponse($result);
    }

    /**
     ** Create.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $validation = $this->productCategoryApiValidation->create($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->productCategoryApiService->create($request);

        return $this->formatResponse($result);
    }

    /**
     ** Update.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $request['product_category_id'] = $request->product_category_id;
        $validation = $this->productCategoryApiValidation->update($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->productCategoryApiService->update($request);

        return $this->formatResponse($result);
    }

    /**
     ** Destroy.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $request['product_category_id'] = $request->product_category_id;
        $validation = $this->productCategoryApiValidation->destroy($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->productCategoryApiService->destroy($request);

        return $this->formatResponse($result);
    }
}
