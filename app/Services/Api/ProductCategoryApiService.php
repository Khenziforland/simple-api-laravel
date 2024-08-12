<?php

namespace App\Services\Api;

use App\Helpers\CheckHelper;
use App\Helpers\MessageHelper;

use App\Models\ProductCategory;

class ProductCategoryApiService
{
    /**
     ** Index service.
     *
     * @param $request
     * @return object
     */
    public function index($request)
    {
        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $filter = [];
        $sortKey = $request->sort_key;
        $sortOrder = strtoupper($request->sort_order);

        if (CheckHelper::isset($request->search)) {
            $filter['search'] = $request->search;
        }

        $productCategory = ProductCategory::filter($filter)
            ->getPaginatedData(true, $request->page, $request->per_page, $sortKey, $sortOrder);

        $data = $productCategory->data;
        $pagination = $productCategory->pagination;

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'pagination' => $pagination,
        ];

        return $result;
    }

    /**
     ** Show service.
     *
     * @param $request
     * @return object
     */
    public function show($request)
    {
        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $data = ProductCategory::firstWhere('id', $request->product_category_id);

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }

    /**
     ** Create service.
     *
     * @param $request
     * @return object
     */
    public function create($request)
    {
        $status = true;
        $message = MessageHelper::saveSuccess();

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $productCategory = ProductCategory::create($data);

        $data = ProductCategory::firstWhere('id', $productCategory->id);

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }

    /**
     ** Update service.
     *
     * @param $request
     * @return object
     */
    public function update($request)
    {
        $status = true;
        $message = MessageHelper::saveSuccess();

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        ProductCategory::where('id', $request->product_category_id)
            ->update($data);

        $data = ProductCategory::firstWhere('id', $request->product_category_id);

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }

    /**
     ** Destroy service.
     *
     * @param $request
     * @return object
     */
    public function destroy($request)
    {
        $status = true;
        $message = MessageHelper::deleteSuccess();

        ProductCategory::where('id', $request->product_category_id)
            ->delete();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
