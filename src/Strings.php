<?php

namespace Mateodioev\Utils;

class Strings
{

  /**
   * Validar si un string es una url valida
   * 
   * @param string $url URL a validar
   * @return bool true si es una url valida, false en caso contrario
   * @deprecated Use `Network::IsValidUrl()` instead.
   */
  public static function IsValidUrl(string $url): bool
  {
    return Network::IsValidUrl($url);
  }

  /**
   * - U+200B zero width space
   * - U+200C zero width non-joiner Unicode code point
   * - U+200D zero width joiner Unicode code point
   * - U+FEFF zero width no-break space Unicode code point
   */
  public static function RemoveNoSpace(string $str): string
  {
    $pattern = '/[\x{200B}-\x{200D}]/u';
    $str = str_replace(["\xE2\x80\x8B", "\xE2\x80\x8C", "\xE2\x80\x8D"], '', $str);
    $str = preg_replace('/[\x{200B}-\x{200D}]/u', '', $str);
    $str = preg_replace('/&#8203;/', '', $str);
    return $str;
  }
}
