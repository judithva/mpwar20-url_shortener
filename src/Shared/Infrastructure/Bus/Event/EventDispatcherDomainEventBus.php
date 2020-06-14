<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\Shared\Infrastructure\Bus\Event;


use LaSalle\UrlShortener\JudithVilela\Shared\Domain\Bus\EventBus;
use LaSalle\UrlShortener\JudithVilela\Shared\Domain\Event\DomainEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class EventDispatcherDomainEventBus implements EventBus
{
    /** @var EventDispatcherInterface  */
    private $bus;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->bus = $eventDispatcher;
    }

    public function dispatch(DomainEvent $domainEvent): void
    {
        $this->bus->dispatch(new SymfonyEvent($domainEvent), $domainEvent::eventName());
    }
}
