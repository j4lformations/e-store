<?php


namespace App\Service;


class AppService
{
    public static function isValid(?string $name): bool
    {
        return !(!isset($name) || trim($name) === '');
    }

    public static function capitalize(string $chaine): string
    {
        if (self::isValid($chaine)) {
            return ucwords(mb_strtolower($chaine));
        }
        return '';
    }

    public static function uppercase(string $chaine): string
    {
        if (self::isValid($chaine)) {
            return mb_strtoupper($chaine);
        }
        return '';
    }

    public static function lowercase(string $chaine): string
    {
        if (self::isValid($chaine)) {
            return mb_strtolower($chaine);
        }
        return '';
    }

    public static function concactene(string $prenom, string $nom): string
    {
        return self::capitalize($prenom) . " " . self::uppercase($nom);
    }
}