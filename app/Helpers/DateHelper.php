<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class DateHelper
{
    /**
     ** Change month to indonesia.
     *
     * @param $month
     * @return string
     */
    public static function changeMonthToIndonesia($month)
    {
        $month = str_replace('January', 'Januari', $month);
        $month = str_replace('February', 'Februari', $month);
        $month = str_replace('March', 'Maret', $month);
        $month = str_replace('April', 'April', $month);
        $month = str_replace('May', 'Mei', $month);
        $month = str_replace('June', 'Juni', $month);
        $month = str_replace('July', 'Juli', $month);
        $month = str_replace('August', 'Agustus', $month);
        $month = str_replace('September', 'September', $month);
        $month = str_replace('October', 'Oktober', $month);
        $month = str_replace('November', 'November', $month);
        $month = str_replace('December', 'Desember', $month);

        return $month;
    }

    /**
     ** Change month to english.
     *
     * @param $month
     * @return string
     */
    public static function changeMonthToEnglish($month)
    {
        $month = str_replace('Januari', 'January', $month);
        $month = str_replace('Februari', 'February', $month);
        $month = str_replace('Maret', 'March', $month);
        $month = str_replace('April', 'April', $month);
        $month = str_replace('Mei', 'May', $month);
        $month = str_replace('Juni', 'June', $month);
        $month = str_replace('Juli', 'July', $month);
        $month = str_replace('Agustus', 'August', $month);
        $month = str_replace('September', 'September', $month);
        $month = str_replace('Oktober', 'October', $month);
        $month = str_replace('November', 'November', $month);
        $month = str_replace('Desember', 'December', $month);

        return $month;
    }

    /**
     ** Change month to number.
     *
     * @param $month
     * @return string
     */
    public static function changeMonthToNumber($month)
    {
        $month = self::changeDayToIndonesia($month);

        $month = str_replace('Januari', '01', $month);
        $month = str_replace('Februari', '02', $month);
        $month = str_replace('Maret', '03', $month);
        $month = str_replace('April', '04', $month);
        $month = str_replace('Mei', '05', $month);
        $month = str_replace('Juni', '06', $month);
        $month = str_replace('Juli', '07', $month);
        $month = str_replace('Agustus', '08', $month);
        $month = str_replace('September', '09', $month);
        $month = str_replace('Oktober', '10', $month);
        $month = str_replace('November', '11', $month);
        $month = str_replace('Desember', '12', $month);

        return $month;
    }

    /**
     ** Change month to number.
     *
     * @param $month
     * @return string
     */
    public static function changeMonthToRoman($month)
    {
        $month = self::changeDayToIndonesia($month);

        $month = str_replace('Januari', 'I', $month);
        $month = str_replace('Februari', 'II', $month);
        $month = str_replace('Maret', 'III', $month);
        $month = str_replace('April', 'IV', $month);
        $month = str_replace('Mei', 'V', $month);
        $month = str_replace('Juni', 'VI', $month);
        $month = str_replace('Juli', 'VII', $month);
        $month = str_replace('Agustus', 'VIII', $month);
        $month = str_replace('September', 'IX', $month);
        $month = str_replace('Oktober', 'X', $month);
        $month = str_replace('November', 'XI', $month);
        $month = str_replace('Desember', 'XII', $month);

        return $month;
    }

    /**
     ** Change number to month.
     *
     * @param $month
     * @return string
     */
    public static function changeNumberToMonth($month, $type = 'Indonesia')
    {
        if ($type == 'Indonesia') {
            if ($month == 1) {
                return 'Januari';
            } else if ($month == 2) {
                return 'Februari';
            } else if ($month == 3) {
                return 'Maret';
            } else if ($month == 4) {
                return 'April';
            } else if ($month == 5) {
                return 'Mei';
            } else if ($month == 6) {
                return 'Juni';
            } else if ($month == 7) {
                return 'Juli';
            } else if ($month == 8) {
                return 'Agustus';
            } else if ($month == 9) {
                return 'September';
            } else if ($month == 10) {
                return 'Oktober';
            } else if ($month == 11) {
                return 'November';
            } else if ($month == 12) {
                return 'Desember';
            }
        }

        if ($type == 'English') {
            if ($month == 1) {
                return 'January';
            } else if ($month == 2) {
                return 'February';
            } else if ($month == 3) {
                return 'March';
            } else if ($month == 4) {
                return 'April';
            } else if ($month == 5) {
                return 'May';
            } else if ($month == 6) {
                return 'June';
            } else if ($month == 7) {
                return 'July';
            } else if ($month == 8) {
                return 'August';
            } else if ($month == 9) {
                return 'September';
            } else if ($month == 10) {
                return 'October';
            } else if ($month == 11) {
                return 'November';
            } else if ($month == 12) {
                return 'December';
            }
        }

        return null;
    }

    /**
     ** Change day to indonesia.
     *
     * @param $day
     * @return string
     */
    public static function changeDayToIndonesia($day)
    {
        $day = str_replace('Sunday', 'Minggu', $day);
        $day = str_replace('Monday', 'Senin', $day);
        $day = str_replace('Tuesday', 'Selasa', $day);
        $day = str_replace('Wednesday', 'Rabu', $day);
        $day = str_replace('Thursday', 'Kamis', $day);
        $day = str_replace('Friday', 'Jumat', $day);
        $day = str_replace('Saturday', 'Sabtu', $day);

        return $day;
    }

    /**
     ** List indonesia month.
     *
     * @param $type
     * @return object
     */
    public static function listMonth($type = 'Indonesia')
    {
        if ($type == 'Indonesia') {
            $listMonth = (object) [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ];
        } else {
            $listMonth = (object) [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];
        }

        return $listMonth;
    }

    /**
     ** First and last date.
     *
     * @param $month
     * @param $year
     * @return object
     */
    public static function firstAndLastDate($month, $year)
    {
        $month = self::changeMonthToNumber($month);

        $date = "$year-$month-01";

        $start = Carbon::parse($date)
            ->startOfMonth()
            ->isoFormat('DD');

        $end = Carbon::parse($date)
            ->endOfMonth()
            ->isoFormat('DD');

        $startDate = "$year-$month-$start";
        $endDate = "$year-$month-$end";

        $startDate = Carbon::parse($startDate)
            ->isoFormat('YYYY-MM-DD');

        $endDate = Carbon::parse($endDate)
            ->isoFormat('YYYY-MM-DD');

        $result = (object) [
            'startDate' => $startDate,
            'endDate' => $endDate,
        ];

        return $result;
    }

    /**
     ** Interval date.
     *
     * @param $month
     * @param $year
     * @return object
     */
    public static function intervalDate($month, $year)
    {
        $month = self::changeMonthToNumber($month);

        $date = "$year-$month-01";

        $start = Carbon::parse($date)
            ->startOfMonth()
            ->isoFormat('DD');

        $end = Carbon::parse($date)
            ->endOfMonth()
            ->isoFormat('DD');

        $result = [];

        for ($i = $start; $i <= $end; $i++) {
            $day = $i;
            $date = "$year-$month-$day";

            $date = Carbon::parse($date)
                ->isoFormat('YYYY-MM-DD');

            array_push($result, $date);
        }

        $result = (object) $result;
        return $result;
    }

    /**
     ** Different datetime humanly.
     *
     * @param $startDatetime
     * @param $endDatetime
     * @return object
     */
    public static function differentDatetimeHumanly($startDatetime, $endDatetime)
    {
        $startDatetime = Carbon::parse($startDatetime);
        $endDatetime = Carbon::parse($endDatetime);

        $diff = $endDatetime->diff($startDatetime);

        $result = (object) [
            'year' => $diff->y,
            'month' => $diff->m,
            'day' => $diff->d,
            'hour' => $diff->h,
            'minute' => $diff->i,
            'second' => $diff->s,
        ];

        return $result;
    }

    /**
     ** Different seconds to humanly.
     *
     * @param  $seconds
     * @return string
     */
    public static function differentSecondsToHumanly($seconds)
    {
        $diff = Carbon::now()
            ->addSeconds($seconds)
            ->diff(Carbon::now());

        $parts = [];
        $timeUnits = [
            'y' => 'Tahun',
            'm' => 'Bulan',
            'd' => 'Hari',
            'h' => 'Jam',
            'i' => 'Menit',
            's' => 'Detik'
        ];

        foreach ($timeUnits as $unit => $label) {
            if ($diff->$unit > 0) {
                $parts[] = $diff->$unit . ' ' . $label;
            }
        }

        $result = implode(' ', $parts);

        return $result;
    }
}
