<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SecsToH extends Facade
{
    /**
     * @param int $secs
     *
     * @return string
     */
    public static function get(int $secs)
    {
        $units = array(
            'week' => 7 * 24 * 3600,
            'day' => 24 * 3600,
            'hour' => 3600,
            'minute' => 60,
            'second' => 1,
        );
        // specifically handle zero
        if ($secs == 0) {
            return '0 seconds';
        }
        $s = '';
        foreach ($units as $name => $divisor) {
            if ($quot = intval($secs / $divisor)) {
                $s .= "$quot $name";
                $s .= (abs($quot) > 1 ? 's' : '').', ';
                $secs -= $quot * $divisor;
            }
        }

        return substr($s, 0, -2);
    }
}
