<?php

namespace Mateodioev\Utils;

class Network
{
    private static array $regex = [
      'validate_url' => "/(?i)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/",
      'ip' => [
        'v4' => '/^((2[0-4]|1\d|[1-9])?\d|25[0-5])(\.(?1)){3}\z/',
        'v6' => '/^(((?=(?>.*?(::))(?!.+\3)))\3?|([\dA-F]{1,4}(\3|:(?!$)|$)|\2))(?4){5}((?4){2}|((2[0-4]|1\d|[1-9])?\d|25[0-5])(\.(?7)){3})\z/i'
      ],
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

    /**
     * Validar si un string es una IP v4 valida
     *
     * @param string $ip IP a validar
     * @param bool $only_ipv4 Si es true, solo se validara si es una IP v4, si es false, se validara si es una IP v4 o v6
     */
    public static function IsValidIp(string $ip, bool $only_ipv4 = false): bool
    {
        if ($only_ipv4) {
            return preg_match(self::$regex['ip']['v4'], $ip) === 1;
        }
        if (preg_match(self::$regex['ip']['v4'], $ip)) {
            return true;
        } if (preg_match(self::$regex['ip']['v6'], $ip)) {
            return true;
        } return false;
    }
}
