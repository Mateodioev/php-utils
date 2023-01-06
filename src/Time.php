<?php

namespace Mateodioev\Utils;

class Time
{
    /**
     * Calculate the execution time of a script
     *
     * @param bool $float true to return a float, false to return an int
     * @param bool $precision number of decimal places to return
	 * @param float|int $startTime The time the script started, pass null to use the default
     */
    public static function Took(bool $float = false, int $precision = 4, float|int $startTime = null): float|int
    {
        $start = $startTime ?? $_SERVER['REQUEST_TIME_FLOAT'] ?? $_SERVER['REQUEST_TIME'];
        $end = microtime(true);
        $took = $end - $start;
        return $float ? (float) round($took, $precision) : (int) $took;
    }
}
