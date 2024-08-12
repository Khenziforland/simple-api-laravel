<?php

namespace App\Services\Api;

use App\Helpers\CheckHelper;
use App\Helpers\MessageHelper;

use App\Models\Product;

class ProductApiService
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

        $product = Product::filter($filter)
            ->getPaginatedData(true, $request->page, $request->per_page, $sortKey, $sortOrder);

        $data = $product->data;
        $pagination = $product->pagination;

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

        $data = Product::firstWhere('id', $request->product_id);

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
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'price' => $request->price,
        ];

        $product = Product::create($data);

        if (CheckHelper::isset($request->image)) {
            Product::saveImage($product->id, $request->image);
        }

        $data = Product::firstWhere('id', $product->id);

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
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'price' => $request->price,
        ];

        Product::where('id', $request->product_id)
            ->update($data);

        if (CheckHelper::isset($request->image)) {
            Product::deleteImage($request->product_id);
            Product::saveImage($request->product_id, $request->image);
        }

        $data = Product::firstWhere('id', $request->product_id);

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

        Product::deleteImage($request->product_id);
        Product::where('id', $request->product_id)
            ->delete();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
