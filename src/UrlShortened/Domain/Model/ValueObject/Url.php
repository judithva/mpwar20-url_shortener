<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject;


use Exception;

final class Url
{
    /** @var string */
    private $url;

    /** @var string */
    private $queryString;

    public function __construct(string $urlInput)
    {
        $this->ensureIsValid($urlInput);
        $this->url = $urlInput;
    }

    private function ensureIsValid(string $url) : void
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return;
        }

        throw new Exception('URL is not valid');
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function queryString(): array
    {
        $this->queryString = parse_url($this->url)['query'] ?? null;

        if (null == $this->queryString) {
            return [];
        }

        $keyValuePairs = explode('&', $this->queryString);
        $queryStringArray = [];

        foreach ($keyValuePairs as $keyValuePair) {
            [$key, $value] = explode('=', $keyValuePair);
            $queryStringArray[$key] = $value;
        }

        return $queryStringArray;
    }
}
