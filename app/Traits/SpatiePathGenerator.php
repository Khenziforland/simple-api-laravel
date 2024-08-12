<?php

namespace App\Traits;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator as BasePathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SpatiePathGenerator implements BasePathGenerator
{
    /**
     ** Get the path.
     *
     * @param $media
     * @return string
     */
    public function getPath(Media $media): string
    {
        $result = $media->collection_name . '/';

        return $result;
    }

    /**
     ** Get the path for conversions.
     *
     * @param $media
     * @return string
     */
    public function getPathForConversions(Media $media): string
    {
        $result = $media->collection_name . '/conversions/';

        return $result;
    }

    /**
     ** Get the path for responsive images.
     *
     * @param $media
     * @return string
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        $result = $media->collection_name . '/responsives/';

        return $result;
    }
}
