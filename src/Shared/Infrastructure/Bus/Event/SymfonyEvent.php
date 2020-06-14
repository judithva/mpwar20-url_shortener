<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\Shared\Infrastructure\Bus\Event;


use LaSalle\UrlShortener\JudithVilela\Shared\Domain\Event\DomainEvent;
use Symfony\Contracts\EventDispatcher\Event;

final class SymfonyEvent extends Event
{
    /** @var DomainEvent  */
    private $domainEvent;

    public  function __construct(DomainEvent $domainEvent)
    {
        $this->domainEvent = $domainEvent;
    }

    /**
     * @return DomainEvent
     */
    public function domainEvent(): DomainEvent
    {
        return $this->domainEvent;
    }
}
