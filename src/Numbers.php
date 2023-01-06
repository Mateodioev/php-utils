<?php

namespace Mateodioev\Utils;

use Mateodioev\Utils\Exceptions\NumbersException;

class Numbers
{
    /**
     * Gen random number
     */
    public static function genRandom(int $length = 1): int
    {
        $ints = '0123456789';
        $num = 0;

        for ($i = 0; $i < $length; $i++) {
            $num .= $ints[mt_rand(0, 9)];
        }
        return $num;
    }

    /**
     * returns the percentage of a number
     */
	public static function getPercentage(float|int $i, float|int $total=100): float|int
	{
		return ($i*100) / $total;
	}

	/**
	 * Convert string to int
	 * 
	 * @param string $str String to convert
	 * @throws NumbersException
	 */
	public static function toInt(string $str): int
	{
		if (!is_numeric($str)) {
			throw new NumbersException('The string is not a number');
		}
		return (int) $str;
	}

	  /**
	   * Convert string to float
	   * 
	   * @param string $str String to convert
	   * @throws NumbersException
	   */
      public static function toFloat(string $str): float
      {
          if (!is_numeric($str)) {
              throw new NumbersException('The string is not a float');
          }
          return (float) $str;
      }
}
