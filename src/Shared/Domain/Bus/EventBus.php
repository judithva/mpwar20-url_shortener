<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\Shared\Domain\Bus;


use LaSalle\UrlShortener\JudithVilela\Shared\Domain\Event\DomainEvent;

interface EventBus
{
    public function dispatch(DomainEvent $domainEvent): void;
}
