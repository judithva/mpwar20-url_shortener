<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\SaveUrl;


final class SaveUrlRequest
{
    /** @var string */
    private $urlLong;

    /** @var string */
    private $urlShort;

    public function __construct(string $urlLong, string $urlShort)
    {
        $this->urlLong = $urlLong;
        $this->urlShort = $urlShort;
    }

    /**
     * @return string
     */
    public function urlLong(): string
    {
        return $this->urlLong;
    }

    /**
     * @return string
     */
    public function urlShort(): string
    {
        return $this->urlShort;
    }
}
