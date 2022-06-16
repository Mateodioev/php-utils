<?php 

namespace Mateodioev\Utils;

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
}
