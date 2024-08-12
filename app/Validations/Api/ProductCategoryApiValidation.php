<?php

namespace App\Validations\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Helpers\MessageHelper;

class ProductCategoryApiValidation
{
    /**
     ** Index validation.
     *
     * @param $request
     * @return object
     */
    public function index($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'page' => [
                'required',
                'numeric',
                'min:1',
            ],

            'per_page' => [
                'required',
                'numeric',
                'min:1',
            ],

            'sort_key' => [
                'required',
                Rule::in([
                    'name',
                    'description',
                    'created_at'
                ]),
            ],

            'sort_order' => [
                'required',
                Rule::in([
                    'ASC',
                    'DESC',
                ]),
            ],

            'search' => [
                'nullable',
            ],
        ];

        $errorMessage = [
            'page.required' => 'Halaman tidak boleh kosong !',
            'page.numeric' => 'Halaman harus berupa angka !',
            'page.min' => 'Halaman minimal bernilai 1 !',

            'per_page.required' => 'Jumlah per halaman tidak boleh kosong !',
            'per_page.numeric' => 'Jumlah per halaman harus berupa angka !',
            'per_page.min' => 'Jumlah per halaman minimal bernilai 1 !',

            'sort_key.required' => 'Urutan berdasarkan tidak boleh kosong !',
            'sort_key.in' => 'Urutan berdasarkan harus berisi name, description, atau created_at !',

            'sort_order.required' => 'Tipe urutan tidak boleh kosong !',
            'sort_order.in' => 'Tipe urutan harus berisi ASC atau DESC !',
        ];

        $data = [
            'page' => $request->page,
            'per_page' => $request->per_page,
            'sort_key' => $request->sort_key,
            'sort_order' => strtoupper($request->sort_order),
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Show validation.
     *
     * @param $request
     * @return object
     */
    public function show($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'product_category_id' => [
                'required',
                'numeric',
                Rule::exists('product_categories', 'id'),
            ],
        ];

        $errorMessage = [
            'product_category_id.required' => 'ID kategori produk tidak boleh kosong !',
            'product_category_id.numeric' => 'ID kategori produk harus berupa angka !',
            'product_category_id.exists' => 'ID kategori produk tidak ditemukan !',
        ];

        $data = [
            'product_category_id' => $request->product_category_id,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Create validation.
     *
     * @param $request
     * @return object
     */
    public function create($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'name' => [
                'required',
            ],

            'description' => [
                'required',
            ],
        ];

        $errorMessage = [
            'name.required' => 'Nama kategori produk tidak boleh kosong !',

            'description.required' => 'Deskripsi kategori produk tidak boleh kosong !',
        ];

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Update validation.
     *
     * @param $request
     * @return object
     */
    public function update($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'product_category_id' => [
                'required',
                'numeric',
                Rule::exists('product_categories', 'id'),
            ],

            'name' => [
                'required'
            ],

            'description' => [
                'required'
            ],
        ];

        $errorMessage = [
            'product_category_id.required' => 'ID kategori produk tidak boleh kosong !',
            'product_category_id.numeric' => 'ID kategori produk harus berupa angka !',
            'product_category_id.exists' => 'ID kategori produk tidak ditemukan !',

            'name.required' => 'Nama kategori produk tidak boleh kosong !',

            'description.required' => 'Deskripsi kategori produk tidak boleh kosong !',
        ];

        $data = [
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'description' => $request->description,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Destroy validation.
     *
     * @param $request
     * @return object
     */
    public function destroy($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'product_category_id' => [
                'required',
                'numeric',
                Rule::exists('product_categories', 'id'),
            ],
        ];

        $errorMessage = [
            'product_category_id.required' => 'ID kategori produk tidak boleh kosong !',
            'product_category_id.numeric' => 'ID kategori produk harus berupa angka !',
            'product_category_id.exists' => 'ID kategori produk tidak ditemukan !',
        ];

        $data = [
            'product_category_id' => $request->product_category_id,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
