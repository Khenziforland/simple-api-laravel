<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

use EloquentFilter\Filterable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

use App\Filters\ProductFilter;

use App\Helpers\HashHelper;
use App\Helpers\StorageHelper;

use App\Traits\PaginateData;

class Product extends Model implements HasMedia
{
    use Filterable, InteractsWithMedia, HasFactory, PaginateData, SoftDeletes;

    /*
    |-----------------------------------------------------------------------------
    | DECORATOR(s)
    |-----------------------------------------------------------------------------
    | // ! write your decorator(s) below, to maintain code readability
    */

    /**
     ** The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     ** The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'hash_id',
        'image',
    ];

    /**
     ** The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'productCategory',
    ];

    /*
    |-----------------------------------------------------------------------------
    | HOOK METHOD(s)
    |-----------------------------------------------------------------------------
    | // ! write your hook method(s) below, to maintain code readability
    */

    /**
     ** Model filter.
     *
     * @return string
     */
    public function modelFilter()
    {
        return $this->provideFilter(ProductFilter::class);
    }

    /**
     ** Get hash id attribute.
     *
     * @return string
     */
    public function getHashIdAttribute()
    {
        return HashHelper::encrypt($this->id);
    }

    /**
     ** Get image attribute.
     *
     * @return string
     */
    public function getImageAttribute()
    {
        $result = null;
        $media = $this->getFirstMedia('product-image');

        if ($media) {
            $result =  $media->getUrl();
        }

        return $result;
    }

    /*
    |-----------------------------------------------------------------------------
    | STATIC METHOD(s)
    | ----------------------------------------------------------------------------
    | // ! write your static method(s) below, to maintain code readability
    */

    /**
     ** Save image.
     *
     * @param $id
     * @param $file
     * @return void
     */
    public static function saveImage($id, $file)
    {
        $timestamp = Carbon::now()->isoFormat('YYYYMMDDHHmmss');
        $uniqueSuffix = uniqid();
        $fileExtension = $file->getClientOriginalExtension();
        $newFileName = "{$timestamp}{$uniqueSuffix}.{$fileExtension}";

        Product::firstWhere('id', $id)
            ->addMedia($file)
            ->usingFileName($newFileName)
            ->toMediaCollection('product-image', 's3');
    }

    /**
     ** Delete image.
     * 
     * @param $id
     * @return void
     */
    public static function deleteImage($id)
    {
        Product::firstWhere('id', $id)
            ->clearMediaCollection('product-image');
    }

    /*
    |-----------------------------------------------------------------------------
    | SCOPED METHOD(s)
    | ----------------------------------------------------------------------------
    | // ! write your static method(s) below, to maintain code readability
    */

    /*
    |-----------------------------------------------------------------------------
    | RELATIONAL METHOD(s)
    |-----------------------------------------------------------------------------
    | // ! write your relational method(s) below, to maintain code readability
    */

    /**
     ** Relationship with product category.
     *
     * @return BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id')
            ->withTrashed();
    }
}
