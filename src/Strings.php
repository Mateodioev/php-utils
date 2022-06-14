<?php

namespace Mateodioev\Utils;

class Strings
{
  private static array $regex = [
    'validate_url' => "/(?i)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/",
  ];

  /**
   * Validar si un string es una url valida
   * 
   * @param string $url URL a validar
   * @return bool true si es una url valida, false en caso contrario
   */
  public static function IsValidUrl(string $url): bool
  {
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
      return preg_match(self::$regex['validate_url'], $url) === 1;
    }
    return true;
  }
}
