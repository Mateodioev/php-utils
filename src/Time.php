<?php 

namespace Mateodioev\Utils;

class Time
{
  /**
   * Calculate the execution time of a script
   *
   * @param boolean $float true to return a float, false to return an int
   * @param integer $precision number of decimal places to return
   */
  public static function Took(bool $float = false, int $precision = 4): float|int
  {
    $start = $_SERVER['REQUEST_TIME_FLOAT'] ?? $_SERVER['REQUEST_TIME'];
    $end = microtime(true);
    $took = $end - $start;
    return $float ? (float) round($took, $precision) : (int) $took;
  }
}
