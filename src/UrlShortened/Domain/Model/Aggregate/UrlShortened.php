<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\Aggregate;

use DateTimeImmutable;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\UrlId;
use LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject\Url;

final class UrlShortened
{
    /** @var UrlId  */
    private $id;

    /** @var Url  */
    private $urlOriginal;
    private $urlShortened;

    /** @var DateTimeImmutable  */
    private $created_on;

    public function __construct(
        UrlId $id,
        Url $urlOriginal,
        Url $urlShortened,
        DateTimeImmutable $created_on = null
    ) {
        $this->id = $id;
        $this->urlOriginal = $urlOriginal;
        $this->urlShortened = $urlShortened;
        $this->created_on = $created_on ?? new DateTimeImmutable();
    }

    /**
     * @return UrlId
     */
    public function id(): UrlId {
        return $this->id;
    }

    /**
     * @return Url
     */
    public function urlOriginal(): Url {
        return $this->urlOriginal;
    }

    /**
     * @return Url
     */
    public function urlShortened(): Url {
        return $this->urlShortened;
    }

    /**
     * @return DateTimeImmutable
     */
    public function createdOn(): DateTimeImmutable
    {
        return $this->created_on;
    }

    /**
     * @return string
     */
    public function campaign(): ?string
    {
        return $this->urlOriginal->queryString()['utm_campaign'] ?? null;
    }
}
