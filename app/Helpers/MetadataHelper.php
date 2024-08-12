<?php

namespace App\Helpers;

class MetadataHelper
{
    /**
     ** Metadata.
     *
     * @return object
     */
    public static function metadata()
    {
        $result = (object) [
            'title' => 'Simple API',
            'description' => '',
            'keywords' => '',
        ];

        return $result;
    }
}
