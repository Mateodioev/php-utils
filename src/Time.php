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

    /**
     * Calculate the execution time of a closure function
     * @param callable|\Closure $callable
     * @param bool $float `true` to return a float, `false` to return an int
     * @return float|int The time it took to execute the closure function
     */
    public static function executionTime($callable, bool $float = false): float|int
    {
        $start = microtime(true);
        $callable();
        $end = microtime(true);
        $took = $end - $start;
        return $float ? (float) $took : (int) $took;
    }
}
