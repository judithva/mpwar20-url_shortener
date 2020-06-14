<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\UrlShortener;


final class UrlShortenerRequest
{
    /** @var string */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return $this->url;
    }
}
