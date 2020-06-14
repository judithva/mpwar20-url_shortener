<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain;


use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Aggregate\UrlShortened;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\Url;

interface UrlShortenedRepository
{
    public function find(Url $urlOriginal): ?UrlShortened;

    public function save(UrlShortened $urlShortened): void;
}
