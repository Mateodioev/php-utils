<?php 

namespace Mateodioev\Utils;

use Exception;

/**
 * luhn Algorithm
 */
class Luhn
{
  /**
   * Return the luhn checksum of a number
   */
  public static function calculateCheckSum(int $i): int
  {
    $digits = \str_split($i);
    $nDigits = \count($digits);
    $sum = 0;

    for ($i=0; $i < $nDigits; $i++) { 
      $num = $digits[$i];
      if ($i%2) {
        $num *= 2;
        $num = \array_sum(\str_split($num));
      }
      $sum += $num;
    }
    return $sum;
  }
  
  /** 
   * Get checkdigit of CheckSum
   */
  public static function calculateCheckDigit(int $i): int
  {
    $sum = self::calculateCheckSum($i) * 9;
    return \substr($sum, -1);
  }

  /**
   * Validate luhn
   */
  public static function isValid(int $i): bool
  {
    [$number, $lastDigit] = self::cleanAndSplit($i);

    $checksum = self::calculateCheckSum($number);
    $sum = $checksum + $lastDigit;

    return ($sum % 10) === 0;
  }

  private static function cleanAndSplit(string $number): array
  {
    $input = \preg_replace('/\D/', '', $number);
    $inputLength = \strlen($input);

    if ($inputLength === 0) {
      throw new Exception('Invalid input string');
    }
    $inputLength--;

    return [
      \substr($input, 0, $inputLength),
      (int) $input[$inputLength]
    ];
  }
}
