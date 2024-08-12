<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class FormatterHelper
{
    /**
     ** Format date.
     *
     * @param $date
     * @return string
     */
    public static function formatDate($date, $day = false)
    {
        $result = null;

        if ($date) {
            $result = Carbon::parse($date)
                ->isoFormat('DD MMMM YYYY');

            if ($day) {
                $result = Carbon::parse($date)
                    ->isoFormat('dddd, DD MMMM YYYY');
            }
        }

        return $result;
    }

    /**
     ** Format datetime.
     *
     * @param $datetime
     * @return string
     */
    public static function formatDatetime($datetime, $day = false)
    {
        $result = null;

        if ($datetime) {
            $result = Carbon::parse($datetime)
                ->isoFormat('DD MMMM YYYY HH:mm');

            if ($day) {
                $result = Carbon::parse($datetime)
                    ->isoFormat('dddd, DD MMMM YYYY HH:mm');
            }
        }

        return $result;
    }

    /**
     ** Format time.
     *
     * @param $time
     * @return string
     */
    public static function formatTime($time)
    {
        $result = null;

        if ($time) {
            $result = Carbon::parse($time)
                ->isoFormat('HH:mm');
        }

        return $result;
    }

    /**
     ** Format number helper.
     *
     * @param $number
     * @param $prefix
     * @return string
     */
    public static function formatNumber($number, $prefix = false)
    {
        $result = null;
        $currency = '';

        if ($prefix) {
            $currency = 'Rp ';
        }

        if (($number === 0) or ($number === 0.0)) {
            $result = $currency . $number;
        }

        if ($number) {
            $result = $currency . number_format($number, 0, ",", ".");
        }

        return $result;
    }

    /**
     ** Format float.
     *
     * @param $number
     * @param $prefix
     * @return string
     */
    public static function formatFloat($number, $prefix = null)
    {
        $result = null;
        $currency = '';

        if ($prefix) {
            $currency = 'Rp ';
        }

        if (($number === 0) or ($number === 0.0)) {
            $result = $currency . 0;
        }

        if ($number) {
            $result = $currency . number_format($number, 2, ",", ".");
        }

        return $result;
    }

    /**
     ** Convert to integer.
     *
     * @param $number
     * @return int
     */
    public static function convertToInteger($number)
    {
        $number = str_replace('.', '', $number);
        $number = intval($number);

        return $number;
    }

    /**
     ** Convert to float.
     *
     * @param $number
     * @return float
     */
    public static function convertToFloat($number)
    {
        $number = str_replace(',', '.', $number);
        $number = floatval($number);

        return $number;
    }
}
