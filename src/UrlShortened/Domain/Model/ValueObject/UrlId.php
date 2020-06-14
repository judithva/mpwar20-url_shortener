<?php
declare(strict_types=1);

namespace LaSalle\UrlShortener\JudithVilela\UrlShortened\Domain\Model\ValueObject;

use Ramsey\Uuid\Uuid;

final class UrlId
{
    /** @var string */
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id ?? Uuid::uuid4()->toString();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return static
     */
    public static function generate(): self
    {
        return new self();
    }
}
