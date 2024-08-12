<?php

namespace App\Helpers;

use Vinkla\Hashids\Facades\Hashids;

class HashHelper
{
    /**
     ** Encrypt ID.
     *
     * @param $id
     * @return string
     */
    public static function encrypt($id)
    {
        return Hashids::connection('main')->encode($id);
    }

    /**
     ** Decrypt ID.
     *
     * @param $id
     * @return int
     */
    public static function decrypt($id)
    {
        $result = 0;
        $decode = Hashids::connection('main')->decode($id);

        if (empty($decode)) {
            return $result;
        }

        $result = $decode[0];

        return $result;
    }
}
