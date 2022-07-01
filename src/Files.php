<?php 

namespace Mateodioev\Utils;

use CURLFile;
use Mateodioev\Utils\Exceptions\FileException;

use function is_file;
use function is_readable;
use function file_exists;
use function filesize;

class Files
{
  /**
   * Validar que sea un archivo y que tenga permisos de lectura
   */
  public static function isFile(string $file): bool
  {
    clearstatcache();
    return is_file($file)
      && is_readable($file)
      && file_exists($file)
      && filesize($file) > 0;
  }

  /**
   * Intentar abrir un archivo con CURLFile, si es una url valida devuelve el mismo string
   */
  public static function tryOpen(string $file): string|CURLFile
  {
    if (self::isFile($file)) {
      return new CURLFile($file);
    } elseif (Strings::IsValidUrl($file)) {
      return $file;
    } else {
      throw new FileException('Invalid file ' . $file);
    }
  }
}
