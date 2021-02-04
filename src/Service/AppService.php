<?php


namespace App\Service;


class AppService
{
    public static function capitalize(string $chaine): string
    {
        return ucwords(mb_strtolower($chaine));
    }

    public static function uppercase(string $chaine)
    {
        return mb_strtoupper($chaine);
    }

    public static function lowercase(string $chaine)
    {
        return mb_strtolower($chaine);
    }

    public static function concactene(string $prenom, string $nom): string
    {
        return self::capitalize($prenom) . " " . self::uppercase($nom);
    }
}