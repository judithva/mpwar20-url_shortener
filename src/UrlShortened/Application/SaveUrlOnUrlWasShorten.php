<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Application;


use LaSalle\UrlShortener\JudithVilela\Shared\Infrastructure\Bus\Event\SymfonyEvent;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\SaveUrl\SaveUrl;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Application\SaveUrl\SaveUrlRequest;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Event\UrlWasShorten;


final class SaveUrlOnUrlWasShorten
{
    /** @var SaveUrl */
    private $saveUrlService;

    public function __construct(SaveUrl $saveUrlService)
    {
        $this->saveUrlService = $saveUrlService;
    }

    public function __invoke(SymfonyEvent $event): void
    {
        /** @var UrlWasShorten $domainEvent */
        $domainEvent=$event->domainEvent();
        $this->saveUrlService->__invoke(new SaveUrlRequest($domainEvent->urlOriginal(), $domainEvent->urlShortened()));
    }
}
