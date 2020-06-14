<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Event;


use DateTimeImmutable;
use LaSalle\UrlShortener\JudithVilela\Shared\Domain\Event\DomainEvent;

final class UrlWasShorten extends DomainEvent
{
    /** @var string */
    private $urlOriginal;

    /** @var string */
    private $urlShortened;

    public function __construct(
        string $urlOriginal,
        string $urlShortened,
        string $eventId = null,
        DateTimeImmutable $occurredOn = null
    ) {
        parent::__construct($urlOriginal, $eventId, $occurredOn);
        $this->urlOriginal = $urlOriginal;
        $this->urlShortened = $urlShortened;
    }

    /**
     * @return string
     */
    public function urlOriginal(): string
    {
        return $this->urlOriginal;
    }

    /**
     * @return string
     */
    public function urlShortened(): string
    {
        return $this->urlShortened;
    }

    /**
     * @return string
     */
    public static function eventName(): string
    {
        return 'url_shortened.url_was_shorten';
    }
}
