<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\UrlShortener;

use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\Url;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Service\UrlShortener as DomainUrlShortener;

final class UrlShortener
{
    /** @var DomainUrlShortener  */
    private $urlShortener;

    public function __construct(DomainUrlShortener $urlShortener)
    {
        $this->urlShortener = $urlShortener;
    }

    /**
     * @param UrlShortenerRequest $urlRequest
     *
     * @return UrlShortenerResponse
     */
    public function __invoke(UrlShortenerRequest $urlRequest): UrlShortenerResponse
    {
        $long_url =  new Url($urlRequest->url());
        $urlShort = $this->urlShortener->shorten($long_url);

        return new UrlShortenerResponse($urlShort->url());
    }
}
