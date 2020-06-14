<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Infrastructure\Persistence;

use PDO;

final class MysqlDatabase
{
    public static function instancePDO(): PDO
    {
        return new PDO('mysql:host=mysql;dbname=urlShortener', 'root', 'toor');
    }
}
