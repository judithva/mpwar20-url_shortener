<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\Shared\Domain\Event;


use DateTimeImmutable;

abstract class DomainEvent
{
    /** @var string */
    private $aggregateId;

    /** @var string */
    private $eventId;

    /** @var DateTimeImmutable */
    private $occurredOn;

    public function __construct(string $aggregateId, string $eventId = null, DateTimeImmutable $occurredOn = null)
    {
        $this->aggregateId = $aggregateId;
        $this->eventId = $eventId;
        $this->occurredOn =  $occurredOn ?? new DateTimeImmutable();
    }

    abstract public static function eventName(): string;

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): DateTimeImmutable
    {
        return $this->occurredOn;
    }
}
