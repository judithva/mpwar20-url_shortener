<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\UrlShortener;

use LaSalle\UrlShortener\JudithVilela\Shared\Domain\Bus\EventBus;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Event\UrlWasShorten;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\Url;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Service\UrlShortener as DomainUrlShortener;

final class UrlShortener
{
    /** @var DomainUrlShortener  */
    private $urlShortener;

    /** @var EventBus */
    private $eventBus;

    public function __construct(DomainUrlShortener $urlShortener, EventBus $eventBus)
    {
        $this->urlShortener = $urlShortener;
        $this->eventBus = $eventBus;
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

        $this->eventBus->dispatch(new UrlWasShorten($long_url->url(),$urlShort->url()));

        return new UrlShortenerResponse($urlShort->url());
    }
}
