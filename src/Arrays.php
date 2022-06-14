<?php 

namespace Mateodioev\Utils;

use function str_replace;
use function explode;

class Arrays
{
  /**
   * Multiexplode function
   *
   * @param array $separator Array of separators
   * @param string $str String to explode
   */
  public static function MultiExplode(array $separator, string $str): array
  {
    $str = str_replace($separator, $separator[0], $str);
    return explode($separator[0], $str);
  }

  /**
   * Delete empty values from array
   */
  public static function DeleteEmptyKeys(array &$arr): array
  {
    foreach ($arr as $i => $value) {
      if (is_array($value)) {
        $arr[$i] = self::DeleteEmptyKeys($value);
      }
      if ((empty($value) || $value === null || $value == '""' || $value == "''") && !is_bool($value)) {
        unset($arr[$i]);
      }
    }
    return $arr;
  }
}
