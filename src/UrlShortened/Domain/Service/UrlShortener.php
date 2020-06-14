<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Service;

use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\Url;

interface UrlShortener
{
    public  function shorten(Url $url): Url;
}
