<?php

namespace App\Helpers;

class CheckHelper
{
    /**
     ** Isset.
     *
     * @param $value
     * @return bool
     */
    public static function isset($value)
    {
        if (isset($value) and $value) {
            return true;
        }

        return false;
    }

    /**
     ** Isset string.
     *
     * @param $value
     * @return bool
     */
    public static function issetString($value)
    {
        if (isset($value) and $value and $value != '') {
            return true;
        }

        return false;
    }
}
