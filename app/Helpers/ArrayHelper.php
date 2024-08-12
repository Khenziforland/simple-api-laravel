<?php

namespace App\Helpers;

class ArrayHelper
{
    /**
     ** Search.
     *
     * @param $search
     * @param $array
     * @param $key
     * @return bool
     */
    public static function search($array, $key, $search)
    {
        $result = false;
        $array = $array->toArray();

        foreach ($array as $row) {
            if ($row[$key] == $search) {
                $result = true;
            }
        }

        return $result;
    }
}
