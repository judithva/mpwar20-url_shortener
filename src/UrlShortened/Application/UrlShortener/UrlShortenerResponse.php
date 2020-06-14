<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\UrlShortener;


final class UrlShortenerResponse
{
    /** @var string */
    private $urlShort;

    public function __construct(string $urlShort)
    {
        $this->urlShort = $urlShort;
    }

    /**
     * @return string
     */
    public function urlShort(): string
    {
        return $this->urlShort;
    }
}
